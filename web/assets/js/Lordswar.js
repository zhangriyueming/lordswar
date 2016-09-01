var TribalWars; (function() {
    'use strict';
    TribalWars = {
        _script: '/game.php',
        _loadedJS: [],
        _onLoadHandler: null,
        _inputCache: {},
        _previousData: {},
        _data_update_stamps: {},
        _settings: {
            sound: false
        },
        _tabID: null,
        _tabActive: true,
        _tabTimeout: false,
        _lastActivity: null,
        _lastSound: 0,
        _chat: null,
        fetch: function(url) {
            this.registerOnLoadHandler(null);
            this.cacheInputVars();
            this.showLoadingIndicator();
            $.getJSON(url,
            function(data) {
                TribalWars.hideLoadingIndicator();
                TribalWars.handleResponse(data);
                UI.init();
                UnitPopup.init()
            })
        },
        get: function(location, get_params, success_callback, error_callback, silent) {
            var url = this.buildURL('GET', location, get_params);
            this.request('GET', url, {},
            success_callback, error_callback, silent)
        },
        post: function(location, get_params, post_data, success_callback, error_callback, silent) {
            var url = this.buildURL('POST', location, get_params);
            this.request('POST', url, post_data, success_callback, error_callback, silent)
        },
        request: function(method, url, params, success_callback, error_callback, silent) {
            if (silent !== true) this.showLoadingIndicator();
            $.ajax({
                url: url + '&client_time=' + Math.round(Timing.getCurrentServerTime() / 1e3),
                data: params,
                type: method,
                dataType: 'json',
                headers: {
                    'TribalWars-Ajax': 1
                },
                success: function(data) {
                    TribalWars.hideLoadingIndicator();
                    TribalWars.handleResponse(data, success_callback, error_callback)
                },
                error: function(xhr, status) {
                    TribalWars.hideLoadingIndicator();
                    if (xhr.readyState === 0) return;
                    if (xhr.status === 429) {
                        UI.ErrorMessage('Your action was blocked because you are making too many requests to our servers.', 3e3);
                        return
                    };
                    UI.ErrorMessage('Request failed. The server may be experiencing difficulties.');
                    if (typeof error_callback === 'function') error_callback()
                }
            })
        },
        redirect: function(location, params) {
            var url = TribalWars.buildURL('GET', location, params);
            window.location.href = url
        },
        buildURL: function(method, input, params) {
            var url = '';
            if (typeof input === 'string') if (input.charAt() === '/') {
                url = input;
                if (typeof params === 'object') input = params
            } else input = $.extend({
                screen: input
            },
            params);
            if (url === '') if (game_data.hasOwnProperty('village')) {
                url = TribalWars._script + '?village=' + game_data.village.id
            } else url = TribalWars._script + '?village=';
            if (typeof input === 'object' && input !== null) url += '&' + $.param(input);
            if ((method === 'POST' || (typeof input === 'object' && input !== null && input.hasOwnProperty('action'))) && url.indexOf('h=') === -1) url += '&h=' + window.csrf_token;
            if (game_data.player.sitter > 0) url += '&t=' + game_data.player.id;
            return url
        },
        handleResponse: function(data, callback, error_callback) {
            TribalWars._previousData = $.extend(true, {},
            window.game_data);
            if (data.hasOwnProperty('redirect')) {
                var current_url = String(document.location),
                index_new_url = current_url.indexOf(data.redirect);
                if (index_new_url === -1 || current_url.substring(index_new_url) !== data.redirect) {
                    document.location = data.redirect;
                    return
                }
            };
            if (!data.hasOwnProperty('error') && !data.hasOwnProperty('response') && !data.hasOwnProperty('content')) {
                UI.ErrorMessage('Request failed. The server may be experiencing difficulties.');
                return
            };
            if (data.error) {
                UI.ErrorMessage(data.error);
                if (typeof error_callback === 'function') error_callback();
                return
            };
            if (data.time_diff) UI.InfoMessage(data.time_diff);
            if (data.content) $('#content_value').html(data.content);
            if (data.content) {
                UI.ToolTip('.tooltip');
                TribalWars.contentLoaded()
            };
            if (data.game_data) {
                var screen = window.game_data.screen;
                TribalWars.updateGameData(data.game_data);
                window.game_data.screen = screen;
                setTimeout(function() {
                    Timing.resetTickHandlers()
                },
                10)
            };
            if (data.quest_data) Quests.setQuestData(data.quest_data, true);
            if (data.response === 'partial_reload') {
                $(document).trigger('partial_reload_end')
            } else if (data.response) callback(data.response);
            if (mobile) {
                TribalWars.updateHeaderOnMobile()
            } else TribalWars.updateHeader();
            if (data.bot_protect) BotProtect.show(data.bot_protect)
        },
        updateGameData: function(pending_data) {
            if (typeof window.game_data === 'undefined') {
                window.game_data = pending_data
            } else {
                TribalWars._previousData = $.extend(true, {},
                window.game_data);
                $.each(pending_data,
                function(key, property) {
                    TribalWars.mergeGameDataProperty(key, property, pending_data.time_generated, window.game_data, TribalWars._data_update_stamps)
                })
            };
            if (typeof window.game_data.village !== 'undefined') if (!Village.isPrototypeOf(window.game_data.village)) window.game_data.village = $.extend(true, Object.create(Village), window.game_data.village)
        },
        mergeGameDataProperty: function(key, pending_property, time_generated, current_properties, last_updates) {
            if (typeof pending_property === 'object' && pending_property !== null) {
                if (!last_updates.hasOwnProperty(key)) last_updates[key] = {};
                if (!current_properties[key]) current_properties[key] = {};
                $.each(pending_property,
                function(sub_key, sub_property) {
                    TribalWars.mergeGameDataProperty(sub_key, sub_property, time_generated, current_properties[key], last_updates[key])
                })
            } else if (!last_updates.hasOwnProperty(key) || last_updates[key] < time_generated) {
                current_properties[key] = pending_property;
                last_updates[key] = time_generated
            }
        },
        handleGameData: function(data) {
            TribalWars.updateGameData(data);
            if (mobile) {
                TribalWars.updateHeaderOnMobile()
            } else TribalWars.updateHeader();
            if (data.hasOwnProperty('village')) Timing.resetTickHandlers()
        },
        showLoadingIndicator: function() {
            $('#loading_content').show()
        },
        hideLoadingIndicator: function() {
            $('#loading_content').hide()
        },
        updateHeader: function() {
            if (window.game_data.hasOwnProperty('village')) {
                $('#storage').text(game_data.village.storage_max);
                var $pop_current_label = $('#pop_current_label');
                $pop_current_label.text(game_data.village.pop);
                changeResStyle($pop_current_label, Format.get_warn_pop_class(game_data.village.pop, game_data.village.pop_max, game_data.village.is_farm_upgradable));
                $('#pop_max_label').text(game_data.village.pop_max);
                if (parseInt(this._previousData.player.rank) !== parseInt(game_data.player.rank)) {
                    var $rank_rank = $('#rank_rank').html(game_data.player.rank_formatted);
                    if (this._previousData.player.rank > game_data.player.rank) {
                        $rank_rank.addClass('increased');
                        setTimeout(function() {
                            $rank_rank.removeClass('increased')
                        },
                        100)
                    }
                };
                if (parseInt(this._previousData.player.points) !== parseInt(game_data.player.points)) {
                    var $rank_points = $('#rank_points').html(game_data.player.points_formatted);
                    if (this._previousData.player.points < game_data.player.points) {
                        $rank_points.addClass('increased');
                        setTimeout(function() {
                            $rank_points.removeClass('increased')
                        },
                        100)
                    }
                }
            };
            $('#premium_points').text(game_data.player.pp);
            var $new_mail = $('#new_mail'),
            mail_faded = $new_mail.hasClass('new_mail_faded'),
            new_mails = parseInt(game_data.player.new_igm);
            if (new_mails > 0 && mail_faded) {
                $new_mail.removeClass('new_mail_faded').addClass('new_mail')
            } else if (new_mails === 0 && !mail_faded) $new_mail.hide();
            $('.badge-mail').text(new_mails ? ' (' + new_mails + ')': '');
            var $new_report = $('#new_report'),
            report_faded = $new_report.hasClass('new_report_faded'),
            new_reports = parseInt(game_data.player.new_report);
            if (new_reports > 0 && report_faded) {
                $new_report.removeClass('new_report_faded').addClass('new_report')
            } else if (new_reports === 0 && !report_faded) $new_report.hide();
            $('.badge-report').text(new_reports ? ' (' + new_reports + ')': '');
            var new_posts = parseInt(game_data.player.new_forum_post),
            new_ally_invites = parseInt(game_data.player.new_ally_invite),
            new_ally_applications = parseInt(game_data.player.new_ally_application),
            new_ally_items = new_posts + new_ally_invites + new_ally_applications,
            $tribe_forum = $('#tribe_forum_indicator');
            if ($tribe_forum.hasClass('no_new_post') && new_posts) {
                $tribe_forum.removeClass('no_new_post').addClass('new_post').attr('title', 'New post in private forum')
            } else if ($tribe_forum.hasClass('new_post') && !new_posts) $tribe_forum.removeClass('new_post').addClass('no_new_post').attr('title', 'No new posts in the tribe forum');
            $('.badge-ally-forum-post').text(new_posts ? ' (' + new_posts + ')': '');
            $('.badge-ally-application').text(new_ally_applications ? ' (' + new_ally_applications + ')': '');
            $('.badge-ally-invite').text(new_ally_invites ? ' (' + new_ally_invites + ')': '');
            $('#menu_counter_ally').text(new_ally_items ? ' (' + new_ally_items + ')': '');
            var new_buddy_requests = parseInt(game_data.player.sitter) ? 0 : parseInt(game_data.player.new_buddy_request),
            new_daily_bonus = parseInt(game_data.player.sitter) ? 0 : parseInt(game_data.player.new_daily_bonus),
            new_items = parseInt(game_data.player.new_items),
            new_profile_items = new_buddy_requests + new_items + new_daily_bonus;
            $('.badge-buddy').text(new_buddy_requests ? ' (' + new_buddy_requests + ')': '');
            $('.badge-daily-bonus').text(new_daily_bonus ? ' (' + new_daily_bonus + ')': '');
            $('.badge-inventory').text(new_items ? ' (' + new_items + ')': '');
            $('#menu_counter_profile').text(new_profile_items ? ' (' + new_profile_items + ')': '');
            var $commands = $('#header_commands');
            if (game_data.player.incomings !== this._previousData.player.incomings) {
                if (!$commands.hasClass('has_incomings') && parseInt(game_data.player.incomings) > 0) {
                    $commands.addClass('has_incomings')
                } else if ($commands.hasClass('has_incomings') && parseInt(game_data.player.incomings) === 0) $commands.removeClass('has_incomings');
                $('#incomings_amount').text(game_data.player.incomings);
                Favicon.update()
            };
            if (window.premium && parseInt(game_data.player.supports) !== parseInt(this._previousData.player.supports)) {
                if (!$commands.hasClass('has_supports') && parseInt(game_data.player.supports) > 0) {
                    $commands.addClass('has_supports')
                } else if ($commands.hasClass('has_supports') && parseInt(game_data.player.supports) === 0) $commands.removeClass('has_supports');
                $('#supports_amount').text(game_data.player.supports)
            }
        },
        updateHeaderOnMobile: function() {
            $('#storage').text(game_data.village.storage_max);
            $('#pop_current_label').text(game_data.village.pop);
            $('#pop_max_label').text(game_data.village.pop_max);
            var $new_mail = $('#notify_mail');
            if ($new_mail.css('display') === 'none' && parseInt(game_data.player.new_igm) === 1) {
                $new_mail.show()
            } else if ($new_mail.css('display') !== 'none' && parseInt(game_data.player.new_igm) === 0) $new_mail.hide();
            var $new_report = $('#notify_report');
            if ($new_report.css('display') === 'none' && parseInt(game_data.player.new_report) === 1) {
                $new_report.show()
            } else if ($new_report.css('display') !== 'none' && parseInt(game_data.player.new_report) === 0) $new_report.hide();
            var $tribe_forum = $('#notify_forum');
            if (parseInt(game_data.player.new_forum_post) === 1) {
                $tribe_forum.show()
            } else $tribe_forum.hide();
            var $incomings = $('#notify_incomings');
            if (parseInt(game_data.player.incomings) > 0) {
                $incomings.show()
            } else $incomings.hide();
            $incomings.find('.mNotifyNumber').last().text(game_data.player.incomings);
            var $supports = $('#notify_supports');
            if (parseInt(game_data.player.supports) > 0) {
                $supports.show()
            } else $supports.hide();
            $supports.find('.mNotifyNumber').last().text(game_data.player.supports)
        },
        cacheInputVars: function() {
            this._inputCache = {};
            var cachedCount = 0;
            $('#content_value').find('input[type=text]:visible').each(function() {
                var $this = $(this);
                if ($this.attr('id')) {
                    if (++cachedCount > 20) return false;
                    TribalWars._inputCache['#' + $this.attr('id')] = $this.val()
                } else if ($this.attr('name')) {
                    if (++cachedCount > 20) return false;
                    TribalWars._inputCache['input[name=' + $this.attr('name').replace('[', '\\[').replace(']', '\\]') + ']'] = $this.val()
                }
            })
        },
        restoreInputVars: function() {
            var $content = $('#content_value');
            $.each(this._inputCache,
            function(sel, val) {
                $content.find(sel).val(val)
            })
        },
        contentLoaded: function() {
            if (this._onLoadHandler) this._onLoadHandler();
            TribalWars.restoreInputVars()
        },
        registerOnLoadHandler: function(handler) {
            this._onLoadHandler = handler
        },
        shouldPartialLoad: function() {
            return true
        },
        showResourceIncrease: function(resource, amount) {
            var $current = $('#' + resource),
            current_offset = $current.offset(),
            $gain = $('<span id="' + resource + '_gain"></span>').text('+' + amount);
            $gain.css({
                top: (current_offset.top - 8) + 'px',
                left: (current_offset.left - 3) + 'px'
            });
            $gain.appendTo($('body'));
            $gain.animate({
                top: (current_offset.top - 20) + 'px'
            },
            1600, 'linear',
            function() {
                $(this).delay(500).fadeOut().remove()
            })
        },
        dev: function() {
            TribalWars.get('dev', {
                ajax: 'options'
            },
            function(data) {
                $(data.options).insertAfter('.server_info')
            })
        },
        playAttackSound: function() {
            if (!TribalWars._settings.sound) return;
            if (new Date().getTime() - TribalWars._lastSound < 6e4) return;
            TribalWars.playSound('attack');
            TribalWars._lastSound = new Date().getTime()
        },
        playSound: function(filename) {
            var html = '<audio autoplay><source src="' + image_base + '/sound/' + filename + '.ogg" type="audio/ogg" /><source src="' + image_base + '/sound/' + filename + '.mp3" type="audio/mpeg" /></audio>',
            $el = $(html).appendTo('body');
            setTimeout(function() {
                $el.remove()
            },
            1500)
        },
        setSetting: function(setting, value, callback) {
            TribalWars.post('settings', {
                ajaxaction: 'toggle_setting'
            },
            {
                setting: setting,
                value: value ? 1 : 0
            },
            function(result) {
                TribalWars._settings = $.extend(TribalWars._settings, result);
                if (callback) callback()
            })
        },
        getSetting: function(setting) {
            return TribalWars._settings[setting]
        },
        initTab: function(tabID) {
            QuickBar.init();
            if (!Modernizr.localstorage) return;
            this._tabID = tabID;
            TribalWars.setActivityHappened();
            $('body').on('click keydown mouseenter',
            function() {
                TribalWars.setActivityHappened();
                if (TribalWars._tabTimeout) {
                    TribalWars.setActiveTab();
                    TribalWars._tabTimeout = false
                }
            });
            if (!document.hidden) TribalWars.setActiveTab();
            $(document).on('visibilitychange',
            function() {
                TribalWars.setActivityHappened();
                if (document.hidden) {
                    TribalWars.setInactiveTab()
                } else TribalWars.setActiveTab()
            });
            STracking.init(tabID);
            if (typeof Chat !== 'undefined' && Boolean(TribalWars.getSetting('chat_enabled')) === true && !Number(window.game_data.player.sitter)) this._chat = new Chat()
        },
        setActiveTab: function() {
            localStorage.setItem('activetab', JSON.stringify([this._tabID, new Date().getTime()]));
            localStorage.setItem('lastactivetab', this._tabID);
            TribalWars._tabActive = true;
            TribalWars._tabTimer = setTimeout(function() {
                if (TribalWars.getIdleTime() < 18e4) {
                    TribalWars.setActiveTab()
                } else TribalWars._tabTimeout = true
            },
            1e3)
        },
        setInactiveTab: function() {
            if (TribalWars._tabTimer) clearInterval(TribalWars._tabTimer);
            localStorage.setItem('activetab', JSON.stringify(false));
            TribalWars._tabActive = false
        },
        isTabActive: function() {
            return ! document.hidden
        },
        isAnyTabActive: function() {
            if (!this._tabID) return true;
            var tab_info = JSON.parse(localStorage.getItem('activetab'));
            return tab_info && new Date().getTime() - tab_info[1] < 2500 && this.getIdleTime() < 18e4
        },
        wasLastActiveTab: function() {
            return this._tabID == localStorage.getItem('lastactivetab')
        },
        setActivityHappened: function() {
            TribalWars._lastActivity = new Date().getTime()
        },
        getIdleTime: function() {
            return new Date().getTime() - TribalWars._lastActivity
        },
        track: function(event, params) {
            TribalWars.post('tracking', {
                ajaxaction: 'track'
            },
            {
                event: event,
                params: params
            },
            null, null, true)
        },
        getGameData: function() {
            return window.game_data
        }
    }
} ());