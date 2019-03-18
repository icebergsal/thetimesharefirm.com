
.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-top-header .labb-plan-name {
<?php
    if( $settings->plan_name_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->plan_name_font );
    }
    if( !empty( $settings->plan_name_font_size ) ) {
        echo 'font-size: '. $settings->plan_name_font_size .'px;';
    }
    if( !empty( $settings->plan_name_line_height ) ) {
        echo 'line-height: '. $settings->plan_name_line_height .'px;';
    }
    if( !empty( $settings->plan_name_color ) ) {
        echo 'color: #'. $settings->plan_name_color .';';
    }
    if( $settings->plan_name_text_transform != 'none') {
        echo 'text-transform: '. $settings->plan_name_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-top-header .labb-tagline {
<?php
    if( $settings->plan_tagline_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->plan_tagline_font );
    }
    if( !empty( $settings->plan_tagline_font_size ) ) {
        echo 'font-size: '. $settings->plan_tagline_font_size .'px;';
    }
    if( !empty( $settings->plan_tagline_line_height ) ) {
        echo 'line-height: '. $settings->plan_tagline_line_height .'px;';
    }
    if( !empty( $settings->plan_tagline_color ) ) {
        echo 'color: #'. $settings->plan_tagline_color .';';
    }
    if( $settings->plan_tagline_text_transform != 'none') {
        echo 'text-transform: '. $settings->plan_tagline_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-pricing-plan .labb-plan-price span {
<?php
    if( $settings->plan_price_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->plan_price_font );
    }
    if( !empty( $settings->plan_price_font_size ) ) {
        echo 'font-size: '. $settings->plan_price_font_size .'px;';
    }
    if( !empty( $settings->plan_price_line_height ) ) {
        echo 'line-height: '. $settings->plan_price_line_height .'px;';
    }
    if( !empty( $settings->plan_price_color ) ) {
        echo 'color: #'. $settings->plan_price_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-plan-details .labb-pricing-item .labb-title {
<?php
    if( $settings->item_title_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->item_title_font );
    }
    if( !empty( $settings->item_title_font_size ) ) {
        echo 'font-size: '. $settings->item_title_font_size .'px;';
    }
    if( !empty( $settings->item_title_line_height ) ) {
        echo 'line-height: '. $settings->item_title_line_height .'px;';
    }
    if( !empty( $settings->item_title_color ) ) {
        echo 'color: #'. $settings->item_title_color .';';
    }
    if( $settings->item_title_text_transform != 'none') {
        echo 'text-transform: '. $settings->item_title_text_transform .';';
    }
?>
    }

.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-plan-details .labb-pricing-item .labb-value {
<?php
    if( $settings->item_value_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->item_value_font );
    }
    if( !empty( $settings->item_value_font_size ) ) {
        echo 'font-size: '. $settings->item_value_font_size .'px;';
    }
    if( !empty( $settings->item_value_line_height ) ) {
        echo 'line-height: '. $settings->item_value_line_height .'px;';
    }
    if( !empty( $settings->item_value_color ) ) {
        echo 'color: #'. $settings->item_value_color .';';
    }
?>
    }

.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-purchase .labb-button {
<?php
    if( $settings->button_text_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->button_text_font );
    }
    if( !empty( $settings->button_text_font_size ) ) {
        echo 'font-size: '. $settings->button_text_font_size .'px;';
    }
    if( !empty( $settings->button_text_line_height ) ) {
        echo 'line-height: '. $settings->button_text_line_height .'px;';
    }
    if( $settings->button_text_text_transform != 'none') {
        echo 'text-transform: '. $settings->button_text_text_transform .';';
    }
    if( !empty( $settings->button_text_color ) ) {
        echo 'color: #'. $settings->button_text_color .';';
    }
    if( !empty( $settings->button_spacing ) ) {
        echo 'margin: '. $settings->button_spacing .'px;';
    }
    if( !empty( $settings->button_top_bottom_padding ) ) {
        echo 'padding-top: '. $settings->button_top_bottom_padding .'px;';
        echo 'padding-bottom: '. $settings->button_top_bottom_padding .'px;';
    }
    if( !empty( $settings->button_left_right_padding ) ) {
        echo 'padding-left: '. $settings->button_left_right_padding .'px;';
        echo 'padding-right: '. $settings->button_left_right_padding .'px;';
    }
    if( !empty( $settings->button_custom_bg_color ) ) {
        echo 'background-color: #'. $settings->button_custom_bg_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-pricing-table .labb-purchase .labb-button:hover {
<?php
    if( !empty( $settings->button_custom_bg_hover_color ) ) {
        echo 'background-color: #'. $settings->button_custom_bg_hover_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-top-header .labb-plan-name {
    <?php
        if( !empty( $settings->plan_name_font_size_medium ) ) {
            echo 'font-size: '. $settings->plan_name_font_size_medium .'px;';
        }
        if( !empty( $settings->plan_name_line_height_medium ) ) {
            echo 'line-height: '. $settings->plan_name_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-top-header .labb-tagline {
    <?php
        if( !empty( $settings->plan_tagline_font_size_medium ) ) {
            echo 'font-size: '. $settings->plan_tagline_font_size_medium .'px;';
        }
        if( !empty( $settings->plan_tagline_line_height_medium ) ) {
            echo 'line-height: '. $settings->plan_tagline_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-pricing-plan .labb-plan-price span {
    <?php
        if( !empty( $settings->plan_price_font_size_medium ) ) {
            echo 'font-size: '. $settings->plan_price_font_size_medium .'px;';
        }
        if( !empty( $settings->plan_price_line_height_medium ) ) {
            echo 'line-height: '. $settings->plan_price_line_height_medium .'px;';
        }
    ?>
        }

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-plan-details .labb-pricing-item .labb-title {
    <?php
        if( !empty( $settings->item_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->item_title_font_size_medium .'px;';
        }
        if( !empty( $settings->item_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->item_title_line_height_medium .'px;';
        }
    ?>
        }

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-plan-details .labb-pricing-item .labb-value {
    <?php
        if( !empty( $settings->item_value_font_size_medium ) ) {
            echo 'font-size: '. $settings->item_value_font_size_medium .'px;';
        }
        if( !empty( $settings->item_value_line_height_medium ) ) {
            echo 'line-height: '. $settings->item_value_line_height_medium .'px;';
        }
    ?>
        }

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-purchase .labb-button {
    <?php
        if( !empty( $settings->button_text_font_size_medium ) ) {
            echo 'font-size: '. $settings->button_text_font_size_medium .'px;';
        }
        if( !empty( $settings->button_text_line_height_medium ) ) {
            echo 'line-height: '. $settings->button_text_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-top-header .labb-plan-name {
    <?php
        if( !empty( $settings->plan_name_font_size_responsive ) ) {
            echo 'font-size: '. $settings->plan_name_font_size_responsive .'px;';
        }
        if( !empty( $settings->plan_name_line_height_responsive ) ) {
            echo 'line-height: '. $settings->plan_name_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-top-header .labb-tagline {
    <?php
        if( !empty( $settings->plan_tagline_font_size_responsive ) ) {
            echo 'font-size: '. $settings->plan_tagline_font_size_responsive .'px;';
        }
        if( !empty( $settings->plan_tagline_line_height_responsive ) ) {
            echo 'line-height: '. $settings->plan_tagline_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-pricing-plan .labb-plan-price span {
    <?php
        if( !empty( $settings->plan_price_font_size_responsive ) ) {
            echo 'font-size: '. $settings->plan_price_font_size_responsive .'px;';
        }
        if( !empty( $settings->plan_price_line_height_responsive ) ) {
            echo 'line-height: '. $settings->plan_price_line_height_responsive .'px;';
        }
    ?>
        }

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-plan-details .labb-pricing-item .labb-title {
    <?php
        if( !empty( $settings->item_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->item_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->item_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->item_title_line_height_responsive .'px;';
        }
    ?>
        }

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-plan-details .labb-pricing-item .labb-value {
    <?php
        if( !empty( $settings->item_value_font_size_responsive ) ) {
            echo 'font-size: '. $settings->item_value_font_size_responsive .'px;';
        }
        if( !empty( $settings->item_value_line_height_responsive ) ) {
            echo 'line-height: '. $settings->item_value_line_height_responsive .'px;';
        }
    ?>
        }

    .fl-node-<?php echo $id; ?> .labb-pricing-table .labb-purchase .labb-button {
    <?php
        if( !empty( $settings->button_text_font_size_responsive ) ) {
            echo 'font-size: '. $settings->button_text_font_size_responsive .'px;';
        }
        if( !empty( $settings->button_text_line_height_responsive ) ) {
            echo 'line-height: '. $settings->button_text_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>