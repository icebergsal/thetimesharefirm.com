(function ($) {

    LABBOdometers = function (settings) {
        this.nodeClass = '.fl-node-' + settings.id;
        this._init();
    };

    LABBOdometers.prototype = {

        nodeClass: '',

        _init: function () {

            if ($().livemeshWaypoint === undefined) {
                return;
            }

            $(this.nodeClass).find(' .labb-odometers').livemeshWaypoint(function (direction) {

                $(this.element).find('.labb-odometer .labb-number').each(function () {

                    var odometer = $(this);

                    setTimeout(function () {
                        var data_stop = odometer.attr('data-stop');
                        $(odometer).text(data_stop);

                    }, 100);


                });

            }, {
                offset: (window.innerHeight || document.documentElement.clientHeight) - 100,
                triggerOnce: true
            });


        },
    };

})(jQuery);

