<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */
//echo '<pre>'; print_r($module); echo '</pre>';
//echo '<pre>'; print_r( $settings ); echo '</pre>';
?>

<div class="uabb-ribbon-wrap">
	<<?php echo $settings->text_tag_selection; ?> class="uabb-ribbon">		
		<span class="uabb-left-ribb flips"><i class="<?php echo $settings->left_icon; ?>"></i></span>
		<span class="uabb-ribbon-text">
			<?php if( $settings->stitching == 'yes' ) { ?> <div class="uabb-ribbon-stitches-top"></div> <?php } ?>
				<span class="uabb-ribbon-text-title"><?php echo $settings->title; ?></span>
			<?php if( $settings->stitching == 'yes' ) { ?> <div class="uabb-ribbon-stitches-bottom"></div> <?php } ?>
		</span>		
		<span class="uabb-right-ribb flips"><i class="<?php echo $settings->right_icon; ?>"></i></span>
	</<?php echo $settings->text_tag_selection; ?>>
</div>