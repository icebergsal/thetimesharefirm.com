<?php
/*
Plugin Name: Accordions
Plugin URI: https://www.pickplugins.com/item/accordions-html-css3-responsive-accordion-grid-for-wordpress/?ref=dashboard
Description: Fully responsive and mobile ready accordion grid for wordpress.
Version: 2.1.10
WC requires at least: 3.0.0
WC tested up to: 3.5
Author: PickPlugins
Author URI: http://pickplugins.com
Text Domain: accordions
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class Accordions{
	
	public function __construct(){

		define('accordions_plugin_url', plugins_url('/', __FILE__)  );
		define('accordions_plugin_dir', plugin_dir_path( __FILE__ ) );


        require_once( plugin_dir_path( __FILE__ ) . 'includes/settings-tabs.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/meta-new.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/functions-wc.php');
        require_once( plugin_dir_path( __FILE__ ) . 'includes/functions-meta.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/duplicate-post.php');
        require_once( plugin_dir_path( __FILE__ ) . 'includes/class-WPAdminSettings.php');
        require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');

		add_action( 'wp_enqueue_scripts', array( $this, 'accordions_front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'accordions_admin_scripts' ) );
		
		add_action( 'plugins_loaded', array( $this, 'accordions_load_textdomain' ));
		
		
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-widget-accordions.php');		
				
		add_action( 'widgets_init', array( $this, 'widget_register' ) );
		
		// Display shortcode in widgets
		add_filter('widget_text', 'do_shortcode');
        add_filter( 'plugin_action_links_'.plugin_basename( __FILE__ ), array( $this, 'plugin_list_pro_link' ));
	}
	
	public function widget_register() {
		register_widget( 'WidgetAccordions' );
	}
	
	public function accordions_load_textdomain() {

        $locale = apply_filters( 'plugin_locale', get_locale(), 'accordions' );
        load_textdomain('accordions', WP_LANG_DIR .'/accordions/accordions-'. $locale .'.mo' );

        load_plugin_textdomain( 'accordions', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );

		}
	
	
	public function accordions_install(){
		
		do_action( 'accordions_action_install' );
		
		}		
		
	public function accordions_uninstall(){
		
		do_action( 'accordions_action_uninstall' );
		}		
		
	public function accordions_deactivation(){
		
		do_action( 'accordions_action_deactivation' );
		}
	
	
	public function accordions_front_scripts(){


		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-effects-core');			
		//wp_enqueue_script('accordions_js', plugins_url( 'assets/frontend/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		//wp_localize_script( 'accordions_js', 'accordions_ajax', array( 'accordions_ajaxurl' => admin_url( 'admin-ajax.php')));


		wp_enqueue_style('accordions_themes.Tabs.style', plugins_url( 'assets/global/css/themesTabs.style.css', __FILE__ ));
		//wp_enqueue_style('fontawesome.min', plugins_url( 'assets/global/css/fontawesome.min.css', __FILE__ ));


		}

	public function accordions_admin_scripts(){


        global $post;

        if( !empty($post)){

            if($post->post_type=='accordions'){

                wp_enqueue_editor();

            }

            if($post->post_type=='product'){



            }




           // wp_enqueue_script( 'color-picker', plugins_url('/assets/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), true, true );

        }




            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script('jquery-ui-accordion');
            wp_enqueue_script('jquery-ui-tabs');
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style( 'wp-color-picker' );


            wp_enqueue_script('accordions_admin_js', plugins_url( 'assets/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ),'20181018');
            wp_localize_script( 'accordions_admin_js', 'accordions_ajax', array( 'accordions_ajaxurl' => admin_url( 'admin-ajax.php')));
            wp_localize_script( 'accordions_admin_js', 'L10n_accordions', array(
                'confirm_text' => __( 'Confirm', 'accordions' )
            ));

            wp_enqueue_style('accordions_admin_style', plugins_url( 'assets/admin/css/style.css', __FILE__ ),'','20181018');
            wp_enqueue_style('fontawesome', plugins_url( 'assets/global/css/fontawesome.min.css', __FILE__ ),'','20181018');

            wp_enqueue_script('codemirror', plugins_url( 'assets/admin/js/codemirror.js' , __FILE__ ) , array( 'jquery' ),'20181018');
            wp_enqueue_style('codemirror', plugins_url( 'assets/admin/css/codemirror.css', __FILE__ ),'','20181018');

            wp_enqueue_script('settings-tabs', plugins_url( 'assets/admin/js/settings-tabs.js' , __FILE__ ) , array( 'jquery' ),'20181018');
            wp_enqueue_style('settings-tabs', plugins_url( 'assets/admin/css/settings-tabs.css', __FILE__ ),'','20181018');








		}

    public function plugin_list_pro_link( $links ) {

        return array_merge(
            array(
                'get_premium' => '<a target="_blank" class="" style=" font-weight:bold;" href="https://www.pickplugins.com/product/accordions/?ref=dashboard">'.__('Buy Premium!', 'accordions').'</a>'
            ),
            $links
        );

    }

	}

new Accordions();
