<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Hide Closed Dates if Option Chosen
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.2
 */

add_action( 'wp_head', 'coh_hide_closed_days' );
function coh_hide_closed_days() {

	if ( cmb_get_option( 'coh_options', '_coh_hide_closed_days' ) ) { ?>

		<style type="text/css">
			.locations-display .locations-single ul.location-hours li#closed-location {
				display: none;
			}
		</style>

	<?php }

}