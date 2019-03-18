.fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-bar-bg {
<?php
    if( !empty( $settings->stats_bar_bg_color ) ) {
        echo 'background-color: #'. $settings->stats_bar_bg_color .';';
    }
    if( !empty( $settings->stats_bar_height ) ) {
        echo 'height: '. $settings->stats_bar_height .'px;';
        echo 'margin-top: -'. $settings->stats_bar_height .'px;';
    }
    if( !empty( $settings->stats_bar_border_radius ) ) {
        echo 'border-radius: '. $settings->stats_bar_border_radius .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-bar-content {
<?php
    if( !empty( $settings->stats_bar_height ) ) {
        echo 'height: '. $settings->stats_bar_height .'px;';
    }
    if( !empty( $settings->stats_bar_border_radius ) ) {
        echo 'border-radius: '. $settings->stats_bar_border_radius .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar {
<?php
    if( !empty( $settings->stats_bar_spacing ) ) {
        echo 'margin-bottom: '. $settings->stats_bar_spacing .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-title {
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
    if( $settings->stats_title_text_transform != 'none') {
        echo 'text-transform: '. $settings->stats_title_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-title span {
<?php
    if( $settings->stats_percentage_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->stats_percentage_font );
    }
    if( !empty( $settings->stats_percentage_font_size ) ) {
        echo 'font-size: '. $settings->stats_percentage_font_size .'px;';
    }
    if( !empty( $settings->stats_percentage_line_height ) ) {
        echo 'line-height: '. $settings->stats_percentage_line_height .'px;';
    }
    if( !empty( $settings->stats_percentage_spacing ) ) {
        echo 'margin-left: '. $settings->stats_percentage_spacing .'px;';
    }
    if( !empty( $settings->stats_percentage_color ) ) {
        echo 'color: #'. $settings->stats_percentage_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-title {
    <?php
        if( !empty( $settings->stats_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_title_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-title span {
    <?php
        if( !empty( $settings->stats_percentage_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_percentage_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_percentage_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_percentage_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-title {
    <?php
        if( !empty( $settings->stats_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-stats-bars .labb-stats-bar .labb-stats-title span {
    <?php
        if( !empty( $settings->stats_percentage_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_percentage_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_percentage_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_percentage_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>