.fl-node-<?php echo $id; ?> .labb-heading .labb-title {
<?php
    if( $settings->heading_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->heading_font );
    }
    if( !empty( $settings->heading_font_size ) ) {
        echo 'font-size: '. $settings->heading_font_size .'px;';
    }
    if( !empty( $settings->heading_line_height ) ) {
        echo 'line-height: '. $settings->heading_line_height .'px;';
    }
    if( !empty( $settings->heading_color ) ) {
        echo 'color: #'. $settings->heading_color .';';
    }
    if( $settings->heading_text_transform != 'none' ) {
        echo 'text-transform: '. $settings->heading_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-heading .labb-subtitle {
<?php
    if( $settings->subtitle_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->subtitle_font );
    }
    if( !empty( $settings->subtitle_font_size ) ) {
        echo 'font-size: '. $settings->subtitle_font_size .'px;';
    }
    if( !empty( $settings->subtitle_line_height ) ) {
        echo 'line-height: '. $settings->subtitle_line_height .'px;';
    }
    if( !empty( $settings->subtitle_color ) ) {
        echo 'color: #'. $settings->subtitle_color .';';
    }
    if( $settings->subtitle_text_transform != 'none' ) {
        echo 'text-transform: '. $settings->subtitle_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-heading .labb-text {
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
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-heading .labb-title {
    <?php
        if( !empty( $settings->heading_font_size_medium ) ) {
            echo 'font-size: '. $settings->heading_font_size_medium .'px;';
        }
        if( !empty( $settings->heading_line_height_medium ) ) {
            echo 'line-height: '. $settings->heading_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-heading .labb-subtitle {
    <?php
        if( !empty( $settings->subtitle_font_size_medium ) ) {
            echo 'font-size: '. $settings->subtitle_font_size_medium .'px;';
        }
        if( !empty( $settings->subtitle_line_height_medium ) ) {
            echo 'line-height: '. $settings->subtitle_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-heading .labb-text {
    <?php
        if( !empty( $settings->text_font_size_medium ) ) {
            echo 'font-size: '. $settings->text_font_size_medium .'px;';
        }
        if( !empty( $settings->text_line_height_medium ) ) {
            echo 'line-height: '. $settings->text_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-heading .labb-title {
    <?php
        if( !empty( $settings->heading_font_size_responsive ) ) {
            echo 'font-size: '. $settings->heading_font_size_responsive .'px;';
        }
        if( !empty( $settings->heading_line_height_responsive ) ) {
            echo 'line-height: '. $settings->heading_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-heading .labb-subtitle {
    <?php
        if( !empty( $settings->subtitle_font_size_responsive ) ) {
            echo 'font-size: '. $settings->subtitle_font_size_responsive .'px;';
        }
        if( !empty( $settings->subtitle_line_height_responsive ) ) {
            echo 'line-height: '. $settings->subtitle_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-heading .labb-text {
    <?php
        if( !empty( $settings->text_font_size_responsive ) ) {
            echo 'font-size: '. $settings->text_font_size_responsive .'px;';
        }
        if( !empty( $settings->text_line_height_responsive ) ) {
            echo 'line-height: '. $settings->text_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>