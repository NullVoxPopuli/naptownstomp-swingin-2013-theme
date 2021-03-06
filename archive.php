<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package web2feel
 * @since web2feel 1.0
 */

get_header(); ?>

		<section id="primary" class="content-area container_6 cf">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header grid_8">
					<h1 class="page-title">
						<?php
							if ( is_category() ) {
								// printf( __( 'Category Archives: %s', 'web2feel' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag Archives: %s', 'web2feel' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author Archives: %s', 'web2feel' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives: %s', 'web2feel' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: %s', 'web2feel' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: %s', 'web2feel' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( 'Archives', 'web2feel' );

							}
						?>
					</h1>
					<?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						}
					?>
				</header><!-- .page-header -->

				<div id="article-area" class="cf ">
					<div class="article-list">
					
						<?php 
							$posts;
							if ( have_posts() ) :
								while ( have_posts() ):
									$p = the_post();
									if (get_the_title($p.id) != ""):
										array_push($posts,  $p);
									endif;
								endwhile;
							endif;
							$chunks = array_chunk($posts,  4);

							foreach($chunks as $chunk) :
							?>
								<div class="article-container">

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								//get_template_part( 'content', get_post_format() );

								foreach($chunk as $post) : setup_postdata($post);
							?>
							
									
								<div class="article-box grid_2">
								
									<?php
										$thumb = get_post_thumbnail_id();
										$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
										$image = aq_resize( $img_url, 220, 170, true ); //resize & crop the image
									?>
									
									<div class="article-box grid_2">
										
									<a class="sqimg" href="<?php the_permalink(); ?>">
										<h2><?php the_title(); ?></h2>
										<?php if($image) : ?> <img class="grey-img" src="<?php echo $image ?>"/> <?php endif; ?>
											
										<div class="post-hover">
											<h2><?php the_title(); ?></h2>
											<?php print_excerpt(100); ?>		
										</div>
									</a>
											
								</div>
									
								</div>

								<?php endforeach ?>
							</div>
						<?php
						endforeach
						?>
					</div>
				</div>
			
				<?php web2feel_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>