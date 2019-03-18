<?php

/*
Widget Name: Posts Carousel
Description: Display blog posts or custom post types as a carousel.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class LABBPostsCarouselModule extends FLBuilderModule {

    function __construct() {

        parent::__construct(array(
            'name' => __('Posts Carousel', 'livemesh-bb-addons'),
            'description' => __('Display blog posts or custom post types as a carousel.', 'livemesh-bb-addons'),
            'group' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'category' => __('Livemesh Addons', 'livemesh-bb-addons'),
            'dir' => LABB_ADDONS_DIR . 'labb-posts-carousel/',
            'url' => LABB_ADDONS_URL . 'labb-posts-carousel/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => true
        ));


        $this->add_js( 'slick' );
        $this->add_css( 'slick' );

    }

    /**
     * Full attachment image url.
     *
     * Gets a post ID and returns the url for the 'full' size of the attachment
     * set as featured image.
     *
     */
    protected function _get_uncropped_url($id) {

        $thumb_id = get_post_thumbnail_id($id);

        $size = isset($this->settings->image_size) ? $this->settings->image_size : 'large';

        $img = wp_get_attachment_image_src($thumb_id, $size);

        return $img[0];
    }


    /**
     * Get the featured image data.
     *
     * Gets a post ID and returns an array containing the featured image data.
     *
     */
    protected function _get_img_data($id) {

        $thumb_id = get_post_thumbnail_id($id);

        return FLBuilderPhoto::get_attachment_data($thumb_id);

    }


    /**
     * Render thumbnail image for mobile.
     *
     * Get's the post ID and renders the html markup for the featured image
     * in the desired cropped size.
     *
     */
    public function get_img($id = null) {

        // get image source and data
        $src = $this->_get_uncropped_url($id);

        $photo_data = $this->_get_img_data($id);

        // set params
        $photo_settings = array(
            'align' => 'center',
            'link_type' => '',
            'crop' => $this->settings->crop,
            'photo' => $photo_data,
            'photo_src' => $src,
            'photo_source' => 'library',
            'attributes' => array(
                'data-no-lazy' => 1,
            ),
        );

        if ($id && $this->settings->image_linkable == 'yes') {

            $photo_settings['link_type'] = 'url';

            // the link id is provided, set link_url param
            $photo_settings['link_url'] = get_the_permalink($id);

            if ($this->settings->post_link_new_window == 'yes')
                $photo_settings['link_target'] = '_blank';
            else
                $photo_settings['link_target'] = '_self';
        }

        // get image html
        return labb_get_image_html($photo_settings);

    }

}


FLBuilder::register_module('LABBPostsCarouselModule', array(
        'post_loop_settings' => array(
            'title' => __('Loop Query', 'livemesh-bb-addons'),
            'file' => FL_BUILDER_DIR . 'includes/loop-settings.php',
        ),

        'post_content' => array(
            'title' => __('Options', 'livemesh-bb-addons'),
            'sections' => array(
                'general_section' => array(
                    'fields' =>
                        array(

                            'posts_per_page' => array(
                                'type' => 'labb-number',
                                'label' => __('Number of posts to be displayed.', 'livemesh-bb-addons'),
                                'default' => 6,
                                'connections' => array('custom_field')
                            ),
                            'taxonomy_chosen' => array(
                                'type' => 'select',
                                'label' => __('Choose the taxonomy to display info.', 'livemesh-bb-addons'),
                                'description' => __('Choose the taxonomy to use for display of taxonomy information for posts/custom post types.', 'livemesh-bb-addons'),
                                'options' => labb_get_taxonomies_map(),
                                'default' => 'category',
                                'connections' => array('custom_field')
                            ),

                            'image_linkable' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Link Images to Posts?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'post_link_new_window' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Open post links in new window?', 'livemesh-bb-addons'),
                                'default' => 'no'
                            ),

                            'image_size'    => array(
                                'type'          => 'photo-sizes',
                                'label'         => __( 'Image Size', 'livemesh-bb-addons' ),
                                'default'       => 'large',
                            ),

                            'crop'    => array(
                                'type'          => 'select',
                                'label'         => __( 'Crop Image', 'livemesh-bb-addons' ),
                                'default'       => 'landscape',
                                'options'       => array(
                                    ''              => _x( 'None', 'Photo Crop.', 'livemesh-bb-addons' ),
                                    'landscape'     => __( 'Landscape', 'livemesh-bb-addons' ),
                                    'panorama'      => __( 'Panorama', 'livemesh-bb-addons' ),
                                    'portrait'      => __( 'Portrait', 'livemesh-bb-addons' ),
                                    'square'        => __( 'Square', 'livemesh-bb-addons' ),
                                ),
                            ),
                        )
                ),
                'content_section' => array(
                    'title' => __('Post Content', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(
                            'display_title' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Display project title below the post/portfolio?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'display_summary' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Display project excerpt/summary below the post/portfolio?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),
                        )
                ),
                'post_meta_section' => array(
                    'title' => __('Post Meta', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'display_author' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Display post author info below the post item?', 'livemesh-bb-addons'),
                                'default' => 'no'
                            ),

                            'display_post_date' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Display post date info below the post item?', 'livemesh-bb-addons'),
                                'default' => 'no'
                            ),

                            'display_taxonomy' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Display taxonomy info below the post item?', 'livemesh-bb-addons'),
                                'default' => 'no'
                            ),

                        )
                ),
            )
        ),

        'settings' => array(
            'title' => __('Settings', 'livemesh-bb-addons'),
            'sections' => array(
                'options_section' => array(
                    'title' => __('Carousel Settings', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'arrows' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Prev/Next Arrows?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'dots' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Show dot indicators for navigation?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'pause_on_hover' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Pause on mouse hover?', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'autoplay' => array(
                                'type' => 'labb-toggle-button',
                                'label' => __('Autoplay?', 'livemesh-bb-addons'),
                                'description' => __('Should the carousel autoplay as in a slideshow.', 'livemesh-bb-addons'),
                                'default' => 'yes'
                            ),

                            'autoplay_speed' => array(
                                'type' => 'labb-number',
                                'label' => __('Autoplay speed in ms', 'livemesh-bb-addons'),
                                'default' => 3000,
                                'min' => 1000,
                                'max' => 20000,
                                'description' => 'ms',
                            ),

                            'animation_speed' => array(
                                'type' => 'labb-number',
                                'label' => __('Autoplay animation speed in ms', 'livemesh-bb-addons'),
                                'default' => 600,
                                'min' => 100,
                                'max' => 2000,
                                'description' => 'ms',
                            ),
                        )
                ),
            )
        ),

        'layout' => array(
            'title' => __('Responsive', 'livemesh-bb-addons'),
            'sections' => array(
                'desktop_section' => array(
                    'title' => __('Desktop Settings', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'display_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 5,
                                'default' => 3,
                                'description' => 'columns (max: 5)',
                                'connections' => array('custom_field')
                            ),

                            'scroll_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns to scroll', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 5,
                                'default' => 3,
                                'maxlength' => '1',
                                'size' => '3',
                                'description' => 'columns (max: 5)',
                                'connections' => array('custom_field')
                            ),

                            'gutter' => array(
                                'type' => 'text',
                                'label' => __('Gutter', 'livemesh-bb-addons'),
                                'description' => __('Space between columns.', 'livemesh-bb-addons'),
                                'default' => '10',
                                'maxlength' => '2',
                                'size' => '4',
                                'description' => 'px',
                            ),
                        )
                ),
                'tablet_section' => array(
                    'title' => __('Tablet Settings', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'tablet_display_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 3,
                                'default' => 2,
                                'description' => 'columns (max: 3)',
                                'connections' => array('custom_field')
                            ),
                            'tablet_scroll_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns to scroll', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 3,
                                'default' => 2,
                                'description' => 'columns (max: 3)',
                                'connections' => array('custom_field')
                            ),
                            'tablet_gutter' => array(
                                'type' => 'text',
                                'label' => __('Gutter', 'livemesh-bb-addons'),
                                'description' => __('Space between columns.', 'livemesh-bb-addons'),
                                'default' => '10',
                                'maxlength' => '2',
                                'size' => '4',
                                'description' => 'px',
                            ),
                            'tablet_width' => array(
                                'type' => 'text',
                                'label' => __('Resolution', 'livemesh-bb-addons'),
                                'description' => __('The resolution to treat as a tablet resolution.', 'livemesh-bb-addons'),
                                'default' => '800',
                                'maxlength' => '4',
                                'size' => '5',
                                'description' => 'px',
                            )
                        )
                ),

                'mobile_section' => array(
                    'title' => __('Mobile Settings', 'livemesh-bb-addons'), // Section Title
                    'fields' =>
                        array(

                            'mobile_display_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns per row', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 2,
                                'integer' => true,
                                'default' => 1,
                                'description' => 'columns (max: 2)',
                                'connections' => array('custom_field')
                            ),
                            'mobile_scroll_columns' => array(
                                'type' => 'labb-number',
                                'label' => __('Columns to scroll', 'livemesh-bb-addons'),
                                'min' => 1,
                                'max' => 2,
                                'integer' => true,
                                'default' => 1,
                                'description' => 'columns (max: 2)',
                                'connections' => array('custom_field')
                            ),
                            'mobile_gutter' => array(
                                'type' => 'text',
                                'label' => __('Gutter', 'livemesh-bb-addons'),
                                'description' => __('Space between columns.', 'livemesh-bb-addons'),
                                'default' => '10',
                                'maxlength' => '2',
                                'size' => '4',
                                'description' => 'px',
                            ),
                            'mobile_width' => array(
                                'type' => 'text',
                                'label' => __('Resolution', 'livemesh-bb-addons'),
                                'description' => __('The resolution to treat as a mobile resolution.', 'livemesh-bb-addons'),
                                'default' => '480',
                                'maxlength' => '4',
                                'size' => '5',
                                'description' => 'px',
                            )
                        )
                )
            )
        ),


        'style' => array(
            'title' => __('Style', 'livemesh-bb-addons'),
            'sections' => array(
                'thumbnail_info_title_section' => array(
                    'title' => __('Thumbnail Info Entry Title', 'livemesh-bb-addons'),
                    'fields' => array(

                        'thumbnail_info_title_tag' => array(
                            'type' => 'select',
                            'label' => __('Heading HTML Tag', 'livemesh-bb-addons'),
                            'default' => 'h3',
                            'options' => array(
                                'h1' => __('H1', 'livemesh-bb-addons'),
                                'h2' => __('H2', 'livemesh-bb-addons'),
                                'h3' => __('H3', 'livemesh-bb-addons'),
                                'h4' => __('H4', 'livemesh-bb-addons'),
                                'h5' => __('H5', 'livemesh-bb-addons'),
                                'h6' => __('H6', 'livemesh-bb-addons'),
                                'div' => __('Div', 'livemesh-bb-addons'),
                            )
                        ),
                        'thumbnail_info_title_color' => array(
                            'type' => 'color',
                            'label' => __('Title Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'thumbnail_info_title_hover_border_color' => array(
                            'type' => 'color',
                            'label' => __('Title Hover Border Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'thumbnail_info_title_font' => array(
                            'type' => 'font',
                            'label' => __('Title Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'thumbnail_info_title_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Title Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'thumbnail_info_title_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Title Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                    )
                ),

                'thumbnail_info_taxonomy_section' => array(
                    'title' => __('Thumbnail Info Taxonomy Terms', 'livemesh-bb-addons'),
                    'fields' => array(

                        'thumbnail_info_tags_color' => array(
                            'type' => 'color',
                            'label' => __('Taxonomy Terms Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'thumbnail_info_tags_font' => array(
                            'type' => 'font',
                            'label' => __('Taxonomy Terms Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'thumbnail_info_tags_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Taxonomy Terms Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'thumbnail_info_tags_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Taxonomy Terms Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                    )
                ),


                'entry_title_section' => array(
                    'title' => __('Post Entry Title', 'livemesh-bb-addons'),
                    'fields' => array(

                        'entry_title_tag' => array(
                            'type' => 'select',
                            'label' => __('Entry Title HTML Tag', 'livemesh-bb-addons'),
                            'default' => 'h3',
                            'options' => array(
                                'h1' => __('H1', 'livemesh-bb-addons'),
                                'h2' => __('H2', 'livemesh-bb-addons'),
                                'h3' => __('H3', 'livemesh-bb-addons'),
                                'h4' => __('H4', 'livemesh-bb-addons'),
                                'h5' => __('H5', 'livemesh-bb-addons'),
                                'h6' => __('H6', 'livemesh-bb-addons'),
                                'div' => __('Div', 'livemesh-bb-addons'),
                            )
                        ),
                        'entry_title_color' => array(
                            'type' => 'color',
                            'label' => __('Entry Title Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'entry_title_font' => array(
                            'type' => 'font',
                            'label' => __('Entry Title Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'entry_title_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Entry Title Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'entry_title_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Entry Title Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'entry_title_text_transform'  => array(
                            'type'          => 'select',
                            'label'         => __('Text Transform', 'livemesh-bb-addons'),
                            'default'       => 'none',
                            'options'       => array(
                                'none' 			=> __( 'Default', 'livemesh-bb-addons' ),
                                'capitalize' 	=> __( 'Capitalize', 'livemesh-bb-addons' ),
                                'uppercase' 	=> __( 'Uppercase', 'livemesh-bb-addons' ),
                                'lowercase' 	=> __( 'Lowercase', 'livemesh-bb-addons' ),
                                'initial' 		=> __( 'Initial', 'livemesh-bb-addons' ),
                                'inherit' 		=> __( 'Inherit', 'livemesh-bb-addons' ),
                            ),
                        ),
                    )
                ),


                'entry_summary_section' => array(
                    'title' => __('Post Entry Summary', 'livemesh-bb-addons'),
                    'fields' => array(

                        'entry_summary_color' => array(
                            'type' => 'color',
                            'label' => __('Entry Summary Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'entry_summary_font' => array(
                            'type' => 'font',
                            'label' => __('Entry Summary Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'entry_summary_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Entry Summary Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'entry_summary_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Entry Summary Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                    )
                ),


                'entry_meta_section' => array(
                    'title' => __('Post Entry Meta', 'livemesh-bb-addons'),
                    'fields' => array(

                        'entry_meta_color' => array(
                            'type' => 'color',
                            'label' => __('Entry Meta Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'entry_meta_font' => array(
                            'type' => 'font',
                            'label' => __('Entry Meta Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'entry_meta_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Entry Meta Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'entry_meta_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Entry Meta Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                    )
                ),
                'entry_meta_link_section' => array(
                    'title' => __('Post Entry Meta Link', 'livemesh-bb-addons'),
                    'fields' => array(

                        'entry_meta_link_color' => array(
                            'type' => 'color',
                            'label' => __('Entry Meta Link Color', 'livemesh-bb-addons'),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        'entry_meta_link_font' => array(
                            'type' => 'font',
                            'label' => __('Entry Meta Link Font', 'livemesh-bb-addons'),
                            'default' => array(
                                'family' => 'Default',
                                'weight' => 'default'
                            ),
                        ),
                        'entry_meta_link_font_size' => array(
                            'type' => 'unit',
                            'label' => __('Entry Meta Link Font Size', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                        'entry_meta_link_line_height' => array(
                            'type' => 'unit',
                            'label' => __('Entry Meta Link Line height', 'livemesh-bb-addons'),
                            'responsive' => true,
                        ),
                    )
                ),

            )
        ),
        
        
    )
);