<?php
/**
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 /**
 * Display Output Structure for We're Open Widget
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

function coh_widget_display_we_open( $location_id ) {

	$args = array(
		'post_type' => 'location',
		'p'			=> $location_id,
		);



	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {


		echo '<div class="locations-display we-open-widget-display">';

		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			
			echo '<div class="locations-single we-open-single">';
			if ( $location_id == 'all' ) {
				echo coh_output_single_title();
			}
			do_action( 'coh_widget_we_open_content' );
			echo '</div>';
		}

		echo '</div>';

	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

}


 /**
 * Display Output Structure for Info & Opening Hours Widget
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

function coh_widget_display_hours( $location_id ) {

	$args = array(
		'post_type' => 'location',
		'p'			=> $location_id,
		);

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {


		echo '<div class="locations-display hours-widget-display">';

		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			
			echo '<div class="locations-single" itemscope itemtype="http://schema.org/LocalBusiness">';
			
			do_action( 'coh_main_content' );

			echo '</div>';
		}

		echo '</div>';

	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

}

?>