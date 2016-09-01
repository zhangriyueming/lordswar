var MapLegend; (function() {
    'use strict';
    MapLegend = function($container) {
        this.$container = $container
    };
    MapLegend.prototype = {
        CATEGORY_STANDARD: 'standard',
        CATEGORY_TRIBAL: 'tribal',
        CATEGORY_OWN: 'own',
        CATEGORY_OTHER: 'other',
        addHighlight: function(category, id, name, color, icon) {
            var $item = $('<div>').addClass('map_legend').attr('data-active', 1).attr('data-id', id),
            $marker = $('<div>');
            if (color) $marker.css('background-color', 'rgb(' + color.r + ',' + color.g + ',' + color.b + ')');
            if (icon) $marker.css({
                'background-image': 'url("' + icon + '")',
                'background-size': '15px 15px'
            });
            $item.append($marker);
            $item.append(' <span>' + escapeHtml(name) + '</span>');
            this.$container.find('[data-category="' + category + '"]').find('td:nth-child(2)').append($item)
        },
        removeHighlight: function(category, id) {
            this.$container.find('[data-category="' + category + '"]').find('[data-id="' + id + '"]').remove();
            this.updateVisibility()
        },
        updateHighlight: function(category, id, new_name, new_color, new_icon) {
            var $item = this.$container.find('[data-category="' + category + '"]').find('[data-id="' + id + '"]'),
            $marker = $item.find('div'),
            background_color = new_color ? 'rgb(' + new_color.r + ',' + new_color.g + ',' + new_color.b + ')': 'none';
            $marker.css('background-color', background_color);
            if (new_icon) $marker.css({
                'background-image': 'url("' + escapeHtml(new_icon) + '")',
                'background-size': '15px 15px'
            });
            $item.find('span').text(new_name)
        },
        showHighlight: function(category, id) {
            this.$container.find('[data-category="' + category + '"]').find('[data-id="' + id + '"]').attr('data-active', 1);
            this.updateVisibility()
        },
        hideHighlight: function(category, id) {
            this.$container.find('[data-category="' + category + '"]').find('[data-id="' + id + '"]').attr('data-active', 0);
            this.updateVisibility()
        },
        updateVisibility: function() {
            this.$container.find('.map_legend[data-active="1"]').show();
            this.$container.find('.map_legend[data-active="0"]').hide();
            var _this = this,
            visible_category_count = 0;
            $.each([this.CATEGORY_STANDARD, this.CATEGORY_TRIBAL, this.CATEGORY_OWN, this.CATEGORY_OTHER],
            function(key, category) {
                if (_this.countActiveHighlights(category) < 1) {
                    _this.hideCategory(category)
                } else {
                    _this.showCategory(category);
                    visible_category_count++
                }
            });
            if (visible_category_count < 2) {
                this.hideCategoryLabels()
            } else this.showCategoryLabels()
        },
        showCategory: function(category) {
            this.$container.find('[data-category="' + category + '"]').show()
        },
        hideCategory: function(category) {
            this.$container.find('[data-category="' + category + '"]').hide()
        },
        showCategoryLabels: function() {
            this.$container.find('tr td:first-child').show()
        },
        hideCategoryLabels: function() {
            this.$container.find('tr td:first-child').hide()
        },
        countActiveHighlights: function(category) {
            var $category = this.$container.find('[data-category="' + category + '"]');
            return $category.find('.map_legend[data-active="1"]').length
        }
    }
} ());