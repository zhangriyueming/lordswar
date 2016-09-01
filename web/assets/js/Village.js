var Village; (function() {
    'use strict';
    Village = {
        id: null,
        name: null,
        player_id: null,
        x: null,
        y: null,
        pop: null,
        pop_max: null,
        storage_max: null,
        wood: null,
        stone: null,
        iron: null,
        wood_float: null,
        stone_float: null,
        iron_float: null,
        wood_prod: null,
        stone_prod: null,
        iron_prod: null,
        last_res_tick: null,
        buildings: null,
        canAfford: function(res_cost) {
            return (new Resources(this.wood, this.stone, this.iron)).hasEnough(res_cost)
        },
        updateRes: function() {
            var village = this,
            now = Timing.getCurrentServerTime(),
            seconds_elapsed = (now - village.last_res_tick) / 1e3,
            res_max = parseInt(village.storage_max); ['wood', 'stone', 'iron'].forEach(function(res_type) {
                var res_old = parseFloat(village[res_type + '_float']),
                res_prod = parseFloat(village[res_type + '_prod']),
                res_current = Math.min(res_max, res_old + (res_prod * seconds_elapsed));
                village[res_type + '_float'] = res_current;
                village[res_type] = Math.floor(res_current)
            });
            village.last_res_tick = now
        }
    }
})();