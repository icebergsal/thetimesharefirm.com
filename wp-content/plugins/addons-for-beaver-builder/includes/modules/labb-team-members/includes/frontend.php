<?php
/**
 * @var $module
 * @var $settings
 * @var $id
 */


$settings = apply_filters('labb_team_members_' . $id . '_settings', $settings);

$item_style = '';

$container_style = 'labb-container';

if ($settings->style == 'style1'):

    $item_style = 'labb-grid-item';

    $container_style = 'labb-grid-container ' . labb_get_grid_classes($settings);

endif;

$output = '<div class="labb-team-members labb-' . $settings->style . ' ' . $container_style . '">';

foreach ($settings->team_members as $team_member):

    if (!is_object($team_member))
        continue;

    $child_output = '<div class="' . $item_style . ' labb-team-member-wrapper">';

    list($animate_class, $animation_attr) = labb_get_animation_atts($team_member->member_animation);

    $child_output .= '<div class="labb-team-member ' . $animate_class . '" ' . $animation_attr . '>';

    $child_output .= '<div class="labb-image-wrapper">';

    $member_image = $team_member->member_image;

    if (!empty($member_image)):

        $size = isset($settings->image_size) ? $settings->image_size : 'medium';

        $src = wp_get_attachment_image_src($member_image, $size);

        $photo_data = FLBuilderPhoto::get_attachment_data($member_image);

        // set params
        $photo_settings = array(
            'align' => 'center',
            'link_type' => '',
            'crop' => $settings->crop,
            'photo' => $photo_data,
            'photo_src' => $src[0],
            'photo_source' => 'library',
        );

        // render image
        $image_html = labb_get_image_html($photo_settings);;

        $child_output .= $image_html;

    endif;

    if ($settings->style == 'style1'):

        $child_output .= $module->social_profile($team_member, $settings);

    endif;

    $child_output .= '</div><!-- .labb-image-wrapper -->';

    $child_output .= '<div class="labb-team-member-text">';

    $child_output .= '<' . $settings->title_tag . ' class="labb-title">' . esc_html($team_member->member_name) . '</' . $settings->title_tag . '>';

    $child_output .= '<div class="labb-team-member-position">';

    $child_output .= do_shortcode($team_member->member_position);

    $child_output .= '</div>';

    $child_output .= '<div class="labb-team-member-details">';

    $child_output .= do_shortcode($team_member->member_details);

    $child_output .= '</div>';

    if ($settings->style == 'style2'):

        $child_output .= $module->social_profile($team_member, $settings);

    endif;

    $child_output .= '</div><!-- .labb-team-member-text -->';

    $child_output .= '</div><!-- .labb-team-member -->';

    $child_output .= '</div><!-- .labb-team-member-wrapper -->';

    $output .= apply_filters('labb_team_member_output', $child_output, $team_member, $settings);

endforeach;

$output .= '</div><!-- .labb-team-members -->';

$output .= '<div class="labb-clear"></div>';

echo apply_filters('labb_team_members_output', $output, $settings);