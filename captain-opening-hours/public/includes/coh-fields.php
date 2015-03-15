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

add_filter( 'cmb_meta_boxes', 'coh_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @param  	  array $meta_boxes
 * @return 	  array
 */
function coh_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_coh_';


	/**
	 * Location Details & Opening Hours
	 */
	$meta_boxes['location_details'] = array(
		'id'         => 'details_container',
		'title'      => __( 'Location Details', 'coh' ),
		'pages'      => array( 'coh_location', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			// Add Store Type select?
			array(
				'name' => __( 'Street Address', 'coh' ),
				'desc' => __( 'The street address.', 'coh' ),
				'id'   => $prefix . 'location_address',
				'type' => 'text'
			),
			array(
				'name' => __( 'Suburb / Area', 'coh' ),
				'desc' => __( 'The suburb / area of the address.', 'coh' ),
				'id'   => $prefix . 'location_address_suburb',
				'type' => 'text'
			),
			array(
				'name' => __( 'Region / State', 'coh' ),
				'desc' => __( 'The region / state of the address (eg. CA).', 'coh' ),
				'id'   => $prefix . 'location_address_region',
				'type' => 'text'
			),
			array(
				'name' => __( 'Postal Code / Zip Code', 'coh' ),
				'desc' => __( 'The post code or ZIP code of the address.', 'coh' ),
				'id'   => $prefix . 'location_address_code',
				'type' => 'text'
			),
			array(
				'name' => __( 'Country', 'coh' ),
				'desc' => __( 'The country of the address. <a href="http://www.wikiwand.com/en/ISO_3166-1">It\'s best to use 2-letter ISO code</a>.', 'coh' ),
				'id'   => $prefix . 'location_address_country',
				'type' => 'text'
			),
			array(
				'name' => __( 'Location Timezone', 'coh' ),
				'desc' => __( 'What is the timezone for this location? It can be different to other locations and your website\'s current location.', 'coh' ),
				'id'   => $prefix . 'location_timezone',
				'type' => 'select_timezone',
			),
			array(
				'name' => __( 'Monday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Monday?', 'coh' ),
				'id'   => $prefix . 'location_mon_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Monday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Monday?', 'coh' ),
				'id'   => $prefix . 'location_mon_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Monday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Monday?', 'coh' ),
				'id'   => $prefix . 'location_mon_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_mon_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Monday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Monday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_mon_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Monday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Monday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_mon_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Tuesday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Tuesday?', 'coh' ),
				'id'   => $prefix . 'location_tues_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Tuesday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Tuesday?', 'coh' ),
				'id'   => $prefix . 'location_tues_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Tuesday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Tuesday?', 'coh' ),
				'id'   => $prefix . 'location_tues_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_tues_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Tuesday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Tuesday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_tues_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Tuesday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Tuesday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_tues_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Wednesday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Wednesday?', 'coh' ),
				'id'   => $prefix . 'location_wed_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Wednesday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Wednesday?', 'coh' ),
				'id'   => $prefix . 'location_wed_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Wednesday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Wednesday?', 'coh' ),
				'id'   => $prefix . 'location_wed_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_wed_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Wednesday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Wednesday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_wed_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Wednesday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Wednesday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_wed_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Thursday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Thursday?', 'coh' ),
				'id'   => $prefix . 'location_thurs_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Thursday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Thursday?', 'coh' ),
				'id'   => $prefix . 'location_thurs_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Thursday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Thursday?', 'coh' ),
				'id'   => $prefix . 'location_thurs_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_thurs_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Thursday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Thursday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_thurs_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Thursday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Thursday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_thurs_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Friday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Friday?', 'coh' ),
				'id'   => $prefix . 'location_fri_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Friday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Friday?', 'coh' ),
				'id'   => $prefix . 'location_fri_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Friday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Friday?', 'coh' ),
				'id'   => $prefix . 'location_fri_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_fri_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Friday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Friday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_fri_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Friday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Friday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_fri_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Saturday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Saturday?', 'coh' ),
				'id'   => $prefix . 'location_sat_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Saturday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Saturday?', 'coh' ),
				'id'   => $prefix . 'location_sat_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Saturday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Saturday?', 'coh' ),
				'id'   => $prefix . 'location_sat_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_sat_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Saturday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Saturday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_sat_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Saturday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Saturday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_sat_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Sunday Open', 'coh' ),
				'desc' => __( 'Is this location open on a Sunday?', 'coh' ),
				'id'   => $prefix . 'location_sun_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Sunday Opening Time', 'coh' ),
				'desc' => __( 'What time does this store open on a Sunday?', 'coh' ),
				'id'   => $prefix . 'location_sun_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Sunday Closing Time', 'coh' ),
				'desc' => __( 'What time does this store close on a Sunday?', 'coh' ),
				'id'   => $prefix . 'location_sun_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Split Hours?', 'coh' ),
				'desc' => __( 'Does this day have split hours? (Close and reopen the same day)', 'coh' ),
				'id'   => $prefix . 'location_sun_split_hours_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Sunday Opening Time #2', 'coh' ),
				'desc' => __( 'What time does this store open on a Sunday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_sun_open_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
			array(
				'name' => __( 'Sunday Closing Time #2', 'coh' ),
				'desc' => __( 'What time does this store close on a Sunday?', 'coh' ) . ' ' . __( '(For the 2nd time)', 'coh' ),
				'id'   => $prefix . 'location_sun_close_time_2',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
			),
		),
	);

	/**
	 * Special Dates / Holidays
	 */
	$meta_boxes['location_special_dates'] = array(
		'id'         => 'special_dates_container',
		'title'      => __( 'Special Dates / Holidays', 'coh' ),
		'pages'      => array( 'coh_location', ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'custom_date_group',
				'type'        => 'group',
				'description' => __( 'Special Dates that will appear in the Special Dates Widget & Shortcode', 'coh' ),
				'options'     => array(
					'group_title'   => __( 'Special Date #{#}', 'coh' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Special Date', 'coh' ),
					'remove_button' => __( 'Remove Special Date', 'coh' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Date Name / Description',
						'desc' => 'Eg. Christmas, Staff Holiday, etc.',
						'id'   => 'date_desc',
						'type' => 'text_medium',
					),
					array(
						'name' => __( 'Date', 'coh' ),
						'desc' => __( 'The date for this special date - the year does not matter.', 'coh' ),
						'id'   => 'date_date',
						'type' => 'text_date',
					),
					array(
						'name' => __( 'Date Open?', 'coh' ),
						'desc' => __( 'Are you open at this location on this special date? If closed, do not check this option.', 'coh' ),
						'id'   => 'date_open_bool',
						'type' => 'checkbox',
					),
					array(
						'name' => __( 'Opening Time', 'coh' ),
						'desc' => __( 'The opening time for this special date - ignore if you are closed on this date', 'coh' ),
						'id'   => 'date_opening_time',
						'type' => 'text_time',
					),
					array(
						'name' => __( 'Closing Time', 'coh' ),
						'desc' => __( 'The closing time for this special date - ignore if you are closed on this date', 'coh' ),
						'id'   => 'date_closing_time',
						'type' => 'text_time',
					),
				),
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'coh_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function coh_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'fields/init.php';

}
