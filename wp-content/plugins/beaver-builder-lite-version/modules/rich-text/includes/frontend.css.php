<?php

FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-rich-text, .fl-node-$id .fl-rich-text *",
	'props' => array(
		'color' => $settings->color . '!important',
	),
) );

FLBuilderCSS::typography_field_rule( array(
	'settings'		=> $settings,
	'setting_name' 	=> 'typography',
	'selector' 		=> ".fl-node-$id .fl-rich-text, .fl-node-$id .fl-rich-text *",
) );
