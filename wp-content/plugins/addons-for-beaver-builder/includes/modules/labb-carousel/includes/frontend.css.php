.fl-node-<?php echo $id; ?> .labb-carousel .labb-carousel-item {
    margin: <?php echo $settings->gutter; ?>px;
    }
@media screen and (max-width: <?php echo $settings->tablet_width; ?>px) {
    .fl-node-<?php echo $id; ?> .labb-carousel .labb-carousel-item {
        margin: <?php echo $settings->tablet_gutter; ?>px;
        }
    }
@media screen and (max-width: <?php echo $settings->mobile_width; ?>px) {
    .fl-node-<?php echo $id; ?> .labb-carousel .labb-carousel-item {
        margin: <?php echo $settings->mobile_gutter; ?>px;
        }
    }
.fl-node-<?php echo $id; ?> .labb-carousel .labb-carousel-item {
<?php
    if( $settings->content_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->content_font );
    }
    if( !empty( $settings->content_font_size ) ) {
        echo 'font-size: '. $settings->content_font_size .'px;';
    }
    if( !empty( $settings->content_line_height ) ) {
        echo 'line-height: '. $settings->content_line_height .'px;';
    }
    if( !empty( $settings->content_color ) ) {
        echo 'color: #'. $settings->content_color .';';
    }
    if( !empty( $settings->content_bg_color ) ) {
        echo 'background-color: #'. $settings->content_bg_color .';';
    }
    if( !empty( $settings->content_padding ) ) {
        echo 'padding: '. $settings->content_padding .'px;';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-carousel .labb-carousel-item {
    <?php
        if( !empty( $settings->content_font_size_medium ) ) {
            echo 'font-size: '. $settings->content_font_size_medium .'px;';
        }
        if( !empty( $settings->content_line_height_medium ) ) {
            echo 'line-height: '. $settings->content_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-carousel .labb-carousel-item {
    <?php
        if( !empty( $settings->content_font_size_responsive ) ) {
            echo 'font-size: '. $settings->content_font_size_responsive .'px;';
        }
        if( !empty( $settings->content_line_height_responsive ) ) {
            echo 'line-height: '. $settings->content_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>