<?php
/**
 * Altering layout of Locations in Admin with Columns etc.
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Custom Columns for Locations
 *
 * @package Captain Opening Hours
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.3.0
 */

add_filter( 'manage_edit-coh_location_columns', 'coh_location_columns' ) ;
if ( ! function_exists( 'coh_location_columns' ) ) {
    
    function coh_location_columns( $columns ) {

        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'title'     => __( 'Location Title', 'coh' ),
            'id'        => __( 'Location ID', 'coh' ),
            'photo'     => __( 'Location Photo', 'coh' ),
            'date'      => __( 'Date', 'coh' ),
        );

        return $columns;
    }

}

add_action( 'manage_coh_location_posts_custom_column', 'coh_manage_location_columns', 10, 2 );
if ( ! function_exists( 'coh_manage_location_columns' ) ) {
    
    function coh_manage_location_columns( $column, $post_id ) {
        
        global $post;

        switch( $column ) {

            case 'id' :

                echo $post_id;

                break;

            case 'photo' :

                if ( has_post_thumbnail() ) {
                    echo get_the_post_thumbnail( $post_id, 'thumbnail' );
                }

                break;

            default :
                break;
        }
        
    }
    
}

/**
 * Add Sorting Ability to Location ID
 *
 * @package Captain Opening Hours
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.3.0
 */

add_filter( 'manage_edit-coh_location_sortable_columns', 'coh_location_sort_columns' );
if ( ! function_exists( 'coh_location_sort_columns' ) ) {
    
    function coh_location_sort_columns( $columns ) {

        $columns['id'] = 'id';

        return $columns;
        
    }
    
}