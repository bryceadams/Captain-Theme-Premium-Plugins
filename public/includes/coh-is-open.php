<?php
/**
 * Function to check if the current location is open
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Function check if lcoation is open or not (will return bool)
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.0
 */

function coh_location_is_open() {

	// Variables
	global $post;

	$timezone_pre = get_post_meta( $post->ID, '_coh_location_timezone', true );

	if ( strpos( $timezone_pre, 'UTC' ) !== false ) {

		$timezone_offset = preg_replace( "/[^0-9,.]/", "", $timezone_pre );
		$timezone = timezone_name_from_abbr( null, $timezone_offset * 3600, true );
		if ( $timezone === false ) $timezone = timezone_name_from_abbr( null, $timezone_offset * 3600, false );

	} else {

		$timezone = $timezone_pre;

	}

	date_default_timezone_set( $timezone );

	$current_day = strtolower( date( 'l' ) );
	$current_date = date( 'm.d.Y' );
	$now = time();

	$monday_bool	= get_post_meta ( $post->ID, '_coh_location_mon_open_bool', true );
	$monday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_open_time', true ) );
	$monday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_close_time', true ) );
	$monday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_open_time_2', true ) );
	$monday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_mon_close_time_2', true ) );

	$tuesday_bool	= get_post_meta ( $post->ID, '_coh_location_tues_open_bool', true );
	$tuesday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_open_time', true ) );
	$tuesday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_close_time', true ) );
	$tuesday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_open_time_2', true ) );
	$tuesday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_tues_close_time_2', true ) );

	$wednesday_bool	= get_post_meta ( $post->ID, '_coh_location_wed_open_bool', true );
	$wednesday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_open_time', true ) );
	$wednesday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_close_time', true ) );
	$wednesday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_open_time_2', true ) );
	$wednesday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_wed_close_time_2', true ) );

	$thursday_bool	= get_post_meta ( $post->ID, '_coh_location_thurs_open_bool', true );
	$thursday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_open_time', true ) );
	$thursday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_close_time', true ) );
	$thursday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_open_time_2', true ) );
	$thursday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_thurs_close_time_2', true ) );

	$friday_bool	= get_post_meta ( $post->ID, '_coh_location_fri_open_bool', true );
	$friday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_open_time', true ) );
	$friday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_close_time', true ) );
	$friday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_open_time_2', true ) );
	$friday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_fri_close_time_2', true ) );

	$saturday_bool	= get_post_meta ( $post->ID, '_coh_location_sat_open_bool', true );
	$saturday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_open_time', true ) );
	$saturday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_close_time', true ) );
	$saturday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_open_time_2', true ) );
	$saturday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sat_close_time_2', true ) );

	$sunday_bool	= get_post_meta ( $post->ID, '_coh_location_sun_open_bool', true );
	$sunday_open	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_open_time', true ) );
	$sunday_close	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_close_time', true ) );
	$sunday_open2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_open_time_2', true ) );
	$sunday_close2	= strtotime ( get_post_meta ( $post->ID, '_coh_location_sun_close_time_2', true ) );

	if ( ( $current_day == 'monday' ) && ( $monday_bool ) ) {
        if ( ( $monday_open <= $now ) && ( $now <= $monday_close ) ) {
            return true;
        } elseif ( ( $monday_open2 <= $now ) && ( $now <= $monday_close2 ) ) {
						return true;
				}
    }

    if ( ( $current_day == 'tuesday' ) && ( $tuesday_bool ) ) {
        if ( ( $tuesday_open <= $now ) && ( $now <= $tuesday_close ) ) {
            return true;
        } elseif ( ( $tuesday_open2 <= $now ) && ( $now <= $tuesday_close2 ) ) {
						return true;
				}
    }

    if ( ( $current_day == 'wednesday' ) && ( $wednesday_bool ) ) {
        if ( ( $wednesday_open <= $now ) && ( $now <= $wednesday_close ) ) {
            return true;
        } elseif ( ( $wednesday_open2 <= $now ) && ( $now <= $wednesday_close2 ) ) {
						return true;
				}
    }

    if ( ( $current_day == 'thursday' ) && ( $thursday_bool ) ) {
        if ( ( $thursday_open <= $now ) && ( $now <= $thursday_close ) ) {
            return true;
        } elseif ( ( $thursday_open2 <= $now ) && ( $now <= $thursday_close2 ) ) {
						return true;
				}
    }

    if ( ( $current_day == 'friday' ) && ( $friday_bool ) ) {
        if ( ( $friday_open <= $now ) && ( $now <= $friday_close ) ) {
            return true;
        } elseif ( ( $friday_open2 <= $now ) && ( $now <= $friday_close2 ) ) {
						return true;
				}
    }

    if ( ( $current_day == 'saturday' ) && ( $saturday_bool ) ) {
        if ( ( $saturday_open <= $now ) && ( $now <= $saturday_close ) ) {
            return true;
        } elseif ( ( $saturday_open2 <= $now ) && ( $now <= $saturday_close2 ) ) {
						return true;
				}
    }

    if ( ( $current_day == 'sunday' ) && ( $sunday_bool ) ) {
        if ( ( $sunday_open <= $now ) && ( $now <= $sunday_close ) ) {
            return true;
        } elseif ( ( $sunday_open2 <= $now ) && ( $now <= $sunday_close2 ) ) {
						return true;
				}
    }

}

/**
 * Will Output Green / Red Circle for Open / Close (if not turned off in options)
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

function coh_location_is_open_circle() {

	if ( coh_location_is_open() ) {
		$open = '<span class="coh-circle open"></span>';
	} else {
		$open = '<span class="coh-circle close"></span>';
	}

	if ( cmb_get_option( 'coh_options', '_coh_open_close_light' ) ) {
		return null;
	} else {
		return $open;
	}

}
