
.fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-image-wrapper img {
<?php
    if( !empty( $settings->thumbnail_size ) ) {
        echo 'max-width: '. $settings->thumbnail_size .'px;';
    }
    if( !empty( $settings->thumbnail_border_radius ) ) {
        echo 'border-radius: '. $settings->thumbnail_border_radius .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-text {
<?php
    if( $settings->text_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->text_font );
    }
    if( !empty( $settings->text_font_size ) ) {
        echo 'font-size: '. $settings->text_font_size .'px;';
    }
    if( !empty( $settings->text_line_height ) ) {
        echo 'line-height: '. $settings->text_line_height .'px;';
    }
    if( !empty( $settings->text_color ) ) {
        echo 'color: #'. $settings->text_color .';';
    }
    if( !empty( $settings->text_padding ) ) {
        echo 'padding: '. $settings->text_padding .'px;';
    }
    if( !empty( $settings->text_border_color ) ) {
        echo 'border-color: #'. $settings->text_border_color .';';
    }
    if( !empty( $settings->text_border_width ) ) {
        echo 'border-width: '. $settings->text_border_width .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-text:after {
<?php
    if( !empty( $settings->text_border_color ) ) {
        echo 'border-color: #'. $settings->text_border_color .';';
    }
    if( !empty( $settings->text_border_width ) ) {
        echo 'border-width: '. $settings->text_border_width .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-text .labb-author-name {
<?php
    if( $settings->title_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->title_font );
    }
    if( !empty( $settings->title_font_size ) ) {
        echo 'font-size: '. $settings->title_font_size .'px;';
    }
    if( !empty( $settings->title_line_height ) ) {
        echo 'line-height: '. $settings->title_line_height .'px;';
    }
    if( !empty( $settings->title_color ) ) {
        echo 'color: #'. $settings->title_color .';';
    }
    if( $settings->title_text_transform != 'none') {
        echo 'text-transform: '. $settings->title_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-text {
<?php
    if( $settings->credential_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->credential_font );
    }
    if( !empty( $settings->credential_font_size ) ) {
        echo 'font-size: '. $settings->credential_font_size .'px;';
    }
    if( !empty( $settings->credential_line_height ) ) {
        echo 'line-height: '. $settings->credential_line_height .'px;';
    }
    if( !empty( $settings->credential_color ) ) {
        echo 'color: #'. $settings->credential_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-text {
    <?php
        if( !empty( $settings->text_font_size_medium ) ) {
            echo 'font-size: '. $settings->text_font_size_medium .'px;';
        }
        if( !empty( $settings->text_line_height_medium ) ) {
            echo 'line-height: '. $settings->text_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-text .labb-author-name {
    <?php
        if( !empty( $settings->title_font_size_medium ) ) {
            echo 'font-size: '. $settings->title_font_size_medium .'px;';
        }
        if( !empty( $settings->title_line_height_medium ) ) {
            echo 'line-height: '. $settings->title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-text {
    <?php
        if( !empty( $settings->credential_font_size_medium ) ) {
            echo 'font-size: '. $settings->credential_font_size_medium .'px;';
        }
        if( !empty( $settings->credential_line_height_medium ) ) {
            echo 'line-height: '. $settings->credential_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-text {
    <?php
        if( !empty( $settings->text_font_size_responsive ) ) {
            echo 'font-size: '. $settings->text_font_size_responsive .'px;';
        }
        if( !empty( $settings->text_line_height_responsive ) ) {
            echo 'line-height: '. $settings->text_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-text .labb-author-name {
    <?php
        if( !empty( $settings->title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->title_font_size_responsive .'px;';
        }
        if( !empty( $settings->title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-testimonials .labb-testimonial-user .labb-text {
    <?php
        if( !empty( $settings->credential_font_size_responsive ) ) {
            echo 'font-size: '. $settings->credential_font_size_responsive .'px;';
        }
        if( !empty( $settings->credential_line_height_responsive ) ) {
            echo 'line-height: '. $settings->credential_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>
