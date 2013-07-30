<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?>
		<div id="secondary" class="widget-area grid_2" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>


				<?php 
					$instructor_category_id = get_category_id('Instructors');
					$args = array(
						"category" => $instructor_category_id,
						"numberposts" => 30,

					);
					$posts = get_posts( $args ); 
					$excerpt_length = apply_filters('excerpt_length', 10);


				?>
				<aside>
					<h1 class="widget-title">
						Instructors
					</h1>
					<ul>
					<?php foreach($posts as $post) : setup_postdata($post); ?>	
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>

				</aside>


				<?php 
					$music_category_id = get_category_id('Music');
					$args = array(
						"category" => $music_category_id
					);
					$posts = get_posts( $args ); 
					$excerpt_length = apply_filters('excerpt_length', 10);


				?>
				<aside>
					<h1 class="widget-title">
						Music
					</h1>
					<ul>
					<?php foreach($posts as $post) : setup_postdata($post); ?>	
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>

				</aside>



				<?php 
					$args = "cat=-" + $music_category_id + ",-" + $instructor_category_id + "&post_status=public";
					$posts = query_posts( $args ); 
					$excerpt_length = apply_filters('excerpt_length', 10);
				?>
				<aside>
					<h1 class="widget-title">
						Other Information
					</h1>
					<ul>
					<?php foreach($posts as $post) : setup_postdata($post); ?>	
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>

				</aside>

			<?php endif; // end sidebar widget area ?>
			<?php //get_template_part( 'sponsors' ); ?>
		</div><!-- #secondary .widget-area -->
