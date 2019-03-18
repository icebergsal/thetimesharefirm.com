<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */


$settings = apply_filters('labb_piecharts_' . $id . '_settings', $settings);

$bar_color = $settings->bar_color;
if (preg_match('/^[a-f0-9]{6}$/i', $bar_color))
    $bar_color = '#' . $bar_color;

$track_color = $settings->track_color;
if (preg_match('/^[a-f0-9]{6}$/i', $track_color))
    $track_color = '#' . $track_color;

$bar_color = ' data-bar-color="' . esc_attr($bar_color) . '"';
$track_color = ' data-track-color="' . esc_attr($track_color) . '"';

$output = '<div class="labb-piecharts labb-grid-container ' . labb_get_grid_classes($settings) . '">';

foreach ($settings->piecharts as $piechart):

    if (!is_object($piechart))
        continue;

    $child_output = '<div class="labb-grid-item labb-piechart">';

    if (isset($piechart->chart_title)):

        $child_output .= '<div class="labb-chart-title">' . esc_html($piechart->chart_title) . '</div>';

    endif;

    $child_output .= '<div class="labb-percentage"' . $bar_color . $track_color . ' data-percent="' . round($piechart->percentage) . '">';

    $child_output .= '<div class="labb-percentage-value">';

    $child_output .= '<span>' . round($piechart->percentage) . '<sup>' . $settings->percent_symbol . '</sup>' . '</span>';

    $child_output .= '<div class="labb-label">' . esc_html($piechart->stats_title) . '</div>';

    $child_output .= '</div><!-- .labb-percentage-value -->';

    $child_output .= '</div><!-- .labb-percentage -->';

    $child_output .= '</div><!-- .labb-piechart -->';

    $output .= apply_filters('labb_piechart_output', $child_output, $piechart, $settings);

endforeach;

$output .= '</div><!-- .labb-piecharts -->';

$output .= '<div class="labb-clear"></div>';

echo apply_filters('labb_piecharts_output', $output, $settings);