<?php
/**
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 * @todo 	  Add Custom Holidays / Special Days | CSS3 Open Image
 *
 * @wordpress-plugin
 * Plugin Name:       Captain Opening Hours
 * Plugin URI:        http://captaintheme.com/plugins/opening-hours
 * Description:       Show off your store's opening hours easily.
 * Version:           1.0.0
 * Author:            Captain Theme
 * Author URI:        http://captaintheme.com/
 * Text Domain:       coh
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * Made with the amazing: WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Define Some Cool Constants
 *----------------------------------------------------------------------------*/

// Plugin Folder Path
if( !defined( 'COH_PLUGIN_DIR' ) ) {
	define( 'COH_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-coh.php' );

register_activation_hook( __FILE__, array( 'COH', 'activate' ) );

add_action( 'plugins_loaded', array( 'COH', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-coh-admin.php' );
	add_action( 'plugins_loaded', array( 'COH_Admin', 'get_instance' ) );

}
