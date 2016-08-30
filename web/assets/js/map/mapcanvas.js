/*f8f44b944f3ae324164db48f93e8613c*/
var MapCanvas = {
    box: 3,
    init: function () {
        var i;
        if (this.churchData) for (i = 0; i < this.churchData.length; i++) this.churchData[i][2] *= this.churchData[i][2]
    },
    createCanvas: function (sector, data) {
        var canvas = document.createElement('canvas');
        if (!canvas || !canvas.getContext) return null;
        var tileScale = TWMap.map.scale,
            size = TWMap.map.sectorSize;
        canvas.id = 'map_canvas_' + sector.x + '_' + sector.y;
        canvas.className = 'church_radius_display';
        canvas.width = (tileScale[0] * size);
        canvas.height = (tileScale[1] * size);
        canvas.style.position = 'absolute';
        canvas.style.zIndex = '10';
        sector.appendElement(canvas, 0, 0);
        var ctx = canvas.getContext("2d"),
            i;
        ctx.save();
        var churches = this.churchData,
            map = data.pmap[0],
            ally = data.pmap[1],
            width = 20;
        if (map.length < 1) map = null;
        var tilew = canvas.offsetWidth / size,
            tileh = canvas.offsetHeight / size;
        ctx.scale(tilew / 37.75, tileh / 37.75);
        var x, y, cells, pmap_filter = TWMap.politicalMap.filter % 8,
            war_mode = TWMap.warMode,
            show_pmap = !war_mode && TWMap.politicalMap.displayed && (TWMap.politicalMap.filter & 16),
            war;
        if (war_mode) war = Warplanner.data;
        for (y = sector.y - 1; y < sector.y + size + 1; y++) for (x = sector.x - 1; x < sector.x + size + 1; x++) {
            if (war_mode) {
                var ee = x * 1000 + y;
                if (war && TWMap.villages.hasOwnProperty(ee)) {
                    var id = TWMap.villages[ee].id;
                    if (war[id] && war[id].type !== 'D') {
                        cells = [false, false, false, false, true, false, false, false, false];
                        var col = Warplanner.getColorByPlayerId(war[id].player_id);
                        this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, col, 19, 19, .6)
                    }
                }
            };
            if (show_pmap) {
                var dx = x - data.x + 1,
                    dy = y - data.y + 1,
                    ee = dx + dy * (width + 2),
                    show_cell;
                if (map && map[ee] !== 0) {
                    var aa = (dx - 1) + (dy - 1) * (width + 2),
                        bb = (dx - 0) + (dy - 1) * (width + 2),
                        cc = (dx + 1) + (dy - 1) * (width + 2),
                        dd = (dx - 1) + (dy) * (width + 2),
                        ff = (dx + 1) + (dy) * (width + 2),
                        gg = (dx - 1) + (dy + 1) * (width + 2),
                        hh = (dx - 0) + (dy + 1) * (width + 2),
                        ii = (dx + 1) + (dy + 1) * (width + 2),
                        we = dx < 1,
                        ea = dx >= width + 1,
                        no = dy < 1,
                        so = dy >= width + 1;
                    if (pmap_filter == 1 || map[ee] == game_data.player.id) {
                        cells = [we || no ? 0 : map[aa], no ? 0 : map[bb], ea || no ? 0 : map[cc], we ? 0 : map[dd], map[ee], ea ? 0 : map[ff], we || so ? 0 : map[gg], so ? 0 : map[hh], so || ea ? 0 : map[ii]];
                        var col = [255, 0, 255],
                            pid = map[ee],
                            aid = ally[ee];
                        col = TWMap.getColorByPlayer(pid, aid);
                        this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, col, 19, 19, .6)
                    };
                    if (pmap_filter == 1 || pmap_filter == 2 || (pmap_filter != 4 && ally[ee] == game_data.player.ally_id)) {
                        cells = [we || no ? 0 : ally[aa], no ? 0 : ally[bb], ea || no ? 0 : ally[cc], we ? 0 : ally[dd], ally[ee], ea ? 0 : ally[ff], we || so ? 0 : ally[gg], so ? 0 : ally[hh], so || ea ? 0 : ally[ii]];
                        this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, [0, 0, 0], 5, 19, 1)
                    }
                }
            };
            if (TWMap.church.displayed && churches) {
                cells = [false, false, false, false, false, false, false, false, false];
                for (i = 0; i < churches.length; i++) {
                    var cx = churches[i][0],
                        cy = churches[i][1],
                        crad = churches[i][2];
                    cells = [cells[0] || this.churchInBound(x - 1, y - 1, cx, cy, crad), cells[1] || this.churchInBound(x, y - 1, cx, cy, crad), cells[2] || this.churchInBound(x + 1, y - 1, cx, cy, crad), cells[3] || this.churchInBound(x - 1, y, cx, cy, crad), cells[4] || this.churchInBound(x, y, cx, cy, crad), cells[5] || this.churchInBound(x + 1, y, cx, cy, crad), cells[6] || this.churchInBound(x - 1, y + 1, cx, cy, crad), cells[7] || this.churchInBound(x, y + 1, cx, cy, crad), cells[8] || this.churchInBound(x + 1, y + 1, cx, cy, crad)]
                };
                this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, [128, 128, 255], 19, 19, .5)
            }
        };
        ctx.restore();
        ctx = null;
        canvas = null;
        return null
    },
    mapDrawCell: function (ctx, x, y, cells, color, bw, rad, grad) {
        if (cells[4] === 0 || !color) return;
        x = (x + .5) * 38;
        y = (y + .5) * 38;
        ctx.save();
        ctx.translate(x, y);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[3] == cells[4], cells[0] == cells[4], cells[1] == cells[4], rad), bw, color, grad);
        ctx.restore();
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(Math.PI * .5);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[1] == cells[4], cells[2] == cells[4], cells[5] == cells[4], rad), bw, color, grad);
        ctx.restore();
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(Math.PI);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[5] == cells[4], cells[8] == cells[4], cells[7] == cells[4], rad), bw, color, grad);
        ctx.restore();
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(Math.PI * 1.5);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[7] == cells[4], cells[6] == cells[4], cells[3] == cells[4], rad), bw, color, grad);
        ctx.restore()
    },
    mapDrawBorderLine: function (ctx, points, width, color, grad) {
        if (points.length < 1) return;
        var p = 2,
            normals = [],
            x1, y1, x2, y2, dx, dy, sqlen, len, nx, ny, nx1, ny1, nx2, ny2, nx0, ny0, cg;
        for (var i = 0; i < points.length - 2; i += 2) {
            x1 = points[i];
            y1 = points[i + 1];
            x2 = points[i + 2];
            y2 = points[i + 3];
            dx = x2 - x1;
            dy = y2 - y1;
            sqlen = dx * dx + dy * dy;
            len = Math.sqrt(sqlen);
            normals[i] = dy / len;
            normals[i + 1] = -dx / len
        };
        var oldgco = ctx.globalCompositeOperation,
            oldfs = ctx.fillStyle;
        if (!grad) ctx.fillStyle = "rgba(" + color[0] + "," + color[1] + "," + color[2] + ",.7)";
        while (points[p + 4] != null) {
            x1 = points[p];
            y1 = points[p + 1];
            x2 = points[p + 2];
            y2 = points[p + 3];
            nx0 = normals[p - 2];
            ny0 = normals[p - 1];
            nx1 = normals[p];
            ny1 = normals[p + 1];
            nx2 = normals[p + 2];
            ny2 = normals[p + 3];
            nx = nx1;
            ny = ny1;
            nx2 += nx1;
            ny2 += ny1;
            nx1 += nx0;
            ny1 += ny0;
            len = Math.sqrt(nx2 * nx2 + ny2 * ny2);
            if (len > 0) {
                nx2 /= len;
                ny2 /= len
            };
            len = Math.sqrt(nx1 * nx1 + ny1 * ny1);
            if (len > 0) {
                nx1 /= len;
                ny1 /= len
            };
            if (grad) {
                cg = ctx.createLinearGradient(x1, y1, x1 + nx * width, y1 + ny * width);
                cg.addColorStop(0, "rgba(" + color[0] + "," + color[1] + "," + color[2] + "," + grad + ")");
                cg.addColorStop(1, "rgba(" + color[0] + "," + color[1] + "," + color[2] + ",0)");
                ctx.fillStyle = cg
            };
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.lineTo(x2 + nx2 * width, y2 + ny2 * width);
            ctx.lineTo(x1 + nx1 * width, y1 + ny1 * width);
            ctx.closePath();
            ctx.fill();
            p += 2
        };
        ctx.fillStyle = oldfs;
        ctx.globalCompositeOperation = oldgco
    },
    mapGetSectorLine: function (west, northwest, north, o) {
        var line = [],
            i = 0,
            s = 0.9,
            b = 19;
        if (!west && !north) {
            line[i++] = o;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = -o * 0.1;
            line[i++] = -o * s;
            line[i++] = -o * .35 * s;
            line[i++] = -o * .95 * s;
            line[i++] = -o * Math.SQRT1_2 * s;
            line[i++] = -o * Math.SQRT1_2 * s;
            line[i++] = -o * .95 * s;
            line[i++] = -o * .35 * s;
            line[i++] = -o * s;
            line[i++] = -o * .1;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = o
        } else if (west && !north && !northwest) {
            line[i++] = o;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = -b;
            line[i++] = -o * s;
            line[i++] = -o * 2;
            line[i++] = -o * s
        };
        if (west && !north && northwest) {
            line[i++] = o;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = -o * .2;
            line[i++] = -o * s;
            line[i++] = -o * .6;
            line[i++] = -o;
            line[i++] = -b + o * .2;
            line[i++] = -b - o * .2;
            line[i++] = -o * 2;
            line[i++] = -o * 2.4
        };
        if (!west && north && !northwest) {
            line[i++] = -o * s;
            line[i++] = -o * 2;
            line[i++] = -o * s;
            line[i++] = -b;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = o
        };
        if (!west && north && northwest) {
            line[i++] = -o * 2.4;
            line[i++] = -o * 2;
            line[i++] = -b - o * .2;
            line[i++] = -b + o * .2;
            line[i++] = -o;
            line[i++] = -o * .6;
            line[i++] = -o * s;
            line[i++] = -o * .2;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = o
        };
        return line
    },
    churchInBound: function (x, y, cx, cy, crad) {
        var dx = x - cx,
            dy = y - cy;
        return dx * dx + dy * dy <= crad
    }
}