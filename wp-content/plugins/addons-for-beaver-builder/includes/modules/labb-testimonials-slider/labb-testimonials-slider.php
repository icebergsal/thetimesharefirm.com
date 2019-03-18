<?php

/*
Widget Name: Testimonials Slider
Description: Display responsive touch friendly slider of testimonials from clients/customers.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBTestimonialsSliderModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Testimonials Slider', 'livemesh-bb-addons'),
            'description' => __('Display responsive touch friendly slider of testimonials from clients/customers.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-testimonials-slider/',
            'url' => LABB_ADDONS_URL . 'labb-testimonials-slider/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js( 'jquery-flexslider' );
        $this->add_css( 'flexslider' );

    }

}



FLBuilder::register_module('LABBTestimonialsSliderModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),

            'options_section' => array(
                'title' => __('Options', 'livemesh-bb-addons'), // Section Title
                'fields' =>
                    array(

                        "class" => array(
                            "type" => "text",
                            "description" => __("Set a unique CSS class for the slider. (optional).", "livemesh-bb-addons"),
                            "label" => __("Class", "livemesh-bb-addons"),
                        ),
                    )
            ),
            'sections' => array(

                'form_section' => array(
                    'title' => __('Testimonials', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'testimonials' => array(
                                'type' => 'form',
                                'label' => __('Testimonial', 'livemesh-bb-addons'),
                                'form' => 'testimonials_slider_form',
                                'preview_text' => 'author_name',
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
                    'title' => __('Slider Settings', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'slide_animation' => array(
                                'type' => 'select',
                                'description' => __('Select your animation type.', 'livemesh-bb-addons'),
                                'label' => __('Animation', 'livemesh-bb-addons'),
                                'options' => array(
                                    'slide' => __('Slide', 'livemesh-bb-addons'),
                                    'fade' => __('Fade', 'livemesh-bb-addons'),
                                ),
                                'default' => 'slide',
                            ),
                            'direction' => array(
                                'type' => 'select',
                                'description' => __('Select the sliding direction.', 'livemesh-bb-addons'),
                                'label' => __('Sliding Direction', 'livemesh-bb-addons'),
                                'options' => array(
                                    'horizontal' => __('Horizontal', 'livemesh-bb-addons'),
                                    'vertical' => __('Vertical', 'livemesh-bb-addons'),
                                ),
                                'default' => 'horizontal',
                            ),
                            'control_nav' => array(
                                'type' => 'labb-toggle-button',
                                'description' => __('Create navigation for paging control of each slide?', 'livemesh-bb-addons'),
                                'label' => __('Control navigation?', 'livemesh-bb-addons'),
                                'default' => 'yes',
                            ),
                            'direction_nav' => array(
                                'type' => 'labb-toggle-button',
                                'description' => __('Create navigation for previous/next navigation?', 'livemesh-bb-addons'),
                                'label' => __('Direction navigation?', 'livemesh-bb-addons'),
                                'default' => 'no',
                            ),
                            'randomize' => array(
                                'type' => 'labb-toggle-button',
                                'description' => __('Randomize slide order?', 'livemesh-bb-addons'),
                                'label' => __('Randomize slides?', 'livemesh-bb-addons'),
                                'default' => 'no',
                            ),
                            'pause_on_hover' => array(
                                'type' => 'labb-toggle-button',
                                'description' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'livemesh-bb-addons'),
                                'label' => __('Pause on hover?', 'livemesh-bb-addons'),
                                'default' => 'yes',
                            ),
                            'pause_on_action' => array(
                                'type' => 'labb-toggle-button',
                                'description' => __('Pause the slideshow when interacting with control elements.', 'livemesh-bb-addons'),
                                'label' => __('Pause on action?', 'livemesh-bb-addons'),
                                'default' => 'yes',
                            ),
                            'slideshow_speed' => array(
                                'type' => 'labb-number',
                                'description' => __('Set the speed of the slideshow cycling, in milliseconds', 'livemesh-bb-addons'),
                                'label' => __('Slideshow speed', 'livemesh-bb-addons'),
                                'default' => 5000,
                                'min' => 1000,
                                'max' => 20000,
                                'description' => 'ms',
                            ),
                            'animation_speed' => array(
                                'type' => 'labb-number',
                                'description' => __('Set the speed of animations, in milliseconds.', 'livemesh-bb-addons'),
                                'label' => __('Animation speed', 'livemesh-bb-addons'),
                                'default' => 600,
                                'min' => 100,
                                'max' => 2000,
                                'description' => 'ms',
                            ),
                        )
                ),
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
                        'thumbnail_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Spacing after thumbnail', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 10,
                            'max' => 128,
                            'default' => 15
                        ),
                    )
                ),
                'testimonials_text_section' => array(
                    'title' => __('Author Testimonial Text', 'livemesh-bb-addons'),
                    'fields' => array(

                       
                        'text_color' => array(
                            'type' => 'color',
                            'label' => __('Testimonials Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
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
                        'text_font_style' => array(
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
                'author_name_section' => array(
                    'title' => __('Author Name', 'livemesh-bb-addons'),
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
                'quote_icon_section' => array(
                    'title' => __('Quote Icon', 'livemesh-bb-addons'),
                    'fields' => array(
                        'quote_icon_size' => array(
                            'type' => 'labb-number',
                            'label' => __('Icon size in pixels', 'livemesh-bb-addons'),
                            'description' => 'px',
                            'min' => 10,
                            'max' => 128,
                        ),
                        'quote_icon_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Color', 'livemesh-bb-addons'),
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
FLBuilder::register_settings_form('testimonials_slider_form', array(
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
    )
));