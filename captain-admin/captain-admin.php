<?php
/**
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 *
 * Plugin Name: Captain Admin
 * Plugin URI: http://captaintheme.com/plugins/captain-admin/
 * Description: Captain Admin will make your Wordpress admin work for you, not against you.
 * Author: Captain Theme
 * Version: 1.4.5
 * Author URI: http://captaintheme.com
 * License: GNU GPL Version 2.0 +
*/

/**
 * Include Needed Library Files
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

include_once( 'lib/advanced-custom-fields/acf.php' );
include_once( 'lib/acf-options-page/acf-options-page.php' );
include_once( 'lib/advanced-custom-fields-code-area-field/acf-code_area.php' );

// Include Extra Admin Color Schemes
include_once( 'lib/admin-color-schemes/admin-color-schemes.php' );

/**
 * Include Custom Styles
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_admin_style() {
	wp_enqueue_style( 'admin-styles', plugins_url( 'css/admin-styles.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'cadmin_admin_style' );
add_action( 'login_enqueue_scripts', 'cadmin_admin_style' );

/**
 * Include Options Files
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

include_once( 'includes/options-page.php' );
include_once( 'includes/options-styles.php' );
include_once( 'includes/options-functions.php' );

/**
 * Include Widget Files
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

include_once( 'includes/widgets/widget-class.php' );

/**
 * Include / Exclude Advanced Custom Fields Plugin
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

if ( get_field( 'show_acf_plugin', 'option' ) ) {
} else {
	if ( ! defined( 'ACF_LITE' ) ) {
		define( 'ACF_LITE', true );
	}
}