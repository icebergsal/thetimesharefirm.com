(function ($) {

    LABBStatsBars = function (settings) {
        this.nodeClass = '.fl-node-' + settings.id;
        this._init();
    };

    LABBStatsBars.prototype = {

        nodeClass: '',

        _init: function () {

            if ($().livemeshWaypoint === undefined || $().easyPieChart === undefined) {
                return;
            }

            $(this.nodeClass).find(' .labb-stats-bars').livemeshWaypoint(function (direction) {

                $(this.element).find('.labb-stats-bar-content').each(function () {

                    var dataperc = $(this).attr('data-perc');
                    $(this).animate({"width": dataperc + "%"}, dataperc * 20);

                });

            }, {
                offset: (window.innerHeight || document.documentElement.clientHeight) - 150,
                triggerOnce: true
            });


        },
    };

})(jQuery);

