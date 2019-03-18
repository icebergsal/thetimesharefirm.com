<?php

/*
Widget Name: Heading
Description: Create heading for display on the top of a section.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBHeadingModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Heading', 'livemesh-bb-addons'),
            'description' => __('Create heading for display on the top of a section.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-heading/',
            'url' => LABB_ADDONS_URL . 'labb-heading/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js('labb-waypoints');
        $this->add_css('animate');

    }

}

FLBuilder::register_module('LABBHeadingModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'options_section' => array(
                    'fields' =>
                        array(

                            'style' => array(
                                'type' => 'select',
                                'label' => __('Choose Style', 'livemesh-bb-addons'),
                                'default' => 'style1',
                                'options' => array(
                                    'style1' => __('Style 1', 'livemesh-bb-addons'),
                                    'style2' => __('Style 2', 'livemesh-bb-addons'),
                                    'style3' => __('Style 3', 'livemesh-bb-addons'),
                                ),
                                'toggle' => array(
                                    'style1' => array(
                                        'fields' => array('heading', 'short_text')
                                    ),
                                    'style2' => array(
                                        'fields' => array('heading', 'subtitle', 'short_text'),
                                    ),
                                    'style3' => array(
                                        'fields' => array('heading')
                                    )
                                ),
                                'connections' => array('custom_field')

                            ),
                        )
                ),
                'content_section' => array(
                    'title' => __('Content', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'heading' => array(
                                'type' => 'text',
                                'label' => __('Heading Title', 'livemesh-bb-addons'),
                                'description' => __('Title for the heading.', 'livemesh-bb-addons'),
                                'connections' => array('string', 'html'),
                            ),

                            'subtitle' => array(
                                'type' => 'text',
                                'label' => __('Subheading', 'livemesh-bb-addons'),
                                'description' => __('A subtitle displayed above the title heading.', 'livemesh-bb-addons'),
                                'state_handler' => array(
                                    'style[style2]' => array('show'),
                                    '_else[style]' => array('hide'),
                                ),
                                'connections' => array('string', 'html'),
                            ),

                            'short_text' => array(
                                'type' => 'editor',
                                'media_buttons' => false,
                                'wpautop' => false,
                                'rows' => 4,
                                'label' => '',
                                'description' => __('Short text generally displayed below the heading title.', 'livemesh-bb-addons'),
                                'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'livemesh-bb-addons'),
                                'state_handler' => array(
                                    'style[style3]' => array('hide'),
                                    '_else[style]' => array('show')
                                ),
                                'connections' => array('string', 'html'),
                            ),
                        )
                ),
            )
        ),
        'settings' => array(
            'title' => __('Settings', 'livemesh-bb-addons'),
            'sections' => array(
                'options_section' => array(
                    'fields' =>
                        array(
                            'align' => array(
                                'type' => 'select',
                                'description' => __('Alignment of the heading.', 'livemesh-bb-addons'),
                                'label' => __('Align', 'livemesh-bb-addons'),
                                'options' => array(
                                    'center' => __('Center', 'livemesh-bb-addons'),
                                    'left' => __('Left', 'livemesh-bb-addons'),
                                    'right' => __('Right', 'livemesh-bb-addons'),
                                ),
                                'default' => 'center'
                            ),

                            'text_animation' => array(
                                'type' => 'select',
                                'label' => __('Choose Animation', 'livemesh-bb-addons'),
                                'default' => 'none',
                                'options' => labb_get_animation_options(),
                            ),
                        )
                ),
            )
        ),
        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'title_section' => array(
                    'title' => __('Title', 'livemesh-bb-addons'),
                    'fields' => array(

                        'title_tag' => array(
                            'type' => 'select',
                            'label' => __('Heading HTML Tag', 'livemesh-bb-addons'),
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

                        'heading_color' => array(
                            'type' => 'color',
                            'label' => __('Heading Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'heading_font' => array(
                            'type' => 'font',
                            'label' => __('Heading font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'heading_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Heading Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'heading_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Heading Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'heading_text_transform'  => array(
                            'type'          => 'select',
                            'label'         => __('Text Transform', 'livemesh-bb-addons'),
                            'default'       => 'none',
                            'options'       => array(
                                'none' 			=> __( 'Default', 'livemesh-bb-addons' ),
                                'capitalize' 	=> __( 'Capitalize', 'livemesh-bb-addons' ),
                                'uppercase' 	=> __( 'Uppercase', 'livemesh-bb-addons' ),
                                'lowercase' 	=> __( 'Lowercase', 'livemesh-bb-addons' ),
                                'initial' 		=> __( 'Initial', 'livemesh-bb-addons' ),
                                'inherit' 		=> __( 'Inherit', 'livemesh-bb-addons' ),
                            ),
                        ),
                    )
                ),
                'subtitle_section' => array(
                    'title' => __('Subtitle', 'livemesh-bb-addons'),
                    'fields' => array(


                        'subtitle_color' => array(
                            'type' => 'color',
                            'label' => __('Subtitle Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'subtitle_font' => array(
                            'type' => 'font',
                            'label' => __('Subtitle font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'subtitle_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Subtitle Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'subtitle_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Subtitle Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'subtitle_text_transform'  => array(
                            'type'          => 'select',
                            'label'         => __('Text Transform', 'livemesh-bb-addons'),
                            'default'       => 'none',
                            'options'       => array(
                                'none' 			=> __( 'Default', 'livemesh-bb-addons' ),
                                'capitalize' 	=> __( 'Capitalize', 'livemesh-bb-addons' ),
                                'uppercase' 	=> __( 'Uppercase', 'livemesh-bb-addons' ),
                                'lowercase' 	=> __( 'Lowercase', 'livemesh-bb-addons' ),
                                'initial' 		=> __( 'Initial', 'livemesh-bb-addons' ),
                                'inherit' 		=> __( 'Inherit', 'livemesh-bb-addons' ),
                            ),
                        ),
                    )
                ),
                'content_section' => array(
                    'title' => __('Short Text', 'livemesh-bb-addons'),
                    'fields' => array(

                        'text_color' => array(
                            'type' => 'color',
                            'label' => __('Text Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'text_font' => array(
                            'type' => 'font',
                            'label' => __('Text font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'text_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Text Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'text_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Text Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),
            )
        ),
    )
);
