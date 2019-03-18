<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */

$settings = apply_filters('labb_testimonials_slider_' . $id . '_settings', $settings);

$slider_options = [
    'slide_animation' => $settings->slide_animation,
    'direction' => $settings->direction,
    'slideshow_speed' => absint( $settings->slideshow_speed ),
    'animation_speed' => absint( $settings->animation_speed ),
    'control_nav' => ( 'yes' === $settings->control_nav ),
    'direction_nav' => ( 'yes' === $settings->direction_nav ),
    'pause_on_hover' => ( 'yes' === $settings->pause_on_hover ),
    'pause_on_action' => ( 'yes' === $settings->pause_on_action )
];

$output = '<div class="labb-testimonials-slider labb-flexslider labb-container" data-settings=\'' . wp_json_encode($slider_options) . '\'>';

$output .= '<div class="labb-slides">';

foreach ($settings->testimonials as $testimonial) :

    if (!is_object($testimonial))
        continue;

    $child_output = '<div class="labb-slide labb-testimonial-wrapper">';

    $child_output .= '<div class="labb-testimonial">';

    $child_output .= '<div class="labb-testimonial-text">';

    $child_output .= '<i class="labb-icon-quote"></i>';

    $child_output .= wp_kses_post($testimonial->author_text);

    $child_output .= '</div>';

    $child_output .= '<div class="labb-testimonial-user">';

    $child_output .= '<div class="labb-image-wrapper">';

    $author_image = $testimonial->author_image;

    if (!empty($author_image)):

        $child_output .= wp_get_attachment_image($author_image, 'thumbnail', false, array('class' => 'labb-image full'));

    endif;

    $child_output .= '</div><!-- .labb-image-wrapper -->';

    $child_output .= '<div class="labb-text">';

    $child_output .= '<' . $settings->title_tag . ' class="labb-author-name">' . esc_html($testimonial->author_name) . '</' . $settings->title_tag . '>';

    $child_output .= '<div class="labb-author-credentials">' . wp_kses_post($testimonial->credentials) . '</div>';

    $child_output .= '</div>';

    $child_output .= '</div><!-- .labb-testimonial-user -->';

    $child_output .= '</div><!-- .labb-testimonial -->';

    $child_output .= '</div><!-- .labb-testimonial-wrapper.labb-slide -->';

    $output .= apply_filters('labb_testimonials_slide_output', $child_output, $testimonial, $settings);

endforeach;

$output .= '</div><!-- .labb-slides -->';

$output .= '</div><!-- .labb-testimonials-slider -->';

echo apply_filters('labb_testimonials_slider_output', $output, $settings);