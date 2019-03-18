(function ($) {

    LABBPortfolio = function (settings) {
        this.nodeClass = '.fl-node-' + settings.id;
        this.layoutMode = settings.layoutMode;
        this._init();
    };

    LABBPortfolio.prototype = {

        nodeClass: '',
        layoutMode: 'fitRows',
        grid_elem: null,

        _init: function () {

            this.grid_elem = $(this.nodeClass).find(' .labb-portfolio-wrap').eq(0);

            if (this.grid_elem.length > 0) {
                this._initGrid();
            }

        },

        _initGrid: function () {

            if ($().isotope === undefined) {
                return;
            }

            // layout Isotope after all images have loaded
            var htmlContent = this.grid_elem.find('.labb-portfolio');

            htmlContent.isotope({
                // options
                itemSelector: '.labb-portfolio-item',
                layoutMode: this.layoutMode
            });

            htmlContent.imagesLoaded(function () {
                htmlContent.isotope('layout');
            });

            var container = this.grid_elem.find('.labb-portfolio');
            if (container.length === 0) {
                return; // no items to filter or load and hence don't continue
            }

            /* -------------- Taxonomy Filter --------------- */

            this.grid_elem.find('.labb-taxonomy-filter .labb-filter-item a').on('click', function (e) {
                e.preventDefault();

                var selector = $(this).attr('data-value');
                container.isotope({filter: selector});
                $(this).closest('.labb-taxonomy-filter').children().removeClass('labb-active');
                $(this).closest('.labb-filter-item').addClass('labb-active');
                return false;
            });

        },
    };

})(jQuery);

