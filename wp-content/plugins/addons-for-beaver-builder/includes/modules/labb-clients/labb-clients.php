<?php

/*
Widget Name: Clients
Description: Display list of your clients in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBClientsModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Clients', 'livemesh-bb-addons'),
            'description' => __('Display one or more clients in a multi-column grid.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-clients/',
            'url' => LABB_ADDONS_URL . 'labb-clients/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js('labb-waypoints');
        $this->add_css('animate');

    }

}


FLBuilder::register_module('LABBClientsModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(

                'form_section' => array(
                    'title' => __('Clients', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'clients' => array(
                                'type' => 'form',
                                'label' => __('Client', 'livemesh-bb-addons'),
                                'form' => 'clients_form',
                                'preview_text' => 'client_name',
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
                                'default' => 5,
                                'description' => 'clients per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_tablet' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Tablet Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 3,
                                'description' => 'clients per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_mobile' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Mobile Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 4,
                                'default' => 2,
                                'description' => 'clients per row (max: 4)',
                                'connections' => array('custom_field')
                            ),

                            'client_animation' => array(
                                'type' => 'select',
                                'label' => __('Choose Animation Type', 'livemesh-bb-addons'),
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
                'client_image_section' => array(
                    'title' => __('Client Image', 'livemesh-bb-addons'),
                    'fields' => array(

                        'client_border_color' => array(
                            'type' => 'color',
                            'label' => __('Client Border Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'client_hover_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Client Hover Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'client_padding' => array(
                            'type' => 'labb-number',
                            'label' => __('Client Padding', 'livemesh-bb-addons'),
                            'description' => 'px'

                        ),
                        'thumbnail_hover_opacity' => array(
                            'type' => 'labb-number',
                            'label' => __('Thumbnail Hover Opacity (%)', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => '%',
                            'min' => 1,
                            'max' => 100,
                            'default' => 70
                        ),
                    )
                ),
                'client_name_section' => array(
                    'title' => __('Client Name', 'livemesh-bb-addons'),
                    'fields' => array(

                        'client_name_color' => array(
                            'type' => 'color',
                            'label' => __('Client Name Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'client_name_hover_color' => array(
                            'type' => 'color',
                            'label' => __('Client Name Hover Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'client_name_font' => array(
                            'type' => 'font',
                            'label' => __('Client Name Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'client_name_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Client Name Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'client_name_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Client Name Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
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
FLBuilder::register_settings_form('clients_form', array(
    'title' => __('Add Client', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Client Information',

                    'fields' => array(

                        'client_name' => array(
                            'type' => 'text',
                            'label' => __('Client Name', 'livemesh-bb-addons'),
                            'description' => __('The name of the client/customer.', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),
                        'client_link' => array(
                            'type' => 'link',
                            'label' => __('Client URL', 'livemesh-bb-addons'),
                            'description' => __('The website of the client/customer.', 'livemesh-bb-addons'),
                            'connections' => array('url'),
                        ),
                        'client_image' => array(
                            'type' => 'photo',
                            'label' => __('Client Logo', 'livemesh-bb-addons'),
                            'description' => __('The logo image for the client/customer.', 'livemesh-bb-addons'),
                            'connections' => array('photo')
                        ),
                    )
                )
            )
        ),
    )
));