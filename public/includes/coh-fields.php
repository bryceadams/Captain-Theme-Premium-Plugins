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
		'title'      => __( 'Location Details', 'cmb' ),
		'pages'      => array( 'coh_location', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			// Add Store Type select?
			array(
				'name' => __( 'Address', 'cmb' ),
				'desc' => __( 'Where is this location located? You should format the address properly.', 'cmb' ),
				'id'   => $prefix . 'location_address',
				'type' => 'text'
			),
			array(
				'name' => __( 'Location Timezone', 'cmb' ),
				'desc' => __( 'What is the timezone for this location? It can be different to other locations and your website\'s current location.', 'cmb' ),
				'id'   => $prefix . 'location_timezone',
				'type' => 'select_timezone',
			),
			array(
				'name' => __( 'Monday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Monday?', 'cmb' ),
				'id'   => $prefix . 'location_mon_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Monday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Monday?', 'cmb' ),
				'id'   => $prefix . 'location_mon_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Monday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Monday?', 'cmb' ),
				'id'   => $prefix . 'location_mon_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Tuesday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Tuesday?', 'cmb' ),
				'id'   => $prefix . 'location_tues_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Tuesday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Tuesday?', 'cmb' ),
				'id'   => $prefix . 'location_tues_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Tuesday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Tuesday?', 'cmb' ),
				'id'   => $prefix . 'location_tues_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Wednesday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Wednesday?', 'cmb' ),
				'id'   => $prefix . 'location_wed_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Wednesday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Wednesday?', 'cmb' ),
				'id'   => $prefix . 'location_wed_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Wednesday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Wednesday?', 'cmb' ),
				'id'   => $prefix . 'location_wed_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Thursday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Thursday?', 'cmb' ),
				'id'   => $prefix . 'location_thurs_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Thursday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Thursday?', 'cmb' ),
				'id'   => $prefix . 'location_thurs_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Thursday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Thursday?', 'cmb' ),
				'id'   => $prefix . 'location_thurs_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Friday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Friday?', 'cmb' ),
				'id'   => $prefix . 'location_fri_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Friday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Friday?', 'cmb' ),
				'id'   => $prefix . 'location_fri_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Friday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Friday?', 'cmb' ),
				'id'   => $prefix . 'location_fri_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Saturday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Saturday?', 'cmb' ),
				'id'   => $prefix . 'location_sat_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Saturday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Saturday?', 'cmb' ),
				'id'   => $prefix . 'location_sat_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Saturday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Saturday?', 'cmb' ),
				'id'   => $prefix . 'location_sat_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Sunday Open', 'cmb' ),
				'desc' => __( 'Is this location open on a Sunday?', 'cmb' ),
				'id'   => $prefix . 'location_sun_open_bool',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Sunday Opening Time', 'cmb' ),
				'desc' => __( 'What time does this store open on a Sunday?', 'cmb' ),
				'id'   => $prefix . 'location_sun_open_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
			array(
				'name' => __( 'Sunday Closing Time', 'cmb' ),
				'desc' => __( 'What time does this store close on a Sunday?', 'cmb' ),
				'id'   => $prefix . 'location_sun_close_time',
				'type' => 'text_time',
				'timezone_meta_key' => $prefix . 'location_timezone',
				//'show_on_cb' => 'location_mon_open_bool'
			),
		),
	);

	/**
	 * Special Dates / Holidays
	 */
	$meta_boxes['location_special_dates'] = array(
		'id'         => 'special_dates_container',
		'title'      => __( 'Special Dates / Holidays', 'cmb' ),
		'pages'      => array( 'coh_location', ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'custom_date_group',
				'type'        => 'group',
				'description' => __( 'Special Dates that will appear in the Special Dates Widget & Shortcode', 'cmb' ),
				'options'     => array(
					'group_title'   => __( 'Special Date #{#}', 'cmb' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Special Date', 'cmb' ),
					'remove_button' => __( 'Remove Special Date', 'cmb' ),
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
						'name' => __( 'Date', 'cmb' ),
						'desc' => __( 'The date for this special date - the year does not matter.', 'cmb' ),
						'id'   => 'date_date',
						'type' => 'text_date',
					),
					array(
						'name' => __( 'Date Open?', 'cmb' ),
						'desc' => __( 'Are you open at this location on this special date? If closed, do not check this option.', 'cmb' ),
						'id'   => 'date_open_bool',
						'type' => 'checkbox',
					),
					array(
						'name' => __( 'Opening Time', 'cmb' ),
						'desc' => __( 'The opening time for this special date - ignore if you are closed on this date', 'cmb' ),
						'id'   => 'date_opening_time',
						'type' => 'text_time',
					),
					array(
						'name' => __( 'Closing Time', 'cmb' ),
						'desc' => __( 'The closing time for this special date - ignore if you are closed on this date', 'cmb' ),
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
