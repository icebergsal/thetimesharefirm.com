(function ($) {

    LABBNumberField = {

        _init: function () {
            FLBuilder.addHook('settings-form-init', function () {
                LABBNumberField._initNumberFields();
            });
            LABBNumberField._bindEvents();
        },


        _initNumberFields: function () {
            $('.fl-builder-settings:visible').find('.fl-builder-settings-fields .labb-number-input').trigger('change');

        },

        _bindEvents: function () {
            /* Number Input Fields */
            $('body').delegate('.fl-builder-settings-fields .labb-number-input', 'change', LABBNumberField._settingsNumberChanged);

        },

        _settingsNumberChanged: function () {
            var $this = $(this),
                number_wrap = $this.closest(".labb-number-wrap"),
                this_value = number_wrap.find('.labb-number-input').val();

            number_wrap.find(".labb-number-hidden").val(this_value);
            number_wrap.find(".labb-number-hidden").trigger('keyup');
        }
    };

    LABBNumberField._init();

})(jQuery);