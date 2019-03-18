<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */

$settings = apply_filters('labb_odometers_' . $id . '_settings', $settings);

$output = '<div class="labb-odometers labb-grid-container ' . labb_get_grid_classes($settings) . '">';

foreach ($settings->odometers as $odometer):

    if (!is_object($odometer))
        continue;

    $prefix = (!empty ($odometer->prefix)) ? '<span class="prefix">' . $odometer->prefix . '</span>' : '';
    $suffix = (!empty ($odometer->suffix)) ? '<span class="suffix">' . $odometer->suffix . '</span>' : '';

    $child_output = '<div class="labb-grid-item labb-odometer">';

    $child_output .= (!empty ($odometer->prefix)) ? '<span class="labb-prefix">' . $odometer->prefix . '</span>' : '';

    $child_output .= '<div class="labb-number odometer" data-stop="' . intval($odometer->stop_value) . '">';

    $child_output .= intval($odometer->start_value);

    $child_output .= '</div><!-- .labb-number -->';

    $child_output .= (!empty ($odometer->suffix)) ? '<span class="labb-suffix">' . $odometer->suffix . '</span>' : '';

    $icon_type = esc_html($odometer->icon_type);

    if ($icon_type == 'icon_image') :

        $icon_image = $odometer->icon_image;

        if (!empty($icon_image)):

            $icon_html = '<span class="labb-image-wrapper">' . wp_get_attachment_image($icon_image, 'full', false, array('class' => 'labb-image full')) . '</span>';

        endif;

    else :

        $icon_html = '<span class="labb-icon-wrapper"><i class="' . esc_attr($odometer->font_icon) . '"></i></span>';

    endif;

    $child_output .= '<div class="labb-stats-title-wrap">';

    $child_output .= '<div class="labb-stats-title">' . $icon_html . esc_html($odometer->stats_title) . '</div>';

    $child_output .= '</div>';

    $child_output .= '</div><!-- .labb-odometer -->';

    $output .= apply_filters('labb_odometer_output', $child_output, $odometer, $settings);

endforeach;

$output .= '</div><!-- .labb-odometers -->';

$output .= '<div class="labb-clear"></div>';

echo apply_filters('labb_odometers_output', $output, $settings);