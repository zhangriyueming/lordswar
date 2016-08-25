/*dfb9cdc9f880aafc6fa2dd15b932d8ae*/
var ColorGroups = {
    for_groups_id: null,
    for_groups_name: null,
    for_villages_toggle: function (event, group_id, url) {
        var x = event.offset().left,
            y = event.offset().top - 400;
        ColorGroups.for_groups_id = group_id;
        ColorGroups.for_groups_name = unescapeHtml($('#groupname_' + ColorGroups.for_groups_id).html());
        UI.AjaxPopup(null, 'for_villages_popup', url, 'schließen', ColorGroups.handle_for_groups_reload, {
            dataType: 'html',
            reload: true
        }, 290, 450, x, y)
    },
    add_for_village: function () {
        $('#new_group').show()
    },
    handle_for_groups_reload: function (data, target) {
        $('#msg_infobox').hide();
        $("#for_villages_popup_content").html(data);
        $('#for_group_id').val(ColorGroups.for_groups_id);
        $('#for_group_name').val(ColorGroups.for_groups_name);
        ColorGroups.get_asssigned(ColorGroups.for_groups_id, 'ally');
        ColorGroups.get_asssigned(ColorGroups.for_groups_id, 'player');
        ColorGroups.get_asssigned(ColorGroups.for_groups_id, 'village');
        $("#rename_group").click(function () {
            ColorGroups.ajax_request("rename_group", $('#for_group_name').val());
            $('#groupname_' + ColorGroups.for_groups_id).
            html(escapeHtml($('#for_group_name').val()))
        });
        $("#add_new_tribe").click(function () {
            ColorGroups.ajax_request("add_new_tribe", $('#new_tribe').val(), 'ally');
            $('#new_tribe').val('').focus()
        });
        $("#add_new_player").click(function () {
            ColorGroups.ajax_request("add_new_player", $('#new_player').val(), 'player');
            $('#new_player').val('').focus()
        });
        $("#add_new_village").click(function () {
            ColorGroups.ajax_request("add_new_village", {
                x: $('#add_village_x').val(),
                y: $('#add_village_y').val()
            }, 'village');
            $('#new_player').val('').focus()
        })
    },
    get_asssigned: function (groupid, what) {
        ColorGroups.for_group_id = groupid;
        var call = '',
            table = null,
            remove = '';
        if (what == 'ally') {
            call = 'get_tribes_in_group';
            table = $('#tribes > tbody');
            remove = 'del_tribe'
        };
        if (what == 'player') {
            call = 'get_players_in_group';
            table = $('#players > tbody');
            remove = 'del_player'
        };
        if (what == 'village') {
            call = 'get_villages_in_group';
            table = $('#villages > tbody');
            remove = 'del_village'
        };
        $.ajax({
            method: 'POST',
            url: $('#for_villages_form').attr('action'),
            type: 'POST',
            data: {
                what: call,
                group_id: groupid
            },
            dataType: 'json',
            success: function (data) {
                table.empty();
                $(data).each(function (index, item) {
                    var tr = $('<tr>'),
                        td = $('<td>').html(item.name),
                        del = $("<a>").attr('href', '#').html("löschen").click(function () {
                            ColorGroups.ajax_request(remove, item.id, what);
                            return false
                        }),
                        td2 = $('<td>').append(del);
                    tr.append(td);
                    tr.append(td2);
                    table.append(tr)
                });
                if (what == 'village') if (data.length > 0) {
                    $('#toggle_villages_link').show()
                } else $('#toggle_villages_link').hide()
            }
        })
    },
    ajax_request: function (what, data, reload) {
        $('#msg_infobox').html(UI.Throbber);
        $.ajax({
            type: 'POST',
            url: $('#for_villages_form').attr('action'),
            data: {
                what: what,
                group_id: ColorGroups.for_group_id,
                data: data
            },
            dataType: 'json',
            success: function (response) {
                ColorGroups.set_response(response.msg);
                if (response.code === true) {
                    if (reload == 'ally') ColorGroups.get_asssigned(ColorGroups.for_group_id, 'ally');
                    if (reload == 'player') ColorGroups.get_asssigned(ColorGroups.for_group_id, 'player');
                    if (reload == 'village') {
                        ColorGroups.get_asssigned(ColorGroups.for_group_id, 'village');
                        $('#add_village_x').val('');
                        $('#add_village_y').val('')
                    }
                }
            }
        })
    },
    set_response: function (response) {
        $('#msg_infobox').html(response);
        $('#msg_infobox').show()
    },
    own_villages_toggle: function (event) {
        var popup = $("#own_villages");
        popup.toggle();
        var x = 0,
            y = 0,
            link = null;
        if (event.srcElement) {
            link = event.srcElement
        } else link = event.target;
        if ($.cookie('popup_pos_own_villages')) {
            var pos = $.cookie('popup_pos_own_villages').split('x');
            x = parseInt(pos[0], 10);
            y = parseInt(pos[1], 10)
        } else {
            x = $(link).offset().left;
            y = $(link).offset().top - popup.height() - 5
        };
        popup.offset({
            left: x,
            top: y
        });
        UI.Draggable(popup)
    },
    group_villages_toggle: function () {
        $('#villages').slideToggle('fast')
    },
    r_picker: 0,
    g_picker: 0,
    b_picker: 0,
    picker_group_id: null,
    picker_icon: null,
    handle_color_picker_reload: function (data, target) {
        $(target).html(data);
        $('#color_picker').show();
        $('#group_id').val(picker_group_id);
        if (picker_icon == null) {
            $('#icon_picker').hide();
            $('#trans_color').hide()
        } else $('#icon_url').val(picker_icon);
        color_picker_choose(r_picker, g_picker, b_picker, true);
        if ($('#trans_color_input').attr('checked')) 
            $('#color').css('background-color', 'transparent')
    },
    edit_color_toggle: function (event, url, group_id, r, g, b, icon, t) {
        var x = event.offset().left + 50,
            y = event.offset().top - 100,
            full_url = url + "&r=" + r + "&g=" + g + "&b=" + b;
        if (t) full_url += "&trans=" + t;
        r_picker = r;
        g_picker = g;
        b_picker = b;
        picker_group_id = group_id;
        picker_icon = icon;
        UI.AjaxPopup(null, 'edit_color_popup', full_url, 'schließen', ColorGroups.handle_color_picker_reload, {
            dataType: 'html',
            reload: true
        }, 290, 250, x, y)
    }
}