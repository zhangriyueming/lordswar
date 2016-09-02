var Timing = {
    tick_interval: 1e3,
    initial_server_time: null,
    initial_local_time: null,
    added_server_time: 0,
    offset_to_server: 0,
    offset_from_server: 0,
    paused: false,
    tickHandlers: {},
    init: function(server_time) {
        this.initial_server_time = Math.round(server_time * 1e3);
        if (this.supportsPerformanceAPI()) {
            this.offset_from_server = Date.now() - performance.timing.responseStart;
            this.offset_to_server = performance.timing.responseStart - performance.timing.fetchStart
        } else this.initial_local_time = new Date().getTime();
        for (var i in Timing.tickHandlers) {
            if (!Timing.tickHandlers.hasOwnProperty(i)) continue;
            if (Timing.tickHandlers[i].hasOwnProperty('init')) Timing.tickHandlers[i].init()
        };
        var $st = $('#serverTime').click(function() {
            Timing.pause()
        });
        if (Timing.offset_to_server) $st.attr('title', 'Connection time to server: ' + Timing.offset_to_server + 'ms');
        $(window.TribalWars).trigger('timing_ready');
        this.doGlobalTick()
    },
    pause: function() {
        this.paused = !this.paused
    },
    supportsPerformanceAPI: function() {
        return Modernizr.performance && typeof window.performance == 'object' && typeof window.performance.now == 'function'
    },
    getReturnTimeFromServer: function() {
        return this.offset_from_server
    },
    getElapsedTimeSinceLoad: function() {
        if (this.supportsPerformanceAPI()) return performance.now() - this.getReturnTimeFromServer();
        return new Date().getTime() - Timing.initial_local_time
    },
    getElapsedTimeSinceData: function() {
        if (this.supportsPerformanceAPI()) return performance.now() - this.added_server_time - this.getReturnTimeFromServer();
        return new Date().getTime() - Timing.initial_local_time - this.added_server_time
    },
    getCurrentServerTime: function() {
        return this.initial_server_time + this.getReturnTimeFromServer() + this.getElapsedTimeSinceLoad()
    },
    doGlobalTick: function(is_one_off) {
        if (!Timing.paused) {
            for (var i in Timing.tickHandlers) {
                if (!Timing.tickHandlers.hasOwnProperty(i)) continue;
                Timing.tickHandlers[i].tick()
            };
            $(window.TribalWars).trigger('resource_change')
        };
        if (!is_one_off) {
            var now = Math.round(Timing.getCurrentServerTime()),
            wait_for = Timing.tick_interval - (now % Timing.tick_interval) + 10;
            setTimeout(Timing.doGlobalTick, wait_for)
        }
    },
    resetTickHandlers: function() {
        this.added_server_time += this.getElapsedTimeSinceData();
        for (var i in Timing.tickHandlers) {
            if (!Timing.tickHandlers.hasOwnProperty(i)) continue;
            if (Timing.tickHandlers[i].hasOwnProperty('reset')) Timing.tickHandlers[i].reset()
        };
        this.doGlobalTick(true)
    }
};
Timing.tickHandlers.serverTime = {
    tick: function() {
        var $el = $('#serverTime'),
        now = Timing.getCurrentServerTime() / 1e3,
        adjusted_timestamp = now + window.server_utc_diff;
        $el.text(getTimeString(adjusted_timestamp, true))
    }
};
Timing.tickHandlers.resources = {
    start: {},
    lastFullState: false,
    tick: function() {
        if (!game_data.village) return;
        game_data.village.updateRes(); ['wood', 'stone', 'iron'].forEach(this.updateDisplay);
        Timing.tickHandlers.resources.checkIfFull()
    },
    updateDisplay: function(resource_name) {
        var current = game_data.village[resource_name],
        max = parseInt(game_data.village.storage_max, 10),
        $element = $('#' + resource_name);
        if ((current >= (max * 0.9)) && (current < max)) {
            changeResStyle($element, 'warn_90')
        } else if (current < max) {
            changeResStyle($element, 'res')
        } else changeResStyle($element, 'warn');
        var index = resource_name == 'wood' ? 0 : (resource_name == 'stone' ? 2 : 4);
        game_data.village.res[index] = current;
        if (mobile) if (current > 99999) {
            current = Math.floor(current / 1e3) + 'K'
        } else if (current > 9999) current = Math.floor(current / 100) / 10 + 'K';
        $element.html(current)
    },
    checkIfFull: function() {
        var storage = parseInt(game_data.village.storage_max),
        full = game_data.village.wood >= storage || game_data.village.stone >= storage || game_data.village.iron > storage;
        if (full && !this.lastFullState) BrowserNotification.showNotification(BrowserNotification.NOTIFICATION_WAREHOUSE, [game_data.village.name]);
        this.lastFullState = full
    },
    initResource: function(resource_name) {
        var start = parseFloat(game_data.village[resource_name + '_float']);
        return Timing.tickHandlers.resources.start[resource_name] = start
    },
    getOriginalValue: function(resource_name) {
        if (Timing.tickHandlers.resources.start.hasOwnProperty(resource_name)) return Timing.tickHandlers.resources.start[resource_name];
        return Timing.tickHandlers.resources.initResource(resource_name)
    },
    reset: function() {
        Timing.tickHandlers.resources.start = {}
    }
};
Timing.tickHandlers.timers = {
    _timers: [],
    _lock_content_reloading: false,
    _doc_events_registered: false,
    init: function() {
        if (!this._doc_events_registered) {
            $(document).on('partial_reload_start',
            function() {
                Timing.tickHandlers.timers.lockPartialReloading()
            });
            $(document).on('partial_reload_end',
            function() {
                Timing.tickHandlers.timers.unlockPartialReloading()
            });
            this._doc_events_registered = true
        };
        this.initTimers('timer', Timing.tickHandlers.timers.handleTimerEnd);
        this.initTimers('timer_replace', Timing.tickHandlers.timers.handleReplaceTimerEnd)
    },
    handleTimerEnd: function() {
        var callback = $(this).data('timer_callback');
        if (callback) {
            callback();
            return
        };
        if (Timing.tickHandlers.timers._lock_content_reloading) return;
        if (TribalWars.shouldPartialLoad()) {
            partialReload()
        } else document.location.href = document.location.href.replace(/action=\w*/, '').replace(/#.*$/, '')
    },
    handleReplaceTimerEnd: function() {
        var parent = $(this).parent(),
        next = parent.next();
        if (next.length === 0) return;
        next.css('display', 'inline');
        parent.remove()
    },
    lockPartialReloading: function() {
        this._lock_content_reloading = true
    },
    unlockPartialReloading: function() {
        this._lock_content_reloading = false
    },
    initTimers: function(class_name, end_callback) {
        var now = Math.round(Timing.getCurrentServerTime() / 1e3),
        timers = this;
        $('span.' + class_name).each(function() {
            var $this = $(this);
            $this.removeClass(class_name);
            $this.on('timer_end', end_callback);
            var seconds_remaining, endtime;
            if (endtime = $this.data('endtime')) {
                seconds_remaining = Math.round(endtime - now)
            } else {
                seconds_remaining = getTime($this);
                endtime = now + seconds_remaining
            };
            if (seconds_remaining < 0) {
                $this.html('<a href="minus.php">almost done</a>');
                return
            };
            formatTime($this, seconds_remaining, false);
            timers._timers.push({
                element: $this,
                end: endtime
            })
        })
    },
    reset: function() {
        this.init()
    },
    tick: function() {
        for (var i = 0; i < this._timers.length; i++) {
            var remove = this.tickTimer(this._timers[i]);
            if (remove) this._timers.splice(i, 1)
        }
    },
    tickTimer: function(timer) {
        'use strict';
        if (!$.contains(document.body, timer.element[0])) return true;
        var time_remaining = Math.round(timer.end - (Timing.getCurrentServerTime() / 1e3));
        if (time_remaining > 0) {
            formatTime(timer.element, time_remaining, false);
            return false
        };
        var is_popup_open = $('.popup_style:visible').length > 0;
        if (is_popup_open) return false;
        formatTime(timer.element, 0, false);
        timer.element.trigger('timer_end');
        return true
    }
};
Timing.tickHandlers.forwardTimers = {
    _timers: [],
    init: function() {
        $('span.relative_time').each(function() {
            Timing.tickHandlers.forwardTimers._timers.push($(this));
            $(this).removeClass('.relative_time')
        })
    },
    tick: function() {
        for (var i = 0; i < this._timers.length; i++) {
            var $el = this._timers[i];
            if (!$.contains(document.body, $el[0])) {
                this._timers.splice(i, 1);
                continue
            };
            var duration = $el.data('duration'),
            arrival = ((Timing.getCurrentServerTime() + Timing.offset_to_server) / 1e3) + duration;
            $el.text(Format.date(arrival, true))
        }
    },
    reset: function() {
        this.init()
    }
};