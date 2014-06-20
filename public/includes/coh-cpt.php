<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @package   Location Hero
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
 /**
 * Register 'Location' Custom Post Type.
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.0
 */

	function coh_register_location_posttype() {
		$labels = array(
			'name' 				=> _x( 'Locations', 'post type general name' ),
			'singular_name'		=> _x( 'Location', 'post type singular name' ),
			'add_new' 			=> __( 'Add New Location' ),
			'add_new_item' 		=> __( 'Add New Location' ),
			'edit_item' 		=> __( 'Edit Location' ),
			'new_item' 			=> __( 'New Location' ),
			'view_item' 		=> __( 'View Location' ),
			'search_items' 		=> __( 'Search Locations' ),
			'not_found' 		=> __( 'No Locations found' ),
			'not_found_in_trash'=> __( 'No Locations found in the trash' ),
			'parent_item_colon' => __( '' ),
			'menu_name'			=> __( 'Locations' )
		);
		
		$taxonomies = array();

		$supports = array( 'title','thumbnail' );
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Location'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'exclude_from_search'=> false,
			'show_in_nav_menus'	=> false,
			'capability_type' 	=> 'post',
			'has_archive' 		=> true,
			'hierarchical' 		=> false,
			'rewrite' 			=> array( 'slug' => 'locations', 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 35,
			'menu_icon' 		=> 'dashicons-location-alt',
			'taxonomies'		=> $taxonomies
		 );
		 register_post_type( 'location',$post_type_args );
	}
	add_action( 'init', 'coh_register_location_posttype' );