<?php

/*
Widget Name: Stats Bars
Description: Display multiple stats bars that talk about skills or other percentage stats.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBStatsBarsModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Stats Bars', 'livemesh-bb-addons'),
            'description' => __('Display multiple stats bars that talk about skills or other percentage stats.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-stats-bar/',
            'url' => LABB_ADDONS_URL . 'labb-stats-bar/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));

        $this->add_js('labb-waypoints');

    }
}

FLBuilder::register_module('LABBStatsBarsModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'form_section' => array(
                    'title' => __('Stats Bars', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'stats_bars' => array(
                                'type' => 'form',
                                'label' => __('Stats Bar', 'livemesh-bb-addons'),
                                'form' => 'stats_bars_form',
                                'preview_text' => 'stats_title',
                                'multiple' => true
                            ),
                        )
                )
            )
        ),


        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'stats_bar_section' => array(

                    'title' => __('Stats Bar', 'livemesh-bb-addons'),

                    'fields' => array(

                        'stats_bar_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Stats Bar Background Color', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),
                        'stats_bar_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Stats Bar Spacing', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 5,
                            'max' => 128,
                            'default' => 18
                        ),
                        'stats_bar_height' => array(
                            'type' => 'labb-number',
                            'label' => __('Stats Bar Height', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 1,
                            'max' => 96,
                            'default' => 10
                        ),
                        'stats_bar_border_radius' => array(
                            'type' => 'labb-number',
                            'label' => __('Stats Bar Border Radius', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 1,
                            'max' => 96,
                            'default' => 5
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
                'stats_percentage_section' => array(
                    'title' => __('Stats Percentage', 'livemesh-bb-addons'),
                    'fields' => array(

                        'stats_percentage_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Spacing from Stats Title', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 1,
                            'max' => 64,
                            'default' => 5
                        ),
                        'stats_percentage_color' => array(
                            'type' => 'color',
                            'label' => __('Percentage Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'stats_percentage_font' => array(
                            'type' => 'font',
                            'label' => __('Percentage font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'stats_percentage_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Percentage Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'stats_percentage_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Percentage Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
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
FLBuilder::register_settings_form('stats_bars_form', array(
    'title' => __('Stats Bar', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Stats Bar Data',

                    'fields' => array(
                        'stats_title' => array(
                            'type' => 'text',
                            'label' => __('Stats Title', 'livemesh-bb-addons'),
                            'description' => __('The title for the stats bar', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'percentage' => array(
                            'type' => 'labb-number',
                            'label' => __('Percentage Value', 'livemesh-bb-addons'),
                            'description' => __('The percentage value for the stats.', 'livemesh-bb-addons'),
                            'min' => 1,
                            'max' => 100,
                            'default' => 80,
                            'connections' => array('custom_field')
                        ),

                        'bar_color' => array(
                            'type' => 'color',
                            'label' => __('Bar color', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),
                    )
                )
            )
        ),
    )
));