(function ($) {

    LABBPostsCarousel = function (settings) {
        this.nodeClass = '.fl-node-' + settings.id;
        this._init();
    };

    LABBPostsCarousel.prototype = {

        nodeClass: '',

        _init: function () {

            var carousel_elem = $(this.nodeClass).find(' .labb-posts-carousel').eq(0);

            if (carousel_elem.length > 0) {
                this._initCarousel(carousel_elem);
            }

        },

        _initCarousel: function (carousel_elem) {

            if ($().slick === undefined) {
                return;
            }

            var settings = carousel_elem.data('settings');

            var arrows = settings['arrows'];

            var dots = settings['dots'];

            var autoplay = settings['autoplay'];

            var autoplay_speed = parseInt(settings['autoplay_speed']) || 3000;

            var animation_speed = parseInt(settings['animation_speed']) || 300;

            var fade = settings['fade'];

            var pause_on_hover = settings['pause_on_hover'];

            var display_columns = parseInt(settings['display_columns']) || 4;

            var scroll_columns = parseInt(settings['scroll_columns']) || 4;

            var tablet_width = parseInt(settings['tablet_width']) || 800;

            var tablet_display_columns = parseInt(settings['tablet_display_columns']) || 2;

            var tablet_scroll_columns = parseInt(settings['tablet_scroll_columns']) || 2;

            var mobile_width = parseInt(settings['mobile_width']) || 480;

            var mobile_display_columns = parseInt(settings['mobile_display_columns']) || 1;

            var mobile_scroll_columns = parseInt(settings['mobile_scroll_columns']) || 1;

            carousel_elem.slick({
                arrows: arrows,
                dots: dots,
                infinite: true,
                autoplay: autoplay,
                autoplaySpeed: autoplay_speed,
                speed: animation_speed,
                fade: false,
                pauseOnHover: pause_on_hover,
                slidesToShow: display_columns,
                slidesToScroll: scroll_columns,
                responsive: [
                    {
                        breakpoint: tablet_width,
                        settings: {
                            slidesToShow: tablet_display_columns,
                            slidesToScroll: tablet_scroll_columns
                        }
                    },
                    {
                        breakpoint: mobile_width,
                        settings: {
                            slidesToShow: mobile_display_columns,
                            slidesToScroll: mobile_scroll_columns
                        }
                    }
                ]
            });
        },
    };

})(jQuery);

