<?php
/**
 * Options that relate to CSS changes being made are here
 *
 * @package   Captain Admin
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 *
 */

add_action( 'admin_head', 'cadmin_options' );
add_action( 'login_head', 'cadmin_options' );
if ( ! function_exists( 'cadmin_options' ) ) {

	function cadmin_options() {

		$hide_for = get_field( 'hide_for_choose_role', 'option' );
		$admin_favicon = get_field( 'admin_favicon', 'option' );
		$bg = get_field( 'background_image', 'option' );
		$custom_bg = get_field( 'custom_background_image', 'option' ); ?>

			<?php if ( $admin_favicon ) { ?>
				<!-- Admin Favicon -->
				<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo $admin_favicon; ?>" />
			<?php } ?>

			<style type="text/css">
				
				<?php
					// Hide Login Lost Password / Back To Blog
					if ( get_field('hide_login_pass_back','option') ) { ?>
						#backtoblog {
						    display:none;
						}
						#nav {
						    display:none;
						}
					<?php } ?>

					<?php
					// Hide Login Errors div
					if ( get_field('hide_login_error_messages','option')) { ?>
						#login_error {
							display: none;
						}
					<?php } ?>

					<?php
					// Hide Wordpress Version & Current Theme in At A Glance Widget
					if ( get_field('remove_theme_right_now_widget','option') ) { ?>
						#dashboard_right_now #wp-version-message {
							display: none;
						}
					<?php } ?>

					<?php
						if ( in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php')) ) {

						// Background Image
						if ( $bg && $bg != 'Custom' ) { ?>
							html {
								background: url('<?php echo plugins_url( '../images/' . strtolower($bg), __FILE__ ); ?>.jpg') center center fixed !important;
								background-size: cover;
								-webkit-background-size: cover;
								-moz-background-size: cover;
								-o-background-size: cover;
							}
							body.login {
								background: none !important;
							}
						<?php } ?>
						
						<?php

						// Custom Background Image
						if ( $bg == 'Custom' && $custom_bg ) { ?>
							html {
								background: url('<?php echo $custom_bg; ?>') center center fixed !important;
								background-size: cover;
								-webkit-background-size: cover;
								-moz-background-size: cover;
								-o-background-size: cover;
							}
							body.login {
								background: none !important;
							}
						<?php }

					} ?>

			</style>
			
			<?php

			if ( $hide_for ) { 

				if ( $hide_for == 'hide_all' ) {

					echo cadmin_options_hiding_styles();

				} elseif ( $hide_for = 'hide_non_admin' ) {

					if ( ! current_user_can( 'administrator' ) ) {

						echo cadmin_options_hiding_styles();

					}

				} else {

					echo cadmin_options_hiding_styles();

				}

			} else {

				echo cadmin_options_hiding_styles();

			}

	}

}

if ( ! function_exists( 'cadmin_options_hiding_styles' ) ) {

	function cadmin_options_hiding_styles() {

		$hide_wp_logo = get_field( 'hide_wordpress_header_logo', 'option' );
		$hide_wp_version = get_field( 'hide_wordpress_footer_version', 'option' );
		$hide_screen_options_button = get_field( 'hide_screen_options_button', 'option' );
		$hide_help_button = get_field( 'hide_help_button', 'option' );

		?>
				<style type="text/css">
					<?php
					// Hide Wordpress Logo
					if ( $hide_wp_logo == true ) { ?>
						#wp-admin-bar-wp-logo {
							display: none;
						}
					<?php } ?>

					<?php
					// Hide Wordpress Version
					if ( $hide_wp_version == true ) { ?>
						#footer-upgrade {
							display: none;
						}
					<?php } ?>

					<?php
					// Hide Screen Options Button
					if ( $hide_screen_options_button == true ) { ?>
						#screen-options-link-wrap {
							display: none;
						}
					<?php } ?>

					<?php
					// Hide Help Button
					if ( $hide_help_button == true ) { ?>
						#contextual-help-link-wrap {
							display: none;
						}
					<?php } ?>

					<?php
					// Hide Other Menu Items
					if ( get_field('hide_posts','option') ) { ?>
						#menu-posts {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_media','option') ) { ?>
						#menu-media {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_pages','option') ) { ?>
						#menu-pages {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_comments','option') ) { ?>
						#menu-comments {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_appearance','option') ) { ?>
						#menu-appearance {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_plugins','option') ) { ?>
						#menu-plugins {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_users','option') ) { ?>
						#menu-users {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_tools','option') ) { ?>
						#menu-tools {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_settings','option') ) { ?>
						#menu-settings {
							display: none;
						}
					<?php } ?>
					<?php
					if ( get_field('hide_options_page','option') ) { ?>
						#toplevel_page_acf-options {
							display: none;
						}
					<?php } ?>

					
					

				</style>

	<?php }

}
