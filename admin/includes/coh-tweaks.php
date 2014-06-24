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

/**
 * Change 'Enter title here' title placeholder text to something more fitting.
 * @package Recipe Hero
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.1.1
 */

function coh_change_default_title( $title ){
    $screen = get_current_screen();
    if ( 'coh_location' == $screen->post_type ){
        $title = 'Enter Location Name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'coh_change_default_title' );


/**
 * Rename Featured Image Meta Box to 'Recipe Completed Photo'.
 *
 * @package Recipe Hero
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.1.1
 */

function coh_ftimg_metabox_name() {
	remove_meta_box( 'postimagediv', 'coh_location', 'side' );
	add_meta_box('postimagediv', __('Location Photo'), 'post_thumbnail_meta_box', 'coh_location', 'side', 'low');
}
add_action( 'add_meta_boxes_coh_location', 'coh_ftimg_metabox_name' );