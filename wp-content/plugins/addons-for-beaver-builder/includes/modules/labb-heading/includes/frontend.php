<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */

$settings = apply_filters('labb_heading_' . $id . '_settings', $settings);

list($animate_class, $animation_attr) = labb_get_animation_atts($settings->text_animation);

$output = '<div class="labb-heading labb-' . $settings->style . ' labb-align' . $settings->align . ' ' . $animate_class . '" ' . $animation_attr . '>';

if ($settings->style == 'style2' && !empty($settings->subtitle)):

    $output .= '<div class="labb-subtitle">' . esc_html($settings->subtitle) . '</div>';

endif;

$output .= '<' . esc_html($settings->title_tag) . ' class="labb-title">' . wp_kses_post($settings->heading) . '</' . esc_html($settings->title_tag) . '>';

if ($settings->style != 'style3' && !empty($settings->short_text)):

    $output .= '<p class="labb-text">' . do_shortcode($settings->short_text) . '</p>';

endif;

$output .= '</div><!-- .labb-heading -->';

echo apply_filters('labb_heading_output', $output, $settings);