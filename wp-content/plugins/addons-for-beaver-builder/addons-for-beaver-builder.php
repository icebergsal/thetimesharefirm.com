<?php

/**
 * Plugin Name: Livemesh Addons for Beaver Builder
 * Plugin URI: https://www.livemeshthemes.com/beaver-builder-addons
 * Description: A collection of premium quality addons or modules for use in Beaver Builder page builder. Beaver Builder must be installed and activated.
 * Author: Livemesh
 * Author URI: https://www.livemeshthemes.com/beaver-builder-addons
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Version: 2.6
 * Text Domain: livemesh-bb-addons
 * Domain Path: languages
 *
 * Livemesh Addons for Beaver Builder is distributed under the terms of the GNU
 * General Public License as published by the Free Software Foundation,
 * either version 2 of the License, or any later version.
 *
 * Livemesh Addons for Beaver Builder is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Livemesh Addons for Beaver Builder. If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Ensure the free version is deactivated if premium is running

if ( !function_exists( 'labb_fs' ) ) {
    // Plugin version
    define( 'LABB_VERSION', '2.6' );
    // Plugin Root File
    define( 'LABB_PLUGIN_FILE', __FILE__ );
    // Plugin Folder Path
    define( 'LABB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    // Plugin Folder URL
    define( 'LABB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    // Plugin Addons Folder Path
    define( 'LABB_ADDONS_DIR', plugin_dir_path( __FILE__ ) . 'includes/modules/' );
    // Plugin Premium Addons Folder Path
    define( 'LABB_PREMIUM_ADDONS_DIR', plugin_dir_path( __FILE__ ) . 'includes/modules/premium/' );
    // Plugin Folder URL
    define( 'LABB_ADDONS_URL', plugin_dir_url( __FILE__ ) . 'includes/modules/' );
    // Plugin Folder URL
    define( 'LABB_PREMIUM_ADDONS_URL', plugin_dir_url( __FILE__ ) . 'includes/modules/premium/' );
    // Plugin Help Page URL
    define( 'LABB_PLUGIN_HELP_URL', admin_url() . 'admin.php?page=livemesh_bb_addons_documentation' );
    // Create a helper function for easy SDK access.
    function labb_fs()
    {
        global  $labb_fs ;
        
        if ( !isset( $labb_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $labb_fs = fs_dynamic_init( array(
                'id'             => '1655',
                'slug'           => 'addons-for-beaver-builder',
                'type'           => 'plugin',
                'public_key'     => 'pk_997db15a2b2485f69e29b0fecba34',
                'is_premium'     => false,
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'livemesh_bb_addons',
                'support' => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $labb_fs;
    }
    
    // Init Freemius.
    labb_fs();
    // Signal that SDK was initiated.
    do_action( 'labb_fs_loaded' );
    function labb_fs_add_licensing_helper()
    {
        ?>
        <script type="text/javascript">
            (function () {
                window.labb_fs = {can_use_premium_code: <?php 
        echo  json_encode( labb_fs()->can_use_premium_code() ) ;
        ?>};
            })();
        </script>
        <?php 
    }
    
    add_action( 'wp_head', 'labb_fs_add_licensing_helper' );
    require_once dirname( __FILE__ ) . '/plugin.php';
}
