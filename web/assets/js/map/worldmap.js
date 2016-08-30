/*42753e7fc69c12052ad44e1f4be72604*/
var Worldmap = {
    Data: {
        t: 0
    },
    init: function (t) {
        Worldmap.Data.t = t;
        $("#worldmap").draggable({
            stop: Worldmap.savePosition,
            containment: [0, 60]
        })
    },
    toggle: function () {
        if ((typeof toggle_value == 'undefined') || (toggle_value == false)) {
            if (typeof toggle_value == 'undefined') Worldmap.reload();
            toggle_value = true
        } else toggle_value = false;
        switch (toggle_value) {
        case true:
            $("#worldmap").show();
            break;
        case false:
            $("#worldmap").hide();
            break;
        default:
            break
        }
    },
    reload: function () {
        var params = '&cut=true';
        $('#worldmap_settings').children(':checked').each(function () {
            switch ($(this).attr('name')) {
            case 'worldmap_barbarian_toggle':
                params += "&barbarian=true";
                break;
            case 'worldmap_ally_toggle':
                params += "&ally=true";
                break;
            case 'worldmap_partner_toggle':
                params += "&partner=true";
                break;
            case 'worldmap_nap_toggle':
                params += "&nap=true";
                break;
            case 'worldmap_enemy_toggle':
                params += "&enemy=true";
                break;
            default:
                break
            }
        });
        if (Worldmap.Data.t > 0) params = params + '&t=' + Worldmap.Data.t;
        Worldmap.loadMapImage(params)
    },
    loadMapImage: function (params) {
        $('#worldmap_body').hide();
        $('#worldmap-throbber').show();
        var img = new Image();
        img.onload = function () {
            $('#worldmap-throbber').hide();
            $('#secrets').css('left', (this.width - 1000) / 2).css('top', (this.height - 1000) / 2);
            var x_bias = 500 - this.width / 2,
                y_bias = 500 - this.height / 2;
            $('#worldmap_image > input').width(this.width).height(this.height).click(function (e) {
                var off = $(this).offset(),
                    x = e.offsetX ? e.offsetX : (e.pageX - this.offsetLeft - off.left),
                    y = e.offsetY ? e.offsetY : (e.pageY - this.offsetTop - off.top);
                x += x_bias;
                y += y_bias;
                Worldmap.toggle();
                TWMap.map.centerPos(x, y);
                return false
            });
            $('#worldmap_body').width(this.width).height(this.height).css('background-image', 'url(' + this.src + ')').show()
        };
        img.src = 'page.php?page=worldmap_image' + params
    },
    savePosition: function (event, ui) {
        $.cookie('worldmap_left', $(this).css('left'));
        $.cookie('worldmap_top', $(this).css('top'))
    }
}