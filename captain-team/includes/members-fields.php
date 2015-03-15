<?php
/**
 * @package   Captain Team
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

/**
 * Register Custom Meta Fields for Advanced Custom Fields to display:
 * These fields are the heart of the plugin. They create the inputs on the Member Edit screen and then are retrieved in the member display.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( function_exists( 'register_field_group' ) ) {

	register_field_group(array (
		'id' => 'acf_member-fields',
		'title' => 'Member Fields',
		'fields' => array (
			array (
				'key' => 'field_53905c3e2a9ae',
				'label' => 'Main Details',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53905c8c2a9af',
				'label' => 'Position / Title',
				'name' => 'position_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Chief Executive Officer, Web Developer, Mail Room Guyz',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53905cf52a9b0',
				'label' => 'Phone Number',
				'name' => 'phone_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '+614 313 555 555',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53905d282a9b1',
				'label' => 'Email Address',
				'name' => 'email_address',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => 'john@google.com',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_53905d3e2a9b2',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'New York City, USA',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53991f58e35a9',
				'label' => 'Map Location',
				'name' => 'map_location',
				'type' => 'google_map',
				'instructions' => 'If you would like to pinpoint a specific map location that will be used in the Google Map Embed Display Part, please go ahead. Otherwise it will use the Location Field above to find a rough location on the map.',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
			array (
				'key' => 'field_53905d5d2a9b3',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'http://google.com/',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53905dd02a9b4',
				'label' => 'Social Media',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53905e0f2a9b5',
				'label' => 'Social Media Profile URLs',
				'name' => 'social_media_profile_urls',
				'type' => 'repeater',
				'instructions' => 'Enter as many profiles as you would like, simply selecting the social media platform and then entering a corresponding URL.',
				'sub_fields' => array (
					array (
						'key' => 'field_53905ea993bd9',
						'label' => 'Social Media Platform',
						'name' => 'social_media_platform',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'Facebook' => 'Facebook',
							'Twitter' => 'Twitter',
							'Tumblr' => 'Tumblr',
							'LinkedIn' => 'LinkedIn',
							'Pinterest' => 'Pinterest',
							'Youtube' => 'Youtube',
							'vimeo-square' => 'Vimeo',
							'Instagram' => 'Instagram',
							'Wordpress' => 'Wordpress',
							'Flickr' => 'Flickr',
							'Github' => 'Github',
							'google-plus' => 'Google+',
							'Dribbble' => 'Dribbble',
							'Behance' => 'Behance',
							'SoundCloud' => 'SoundCloud',
							'Spotify' => 'Spotify',
							'Reddit' => 'Reddit',
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5390603893bda',
						'label' => 'Social Media URL',
						'name' => 'social_media_url',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Profile',
			),
			array (
				'key' => 'field_53993100cd09f',
				'label' => 'Show Twitter Follow Button?',
				'name' => 'show_twitter_follow_button',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53993111cd0a0',
				'label' => 'Twitter Username',
				'name' => 'twitter_username',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53993100cd09f',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '@',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53993120cd0a1',
				'label' => 'Show Follower Count',
				'name' => 'show_follower_count',
				'type' => 'true_false',
				'instructions' => 'Tick the checkbox if you would like to display the follower count next to the follow butotn.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53993100cd09f',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5399314acd0a2',
				'label' => 'Button Language',
				'name' => 'button_language',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53993100cd09f',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'en' => 'English',
					'fr' => 'French',
					'de' => 'German',
					'it' => 'Italian',
					'es' => 'Spanish',
					'ko' => 'Korean',
					'ja' => 'Japanese',
				),
				'default_value' => 'en',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_539931f70a207',
				'label' => 'Button Size',
				'name' => 'button_size',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53993100cd09f',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'medium' => 'Medium',
					'large' => 'Large',
				),
				'default_value' => 'medium',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5399322f43720',
				'label' => 'Hide Screen Name',
				'name' => 'hide_screen_name',
				'type' => 'true_false',
				'instructions' => 'The user\'s screen name shows up by default, but you can opt not to show the screen name in the button.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53993100cd09f',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_539sd2g22f2f720',
				'label' => 'Show Instead of Social Media Icons on Small Row Layout',
				'name' => 'replace_social_small_row',
				'type' => 'true_false',
				'instructions' => 'This will replace the social media icons in the small row layout with the twitter follow button. If not selected, the twitter button will not be shown in this layout.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53993100cd09f',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5390628ceb8f6',
				'label' => 'More',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53906295eb8f7',
				'label' => 'Quote',
				'name' => 'quote',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '"The key to life is happiness"',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539062aceb8f8',
				'label' => 'Skills',
				'name' => 'skills_area',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_539062beeb8f9',
						'label' => 'Skill',
						'name' => 'skill_type',
						'type' => 'text',
						'column_width' => 16,
						'default_value' => '',
						'placeholder' => 'eg. Photoshop, Team Building',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_539062eeeb8fa',
						'label' => 'Skill %',
						'name' => 'skill_percent',
						'type' => 'range',
						'column_width' => 42,
						'slider_type' => 'default',
						'title' => '',
						'prepend' => '',
						'append' => '%',
						'separate' => '-',
						'default_value_1' => 0,
						'default_value_2' => 100,
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
					array (
						'key' => 'field_539179d134592',
						'label' => 'Color',
						'name' => 'skill_bar_color1',
						'type' => 'color_picker',
						'column_width' => 30,
						'default_value' => '',
					),
					array (
						'key' => 'field_5391741e87691',
						'label' => 'Animate',
						'name' => 'skill_bar_animate',
						'type' => 'true_false',
						'column_width' => 12,
						'message' => '',
						'default_value' => 1,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Skill',
			),
			array (
				'key' => 'field_539158344f272',
				'label' => 'Style',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5391583b4f273',
				'label' => 'Theme Color',
				'name' => 'theme_color',
				'type' => 'color_picker'
			),
			array (
				'key' => 'field_539158774f274',
				'label' => 'Additionial Image',
				'name' => 'member_additional_image',
				'type' => 'image',
				'instructions' => 'Some of the themes use an additional image as a background image or similar - you can read more about this in the Documentation.',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_539158bc4f275',
				'label' => 'Photo Shape',
				'name' => 'photo_shape',
				'type' => 'select',
				'choices' => array (
					'circle' => 'Circle',
					'square' => 'Square',
					'hexagon' => 'Hexagon',
				),
				'default_value' => 'Circle',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5392ff1f94437',
				'label' => 'Photo Effect',
				'name' => 'photo_effect',
				'type' => 'select',
				'choices' => array (
					'rotate' => 'Rotate',
					'blur' => 'Blur',
					'zoom_out' => 'Zoom Out',
					'zoom_in' => 'Zoom In',
					'tilt' => 'Tilt',
					'black_white' => 'Black/White',
					'darken' => 'Darken',
					'opacity' => 'Opacity',
					'none' => 'None',
				),
				'default_value' => 'none',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'member',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

}