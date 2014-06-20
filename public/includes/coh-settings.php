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
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_submenu_page( 'edit.php?post_type=location', $this->other_title, $this->title, 'manage_options', self::$key, array( $this, 'admin_page_display' ) );
    }

    /**
     * Admin page markup. Mostly handled by CMB
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb_options_page <?php echo self::$key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb_metabox_form( self::option_fields(), self::$key ); ?>
        </div>
        <?php
    }

    /**
     * Defines the theme option metabox and field configuration
     * @since  0.1.0
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
                    'name' => __( 'Hide Open / Closed Light', 'cmb' ),
                    'desc' => __( 'Checkong this option will hide the green/red circle that appears showing if the location is open or closed.', 'cmb' ),
                    'id'   => $prefix . 'open_close_light',
                    'type' => 'checkbox',
                ),
                array(
                    'name' => __( 'We\'re Open - Image', 'cmb' ),
                    'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
                    'id'   => $prefix . 'open_image',
                    'type' => 'file',
                ),
                array(
                    'name' => __( 'We\'re Closed - Image', 'cmb' ),
                    'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
                    'id'   => $prefix . 'closed_image',
                    'type' => 'file',
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