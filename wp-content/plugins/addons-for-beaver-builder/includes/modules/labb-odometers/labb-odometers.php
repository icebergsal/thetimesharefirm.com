<?php

/*
Widget Name: Odometers
Description: Display one or more animated odometer statistics in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBOdometersModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Odometers', 'livemesh-bb-addons'),
            'description' => __('Display one or more animated odometer statistics in a multi-column grid.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-odometers/',
            'url' => LABB_ADDONS_URL . 'labb-odometers/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js( 'labb-waypoints' );
        $this->add_js( 'jquery-stats' );
    }
}

FLBuilder::register_module('LABBOdometersModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(

                'form_section' => array(
                    'title' => __('Odometers', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'odometers' => array(
                                'type' => 'form',
                                'label' => __('Odometer', 'livemesh-bb-addons'),
                                'form' => 'odometers_form',
                                'preview_text' => 'stats_title',
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
                    'title' => __('Options', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'per_line' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 4,
                                'description' => 'Odometers per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_tablet' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Tablet Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 2,
                                'description' => 'Odometers per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_mobile' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Mobile Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 4,
                                'default' => 1,
                                'description' => 'Odometers per row (max: 4)',
                                'connections' => array('custom_field')
                            ),
                        )
                ),

            )
        ),

        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'stats_number_section' => array(
                    'title' => __('Stats Number', 'livemesh-bb-addons'),
                    'fields' => array(

                        'stats_number_color' => array(
                            'type' => 'color',
                            'label' => __('Stats Number Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'stats_number_font' => array(
                            'type' => 'font',
                            'label' => __('Stats Number font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'stats_number_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Stats Number Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'stats_number_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Stats Number Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),
                'stats_prefix_suffix_section' => array(
                    'title' => __('Stats Prefix and Suffix', 'livemesh-bb-addons'),
                    'fields' => array(


                        'stats_prefix_suffix_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'stats_prefix_suffix_font' => array(
                            'type' => 'font',
                            'label' => __('Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'stats_prefix_suffix_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'stats_prefix_suffix_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),
                'stats_title_section' => array(
                    'title' => __('Stats Title', 'livemesh-bb-addons'),
                    'fields' => array(

                        'stats_title_color' => array(
                            'type' => 'color',
                            'label' => __('Stats Title Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'stats_title_font' => array(
                            'type' => 'font',
                            'label' => __('Stats Title Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'stats_title_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Stats Title Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'stats_title_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Stats Title Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'stats_title_text_transform'  => array(
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
                'icon_section' => array(
                    'title' => __('Icons', 'livemesh-bb-addons'),
                    'fields' => array(
                        'icon_size' => array(
                            'type' => 'labb-number',
                            'label' => __('Icon or Icon Image size in pixels', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 6,
                            'max' => 128,
                        ),
                        'icon_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Spacing after icon', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 1,
                            'max' => 64,
                            'default' => 15
                        ),
                        'icon_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Color', 'livemesh-bb-addons'),
                            'default' => '',
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
FLBuilder::register_settings_form('odometers_form', array(
    'title' => __('Odometer', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Odometer Data',

                    'fields' => array(
                        'stats_title' => array(
                            'type' => 'text',
                            'label' => __('Stats Title', 'livemesh-bb-addons'),
                            'description' => __('The title for the odometer stats', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'start_value' => array(
                            'type' => 'labb-number',
                            'label' => __('Start Value', 'livemesh-bb-addons'),
                            'description' => __('The start value for the odometer stats.', 'livemesh-bb-addons'),
                            'default' => 0,
                            'connections' => array('custom_field')
                        ),

                        'stop_value' => array(
                            'type' => 'labb-number',
                            'label' => __('Stop Value', 'livemesh-bb-addons'),
                            'description' => __('The stop value for the odometer stats.', 'livemesh-bb-addons'),
                            'default' => 300,
                            'connections' => array('custom_field')
                        ),

                        'icon_type' => array(
                            'type' => 'select',
                            'label' => __('Choose Icon Type', 'livemesh-bb-addons'),
                            'default' => 'icon',
                            'toggle' => array(
                                'icon_image' => array(
                                    'fields' => array('icon_image')
                                ),
                                'icon' => array(
                                    'fields' => array('font_icon'),
                                ),
                            ),
                            'options' => array(
                                'icon' => __('Icon', 'livemesh-bb-addons'),
                                'icon_image' => __('Icon Image', 'livemesh-bb-addons'),
                            ),
                            'connections' => array('custom_field')
                        ),

                        'icon_image' => array(
                            'type' => 'photo',
                            'label' => __('Stats Image.', 'livemesh-bb-addons'),
                            'connections' => array('photo')
                        ),

                        'font_icon' => array(
                            'type' => 'icon',
                            'label' => __('Stats Icon.', 'livemesh-bb-addons'),
                        ),

                        'prefix' => array(
                            'type' => 'text',
                            'label' => __('Prefix String', 'livemesh-bb-addons'),
                            'description' => __('Examples include currency symbols like $ to indicate a monetary value.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'suffix' => array(
                            'type' => 'text',
                            'label' => __('Suffix String', 'livemesh-bb-addons'),
                            'description' => __('Examples include strings like hr for hours or m for million.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),
                    )
                )
            )
        ),
    )
));