<?php
/**
 * Recipe Single Template Display Functions
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Location Title
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

function coh_output_single_title() {

	// Variables
	global $post;
	$get_title = get_the_title( $post->ID );

	$title = '<h2 class="location-name" itemprop="name">';
	$title .= $get_title;
	$title .= coh_location_is_open_circle();
	$title .= '</h2>';

	echo $title;

}

/**
 * Location Photo
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 * @todo 	  Add Size for Opening Hours Display
 */


function coh_output_single_photo() {

	// Variables
	global $post;

	$photo = get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'location-photo' ) );

	if ( has_post_thumbnail( $post->ID ) ) {
		echo $photo;
	}

}

/**
 * Location Address
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 * @todo 	  Add Size for Opening Hours Display
 */


function coh_output_single_address() {

	// Variables
	global $post;

	$address = get_post_meta ( $post->ID, '_coh_location_address', true );

	if ( $address ) {
		echo '<div class="location-address">' . $address . '</div>';
	}

}

/**
 * Location Opening Hours
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 * @todo 	  Is a foreach better? Worth doing for the sake of DRY?
 */

function coh_output_opening_hours() {

	echo '<ul class="location-hours">';

	// Variables
	global $post;

	$monday_bool	= get_post_meta ( $post->ID, '_coh_location_mon_open_bool', true );
	$monday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_open_time', true ) ) );
	$monday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_close_time', true ) ) );

	$tuesday_bool	= get_post_meta ( $post->ID, '_coh_location_tues_open_bool', true );
	$tuesday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_open_time', true ) ) );
	$tuesday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_close_time', true ) ) );

	$wednesday_bool	= get_post_meta ( $post->ID, '_coh_location_wed_open_bool', true );
	$wednesday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_open_time', true ) ) );
	$wednesday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_close_time', true ) ) );

	$thursday_bool	= get_post_meta ( $post->ID, '_coh_location_thurs_open_bool', true );
	$thursday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_open_time', true ) ) );
	$thursday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_close_time', true ) ) );

	$friday_bool	= get_post_meta ( $post->ID, '_coh_location_fri_open_bool', true );
	$friday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_open_time', true ) ) );
	$friday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_close_time', true ) ) );

	$saturday_bool	= get_post_meta ( $post->ID, '_coh_location_sat_open_bool', true );
	$saturday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_open_time', true ) ) );
	$saturday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_close_time', true ) ) );

	$sunday_bool	= get_post_meta ( $post->ID, '_coh_location_sun_open_bool', true );
	$sunday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_open_time', true ) ) );
	$sunday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_close_time', true ) ) );

	$closed			= '<span class="hours">Closed</span>';

	// MONDAY
	echo '<li ';
	if ( date( 'l' ) == 'Monday' ) echo 'class="open-today" ';
	if ( $monday_bool ) {
		echo 'itemprop="openingHours" content="Mo ' . date( "H:i", strtotime( $monday_open ) ) . '-' . date( "H:i", strtotime( $monday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Monday</span>';
	if ( $monday_bool ) {
		echo '<span class="hours">' . $monday_open . ' - ' . $monday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';

	// TUESDAY
	echo '<li ';
	if ( date( 'l' ) == 'Tuesday' ) echo 'class="open-today" ';
	if ( $tuesday_bool ) {
		echo 'itemprop="openingHours" content="Tu ' . date( "H:i", strtotime( $tuesday_open ) ) . '-' . date( "H:i", strtotime( $tuesday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Tuesday</span>';
	if ( $tuesday_bool ) {
		echo '<span class="hours">' . $tuesday_open . ' - ' . $tuesday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';

	// WEDNESDAY
	echo '<li ';
	if ( date( 'l' ) == 'Wednesday' ) echo 'class="open-today" ';
	if ( $wednesday_bool ) {
		echo 'itemprop="openingHours" content="We ' . date( "H:i", strtotime( $wednesday_open ) ) . '-' . date( "H:i", strtotime( $wednesday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Wednesday</span>';
	if ( $wednesday_bool ) {
		echo '<span class="hours">' . $wednesday_open . ' - ' . $wednesday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';
	
	// THURSDAY
	echo '<li ';
	if ( date( 'l' ) == 'Thursday' ) echo 'class="open-today" ';
	if ( $thursday_bool ) {
		echo 'itemprop="openingHours" content="Th ' . date( "H:i", strtotime( $thursday_open ) ) . '-' . date( "H:i", strtotime( $thursday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Thursday</span>';
	if ( $thursday_bool ) {
		echo '<span class="hours">' . $thursday_open . ' - ' . $thursday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';
	
	// FRIDAY
	echo '<li ';
	if ( date( 'l' ) == 'Friday' ) echo 'class="open-today" ';
	if ( $friday_bool ) {
		echo 'itemprop="openingHours" content="Fr ' . date( "H:i", strtotime( $friday_open ) ) . '-' . date( "H:i", strtotime( $friday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Friday</span>';
	if ( $friday_bool ) {
		echo '<span class="hours">' . $friday_open . ' - ' . $friday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';
	
	// SATURDAY
	echo '<li ';
	if ( date( 'l' ) == 'Saturday' ) echo 'class="open-today" ';
	if ( $saturday_bool ) {
		echo 'itemprop="openingHours" content="Sa ' . date( "H:i", strtotime( $saturday_open ) ) . '-' . date( "H:i", strtotime( $saturday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Saturday</span>';
	if ( $saturday_bool ) {
		echo '<span class="hours">' . $saturday_open . ' - ' . $saturday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';
	
	// SUNDAY
	echo '<li ';
	if ( date( 'l' ) == 'Sunday' ) echo 'class="open-today" ';
	if ( $sunday_bool ) {
		echo 'itemprop="openingHours" content="Su ' . date( "H:i", strtotime( $sunday_open ) ) . '-' . date( "H:i", strtotime( $sunday_close ) ) . '"';
	} else {
		echo ' id="closed-location" ';
	}
	echo '>';
	echo '<span class="day">Sunday</span>';
	if ( $sunday_bool ) {
		echo '<span class="hours">' . $sunday_open . ' - ' . $sunday_close . '</span>';
	} else {
		echo $closed;
	}
	echo coh_location_is_open_circle();
	echo '</li>';
	
	echo '</ul>';

}

/**
 * We're Open / Closed Image
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.2
 */

function coh_output_we_are_open() {

	if ( coh_location_is_open() ) {

		if ( cmb_get_option( 'coh_options', '_coh_open_image' ) ) {
		
			echo '<img class="we-open-image" title="' . __( 'We Are Open!', 'coh' ) . '" src="' . cmb_get_option( 'coh_options', '_coh_open_image' ) . '" />';

		} elseif ( cmb_get_option( 'coh_options',  '_coh_open_text' ) ) {

			echo '<div class="we-open-text">' . cmb_get_option( 'coh_options',  '_coh_open_text' ) . '</div>';

		} else {

			echo '<div class="we-open-text">' . __( 'We Are Open!', 'coh' ) . '</div>';

		}

	} else {

		if ( cmb_get_option( 'coh_options', '_coh_closed_image' ) ) {
		
			echo '<img class="we-closed-image" title="' . __( 'We Are Closed!', 'coh' ) . '" src="' . cmb_get_option( 'coh_options', '_coh_closed_image' ) . '" />';

		} elseif ( cmb_get_option( 'coh_options',  '_coh_closed_text' ) ) {

			echo '<div class="we-closed-text">' . cmb_get_option( 'coh_options',  '_coh_closed_text' ) . '</div>';

		} else {

			echo '<div class="we-closed-text">' . __( 'We Are Closed!', 'coh' ) . '</div>';

		}
	}

}

/**
 * Manual Available / Not Available Image
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1
 */

function coh_ouput_manual_available_image() {

	if ( cmb_get_option( 'coh_options', '_coh_manual_available_image' ) ) {
		
		echo '<img class="manual-open-image" title="' . __( 'We Are Available!', 'coh' ) . '" src="' . cmb_get_option( 'coh_options', '_coh_available_image' ) . '" />';

	} else {
		
		echo '<img class="manual-closed-image" title="' . __( 'We Are Not Available!', 'coh' ) . '" src="' . cmb_get_option( 'coh_options', '_coh_not_available_image' ) . '" />';

	}

}

/**
 * Location Special Dates / Holidays
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1
 */

function coh_output_special_dates() {

	// Variables
	global $post;
	$special_dates = get_post_meta( $post->ID, '_coh_custom_date_group', true );

	if ( $special_dates ) {

		// Variables
		$get_title = get_the_title( $post->ID );

		$title = '<h2 class="location-name" itemprop="name">';
		$title .= $get_title;
		$title .= coh_location_is_open_circle();
		$title .= '</h2>';

		echo $title;

		foreach ( (array) $special_dates as $key => $special_date ) {

			$sd_desc = $sd_date = $sd_open_bool = $sd_open_time = $sd_close_time = '';

				    if ( isset( $special_date['date_desc'] ) ) {
				        $sd_desc = $special_date['date_desc'];
				    }

				    if ( isset( $special_date['date_date'] ) ) {
				        $sd_date = date ( 'F jS', strtotime ( $special_date['date_date'] ) );
				    }

				    if ( isset( $special_date['date_open_bool'] ) ) {
				        $sd_open_bool = $special_date['date_open_bool'];
				    }

				    if ( isset( $special_date['date_opening_time'] ) ) {
				        $sd_open_time = $special_date['date_opening_time'];
				    }

				    if ( isset( $special_date['date_closing_time'] ) ) {
				        $sd_close_time = $special_date['date_closing_time'];
				    }

				    ?>


				    <div class="date-head">
				    	<?php if ( $sd_desc ) { ?>
					    	<span class="date-desc"><?php echo $sd_desc; ?> - </span>
					    <?php } ?>
					    <span class="date-date"><?php echo $sd_date; ?></span>
					</div>

					<div class="date-time">
					<?php
					    if ( $sd_open_bool ) {
					    	echo date( "g:i A", strtotime ( $sd_open_time ) );
					    	echo ' - ';
					    	echo date( "g:i A", strtotime ( $sd_close_time ) );
					    } else {
					    	echo '<span class="closed">';
					    	echo __( 'Closed', 'coh' );
					    	echo '</span>';
					    }
					?>
					</div>

		<?php
		}

	}
	

	/*$monday_bool	= get_post_meta ( $post->ID, '_coh_location_mon_open_bool', true );
	$monday_open	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_open_time', true ) ) );
	$monday_close	= date( "g:i A", strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_close_time', true ) ) );*/

}