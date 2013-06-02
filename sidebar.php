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
						"category" => $instructor_category_id
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

<!-- 
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'web2feel' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'web2feel' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside> -->

			<?php endif; // end sidebar widget area ?>
			<?php //get_template_part( 'sponsors' ); ?>
		</div><!-- #secondary .widget-area -->
