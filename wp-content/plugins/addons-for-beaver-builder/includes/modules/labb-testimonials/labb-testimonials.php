<?php

/*
Widget Name: Testimonials
Description: Display testimonials from your clients/customers in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBTestimonialsModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Testimonials', 'livemesh-bb-addons'),
            'description' => __('Display testimonials from your clients/customers in a multi-column grid.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-testimonials/',
            'url' => LABB_ADDONS_URL . 'labb-testimonials/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js( 'labb-waypoints' );
        $this->add_css( 'animate' );

    }

}


FLBuilder::register_module('LABBTestimonialsModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'options_section' => array(
                    'fields' =>
                        array(

                            'per_line' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 3,
                                'description' => 'Testimonials per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_tablet' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Tablet Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 2,
                                'description' => 'Testimonials per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_mobile' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Mobile Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 4,
                                'default' => 1,
                                'description' => 'Testimonials per row (max: 4)',
                                'connections' => array('custom_field')
                            ),
                        )
                ),

                'form_section' => array(
                    'title' => __('Testimonials', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'testimonials' => array(
                                'type' => 'form',
                                'label' => __('Testimonial', 'livemesh-bb-addons'),
                                'form' => 'labb_testimonials_form',
                                'preview_text' => 'author_name',
                                'multiple' => true
                            ),
                        )
                )
            )
        ),


        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'author_thumbnail_section' => array(
                    'title' => __('Author Thumbnail', 'livemesh-bb-addons'),
                    'fields' => array(

                        'thumbnail_size' => array(
                            'type' => 'labb-number',
                            'label' => __('Thumbnail Size', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 50,
                            'max' => 156,
                        ),
                        'thumbnail_border_radius' => array(
                            'type' => 'labb-number',
                            'label' => __('Thumbnail Border Radius', 'livemesh-bb-addons'),
                            'description' => 'px',
                        ),
                    )
                ),
                'testimonials_text_section' => array(
                    'title' => __('Author Testimonial Text', 'livemesh-bb-addons'),
                    'fields' => array(

                        'text_padding' => array(
                            'type' => 'labb-number',
                            'label' => __('Testimonials Padding', 'livemesh-bb-addons'),
                            'description' => 'px',
                        ),
                        'text_color' => array(
                            'type' => 'color',
                            'label' => __('Testimonials Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'text_border_color' => array(
                            'type' => 'color',
                            'label' => __('Testimonials Border Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'text_border_width' => array(
                            'type' => 'labb-number',
                            'label' => __('Testimonials Border Width', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 1,
                            'max' => 5,
                        ),
                        'text_font' => array(
                            'type' => 'font',
                            'label' => __('Testimonials font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'text_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Testimonials Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'text_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Testimonials Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),
                'author_name_section' => array(
                    'title' => __('Author Name', 'livemesh-bb-addons'),
                    'fields' => array(

                        'title_tag' => array(
                            'type' => 'select',
                            'label' => __('Title HTML Tag', 'livemesh-bb-addons'),
                            'default' => 'h4',
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
                            'label' => __('Title Transform', 'livemesh-bb-addons'),
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
                'credentials_section' => array(
                    'title' => __('Author Credentials', 'livemesh-bb-addons'),
                    'fields' => array(

                        'credential_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'credential_font' => array(
                            'type' => 'font',
                            'label' => __('font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'credential_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'credential_line_height' => array(
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
FLBuilder::register_settings_form('labb_testimonials_form', array(
    'title' => __('Testimonial', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Testimonial',

                    'fields' => array(
                        'author_name' => array(
                            'type' => 'text',
                            'label' => __('Name', 'livemesh-bb-addons'),
                            'description' => __('The author of the testimonial', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'credentials' => array(
                            'type' => 'text',
                            'label' => __('Author Details', 'livemesh-bb-addons'),
                            'description' => __('The details of the author like company name, position held, company URL etc. HTML accepted.', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'author_image' => array(
                            'type' => 'photo',
                            'label' => __('Image', 'livemesh-bb-addons'),
                            'connections' => array('photo')
                        ),

                        'author_text' => array(
                            'type' => 'editor',
                            'label' => '',
                            'description' => __('What your customer had to say', 'livemesh-bb-addons'),
                            'default' => __('The testimonials text goes here', 'livemesh-bb-addons'),
                            'media_buttons' => true,
                            'rows' => 10,
                            'connections' => array('string', 'html'),
                        ),
                    )
                )
            )
        ),
        'settings' => array(
            'title' => __('Settings', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(

                    'fields' => array(

                        'testimonial_animation' => array(
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
