<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !class_exists( 'Livemesh_BB_Addons' ) ) {
    /**
     * Main Livemesh_BB_Addons Class
     *
     */
    final class Livemesh_BB_Addons
    {
        /** Singleton *************************************************************/
        private static  $instance ;
        /**
         * Main Livemesh_BB_Addons Instance
         *
         * Insures that only one instance of Livemesh_BB_Addons exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance()
        {
            
            if ( !isset( self::$instance ) && !self::$instance instanceof Livemesh_BB_Addons ) {
                self::$instance = new Livemesh_BB_Addons();
                self::$instance->setup_debug_constants();
                self::$instance->includes();
                self::$instance->hooks();
                self::$instance->template_hooks();
            }
            
            return self::$instance;
        }
        
        /**
         * Throw error on object clone
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         */
        public function __clone()
        {
            // Cloning instances of the class is forbidden
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'livemesh-bb-addons' ), '2.6' );
        }
        
        /**
         * Disable unserializing of the class
         *
         */
        public function __wakeup()
        {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'livemesh-bb-addons' ), '2.6' );
        }
        
        private function setup_debug_constants()
        {
            $enable_debug = false;
            $settings = get_option( 'labb_settings' );
            if ( $settings && isset( $settings['labb_enable_debug'] ) && $settings['labb_enable_debug'] == "true" ) {
                $enable_debug = true;
            }
            // Enable script debugging
            if ( !defined( 'LABB_SCRIPT_DEBUG' ) ) {
                define( 'LABB_SCRIPT_DEBUG', $enable_debug );
            }
            // Minified JS file name suffix
            if ( !defined( 'LABB_JS_SUFFIX' ) ) {
                
                if ( $enable_debug ) {
                    define( 'LABB_JS_SUFFIX', '' );
                } else {
                    define( 'LABB_JS_SUFFIX', '.min' );
                }
            
            }
        }
        
        /**
         * Include required files
         *
         */
        private function includes()
        {
            require_once LABB_PLUGIN_DIR . 'includes/helper-functions.php';
            if ( is_admin() ) {
                require_once LABB_PLUGIN_DIR . 'admin/admin-init.php';
            }
            /* Load Custom Field Types */
            require_once LABB_PLUGIN_DIR . 'includes/fields/labb-number/labb-number.php';
            require_once LABB_PLUGIN_DIR . 'includes/fields/labb-toggle-button/labb-toggle-button.php';
        }
        
        /**
         * Include required files
         *
         */
        public function include_modules()
        {
            if ( !class_exists( 'FLBuilder' ) ) {
                return;
            }
            /* Load Beaver Builder Addon Elements */
            require_once LABB_ADDONS_DIR . 'labb-carousel/labb-carousel.php';
            require_once LABB_ADDONS_DIR . 'labb-clients/labb-clients.php';
            require_once LABB_ADDONS_DIR . 'labb-heading/labb-heading.php';
            require_once LABB_ADDONS_DIR . 'labb-odometers/labb-odometers.php';
            require_once LABB_ADDONS_DIR . 'labb-piecharts/labb-piecharts.php';
            require_once LABB_ADDONS_DIR . 'labb-posts-carousel/labb-posts-carousel.php';
            require_once LABB_ADDONS_DIR . 'labb-pricing-table/labb-pricing-table.php';
            require_once LABB_ADDONS_DIR . 'labb-services/labb-services.php';
            require_once LABB_ADDONS_DIR . 'labb-stats-bar/labb-stats-bar.php';
            require_once LABB_ADDONS_DIR . 'labb-team-members/labb-team-members.php';
            require_once LABB_ADDONS_DIR . 'labb-testimonials/labb-testimonials.php';
            require_once LABB_ADDONS_DIR . 'labb-testimonials-slider/labb-testimonials-slider.php';
            require_once LABB_ADDONS_DIR . 'labb-portfolio/labb-portfolio.php';
        }
        
        /**
         * Load Plugin Text Domain
         *
         * Looks for the plugin translation files in certain directories and loads
         * them to allow the plugin to be localised
         */
        public function load_plugin_textdomain()
        {
            $lang_dir = apply_filters( 'labb_bb_addons_lang_dir', trailingslashit( LABB_PLUGIN_DIR . 'languages' ) );
            // Traditional WordPress plugin locale filter
            $locale = apply_filters( 'plugin_locale', get_locale(), 'livemesh-bb-addons' );
            $mofile = sprintf( '%1$s-%2$s.mo', 'livemesh-bb-addons', $locale );
            // Setup paths to current locale file
            $mofile_local = $lang_dir . $mofile;
            
            if ( file_exists( $mofile_local ) ) {
                // Look in the /wp-content/plugins/livemesh-bb-addons/languages/ folder
                load_textdomain( 'livemesh-bb-addons', $mofile_local );
            } else {
                // Load the default language files
                load_plugin_textdomain( 'livemesh-bb-addons', false, $lang_dir );
            }
            
            return false;
        }
        
        /**
         * Setup the default hooks and actions
         */
        private function hooks()
        {
            add_action( 'plugins_loaded', array( self::$instance, 'load_plugin_textdomain' ) );
            // fire a little later until post type and taxonomy registrations are complete
            add_action( 'init', array( self::$instance, 'include_modules' ), 11 );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_common_scripts' ), 10 );
            add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_scripts' ), 10 );
            add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_styles' ), 10 );
            add_action( 'wp_enqueue_scripts', array( $this, 'localize_scripts' ), 999999 );
        }
        
        private function template_hooks()
        {
            $addons = array(
                'clients',
                'carousel',
                'heading',
                'odometers',
                'piecharts',
                'posts_grid',
                'posts_carousel',
                'pricing_table',
                'services',
                'stats_bars',
                'team_members',
                'testimonials',
                'testimonials_slider'
            );
            foreach ( $addons as $addon ) {
                add_filter(
                    'labb_' . $addon . '_output',
                    function ( $default_output, $settings ) use( $addon ) {
                    // Replace underscores with dashes for template file names
                    $template_name = str_replace( '_', '-', $addon );
                    $output = labb_get_template_part( $template_name, $settings );
                    if ( $output !== null ) {
                        return $output;
                    }
                    return $default_output;
                },
                    10,
                    2
                );
            }
        }
        
        /**
         * Load Frontend Scripts/Styles
         *
         */
        public function enqueue_common_scripts()
        {
            // Use minified libraries if LABB_SCRIPT_DEBUG is turned off
            $suffix = ( defined( 'LABB_SCRIPT_DEBUG' ) && LABB_SCRIPT_DEBUG ? '' : '.min' );
            wp_register_style(
                'labb-frontend-styles',
                LABB_PLUGIN_URL . 'assets/css/labb-frontend.css',
                array(),
                LABB_VERSION
            );
            wp_enqueue_style( 'labb-frontend-styles' );
            wp_register_style(
                'labb-icomoon-styles',
                LABB_PLUGIN_URL . 'assets/css/icomoon.css',
                array(),
                LABB_VERSION
            );
            wp_enqueue_style( 'labb-icomoon-styles' );
            wp_register_script(
                'labb-frontend-scripts',
                LABB_PLUGIN_URL . 'assets/js/labb-frontend' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
            wp_enqueue_script( 'labb-frontend-scripts' );
        }
        
        /**
         * Load Frontend Scripts
         *
         */
        public function register_frontend_scripts()
        {
            // Use minified libraries if LABB_SCRIPT_DEBUG is turned off
            $suffix = ( defined( 'LABB_SCRIPT_DEBUG' ) && LABB_SCRIPT_DEBUG ? '' : '.min' );
            wp_register_script(
                'labb-modernizr',
                LABB_PLUGIN_URL . 'assets/js/modernizr-custom' . $suffix . '.js',
                array(),
                LABB_VERSION,
                true
            );
            wp_register_script(
                'labb-waypoints',
                LABB_PLUGIN_URL . 'assets/js/jquery.waypoints' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
            wp_register_script(
                'isotope.pkgd',
                LABB_PLUGIN_URL . 'assets/js/isotope.pkgd' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
            wp_register_script(
                'imagesloaded.pkgd',
                LABB_PLUGIN_URL . 'assets/js/imagesloaded.pkgd' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
            wp_register_script(
                'jquery-stats',
                LABB_PLUGIN_URL . 'assets/js/jquery.stats' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
            wp_register_script(
                'slick',
                LABB_PLUGIN_URL . 'assets/js/slick' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
            wp_register_script(
                'jquery-flexslider',
                LABB_PLUGIN_URL . 'assets/js/jquery.flexslider' . $suffix . '.js',
                array( 'jquery' ),
                LABB_VERSION,
                true
            );
        }
        
        public function localize_scripts()
        {
            $custom_css = labb_get_option( 'labb_custom_css', '' );
            wp_localize_script( 'labb-frontend-scripts', 'labb_settings', array(
                'custom_css' => $custom_css,
            ) );
        }
        
        /**
         * Load Frontend Styles
         *
         */
        public function register_frontend_styles()
        {
            wp_register_style(
                'animate',
                LABB_PLUGIN_URL . 'assets/css/animate.css',
                array(),
                LABB_VERSION
            );
            wp_register_style(
                'slick',
                LABB_PLUGIN_URL . 'assets/css/slick.css',
                array(),
                LABB_VERSION
            );
            wp_register_style(
                'flexslider',
                LABB_PLUGIN_URL . 'assets/css/flexslider.css',
                array(),
                LABB_VERSION
            );
        }
    
    }
}
// End if class_exists check
/**
 * The main function responsible for returning the one true Livemesh_BB_Addons
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $labb = LABB(); ?>
 */
function LABB()
{
    return Livemesh_BB_Addons::instance();
}

// Get LABB Running
LABB();