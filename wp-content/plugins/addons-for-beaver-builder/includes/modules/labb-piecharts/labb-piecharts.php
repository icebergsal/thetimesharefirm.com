<?php

/*
Widget Name: Piecharts
Description: Display one or more piecharts depicting a percentage value in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBPiechartsModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Piecharts', 'livemesh-bb-addons'),
            'description' => __('Display one or more piecharts depicting a percentage value in a multi-column grid.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-piecharts/',
            'url' => LABB_ADDONS_URL . 'labb-piecharts/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js('labb-waypoints');
        $this->add_js('jquery-stats');

    }
}


FLBuilder::register_module('LABBPiechartsModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(

                'form_section' => array(
                    'title' => __('Piecharts', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'piecharts' => array(
                                'type' => 'form',
                                'label' => __('Piechart', 'livemesh-bb-addons'),
                                'form' => 'piecharts_form',
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
                    'title' => __('General', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'per_line' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 4,
                                'description' => 'Piecharts per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_tablet' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Tablet Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 2,
                                'description' => 'Piecharts per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_mobile' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Mobile Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 4,
                                'default' => 1,
                                'description' => 'Piecharts per row (max: 4)',
                                'connections' => array('custom_field')
                            ),

                            'percent_symbol' => array(
                                'type' => 'text',
                                'label' => __('Percent Symbol', 'livemesh-bb-addons'),
                                'description' => __('The percent symbol for the piechart value', 'livemesh-bb-addons'),
                                'default' => '%',
                                'connections' => array('string', 'html'),
                            ),
                        )
                ),
            )
        ),

        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'piechart_styling_section' => array(
                    'title' => __('Piechart Styling', 'livemesh-bb-addons'),
                    'fields' => array(

                        'bar_color' => array(
                            'type' => 'color',
                            'label' => __('Bar color', 'livemesh-bb-addons'),
                            'default' => '#f94213',
                            'connections' => array('custom_field')
                        ),

                        'track_color' => array(
                            'type' => 'color',
                            'label' => __('Track color', 'livemesh-bb-addons'),
                            'default' => '#dddddd',
                            'connections' => array('custom_field')
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
                'stats_percentage_symbol_section' => array(
                    'title' => __('Stats Percentage Symbol', 'livemesh-bb-addons'),
                    'fields' => array(


                        'stats_percentage_symbol_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'stats_percentage_symbol_font' => array(
                            'type' => 'font',
                            'label' => __('Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'stats_percentage_symbol_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'stats_percentage_symbol_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
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
FLBuilder::register_settings_form('piecharts_form', array(
    'title' => __('Piechart', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Piechart Data',

                    'fields' => array(

                        'chart_title' => array(
                            'type' => 'text',
                            'label' => __('Chart Title', 'livemesh-bb-addons'),
                            'description' => __('The top title for the piechart', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'stats_title' => array(
                            'type' => 'text',
                            'label' => __('Percentage Description', 'livemesh-bb-addons'),
                            'description' => __('The title description for the percentage value', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'percentage' => array(
                            'type' => 'labb-number',
                            'label' => __('Percentage Value', 'livemesh-bb-addons'),
                            'description' => __('The percentage value for the stats.', 'livemesh-bb-addons'),
                            'min' => 1,
                            'max' => 100,
                            'default' => 23,
                            'connections' => array('custom_field')
                        ),
                    )
                )
            )
        ),
    )
));