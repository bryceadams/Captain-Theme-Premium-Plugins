<?php
/**
 * @package   Captain Team
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

/**
 * Add Image Sizes
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.0
 */

add_image_size( 'member-sq', 300, 300, true );
add_image_size( 'admin-column', 100, 100, true );


/**
 * Allow Shortcodes in Widget
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.0
 */

add_filter('widget_text', 'do_shortcode');


/**
 * Add Viewport Info for Responsive Magic to the <head>
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_viewport_mod' ) ) {

	function cteam_viewport_mod() {
		$viewport = '<meta name="viewport" content="width=device-width,initial-scale=1">';
		echo $viewport;
	}

}
add_action( 'wp_head', 'cteam_viewport_mod' );


/**
 * Add TinyMCE Button for [members] with default attributes set.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_add_mce_button' ) ) {

	function cteam_add_mce_button() {
		// check user permissions
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
			return;
		}
		// check if WYSIWYG is enabled
		if ( 'true' == get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', 'cteam_add_tinymce_plugin' );
			add_filter( 'mce_buttons', 'cteam_register_mce_button' );
		}
	}

}
add_action('admin_head', 'cteam_add_mce_button');

if ( ! function_exists( 'cteam_add_tinymce_plugin' ) ) {

	// Declare script for new button
	function cteam_add_tinymce_plugin( $plugin_array ) {
		$plugin_array['my_mce_button'] = plugins_url( 'js/button.js', dirname(__FILE__) );
		return $plugin_array;
	}

}

if ( ! function_exists( 'cteam_register_mce_button' ) ) {
	
	// Register new button in the editor
	function cteam_register_mce_button( $buttons ) {
		array_push( $buttons, 'my_mce_button' );
		return $buttons;
	}

}

/**
 * Rename Featured Image Meta Box to 'Member Photo'.
 * Remove the Attributes Meta Box as its unneeded and confusing to users.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_metabox_name' ) ) {

	function cteam_metabox_name() {
		remove_meta_box( 'postimagediv', 'member', 'side' );
		add_meta_box('postimagediv', __('Member Photo'), 'post_thumbnail_meta_box', 'member', 'side', 'low');

		remove_meta_box( 'pageparentdiv', 'member', 'side' );
	}

}
add_action( 'add_meta_boxes_member', 'cteam_metabox_name' );


/**
 * Change 'Enter title here' placeholder for Members to 'Member Name'
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_change_default_title' ) ) {

	function cteam_change_default_title( $title ){
	    $screen = get_current_screen();
	    if ( 'member' == $screen->post_type ){
	        $title = 'Member Name';
	    }
	    return $title;
	}

}
add_filter( 'enter_title_here', 'cteam_change_default_title' );


/**
 * Columns for Members Post Type: 
 * Add Team taxonoy and Member Photo.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_member_columns' ) ) {
	
	function cteam_member_columns( $columns ) {

		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Team Member' ),
			'team' => __( 'Team' ),
			'photo' => __( 'Photo' ),
			'date' => __( 'Date' )
		);

		return $columns;
	}

}
add_filter( 'manage_edit-member_columns', 'cteam_member_columns' );

if ( ! function_exists( 'cteam_manage_member_columns' ) ) {

	function cteam_manage_member_columns( $column, $post_id ) {

		global $post;

		switch( $column ) {

			case 'photo' :

				if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail( $post_id, 'admin-column' );
				}

				break;

			case 'team' :

				$terms = get_the_terms( $post_id, 'team' );

				if ( !empty( $terms ) ) {

					$out = array();

					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'team' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'team', 'display' ) )
						);
					}

					echo join( ', ', $out );
				}

				else {
					_e( 'No Teams' );
				}

				break;

			default :
				break;

		}

	}

}
add_action( 'manage_member_posts_custom_column', 'cteam_manage_member_columns', 10, 2 );

/**
 * Add Sorting Ability to Members:
 * Now users can sort the members by the Team taxonomy!
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_member_sort_columns' ) ) {

	function cteam_member_sort_columns( $columns ) {

		$columns['team'] = 'team';

		return $columns;
	}

}
add_filter( 'manage_edit-member_sortable_columns', 'cteam_member_sort_columns' );

if ( ! function_exists( 'cteam_orderby' ) ) {

	function cteam_orderby( $orderby, $wp_query ) {
		global $wpdb;

		if ( isset( $wp_query->query['orderby'] ) && 'team' == $wp_query->query['orderby'] ) {
			$orderby = "(
				SELECT GROUP_CONCAT(name ORDER BY name ASC)
				FROM $wpdb->term_relationships
				INNER JOIN $wpdb->term_taxonomy USING (term_taxonomy_id)
				INNER JOIN $wpdb->terms USING (term_id)
				WHERE $wpdb->posts.ID = object_id
				AND taxonomy = 'team'
				GROUP BY object_id
			) ";
			$orderby .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
		}

		return $orderby;
	}

}
add_filter( 'posts_orderby', 'cteam_orderby', 10, 2 );

if ( ! function_exists( 'cteam_clean' ) ) {
	
	// Function for removing all characters etc. from string (used with skill bars)
	function cteam_clean( $string ) {

	   $string = str_replace( ' ', '-', $string ); // Replaces all spaces with hyphens.
	   return preg_replace( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.

	}

}