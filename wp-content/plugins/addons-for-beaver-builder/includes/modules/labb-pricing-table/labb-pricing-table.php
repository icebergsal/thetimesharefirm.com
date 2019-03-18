<?php

/*
Widget Name: Pricing Table
Description: Display pricing plans in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBPricingTableModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Pricing Table', 'livemesh-bb-addons'),
            'description' => __('Display pricing plans in a multi-column grid.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-pricing-table/',
            'url' => LABB_ADDONS_URL . 'labb-pricing-table/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));

        $this->add_js('labb-waypoints');
        $this->add_css('animate');

        add_shortcode('labb_pricing_item', array($this, 'pricing_item_shortcode'));

    }

    public function pricing_item_shortcode($atts, $content = null, $tag) {

        $title = $value = '';

        extract(shortcode_atts(array(
            'title' => '',
            'value' => ''

        ), $atts));

        ob_start();

        ?>

        <div class="labb-pricing-item">

            <div class="labb-title">

                <?php echo htmlspecialchars_decode(wp_kses_post($title)); ?>

            </div>

            <div class="labb-value-wrap">

                <div class="labb-value">

                    <?php echo htmlspecialchars_decode(wp_kses_post($value)); ?>

                </div>

            </div>

        </div>

        <?php


        $output = ob_get_clean();

        return $output;
    }

}

FLBuilder::register_module('LABBPricingTableModule', array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(

                'form_section' => array(
                    'title' => __('Pricing Plans', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'pricing_plans' => array(
                                'type' => 'form',
                                'label' => __('Pricing Plan', 'livemesh-bb-addons'),
                                'form' => 'pricing_plans_form',
                                'preview_text' => 'pricing_title',
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

                            'per_line' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 4,
                                'description' => 'Pricing plans per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_tablet' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Tablet Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 6,
                                'default' => 2,
                                'description' => 'Pricing plans per row (max: 6)',
                                'connections' => array('custom_field')
                            ),

                            'per_line_mobile' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns in Mobile Resolution', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 4,
                                'default' => 1,
                                'description' => 'Pricing plans per row (max: 4)',
                                'connections' => array('custom_field')
                            ),
                        )
                ),
            )
        ),


        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'plan_name_section' => array(
                    'title' => __('Plan Name', 'livemesh-bb-addons'),
                    'fields' => array(

                        'plan_name_tag' => array(
                            'type' => 'select',
                            'label' => __('Plan Name HTML Tag', 'livemesh-bb-addons'),
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

                        'plan_name_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'plan_name_font' => array(
                            'type' => 'font',
                            'label' => __('font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'plan_name_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'plan_name_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'plan_name_text_transform'  => array(
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
                'plan_tagline_section' => array(
                    'title' => __('Plan Tagline', 'livemesh-bb-addons'),
                    'fields' => array(


                        'plan_tagline_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'plan_tagline_font' => array(
                            'type' => 'font',
                            'label' => __('Plan Tagline font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'plan_tagline_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'plan_tagline_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'plan_tagline_text_transform'  => array(
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

                'plan_price_section' => array(
                    'title' => __('Plan Price', 'livemesh-bb-addons'),
                    'fields' => array(

                        'plan_price_tag' => array(
                            'type' => 'select',
                            'label' => __('Plan Price HTML Tag', 'livemesh-bb-addons'),
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

                        'plan_price_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'plan_price_font' => array(
                            'type' => 'font',
                            'label' => __('font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'plan_price_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'plan_price_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),

                'item_title_section' => array(
                    'title' => __('Pricing Item Title', 'livemesh-bb-addons'),
                    'fields' => array(

                        'item_title_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'item_title_font' => array(
                            'type' => 'font',
                            'label' => __('font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'item_title_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'item_title_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'item_title_text_transform'  => array(
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

                'item_value_section' => array(
                    'title' => __('Pricing Item Value', 'livemesh-bb-addons'),
                    'fields' => array(

                        'item_value_color' => array(
                            'type' => 'color',
                            'label' => __('Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'item_value_font' => array(
                            'type' => 'font',
                            'label' => __('font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'item_value_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'item_value_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                    )
                ),

                'button_section' => array(
                    'title' => __('Purchase Button', 'livemesh-bb-addons'),
                    'fields' => array(

                        'button_spacing' => array(
                            'type' => 'labb-number',
                            'label' => __('Button Spacing', 'livemesh-bb-addons'),
                            'description' => 'px'

                        ),
                        'button_top_bottom_padding' => array(
                            'type' => 'labb-number',
                            'label' => __('Button Top and Bottom Padding', 'livemesh-bb-addons'),
                            'description' => 'px'

                        ),
                        'button_left_right_padding' => array(
                            'type' => 'labb-number',
                            'label' => __('Button Left and Right Padding', 'livemesh-bb-addons'),
                            'description' => 'px'

                        ),
                        'button_custom_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Button Custom Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'button_custom_bg_hover_color' => array(
                            'type' => 'color',
                            'label' => __('Button Custom Hover Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'button_text_color' => array(
                            'type' => 'color',
                            'label' => __('Button Text Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'button_text_font' => array(
                            'type' => 'font',
                            'label' => __('Button Text font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'button_text_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Button Text Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),
                        'button_text_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Button Text Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                            'description' => 'px'
                        ),

                        'button_text_text_transform'  => array(
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
            )
        ),
    )
);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('pricing_plans_form', array(
    'title' => __('Pricing Plan', 'livemesh-bb-addons'),
    'tabs' => array(
        'general' => array(
            'title' => __('General', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Enter Pricing Plan',

                    'fields' => array(
                        'pricing_title' => array(
                            'type' => 'text',
                            'label' => __('Pricing Plan Title', 'livemesh-bb-addons'),
                            'description' => __('The title for the pricing plan', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'tagline' => array(
                            'type' => 'text',
                            'label' => __('Tagline Text', 'livemesh-bb-addons'),
                            'description' => __('Provide any subtitle or taglines like "Most Popular", "Best Value", "Best Selling", "Most Flexible" etc. that you would like to use for this pricing plan.', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'pricing_image' => array(
                            'type' => 'photo',
                            'label' => __('Image', 'livemesh-bb-addons'),
                            'connections' => array('photo')
                        ),

                        'price_tag' => array(
                            'type' => 'text',
                            'label' => __('Price Tag', 'livemesh-bb-addons'),
                            'description' => __('Enter the price tag for the pricing plan. HTML is accepted.', 'livemesh-bb-addons'),
                            'connections' => array('custom_field')
                        ),

                        'highlight' => array(
                            'type' => 'labb-toggle-button',
                            'label' => __('Highlight Pricing Plan', 'livemesh-bb-addons'),
                            'description' => __('Specify if you want to highlight the pricing plan.', 'livemesh-bb-addons'),
                            'default' => 'no'
                        ),
                        'pricing_content' => array(
                            'type' => 'textarea',
                            'label' => __('Pricing Plan Details', 'livemesh-bb-addons'),
                            'description' => __('Enter the content for the pricing plan that include information about individual features of the pricing plan. For prebuilt styling, enter shortcodes content like - [labb_pricing_item title="Storage Space" value="50 GB"] [labb_pricing_item title="Video Uploads" value="50"][labb_pricing_item title="Portfolio Items" value="20"]', 'livemesh-bb-addons'),
                            'rows' => 6,
                            'connections' => array('string', 'html'),
                        ),

                    )
                )
            )
        ),
        'pricing_button' => array(
            'title' => __('Pricing Button', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Purchase Link',
                    'fields' => array(
                        'button_text' => array(
                            'type' => 'text',
                            'label' => __('Text for Pricing Link/Button', 'livemesh-bb-addons'),
                            'description' => __('Provide the text for the link or the button shown for this pricing plan.', 'livemesh-bb-addons'),
                            'connections' => array('string', 'html'),
                        ),

                        'pricing_url' => array(
                            'type' => 'link',
                            'label' => __('URL for the Pricing link/button', 'livemesh-bb-addons'),
                            'description' => __('Provide the target URL for the link or the button shown for this pricing plan.', 'livemesh-bb-addons'),
                            'connections' => array('url'),
                        ),

                        'new_window' => array(
                            'type' => 'labb-toggle-button',
                            'label' => __('Open Button URL in a new window', 'livemesh-bb-addons'),
                            'default' => 'no'
                        ),

                    )
                )
            )
        ),
        'options' => array(
            'title' => __('Options', 'livemesh-bb-addons'),
            'sections' => array(
                'general' => array(
                    'title' => 'Pricing Plan Settings',

                    'fields' => array(

                        'pricing_animation' => array(
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