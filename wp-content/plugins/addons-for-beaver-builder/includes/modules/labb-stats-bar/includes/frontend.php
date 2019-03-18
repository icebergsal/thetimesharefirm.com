<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */


$settings = apply_filters('labb_stats_bars_' . $id . '_settings', $settings);

$output = '<div class="labb-stats-bars">';

foreach ($settings->stats_bars as $stats_bar) :

    if (!is_object($stats_bar))
        continue;

    $bar_color = $stats_bar->bar_color;
    if(preg_match('/^[a-f0-9]{6}$/i', $bar_color))
        $bar_color = '#' . $bar_color;

    $color_style = '';
    if (!empty($bar_color))
        $color_style = ' style="background:' . esc_attr($bar_color) . ';"';

    $child_output = '<div class="labb-stats-bar">';

    $child_output .= '<div class="labb-stats-title">';

    $child_output .= esc_html($stats_bar->stats_title);

    $child_output .= '<span>' . esc_attr($stats_bar->percentage) . '%</span>';

    $child_output .= '</div>';

    $child_output .= '<div class="labb-stats-bar-wrap">';

    $child_output .= '<div ' . $color_style . ' class="labb-stats-bar-content" data-perc="' . esc_attr($stats_bar->percentage) . '"></div>';

    $child_output .= '<div class="labb-stats-bar-bg"></div>';

    $child_output .= '</div>';

    $child_output .= '</div><!-- .labb-stats-bar -->';

    $output .= apply_filters('labb_stats_bar_output', $child_output, $stats_bar, $settings);

endforeach;

$output .= '</div><!-- .labb-stats-bars -->';

echo apply_filters('labb_stats_bars_output', $output, $settings);