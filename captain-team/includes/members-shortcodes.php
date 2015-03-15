<?php
/**
 * @package   Captain Team
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

/**
 * Add Shortcode for [members] with all its attrbiutes.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 * @todo    Add 'orderby' attribute
 */

if ( ! function_exists( 'cteam_shortcode' ) ) {

	function cteam_shortcode( $atts ) {

		// Attributes
		extract( shortcode_atts(
			array(
				'style' => 'default', // default (default), style2, style3, style4, style5 (additional styles only for Box Size)
				'size'	=> 'box', // box (default), small_row, large_row
				'sorter' => 'false', // false (default) or true - show jquery filter sorter
				'map_view' => 'false', // false (default) or true - shows map with markers of each member's location (set in the map location field)
				'border_style' => '', // rainbow (default) or HEX color (including #)
				'columns' => 3, // 3 (default) or any integer between 1-5
				'color'	=> '#1972DD', // #1972dd (default) or can enter HEX color (including #) - individual manually-set color will override this
				'team'	=> '', // team taxonomy SLUG
				'show_count' => '-1', // integer for how many members to show, default -1 (infinite)
				'member_id'	=> '', // integer ID of individual member to display (only 1 ID accepted)
				'show_bio' => 'true', // true (default) or false - show bio section
				'show_quote' => 'true', // true (default) or false - show bio section
				'show_phone' => 'true', // true (default) or false - show phone section
				'show_email' => 'true', // true (default) or false - show email section
				'show_website' => 'true', // true (default) or false - show website section
				'show_location' => 'true', // true (default) or false - show location section
				'show_map' => 'true', // true (default) or false - show map based on location section or map selection
				'show_social' => 'true', // true (default) or false - show social section
				'show_twitter' => 'true', // true (default) or false - show twitter button
				'show_skills' => 'true', // true (default) or false - show skills section
			), $atts )
		);
		
		ob_start();
		cteam_member_display( $style, $size, $sorter, $map_view, $border_style, $columns, $color, $team, $show_count, $member_id, $show_bio, $show_quote, $show_phone, $show_email, $show_website, $show_location, $show_map, $show_social, $show_twitter, $show_skills );
		$data = ob_get_clean();
		return $data;

	}

}
add_shortcode( 'members', 'cteam_shortcode' );