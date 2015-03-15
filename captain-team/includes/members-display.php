<?php
/**
 * @package   Captain Team
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

/**
 * Display of Captain Team Content:
 * This is a function that accepts all the variables that affect the display of content.
 * It calls several functions for each of its 'parts', passing through the $show_x variable to these new functions.
 * It also features a switch function that goes through the 3 different sizes availablee.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.3
 */

if ( ! function_exists( 'cteam_member_display' ) ) {

	function cteam_member_display( $style, $size, $sorter, $map_view, $border_style, $columns, $color, $team, $show_count, $member_id, $show_bio, $show_quote, $show_phone, $show_email, $show_website, $show_location, $show_map, $show_social, $show_twitter, $show_skills ) {

		// Vars / Queries etc.
		if ( $team ) {
			$team_tax = array(
							array(
								'taxonomy' => 'team',
								'field'	=> 'slug',
								'terms'	=> $team
							)
						);
						
		} else {
			$team_tax = '';
		}

		$args = array(
			'post_type'	=> 'member',
			'posts_per_page' => $show_count,
			'p'	=> $member_id,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query'	=> $team_tax,
			);
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

		<?php $counter = 1;	?>

		<?php // Large Map with All Members ?>
		<?php if ( $map_view == 'true' ) { ?>

			<div class="google-maps group-map">
				<div class="acf-map">
					<?php while( $the_query->have_posts() ) : $the_query->the_post();

						$map_location = get_field( 'map_location' );
							
						$map_lat = $map_location['lat'];
						$map_lng = $map_location['lng'];

						// Photo Shape
						if ( get_field( 'photo_shape' ) ) {
							$photo_shape = get_field( 'photo_shape' );
						} else {
							$photo_shape = 'circle';
						}
						
						if ( $map_lat ) { ?>
							<div class="marker" data-lat="<?php echo $map_lat; ?>" data-lng="<?php echo $map_lng; ?>">
							<h4><?php echo get_the_title(); ?> <a href="#<?php echo get_the_ID(); ?>"><span class="dashicons dashicons-admin-links"></span></a></h4>
							<?php echo cteam_display_part_position(); ?>
							<?php echo cteam_display_part_location('true'); ?>
							</div>
						<?php }
					endwhile; ?>
				</div>
			</div>

		<?php } ?>

		<?php // jQuery Quicksand Filter w/ Filter Selection Area ?>
		<?php if ( $sorter == 'true' ) { ?>

			<ul id="member-sort">

				<li class="active"><a href="#" class="all">All</a></li>
			<?php
				$terms = get_terms("team");
				if ( !empty( $terms ) && !is_wp_error( $terms ) ){
				    foreach ( $terms as $term ) {
				    	echo '<li><a href="#" class="' . $term->slug . '">' . $term->name . '</a></li>';
				    }
				}
			?>

			</ul>

		<?php } ?>

		<?php // Start Member Display ?>
		<div id="member-group">

		<?php if ( $sorter == 'true' ) {
			switch( $size ) {
				case 'box':
					echo '<div class="sort-container grid">';
					break;
				case 'small_row':
					echo '<div class="sort-container small_row">';
					break;
				case 'large_row':
					echo '<div class="sort-container large_row">';
					break;
			}
		} ?>

		  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php
			// Vars
			$additional_image = get_field( 'member_additional_image' );
			
			// Theme Color
			if ( get_field( 'theme_color' ) ) {
				$theme_color = get_field( 'theme_color' );
			} elseif ( $color ) {
				$theme_color = $color;
			} else {
				$theme_color = '#1972DD';
			}

			// Photo Shape
			if ( get_field( 'photo_shape' ) ) {
				$photo_shape = get_field( 'photo_shape' );
			} else {
				$photo_shape = 'circle';
			}

			// Member Size
			if ( $size ) {
				$the_size = $size;
			} else {
				$the_size = 'box';
			}

			// Member Style
			if ( $style ) {
				$the_style = $style;
			} else {
				$the_style = 'default';
			}

			// Current Taxonomy Term
			$terms = get_the_terms( get_the_ID(), 'team' );
			if ( !empty( $terms ) ) {
	    		// get the first term
	    		$term = array_shift( $terms );
	    		$tax_term = $term->slug;
			}

			?>

			<?php echo cteam_display_part_css($theme_color, $additional_image); ?>

		<?php switch($the_size) {

			case "box": ?>

				<?php
					if ( $sorter != 'true' ) {
						if ( $counter % $columns == 1 ) {
							echo '<div class="grid">';
						}
					}
				?>

					
					<div class="unit w-1-<?php echo $columns; ?> item" data-id="id-<?php echo $counter; ?>" data-type="<?php echo $tax_term; ?>">
						<a name="<?php echo get_the_ID(); ?>"></a>
					    <div id="member-single" class="<?php echo $the_size; ?> <?php echo $the_style; ?> member-<?php echo get_the_ID(); ?>">
					    	
					    	<div class="member-container">

					    		<div class="member-header" style="background-color: <?php echo $theme_color; ?>; <?php if ( $additional_image ) { echo 'background-image: url(\'' . $additional_image . '\'); background-size: 400px;'; } ?>">

						    		<?php echo cteam_display_part_photo( $photo_shape ); ?>

						    	</div><!-- .header -->

						    	<div class="member-body">

						    		<?php echo cteam_display_part_name(); ?>

					    			<?php echo cteam_display_part_position(); ?>

					    			<?php echo cteam_display_part_bio( $show_bio ); ?>

					    			<?php echo cteam_display_part_quote( $show_quote ); ?>

						    		<?php if ( get_field( 'phone_number' ) && $show_phone || get_field( 'email_address' ) && $show_email || get_field( 'website' ) && $show_website || get_field( 'location' ) && $show_location ) {

						    			echo '<div class="contact">';
						    			
						    			echo cteam_display_part_phone( $show_phone );

						    			echo cteam_display_part_email( $show_email );

						    			echo cteam_display_part_website( $show_website );

						    			echo cteam_display_part_location( $show_location );

						    			echo '</div>';

						    		} ?>

						    		<?php echo cteam_display_part_social( $show_social ); ?>

						    		<?php echo cteam_display_part_twitter( $show_twitter ); ?>

						    		<?php echo cteam_display_part_map( $show_map ); ?>

						    		<?php echo cteam_display_part_skills( $show_skills, $style ); ?>

						    	</div><!-- .body -->

						    	<div class="member-footer" <?php if ( !$border_style ) { echo 'id="rainbow"'; } else { echo 'style="background:' . $border_style . ';"'; } ?>>

						    	</div><!-- .footer -->

					    	</div><!-- .member-container -->
					    
					    </div><!-- #member-single -->

				    </div><!-- .unit.w-1-X -->

			    <?php

			    	if ( is_int( $counter / $columns ) ) {
						//echo '</div><!-- .grid -->';
					}
				?>

			    <?php break; ?>

		    <?php case 'small_row': ?>

		    	<?php if ( $sorter == 'true' ) { ?>
					<div class="grid item" data-id="id-<?php echo $counter; ?>" data-type="<?php echo $tax_term; ?>">
				<?php } else { ?>
					<div class="grid">
				<?php } ?>

		    		<div id="member-single" class="<?php echo $the_size; ?> responsive member-<?php echo get_the_ID(); ?>">

		    			<div class="member-container">

							<div class="unit w-1-5 member-header">
								<?php echo cteam_display_part_photo( $photo_shape ); ?>
							</div>

							<div class="member-body">
								<div class="unit w-1-5 name_pos">
							    	<?php echo cteam_display_part_name(); ?>
							    	<?php echo cteam_display_part_position(); ?>
							    </div>
							    <?php if ( get_field( 'phone_number' ) && $show_phone || get_field( 'email_address' ) && $show_email || get_field( 'website' ) && $show_website || get_field( 'location' ) && $show_location ) { ?>
								    <div class="contact">
								    	<div class="unit w-1-5 phone_email">
								    			<?php
								    				echo cteam_display_part_phone( $show_phone );

									    			echo cteam_display_part_email( $show_email );
									    		?>
									    </div>
									    <div class="unit w-1-5 web_location">
									    		<?php
									    			echo cteam_display_part_website( $show_website );

									    			echo cteam_display_part_location( $show_location );
									    		?>
									    </div>
									</div>
								<?php } ?>
							    <div class="unit w-1-5 social_part">
							    	<?php if ( get_field( 'replace_social_small_row' ) ) {
							    		echo cteam_display_part_twitter( $show_twitter );
							    	} else {
							    		echo cteam_display_part_social( $show_social );
							    	} ?>
							    </div>
							</div><!-- .body -->

			    		</div><!-- .member-container -->

			   		</div><!-- #member-single -->

					</div><!-- .grid +/- .item -->

		    <?php break; ?>

		    <?php case 'large_row': ?>

		   		<?php if ( $sorter == 'true' ) { ?>
					<div class="grid item" data-id="id-<?php echo $counter; ?>" data-type="<?php echo $tax_term; ?>">
				<?php } else { ?>
					<div class="grid" style="margin-bottom: 20px;">
				<?php } ?>

		    		<div id="member-single" class="<?php echo $the_size; ?> responsive member-<?php echo get_the_ID(); ?>">

		    			<div class="member-container">

							<div class="unit w-1-3 member-header" style="background-color: <?php echo $theme_color; ?>; <?php if ( $additional_image ) { echo 'background-image: url(\'' . $additional_image . '\'); background-size: 400px;'; } ?>">
								<?php echo cteam_display_part_photo( $photo_shape ); ?>

								<div class="member-body">
								    <?php echo cteam_display_part_name(); ?>
								   	<?php echo cteam_display_part_position(); ?>
								   	<?php echo cteam_display_part_social( $show_social ); ?>
								</div>
							</div>

							<div class="unit w-1-3 member-body">
							    <?php if ( get_field( 'phone_number' ) && $show_phone || get_field( 'email_address' ) && $show_email || get_field( 'website' ) && $show_website || get_field( 'location' ) && $show_location ) { ?>
								    <div class="contact">
								    			<?php
								    				echo cteam_display_part_phone( $show_phone );

									    			echo cteam_display_part_email( $show_email );
									    		?>
									    		<?php
									    			echo cteam_display_part_website( $show_website );

									    			echo cteam_display_part_location( $show_location );
									    		?>
									    		<hr />
									</div>
									<?php echo cteam_display_part_bio( $show_bio ); ?>

						    		<?php echo cteam_display_part_twitter( $show_twitter ); ?>

								<?php } ?>
							</div><!-- .body -->

							<div class="unit w-1-3 member-body">
						    		<?php echo cteam_display_part_skills( $show_skills, $style ); ?>
							</div>

			   			</div><!-- .member-container -->

			   		</div><!-- #member-single -->

		    	</div><!-- .grid -->

		    <?php break;

		    } // end switch ?>

		<?php $counter++; ?>
		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php if ( $sorter == 'true' ) { ?>
			</div><!-- .for sorting grid -->
		<?php } ?>

		</div><!-- #member-group -->
		<!-- pagination here -->

		<?php wp_reset_postdata(); ?>

		<?php else:  ?>
		  <p><?php _e( 'Sorry, there are no team members that match the attributes you gave!' ); ?></p>
		<?php endif;

	}

}

/**
 * Captain Team Parts to Display:
 * Each of the functions below are different parts called in the cteam_member_display() function.
 * Variables are passed from the cteam_member_display() function down to these functions.
 * These functions can be easily edited to change the content of all the different sizes/layouts etc.
 *
 * @package Captain Team
 * @author  Captain Theme <info@captaintheme.com>
 * @since   1.0.0
 */

if ( ! function_exists( 'cteam_display_part_css' ) ) {

	// PART: CUSTOM CSS
	function cteam_display_part_css( $main_color, $bg_image ) {
		$style = '<style type="text/css">';
		$style .= '.box.style4.member-' . get_the_ID() . ':hover { box-shadow: 1px 1px 5px 1px ' . $main_color . ' !important; }';
		$style .= '.box.style5.member-' . get_the_ID() . ' .member-body .member-name { background-color:' . $main_color . ';';
		if ( $bg_image ) { 
			$style .= 'background-image: url(\'' . $bg_image . '\'); background-size: 400px;';
		}
		$style .= '}';
		$style .= '</style>';
		return $style;
	}

}

if ( ! function_exists( 'cteam_display_part_name' ) ) {

	// PART: NAME
	function cteam_display_part_name() {
		$name = '<div class="member-name">';
		$name .= get_the_title();
		$name .= '</div>';
		return $name;
	}

}

if ( ! function_exists( 'cteam_display_part_position' ) ) {
	
	// PART: TITLE / POSITION
	function cteam_display_part_position() {
		if ( get_field( 'position_title' ) ) {
			$position = '<div class="member-position">';
			$position .= get_field( 'position_title' );
			$position .= '</div>';
			return $position;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_photo' ) ) {

	// PART: PHOTO
	function cteam_display_part_photo( $shape ) {
		
		// Global Vars for Post IDs
		global $post;
		global $post_id;

		if ( get_field( 'photo_effect' ) ) {
			$effect = get_field( 'photo_effect' );
		} else {
			$effect = 'none';
		}
		$image_classes = 'member-photo ' . $effect;

		if ( has_post_thumbnail() ) {
			switch($shape) {
				case 'hexagon':
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'member-photo' );
					$url = $thumb['0'];
					$photo = '<div class="photo-container hexagon hexagon1">';
						$photo .= '<div class="hexagon-in1">';
							$photo .= '<div class="hexagon-in2" style="background-image: url(' . $url . ');">';
							$photo .= '</div>';
						$photo .= '</div>';
					$photo .= '</div>';
					break;
				default:
					$photo = '<div class="photo-container ' . $shape . '">';
					$photo .= get_the_post_thumbnail( $post_id, 'member-sq', array("class" => $image_classes ) );
					$photo .= '</div>';
			}
			return $photo;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_bio' ) ) {
	
	// PART: BIO
	function cteam_display_part_bio( $show ) {
		if ( $show == 'true' ) {
		    if ( get_the_excerpt() ) {
		    	$bio = '<div class="member-bio">';
		    	$bio .= wp_trim_words( get_the_excerpt(), '25' );
		    	$bio .= '</div>';
		    	return $bio;
		    }
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_quote' ) ) {

	// PART: QUOTE
	function cteam_display_part_quote( $show ) {
		if ( $show == 'true' ) {
			if ( get_field( 'quote' ) ) {
				$quote = '<div class="member-quote"><i class="fa fa-quote-left"></i>';
				$quote .= get_field( 'quote' );
				$quote .= '<i class="fa fa-quote-right"></i></div>';
				return $quote;
			}
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_phone' ) ) {

	// PART: PHONE
	function cteam_display_part_phone( $show ) {
		$phone_w_space = get_field( 'phone_number' );
		$phone_n_space = str_replace(' ', '', $phone_w_space );

		if ( $show == 'true' ) {
			if ( $phone_w_space ) {
				$phone = '<div class="member-phone"><i class="fa fa-phone"></i>';
				$phone .= '<a href="tel:' . $phone_n_space . '">';
				$phone .= get_field( 'phone_number' );
				$phone .= '</a></div>';
				return $phone;
			}
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_email' ) ) {

	// PART: EMAIL
	function cteam_display_part_email( $show ) {
		if ( $show == 'true' ) {
			if ( get_field( 'email_address' ) ) {
				$email = '<div class="member-email"><i class="fa fa-envelope"></i>';
			    $email .= '<a href="mailto:' . get_field( 'email_address' ) . '">';
			    $email .= get_field( 'email_address' );
			    $email .= '</a></div>';
				return $email;
			}
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_website' ) ) {

	// PART: WEBSITE
	function cteam_display_part_website( $show ) {
		if ( $show == 'true' ) {
			if ( get_field( 'website' ) ) {
				$website = '<div class="member-website"><i class="fa fa-link"></i>';
			    $website .= '<a href="' . get_field( 'website' ) . '">';
			    $website .= get_field( 'website' );
			    $website .= '</a></div>';
			    return $website;
			}
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_location' ) ) {

	// PART: LOCATION
	function cteam_display_part_location( $show ) {
		if ( $show == 'true' ) {
			if ( get_field( 'location' ) ) {
				$location = '<div class="member-location"><i class="fa fa-map-marker"></i>';
				$location .= get_field( 'location' );
				$location .= '</div>';
				return $location;
			}
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_map' ) ) {

	// PART: MAP
	function cteam_display_part_map( $show ) {
		if ( $show == 'true' ) {
			$map_location = get_field( 'map_location' );

			$map_lat = $map_location['lat'];
			$map_lng = $map_location['lng'];

			if ( $map_lat ) {

				$map = '<div class="google-maps"><div class="acf-map">';
					$map .= '<div class="marker" data-lat="' . $map_lat . '" data-lng="' . $map_lng . '"></div>';
				$map .= '</div></div>';
				
				return $map;
			} else {
				return null;
			}

		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_social' ) ) {

	// PART: SOCIAL
	function cteam_display_part_social( $show ) {
		if ( $show == 'true' ) {
			if ( have_rows( 'social_media_profile_urls' ) ):
		 
				$social = '<div class="social">';
				
				while( have_rows( 'social_media_profile_urls' ) ): the_row(); 
					
					$platform = get_sub_field( 'social_media_platform' );
					$url = get_sub_field( 'social_media_url' );
							 
					$social .='<span class="fa-stack fa-lg">';
					$social .= '<i class="fa fa-circle fa-stack-2x ';
					$social .= strtolower( $platform );
					$social .= '"></i><a href="';
					$social .= $url;
					$social .= '" class="fa fa-';
					$social .= strtolower( $platform );
					$social .= ' fa-stack-1x fa-inverse social-single"></a></span>';

				endwhile;
							 
				$social .= '</div>';

				return $social;
							 
			endif;
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_twitter' ) ) {

	// PART: FOLLOW ON TWITTER
	function cteam_display_part_twitter( $show ) {
		if ( $show == 'true' ) {
			if ( get_field( 'show_twitter_follow_button' ) ) {
				
				$username = get_field( 'twitter_username' );
				$count = get_field( 'show_follower_count' );
				$language = get_field( 'button_language' );
				$size = get_field( 'button_size' );
				$screenname = get_field( 'hide_screen_name' );

				if ( $count ) {
					$show_count = 'true';
				} else {
					$show_count = 'false';
				}

				if ( $screenname ) {
					$show_screen = 'false';
				} else {
					$show_screen = 'true';
				}

				$follow = '<div class="twitter-follow">';
					$follow .= '<a href="https://twitter.com/' . $username . '" class="twitter-follow-button" ';
					$follow .= 'data-show-count="' . $show_count . '" ';
					$follow .= 'data-lang="' . $language . '" ';
					$follow .= 'data-size="' . $size . '" ';
					$follow .= 'data-show-screen-name="' . $show_screen . '">';
					$follow .= 'Follow @' . $username . '</a>';
					$follow .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
				$follow .= '</div>';
				return $follow;

			}
		} else {
			return null;
		}
	}

}

if ( ! function_exists( 'cteam_display_part_skills' ) ) {

	// PART: SKILLS
	function cteam_display_part_skills( $show, $style ) {
		if ( $show == 'true' ) {
			if( have_rows( 'skills_area' ) ):
				
				$skills = '<div class="skills" ';
				if ( $style == 'style4' ) {
					$skills .= 'style="background-color:';
					$skills .= get_field('theme_color');
					$skills .= ';"';
				}
				$skills .= '>';

				while( have_rows( 'skills_area' ) ): the_row();

					$skill_type = get_sub_field( 'skill_type' );
					$skill_percent = get_sub_field( 'skill_percent' );
					$skill_animate = get_sub_field( 'skill_bar_animate' );
					$skill_color = get_sub_field( 'skill_bar_color1' );

					if ( $skill_color ) {
						$skills .= '<style type="text/css">
									.member-';
						$skills .= get_the_ID();
						$skills .= ' .';
						$skills .= cteam_clean( $skill_type );
						$skills .= ' progress::-webkit-progress-value {
										background-image:
											-webkit-linear-gradient( 135deg, transparent, transparent 33%, rgba(0,0,0,.1) 33%, rgba(0,0,0,.1) 66%, transparent 66%),
										    -webkit-linear-gradient( top, rgba(255, 255, 255, .25), rgba(0,0,0,.2)),
										    -webkit-linear-gradient( left, ';
						$skills .= $skill_color;
						$skills .= ', ';
						$skills .= $skill_color;
						$skills .= ' ) !important;
									}';
						$skills .= '.member-';
						$skills .= get_the_ID();
						$skills .= ' .';
						$skills .= cteam_clean( $skill_type );
						$skills .= ' progress::-webkit-progress-value .progress-bar span { background-color: ';
						$skills .= $skill_color;
						$skills .= ' !important; }
								</style>';
					}

					$skills .= '<div class="single-skill ';
					$skills .= cteam_clean( $skill_type );
					$skills .= '">';

						if ( $skill_percent ) {

							$skills .= '<p style="width:' . $skill_percent . '%" data-value="' . $skill_percent . '">' . $skill_type . '</p>
										<progress max="100" value="' . $skill_percent . '" class="';

								if ( $skill_animate ) {

									$skills .= 'animate';

								}

							$skills .= '">
											<div class="progress-bar">
												<span style="width: ' . $skill_percent . '%">' . $skill_percent . '%</span>
											</div>
										</progress>';

						}

					$skills .= '</div>';

				endwhile;

				$skills .= '</div>';

				return $skills;

			endif;
		} else {
			return null;
		}
	}

}