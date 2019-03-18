<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */

$settings = apply_filters('labb_services_' . $id . '_settings', $settings);

$output = '<div class="labb-services labb-' . $settings->style . ' labb-grid-container ' . labb_get_grid_classes($settings) . '">';

foreach ($settings->services as $service):

    if (!is_object($service))
        continue;

    list($animate_class, $animation_attr) = labb_get_animation_atts($service->service_animation);

    $child_output = '<div class="labb-grid-item labb-service-wrapper">';

    $child_output .= '<div class="labb-service ' . $animate_class . '" ' . $animation_attr . '>';

    if ($service->icon_type == 'icon_image') :

        if (!empty($service->icon_image)):

            $icon_image = $service->icon_image;

            $child_output .= '<div class="labb-image-wrapper">';

            $image_html = wp_get_attachment_image($icon_image, 'full', false, array('class' => 'labb-image full'));;

            $child_output .= $image_html;

            $child_output .= '</div>';

        endif;

    elseif ($service->icon_type == 'icon') :

        $child_output .= '<div class="labb-icon-wrapper">';

        $child_output .= '<span class="' . esc_attr($service->font_icon) . '"></span>';

        $child_output .= '</div>';

    endif;

    $child_output .= '<div class="labb-service-text">';

    $child_output .= '<' . $settings->title_tag . ' class="labb-title">' . esc_html($service->service_title) . '</' . $settings->title_tag . '>';

    $child_output .= '<div class="labb-service-details">' . do_shortcode(wp_kses_post($service->service_excerpt)) . '</div>';

    $child_output .= '</div><!-- .labb-service-text -->';

    $child_output .= '</div><!-- .labb-service -->';

    $child_output .= '</div><!-- .labb-service-wrapper -->';

    $output .= apply_filters('labb_service_item_output', $child_output, $service, $settings);

endforeach;

$output .= '</div><!-- .labb-services -->';

$output .= '<div class="labb-clear"></div>';

echo apply_filters('labb_services_output', $output, $settings);