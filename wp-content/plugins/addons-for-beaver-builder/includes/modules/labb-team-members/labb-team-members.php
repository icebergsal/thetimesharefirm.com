<?php

/*
Widget Name: Team Members
Description: Display a list of your team members optionally in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBTeamModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Team Members', 'livemesh-bb-addons'),
            'description' => __('Display a list of your team members optionally in a multi-column grid.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-team-members/',
            'url' => LABB_ADDONS_URL . 'labb-team-members/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js('labb-waypoints');
        $this->add_css('animate');

    }

    public function social_profile($team_member, $settings) {

        $output = '<div class="labb-social-wrap">';

        $output .= '<div class="labb-social-list">';

        $email = $team_member->member_email;
        $facebook_url = $team_member->facebook_url;
        $twitter_url = $team_member->twitter_url;
        $linkedin_url = $team_member->linkedin_url;
        $dribbble_url = $team_member->dribbble_url;
        $pinterest_url = $team_member->pinterest_url;
        $googleplus_url = $team_member->google_plus_url;
        $instagram_url = $team_member->instagram_url;


        if ($email)
            $output .= '<div class="labb-social-list-item"><a class="labb-email" href="mailto:' . $email . '" title="' . __("Send an email", 'livemesh-bb-addons') . '"><i class="labb-icon-email"></i></a></div>';
        if ($facebook_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-facebook" href="' . $facebook_url . '" target="_blank" title="' . __("Follow on Facebook", 'livemesh-bb-addons') . '"><i class="labb-icon-facebook"></i></a></div>';
        if ($twitter_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-twitter" href="' . $twitter_url . '" target="_blank" title="' . __("Subscribe to Twitter Feed", 'livemesh-bb-addons') . '"><i class="labb-icon-twitter"></i></a></div>';
        if ($linkedin_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-linkedin" href="' . $linkedin_url . '" target="_blank" title="' . __("View LinkedIn Profile", 'livemesh-bb-addons') . '"><i class="labb-icon-linkedin"></i></a></div>';
        if ($googleplus_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-googleplus" href="' . $googleplus_url . '" target="_blank" title="' . __("Follow on Google Plus", 'livemesh-bb-addons') . '"><i class="labb-icon-googleplus"></i></a></div>';
        if ($instagram_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-instagram" href="' . $instagram_url . '" target="_blank" title="' . __("View Instagram Feed", 'livemesh-bb-addons') . '"><i class="labb-icon-instagram"></i></a></div>';
        if ($pinterest_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-pinterest" href="' . $pinterest_url . '" target="_blank" title="' . __("Subscribe to Pinterest Feed", 'livemesh-bb-addons') . '"><i class="labb-icon-pinterest"></i></a></div>';
        if ($dribbble_url)
            $output .= '<div class="labb-social-list-item"><a class="labb-dribbble" href="' . $dribbble_url . '" target="_blank" title="' . __("View Dribbble Portfolio", 'livemesh-bb-addons') . '"><i class="labb-icon-dribbble"></i></a></div>';

        $output .= '</div><!-- .labb-social-list -->';

        $output .= '</div><!-- .labb-social-wrap -->';

        return apply_filters('labb_team_member_social_links', $output, $team_member, $settings);

    }

}


FLBuilder::register_module('LABBTeamModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'form_section' => array(
                    'title' => __('Team Members', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'team_members' => array(
                                'type' => 'form',
                                'label' => __('Team Member', 'livemesh-bb-addons'),
                                'form' => 'team_members_form',
                                'preview_text' => 'member_name',
                                'multiple' => true
                            ),
                        )
                )
            )
        ),

        'options' => array(
            'title' => __('Options', 'livemesh-bb-addons'),
            'sections' => array(
                'options_section' => array(
                    'fields' =>
                        array(

                            'style' => array(
                                'type' => 'select',
                                'label' => __('Choose Style', 'livemesh-bb-addons'),
                                'state_emitter' => array(
                                    'callback' => 'select',
                                    'args' => array('style')
                                ),
                                'default' => 'style1',
                                'options' => array(
                                    'style1' => __('Style 1', 'livemesh-bb-addons'),
                                    'style2' => __('Style 2', 'livemesh-bb-addons'),
                                ),
                                'toggle' => array(
                                    'style1' => array(
                                        'fields' => array('per_line', 'per_line_tablet', 'per_line_mobile')
                                    ),
                                    'style2' => array(
                                        'fields' => array('team_member_spacing')
                                    ),
                                ),
                                'connections' => array('custom_field')
                            ),

                            'per_line' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 3,
                                'description' => 'Team Members per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_tablet' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Tablet Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 2,
                                'description' => 'Team Members per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_mobile' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Mobile Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 4,
                                'default' => 1,
                                'description' => 'Team Members per row (max: 4)',
                                'connections' => array('custom_field')
                            ),

                            'image_size'    => array(
                                'type'          => 'photo-sizes',
                                'label'         => __( 'Image Size', 'livemesh-bb-addons' ),
                                'default'       => 'medium',
                            ),

                            'crop'    => array(
                                'type'          => 'select',
                                'label'         => __( 'Crop Image', 'livemesh-bb-addons' ),
                                'default'       => 'circle',
                                'options'       => array(
                                    ''              => _x( 'None', 'Photo Crop.', 'livemesh-bb-addons' ),
                                    'landscape'     => __( 'Landscape', 'livemesh-bb-addons' ),
                                    'panorama'      => __( 'Panorama', 'livemesh-bb-addons' ),
                                    'portrait'      => __( 'Portrait', 'livemesh-bb-addons' ),
                                    'square'        => __( 'Square', 'livemesh-bb-addons' ),
                                    'circle'        => __( 'Circle', 'livemesh-bb-addons' ),
                                ),
                            ),
                        )
                ),

            )
        ),

        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'team_member_thumbnail_section' => array(
                    'title' => __('General', 'livemesh-bb-addons'),
                    'fields' => array(

                        'team_member_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Team Member Spacing', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 5,
                            'max' => 128,
                        ),
                        'thumbnail_hover_brightness' => array(
                            'type' => 'labb-number',
                            'label' => __('Thumbnail Hover Brightness (%)', 'livemesh-bb-addons'),
                            'description' => '%',
                            'min' => 1,
                            'max' => 100,
                            'default' => 50
                        ),
                        'thumbnail_border_radius' => array(
                            'type' => 'labb-number',
                            'label' => __('Thumbnail Border Radius', 'livemesh-bb-addons'),
                            'description' => 'px',
                        ),
                    )
                ),
                'team_member_title_section' => array(
                    'title' => __('Member Title', 'livemesh-bb-addons'),
                    'fields' => array(

                        'title_tag' => array(
                            'type' => 'select',
                            'label' => __('Title HTML Tag', 'livemesh-bb-addons'),
                            'default' => 'h3',
                            'options' => array(
                                'h1' => __('H1', 'livemesh-bb-addons'),
                                'h2' => __('H2', 'livemesh-bb-addons'),
                                'h3' => __('H3', 'livemesh-bb-addons'),
                                'h4' => __('H4', 'livemesh-bb-addons'),
                                'h5' => __('H5', 'livemesh-bb-addons'),
                                'h6' => __('H6', 'livemesh-bb-addons'),
                                'div' => __('Div', 'livemesh-bb-addons'),
                            )
                        ),

                        'title_color' => array(
                            'type' => 'color',
                            'label' => __('Title Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'title_font' => array(
                            'type' => 'font',
                            'label' => __('Title font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'title_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Title Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'title_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Title Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'title_text_transform' => array(
                            'type' => 'select',
                            'label' => __('Text Transform', 'livemesh-bb-addons'),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('Default', 'livemesh-bb-addons'),
                                'capitalize' => __('Capitalize', 'livemesh-bb-addons'),
                                'uppercase' => __('Uppercase', 'livemesh-bb-addons'),
                                'lowercase' => __('Lowercase', 'livemesh-bb-addons'),
                                'initial' => __('Initial', 'livemesh-bb-addons'),
                                'inherit' => __('Inherit', 'livemesh-bb-addons'),
                            ),
                        ),
                    )
                ),
                'team_member_position_section' => array(
                    'title' => __('Member Position', 'livemesh-bb-addons'),
                    'fields' => array(

                        'position_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'position_font' => array(
                            'type' => 'font',
                            'label' => __('font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'position_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'position_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'position_font_style' => array(
                            'type' => 'select',
                            'label' => __('Font Style', 'livemesh-bb-addons'),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('Default', 'livemesh-bb-addons'),
                                'normal' => __('Normal', 'livemesh-bb-addons'),
                                'italic' => __('Italic', 'livemesh-bb-addons'),
                                'oblique' => __('Oblique', 'livemesh-bb-addons'),
                            ),
                        ),
                    )
                ),
                'member_details_section' => array(
                    'title' => __('Member Details', 'livemesh-bb-addons'),
                    'fields' => array(

                        'details_color' => array(
                            'type' => 'color',
                            'label' => __('Text Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'details_font' => array(
                            'type' => 'font',
                            'label' => __('Text font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'details_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Text Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'details_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Text Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),
                'social_icons_section' => array(
                    'title' => __('Social Icons', 'livemesh-bb-addons'),
                    'fields' => array(
                        'social_icon_size' => array(
                            'type' => 'labb-number',
                            'label' => __('Icon size in pixels', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 10,
                            'max' => 128,
                        ),
                        'social_icon_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Spacing between icons', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 1,
                            'max' => 128,
                            'default' => 15
                        ),
                        'social_icon_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Color', 'livemesh-bb-addons'),
                            'show_reset' => true,
                        ),
                        'social_icon_hover_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Hover Color', 'livemesh-bb-addons'),
                            'show_reset' => true,
                        ),
                    )
                ),
            )
        ),
    )
);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('team_members_form', array(
    'title' => __('Team Member', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Member Info',

                    'fields' => array(
                        'member_name' => array(
                            'type' => 'text',
                            'label' => __('Name', 'livemesh-bb-addons'),
                            'description' => __('Name of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'member_image' => array(
                            'type' => 'photo',
                            'label' => __('Team member image.', 'livemesh-bb-addons'),
                            'connections' => array('photo')
                        ),

                        'member_position' => array(
                            'type' => 'text',
                            'label' => __('Position', 'livemesh-bb-addons'),
                            'description' => __('Specify the position/title of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'member_details' => array(
                            'type' => 'textarea',
                            'label' => __('Short details', 'livemesh-bb-addons'),
                            'description' => __('Provide a short writeup for the team member', 'livemesh-bb-addons'),
                            'rows' => 6,
                            'connections' => array('string', 'html'),
                        ),
                    )
                )
            )
        ),

        'social_profile' => array(
            'title' => __('Social Profile', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Social Info',

                    'fields' => array(
                        'member_email' => array(
                            'type' => 'text',
                            'label' => __('Email Address', 'livemesh-bb-addons'),
                            'description' => __('Enter the email address of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'facebook_url' => array(
                            'type' => 'text',
                            'label' => __('Facebook Page URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the Facebook page of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'twitter_url' => array(
                            'type' => 'text',
                            'label' => __('Twitter Profile URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the Twitter page of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'linkedin_url' => array(
                            'type' => 'text',
                            'label' => __('LinkedIn Page URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the LinkedIn profile of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'pinterest_url' => array(
                            'type' => 'text',
                            'label' => __('Pinterest Page URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the Pinterest page for the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'dribbble_url' => array(
                            'type' => 'text',
                            'label' => __('Dribbble Profile URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the Dribbble profile of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'google_plus_url' => array(
                            'type' => 'text',
                            'label' => __('GooglePlus Page URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the Google Plus page of the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'instagram_url' => array(
                            'type' => 'text',
                            'label' => __('Instagram Page URL', 'livemesh-bb-addons'),
                            'description' => __('URL of the Instagram feed for the team member.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),
                    )
                )
            )
        ),
        'options' => array(
            'title' => __('Options', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'fields' => array(

                        'member_animation' => array(
                            'type' => 'select',
                            'label' => __('Choose Animation Type', 'livemesh-bb-addons'),
                            'default' => 'none',
                            'options' => labb_get_animation_options(),
                        ),
                    )
                )
            )
        ),
    )
));