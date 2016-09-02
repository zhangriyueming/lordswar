var TWMap = {
    map: null,
    minimap: null,
    minimap_only: false,
    minimap_highlight: 0,
    mobile: false,
    fullscreen: false,
    cachePopupContents: false,
    minimap_cache_stamp: 0,
    mapSubSectorSize: 5,
    strings: {},
    urls: {},
    colors: {},
    graphics: null,
    image_base: null,
    images: ['gras1.png', 'gras2.png', 'gras3.png', 'gras4.png', 'v1_left.png', 'v1.png', 'v2_left.png', 'v2.png', 'v3_left.png', 'v3.png', 'v4_left.png', 'v4.png', 'v5_left.png', 'v5.png', 'v6_left.png', 'v6.png', 'b1_left.png', 'b1.png', 'b2_left.png', 'b2.png', 'b3_left.png', 'b3.png', 'b4_left.png', 'b4.png', 'b5_left.png', 'b5.png', 'b6_left.png', 'b6.png', 'berg1.png', 'berg2.png', 'berg3.png', 'berg4.png', 'forest0000.png', 'forest0001.png', 'forest0010.png', 'forest0011.png', 'forest0100.png', 'forest0101.png', 'forest0110.png', 'forest0111.png', 'forest1000.png', 'forest1001.png', 'forest1010.png', 'forest1011.png', 'forest1100.png', 'forest1101.png', 'forest1110.png', 'forest1111.png', 'see.png', 'event_xmas.png', 'event_easter.png', 'ghost.png', 'event_merchant.png', 'event_wizard.png', 'event_easter2014.png', 'event_fall2014.png'],
    ghost_village_tile: 51,
    images_secret_blue: [],
    images_secret_yellow: [],
    scriptMode: false,
    warMode: false,
    warModeGeneration: 0,
    villages: {},
    villageKey: {},
    players: {},
    allies: {},
    ghost: false,
    playerColors: {},
    allyColors: {},
    villageColors: {},
    villageIcons: {},
    commandIcons: {},
    allyRelations: {},
    reservations: {},
    friends: {},
    targets: [],
    pos: [],
    size: [0, 0],
    isAutoSize: false,
    minimap_offset: [0, 0],
    minimap_size: [0, 0],
    currentCon: null,
    currentVillage: null,
    scrollBound: {
        x_min: 0,
        x_max: 999,
        y_min: 0,
        y_max: 999
    },
    keys: {},
    ignore_villages: [],
    non_attackable_players: null,
    goFullscreen: function() {
        // if (!TWMap.premium) return false;
        var el = document.getElementById('map_wrap'),
        events = 'fullscreenchange mozfullscreenchange webkitfullscreenchange';
        if (el.requestFullScreen) {
            el.requestFullScreen()
        } else if (el.mozRequestFullScreen) {
            el.mozRequestFullScreen()
        } else if (el.webkitRequestFullScreen) {
            el.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
        } else return false;
        $(document).bind(events,
        function() {
            var prev = TWMap.size;
            TWMap.fullscreen = true;
            TWMap.resize(0, false);
            $('#map_popup').detach().appendTo('#map_wrap');
            $('#minimap').detach().appendTo('#map_wrap');
            $('#fullscreen').hide();
            $(document).unbind(events).bind(events,
            function() {
                $('#map_popup').detach().appendTo($('body'));
                $('#minimap').detach().appendTo($('#minimap_cont'));
                $('#fullscreen').show();
                TWMap.resize(prev, true);
                TWMap.fullscreen = false;
                $(document).unbind(events)
            })
        })
    },
    showEmbeddedMap: function(topo_key, minimap_cache_stamp, x, y, highlight_village) {
        TWMap.minimap_only = true;
        TWMap.tileSize = [53, 28];
        TWMap.topoKey = topo_key;
        TWMap.minimap_highlight = highlight_village;
        TWMap.minimap_cache_stamp = minimap_cache_stamp ? minimap_cache_stamp: 0;
        TWMap.init();
        TWMap.focus(x, y, false)
    },
    storeSectorInformation: function(data_array) {
        var i;
        for (i = 0; i < data_array.length; i++) {
            var inf = data_array[i],
            data = inf.data,
            sx = data.x,
            sy = data.y;
            TWMap.storeVillage.set(sx, sy, inf.data);
            if (inf.tiles) TWMap.storeTiles.set(sx, sy, inf.tiles);
            if (inf.pmap) TWMap.storePolitical.set(sx, sy, inf.pmap);
            inf = null;
            data = null
        }
    },
    mapHandler: {
        _waitingSectors: {},
        onReceiveSectorInformation: function(data_array, skip_store) {
            if (!skip_store) TWMap.storeSectorInformation(data_array);
            for (var sector_idx = 0; sector_idx < data_array.length; sector_idx++) {
                var inf = data_array[sector_idx],
                data = inf.data,
                sx = data.x,
                sy = data.y,
                sectorData = this._waitingSectors[sx + '_' + sy];
                if (!sectorData) continue;
                if (inf.tiles) sectorData.tiles = inf.tiles;
                if (inf.pmap) sectorData.pmap = inf.pmap;
                sectorData.x = sx;
                sectorData.y = sy;
                sectorData.data = data;
                var village_ids = [];
                for (var x in data.villages) {
                    if (!data.villages.hasOwnProperty(x)) continue;
                    x = parseInt(x);
                    for (var y in data.villages[x]) {
                        if (!data.villages[x].hasOwnProperty(y)) continue;
                        y = parseInt(y);
                        var v = data.villages[x][y];
                        if (v[2] === 0) v[2] = TWMap.strings.barbarianVillage;
                        if ($.inArray(v[0], TWMap.ignore_villages) != -1) continue;
                        var xy = (sx + x) * 1e3 + sy + y;
                        TWMap.villageKey[v[0]] = xy;
                        TWMap.villages[xy] = {
                            id: v[0],
                            img: v[1],
                            name: v[2],
                            points: v[3],
                            owner: v[4],
                            mood: v[5],
                            bonus: v[6],
                            event_special: v[7],
                            xy: xy
                        };
                        village_ids.push(v[0])
                    }
                };
                if (TWMap.scriptMode) TWMap.popup.loadVillage(village_ids.join(','));
                for (var player_id in data.players) {
                    if (!data.players.hasOwnProperty(player_id)) continue;
                    var v = data.players[player_id];
                    TWMap.players[player_id] = {
                        name: v[0],
                        points: v[1],
                        ally: v[2],
                        newbie: v[3],
                        sleep: v[4],
                        image_id: v[5],
                        village_count_text: v[6]
                    }
                };
                for (var ally_id in data.allies) {
                    if (!data.allies.hasOwnProperty(ally_id)) continue;
                    var v = data.allies[ally_id];
                    TWMap.allies[ally_id] = {
                        name: v[0],
                        points: v[1],
                        tag: v[2],
                        image_id: v[3]
                    }
                };
                for (var i = 0; i < sectorData.queue.length; i++) {
                    sectorData.queue[i].loaded = true;
                    this.spawnSector(sectorData, sectorData.queue[i])
                };
                delete this._waitingSectors[sx + '_' + sy]
            }
        },
        getSectorIdByTile: function(x_coord, y_coord) {
            var sector_leftmost_x_coord = x_coord - (x_coord % 20),
            sector_topmost_y_coord = y_coord - (y_coord % 20);
            return sector_leftmost_x_coord + '_' + sector_topmost_y_coord
        },
        getSubsectorIdByTile: function(x_coord, y_coord) {
            var subsector_leftmost_x_coord = Math.floor(x_coord / 5),
            subsector_topmost_y_coord = Math.floor(y_coord / 5);
            return subsector_leftmost_x_coord + '_' + subsector_topmost_y_coord
        },
        loadSectors: function(sectors) {
            var wait_sectors = [];
            for (var i = 0; i < sectors.length; i++) {
                var sector = sectors[i],
                sx = sector.x - (sector.x % 20),
                sy = sector.y - (sector.y % 20),
                sector_id = sx + '_' + sy,
                wait_data = this._waitingSectors[sector_id];
                if (wait_data) {
                    wait_data.queue.push(sector)
                } else {
                    wait_data = {
                        id: sector_id,
                        x: sx,
                        y: sy,
                        tiles: null,
                        pmap: null,
                        data: null,
                        queue: [sector]
                    };
                    this._waitingSectors[sector_id] = wait_data;
                    wait_sectors.push(wait_data)
                }
            };
            if (wait_sectors.length < 1) return;
            this._sector_request_queue = [];
            for (var i = 0; i < wait_sectors.length; i++) {
                var wait_data = wait_sectors[i];
                wait_data.tiles = TWMap.storeTiles.get(wait_data.x, wait_data.y);
                wait_data.data = TWMap.storeVillage.get(wait_data.x, wait_data.y);
                if (TWMap.politicalMap.displayed) {
                    wait_data.pmap = TWMap.storePolitical.get(wait_data.x, wait_data.y)
                } else wait_data.pmap = [[], []];
                if (wait_data.data !== null && wait_data.tiles !== null && wait_data.pmap !== null) {
                    this.onReceiveSectorInformation([wait_data], true)
                } else this._sector_request_queue.push(wait_data)
            };
            if (this._sector_request_queue.length > 0) {
                var query_string = '/map.php?v=2&e=' + ((new Date()).getTime());
                for (var i = 0; i < this._sector_request_queue.length; i++) {
                    var wait_data = this._sector_request_queue[i],
                    query_val = 0;
                    if (wait_data.tiles === null) query_val += 1;
                    if (wait_data.pmap === null) query_val += 2;
                    query_string += '&' + wait_data.id + '=' + query_val
                };
                $.ajax({
                    type: 'GET',
                    url: query_string,
                    dataType: 'json',
                    success: function(data) {
                        return TWMap.mapHandler.onReceiveSectorInformation(data, false)
                    }
                });
                this._sector_request_queue = []
            }
        },
        onMovePixel: function(x, y) {
            if (!this.busy) TWMap.positionMinimap();
            if (TWMap.minimap_only) return;
            x -= TWMap.map.bias;
            y -= TWMap.map.bias;
            TWMap.map_el_coordy.style.top = -y + 'px';
            TWMap.map_el_coordx.style.left = -x + 'px';
            TWMap.context.hide();
            TWMap.home.updateDisplay()
        },
        onMove: function(x, y) {
            TWMap.pos = [x, y];
            if (TWMap.minimap_only) return;
            var cymax = Math.min(1e3, y + 20);
            for (var cy = Math.max(0, y - 20); cy < cymax; cy++) {
                if (TWMap._coord_el_y_active[cy]) continue;
                TWMap._coord_el_y_active[cy] = true;
                TWMap.map_el_coordy.appendChild(TWMap._coord_el_y[cy])
            };
            var cxmax = Math.min(1e3, x + 20);
            for (var cx = Math.max(0, x - 20); cx < cxmax; cx++) {
                if (TWMap._coord_el_x_active[cx]) continue;
                TWMap._coord_el_x_active[cx] = true;
                TWMap.map_el_coordx.appendChild(TWMap._coord_el_x[cx])
            };
            if (TWMap.busy) return;
            TWMap.busy = true;
            TWMap.updateContinent();
            TWMap.busy = false
        },
        onDragBegin: function() {
            TWMap.popup.unregister()
        },
        onDragEnd: function() {
            TWMap.popup.register()
        },
        onClick: function(x, y, e) {
            var village = TWMap.villages[x * 1e3 + y];
            if (village) {
                if (TWMap.warMode && Warplanner.admin) {
                    Warplanner.onVillageClicked(village.id, x, y);
                    return false
                } else if (!TWMap.context.enabled) {
                    if (!e || ($.browser.msie && ~~ ($.browser.version) < 8)) window.location.href = TWMap.urls.villageInfo.replace(/__village__/, village.id);
                    return true
                };
                TWMap.context.spawn(village, x, y)
            } else TWMap.context.hide();
            return false
        },
        onReload: function() {
            this._waitingSectors = {};
            TWMap.allies = {};
            TWMap.villages = {}
        },
        _createBorder: function(isConBorder) {
            var el = document.createElement('div');
            if (isConBorder) {
                el.className = 'map_con_border'
            } else el.className = 'map_border';
            if (TWMap.night && !TWMap.classic_gfx) el.className += '_night';
            el.style.zIndex = '3';
            el.style.position = 'absolute';
            return el
        },
        spawnSector: function(data, sector) {
            alert('Missing spawnSector function!')
        }
    },
    minimapHandler: {
        loadSector: function(sector) {
            var el = document.createElement('img');
            el.style.position = 'absolute';
            el.style.zIndex = '1';
            var vid = '';
            if (game_data && game_data.village) vid = '&village_id=' + game_data.village.id;
            var pmap = (TWMap.politicalMap.displayed && !TWMap.warMode) ? TWMap.politicalMap.filter: 0,
            church = TWMap.church.displayed ? 1 : 0,
            war = TWMap.warMode ? 1 + TWMap.warModeGeneration: 0;
            // el.setAttribute('src', '/page.php?page=topo_image&player_id=' + game_data.player.id + vid + '&x=' + sector.x + '&y=' + sector.y + '&church=' + church + '&political=' + pmap + '&war=' + war + '&watchtower=' + (TribalWars._settings.map_show_watchtower ? 1 : 0) + '&key=' + TWMap.topoKey + '&cur=' + game_data.village.id + '&focus=' + TWMap.minimap_highlight + '&local_cache=' + TWMap.minimap_cache_stamp);
            // el.setAttribute('src', 'map.php?player_id=' + game_data.player.id + '&x=' + sector.x + '&y=' + sector.y + '&key=' + TWMap.topoKey + '&cur=' + game_data.village.id);
            sector.appendElement(el, 0, 0);
            for (var village_id in TWMap.secrets) {
                if (!TWMap.secrets.hasOwnProperty(village_id)) continue;
                var type = TWMap.secrets[village_id][0],
                x = TWMap.secrets[village_id][1] - sector.x,
                y = TWMap.secrets[village_id][2] - sector.y;
                if (x < 0 || y < 0 || x >= TWMap.minimap.sectorSize || y >= TWMap.minimap.sectorSize) continue;
                var flag = document.createElement('img');
                flag.style.position = 'absolute';
                flag.style.margin = '-5px 0px 0px 2px';
                flag.style.zIndex = '2';
                flag.setAttribute('src', TWMap.image_base + '/icons/flag_' + (type == 1 ? 'blue': 'yellow') + '.png');
                sector.appendElement(flag, x, y)
            }
        },
        onMovePixel: function(x, y) {
            if (TWMap.busy) return;
            TWMap.busy = true;
            if (TWMap.map) {
                var rx = (x / TWMap.minimap.scale[0]) + TWMap.minimap_offset[0],
                ry = (y / TWMap.minimap.scale[1]) + TWMap.minimap_offset[1];
                TWMap.map.setPos(rx, ry);
                TWMap.home.updateDisplay()
            };
            TWMap.updateContinent();
            TWMap.busy = false
        },
        onClick: function(x, y, e) {
            TWMap.focus(x, y)
        }
    },
    positionMinimap: function() {
        if (this.minimap) {
            var _old_busy = this.busy;
            this.busy = true;
            this.minimap.setPos(this.map.pos[0] / this.map.scale[0] - this.minimap_offset[0], this.map.pos[1] / this.map.scale[1] - this.minimap_offset[1]);
            this.busy = _old_busy
        }
    },
    updateCommandIcon: function(village, type, visible) {
        var subsector_id = this.mapHandler.getSubsectorIdByTile(village.x, village.y);
        if (typeof this.map._loadedSectors[subsector_id] === 'undefined') return;
        if (typeof this.commandIcons[village.id] === 'undefined') this.commandIcons[village.id] = [];
        var icons = this.commandIcons[village.id];
        icons = $.grep(icons,
        function(icon) {
            return icon.img !== type
        });
        if (visible) icons.push({
            img: type
        });
        this.commandIcons[village.id] = icons;
        $(this.map._loadedSectors[subsector_id]._element_root).find('[id*=map_cmdicons_' + village.id + ']').remove();
        var icon_elements = this.generateCommandIcons(village.id),
        subsector_column = village.x % 5,
        subsector_row = village.y % 5;
        for (var i = 0; i < icon_elements.length; i++) this.map._loadedSectors[subsector_id].appendElement(icon_elements[i], subsector_column, subsector_row)
    },
    generateCommandIcons: function(village_id) {
        var icons = [];
        if (TWMap.commandIcons[village_id]) {
            var inf = TWMap.commandIcons[village_id],
            num_icons = inf.length,
            size_diff = (Math.max(2, inf.length) - 2) * 2,
            icon_width = 14 - size_diff;
            for (var i = 0; i < inf.length; i++) {
                var el_img = document.createElement('img');
                el_img.style.position = 'absolute';
                el_img.style.right = '0px';
                el_img.style.zIndex = '4';
                el_img.style.width = icon_width + 'px';
                el_img.style.height = icon_width + 'px';
                el_img.style.marginTop = '0px';
                el_img.style.marginLeft = (34 + (size_diff * 2) - i * (icon_width + 5 - size_diff)) + 'px';
                el_img.id = 'map_cmdicons_' + village_id + '_' + i;
                el_img.src = TWMap.image_base + '/map/' + inf[i].img + '.png';
                icons.push(el_img)
            }
        };
        return icons
    },
    createVillageIcons: function(v) {
        if (TWMap.minimap_only) return [];
        var icons = [];
        if (TWMap.secrets.hasOwnProperty(v.id)) {
            var color = TWMap.secrets[v.id][0] == 1 ? 'blue': 'yellow',
            el_img = document.createElement('img');
            el_img.style.position = 'absolute';
            el_img.style.top = '0px';
            el_img.style.left = '0px';
            el_img.style.width = '16px';
            el_img.style.height = '18px';
            el_img.style.marginLeft = '11px';
            el_img.style.zIndex = '3';
            el_img.src = TWMap.image_base + '/map/flag_' + color + '.png';
            icons.push(el_img)
        };
        var bottom_markers_shown = 0;
        if (TWMap.villageIcons[v.id]) {
            var inf = TWMap.villageIcons[v.id];
            for (var marker_id in inf) {
                if (!inf.hasOwnProperty(marker_id)) continue;
                var marker = inf[marker_id];
                bottom_markers_shown++;
                var el_img = document.createElement('img');
                el_img.style.position = 'absolute';
                el_img.style.top = '0px';
                el_img.style.left = '0px';
                el_img.style.width = '18px';
                el_img.style.height = '18px';
                el_img.style.zIndex = '4';
                el_img.style.marginTop = '18px';
                el_img.style.marginLeft = (bottom_markers_shown * 20 - 20) + 'px';
                el_img.id = 'map_icons_' + v.id;
                el_img.style.backgroundColor = marker.c;
                el_img.src = marker.img ? marker.img: TWMap.image_base + '/blank-16x22.png';
                icons.push(el_img)
            }
        };
        if (TWMap.reservations.hasOwnProperty(v.id)) {
            bottom_markers_shown++;
            var el_img = document.createElement('img');
            el_img.style.position = 'absolute';
            el_img.style.top = '0px';
            el_img.style.left = '0px';
            el_img.style.width = '18px';
            el_img.style.height = '18px';
            el_img.style.zIndex = '4';
            el_img.style.marginTop = '18px';
            el_img.style.marginLeft = (bottom_markers_shown * 20 - 20) + 'px';
            el_img.src = '/graphic/map/reserved_' + TWMap.reservations[v.id] + '.png';
            icons.push(el_img)
        };
        var command_icons = this.generateCommandIcons(v.id);
        $(command_icons).each(function() {
            icons.push(this)
        });
        if (TWMap.warMode && Warplanner.data[v.id] && Warplanner.data[v.id].type !== 'D') {
            var el_img = document.createElement('img'),
            img = (Warplanner.data[v.id].type === 'A') ? 'attack': 'fake';
            el_img.style.position = 'absolute';
            el_img.style.zIndex = '10';
            el_img.style.marginTop = ((38 - 30) / 2) + 'px';
            el_img.style.marginLeft = ((53 - 30) / 2) + 'px';
            el_img.src = TWMap.image_base + '/icons/warplanner_' + img + '.png';
            icons.push(el_img)
        };
        return icons
    },
    createVillageDot: function(col) {
        var circle = document.createElement('canvas');
        if (circle.getContext) {
            circle.style.position = 'absolute';
            circle.style.left = '0px';
            circle.style.top = '0px';
            circle.width = 18;
            circle.height = 18;
            circle.style.zIndex = '4';
            circle.style.marginTop = '0px';
            circle.style.marginLeft = '0px';
            var ctx = circle.getContext("2d");
            ctx.fillStyle = 'rgb(' + col[0] + ',' + col[1] + ',' + col[2] + ')';
            ctx.strokeStyle = "#000000";
            ctx.beginPath();
            ctx.arc(5, 5, 3.3, 0, Math.PI * 2, false);
            ctx.fill();
            ctx.stroke();
            return circle
        } else {
            var el_img = document.createElement('img');
            el_img.style.position = 'absolute';
            el_img.style.left = '0px';
            el_img.style.top = '0px';
            el_img.style.width = '6px';
            el_img.style.height = '6px';
            el_img.style.zIndex = '4';
            el_img.style.marginTop = '3px';
            el_img.style.marginLeft = '0px';
            el_img.style.border = '0px';
            el_img.style.backgroundColor = 'rgb(' + col[0] + ',' + col[1] + ',' + col[2] + ')';
            return el_img
        }
    },
    updateContinent: function() {
        var con = TWMap.con.continentByXY(TWMap.pos[0], TWMap.pos[1]);
        if (con != TWMap.currentCon) {
            $('#continent_id').html(con);
            TWMap.currentCon = con
        }
    },
    getMinimapScrollBound: function() {
        var r = $.extend({},
        this.scrollBound);
        r.x_min -= this.minimap_offset[0];
        r.y_min -= this.minimap_offset[1];
        r.x_max += (this.minimap_size[0] - this.minimap_offset[0] - this.size[0]);
        r.y_max += (this.minimap_size[1] - this.minimap_offset[1] - this.size[1]);
        return r
    },
    initMap: function() {
        alert('Missing initMap function!')
    },
    focus: function(x, y) {
        alert('Missing focus function!')
    },
    createSecretImageCache: function() {
        var i;
        for (i = 0; i < this.images.length; i++) {
            var m = this.images[i].match(/^([bv][0-9])((_left)?\.png)$/);
            if (m === null) continue;
            this.images_secret_blue[i] = m[1] + '_blue' + m[2];
            this.images_secret_yellow[i] = m[1] + '_yellow' + m[2]
        }
    },
    init: function() {
        this.politicalMap.optionToggle = new MapToggleBox({
            id: 'pmap_options'
        });
        this.centerToggle = new MapToggleBox({
            id: 'centercoords',
            url: this.urls.centerCoords
        });
        this.storeVillage = new TWMapStore(3, 30);
        this.storePolitical = new TWMapStore(3, 600);
        this.storeTiles = new TWMapStore(6, 86400);
        if (this.sectorPrefech) {
            this.storeSectorInformation(this.sectorPrefech);
            this.sectorPrefech = null
        };
        this.createSecretImageCache();
        this.initMap();
        if (TWMap.premium && !TWMap.light && (document.body.requestFullScreen || document.body.mozRequestFullScreen || document.body.webkitRequestFullScreen)) $('#fullscreen').show();
        this.strings.newbieProt = $('#newbieProt').val();
        this.strings.barbarianVillage = $('#barbarianVillage').val();
        this.strings.pointFormat = $('#pointFormat').val();
        this.strings.villageFormat = $('#villageFormat').val();
        this.strings.villageNotes = $('#villageNotes').val();
        this.strings.changesSaved = $('#changesSaved').val();
        this.strings.confirmCenterDelete = $('#confirmCenterDelete').val();
        this.strings.troopsSent = $('#troopsSent').val();
        TWMap.updateContinent();
        // for (var res in TWMap.reservations) {
        //     if (!TWMap.reservations.hasOwnProperty(res)) continue;
        //     if (!TWMap.villageIcons[res]) TWMap.villageIcons[res] = [];
        //     var img = '/graphic/map/reserved_' + TWMap.reservations[res] + '.png';
        //     TWMap.villageIcons[res].unshift({
        //         img: img
        //     })
        // };
        this.context.init();
        var coord = window.location.hash.match(/^#([0-9]+);([0-9]+)$/);
        if (TWMap.map && coord !== null) setTimeout(function() {
            TWMap.map.centerPos(coord[1], coord[2])
        },
        100);
        setInterval(function() {
            var hash = '#' + TWMap.pos[0] + ';' + TWMap.pos[1];
            TWMap.centerList.updateNewBoxes();
            if (hash == window.location.hash) return;
            window.location.replace(hash)
        },
        200);
        if (!TWMap.map || game_data.village.id == null) {
            TWMap.home.active = false
        } else TWMap.home.init();
        // Connection.registerObserver('map', this.synchronizer)
    },
    focusSubmit: function() {
        var x = ~~$('#mapx').val(),
        y = ~~$('#mapy').val();
        this.focusUserSpecified(x, y);
        return false
    },
    focusUserSpecified: function(x, y) {
        this.focus(x, y);
        if (TWMap.map) TWMap.map.effects.beaconVillage(x, y);
        return false
    },
    scrollBlock: function(x, y) {
        alert('scrollBlock function missing')
    },
    updateSizeSelect: function(size, selector_selectbox, selector_size) {
        var option_el;
        if (size[0] == size[1] && (option_el = $(selector_selectbox).find('option[value="' + size[0] + '"]')) && option_el.length > 0) {
            option_el.attr('selected', 'selected');
            $(selector_size).hide()
        } else {
            var sizestr = size[0] + 'x' + size[1];
            $(selector_size).show().val(sizestr).text(sizestr).attr("selected", "selected")
        }
    },
    notifyMapSize: function(isAuto, doRefresh) {
        var mapsize = this.size.join('x'),
        minisize = this.minimap_size.join('x'),
        cacheval = mapsize + '-' + minisize;
        if (TWMap._lastNotifiedMapsize == cacheval) return;
        TWMap._lastNotifiedMapsize = cacheval;
        this.updateSizeSelect(TWMap.size, '#map_chooser_select', '#current-map-size');
        this.updateSizeSelect(TWMap.minimap_size, '#minimap_chooser_select', '#current-minimap-size');
        if (!mobile && !TWMap.fullscreen) {
            $.ajax({
                url: this.urls.sizeSave,
                data: 'map_size=' + mapsize + '&minimap_size=' + minisize,
                type: 'GET',
                success: function() {
                    if (doRefresh) window.location.reload()
                }
            })
        } else if (isAuto) {
            $.cookie("mobile_mapsize", 0, {
                expires: 7
            })
        } else $.cookie("mobile_mapsize", mapsize, {
            expires: 7
        })
    },
    scaleMinimap: function() {
        var sz_min = [~~ (this.minimap.size[0] / this.minimap.scale[0]), ~~ (this.minimap.size[1] / this.minimap.scale[1])],
        sz_max;
        if (this.map) {
            sz_max = [~~ (this.map.size[0] / this.map.scale[0]), ~~ (this.map.size[1] / this.map.scale[1])]
        } else sz_max = [0, 0];
        var offset = [~~ ((sz_min[0] - sz_max[0]) / 2), ~~ ((sz_min[1] - sz_max[1]) / 2)];
        this.minimap_offset = offset;
        this.minimap_size = sz_min;
        var el = document.getElementById('minimap_viewport'),
        vp_width = sz_max[0] * this.minimap.scale[0],
        vp_height = sz_max[1] * this.minimap.scale[1];
        el.style.width = vp_width + 'px';
        el.style.height = vp_height + 'px';
        var vp_left = offset[0] * this.minimap.scale[0],
        vp_top = offset[1] * this.minimap.scale[1];
        el.style.left = vp_left + 'px';
        el.style.top = vp_top + 'px'
    },
    tileDimensions: function(el) {
        return [Math.ceil(el.width() / this.tileSize[0]), Math.ceil(el.height() / this.tileSize[1])]
    },
    notifySavedChanges: function() {
        UI.SuccessMessage(TWMap.strings.changesSaved)
    },
    centerList: {
        enabled: false,
        el_x: null,
        el_y: null,
        last_x: 0,
        last_y: 0,
        init: function() {
            if (!this.enabled) return;
            var el = $('#centerlist_new_tpl').clone().attr('id', 'centerlist_new').css('padding-top', '7px').show();
            this.el_x = el.find('input[name=center_x]').attr('id', 'center_new_x').val('');
            this.el_y = el.find('input[name=center_y]').attr('id', 'center_new_y').val('');
            this.last_x = 0;
            this.last_y = 0;
            $('#centercoords > td').append(el);
            setTimeout(function() {
                el.find('input[name=center_name]').focus()
            },
            20)
        },
        updateNewBoxes: function() {
            var x = TWMap.pos[0],
            y = TWMap.pos[1];
            if (!this.el_x || !this.el_y) return;
            if (this.el_x.is(':focus') || this.el_y.is(':focus')) return;
            if ((this.last_x && this.el_x.val() != this.last_x) || (this.last_y && this.el_y.val() != this.last_y)) return;
            this.last_x = x;
            this.last_y = y;
            this.el_x.val(x);
            this.el_y.val(y)
        },
        go: function(id) {
            var el = document.getElementById('center_' + id);
            if (!el) return false;
            el = $(el);
            var x = el.data('x'),
            y = el.data('y');
            TWMap.focusUserSpecified(~~x, ~~y)
        },
        edit: function(id) {
            var el = $('#center_' + id),
            n = $('#centerlist_new_tpl').clone().attr('id', 'centeredit_' + id);
            n.data('el', el).data('id', id).show();
            var el_x = n.find('input[name=center_x]').val(el.data('x')),
            el_y = n.find('input[name=center_y]').val(el.data('y')),
            el_name = n.find('input[name=center_name]').val(this.getName(id));
            el.after(n).detach();
            el_x.focus()
        },
        del: function(id) {
            var handleDelete = function() {
                TWMap.centerList.save(id, 0, 0, '', true)
            },
            name = this.getName(id),
            msg = TWMap.strings.confirmCenterDelete.replace(/%name%/, name),
            buttons = [{
                text: 'Confirm',
                callback: handleDelete,
                confirm: true
            }];
            UI.ConfirmationBox(msg, buttons)
        },
        submit: function(t) {
            t = $(t).parent();
            t.find('input[type=submit]').attr('disabled', 'disabled');
            var el = t.data('el'),
            id = t.data('id'),
            x = t.find('input[name=center_x]').val(),
            y = t.find('input[name=center_y]').val(),
            name = t.find('input[name=center_name]').val();
            if (el && id) {
                t.before(el).remove();
                el.data('x', ~~x).data('y', ~~y);
                el.find('.center_coord').text('(' + x + '|' + y + ')');
                this.setName(id, name);
                this.save(id, x, y, name, false)
            } else this.save( - 1, x, y, name, true);
            return false
        },
        save: function(id, x, y, name, reload) {
            $.post(TWMap.urls.centerSave, {
                id: id,
                x: x,
                y: y,
                name: name
            },
            function(data) {
                if (reload) $('#centercoords').html(data)
            },
            'html')
        },
        getName: function(id) {
            return $('#center_' + id).find('.center_name').text()
        },
        setName: function(id, val) {
            $('#center_' + id).find('.center_name').text(val)
        }
    },
    CoordByXY: function (xy) {
        return [~~ (xy / 1000), xy % 1000]
    },
    popup: {
        enabled: true,
        optionToggle: null,
        attackDots: ['', '/dots/green.png', '/dots/yellow.png', '/dots/red.png', '/dots/blue.png', '/dots/red_yellow.png', '/dots/red_blue.png'],
        attackMaxLoot: ['/max_loot/0.png', '/max_loot/1.png'],
        _px: 0,
        _py: 0,
        init: function() {
            // var cookie = $.cookie('hide_map_popup');
            // if (cookie === 'yes') {
            //     this.enabled = false
            // } else $('#show_popup').attr('checked', 'checked');
            this.enabled = true;
            this.optionToggle = new MapToggleBox({
                id: 'popup_options'
            });
            $('#form_map_popup').find('input').change(function () {
                $.post(TWMap.urls.savePopup, $('#form_map_popup').serialize(), function () {
                    TWMap.notifySavedChanges()
                });
                if (TWMap.popup.enabled) TWMap.popup.invalidateCache()
            });
            // $('#show_popup').change(function () {
            //     var displayed = $(this).is(':checked');
            //     $.cookie('hide_map_popup', displayed ? null : 'yes');
            //     TWMap.popup.enabled = displayed;
            //     TWMap.notifySavedChanges()
            // });
            this._cache = {};
            this.el = $('#map_popup');
            $(this.el).mousemove(function (event) {
                return TWMap.popup.handleMouseMove(event)
            });
            this.register();
            var _me = this;
            $(TWMap.map.el.root).mouseout(function () {
                _me.hide()
            });
            this._loadingText = $('#info_extra_info').find('td').html()
        },
        userImageURL: function(image_id) {
            var reserved_ids = 1e3;
            if (image_id < reserved_ids) {
                return TWMap.image_base + 'avatar/thumb/' + image_id + '.jpg'
            } else return TWMap.image_base + 'userimage/' + image_id + '_thumb'
        },
        invalidateCache: function() {
            this._cache = {}
        },
        invalidateVillage: function(village_id) {
            delete this._cache[village_id];
            if (this._currentVillage == village_id) this.loadVillage(village_id)
        },
        receivedPopupInformation: function (data) {
            if (data[0]) {
                for (var k = 0; data[k] !== undefined; k++) this.receivedPopupInformationForSingleVillage(data[k])
            } else {
                this.receivedPopupInformationForSingleVillage(data);
                this.calcPos()
            }
        },
        receivedPopupInformationForSingleVillage: function (data) {
            var v = TWMap.villages[data.xy];
            if (!v) return;
            if (TWMap.scriptMode) v.extra = data;
            this._cache[data.id] = data;
            var p = TWMap.CoordByXY(data.xy);
            this.displayForVillage(v, p[0], p[1]);
            if (!TWMap.cachePopupContents) delete this._cache[data.id]
        },
        popupOptionsSet: function () {
            var checkboxes = $('#popup_options').find('input[type=checkbox]'),
                state = false;
            checkboxes.each(function () {
                if ($(this).is(":checked") == true) state = true
            });
            return state
        },
        _isAwayFromContext: function (x, y) {
            if (TWMap.context._curFocus == -1) return true;
            var p = TWMap.CoordByXY(TWMap.context._curFocus),
                diff = [Math.abs(x - p[0]), Math.abs(y - p[1])];
            return diff[0] >= 2 || diff[1] >= 2
        },
        loadVillage: function (village_id) {
            $.ajax({
                url: TWMap.urls.villagePopup.replace(/__village__/, village_id),
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    return TWMap.popup.receivedPopupInformation(data)
                }
            });
            this._cache[village_id] = 'notanobject'
        },
        handleMouseMove: function (event) {
            if (this != TWMap.popup) return false;
            var pos = TWMap.map.coordByEvent(event),
                x = pos[0],
                y = pos[1],
                coordidx = x * 1000 + y,
                village = TWMap.villages[coordidx];
            if (village && TWMap.map.inViewport(x, y) && this._isAwayFromContext(x, y)) {
                TWMap.context.hide();
                if (village.special == 'ghost') {
                    TWMap.map.el.root.href = TWMap.urls.ctx.mp_invite
                } else TWMap.map.el.root.href = TWMap.urls.ctx.mp_info.replace(/__village__/, village.id);
                this._currentVillage = village.id;
                if (TWMap.map.el.mover) TWMap.map.el.mover.style.cursor = 'pointer';
                if (!this.enabled) return false;
                this._px = event.pageX;
                this._py = event.pageY;
                if (this._x != x || this._y != y) {
                    this.displayForVillage(village, x, y);
                    this.el.fadeIn(50);
                    this._is_visible = true
                } else this.calcPos()
            } else {
                if (TWMap.map.el.mover) {
                    var cursor = TWMap.warMode ? 'default': 'move';
                    TWMap.map.el.mover.style.cursor = cursor
                };
                if (this._is_visible) {
                    TWMap.map.el.root.href = '#';
                    this.hide()
                }
            };
            this._x = x;
            this._y = y
        },
        displayForVillage: function (village, x, y) {
            if (this._currentVillage != village.id) return;
            var owner = TWMap.players[village.owner],
            dat = {
                bonus: null,
                name: village.name,
                x: x,
                y: y,
                continent: TWMap.con.continentByXY(x, y),
                points: village.points,
                owner: null,
                owner_image: null,
                newbie: null,
                ally: null,
                ally_image: null,
                extra: null,
                special: null,
                units: [],
                units_display: {}
            };
            if (village.hasOwnProperty('special')) dat.special = village.special;
            if (village.bonus) dat.bonus = {
                text: village.bonus[0],
                img: TWMap.image_base + village.bonus[1]
            };
            if (owner) {
                dat.owner = owner;
                if (owner.newbie && village.owner != game_data.player.id) dat.owner.newbie_time = owner.newbie;
                if (owner.image_id && owner.image_id > 0) dat.owner_image = TWMap.popup.userImageURL(owner.image_id);
                var ally = TWMap.allies[owner.ally];
                if (ally) {
                    dat.ally = ally;
                    if (ally.image_id && ally.image_id > 0) dat.ally_image = TWMap.popup.userImageURL(ally.image_id)
                }
            };
            if (this.extraInfo && TWMap.popup.popupOptionsSet()) {
                var extra = this._cache[village.id];
                if (typeof extra === 'undefined') {
                    this.loadVillage(village.id);
                    dat.extra = false
                } else if (typeof extra === 'object') {
                    var unit_checked = {
                        total: $('#map_popup_units').is(":checked"),
                        home: $('#map_popup_units_home').is(":checked"),
                        time: $('#map_popup_units_times').is(":checked")
                    };
                    dat.units_display.count = false;
                    dat.units_display.time = unit_checked.time && extra.id != TWMap.currentVillage;
                    if (unit_checked.total || unit_checked.home || unit_checked.time) for (var name in extra.units) {
                        if (!extra.units.hasOwnProperty(name)) continue;
                        var total = parseInt(extra.units[name]['count']['home']) + parseInt(extra.units[name]['count']['foreign']),
                            has_total = (unit_checked.total && total != 0);
                        if (has_total || (unit_checked.time && extra.units[name]['time'])) {
                            var cntstr = '';
                            if (has_total) {
                                cntstr = total;
                                if (unit_checked.home && extra.units[name]['count']['home'] != 0) cntstr += '<br/><span class="unit_count_home">(' + extra.units[name]['count']['home'] + ')</span>';
                                dat.units_display.count = unit_checked.total
                            };
                            dat.units.push({
                                name: name,
                                image: extra.units[name]['image'],
                                time: extra.units[name]['time'],
                                count: cntstr
                            })
                        }
                    };
                    dat.extra = extra
                }
            };
            $('#map_popup').html(jstpl('tpl_popup', dat));
            this.calcPos();
            this.initTimers()
        },
        calcPos: function () {
            var el_size = [this.el.width(), this.el.height()],
                constraint = [$(window).scrollLeft() + 3, $(window).scrollTop() + 3, $(window).scrollLeft() + $(window).width() - 3, $(window).scrollTop() + $(window).height() - 3];
            constraint[1] += $('#topContainer').height() + 3;
            constraint[3] -= $('#footer').height() - 3;
            if ((this._py + 15 + el_size[1]) < constraint[3]) {
                y = this._py + 15
            } else if ((this._py - 15 - constraint[1]) >= el_size[1]) {
                y = this._py - el_size[1] - 15
            } else y = this._py + 15;
            x = this._px + 15;
            x -= Math.max(0, x + el_size[0] - constraint[2]);
            x = Math.max(x, $(window).scrollLeft());
            this.el.css('left', x-350 + 'px');
            this.el.css('top', y-150 + 'px')
        },
        initTimers: function() {
            var popup = this;
            $('span.map_info_timer').on('timer_end',
            function() {
                popup.loadVillage(popup._currentVillage)
            });
            Timing.tickHandlers.timers.initTimers('map_info_timer')
        },
        invalidPos: function () {
            this.el.css('left', '-2000px').css('top', '-2000px')
        },
        register: function () {
            $(TWMap.map.el.root).mousemove(function (event) {
                return TWMap.popup.handleMouseMove(event)
            })
        },
        unregister: function () {
            $(TWMap.map.el.root).unbind('mousemove');
            if (TWMap.map.el.mover) TWMap.map.el.mover.style.cursor = 'move';
            this.hide()
        },
        hide: function () {
            if (this._is_visible) {
                this._currentVillage = 0;
                this.el.fadeOut(50);
                this._x = 0;
                this._y = 0;
                this._is_visible = false
            }
        }
    },
    reload: function (set_pos) {
        if (TWMap.light) {
            TWMap.focus(TWMap.pos[0], TWMap.pos[1])
        } else {
            var pos = TWMap.map.pos;
            set_pos = set_pos || false;
            TWMap.map.reload(set_pos);
            TWMap.minimap.reload(set_pos);
            TWMap.map.pos = [0, 0];
            TWMap.minimap.pos = [0, 0];
            TWMap.map.setPosPixel(pos[0], pos[1])
        }
    },
    politicalMap: {
        displayed: false,
        filter: 1,
        optionToggle: null,
        toggle: function (toggle_options) {
            var displayed = $('#politicalmap').is(':checked'),
            filter = ~~$('#pmap_options').find('input[name="pmap_filter"]:checked').val();
            if ($('#pmap_show_topo').is(':checked')) filter += 8;
            if ($('#pmap_show_map').is(':checked')) filter += 16;
            $.ajax({
                url: TWMap.urls.changeShowPolitical,
                data: {
                    topo_show_politicalmap: displayed,
                    topo_politicalmap_filter: filter
                },
                type: 'GET',
                success: function() {
                    TWMap.notifySavedChanges()
                }
            });
            if (toggle_options) if (displayed) {
                this.optionToggle.show()
            } else this.optionToggle.hide();
            if (displayed != this.displayed || (displayed && filter != this.filter)) {
                this.displayed = displayed;
                this.filter = filter;
                TWMap.reload()
            }
        }
    },
    church: {
        displayed: false,
        // enabled: ($.browser.msie != true),
        enabled: true,
        toggle: function() {
            this.displayed = $('#belief_radius').is(':checked');
            $.ajax({
                url: TWMap.urls.changeShowBelief,
                data: {
                    topo_show_belief: this.displayed
                },
                type: 'GET',
                success: function() {
                    TWMap.notifySavedChanges()
                }
            });
            TWMap.reload()
        }
    },
    non_attackable_hide: {
        toggle: function() {
            var is_hidden = $('#non_attackable_hide').is(':checked');
            TribalWars.setSetting('map_casual_hide', is_hidden,
            function() {
                TWMap.reload();
                TWMap.notifySavedChanges()
            })
        }
    },
    watchtower: {
        toggle: function() {
            var show = $('#show_watchtower').is(':checked');
            TribalWars.setSetting('map_show_watchtower', show,
            function() {
                TWMap.reload()
            })
        }
    },
    inline_send: {
        enabled: false
    },
    con: {
        SEC_COUNT: 1,
        SUB_COUNT: 1,
        CON_COUNT: 1,
        continentByXY: function (x, y) {
            var con_x = Math.floor(x / (TWMap.con.SEC_COUNT * TWMap.con.SUB_COUNT)),
                con_y = Math.floor(y / (TWMap.con.SEC_COUNT * TWMap.con.SUB_COUNT));
            return con_x + con_y * TWMap.con.CON_COUNT
        }
    },
    context: {
        _curFocus: -1,
        _visible: true,
        strings: {},
        _circlePos: [
            [-12, -12],
            [-12, -49],
            [20, -30],
            [20, 6],
            [-11, 25],
            [-44, 6],
            [-44, -30],
            [20, -30],
            [20, 6]
        ],
        _otherOrder: ['mp_info', 'mp_lock', 'mp_profile', 'mp_msg', 'mp_fav', 'mp_res', 'mp_att', 'mp_farm_a', 'mp_farm_b'],
        _ownOrder: ['mp_info', 'mp_recruit', 'mp_profile', 'mp_overview', 'mp_fav', 'mp_res', 'mp_att', 'mp_farm_a', 'mp_farm_b'],
        _showPremium: false,
        init: function () {
            this.strings.villageFavoriteAdded = $('#villageFavoriteAdded').val();
            this.strings.villageFavoriteRemoved = $('#villageFavoriteRemoved').val()
        },
        FATooltip: {
            init: function(button, x, y) {
                var $button = $('#' + button),
                minspeed = $button.data('minspeed'),
                startVillage = game_data.village.coord.split("|"),
                distance = this.distance(startVillage[0], startVillage[1], x, y),
                duration = this.calculateDuration(distance, minspeed);
                $button.data("duration", duration);
                this.bind($button)
            },
            bind: function($button) {
                $button.bind('mouseover',
                function(e) {
                    if (typeof($button.data("tooltip")) == 'undefined') {
                        UI.ToolTip($button, {
                            bodyHandler: TWMap.context.FATooltip.create
                        });
                        $button.triggerHandler('mouseover')
                    }
                })
            },
            create: function() {
                var $button = $(this),
                tpl = $button.data("tooltip-tpl"),
                duration = $button.data("duration");
                return tpl + TWMap.context.FATooltip.formatDuration(duration)
            },
            distance: function(ax, ay, bx, by) {
                var dx = ax - bx,
                dy = ay - by;
                return Math.sqrt(dx * dx + dy * dy)
            },
            calculateDuration: function(distance, speed) {
                return Math.round(distance / speed)
            },
            formatDuration: function(duration) {
                var hours = Math.floor(duration / 3600),
                mins = Math.floor(duration / 60) % 60;
                if (mins < 10) mins = "0" + mins;
                var secs = duration % 60;
                if (secs < 10) secs = "0" + secs;
                var durationString = hours + ":" + mins + ":" + secs,
                html = "<span style='line-height: 20px'>" + durationString + "</span><br />";
                return html
            }
        },
        spawn: function(village, x, y) {
            var coordidx = x * 1e3 + y;
            if (coordidx == this._curFocus) {
                if (village.special == 'ghost') {
                    window.location.href = TWMap.urls.ctx.mp_invite
                } else window.location.href = TWMap.urls.villageInfo.replace(/__village__/, village.id);
                return true
            };
            this.hide();
            var pos;
            if (TWMap.light) {
                pos = [(x - TWMap.posTL[0]) * TWMap.tileSize[0], (y - TWMap.posTL[1]) * TWMap.tileSize[1]]
            } else {
                TWMap.popup.hide();
                var pos_center = TWMap.map.pixelByCoord(x, y),
                    pos_topleft = TWMap.map.pos;
                pos = [pos_center[0] - pos_topleft[0], pos_center[1] - pos_topleft[1]]
            };
            pos[0] += TWMap.tileSize[0] / 2;
            pos[1] += TWMap.tileSize[1] / 2;
            var me = this,
            buttons = [],
            button_order = [];
            if (!village.hasOwnProperty('special')) {
                button_order = (village.owner == game_data.player.id) ? this._ownOrder: this._otherOrder
            } else if (village.special == 'ghost') button_order = [null, null, 'mp_invite', 'mp_invite_hide'];
            var circle_pos = this._circlePos;
            $(button_order).each(function(k, v) {
                if (village.owner == '0' && (v == 'mp_profile' || v == 'mp_msg')) {
                    return
                } else if (!me._showPremium && (v == 'mp_recruit' || v == 'mp_fav' || v == 'mp_lock')) {
                    return
                } else if ((v == 'mp_farm_a' || v == 'mp_farm_b') && (!game_data.player.farm_manager || VillageContext.send_attack_disabled || village.owner > 0 || village.event_special > 0)) {
                    return
                } else if (game_data.village.id == village.id && (v == 'mp_res' || v == 'mp_att')) {
                    return
                } else if (game_data.player.ally == 0 && v == 'mp_lock') {
                    return
                } else if (!village.points && (v == 'mp_fav' || v == 'mp_lock')) {
                    return
                } else if (!VillageContext.claim_enabled && v === 'mp_lock') {
                    return
                } else if (v == 'mp_res' && parseInt(village.event_special) == 5) return;
                if (v === 'mp_msg' && !VillageContext.igm_enabled) return;
                if (v == 'mp_att' && !VillageContext.send_troops_enabled) return;
                if (v == 'mp_lock' && TWMap.reservations[village.id]) v = 'mp_unlock';
                if (v == 'mp_fav' && jQuery.inArray(parseInt(village.id), TWMap.targets) != -1) v = 'mp_unfav';
                if (v == 'mp_farm_a' || v == 'mp_farm_b') TWMap.context.FATooltip.init(v, x, y);
                $('#' + v).css('left', (pos[0] + circle_pos[k][0]) + 'px').css('top', (pos[1] + circle_pos[k][1]) + 'px').stop().css('opacity', 0).show().fadeTo(120, 1.0);
                if (TWMap.urls.ctx[v]) {
                    var url = TWMap.urls.ctx[v].replace(/__village__/, village.id).replace(/__owner__/, village.owner).replace(/__source__/, game_data.village.id);
                    if (url.match(/json=1/)) {
                        me.ajaxRegister(v, url)
                    } else $('#' + v)[0].href = url;
                    if (!mobile) if (v == 'mp_att') {
                        $('#' + v).off('click').on('click',
                        function(e) {
                            if (e.which != 1 || e.ctrlKey || e.shiftKey) return true;
                            if (TWMap.inline_send.enabled) {
                                TWMap.actionHandlers.command.click(village.id);
                                return false
                            }
                        })
                    } else if (v == 'mp_res') $('#' + v).off('click').on('click',
                    function(e) {
                        if (e.which != 1 || e.ctrlKey || e.shiftKey) return true;
                        if (TWMap.inline_send.enabled) {
                            TWMap.actionHandlers.market.click(village.id);
                            return false
                        }
                    })
                };
                buttons.push(v)
            });
            this._curFocus = coordidx;
            this._visible = true
        },
        ajaxRegister: function(v, url) {
            $('#' + v).unbind('click').click(function(e) {
                e.preventDefault();
                var now = new Date().getTime();
                if (this._last && (now - this._last < 900)) return;
                this._last = now;
                // $.ajax({
                //     url: url,
                //     dataType: 'json',
                //     success: function (data) {
                //         TWMap.context.ajaxDone(v, data)
                //     }
                // });
                TribalWars.get(url, null,
                function(data) {
                    TWMap.context.ajaxDone(v, data)
                });
                return false
            })
        },
        ajaxDone: function (key, data) {
            this.hide();
            var message_container = TWMap.fullscreen ? $('#map_wrap') : null;
            switch (key) {
            case 'mp_lock':
            case 'mp_unlock':
                if (!data.code) {
                    // DWAR.print_info(data.error,'error');
		    UI.ErrorMessage(data.error, null, message_container);
                    break
                };
                // if (data.notice) DWAR.print_info(data.notice,'success');
		// if (!TWMap.villageIcons[data.village]) TWMap.villageIcons[data.village] = [];
                // var icons = TWMap.villageIcons[data.village];
                // if (data.type == 'delete') {
                //    for (var k in icons) if (icons.hasOwnProperty(k) && icons[k].img && icons[k].img.match(/reserved/)) {
                //        delete TWMap.reservations[data.village];
                //        icons.splice(k, 1);
                //        break
                //    }
                //} else {
                //    TWMap.reservations[data.village] = "player";
                //    icons.unshift({
                //        img: '/graphic/map/reserved_player.png'
                //    })
                // };
		if (data.notice) UI.InfoMessage(data.notice, null, null, message_container);
                if (key === 'mp_lock') {
                    TWMap.reservations[data.village] = 'player'
                } else delete TWMap.reservations[data.village];
                TWMap.popup.invalidateCache();
                TWMap.reload();
                break;
            case 'mp_fav':
            case 'mp_unfav':
                if (!data.code) {
                    // DWAR.print_info(data.error,'error');
		    UI.ErrorMessage(data.error, null, message_container);
                    break
                };
                if (key == 'mp_fav') {
                    DWAR.print_info(this.strings.villageFavoriteAdded,'success');
		    UI.SuccessMessage(this.strings.villageFavoriteAdded, null, message_container);
                    TWMap.targets.push(data.id)
                } else {
                    // DWAR.print_info(this.strings.villageFavoriteRemoved,'error');
		    UI.SuccessMessage(this.strings.villageFavoriteRemoved, null, message_container);
                    var k = jQuery.inArray(data.id, TWMap.targets);
                    if (k != -1) TWMap.targets[k] = 0
                };
                break;
            case 'mp_farm_a':
            case 'mp_farm_b':
                if (data.error) {
                    // DWAR.print_info(data.error,'error')
		    UI.ErrorMessage(data.error, null, message_container)
                } else if (data.success) {
                    if (!TWMap.commandIcons[data.target_village]) {
                        TWMap.commandIcons[data.target_village] = [{
                            img: 'attack'
                        }]
                    } else {
                        var attack = false;
                        $.each(TWMap.commandIcons[data.target_village], function () {
                            if (this.img == 'attack') {
                                attack = true;
                                return false
                            }
                        });
                        if (!attack) TWMap.commandIcons[data.target_village].push({
                            img: 'attack'
                        })
                    };
		    TWMap.reload()
                    TWMap.popup.invalidateCache();
                    UI.InfoMessage(TWMap.strings.troopsSent, null, null, message_container)
                };
                break;
            case 'mp_invite_hide':
                document.location.reload();
                break
            }
        },
        hide: function () {
            if (this._visible) {
                $('.mp').stop().fadeTo(300, 0.0, function () {
                    if (!TWMap.context._visible) $('.mp').hide()
                });
                this._visible = false;
                this._curFocus = -1
            }
        }
    },
    home: {
        active: true,
        boundary: null,
        go_home: null,
        text: null,
        pointer: null,
        is_premium_account_hint_shown: false,
        focus: function() {
            var home = game_data.village;
            TWMap.focusUserSpecified(home.x, home.y)
        },
        init: function() {
            if (this.active) {
                this.createDisplayComponents();
                this.updateDisplay()
            }
        },
        createDisplayComponents: function() {
            var $home_boundary = $('<div id="map_go_home_boundary"></div>'),
            $go_home = $('<div id="map_go_home"></div>'),
            $inner_circle = $('<div id="map_go_home_circle"></div>');
            $inner_circle.click(TWMap.home.focus);
            var $text = $('<div id="map_go_home_text">home</div>');
            $inner_circle.append($text);
            var $pointer = $('<div id="map_go_home_pointer"></div>');
            $go_home.append($pointer);
            $go_home.append($inner_circle);
            $home_boundary.append($go_home);
            $('#map_wrap').append($home_boundary);
            this.boundary = $('#map_go_home_boundary');
            this.go_home = $('#map_go_home');
            this.text = $('#map_go_home_text');
            this.pointer = $('#map_go_home_pointer')
        },
        pointHome: function() {
            var home = game_data.village,
            center = TWMap.map.getCenter();
            center = {
                x: center[0],
                y: center[1]
            };
            var y = home.y - center.y,
            x = home.x - center.x,
            angle = Math.atan2(y, x);
            this.pointer.css({
                transform: 'rotate(' + angle + 'rad)'
            })
        },
        updateDistance: function() {
            var home = game_data.village,
            center = TWMap.map.getCenter();
            center = {
                x: center[0],
                y: center[1]
            };
            var distance = Math.sqrt((home.x - center.x) * (home.x - center.x) + (home.y - center.y) * (home.y - center.y));
            this.text.text(Math.floor(distance));
            if (distance >= 15 && distance < 16) this.advertisePremiumIfNeeded()
        },
        skirt: function() {
            var home = game_data.village,
            center = TWMap.map.getCenter();
            center = {
                x: center[0],
                y: center[1]
            };
            var home_pos = {
                x: home.x * TWMap.map.scale[0],
                y: home.y * TWMap.map.scale[1]
            },
            center_pos = {
                x: TWMap.map.pos[0] + TWMap.map.size[0] / 2,
                y: TWMap.map.pos[1] + TWMap.map.size[1] / 2
            },
            x = home_pos.x - center_pos.x,
            y = home_pos.y - center_pos.y,
            angle = -Math.atan2(y, x);
            if (angle < 0) angle = 2 * Math.PI + angle;
            var corner_angle = this.getTopRightCornerAngle(),
            side = 'bottom';
            if (angle < corner_angle || angle >= Math.PI * 2 - corner_angle) {
                side = 'right'
            } else if (angle <= Math.PI - corner_angle) {
                side = 'top'
            } else if (angle <= Math.PI + corner_angle) side = 'left';
            var bound = {
                left: 0 + $('#map_coord_y_wrap').width(),
                top: 0,
                right: TWMap.map.size[0] - 50,
                bottom: TWMap.map.size[1] - 50 - $('#map_coord_x_wrap').height()
            },
            left_offset = bound.left,
            top_offset = bound.top;
            switch (side) {
            case 'left':
                left_offset = bound.left;
                break;
            case 'right':
                left_offset = bound.right;
                break;
            case 'bottom':
                top_offset = bound.bottom;
                break;
            case 'top':
            default:
                left_offset = bound.left;
                break
            };
            if (side == 'right' || side == 'left') {
                var mod = (side == 'right') ? 1 : -1;
                top_offset = TWMap.map.size[1] / 2 - mod * (Math.tan(angle) * (TWMap.map.size[0] / 2));
                top_offset = Math.max(Math.min(top_offset, bound.bottom), bound.top)
            };
            if (side == 'top' || side == 'bottom') {
                var mod = (side == 'top') ? 1 : -1,
                left_offset = TWMap.map.size[0] / 2 - mod * (Math.tan(angle + Math.PI / 2) * (TWMap.map.size[1] / 2));
                if (home.x < center.x) {
                    left_offset = Math.max(left_offset, bound.left)
                } else left_offset = Math.min(left_offset, bound.right)
            };
            this.go_home.css({
                left: left_offset + 'px',
                top: top_offset + 'px'
            })
        },
        updateDisplay: function() {
            if (!this.active) return;
            var home = game_data.village;
            if (TWMap.map.inViewport(home.x, home.y)) {
                this.go_home.hide();
                return
            } else this.go_home.show();
            TWMap.home.updateDistance();
            TWMap.home.pointHome();
            TWMap.home.skirt()
        },
        getTopRightCornerAngle: function() {
            var delta_x = TWMap.map.size[0] / 2,
            delta_y = TWMap.map.size[1] / 2;
            return Math.atan2(delta_y, delta_x)
        },
        advertisePremiumIfNeeded: function() {
            if (game_data.player.premium || this.is_premium_account_hint_shown || this.mobile) return;
            $('.premium_account_hint').show().css({
                display: 'inline-block'
            });
            this.is_premium_account_hint_shown = true
        }
    },
    getColorByPlayer: function (player_id, ally_id, village_id) {
        if (!this.players[player_id]) return TWMap.colors.other;
        if (this.players[player_id].sleep) {
            return TWMap.colors['sleep']
        } else if (village_id && TWMap.villageColors[village_id] && player_id != game_data.player.id) {
            return TWMap.villageColors[village_id]
        } else if (TWMap.playerColors[player_id]) {
            return TWMap.playerColors[player_id]
        } else if (player_id == game_data.player.id) {
            return TWMap.colors.player
        } else if (ally_id && TWMap.allyColors[ally_id]) {
            return TWMap.allyColors[ally_id]
        } else if (game_data.player.ally > 0 && ally_id == game_data.player.ally) {
            return TWMap.colors.ally
        } else if (TWMap.allyRelations[ally_id]) {
            return TWMap.colors[TWMap.allyRelations[ally_id]]
        } else if (TWMap.friends[player_id]) {
            return TWMap.colors['friend']
        } else return TWMap.colors.other
    },
    actionHandlers: {}
};
$(function() {
    'use strict';
    TWMap.synchronizer = {
        notify: function(event_name, data) {
            if (this.handlers.hasOwnProperty(event_name)) this.handlers[event_name](data)
        },
        handlers: {
            command_count: function(data) {
                if (!TWMap.map || !TWMap.premium) return false;
                var is_visible = data.count > 0;
                TWMap.updateCommandIcon(data.target_village, data.command_type, is_visible);
                TWMap.popup.invalidateVillage(data.target_village.id)
            }
        }
    }
} ());
TWMap.actionHandlers.command = {
    click: function(target_id) {
        CommandPopup.openRallyPoint({
            target: target_id
        })
    }
};
TWMap.actionHandlers.market = {
    click: function(target_id) {
        TribalWars.get('market', {
            ajax: 'send',
            target: target_id
        },
        function(data) {
            Dialog.show('popup_command', data.dialog);
            $('#market-send-form').on('submit', TWMap.actionHandlers.market.sendResources)
        })
    },
    sendResources: function() {
        var data = $(this).serializeArray();
        TribalWars.post('market', {
            ajax: 'confirm'
        },
        data,
        function(result) {
            Dialog.show('map_market', result.dialog);
            $('#market-confirm-form').on('submit', TWMap.actionHandlers.market.confirmSendResources)
        });
        return false
    },
    confirmSendResources: function() {
        var data = $(this).serializeArray();
        TribalWars.post('market', {
            ajaxaction: 'map_send'
        },
        data,
        function(result) {
            Dialog.close();
            UI.SuccessMessage(result.message)
        });
        return false
    }
}
function TWMapStore(_size, _ttl) {
    var that = this,
        size = _size,
        ttl = _ttl * 1000,
        data = new Array(size),
        i, j;
    for (i = 0; i < size; i++) {
        data[i] = new Array(size);
        for (j = 0; j < size; j++) data[i][j] = null
    };
    this.get = function (x, y) {
        var dx = (x / 20) % size,
            dy = (y / 20) % size,
            e = data[dx][dy],
            now = new Date().getTime();
        if (e === null || e[0] !== x || e[1] !== y) return null;
        if (e[2] < now) {
            data[dx][dy] = null;
            return null
        };
        return e[3]
    };
    this.set = function (x, y, obj) {
        var dx = (x / 20) % size,
            dy = (y / 20) % size,
            expire = new Date().getTime() + ttl,
            el = [x, y, expire, obj];
        data[dx][dy] = el
    }
}