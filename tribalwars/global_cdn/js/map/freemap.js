/*484ac77b641eb4b73cb947a1616eec83*/

function FreeMap(div, coordToPixelScale, sectorSize, userHandler, bias) {
    var _self_map = this;
    this.el = {};
    this.el.root = div;
    this.el.container = document.createElement('div');
    $(this.el.container).attr('style', 'position: absolute; left:0px; top:0px; z-index:1; overflow:visible');
    this.el.container.setAttribute('id', div.id + '_container');
    div.appendChild(this.el.container);
    this.size = [parseInt(div.style.width, 10), parseInt(div.style.height, 10)];
    this.scale = coordToPixelScale;
    this.sectorSize = sectorSize;
    this.pos = [-1, - 1];
    this.handler = userHandler;
    if (userHandler.onClick) {
        var _me = this;
        if ($.browser.msie) {
            $(this.el.root).mousedown(function (e) {
                _me._downEl = (e.which == 2 ? 0 : 1)
            }).mouseup(function (e) {
                if (_me._downEl == 1) if (!_me._handleClick(e)) {
                    _me._downEl = 2;
                    return false
                };
                _me._downEl = 0;
                return true
            }).click(function (e) {
                if (_me._downEl == 2) return false
            })
        } else $(this.el.root).click(function (e) {
            if (e.which == 2) return true;
            return _me._handleClick(e)
        })
    };
    this._lastTopLeftSector = [0, 0];
    this._lastBottomRightSector = [0, 0];
    this._visibleSectors = {};
    this._loadedSectors = {};
    this.viewport = [0, 0, 0, 0];
    this.bias = bias;
    this._handleClick = function (e) {
        if (this.mover && this.mover.moveDirty) return false;
        var pos = this.coordByEvent(e);
        return this.handler.onClick(pos[0], pos[1], e)
    };
    this.coordByPixel = function (x, y, use_float) {
        if (use_float === true) {
            return [x / this.scale[0], y / this.scale[1]]
        } else return [Math.floor(x / this.scale[0]), Math.floor(y / this.scale[1])]
    };
    this.pixelByCoord = function (x, y) {
        return [(x * this.scale[0]), (y * this.scale[1])]
    };
    this.sectorByPixel = function (x, y) {
        return [Math.floor(x / this.scale[0] / this.sectorSize), Math.floor(y / this.scale[1] / this.sectorSize)]
    };
    this.coordByEvent = function (event) {
        var off = $(this.el.root).offset(),
            pos = [event.pageX - off.left + this.pos[0], event.pageY - off.top + this.pos[1]],
            x = Math.floor(pos[0] / this.scale[0]),
            y = Math.floor(pos[1] / this.scale[1]);
        return [x, y]
    };
    this.centerPos = function (x, y, fix_to_square) {
        var px = x * this.scale[0] - this.size[0] / 2 + this.scale[0] / 2,
            py = y * this.scale[1] - this.size[1] / 2 + this.scale[1] / 2;
        if (fix_to_square === true) {
            px -= (px % this.scale[0]);
            py -= (py % this.scale[1])
        };
        return this.setPosPixel(px, py)
    };
    this.setPos = function (x, y) {
        return this.setPosPixel(x * this.scale[0], y * this.scale[1])
    };
    this.setPosPixel = function (x, y) {
        if (x == this.pos[0] && y == this.pos[1]) return 0;
        if (isNaN(x) || isNaN(y)) return 0;
        x = Math.max(x, this.handler.scrollBound[0] * this.scale[0]);
        y = Math.max(y, this.handler.scrollBound[1] * this.scale[1]);
        this.pos[0] = x;
        this.pos[1] = y;
        if (this.handler.onMovePixel) this.handler.onMovePixel(x, y);
        var new_sect_count = 0,
            posBR = [x + this.size[0], y + this.size[1]],
            sTL = this.sectorByPixel(x, y),
            sBR = this.sectorByPixel(posBR[0], posBR[1]);
        if (!compareCoord(this._lastTopLeftSector, sTL) || !compareCoord(this._lastBottomRightSector, sBR)) {
            var _sectors = [],
                load_sectors = [];
            for (var sx = sTL[0]; sx <= sBR[0]; sx++) for (var sy = sTL[1]; sy <= sBR[1]; sy++) {
                var sectorID = sx + '_' + sy,
                    sector = this._loadedSectors[sectorID];
                if (!sector) {
                    sector = {
                        id: sectorID,
                        visible: false,
                        loaded: true,
                        sx: sx,
                        sy: sy,
                        x: sx * this.sectorSize,
                        y: sy * this.sectorSize,
                        _elements: [],
                        _element_root: null,
                        _map: _self_map,
                        appendElement: function (el, x, y) {
                            el.style.left = (x * this._map.scale[0]) + 'px';
                            el.style.top = (y * this._map.scale[1]) + 'px';
                            this._elements.push(el);
                            if (this.dom_fragment === undefined) {
                                this._element_root.appendChild(el)
                            } else this.dom_fragment.appendChild(el)
                        },
                        spawn: function () {
                            if (this.visible) return;
                            this._map.el.container.appendChild(this._element_root);
                            this.visible = true
                        },
                        despawn: function (force_rem) {
                            if (!this.visible) return;
                            this._map.el.container.removeChild(this._element_root);
                            if (force_rem === true) this._element_root = null;
                            this.visible = false
                        }
                    };
                    var r = document.createElement('div');
                    r.style.width = (this.scale[0] * this.sectorSize) + 'px';
                    r.style.height = (this.scale[1] * this.sectorSize) + 'px';
                    r.style.position = 'absolute';
                    r.style.left = ((sx * this.sectorSize) * this.scale[0] - this.bias) + 'px';
                    r.style.top = ((sy * this.sectorSize) * this.scale[1] - this.bias) + 'px';
                    sector._element_root = r;
                    sector.spawn();
                    if (!this.handler.scrollBound || (sector.x >= (this.handler.scrollBound[0] - this.sectorSize) && sector.y >= (this.handler.scrollBound[1] - this.sectorSize) && sector.x < this.handler.scrollBound[2] && sector.y < this.handler.scrollBound[3])) load_sectors.push(sector)
                };
                _sectors.push(sector)
            };
            if (load_sectors.length) {
                new_sect_count = load_sectors.length;
                if (this.handler.loadSectors) {
                    this.handler.loadSectors(load_sectors)
                } else for (var idx = 0; idx < new_sect_count; idx++) this.handler.loadSector(load_sectors[idx])
            };
            if (_sectors.length) {
                if (this.handler.preLoad) this.handler.preLoad(_sectors.length);
                var _newVisibleSectors = {},
                    _len = _sectors.length;
                for (var idx = 0; idx < _len; idx++) {
                    var sector = _sectors[idx];
                    if (sector.loaded) sector.spawn();
                    _newVisibleSectors[sector.id] = sector;
                    this._loadedSectors[sector.id] = sector
                };
                for (var idx in this._visibleSectors) {
                    if (!this._visibleSectors.hasOwnProperty(idx)) continue;
                    var it_sect = this._visibleSectors[idx];
                    if (_newVisibleSectors[it_sect.id] === undefined) {
                        it_sect.despawn();
                        delete this._loadedSectors[idx]
                    }
                };
                if (this.handler.postLoad) this.handler.postLoad();
                this._visibleSectors = _newVisibleSectors
            }
        };
        var coordPos = this.getCenter();
        if ((!this.lastCenterCoordPos || !compareCoord(coordPos, this.lastCenterCoordPos))) {
            if (this.handler.onMove) this.handler.onMove(coordPos[0], coordPos[1]);
            this.lastCenterCoordPos = coordPos;
            this.recalcViewport()
        };
        x -= this.bias;
        y -= this.bias;
        this.el.container.style.left = -x + 'px';
        this.el.container.style.top = -y + 'px';
        return new_sect_count
    };
    this.getCenter = function () {
        return this.coordByPixel(this.pos[0] + this.size[0] / 2, this.pos[1] + this.size[1] / 2)
    };
    this.recalcViewport = function () {
        var x = this.pos[0],
            y = this.pos[1],
            coordTopLeft = this.coordByPixel(x, y),
            coordBottomRight = this.coordByPixel(x + this.size[0], y + this.size[1]);
        this.viewport = [coordTopLeft[0], coordTopLeft[1], coordBottomRight[0], coordBottomRight[1]]
    };
    this.inViewport = function (x, y) {
        return x >= this.viewport[0] && y >= this.viewport[1] && x <= this.viewport[2] && y <= this.viewport[3]
    };
    this.createMover = function (speed) {
        this.mover = new FreeMapMover(this);
        this.mover.setSpeed(speed)
    };
    this.reload = function (set_pos, keep_data) {
        if (!keep_data) {
            for (var idx in this._loadedSectors) {
                if (!this._loadedSectors.hasOwnProperty(idx)) continue;
                var sector = this._loadedSectors[idx];
                sector.despawn(true)
            };
            this._loadedSectors = {}
        };
        this._visibleSectors = {};
        if (this.handler.onReload) this.handler.onReload();
        if (set_pos !== false) {
            var x = this.pos[0],
                y = this.pos[1];
            this.pos = [0, 0];
            this.setPosPixel(x, y)
        }
    };
    this._resizeElements = [];
    this._resizeTargetPosition = [];
    this.resize = function (sx, sy, flags) {
        var els = [
            [],
            []
        ],
            center = this.getCenter();
        if (!(flags & 2)) {
            els[0].push(this.el.root);
            els[1].push(this.el.root)
        };
        if (this.handler.hasOwnProperty('getResizableElements')) {
            var els_add = this.handler.getResizableElements();
            els[0] = els[0].concat(els_add[0]);
            els[1] = els[1].concat(els_add[1])
        };
        this.size = [sx, sy];
        if (this.handler.hasOwnProperty('onResize')) this.handler.onResize(sx, sy);
        if (flags & 1) {
            $(els[0]).animate({
                width: sx + 'px'
            }, {
                duration: 400,
                queue: false
            });
            $(els[1]).animate({
                height: sy + 'px'
            }, {
                duration: 400,
                queue: false
            })
        } else {
            $(els[0]).width(sx);
            $(els[1]).height(sy)
        };
        if (!(flags & 2)) {
            this.centerPos(center[0], center[1], false);
            this.recalcViewport()
        }
    };
    this._lastResizeSize = 0;
    this.createResizer = function (min_size, max_size, step) {
        step = step || 1;
        $(this.el.root).resizable({
            grid: [step * this.scale[0], step * this.scale[1]],
            minWidth: min_size[0] * this.scale[0],
            maxWidth: max_size[0] * this.scale[0],
            minHeight: min_size[1] * this.scale[1],
            maxHeight: max_size[1] * this.scale[1],
            handles: 'se',
            zIndex: 13,
            start: $.proxy(function (event, ui) {
                if (this.handler.hasOwnProperty('onResizeBegin')) this.handler.onResizeBegin();
                TWMap.busy = true;
                this._resizeTargetPosition = this.getCenter()
            }, this),
            stop: $.proxy(function () {
                TWMap.busy = false;
                this.centerPos(this._resizeTargetPosition[0], this._resizeTargetPosition[1], false);
                if (this.handler.hasOwnProperty('onResizeEnd')) this.handler.onResizeEnd()
            }, this)
        }).resize($.proxy(function () {
            var el = $(this.el.root),
                sz = el.width() * 100000 + el.height();
            if (sz == this._lastResizeSize) return;
            this._lastResizeSize = sz;
            this.resize(el.width(), el.height(), 2);
            this.pos = [0, 0];
            this.centerPos(this._resizeTargetPosition[0], this._resizeTargetPosition[1], false);
            this.recalcViewport()
        }, _self_map))
    };
    return true
}

function FreeMapMover(map) {
    this.moveDirty = false;
    this.allowDrag = true;
    this.dragHandler = null;
    this.dragBeginHandler = null;
    this.dragEndHandler = null;
    this.dragBeginPosition = [];
    this.fixTouchEvent = function (event) {
        if (event.changedTouches) {
            event.clientX = event.changedTouches[0].clientX;
            event.clientY = event.changedTouches[0].clientY;
            event.pageX = event.changedTouches[0].pageX;
            event.pageY = event.changedTouches[0].pageY
        };
        return event
    };
    this.handleMouseDown = function (event) {
        if (this.touchIdentifier != null) {
            event.preventDefault();
            return false
        };
        event = this.fixTouchEvent(event);
        if (event.changedTouches) this.touchIdentifier = event.changedTouches[0].identifier;
        this.containerPos = [-(parseInt(this._map.el.container.style.left) - this._map.bias), - (parseInt(this._map.el.container.style.top) - this._map.bias)];
        this.mousePos = [event.clientX, event.clientY];
        this.moveDirty = false;
        if (this.crappy_browser) {
            this._el.setCapture();
            this._el.attachEvent('onmousemove', this._eventHandleMouseMove);
            this._el.attachEvent('onmouseup', this._eventHandleMouseUp);
            this._el.attachEvent('onlosecapture', this._eventHandleMouseUp)
        } else {
            window.addEventListener('touchmove', this._eventHandleMouseMove, true);
            window.addEventListener('mousemove', this._eventHandleMouseMove, true);
            window.addEventListener('touchend', this._eventHandleMouseUp, true);
            window.addEventListener('mouseup', this._eventHandleMouseUp, true);
            event.preventDefault()
        };
        if (this.useDragTimer !== false) {
            var _me = this;
            this.dragTimer = setInterval(function () {
                _me.IEDragTimer()
            }, this.useDragTimer);
            this.dragBeginPosition = [event.clientX, event.clientY];
            this.lastMousePositionForTimer = [event.clientX, event.clientY]
        }
    };
    this.handleMouseUp = function (event) {
        if (event.changedTouches && event.changedTouches[0].identifier != this.touchIdentifier) return false;
        this.touchIdentifier = null;
        if (this.crappy_browser) {
            this._el.releaseCapture();
            this._el.detachEvent('onmousemove', this._eventHandleMouseMove);
            this._el.detachEvent('onmouseup', this._eventHandleMouseUp);
            this._el.detachEvent('onlosecapture', this._eventHandleMouseUp)
        } else {
            window.removeEventListener('touchmove', this._eventHandleMouseMove, true);
            window.removeEventListener('mousemove', this._eventHandleMouseMove, true);
            window.removeEventListener('touchend', this._eventHandleMouseMove, true);
            window.removeEventListener('mouseup', this._eventHandleMouseUp, true)
        };
        if (this.useDragTimer !== false) {
            clearInterval(this.dragTimer);
            this.dragTimer = undefined
        };
        if (this.moveDirty) if (this.allowDrag && this._map.handler.hasOwnProperty('onDragEnd')) {
            this._map.handler.onDragEnd()
        } else if (this.dragEndHandler) this.dragEndHandler();
        if (!this.moveDirty && event.changedTouches && this._map.handler.onClick) {
            event = this.fixTouchEvent(event);
            var _ev = {};
            _ev.pageX = event.changedTouches[0].pageX;
            _ev.pageY = event.changedTouches[0].pageY;
            var pos = this._map.coordByEvent(_ev);
            this._map.handler.onClick(pos[0], pos[1])
        };
        setTimeout(jQuery.proxy(function () {
            this.moveDirty = false
        }, this), 50);
        event.returnValue = false;
        if (event.preventDefault) event.preventDefault();
        return false
    };
    this.IEDragTimer = function () {
        var ev = {
            clientX: this.lastMousePositionForTimer[0],
            clientY: this.lastMousePositionForTimer[1]
        };
        if (ev.clientX == 0 && ev.clientY == 0) return;
        this.handleMouseMove(ev, true)
    };
    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)) {
        this.useDragTimer = 100
    } else if ($.browser.webkit | $.browser.safari) {
        this.useDragTimer = 40
    } else if ($.browser.mozilla) {
        this.useDragTimer = 40
    } else if ($.browser.msie) {
        this.useDragTimer = 60
    } else if ($.browser.opera) {
        this.useDragTimer = 30
    } else this.useDragTimer = 60;
    this.handleMouseMove = function (event, is_timer_call) {
        if (event.changedTouches && event.changedTouches[0].identifier != this.touchIdentifier) return false;
        event = this.fixTouchEvent(event);
        if (this.useDragTimer !== false && is_timer_call === undefined) {
            this.lastMousePositionForTimer = [event.clientX, event.clientY];
            return false
        };
        var diff = [event.clientX - this.mousePos[0], event.clientY - this.mousePos[1]];
        this.mousePos = [event.clientX, event.clientY];
        var pos = [this.containerPos[0] - diff[0] * this._speed, this.containerPos[1] - diff[1] * this._speed];
        if (this._map.handler.scrollBound) {
            var limit = this._map.handler.scrollBound,
                nTL = this._map.coordByPixel(pos[0], pos[1], true);
            if (nTL[0] < limit[0] && diff[0] > 0) diff[0] = 0;
            if (nTL[1] < limit[1] && diff[1] > 0) diff[1] = 0;
            var nBR = this._map.coordByPixel(pos[0] + this._map.size[0], pos[1] + this._map.size[1]);
            if (nBR[0] > limit[2] && diff[0] < 0) diff[0] = 0;
            if (nBR[1] > limit[3] && diff[1] < 0) diff[1] = 0
        };
        if ((diff[0] != 0 || diff[1] != 0) && this.moveDirty == false) {
            if (this.allowDrag && this._map.handler.onDragBegin) {
                this._map.handler.onDragBegin()
            } else if (this.dragBeginHandler) this.dragBeginHandler();
            this.moveDirty = true
        };
        if (!this.allowDrag) {
            if (this.moveDirty && this.dragHandler) this.dragHandler(this.dragBeginPosition, this.mousePos, diff);
            return false
        };
        this.containerPos[0] -= diff[0] * this._speed;
        this.containerPos[1] -= diff[1] * this._speed;
        this._map.setPosPixel(this.containerPos[0], this.containerPos[1]);
        return false
    };
    this.setSpeed = function (speed) {
        this._speed = speed
    };
    this.preventDrag = function (v, beginHandler, endHandler) {
        if (v === true || v === false) {
            this.allowDrag = !v;
            this.dragHandler = null;
            this.dragEndHandler = null;
            $(this._el).css('cursor', 'move')
        } else {
            this.allowDrag = false;
            this.dragHandler = v;
            this.dragBeginHandler = beginHandler;
            this.dragEndHandler = endHandler;
            $(this._el).css('cursor', 'default')
        }
    };
    var el = document.createElement('div');
    el.setAttribute('id', map.el.root.id + '_mover');
    $(el).attr('style', 'position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 12; background-image: url("index-Dateien/empty.png"); cursor: move; -moz-user-select: none;');
    this.crappy_browser = (el.setCapture && el.detachEvent);
    var _this = this;
    this._eventHandleMouseDown = function (event) {
        return _this.handleMouseDown(event)
    };
    this._eventHandleMouseMove = function (event) {
        return _this.handleMouseMove(event)
    };
    this._eventHandleMouseUp = function (event) {
        return _this.handleMouseUp(event)
    };
    this._speed = 1;
    if (this.crappy_browser) {
        el.attachEvent('onmousedown', this._eventHandleMouseDown)
    } else {
        el.addEventListener('touchstart', this._eventHandleMouseDown, true);
        el.addEventListener('mousedown', this._eventHandleMouseDown, true)
    };
    this._map = map;
    this._el = el;
    map.el.mover = el;
    map.el.root.appendChild(el)
}

function compareCoord(a, b) {
    return (a[0] == b[0] && a[1] == b[1])
}