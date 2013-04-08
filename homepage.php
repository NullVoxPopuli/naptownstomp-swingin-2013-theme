<?php
/**

Template Name: Homepage

 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package web2feel
 * @since web2feel 1.0
 */



get_header(); ?>


<div class="home-nav grid_8">
	<span>View Event Details: </span>
	<?php wp_nav_menu( array(
		'container_id' => 'homemenu',
		'theme_location' => 'secondary',
		'menu_id'=>'home-page-menu',
		'menu_class'=>'sfmenu',
		'fallback_cb'=> 'fallbackmenu' ) ); ?>
</div>
<div class="clear"></div>
			
<?php get_template_part( 'slide', 'index' ); ?>
<?php get_template_part( 'news-feed', 'index' ); ?>
				
<div class="clear"></div>

<div id="primary" class="content-area container_6">
				
	<div id="article-area" class="cf ">
				
		<div class="article-list">
			<?php

			// $count = of_get_option('w2f_blog_number','8');
			$event_info_category_id = get_category_id('event-info');
			$args = array( 
				'category' => $event_info_category_id,
				"numberposts" => 100
				 );
			$lastposts = get_posts( $args );
			$chunks = array_chunk($lastposts, 4);

			foreach($chunks as $chunk) : ?>

				<div class="article-container">

					<?php foreach($chunk as $post) : setup_postdata($post); ?>		

						<div class="article-box grid_2">
							
							<?php
								$thumb = get_post_thumbnail_id();
								$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
								$image = aq_resize( $img_url, 220, 170, true ); //resize & crop the image
							?>
								
							<a class="sqimg" href="<?php the_permalink(); ?>">
								<?php if($image) : ?> <img class="grey-img" src="<?php echo $image ?>"/> <?php endif; ?>
									
								<div class="post-hover">
									<h2><?php the_title(); ?></h2>
									<?php print_excerpt(100); ?>		
								</div>
							</a>
									
						</div>

					<?php endforeach; ?>

				</div>

			<?php endforeach; ?>
		
		</div>
	</div>
</div><!-- #primary .content-area -->


<?php get_footer(); ?>