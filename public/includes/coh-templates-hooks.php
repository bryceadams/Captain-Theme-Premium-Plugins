<?php
/**
 * Adding Template-related Actions
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Opening Hours Main Content
 *
 * @see coh_output_single_title() - 10
 * @see coh_output_single_address() - 20
 * @see coh_output_single_photo() - 30
 * @see coh_output_opening_hours() - 40
 */
add_action( 'coh_main_content', 'coh_output_single_title', 10 );
add_action( 'coh_main_content', 'coh_output_single_address', 20 );
add_action( 'coh_main_content', 'coh_output_single_photo', 30 );
add_action( 'coh_main_content', 'coh_output_opening_hours', 40 );


/**
 * Widget - We're Open
 *
 * @see coh_output_we_are_open - 10
 */

add_action( 'coh_widget_we_open_content', 'coh_output_we_are_open', 10 );


