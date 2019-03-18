<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

$theme_color = labb_get_option('labb_theme_color', '#f94213');

$theme_hover_color = labb_get_option('labb_theme_hover_color', '#888888');

$autoload_widgets = labb_get_option('labb_autoload_widgets', false);

$debug_mode = labb_get_option('labb_enable_debug', false);

$custom_css = labb_get_option('labb_custom_css', '');

?>

<div class="labb-settings">

    <div class="postbox">

        <!-------------------
        OPTIONS HOLDER START
        -------------------->
        <div class="labb-menu-options settings-options">

            <div class="labb-inner">

                <!-------------------  LI TABS -------------------->

                <ul class="labb-tabs-wrap">
                    <li class="labb-tab selected" data-target="general"><i
                            class="labb-icon dashicons dashicons-admin-generic"></i><?php echo __('General', 'livemesh-bb-addons') ?>
                    </li>
                    <li class="labb-tab" data-target="custom-css"><i
                            class="labb-icon dashicons dashicons-editor-code"></i><?php echo __('Custom CSS', 'livemesh-bb-addons') ?>
                    </li>
                    <li class="labb-tab" data-target="debugging"><i
                            class="labb-icon dashicons dashicons-warning"></i><?php echo __('Debugging', 'livemesh-bb-addons') ?>
                    </li>
                    <li class="labb-tab" data-target="premium-version"><i
                            class="labb-icon dashicons dashicons-yes"></i><?php echo __('Premium Version', 'livemesh-bb-addons') ?>
                    </li>
                </ul>

                <!-------------------  GENERAL TAB -------------------->

                <div class="labb-tab-content general labb-tab-show">

                    <!---- Theme Colors -->
                    <div class="labb-box-side">
                        <h3><?php echo __('Theme Colors', 'livemesh-bb-addons') ?></h3>
                    </div>
                    <div class="labb-inner labb-box-inner">
                        <div class="labb-row labb-field">
                            <label
                                class="labb-label"><?php echo __('Theme Color Scheme', 'livemesh-bb-addons') ?></label>
                            <p class="labb-desc"><?php echo __('Most themes use a single color as a major color across the site. This color is often used for links, titles, buttons, icons, highlights etc. <br> To maintain the consistent look with the theme, specify the default color used by the theme activated on your site. This color will be applied to the plugin addons by default. <br>The hover color refers to the color set for links on mouse hover.', 'livemesh-bb-addons') ?></p>
                        </div>

                        <div class="labb-clearfix"></div>

                        <!---- Theme color -->
                        <div class="labb-row labb-field labb-type-color">
                            <label class="labb-label"><?php echo __('Theme Color', 'livemesh-bb-addons') ?></label>
                            <p class="labb-desc"><?php echo __('Select the default theme color.', 'livemesh-bb-addons') ?></p>
                            <div class="labb-spacer" style="height: 5px"></div>
                            <input class="labb-colorpicker" name="labb_theme_color" type="text"
                                   data-default="#f94213" value="<?php echo $theme_color ?>"/>
                        </div>


                        <div class="labb-spacer"></div>

                        <!---- Theme Hover color -->
                        <div class="labb-row labb-field labb-type-color">
                            <label class="labb-label"><?php echo __('Theme Hover Color', 'livemesh-bb-addons') ?></label>
                            <p class="labb-desc"><?php echo __('Select the default hover color for your theme.', 'livemesh-bb-addons') ?></p>
                            <div class="labb-spacer" style="height: 5px"></div>
                            <input class="labb-colorpicker" name="labb_theme_hover_color" type="text"
                                   data-default="#888888" value="<?php echo $theme_hover_color ?>"/>
                        </div>



                    </div>

                    <div class="labb-clearfix"></div>
                    

                </div>

                <!------------------- Custom CSS TAB -------------------->

                <div class="labb-tab-content custom-css">

                    <!---- Custom CSS -->
                    <div class="labb-box-side">
                        <h3><?php echo __('Custom CSS', 'livemesh-bb-addons') ?></h3>
                    </div>
                    <div class="labb-inner labb-box-inner">
                        <div class="labb-row labb-field labb-custom-css">
                            <label
                                class="labb-label"><?php echo __('Custom CSS', 'livemesh-bb-addons') ?></label>
                            <div class="labb-spacer" style="height: 5px"></div>
                            <p class="labb-desc"><?php echo __('Please enter custom CSS for custom styling of addons', 'livemesh-bb-addons') ?></p>

                            <div class="labb-spacer" style="height: 15px"></div>

                            <textarea class="labb-textarea" name="labb_custom_css" id="labb_custom_css" rows="20" cols="120"><?php echo $custom_css ?></textarea>

                        </div>
                    </div>

                    <div class="labb-clearfix"></div>

                </div>

                <!------------------- Debugging TAB -------------------->

                <div class="labb-tab-content debugging">

                    <!---- Enable script debugging -->
                    <div class="labb-box-side">
                        <h3><?php echo __('Debug Mode', 'livemesh-bb-addons') ?></h3>
                    </div>
                    <div class="labb-inner labb-box-inner">
                        <div class="labb-spacer" style="height: 15px"></div>
                        <label
                            class="labb-label labb-label-outside"><?php echo __('Enable Script Debug Mode', 'livemesh-bb-addons') ?></label>
                        <div class="labb-row labb-type-checkbox labb-field">
                            <p class="labb-desc"><?php echo __('Use unminified Javascript files instead of minified ones to help developers debug an issue', 'livemesh-bb-addons') ?></p>
                            <div class="labb-toggle">
                                <input type="checkbox" class="labb-checkbox" name="labb_enable_debug" id="labb_enable_debug"
                                       data-default="" value="<?php echo $debug_mode ?>" <?php echo checked(!empty($debug_mode), 1, false) ?>>
                                <label for="labb_enable_debug"></label>
                            </div>
                        </div>
                    </div>

                    <div class="labb-clearfix"></div>

                    <!---- System Info -->
                    <div class="labb-box-side">
                        <h3><?php echo __('System Info', 'livemesh-bb-addons') ?></h3>
                    </div>
                    <div class="labb-inner labb-box-inner">

                        <div class="labb-row labb-field">
                            <label
                                class="labb-label"><?php echo __('System Information', 'livemesh-bb-addons') ?></label>
                            <p class="labb-desc"><?php echo __('Server setup information useful for debugging purposes.', 'livemesh-bb-addons'); ?></p>

                            <div class="labb-spacer" style="height: 15px"></div>

                            <p class="debug-info"><?php echo nl2br(labb_get_sysinfo()); ?></p>
                        </div>

                    </div>

                    <div class="labb-clearfix"></div>

                </div>

                <!------------------- PREMIUM VERSION TAB -------------------->

                <div class="labb-tab-content premium-version">

                    <!---- Premium Version Information -->
                    <div class="labb-box-side">
                        <h3><?php echo __('Premium Version', 'livemesh-bb-addons') ?></h3>
                    </div>
                    <div class="labb-inner labb-box-inner">


                        <div class="labb-row labb-field labb_premium_version">

                            <?php if (labb_fs()->is_not_paying()): ?>

                                <label class="labb-label"><?php echo __('Why upgrade to Premium Version of the plugin?!', 'livemesh-bb-addons') ?></label>

                            <?php else: ?>

                                <label class="labb-label"><?php echo __('Thanks for upgrading to the Premium Version of the plugin!', 'livemesh-bb-addons') ?></label>

                            <?php endif; ?>
                            
                            <p>The premium version helps us to continue development of this plugin incorporating even
                                more features and enhancements along with offering more responsive support. Following are
                                some of the benefits you enjoy by upgrading to the premium version of this plugin.</p>

                            <label class="labb-label">New Premium Widgets</label>

                            <p>Although the free version of the Livemesh Addons for Beaver Builder features a large repertoire of premium quality addons, the premium
                                version does even more.</p>

                            <ul>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/posts-block/" title="Post Blocks Addon" target="_blank">Post
                                        Blocks!</a> - Present your blog posts, events, news items or portfolio in a dozen creative ways. Comes with AJAX filtering,
                                    pagination and load more features to help visitors navigate your entire collection of blog posts or custom post types and
                                    their categories without reloading the page.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/tabs/" title="Tabs Addon" target="_blank">Responsive
                                        Tabs</a> - Exquisitely designed tabs that function seamlessly across all devices and resolutions. The
                                    plugin features never before choice of over dozen styles of tabs to choosen from.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/accordion/" title="Accordion/Toggle Addon" target="_blank">Accordion/Toggle</a> - Controls
                                    that capture collapsible content panels when space is limited.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/sliders/" title="Image Slider Widget" target="_blank">Image
                                        Slider</a> - Create a responsive slider of images with support
                                    for captions,
                                    multiple slider types like Nivo, Flex, Slick and lightweight sliders, thumbnail
                                    navigation etc.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/image-gallery/" title="Image Gallery Widget" target="_blank">Image
                                        Gallery</a> - Create a gallery of images with options for masonry
                                    or fit rows, pagination, lazy load, lightbox support etc.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/video-gallery/" title="Video Gallery Widget" target="_blank">Video
                                        Gallery</a> - Create a beautiful gallery of videos to help
                                    showcase a collection of YouTube/Vimeo videos on your site.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/gallery-carousel/" title="Image Carousel" target="_blank">Image
                                        Carousel</a> - Build a responsive carousel of images.</li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/gallery-carousel/" title="Video Carousel" target="_blank">Video
                                        Carousel</a> - Build a responsive carousel of YouTube/Vimeo
                                    videos.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/buttons/" title="Buttons Addon" target="_blank">Buttons</a> - Animated buttons with great choice of colors.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/icon-lists/" title="Icon List" target="_blank">Icon List</a> - - Create a list of icons with description and link - for social media profiles,
                                    for showcasing services or features as well with icons or images.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/faq-element/" title="FAQ Addon" target="_blank">FAQ</a> - Create a set of Frequently Asked Questions for display in a
                                    page.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/features/" title="Features Addon" target="_blank">Features Addon</a> for showcasing product features or services provided by an agency/business.
                                </li>
                            </ul>

                            <div class="labb-spacer" style="height: 15px"></div>

                            <?php if (labb_fs()->is_not_paying()): ?>

                                <a class="labb-button purchase" href="<?php echo labb_fs()->get_upgrade_url(); ?>"><i class="dashicons dashicons-cart"></i><?php echo __('Purchase Now', 'livemesh-bb-addons'); ?></a>

                                <div class="labb-spacer" style="height: 25px"></div>

                            <?php endif; ?>

                            <label class="labb-label">Additional Features</label>

                            <p>Along with incorporating many new elements into premium version, the pro version is being
                                updated with additional features for existing elements -</p>

                            <ul>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/portfolio-grid-pro/" title="Posts Grid" target="_blank">Lazy Load</a> - The portfolio/post grid and image gallery elements
                                    incorporate option to lazy load posts/images with the click of a Load More button.
                                </li>
                                <li><a href="https://www.livemeshthemes.com/beaver-builder-addons/portfolio-grid-pro/" title="Posts Grid" target="_blank">Pagination</a> - Create a grid of posts or custom post types with AJAX
                                    based pagination support.
                                </li>
                                <li><strong>Lightbox Support</strong> - The premium version comes with support for
                                    Lightbox for grid and carousel elements.
                                </li>
                                <li><strong>Customizations</strong> - Ability to choose custom font sizes and colors for
                                    certain elements like services and icon lists.
                                </li>
                                <li><strong>Custom Animations</strong> - Choose from over <strong>40+ animations</strong>
                                    for most elements (excludes sliders, carousels and grid). The animations display on
                                    user scrolling to the element or when the element becomes visible in the browser window.
                                </li>
                                <li><strong>Sample Data</strong> - Sample data that you can import into your site to get
                                    started quickly on the addon elements and some sample layouts.
                                </li>
                            </ul>

                            <label class="labb-label">Premium Support</label>

                            <p>We offer premium support for our paid customers with following benefits - </p>

                            <ul>
                                <li><strong>Dedicated Support Portal</strong> - The customers will be provided access to a
                                    dedicated support portal powered by Freshdesk.
                                </li>
                                <li><strong>Private Tickets</strong> - Private tickets help you work with us
                                    directly regarding the issues you are facing in your site by sharing the details of
                                    your site securely.
                                </li>
                                </li>
                                <li><strong>Faster turnaround</strong> - The threads opened by paid customers will be
                                    attended to within 24 hours of opening a ticket.
                                </li>
                                <li><strong>Bug fixes and Enhancements</strong> - Any fixes and enhancements made to the
                                    elements will be prioritized to arrive quicker on the premium version.
                                </li>
                                <li><strong>Proven Expertize</strong> - Having served over <strong>12,280+
                                        customers</strong> of our themes over past 3 years, the support provided by us
                                    is proven in competence and commitment.
                                </li>
                            </ul>

                            <div class="labb-spacer" style="height: 25px"></div>

                            <?php if (labb_fs()->is_not_paying()): ?>

                                <a class="labb-button purchase" href="<?php echo labb_fs()->get_upgrade_url(); ?>"><i class="dashicons dashicons-cart"></i><?php echo __('Go Premium', 'livemesh-bb-addons'); ?></a>

                            <?php else: ?>

                                <a class="labb-button know-more" href="https://www.livemeshthemes.com/beaver-builder-addons/"><i class="dashicons dashicons-external"></i><?php echo __('Know More', 'livemesh-bb-addons'); ?></a>

                            <?php endif; ?>
                            
                        </div>

                    </div>

                </div>

                <!-------------------  OPTIONS HOLDER END  -------------------->
            </div>
            
        </div>

        <!------------------- BUILD PANEL SETTINGS -------------------->

    </div>

</div>
