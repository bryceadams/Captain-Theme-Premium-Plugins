<?php
/**
 *
 * @package   Captain Team
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 *
 * Plugin Name: Captain Team
 * Plugin URI: http://captaintheme.com/plugins/captain-team/
 * Description: Captain Team allows you to build Teams with Team Member Profiles and display them throughout your site.
 * Author: Captain Theme
 * Author URI: http://captaintheme.com
 * Version: 1.0.3
 * License: GNU GPL V2+
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

/**
 * Define Constants for use throughout the plugin.
 * Also define ACF_LITE if undefined so Advanced Custom Fields does not show. If you want it to display, comment out 'define( 'ACF_LITE', true )'.
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.1
 */

// Plugin Folder Path
if( !defined( 'CTEAM_PLUGIN_DIR' ) ) {
	define( 'CTEAM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Hide Advanced Custom Fields UI
if ( !defined( 'ACF_LITE' ) ) {
	define( 'ACF_LITE', true );
}


/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

/**
 * Include all the needed files for Captain Team to work.
 * 
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.1
 */

// Require the Plugin Update Notifier
require( 'update-notifier.php' );

// Include Advanced Custom Fields + Add-Ons
include_once( CTEAM_PLUGIN_DIR . 'lib/advanced-custom-fields/acf.php' );
include_once( CTEAM_PLUGIN_DIR . 'lib/acf-repeater/acf-repeater.php' );
include_once( CTEAM_PLUGIN_DIR . 'lib/acf-field-range-master/acf-range.php' );

// Include Simple Page Ordering
include_once( CTEAM_PLUGIN_DIR . 'lib/simple-page-ordering/simple-page-ordering.php' );

// Members Post Type & Teams Taxonomy
include_once( CTEAM_PLUGIN_DIR . 'includes/members-cpt.php' );

// Members Custom Meta Fields
include_once( CTEAM_PLUGIN_DIR . 'includes/members-fields.php' );

// Additional Core Functions / Features
include_once( CTEAM_PLUGIN_DIR . 'includes/members-functions.php' );

// Display of Members Functions
include_once( CTEAM_PLUGIN_DIR . 'includes/members-display.php' );

// Shortcodes
include_once( CTEAM_PLUGIN_DIR . 'includes/members-shortcodes.php' );


/*
|--------------------------------------------------------------------------
| STYLING / SCRIPTS
|--------------------------------------------------------------------------
*/

/**
 * Include all the stylesheets and scripts that plugin needs for the front-end public display.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_styles' ) ) {

	function cteam_styles() {
		wp_enqueue_style( 'main-styles', plugins_url( 'css/member-display-styles.css', __FILE__ ) );
		wp_enqueue_style( 'gridism', plugins_url( 'css/gridism.css', __FILE__ ) );
		wp_enqueue_style( 'fontawesome', plugins_url( 'lib/font-awesome-4.1.0/css/font-awesome.css', __FILE__ ) );
	}

}
add_action( 'wp_head', 'cteam_styles' );

if ( ! function_exists( 'cteam_scripts' ) ) {

	function cteam_scripts() {
		wp_enqueue_script( 'jquery' );
		
		// Quicksand + Easing Jquery Plugin for Live Team Filtering & Custom JS to Load It
		wp_enqueue_script( 'quicksand', plugins_url( 'lib/quicksand.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'easing', plugins_url( 'lib/easing.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'custom', plugins_url( 'js/custom.js', __FILE__ ), array( 'jquery' ) );

		// Google Maps API and Custom ACF Integration
		if ( ! is_admin() ) {
			wp_enqueue_script( 'google-maps-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false' );
			wp_enqueue_script( 'acf-maps', plugins_url( 'js/acf-maps.js', __FILE__ ), array( 'google-maps-js' ) );
		}
	}

}
add_action( 'init', 'cteam_scripts' );


/*
|--------------------------------------------------------------------------
| OTHER-FUNCTIONS
|--------------------------------------------------------------------------
*/

/**
 * Add Link to Members Post Type and Team Taxonomy on Plugins Page
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_settings_link' ) ) {

	function cteam_settings_link( $links, $file ) {
		static $this_plugin;
		
		if ( !$this_plugin ) $this_plugin = plugin_basename( __FILE__ );
	 
		if ( $file == $this_plugin ) {
			$settings_link = '<a href="edit.php?post_type=member">' . __( "Members", "cteam" ) . '</a> | ';
			$settings_link .= '<a href="edit-tags.php?taxonomy=team&post_type=member">' . __( "Teams", "cteam" ) . '</a>';
			array_unshift( $links, $settings_link );
		}
		
		return $links;
	}

}
add_filter( 'plugin_action_links', 'cteam_settings_link', 10, 2 );