.fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-stats-title .labb-icon-wrapper {
<?php
    if( !empty( $settings->icon_color ) ) {
        echo 'color: #'. $settings->icon_color .';';
    }
    if( !empty( $settings->icon_size ) ) {
        echo 'font-size: '. $settings->icon_size .'px;';
    }
    if( !empty( $settings->icon_spacing ) ) {
        echo 'margin-right: '. $settings->icon_spacing .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-stats-title .labb-image-wrapper {
<?php
    if( !empty( $settings->icon_size ) ) {
        echo 'width: '. $settings->icon_size .'px;';
    }
    if( !empty( $settings->icon_spacing ) ) {
        echo 'margin-right: '. $settings->icon_spacing .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-number {
<?php
    if( $settings->stats_number_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->stats_number_font );
    }
    if( !empty( $settings->stats_number_font_size ) ) {
        echo 'font-size: '. $settings->stats_number_font_size .'px;';
    }
    if( !empty( $settings->stats_number_line_height ) ) {
        echo 'line-height: '. $settings->stats_number_line_height .'px;';
    }
    if( !empty( $settings->stats_number_color ) ) {
        echo 'color: #'. $settings->stats_number_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-prefix, .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-suffix {
<?php
    if( $settings->stats_prefix_suffix_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->stats_prefix_suffix_font );
    }
    if( !empty( $settings->stats_prefix_suffix_font_size ) ) {
        echo 'font-size: '. $settings->stats_prefix_suffix_font_size .'px;';
    }
    if( !empty( $settings->stats_prefix_suffix_line_height ) ) {
        echo 'line-height: '. $settings->stats_prefix_suffix_line_height .'px;';
    }
    if( !empty( $settings->stats_prefix_suffix_color ) ) {
        echo 'color: #'. $settings->stats_prefix_suffix_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-stats-title {
<?php
    if( $settings->stats_title_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->stats_title_font );
    }
    if( !empty( $settings->stats_title_font_size ) ) {
        echo 'font-size: '. $settings->stats_title_font_size .'px;';
    }
    if( !empty( $settings->stats_title_line_height ) ) {
        echo 'line-height: '. $settings->stats_title_line_height .'px;';
    }
    if( !empty( $settings->stats_title_color ) ) {
        echo 'color: #'. $settings->stats_title_color .';';
    }
    if( $settings->stats_title_text_transform != 'none' ) {
        echo 'text-transform: '. $settings->stats_title_text_transform .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-number {
    <?php
        if( !empty( $settings->stats_number_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_number_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_number_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_number_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-prefix, .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-suffix {
    <?php
        if( !empty( $settings->stats_prefix_suffix_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_prefix_suffix_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_prefix_suffix_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_prefix_suffix_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-stats-title {
    <?php
        if( !empty( $settings->stats_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_title_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_title_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-number {
    <?php
        if( !empty( $settings->stats_number_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_number_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_number_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_number_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-prefix, .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-suffix {
    <?php
        if( !empty( $settings->stats_prefix_suffix_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_prefix_suffix_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_prefix_suffix_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_prefix_suffix_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-odometers .labb-odometer .labb-stats-title {
    <?php
        if( !empty( $settings->stats_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_title_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>