<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class LABB_Admin {


    protected $plugin_slug = 'livemesh_bb_addons';

    public function __construct() {

        $this->includes();
        $this->init_hooks();

    }

    public function includes() {

        // load class admin ajax function
        require_once(LABB_PLUGIN_DIR . 'admin/admin-ajax.php');

        /**
         * Classes responsible for displaying admin notices.
         */
        if (labb_fs()->is_not_paying()) {

            require_once LABB_PLUGIN_DIR . 'admin/notices/admin-notice.php';

            require_once LABB_PLUGIN_DIR . 'admin/notices/admin-notice-rate.php';
        }

    }

    public function init_hooks() {

        // Build admin menu/pages
        add_action('admin_menu', array($this, 'add_plugin_admin_menu'));

        // Load admin style sheet and JavaScript.
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));

        add_action('current_screen', array($this, 'remove_admin_notices'));


        /**
         * Notice: Rate plugin
         */
        if (labb_fs()->is_not_paying()) {

            $rate = new LABB_Notice_Rate('rate', LABB_PLUGIN_DIR . 'admin/notices/templates/rate.php');

            add_action('load-plugins.php', array($rate, 'defer_first_time'));

            add_action('admin_notices', array($rate, 'display_notice'));

            add_action('admin_post_labb_dismiss_notice', array($rate, 'dismiss_notice'));
        }

    }

    public function remove_admin_notices($screen) {

        // If this screen is Addons for Beaver Builder plugin options page, remove annoying admin notices
        if (strpos($screen->id, $this->plugin_slug) !== false && strpos($screen->id, $this->plugin_slug . '_license') === false) {
            add_action('admin_notices', array(&$this, 'remove_notices_start'));
            add_action('admin_notices', array(&$this, 'remove_notices_end'), 999);
        }
    }

    public function remove_notices_start() {

        // Turn on output buffering
        ob_start();

    }

    public function remove_notices_end() {

        // Get current buffer contents and delete current output buffer
        $content = ob_get_contents();
        ob_clean();

    }

    public function add_plugin_admin_menu() {

        add_menu_page(
            __('Addons for Beaver Builder', 'livemesh-bb-addons'),
            __('Beaver Addons', 'livemesh-bb-addons'),
            'manage_options',
            $this->plugin_slug,
            array($this, 'display_settings_page'),
            LABB_PLUGIN_URL . 'admin/assets/images/logo-shape16.png'
        );

        // add plugin settings submenu page
        add_submenu_page(
            $this->plugin_slug,
            __('Widgets Settings', 'livemesh-bb-addons'),
            __('Settings', 'livemesh-bb-addons'),
            'manage_options',
            $this->plugin_slug,
            array($this, 'display_settings_page')
        );

        // add import/export submenu page
        add_submenu_page(
            $this->plugin_slug,
            __('Widgets Documentation', 'livemesh-bb-addons'),
            __('Documentation', 'livemesh-bb-addons'),
            'manage_options',
            $this->plugin_slug . '_documentation',
            array($this, 'display_plugin_documentation')
        );

    }

    public function display_settings_page() {

        require_once('views/admin-header.php');
        require_once('views/admin-banner2.php');
        require_once('views/settings.php');
        require_once('views/admin-footer.php');

    }

    public function display_plugin_documentation() {


        require_once('views/admin-header.php');
        require_once('views/admin-banner1.php');
        require_once('views/documentation.php');
        require_once('views/admin-footer.php');

    }

    public function enqueue_admin_scripts() {

        // Use minified libraries if LABB_SCRIPT_DEBUG is turned off
        $suffix = (defined('LABB_SCRIPT_DEBUG') && LABB_SCRIPT_DEBUG) ? '' : '.min';

        // get current admin screen
        $screen = get_current_screen();

        // If screen is a part of Addons for Beaver Builder plugin options page
        if (strpos($screen->id, $this->plugin_slug) !== false) {

            wp_enqueue_script('jquery-ui-datepicker');

            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');

            wp_register_style('labb-admin-styles', LABB_PLUGIN_URL . 'admin/assets/css/labb-admin.css', array(), LABB_VERSION);
            wp_enqueue_style('labb-admin-styles');

            wp_register_script('labb-admin-scripts', LABB_PLUGIN_URL . 'admin/assets/js/labb-admin' . $suffix . '.js', array(), LABB_VERSION, true);
            wp_enqueue_script('labb-admin-scripts');

            wp_register_style('labb-admin-page-styles', LABB_PLUGIN_URL . 'admin/assets/css/labb-admin-page.css', array(), LABB_VERSION);
            wp_enqueue_style('labb-admin-page-styles');
        }

        if (strpos($screen->id, $this->plugin_slug . '_documentation') !== false) {

            // Load scripts and styles for documentation
            wp_register_script('labb-doc-scripts', LABB_PLUGIN_URL . 'admin/assets/js/documentation' . $suffix . '.js', array(), LABB_VERSION, true);
            wp_enqueue_script('labb-doc-scripts');

            wp_register_style('labb-doc-styles', LABB_PLUGIN_URL . 'admin/assets/css/documentation.css', array(), LABB_VERSION);
            wp_enqueue_style('labb-doc-styles');

            // Thickbox
            add_thickbox();

        }

    }

}

new LABB_Admin;