.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member-wrapper {
<?php
    if( !empty( $settings->team_member_spacing ) ) {
        echo 'margin-bottom: '. $settings->team_member_spacing .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member:hover .labb-image-wrapper img {
<?php
    if( !empty( $settings->thumbnail_hover_brightness ) ) {
        echo '-webkit-filter: brightness('. $settings->thumbnail_hover_brightness .'%);';
        echo 'filter: brightness('. $settings->thumbnail_hover_brightness .'%);';
        echo '-moz-filter: brightness('. $settings->thumbnail_hover_brightness .'%);';
        echo '-ms-filter: brightness('. $settings->thumbnail_hover_brightness .'%);';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-image-wrapper img {
<?php
    if( !empty( $settings->thumbnail_border_radius ) ) {
        echo 'border-radius: '. $settings->thumbnail_border_radius .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-text .labb-title {
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
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-text .labb-team-member-position {
<?php
    if( $settings->position_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->position_font );
    }
    if( !empty( $settings->position_font_size ) ) {
        echo 'font-size: '. $settings->position_font_size .'px;';
    }
    if( !empty( $settings->position_line_height ) ) {
        echo 'line-height: '. $settings->position_line_height .'px;';
    }
    if( !empty( $settings->position_font_style ) ) {
        echo 'font-style: '. $settings->position_font_style .';';
    }
    if( !empty( $settings->position_color ) ) {
        echo 'color: #'. $settings->position_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-details {
<?php
    if( $settings->details_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->details_font );
    }
    if( !empty( $settings->details_font_size ) ) {
        echo 'font-size: '. $settings->details_font_size .'px;';
    }
    if( !empty( $settings->details_line_height ) ) {
        echo 'line-height: '. $settings->details_line_height .'px;';
    }
    if( !empty( $settings->details_color ) ) {
        echo 'color: #'. $settings->details_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-text .labb-title {
    <?php
        if( !empty( $settings->title_font_size_medium ) ) {
            echo 'font-size: '. $settings->title_font_size_medium .'px;';
        }
        if( !empty( $settings->title_line_height_medium ) ) {
            echo 'line-height: '. $settings->title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-text .labb-team-member-position {
    <?php
        if( !empty( $settings->position_font_size_medium ) ) {
            echo 'font-size: '. $settings->position_font_size_medium .'px;';
        }
        if( !empty( $settings->position_line_height_medium ) ) {
            echo 'line-height: '. $settings->position_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-details {
    <?php
        if( !empty( $settings->details_font_size_medium ) ) {
            echo 'font-size: '. $settings->details_font_size_medium .'px;';
        }
        if( !empty( $settings->details_line_height_medium ) ) {
            echo 'line-height: '. $settings->details_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-text .labb-title {
    <?php
        if( !empty( $settings->title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->title_font_size_responsive .'px;';
        }
        if( !empty( $settings->title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-text .labb-team-member-position {
    <?php
        if( !empty( $settings->position_font_size_responsive ) ) {
            echo 'font-size: '. $settings->position_font_size_responsive .'px;';
        }
        if( !empty( $settings->position_line_height_responsive ) ) {
            echo 'line-height: '. $settings->position_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-team-member-details {
    <?php
        if( !empty( $settings->details_font_size_responsive ) ) {
            echo 'font-size: '. $settings->details_font_size_responsive .'px;';
        }
        if( !empty( $settings->details_line_height_responsive ) ) {
            echo 'line-height: '. $settings->details_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>


.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-social-list .labb-social-list-item {
<?php
    if( !empty( $settings->social_icon_spacing ) ) {
        echo 'margin-right: '. $settings->social_icon_spacing .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-social-list .labb-social-list-item i {
<?php
    if( !empty( $settings->social_icon_color ) ) {
        echo 'color: #'. $settings->social_icon_color .';';
    }
    if( !empty( $settings->social_icon_size ) ) {
        echo 'font-size: '. $settings->social_icon_size .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-team-members .labb-team-member .labb-social-list .labb-social-list-item i:hover {
<?php
    if( !empty( $settings->social_icon_hover_color ) ) {
        echo 'color: #'. $settings->social_icon_hover_color .';';
    }
?>
    }

