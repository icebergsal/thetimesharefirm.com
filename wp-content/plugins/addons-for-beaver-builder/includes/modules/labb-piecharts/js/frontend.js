(function ($) {

    LABBPiecharts = function (settings) {
        this.nodeClass = '.fl-node-' + settings.id;
        this._init();
    };

    LABBPiecharts.prototype = {

        nodeClass: '',

        _init: function () {

            if ($().livemeshWaypoint === undefined || $().easyPieChart === undefined) {
                return;
            }

            $(this.nodeClass).find(' .labb-piecharts').livemeshWaypoint(function (direction) {

                $(this.element).find('.labb-piechart .labb-percentage').each(function () {

                    var track_color = $(this).data('track-color');
                    var bar_color = $(this).data('bar-color');

                    $(this).easyPieChart({
                        animate: 2000,
                        lineWidth: 10,
                        barColor: bar_color,
                        trackColor: track_color,
                        scaleColor: false,
                        lineCap: 'square',
                        size: 220

                    });

                });

            }, {
                offset: (window.innerHeight || document.documentElement.clientHeight) - 100,
                triggerOnce: true
            });

        },
    };

})(jQuery);

