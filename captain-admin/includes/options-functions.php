<?php
/**
 * Options become reality here.
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 *
 */

/**
 * Add Custom Amin CSS
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_custom_admin_css() {
	echo get_field('custom_admin_css','option');
}
if ( get_field('custom_admin_css','option') ) {
	add_action('admin_head', 'cadmin_custom_admin_css');
}

/**
 * Add Custom Login CSS
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_custom_login_css() {
	echo get_field('custom_login_css','option');
}
if ( get_field('custom_login_css','option') ) {
	add_action('login_head', 'cadmin_custom_login_css');
}

/**
 * Custom Logo for Admin Menu & Login Form
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

$logo = get_field('logo','option');
$logo_width = get_field('logo_width','option');
$logo_height = get_field('logo_height','option');

if ( $logo ) {
	add_action('adminmenu', 'cadmin_logo');
	add_action('login_head', 'cadmin_login_logo');
}

function cadmin_logo() {
	$logo = get_field('logo','option');
	echo '<img src="' . $logo . '" class="menu-logo" />';
}

function cadmin_login_logo() { ?>
	<style type="text/css">
		body.login div#login h1 a {
		    background-image: url('<?php the_field('logo','option'); ?>');
		    background-size: contain;
		    width: <?php the_field('logo_width','option') ?>px;
		    height: <?php the_field('logo_height','option'); ?>px;
		}
	</style>
<?php
}

/**
 * Custom Login Text
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_login_message() {
	$message = '<p class="message">';
	$message .= get_field('custom_login_text','option');
	$message .= '</p>';
	return $message;
}
if ( get_field('custom_login_text','option') ) {
	add_filter('login_message', 'cadmin_login_message');
}

/**
 * Custom Register Text
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function register_message() {
    $html = '<div style="margin:10px 0;border:1px solid #e5e5e5;padding:10px"><p style="margin:5px 0;">';
    $html .= get_field('custom_register_message','option');
    $html .= '</p></div>';
    echo $html;
}
if ( get_field('custom_register_message','option') ) {
	add_action('register_form', 'register_message');
}

/**
 * Custom Login Link
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_login_link() {
	$link = get_field('custom_login_link','option');
    return $link;
}
if ( get_field('custom_login_link','options') ) {
	add_filter('login_headerurl', 'cadmin_login_link');
}

/**
 * Custom Login Link Title Attribute
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_login_link_title() {
	$title = get_field('custom_login_link_title','option');
	return $title;
}
if ( get_field( 'custom_login_link_title','option') ) {
	add_filter( 'login_headertitle', 'cadmin_login_link_title');
}

/**
 * Custom Login Register Text
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_register_text( $translated ) {
	$register_text = get_field('register_text','option');
    $translated = str_ireplace(  'Register',  $register_text,  $translated );
    return $translated;
}
if ( get_field('register_text','option') ) {
	add_filter(  'gettext',  'cadmin_register_text'  );
	add_filter(  'ngettext',  'cadmin_register_text'  );
}

/**
 * Allow Users to Login with their Email Addres
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_allow_email_login( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by_email( $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password(null, $username, $password );
}
if ( get_field('enable_login_by_email_address','option') ) {
	add_filter('authenticate', 'cadmin_allow_email_login', 20, 3);
}

/**
 * Add 'Email' to Login Form Username Label
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_add_email_label( $translated_text, $text, $domain ) {
    if ( "Username" == $translated_text )
        $translated_text .= __( ' / Email');
    return $translated_text;
}
if ( get_field('add_email_label_to_form','option') ) {
	add_filter( 'gettext', 'cadmin_add_email_label', 20, 3 );
}

/**
 * Hide Login Errors & Error Shake
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_stop_login_shake() {
	remove_action('login_head', 'wp_shake_js', 12);
}
if ( get_field('hide_login_error_messages','option') ) {
	add_filter( 'login_errors',create_function( '$a', "return null;" ) );
	add_action('login_head', 'cadmin_stop_login_shake');
}

/**
 * Auto-Select 'Remember Me' in Login form
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_login_checked_remember_me() {
	add_filter( 'login_footer', 'cadmin_remember_me_checked' );
}
function cadmin_remember_me_checked() {
	echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
if ( get_field('login_auto_remember_me','option') ) {
	add_action( 'init', 'cadmin_login_checked_remember_me' );
}

/**
 * Custom URL Redirect After Login
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_login_redirect() {
	return get_field('custom_login_redirect','option');
}
if ( get_field('custom_login_redirect','option')) {
	add_filter('login_redirect', 'cadmin_login_redirect');
}

/**
 * Hide Dashboard From Subscribers
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_hide_dashboard(){
    global $current_user;
    get_currentuserinfo();
    if ($current_user->user_level <  4) {
        wp_redirect( get_bloginfo('url') );
        exit;
    }
}
if ( get_field('hide_dashboard_subscribers','option') ) {
	add_action('admin_init', 'cadmin_hide_dashboard', 1);
}

/**
 * Add Post Thumbnails to Admin Post / Page Columns
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_posts_columns($defaults){
    $defaults['wps_post_thumbs'] = __('Image');
    return $defaults;
}
function cadmin_posts_custom_columns($column_name, $id){
    if($column_name === 'wps_post_thumbs'){
        echo the_post_thumbnail( array(180,100) );
    }
}
if ( get_field('add_thumbnails_columns','option') ) {
	if (function_exists( 'add_theme_support' )){
	    add_filter('manage_posts_columns', 'cadmin_posts_columns', 5);
	    add_action('manage_posts_custom_column', 'cadmin_posts_custom_columns', 5, 2);
	    add_filter('manage_pages_columns', 'cadmin_posts_columns', 5);
	    add_action('manage_pages_custom_column', 'cadmin_posts_custom_columns', 5, 2);
	}
}

/**
 * Custom Admin Notice
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_admin_notice(){
	if ( get_field('notice_type','option') ) {
		$notice_type = get_field('notice_type','option');
	} else {
		$notice_type = 'updated';
	}
    $notice = '<div class="';
    $notice .= $notice_type;
    $notice .= '"><p>';
    $notice .= get_field( 'notice_text','option' );
    $notice .= '</p></div>';
    echo $notice;
}
if ( get_field('enable_admin_notice','option') ) {
	add_action('admin_notices', 'cadmin_admin_notice');
}

/**
 * Stop WordPress Update Notices
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_hide_update_notice() {
   echo '<style type="text/css">.update-nag {display: none}</style>';
}
if ( get_field('hide_wordpress_update_notice','option') ) {
	add_action('admin_head', 'cadmin_hide_update_notice');
}

/**
 * Custom Footer Text
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_footer_text() {
  	echo get_field('footer_text', 'option');
}
if ( get_field('footer_text', 'option') ) {
	add_filter('admin_footer_text', 'cadmin_footer_text');
}

/**
 * Update Custom Post States Classes for Better Styling
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_custom_post_states( $post_states ) {
   foreach ( $post_states as &$state ){
   $state = '<span class="'.strtolower( $state ).' states">' . str_replace( ' ', '-', $state ) . '</span>';
   }
   return $post_states;
}
add_filter( 'display_post_states', 'cadmin_custom_post_states' );

/**
 * Default Admin Color Scheme
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_set_default_admin_color($user_id) {
	$default_color = strtolower( get_field('default_admin_color_scheme','option') );
    $args = array(
        'ID' => $user_id,
        'admin_color' => $default_color
    );
    wp_update_user( $args );
}
add_action('user_register', 'cadmin_set_default_admin_color');

/**
 * Stop Users From Switching Admin Color Schemes
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_stop_users_from_choose_admin_color() {
	if ( get_field('stop_users_from_choosing_admin_color_scheme','option') ) {
		if ( current_user_can('manage_options') ) {
		} else {
			remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
		}
	}
}
add_action('plugins_loaded','cadmin_stop_users_from_choose_admin_color');

/**
 * Custom Redirect Login Page (from wp-login.php to other page)
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.4.5
 */

function cadmin_login_page_redirect() {

	global $pagenow;
	$redirect_page = get_field( 'login_page_redirect', 'option' );

	if ( 'wp-login.php' == $pagenow ) {
		wp_redirect( $redirect_page );
  		exit();
	}

}
if ( get_field( 'login_page_redirect', 'option' ) != '' ) {

	add_action( 'init', 'cadmin_login_page_redirect' );

}