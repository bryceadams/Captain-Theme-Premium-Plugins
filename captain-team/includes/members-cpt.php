<?php
/**
 * @package   Captain Team
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

/**
 * Register Member Post Type
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'register_member_posttype' ) ) {

	function register_member_posttype() {
		$labels = array(
			'name' 				=> _x( 'Members', 'post type general name' ),
			'singular_name'		=> _x( 'Member', 'post type singular name' ),
			'add_new' 			=> __( 'Add New Team Member' ),
			'add_new_item' 		=> __( 'Add New Member' ),
			'edit_item' 		=> __( 'Edit Member' ),
			'new_item' 			=> __( 'New Member' ),
			'view_item' 		=> __( 'View Member' ),
			'search_items' 		=> __( 'Search Members' ),
			'not_found' 		=> __( 'No Members found' ),
			'not_found_in_trash'=> __( 'No Members found in the trash' ),
			'parent_item_colon' => __( '' ),
			'menu_name'			=> __( 'Captain Team' )
		);
		
		$taxonomies = array();

		$supports = array('title','editor','thumbnail','excerpt','revisions','page-attributes');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Member'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'exclude_from_search'=> true,
			'show_in_nav_menus'	=> false,
			'capability_type' 	=> 'post',
			'has_archive' 		=> true,
			'hierarchical' 		=> true,
			'rewrite' 			=> array('slug' => 'member', 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 30,
			'menu_icon' 		=> 'dashicons-id',
			'taxonomies'		=> $taxonomies
		 );
		 register_post_type('member',$post_type_args);
	}

}
add_action('init', 'register_member_posttype');


/**
 * Register Team Taxonomy
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'register_team_tax' ) ) {

	function register_team_tax() {
		$labels = array(
			'name' 					=> _x( 'Teams', 'taxonomy general name' ),
			'singular_name' 		=> _x( 'Team', 'taxonomy singular name' ),
			'add_new' 				=> _x( 'Add New Team', 'Team'),
			'add_new_item' 			=> __( 'Add New Team' ),
			'edit_item' 			=> __( 'Edit Team' ),
			'new_item' 				=> __( 'New Team' ),
			'view_item' 			=> __( 'View Team' ),
			'search_items' 			=> __( 'Search Teams' ),
			'not_found' 			=> __( 'No Team found' ),
			'not_found_in_trash' 	=> __( 'No Team found in Trash' ),
		);
		
		$pages = array('member');
		
		$args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Team'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'hierarchical' 		=> false,
			'show_tagcloud' 	=> false,
			'show_in_nav_menus' => false,
			'rewrite' 			=> array('slug' => 'team', 'with_front' => false ),
		 );
		register_taxonomy('team', $pages, $args);
	}

}
add_action('init', 'register_team_tax');