<?php

/**
 * @class UABBSeparatorModule
 */
class UABBSeparatorModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Simple Separator', 'uabb'),
			'description'   	=> __('A divider line to separate content.', 'uabb'),
			'category'          => BB_Ultimate_Addon_Helper::module_cat(BB_Ultimate_Addon_Helper::$basic_modules),
            'group'         => UABB_CAT,
			'dir'           	=> BB_ULTIMATE_ADDON_DIR . 'modules/uabb-separator/',
            'url'           	=> BB_ULTIMATE_ADDON_URL . 'modules/uabb-separator/',
            'editor_export' 	=> false,
			'partial_refresh'	=> true,
			'icon'				=> 'minus.svg',
			
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('UABBSeparatorModule', array(
	'general'       => array( // Tab
		'title'         => __('General', 'uabb'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => '', // Section Title
				'fields'        => array( // Section Fields
					'color' => array( 
						'type'       => 'color',
						'label'      => __('Color', 'uabb'),
						'default'    => '',
						'show_reset' => true,
					),
					'height'        => array(
						'type'          => 'text',
						'label'         => __('Thickness', 'uabb'),
						'placeholder'   => '1',
						'maxlength'     => '2',
						'size'          => '3',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.uabb-separator',
							'property'      => 'border-top-width',
							'unit'          => 'px'
						),
						'help'			=> __( 'Thickness of Border', 'uabb' )
					),
					'width'        => array(
						'type'          => 'text',
						'label'         => __('Width', 'uabb'),
						'placeholder'   => '100',
						'maxlength'     => '3',
						'size'          => '5',
						'description'   => '%'
					),
					'alignment'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'uabb'),
						'default'       => 'center',
						'options'       => array(
							'center'      => __( 'Center', 'uabb' ),
							'left'        => __( 'Left', 'uabb' ),
							'right'       => __( 'Right', 'uabb' )
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.uabb-separator-parent',
							'property'      => 'text-align'
						),
						'help'          => __('Align the border.', 'uabb'),
					),
					'style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'uabb'),
						'default'       => 'solid',
						'options'       => array(
							'solid'         => __( 'Solid', 'uabb' ),
							'dashed'        => __( 'Dashed', 'uabb' ),
							'dotted'        => __( 'Dotted', 'uabb' ),
							'double'        => __( 'Double', 'uabb' )
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.uabb-separator',
							'property'      => 'border-top-style'
						),
						'help'          => __('The type of border to use. Double borders must have a height of at least 3px to render properly.', 'uabb'),
					)
				)
			)
		)
	)
));
