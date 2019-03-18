.fl-node-<?php echo $id; ?> .labb-clients .labb-client {
<?php
    if( !empty( $settings->client_border_color ) ) {
        echo 'border-color: #'. $settings->client_border_color .' !important;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-clients .labb-client .labb-image-overlay {
<?php
    if( !empty( $settings->client_hover_bg_color ) ) {
        echo 'background-color: #'. $settings->client_hover_bg_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-clients .labb-client:hover .labb-image-overlay {
<?php
    if( !empty( $settings->thumbnail_hover_opacity ) ) {
        echo 'opacity: '. ($settings->thumbnail_hover_opacity / 100) .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-clients .labb-client {
<?php
    if( !empty( $settings->client_padding ) ) {
        echo 'padding: '. $settings->client_padding .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-clients .labb-client .labb-client-name a {
<?php
    if( $settings->client_name_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->client_name_font );
    }
    if( !empty( $settings->client_name_font_size ) ) {
        echo 'font-size: '. $settings->client_name_font_size .'px;';
    }
    if( !empty( $settings->client_name_line_height ) ) {
        echo 'line-height: '. $settings->client_name_line_height .'px;';
    }
    if( !empty( $settings->client_name_color ) ) {
        echo 'color: #'. $settings->client_name_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-clients .labb-client .labb-client-name a:hover {
<?php
    if( !empty( $settings->client_name_hover_color ) ) {
        echo 'color: #'. $settings->client_name_hover_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-clients .labb-client .labb-client-name {
<?php
    if( !empty( $settings->client_name_line_height ) ) {
        echo 'margin-top: -'. ($settings->client_name_line_height / 2) .'px;';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-clients .labb-client .labb-client-name a {
    <?php
        if( !empty( $settings->client_name_font_size_medium ) ) {
            echo 'font-size: '. $settings->client_name_font_size_medium .'px;';
        }
        if( !empty( $settings->client_name_line_height_medium ) ) {
            echo 'line-height: '. $settings->client_name_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-clients .labb-client .labb-client-name a {
    <?php
        if( !empty( $settings->client_name_font_size_responsive ) ) {
            echo 'font-size: '. $settings->client_name_font_size_responsive .'px;';
        }
        if( !empty( $settings->client_name_line_height_responsive ) ) {
            echo 'line-height: '. $settings->client_name_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>