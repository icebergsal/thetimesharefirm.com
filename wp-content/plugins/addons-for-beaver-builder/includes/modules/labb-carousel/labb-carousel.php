<?php

/*
Widget Name: Carousel
Description: Display a list of custom HTML content as a carousel.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBCarouselModule extends FLBuilderModule {

    private $custom_css;

    function __construct() {

        parent::__construct(array(
            'name' => __('Carousel', 'livemesh-bb-addons'),
            'description' => __('Display a list of custom HTML content as a carousel.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-carousel/',
            'url' => LABB_ADDONS_URL . 'labb-carousel/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));

        $this->add_js('slick');
        $this->add_css('slick');

    }

}

FLBuilder::register_module('LABBCarouselModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(

                'form_section' => array(
                    'title' => __('HTML Elements', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'elements' => array(
                                'type' => 'form',
                                'label' => __('HTML Element', 'livemesh-bb-addons'),
                                'form' => 'elements_form',
                                'preview_text' => 'element_name',
                                'multiple' => true
                            ),
                        )
                )
            )
        ),
        'settings' => array(
            'title' => __('Settings', 'livemesh-bb-addons'),
            'sections' => array(
                'options_section' => array(
                    'title' => __('Carousel Settings', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'arrows' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Prev/Next Arrows?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'dots' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Show dot indicators for navigation?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'pause_on_hover' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Pause on mouse hover?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'autoplay' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Autoplay?', 'livemesh-bb-addons'),
                                'description' => __('Should the carousel autoplay as in a slideshow.', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'autoplay_speed' => array(
                                'type' => 'labb-number',
                                'label' => __('Autoplay speed in ms', 'livemesh-bb-addons'),
                                'default' => 3000,
                                'min' => 1000,
                                'max' => 20000,
                                'description' => 'ms',
                            ),

                            'animation_speed' => array(
                                'type' => 'labb-number',
                                'label' => __('Autoplay animation speed in ms', 'livemesh-bb-addons'),
                                'default' => 600,
                                'min' => 100,
                                'max' => 2000,
                                'description' => 'ms',
                            ),
                        )
                ),
            )
        ),


        'layout' => array(
            'title' => __('Responsive', 'livemesh-bb-addons'),
            'sections' => array(
                'desktop_section' => array(
                    'title' => __('Desktop Options', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'display_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 5,
                                'default' => 3,
                                'description' => 'columns (max: 5)',
                                'connections' => array('custom_field')
                            ),

                            'scroll_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns to scroll', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 5,
                                'default' => 3,
                                'maxlength' => '1',
                                'size' => '3',
                                'description' => 'columns (max: 5)',
                                'connections' => array('custom_field')
                            ),

                            'gutter' => array(
                                'type' => 'text',
                                'label' => __('Gutter', 'livemesh-bb-addons'),
                                'description' => __('Space between columns.', 'livemesh-bb-addons'),
                                'default' => '10',
                                'maxlength' => '2',
                                'size' => '4',
                                'description' => 'px',
                            ),
                        )
                ),
                'tablet_section' => array(
                    'title' => __('Tablet Options', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'tablet_display_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 3,
                                'default' => 2,
                                'description' => 'columns (max: 3)',
                                'connections' => array('custom_field')
                            ),
                            'tablet_scroll_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns to scroll', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 3,
                                'default' => 2,
                                'description' => 'columns (max: 3)',
                                'connections' => array('custom_field')
                            ),
                            'tablet_gutter' => array(
                                'type' => 'text',
                                'label' => __('Gutter', 'livemesh-bb-addons'),
                                'description' => __('Space between columns.', 'livemesh-bb-addons'),
                                'default' => '10',
                                'maxlength' => '2',
                                'size' => '4',
                                'description' => 'px',
                            ),
                            'tablet_width' => array(
                                'type' => 'text',
                                'label' => __('Resolution', 'livemesh-bb-addons'),
                                'description' => __('The resolution to treat as a tablet resolution.', 'livemesh-bb-addons'),
                                'default' => '800',
                                'maxlength' => '4',
                                'size' => '5',
                                'description' => 'px',
                            )
                        )
                ),

                'mobile_section' => array(
                    'title' => __('Mobile Options', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'mobile_display_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 2,
                                'integer' => true,
                                'default' => 1,
                                'description' => 'columns (max: 2)',
                                'connections' => array('custom_field')
                            ),
                            'mobile_scroll_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns to scroll', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 2,
                                'integer' => true,
                                'default' => 1,
                                'description' => 'columns (max: 2)',
                                'connections' => array('custom_field')
                            ),
                            'mobile_gutter' => array(
                                'type' => 'text',
                                'label' => __('Gutter', 'livemesh-bb-addons'),
                                'description' => __('Space between columns.', 'livemesh-bb-addons'),
                                'default' => '10',
                                'maxlength' => '2',
                                'size' => '4',
                                'description' => 'px',
                            ),
                            'mobile_width' => array(
                                'type' => 'text',
                                'label' => __('Resolution', 'livemesh-bb-addons'),
                                'description' => __('The resolution to treat as a mobile resolution.', 'livemesh-bb-addons'),
                                'default' => '480',
                                'maxlength' => '4',
                                'size' => '5',
                                'description' => 'px',
                            )
                        )
                )
            )
        ),


        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'content_section' => array(
                    'title' => __('Carousel Content', 'livemesh-bb-addons'),
                    'fields' => array(

                        'content_color' => array(
                            'type' => 'color',
                            'label' => __('Text Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),

                        'content_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Text Background Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),

                        'content_padding' => array(
                            'type' => 'labb-number',
                            'label' => __('Text padding', 'livemesh-bb-addons'),
                            'description' => 'px'

                        ),
                        'content_font' => array(
                            'type' => 'font',
                            'label' => __('Text font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'content_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Text Font Size', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'responsive' => true,
                        ),
                        'content_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Text Line height', 'livemesh-bb-addons'),
                            'description' => 'px',
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
FLBuilder::register_settings_form('elements_form', array(
    'title' => __('HTML Element', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter HTML Content',

                    'fields' => array(
                        'element_name' => array(
                            'type' => 'text',
                            'label' => __('Title', 'livemesh-bb-addons'),
                            'description' => __('The title to identify the HTML element', 'livemesh-bb-addons'),
                        ),

                        'element_content' => array(
                            'type' => 'editor',
                            'label' => '',
                            'default' => __('The HTML content for the carousel item.', 'livemesh-bb-addons'),
                            'media_buttons' => true,
                            'rows' => 10,
                            'connections' => array('string', 'html'),
                        ),
                    )
                )
            )
        ),
    )
));