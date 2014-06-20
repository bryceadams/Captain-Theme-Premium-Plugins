<?php
/**
 * Shortcodes
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Shortcode for General Info & Opening Hours
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

function coh_shortcode_display( $atts ) {

     // Attributes
	extract( shortcode_atts(
		array(
			'location_id' => 'all', // all (default) or a location's ID
		), $atts )
	);
	
	ob_start();
	coh_widget_display_hours( $location_id );
	$data = ob_get_clean();
	return $data;

}
add_shortcode( 'opening_hours', 'coh_shortcode_display' );


/**
 * Shortcode for 'We're Open / Closed' Image Display
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

function coh_shortcode_display_we_open( $atts ) {

     // Attributes
	extract( shortcode_atts(
		array(
			'location_id' => 'all', // all (default) or a location's ID
		), $atts )
	);
	
	ob_start();
	coh_widget_display_we_open( $location_id );
	$data = ob_get_clean();
	return $data;

}
add_shortcode( 'we_open', 'coh_shortcode_display_we_open' );