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
 * CMB Theme Options
 * @version 0.1.0
 * @since 1.3.0
 */
class COH_Admin_Settings {

    /**
     * Option key, and option page slug
     * @var string
     */
    protected static $key = 'coh_options';

    /**
     * Array of metaboxes/fields
     * @var array
     */
    protected static $theme_options = array();

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';
    protected $other_title = '';

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
        // Set our title
        $this->title = __( 'Settings', 'coh' );
        $this->other_title = __( 'Captain Opening Hours Settings', 'coh' );
    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    }

    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( self::$key, self::$key );
    }

    /**
     * Add menu options page
     * @since 1.1.1
     */
    public function add_options_page() {
        $this->options_page = add_submenu_page( 'edit.php?post_type=coh_location', $this->other_title, $this->title, 'manage_options', self::$key, array( $this, 'admin_page_display' ) );
    }

    /**
     * Admin page markup. Mostly handled by CMB
     * @since  0.1.0
     */
    public function admin_page_display() {

        // Temporary solution for auto-added backslashes (see https://gist.github.com/jtsternberg/8601075)
        $_POST      = array_map( 'stripslashes_deep', $_POST );
        $_GET       = array_map( 'stripslashes_deep', $_GET );
        $_COOKIE    = array_map( 'stripslashes_deep', $_COOKIE );
        $_REQUEST   = array_map( 'stripslashes_deep', $_REQUEST );

        ?>
        <div class="wrap cmb_options_page <?php echo self::$key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb_metabox_form( self::option_fields(), self::$key ); ?>
        </div>
        <?php
    }

    /**
     * Defines the settings options metaboxs and field configuration
     * @since  1.3.0
     * @return array
     */
    public static function option_fields() {

        $prefix = '_coh_';

        // Only need to initiate the array once per page-load
        if ( ! empty( self::$theme_options ) )
            return self::$theme_options;

        self::$theme_options = array(
            'id'         => 'coh_plugin_options',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( self::$key, ), ),
            'show_names' => true,
            'fields'     => array(
                array(
                    'name' => __( 'Hide Open / Closed Light', 'coh' ),
                    'desc' => __( 'Checkong this option will hide the green/red circle that appears showing if the location is open or closed.', 'coh' ),
                    'id'   => $prefix . 'open_close_light',
                    'type' => 'checkbox',
                ),
                array(
                    'name' => __( 'Hide Closed Days', 'coh' ),
                    'desc' => __( 'Checking this option will hide the closed days from the opening hours info widget/shortcode - only showing the open days.', 'coh' ),
                    'id'   => $prefix . 'hide_closed_days',
                    'type' => 'checkbox',
                ),
                array(
                    'name'    => __( '12 / 24 Hour Time', 'coh' ),
                    'desc'    => __( 'How would you like to display the opening hours?', 'coh' ),
                    'id'      => $prefix . 'twelve_twentyfour_time',
                    'type'    => 'select',
                    'options' => array(
                        'twelve'        => __( '12 Hour Time (eg. 5:00 PM)', 'coh' ),
                        'twentyfour'    => __( '24 Hour Time (eg. 17:00)', 'coh' ),
                        'twentyfouralt' => __( '24 Hour Time without leading zero (eg. 9:00)', 'coh' ),
                    ),
                    'default' => 'twelve',
                ),
                array(
                    'name' => __( 'We\'re Open - Image', 'coh' ),
                    'desc' => __( 'Upload an image or enter a URL - this will override the text option below.', 'coh' ),
                    'id'   => $prefix . 'open_image',
                    'type' => 'file',
                ),
                array(
                    'name' => __( 'We\'re Open - Text', 'coh' ),
                    'desc' => __( 'A small amount of text to display when you are open.', 'coh' ),
                    'id'   => $prefix . 'open_text',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => __( 'We\'re Closed - Image', 'coh' ),
                    'desc' => __( 'Upload an image or enter a URL - this will override the text option below.', 'coh' ),
                    'id'   => $prefix . 'closed_image',
                    'type' => 'file',
                ),
                array(
                    'name' => __( 'We\'re Closed - Text', 'coh' ),
                    'desc' => __( 'A small amount of text to display when you are closed.', 'coh' ),
                    'id'   => $prefix . 'closed_text',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => __( 'Are you open / available? - Manual', 'coh' ),
                    'desc' => __( 'There is an additional widget/shortcode that will show the images below for being open or not. For example, it could be used to show an image for when you\'re available for work or hire, etc. or maybe just to show an \'open image\' all of the time, regardless of each location\'s opening hours.', 'coh' ),
                    'id'   => $prefix . 'manual_available_image',
                    'type' => 'checkbox',
                ),
                array(
                    'name' => __( 'Manual Open / Available - Image', 'coh' ),
                    'desc' => __( 'Upload an image or enter a URL - this will override the text option below.', 'coh' ),
                    'id'   => $prefix . 'available_image',
                    'type' => 'file',
                ),
                array(
                    'name' => __( 'Manual Open / Available  - Text', 'coh' ),
                    'desc' => __( 'A small amount of text to display when you are manually available.', 'coh' ),
                    'id'   => $prefix . 'man_available_text',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => __( 'Manual Not Open / Not Available - Image', 'coh' ),
                    'desc' => __( 'Upload an image or enter a URL - this will override the text option below.', 'coh' ),
                    'id'   => $prefix . 'not_available_image',
                    'type' => 'file',
                ),
                array(
                    'name' => __( 'Manual Not Open / Not Available - Text', 'coh' ),
                    'desc' => __( 'A small amount of text to display when you are manually not available.', 'coh' ),
                    'id'   => $prefix . 'man_not_available_text',
                    'type' => 'text_medium',
                ),
            ),
        );
        return self::$theme_options;
    }

    /**
     * Make public the protected $key variable.
     * @since  0.1.0
     * @return string  Option key
     */
    public static function key() {
        return self::$key;
    }

}

// Get it started
$COH_Admin_Settings = new COH_Admin_Settings();
$COH_Admin_Settings->hooks();

/**
 * Wrapper function around cmb_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function coh_get_option( $key = '' ) {
    return cmb_get_option( COH_Admin_Settings::key(), $key );
}