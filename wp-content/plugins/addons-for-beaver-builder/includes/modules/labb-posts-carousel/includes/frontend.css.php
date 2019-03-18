.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item {
    padding: <?php echo $settings->gutter; ?>px;
    }
@media screen and (max-width: <?php echo $settings->tablet_width; ?>px) {
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item {
        padding: <?php echo $settings->tablet_gutter; ?>px;
        }
    }
@media screen and (max-width: <?php echo $settings->mobile_width; ?>px) {
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item {
        padding: <?php echo $settings->mobile_gutter; ?>px;
        }
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-post-title {
<?php
    if( $settings->thumbnail_info_title_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->thumbnail_info_title_font );
    }
    if( !empty( $settings->thumbnail_info_title_font_size ) ) {
        echo 'font-size: '. $settings->thumbnail_info_title_font_size .'px;';
    }
    if( !empty( $settings->thumbnail_info_title_line_height ) ) {
        echo 'line-height: '. $settings->thumbnail_info_title_line_height .'px;';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-post-title a {
<?php
    if( !empty( $settings->thumbnail_info_title_color ) ) {
        echo 'color: #'. $settings->thumbnail_info_title_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-post-title a:hover {
<?php
    if( !empty( $settings->thumbnail_info_title_hover_border_color ) ) {
        echo 'border-color: #'. $settings->thumbnail_info_title_hover_border_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-terms a {
<?php
    if( $settings->thumbnail_info_tags_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->thumbnail_info_tags_font );
    }
    if( !empty( $settings->thumbnail_info_tags_font_size ) ) {
        echo 'font-size: '. $settings->thumbnail_info_tags_font_size .'px;';
    }
    if( !empty( $settings->thumbnail_info_tags_line_height ) ) {
        echo 'line-height: '. $settings->thumbnail_info_tags_line_height .'px;';
    }
    if( !empty( $settings->thumbnail_info_tags_color ) ) {
        echo 'color: #'. $settings->thumbnail_info_tags_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-title {
<?php
    if( $settings->entry_title_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->entry_title_font );
    }
    if( !empty( $settings->entry_title_font_size ) ) {
        echo 'font-size: '. $settings->entry_title_font_size .'px;';
    }
    if( !empty( $settings->entry_title_line_height ) ) {
        echo 'line-height: '. $settings->entry_title_line_height .'px;';
    }
    if( !empty( $settings->entry_title_color ) ) {
        echo 'color: #'. $settings->entry_title_color .';';
    }
    if( $settings->entry_title_text_transform != 'none') {
        echo 'text-transform: '. $settings->entry_title_text_transform .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-title a {
<?php
    if( !empty( $settings->entry_title_color ) ) {
        echo 'color: #'. $settings->entry_title_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-summary {
<?php
    if( $settings->entry_summary_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->entry_summary_font );
    }
    if( !empty( $settings->entry_summary_font_size ) ) {
        echo 'font-size: '. $settings->entry_summary_font_size .'px;';
    }
    if( !empty( $settings->entry_summary_line_height ) ) {
        echo 'line-height: '. $settings->entry_summary_line_height .'px;';
    }
    if( !empty( $settings->entry_summary_color ) ) {
        echo 'color: #'. $settings->entry_summary_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-entry-meta span {
<?php
    if( $settings->entry_meta_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->entry_meta_font );
    }
    if( !empty( $settings->entry_meta_font_size ) ) {
        echo 'font-size: '. $settings->entry_meta_font_size .'px;';
    }
    if( !empty( $settings->entry_meta_line_height ) ) {
        echo 'line-height: '. $settings->entry_meta_line_height .'px;';
    }
    if( !empty( $settings->entry_meta_color ) ) {
        echo 'color: #'. $settings->entry_meta_color .';';
    }
?>
    }
.fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-entry-meta span a {
<?php
    if( $settings->entry_meta_link_font['family'] != 'Default') {
        FLBuilderFonts::font_css( $settings->entry_meta_link_font );
    }
    if( !empty( $settings->entry_meta_link_font_size ) ) {
        echo 'font-size: '. $settings->entry_meta_link_font_size .'px;';
    }
    if( !empty( $settings->entry_meta_link_line_height ) ) {
        echo 'line-height: '. $settings->entry_meta_link_line_height .'px;';
    }
    if( !empty( $settings->entry_meta_link_color ) ) {
        echo 'color: #'. $settings->entry_meta_link_color .';';
    }
?>
    }
<?php if( $global_settings->responsive_enabled ) : // Global Setting If started ?>

@media ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-post-title {
    <?php
        if( !empty( $settings->thumbnail_info_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->thumbnail_info_title_font_size_medium .'px;';
        }
        if( !empty( $settings->thumbnail_info_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->thumbnail_info_title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-terms a {
    <?php
        if( !empty( $settings->thumbnail_info_tags_font_size_medium ) ) {
            echo 'font-size: '. $settings->thumbnail_info_tags_font_size_medium .'px;';
        }
        if( !empty( $settings->thumbnail_info_tags_line_height_medium ) ) {
            echo 'line-height: '. $settings->thumbnail_info_tags_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-title {
    <?php
        if( !empty( $settings->entry_title_font_size_medium ) ) {
            echo 'font-size: '. $settings->entry_title_font_size_medium .'px;';
        }
        if( !empty( $settings->entry_title_line_height_medium ) ) {
            echo 'line-height: '. $settings->entry_title_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-summary {
    <?php
        if( !empty( $settings->entry_summary_font_size_medium ) ) {
            echo 'font-size: '. $settings->entry_summary_font_size_medium .'px;';
        }
        if( !empty( $settings->entry_summary_line_height_medium ) ) {
            echo 'line-height: '. $settings->entry_summary_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-entry-meta span {
    <?php
        if( !empty( $settings->entry_meta_font_size_medium ) ) {
            echo 'font-size: '. $settings->entry_meta_font_size_medium .'px;';
        }
        if( !empty( $settings->entry_meta_line_height_medium ) ) {
            echo 'line-height: '. $settings->entry_meta_line_height_medium .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-entry-meta span a {
    <?php
        if( !empty( $settings->entry_meta_link_font_size_medium ) ) {
            echo 'font-size: '. $settings->entry_meta_link_font_size_medium .'px;';
        }
        if( !empty( $settings->entry_meta_link_line_height_medium ) ) {
            echo 'line-height: '. $settings->entry_meta_link_line_height_medium .'px;';
        }
    ?>
        }

    }
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-post-title {
    <?php
        if( !empty( $settings->thumbnail_info_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->thumbnail_info_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->thumbnail_info_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->thumbnail_info_title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-project-image .labb-image-info .labb-terms a {
    <?php
        if( !empty( $settings->thumbnail_info_tags_font_size_responsive ) ) {
            echo 'font-size: '. $settings->thumbnail_info_tags_font_size_responsive .'px;';
        }
        if( !empty( $settings->thumbnail_info_tags_line_height_responsive ) ) {
            echo 'line-height: '. $settings->thumbnail_info_tags_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-title {
    <?php
        if( !empty( $settings->entry_title_font_size_responsive ) ) {
            echo 'font-size: '. $settings->entry_title_font_size_responsive .'px;';
        }
        if( !empty( $settings->entry_title_line_height_responsive ) ) {
            echo 'line-height: '. $settings->entry_title_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .entry-summary {
    <?php
        if( !empty( $settings->entry_summary_font_size_responsive ) ) {
            echo 'font-size: '. $settings->entry_summary_font_size_responsive .'px;';
        }
        if( !empty( $settings->entry_summary_line_height_responsive ) ) {
            echo 'line-height: '. $settings->entry_summary_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-entry-meta span {
    <?php
        if( !empty( $settings->entry_meta_font_size_responsive ) ) {
            echo 'font-size: '. $settings->entry_meta_font_size_responsive .'px;';
        }
        if( !empty( $settings->entry_meta_line_height_responsive ) ) {
            echo 'line-height: '. $settings->entry_meta_line_height_responsive .'px;';
        }
    ?>
        }
    .fl-node-<?php echo $id; ?> .labb-posts-carousel .labb-posts-carousel-item .labb-entry-meta span a {
    <?php
        if( !empty( $settings->entry_meta_link_font_size_responsive ) ) {
            echo 'font-size: '. $settings->entry_meta_link_font_size_responsive .'px;';
        }
        if( !empty( $settings->entry_meta_link_line_height_responsive ) ) {
            echo 'line-height: '. $settings->entry_meta_link_line_height_responsive .'px;';
        }
    ?>
        }

    }
<?php endif; ?>