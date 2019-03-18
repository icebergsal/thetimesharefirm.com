.fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-icon-wrapper span {
<?php
    if( !empty( $settings->icon_color ) ) {
        echo 'color: #'. $settings->icon_color .';';
    }
    if( !empty( $settings->icon_size ) ) {
        echo 'font-size: '. $settings->icon_size .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-image-wrapper img {
<?php
    if( !empty( $settings->icon_size ) ) {
        echo 'width: '. $settings->icon_size .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-icon-wrapper span:hover {
<?php
    if( !empty( $settings->hover_color ) ) {
        echo 'color: #'. $settings->hover_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-service-text .labb-title {
<?php
    if( $settings->service_title_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->service_title_font );
    }
    if( !empty( $settings->service_title_font_size ) ) {
        echo 'font-size: '. $settings->service_title_font_size .'px;';
    }
    if( !empty( $settings->service_title_line_height ) ) {
        echo 'line-height: '. $settings->service_title_line_height .'px;';
    }
    if( !empty( $settings->service_title_color ) ) {
        echo 'color: #'. $settings->service_title_color .';';
    }
    if( $settings->service_title_text_transform != 'none') {
        echo 'text-transform: '. $settings->service_title_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-service-text .labb-service-details {
<?php
    if( $settings->service_text_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->service_text_font );
    }
    if( !empty( $settings->service_text_font_size ) ) {
        echo 'font-size: '. $settings->service_text_font_size .'px;';
    }
    if( !empty( $settings->service_text_line_height ) ) {
        echo 'line-height: '. $settings->service_text_line_height .'px;';
    }
    if( !empty( $settings->service_text_color ) ) {
        echo 'color: #'. $settings->service_text_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-service-text .labb-title {
    <?php
        if( !empty( $settings->service_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->service_title_font_size_medium .'px;';
        }
        if( !empty( $settings->service_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->service_title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-service-text .labb-service-details {
    <?php
        if( !empty( $settings->service_text_font_size_medium ) ) {
            echo 'font-size: '. $settings->service_text_font_size_medium .'px;';
        }
        if( !empty( $settings->service_text_line_height_medium ) ) {
            echo 'line-height: '. $settings->service_text_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-service-text .labb-title {
    <?php
        if( !empty( $settings->service_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->service_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->service_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->service_title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-services .labb-service .labb-service-text .labb-service-details {
    <?php
        if( !empty( $settings->service_text_font_size_responsive ) ) {
            echo 'font-size: '. $settings->service_text_font_size_responsive .'px;';
        }
        if( !empty( $settings->service_text_line_height_responsive ) ) {
            echo 'line-height: '. $settings->service_text_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>