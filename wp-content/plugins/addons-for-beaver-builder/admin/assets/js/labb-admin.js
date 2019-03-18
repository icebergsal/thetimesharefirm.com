
/*global jQuery:false*/

jQuery(document).ready(function () {
    LABB_JS.init();
    // Run tab open/close event
    LABB_Tab.event();
});

// Init all fields functions (invoked from ajax)
var LABB_JS = {
    init: function () {
        // Run tab open/close
        LABB_Tab.init();
        // Load colorpicker if field exists
        LABB_ColorPicker.init();
    }
};


var LABB_ColorPicker = {
    init: function () {
        var $colorPicker = jQuery('.labb-colorpicker');
        if ($colorPicker.length > 0) {

            $colorPicker.wpColorPicker();

        }
    }
};

var LABB_Tab = {
    init: function () {
        // display the tab chosen for initial display in content
        jQuery('.labb-tab.selected').each(function () {
            LABB_Tab.check(jQuery(this));
        });
    },
    event: function () {
        jQuery(document).on('click', '.labb-tab', function () {
            LABB_Tab.check(jQuery(this));
        });
    },
    check: function (elem) {
        var chosen_tab_name = elem.data('target');
        elem.siblings().removeClass('selected');
        elem.addClass('selected');
        elem.closest('.labb-inner').find('.labb-tab-content').removeClass('labb-tab-show').hide();
        elem.closest('.labb-inner').find('.labb-tab-content.' + chosen_tab_name + '').addClass('labb-tab-show').show();
    }
};