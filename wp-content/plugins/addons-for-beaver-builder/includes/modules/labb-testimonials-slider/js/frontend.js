(function ($) {

    LABBTestimonialsSlider = function (settings) {
        this.nodeClass = '.fl-node-' + settings.id;
        this._init();
    };

    LABBTestimonialsSlider.prototype = {

        nodeClass: '',

        _init: function () {

            if ($().flexslider === undefined) {
                return;
            }

            var slider_elem = $(this.nodeClass).find('.labb-testimonials-slider').eq(0);

            if (slider_elem.length > 0) {

                var settings = slider_elem.data('settings');

                slider_elem.flexslider({
                    selector: ".labb-slides > .labb-slide",
                    animation: settings['slide_animation'],
                    direction: settings['direction'],
                    slideshowSpeed: settings['slideshow_speed'],
                    animationSpeed: settings['animation_speed'],
                    namespace: "labb-flex-",
                    pauseOnAction: settings['pause_on_action'],
                    pauseOnHover: settings['pause_on_hover'],
                    controlNav: settings['control_nav'],
                    directionNav: settings['direction_nav'],
                    prevText: "Previous<span></span>",
                    nextText: "Next<span></span>",
                    smoothHeight: true,
                    animationLoop: true,
                    slideshow: true,
                    easing: "swing",
                    controlsContainer: "labb-testimonials-slider"
                });
            }
        },
    };

})(jQuery);

