
.fl-node-<?php echo $id; ?> .labb-piechart .labb-label {
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
.fl-node-<?php echo $id; ?> .labb-piechart .labb-percentage span {
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
    if( !empty( $settings->stats_percentage_color ) ) {
        echo 'color: #'. $settings->stats_percentage_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-piechart .labb-percentage sup {
<?php
    if( $settings->stats_percentage_symbol_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->stats_percentage_symbol_font );
    }
    if( !empty( $settings->stats_percentage_symbol_font_size ) ) {
        echo 'font-size: '. $settings->stats_percentage_symbol_font_size .'px;';
    }
    if( !empty( $settings->stats_percentage_symbol_line_height ) ) {
        echo 'line-height: '. $settings->stats_percentage_symbol_line_height .'px;';
    }
    if( !empty( $settings->stats_percentage_symbol_color ) ) {
        echo 'color: #'. $settings->stats_percentage_symbol_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-piechart .labb-label {
    <?php
        if( !empty( $settings->stats_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_title_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-piechart .labb-percentage span {
    <?php
        if( !empty( $settings->stats_percentage_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_percentage_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_percentage_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_percentage_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-piechart .labb-percentage sup {
    <?php
        if( !empty( $settings->stats_percentage_symbol_font_size_medium ) ) {
            echo 'font-size: '. $settings->stats_percentage_symbol_font_size_medium .'px;';
        }
        if( !empty( $settings->stats_percentage_symbol_line_height_medium ) ) {
            echo 'line-height: '. $settings->stats_percentage_symbol_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-piechart .labb-label {
    <?php
        if( !empty( $settings->stats_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-piechart .labb-percentage span {
    <?php
        if( !empty( $settings->stats_percentage_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_percentage_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_percentage_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_percentage_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-piechart .labb-percentage sup {
    <?php
        if( !empty( $settings->stats_percentage_symbol_font_size_responsive ) ) {
            echo 'font-size: '. $settings->stats_percentage_symbol_font_size_responsive .'px;';
        }
        if( !empty( $settings->stats_percentage_symbol_line_height_responsive ) ) {
            echo 'line-height: '. $settings->stats_percentage_symbol_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>