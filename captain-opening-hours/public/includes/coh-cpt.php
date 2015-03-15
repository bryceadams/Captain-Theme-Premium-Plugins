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
 * @since 	  1.3.1
 */

	function coh_register_location_posttype() {
		$labels = array(
			'name' 				=> __( 'Locations', 'coh' ),
			'singular_name'		=> __( 'Location', 'coh' ),
			'add_new' 			=> __( 'Add New Location', 'coh' ),
			'add_new_item' 		=> __( 'Add New Location', 'coh' ),
			'edit_item' 		=> __( 'Edit Location', 'coh' ),
			'new_item' 			=> __( 'New Location', 'coh' ),
			'view_item' 		=> __( 'View Location', 'coh' ),
			'search_items' 		=> __( 'Search Locations', 'coh' ),
			'not_found' 		=> __( 'No Locations found', 'coh' ),
			'not_found_in_trash'=> __( 'No Locations found in the trash', 'coh' ),
			'parent_item_colon' => __( '' ),
			'menu_name'			=> __( 'Locations', 'coh' )
		);
		
		$taxonomies = array();

		$supports = array( 'title','thumbnail' );
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Location', 'coh'),
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
		 register_post_type( 'coh_location',$post_type_args );
	}
	add_action( 'init', 'coh_register_location_posttype' );