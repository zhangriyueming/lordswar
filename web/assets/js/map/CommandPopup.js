var CommandPopup; (function() {
    'use strict';
    CommandPopup = {
        command_sent_hooks: [],
        openRallyPoint: function(params) {
            params = $.extend({
                ajax: 'command'
            },
            params);
            TribalWars.get('place', params,
            function(data) {
                Dialog.show('popup_command', data.dialog);
                $('#command-data-form').on('submit', CommandPopup.sendTroops);
                $('#command_change_sender').on('click', CommandPopup.SenderSelection.open)
            });
            return false
        },
        sendTroops: function() {
            var data = $('#command-data-form').serializeArray();
            data.push({
                name: command_target_widget.clicked_button,
                value: 'l'
            });
            TribalWars.post('place', {
                ajax: 'confirm'
            },
            data,
            function(result) {
                Dialog.show('popup_command', result.dialog);
                $('#command-data-form').on('submit', CommandPopup.confirmSendTroops);
                $('#troop_confirm_back').on('click', CommandPopup.goBack)
            });
            return false
        },
        confirmSendTroops: function() {
            var data = $('#command-data-form').serializeArray();
            TribalWars.post('place', {
                ajaxaction: 'popup_command'
            },
            data,
            function(response) {
                Dialog.close();
                UI.SuccessMessage(response.message);
                for (var i = 0; i < CommandPopup.command_sent_hooks.length; i++) CommandPopup.command_sent_hooks[i](response)
            });
            return false
        },
        goBack: function() {
            var data = $('#command-data-form').serializeArray(),
            object = {};
            $.each(data,
            function(k, a) {
                object[a.name] = a.value
            });
            CommandPopup.openRallyPoint(object);
            return false
        },
        hookCommandSent: function(hook) {
            this.command_sent_hooks.push(hook)
        },
        SenderSelection: {
            open: function() {
                if ($('#command_target')[0]) command_target_widget.beforeSubmit();
                var data = $('#command-data-form').serializeArray();
                data.push({
                    name: command_target_widget.clicked_button,
                    value: 'l'
                });
                TribalWars.post('place', {
                    ajax: 'sender'
                },
                data,
                function(result) {
                    Dialog.show('popup_command', result.dialog);
                    $('#command_sender_back').on('click', CommandPopup.goBack);
                    $('.command_sender_choose').on('click',
                    function() {
                        return CommandPopup.SenderSelection.choose($(this).data('village'))
                    });
                    $('#command_sender_group').on('change', CommandPopup.SenderSelection.open)
                });
                return false
            },
            choose: function(village_id) {
                $('#command-data-form').find("input[name='source_village']").val(village_id);
                return CommandPopup.goBack()
            },
            changeGroup: function(group_id) {
                return CommandPopup.SenderSelection.open()
            }
        }
    }
} ());