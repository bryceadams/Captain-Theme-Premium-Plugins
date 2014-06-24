<?php
/**
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 /**
 * Register The Widgets We're Using
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1
 */

add_action( 'widgets_init', 'coh_widget' );

function coh_widget() {
	register_widget( 'COH_Widget_We_Open' );
	register_widget( 'COH_Widget_Opening_Hours' );
	register_widget( 'COH_Widget_We_Available' );
	register_widget( 'COH_Widget_Special_Dates' );
}

 /**
 * We're Open Widget
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1.1
 */

class COH_Widget_We_Open extends WP_Widget {

	function coh_widget_we_open() {
		$widget_ops = array( 'classname' => 'coh-we-open', 'description' => __('A widget for displaying the "We Are Open/Closed" image.', 'coh') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'coh-widget-we-open' );
		
		$this->WP_Widget( 'coh-widget-we-open', __('COH - We\'re Open', ''), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		// Get $select value
	    $location_id = $instance['select'];

			echo coh_widget_display_we_open( $location_id );
		
			echo $after_widget;
		}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['select'] = strip_tags( $new_instance['select'] );


		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'coh'), 'select' => __('all', 'coh') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title', 'coh'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<div style="padding-bottom: 15px; font-style: italic;">The Title is Optional</div>


		<p>
			<label for="<?php echo $this->get_field_id('select'); ?>"><?php _e('Location/s to Show', 'coh'); ?></label>
			<select name="<?php echo $this->get_field_name('select'); ?>" id="<?php echo $this->get_field_id('select'); ?>" class="widefat">

				<?php
					echo '<option value="all" id="all"', $instance['select'] == 'all' ? ' selected="selected"' : '', '>', 'All Locations', '</option>';
				?>
				
				<?php

				$args = array(
					'post_type' => 'coh_location',
				);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {

					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$option_id = get_the_ID();
						$option_name = get_the_title();

						echo '<option value="' . $option_id . '" id="' . $option_id . '"', $instance['select'] == $option_id ? ' selected="selected"' : '', '>', $option_name, '</option>';
					}

				} else {
					echo '<option value="" id="">Go Add Some Locations!</option>';
				}
				/* Restore original Post Data */
				wp_reset_postdata();

				?>
			</select>
		</p>

	<?php
	}
}


 /**
 * Info & Opening Hours Widget
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1.1
 */

class COH_Widget_Opening_Hours extends WP_Widget {

	function coh_widget_opening_hours() {
		$widget_ops = array( 'classname' => 'coh', 'description' => __( 'A widget for display your different location\'s opening hours and other location info.', 'coh' ) );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'coh-widget-hours' );
		
		$this->WP_Widget( 'coh-widget-hours', __( 'COH - Info & Opening Hours', 'coh' ), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		$location_id = $instance['select'];

		echo coh_widget_display_hours( $location_id );
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['select'] = strip_tags( $new_instance['select'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __( '', 'coh' ), 'select' => __( 'all', 'coh' ) );
		$instance = wp_parse_args( ( array ) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'coh' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		
		<div style="padding-bottom: 15px; font-style: italic;">The Title is Optional</div>


		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Location/s to Show', 'coh' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">

				<?php
					echo '<option value="all" id="all"', $instance['select'] == 'all' ? ' selected="selected"' : '', '>', 'All Locations', '</option>';
				?>
				
				<?php

				$args = array(
					'post_type' => 'coh_location',
				);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {

					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$option_id = get_the_ID();
						$option_name = get_the_title();

						echo '<option value="' . $option_id . '" id="' . $option_id . '"', $instance['select'] == $option_id ? ' selected="selected"' : '', '>', $option_name, '</option>';
					}

				} else {
					echo '<option value="" id="">Go Add Some Locations!</option>';
				}
				/* Restore original Post Data */
				wp_reset_postdata();

				?>
			</select>
		</p>


	<?php
	}
}

/**
 * We're Available Widget
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1
 */

class COH_Widget_We_Available extends WP_Widget {

	function coh_widget_we_available() {
		$widget_ops = array( 'classname' => 'coh-we-available', 'description' => __( 'A widget for displaying the "Manual We Are Available / Not Available" image.', 'coh' ) );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'coh-widget-we-available' );
		
		$this->WP_Widget( 'coh-widget-we-available', __( 'COH - Manual Available', '' ), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

			echo coh_shortcode_display_we_available();
		
			echo $after_widget;
		}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );


		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'coh') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'coh' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<div style="padding-bottom: 15px; font-style: italic;">The Title is Optional</div>

	<?php
	}
}

 /**
 * Special Dates Widget
 *
 * @package   Captain Opening Hours
 * @author    Captain Theme <info@captaintheme.com>
 * @since 	  1.1.1
 */

class COH_Widget_Special_Dates extends WP_Widget {

	function coh_widget_special_dates() {
		$widget_ops = array( 'classname' => 'coh-special-dates', 'description' => __('A widget for display your special dates set for a location', 'coh') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'coh-widget-special-dates' );
		
		$this->WP_Widget( 'coh-widget-special-dates', __('COH - Special Dates', 'coh'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		$location_id = $instance['select'];

		echo coh_widget_display_special_dates( $location_id );
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['select'] = strip_tags( $new_instance['select'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'coh'), 'select' => __('all', 'coh') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title', 'coh'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		
		<div style="padding-bottom: 15px; font-style: italic;">The Title is Optional</div>


		<p>
			<label for="<?php echo $this->get_field_id('select'); ?>"><?php _e('Location/s to Show', 'coh'); ?></label>
			<select name="<?php echo $this->get_field_name('select'); ?>" id="<?php echo $this->get_field_id('select'); ?>" class="widefat">

				<?php

				$args = array(
					'post_type' => 'coh_location',
				);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {

					echo '<option value="all" id="all"', $instance['select'] == 'all' ? ' selected="selected"' : '', '>', 'All Locations', '</option>';

					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$option_id = get_the_ID();
						$option_name = get_the_title();

						echo '<option value="' . $option_id . '" id="' . $option_id . '"', $instance['select'] == $option_id ? ' selected="selected"' : '', '>', $option_name, '</option>';
					}

				} else {
					echo '<option value="" id="">Go Add Some Locations!</option>';
				}
				/* Restore original Post Data */
				wp_reset_postdata();

				?>
			</select>
		</p>


	<?php
	}
}