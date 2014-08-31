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
 * @since 	  1.4.0
 */

function coh_output_opening_hours() {

	echo '<ul class="location-hours">';

	// Variables
	global $post;

	if ( cmb_get_option( 'coh_options', '_coh_twelve_twentyfour_time' ) == 'twelve' ) {
		$time_format = 'g:i A';
	} elseif ( cmb_get_option( 'coh_options', '_coh_twelve_twentyfour_time' ) == 'twentyfour' ) {
		$time_format = 'H:i';
	} else {
		$time_format = 'G:i';
	}

	$monday_bool	= get_post_meta ( $post->ID, '_coh_location_mon_open_bool', true );
	$monday_open	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_open_time', true ) ) );
	$monday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_close_time', true ) ) );
	$monday_split_bool = get_post_meta( $post->ID, '_coh_location_mon_split_hours_bool', true );
	$monday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_open_time_2', true ) ) );
	$monday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_close_time_2', true ) ) );

	$tuesday_bool	= get_post_meta ( $post->ID, '_coh_location_tues_open_bool', true );
	$tuesday_open	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_open_time', true ) ) );
	$tuesday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_close_time', true ) ) );
	$tuesday_split_bool = get_post_meta( $post->ID, '_coh_location_tues_split_hours_bool', true );
	$tuesday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_open_time_2', true ) ) );
	$tuesday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_close_time_2', true ) ) );

	$wednesday_bool		= get_post_meta ( $post->ID, '_coh_location_wed_open_bool', true );
	$wednesday_open		= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_open_time', true ) ) );
	$wednesday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_close_time', true ) ) );
	$wednesday_split_bool = get_post_meta( $post->ID, '_coh_location_wed_split_hours_bool', true );
	$wednesday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_open_time_2', true ) ) );
	$wednesday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_close_time_2', true ) ) );

	$thursday_bool	= get_post_meta ( $post->ID, '_coh_location_thurs_open_bool', true );
	$thursday_open	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_open_time', true ) ) );
	$thursday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_close_time', true ) ) );
	$thursday_split_bool = get_post_meta( $post->ID, '_coh_location_thurs_split_hours_bool', true );
	$thursday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_open_time_2', true ) ) );
	$thursday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_close_time_2', true ) ) );

	$friday_bool	= get_post_meta ( $post->ID, '_coh_location_fri_open_bool', true );
	$friday_open	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_open_time', true ) ) );
	$friday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_close_time', true ) ) );
	$friday_split_bool = get_post_meta( $post->ID, '_coh_location_fri_split_hours_bool', true );
	$friday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_open_time_2', true ) ) );
	$friday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_close_time_2', true ) ) );

	$saturday_bool	= get_post_meta ( $post->ID, '_coh_location_sat_open_bool', true );
	$saturday_open	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_open_time', true ) ) );
	$saturday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_close_time', true ) ) );
	$saturday_split_bool = get_post_meta( $post->ID, '_coh_location_sat_split_hours_bool', true );
	$saturday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_open_time_2', true ) ) );
	$saturday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_close_time_2', true ) ) );

	$sunday_bool	= get_post_meta ( $post->ID, '_coh_location_sun_open_bool', true );
	$sunday_open	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_open_time', true ) ) );
	$sunday_close	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_close_time', true ) ) );
	$sunday_split_bool = get_post_meta( $post->ID, '_coh_location_sun_split_hours_bool', true );
	$sunday_open2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_open_time_2', true ) ) );
	$sunday_close2	= date( $time_format, strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_close_time_2', true ) ) );

	$closed			= '<span class="hours">' . __( 'Closed', 'coh' ) . '</span>';

	$days = array(

							'monday' 		=> array(
																'day'			=> __( 'Monday', 'coh' ),
																'bool' 		=> $monday_bool,
																'open' 		=> $monday_open,
																'close' 	=> $monday_close,
																'split'		=> $monday_split_bool,
																'open2'		=> $monday_open2,
																'close2'	=> $monday_close2,
																'schema' 	=> 'Mo',
														),
							'tuesday' 		=> array(
																'day'			=> __( 'Tuesday', 'coh' ),
																'bool' 		=> $tuesday_bool,
																'open' 		=> $tuesday_open,
																'close' 	=> $tuesday_close,
																'split'		=> $tuesday_split_bool,
																'open2'		=> $tuesday_open2,
																'close2'	=> $tuesday_close2,
																'schema' 	=> 'Tu',
														),
							'wednesday' 		=> array(
																'day'			=> __( 'Wednesday', 'coh' ),
																'bool' 		=> $wednesday_bool,
																'open' 		=> $wednesday_open,
																'close' 	=> $wednesday_close,
																'split'		=> $wednesday_split_bool,
																'open2'		=> $wednesday_open2,
																'close2'	=> $wednesday_close2,
																'schema' 	=> 'We',
														),
							'thursday' 		=> array(
																'day'			=> __( 'Thursday', 'coh' ),
																'bool' 		=> $thursday_bool,
																'open' 		=> $thursday_open,
																'close' 	=> $thursday_close,
																'split'		=> $thursday_split_bool,
																'open2'		=> $thursday_open2,
																'close2'	=> $thursday_close2,
																'schema' 	=> 'Th',
														),
							'friday' 		=> array(
																'day'			=> __( 'Friday', 'coh' ),
																'bool' 		=> $friday_bool,
																'open' 		=> $friday_open,
																'close' 	=> $friday_close,
																'split'		=> $friday_split_bool,
																'open2'		=> $friday_open2,
																'close2'	=> $friday_close2,
																'schema' 	=> 'Fr',
														),
							'saturday' 		=> array(
																'day'			=> __( 'Saturday', 'coh' ),
																'bool' 		=> $saturday_bool,
																'open' 		=> $saturday_open,
																'close' 	=> $saturday_close,
																'split'		=> $saturday_split_bool,
																'open2'		=> $saturday_open2,
																'close2'	=> $saturday_close2,
																'schema' 	=> 'Sa',
														),
							'sunday' 		=> array(
																'day'			=> __( 'Sunday', 'coh' ),
																'bool' 		=> $sunday_bool,
																'open' 		=> $sunday_open,
																'close' 	=> $sunday_close,
																'split'		=> $sunday_split_bool,
																'open2'		=> $sunday_open2,
																'close2'	=> $sunday_close2,
																'schema' 	=> 'Su',
														),

	);

	foreach ( $days as $key => $day ) {

		if ( $day['split'] ) {
			$schema_content = $day['schema'] . ' ' . date( "H:i", strtotime( $day['open'] ) ) . '-' . date( "H:i", strtotime( $day['close2'] ) );
		} else {
			$schema_content = $day['schema'] . ' ' . date( "H:i", strtotime( $day['open'] ) ) . '-' . date( "H:i", strtotime( $day['close'] ) );
		}

		echo '<li ';
			if ( strtolower( date( 'l' ) ) == $key ) {
				echo 'class="open-today" ';
			}
			if ( $day['bool'] ) {
				echo 'itemprop="openingHours" content="' . $schema_content . '"';
			} else {
				echo ' id="closed-location" ';
			}
		echo '>';

			echo '<span class="day">';
				echo $day['day'];
				echo coh_location_is_open_circle();
			echo '</span>';

			if ( $day['bool'] ) {
				echo '<span class="hours">' . $day['open'] . ' - ' . $day['close'] . '</span>';
				if ( $day['split'] ) {
					echo '<span class="hours split">' . $day['open2'] . ' - ' . $day['close2'] . '</span>';
				}
			} else {
				echo $closed;
			}

		echo '</li>';

	}

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
 * @since 	  1.3.0
 */

function coh_ouput_manual_available_image() {

	if ( cmb_get_option( 'coh_options', '_coh_manual_available_image' ) ) {

		if ( cmb_get_option( 'coh_options', '_coh_available_image' ) ) {

			echo '<img class="manual-open-image" title="' . __( 'We Are Available!', 'coh' ) . '" src="' . cmb_get_option( 'coh_options', '_coh_available_image' ) . '" />';

		} elseif ( cmb_get_option( 'coh_options', '_coh_man_available_text' ) ) {

			echo cmb_get_option( 'coh_options', '_coh_man_available_text' );

		} else {

			_e( 'We Are Available!', 'coh' );

		}

	} else {

		if ( cmb_get_option( 'coh_options', '_coh_not_available_image' ) ) {

			echo '<img class="manual-closed-image" title="' . __( 'We Are Not Available!', 'coh' ) . '" src="' . cmb_get_option( 'coh_options', '_coh_not_available_image' ) . '" />';

		} elseif ( cmb_get_option( 'coh_options', '_coh_man_not_available_text' ) ) {

			echo cmb_get_option( 'coh_options', '_coh_man_not_available_text' );

		} else {

			_e( 'We Are Not Available!', 'coh' );

		}

	}

}

/**
 * Location Special Dates / Holidays
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.3.1
 */

function coh_output_special_dates() {

	// Variables
	global $post;
	$special_dates = get_post_meta( $post->ID, '_coh_custom_date_group', true );

	if ( cmb_get_option( 'coh_options', '_coh_twelve_twentyfour_time' ) == 'twelve' ) {
		$time_format = 'g:i A';
	} elseif ( cmb_get_option( 'coh_options', '_coh_twelve_twentyfour_time' ) == 'twentyfour' ) {
		$time_format = 'H:i';
	} else {
		$time_format = 'G:i';
	}

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
				        $sd_date = date_i18n( get_option('date_format'), strtotime ( $special_date['date_date'] ) );
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
					    	echo date( $time_format, strtotime ( $sd_open_time ) );
					    	echo ' - ';
					    	echo date( $time_format, strtotime ( $sd_close_time ) );
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

}
