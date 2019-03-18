<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */


$settings = apply_filters('labb_clients_' . $id . '_settings', $settings);

list($animate_class, $animation_attr) = labb_get_animation_atts($settings->client_animation);

$output = '<div class="labb-clients labb-gapless-grid">';

$output .= '<div class="labb-grid-container ' . labb_get_grid_classes($settings) . '">';

foreach ($settings->clients as $client):

    if (!is_object($client))
        continue;

    $child_output = '<div class="labb-grid-item labb-client ' . $animate_class . '" ' . $animation_attr . '>';

    if (!empty($client->client_image)):

        $child_output .= wp_get_attachment_image($client->client_image, 'full', false, array('class' => 'labb-image full', 'alt' => $client->client_name));

    endif;

    if (!empty($client->client_link)):

        $child_output .= '<div class="labb-client-name">';

        $child_output .= '<a href="' . esc_url($client->client_link)
            . ' " title="' . esc_html($client->client_name)
            . '" target="_blank">' . wp_kses_post($client->client_name)
            . '</a>';

        $child_output .= '</div>';

    else:

        $child_output .= '<div class="labb-client-name">' . wp_kses_post($client->client_name) . '</div>';

    endif;

    $child_output .= '<div class="labb-image-overlay"></div>';

    $child_output .= '</div><!-- .labb-client -->';

    $output .= apply_filters('labb_client_item_output', $child_output, $client, $settings);

endforeach;

$output .= '</div>';

$output .= '</div><!-- .labb-clients -->';

echo apply_filters('labb_clients_output', $output, $settings);