<?php

/*
Widget Name: Services
Description: Capture services in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/
class LABBServicesModule extends FLBuilderModule
{
    function __construct()
    {
        parent::__construct( array(
            'name'            => __( 'Services', 'livemesh-bb-addons' ),
            'description'     => __( 'Capture services in a multi-column grid.', 'livemesh-bb-addons' ),
            'group'           => __( 'Livemesh Addons', 'livemesh-bb-addons' ),
            'category'        => __( 'Livemesh Addons', 'livemesh-bb-addons' ),
            'dir'             => LABB_ADDONS_DIR . 'labb-services/',
            'url'             => LABB_ADDONS_URL . 'labb-services/',
            'editor_export'   => true,
            'enabled'         => true,
            'partial_refresh' => true,
        ) );
        $this->add_js( 'labb-waypoints' );
        $this->add_css( 'animate' );
    }

}
$style_options = [
    'style1' => __( 'Style 1', 'livemesh-bb-addons' ),
    'style2' => __( 'Style 2', 'livemesh-bb-addons' ),
    'style3' => __( 'Style 3', 'livemesh-bb-addons' ),
];
FLBuilder::register_module( 'LABBServicesModule', array(
    'general' => array(
    'title'    => __( 'General', 'livemesh-bb-addons' ),
    'sections' => array(
    'form_section' => array(
    'title'  => __( 'Services', 'livemesh-bb-addons' ),
    'fields' => array(
    'services' => array(
    'type'         => 'form',
    'label'        => __( 'Service', 'livemesh-bb-addons' ),
    'form'         => 'services_form',
    'preview_text' => 'service_title',
    'multiple'     => true,
),
),
),
),
),
    'options' => array(
    'title'    => __( 'Options', 'livemesh-bb-addons' ),
    'sections' => array(
    'options_section' => array(
    'fields' => array(
    'style'           => array(
    'type'          => 'select',
    'label'         => __( 'Choose Style', 'livemesh-bb-addons' ),
    'state_emitter' => array(
    'callback' => 'select',
    'args'     => array( 'style' ),
),
    'default'       => 'style1',
    'options'       => $style_options,
    'connections'   => array( 'custom_field' ),
),
    'per_line'        => array(
    'type'        => 'labb-number',
    'label'       => __( 'Columns per row', 'livemesh-bb-addons' ),
    'min'         => 1,
    'max'         => 6,
    'default'     => 3,
    'description' => 'Services per row (max: 6)',
    'connections' => array( 'custom_field' ),
),
    'per_line_tablet' => array(
    'type'        => 'labb-number',
    'label'       => __( 'Columns in Tablet Resolution', 'livemesh-bb-addons' ),
    'min'         => 1,
    'max'         => 6,
    'default'     => 2,
    'description' => 'Services per row (max: 6)',
    'connections' => array( 'custom_field' ),
),
    'per_line_mobile' => array(
    'type'        => 'labb-number',
    'label'       => __( 'Columns in Mobile Resolution', 'livemesh-bb-addons' ),
    'min'         => 1,
    'max'         => 4,
    'default'     => 1,
    'description' => 'Services per row (max: 4)',
    'connections' => array( 'custom_field' ),
),
),
),
),
),
    'style'   => array(
    'title'    => __( 'Style', 'livemesh-bb-addons' ),
    'sections' => array(
    'service_title_section' => array(
    'title'  => __( 'Service Title', 'livemesh-bb-addons' ),
    'fields' => array(
    'title_tag'                    => array(
    'type'    => 'select',
    'label'   => __( 'Title HTML Tag', 'livemesh-bb-addons' ),
    'default' => 'h3',
    'options' => array(
    'h1'  => __( 'H1', 'livemesh-bb-addons' ),
    'h2'  => __( 'H2', 'livemesh-bb-addons' ),
    'h3'  => __( 'H3', 'livemesh-bb-addons' ),
    'h4'  => __( 'H4', 'livemesh-bb-addons' ),
    'h5'  => __( 'H5', 'livemesh-bb-addons' ),
    'h6'  => __( 'H6', 'livemesh-bb-addons' ),
    'div' => __( 'Div', 'livemesh-bb-addons' ),
),
),
    'service_title_color'          => array(
    'type'       => 'color',
    'label'      => __( 'Service Title Color', 'livemesh-bb-addons' ),
    'default'    => '',
    'show_reset' => true,
),
    'service_title_font'           => array(
    'type'    => 'font',
    'label'   => __( 'Service Title Font', 'livemesh-bb-addons' ),
    'default' => array(
    'family' => 'Default',
    'weight' => 'default',
),
),
    'service_title_font_size'      => array(
    'type'        => 'unit',
    'label'       => __( 'Service Title Font Size', 'livemesh-bb-addons' ),
    'responsive'  => true,
    'description' => 'px',
),
    'service_title_line_height'    => array(
    'type'        => 'unit',
    'label'       => __( 'Service Title Line height', 'livemesh-bb-addons' ),
    'responsive'  => true,
    'description' => 'px',
),
    'service_title_text_transform' => array(
    'type'    => 'select',
    'label'   => __( 'Text Transform', 'livemesh-bb-addons' ),
    'default' => 'none',
    'options' => array(
    'none'       => __( 'Default', 'livemesh-bb-addons' ),
    'capitalize' => __( 'Capitalize', 'livemesh-bb-addons' ),
    'uppercase'  => __( 'Uppercase', 'livemesh-bb-addons' ),
    'lowercase'  => __( 'Lowercase', 'livemesh-bb-addons' ),
    'initial'    => __( 'Initial', 'livemesh-bb-addons' ),
    'inherit'    => __( 'Inherit', 'livemesh-bb-addons' ),
),
),
),
),
    'service_text_section'  => array(
    'title'  => __( 'Service Text', 'livemesh-bb-addons' ),
    'fields' => array(
    'service_text_color'       => array(
    'type'       => 'color',
    'label'      => __( 'Service Text Color', 'livemesh-bb-addons' ),
    'default'    => '',
    'show_reset' => true,
),
    'service_text_font'        => array(
    'type'    => 'font',
    'label'   => __( 'Service Text font', 'livemesh-bb-addons' ),
    'default' => array(
    'family' => 'Default',
    'weight' => 'default',
),
),
    'service_text_font_size'   => array(
    'type'        => 'unit',
    'label'       => __( 'Service Text Font Size', 'livemesh-bb-addons' ),
    'responsive'  => true,
    'description' => 'px',
),
    'service_text_line_height' => array(
    'type'        => 'unit',
    'label'       => __( 'Service Text Line height', 'livemesh-bb-addons' ),
    'responsive'  => true,
    'description' => 'px',
),
),
),
    'icon_section'          => array(
    'title'  => __( 'Service Icons', 'livemesh-bb-addons' ),
    'fields' => array(
    'icon_size'   => array(
    'type'        => 'labb-number',
    'label'       => __( 'Icon or Icon Image size in pixels', 'livemesh-bb-addons' ),
    'description' => 'px',
    'min'         => 6,
    'max'         => 300,
),
    'icon_color'  => array(
    'type'       => 'color',
    'label'      => __( 'Icon Custom Color', 'livemesh-bb-addons' ),
    'default'    => '',
    'show_reset' => true,
),
    'hover_color' => array(
    'type'       => 'color',
    'label'      => __( 'Icon Hover Color', 'livemesh-bb-addons' ),
    'default'    => '',
    'show_reset' => true,
),
),
),
),
),
) );
/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form( 'services_form', array(
    'title' => __( 'Service', 'livemesh-bb-addons' ),
    'tabs'  => array(
    'general' => array(
    'title'    => __( 'General', 'livemesh-bb-addons' ),
    'sections' => array(
    'general' => array(
    'title'  => 'Enter Service Data',
    'fields' => array(
    'service_title'   => array(
    'type'        => 'text',
    'label'       => __( 'Service Title', 'livemesh-bb-addons' ),
    'description' => __( 'Title of the service.', 'livemesh-bb-addons' ),
    'connections' => array( 'string', 'html' ),
),
    'service_excerpt' => array(
    'type'        => 'textarea',
    'label'       => __( 'Short description', 'livemesh-bb-addons' ),
    'description' => __( 'Provide a short description for the service', 'livemesh-bb-addons' ),
    'connections' => array( 'string', 'html' ),
),
    'icon_type'       => array(
    'type'        => 'select',
    'label'       => __( 'Choose Icon Type', 'livemesh-bb-addons' ),
    'default'     => 'icon',
    'toggle'      => array(
    'icon_image' => array(
    'fields' => array( 'icon_image' ),
),
    'icon'       => array(
    'tabs'   => array( 'styling' ),
    'fields' => array( 'font_icon' ),
),
),
    'options'     => array(
    'icon'       => __( 'Icon', 'livemesh-bb-addons' ),
    'icon_image' => __( 'Icon Image', 'livemesh-bb-addons' ),
),
    'connections' => array( 'custom_field' ),
),
    'icon_image'      => array(
    'type'        => 'photo',
    'label'       => __( 'Service Image.', 'livemesh-bb-addons' ),
    'connections' => array( 'photo' ),
),
    'font_icon'       => array(
    'type'  => 'icon',
    'label' => __( 'Service Icon.', 'livemesh-bb-addons' ),
),
),
),
),
),
    'options' => array(
    'title'    => __( 'Settings', 'livemesh-bb-addons' ),
    'sections' => array(
    'general' => array(
    'fields' => array(
    'service_animation' => array(
    'type'    => 'select',
    'label'   => __( 'Choose Animation Type', 'livemesh-bb-addons' ),
    'default' => 'none',
    'options' => labb_get_animation_options(),
),
),
),
),
),
),
) );