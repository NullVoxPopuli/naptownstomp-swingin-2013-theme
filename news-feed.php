
<?php 
	$news_category_id = get_category_id('news');
	$args = array(
		"category" => $news_category_id,
		"numberposts" => 3,
		"order" => "post_date",
		"orderby" => "DESC"
	);
	$posts = get_posts( $args ); 
	$excerpt_length = apply_filters('excerpt_length', 10);


?>

<div class="grid_3 news-container banner-box-shadow">
	<h2>News</h2>	

	<!-- NEWS POSTS -->

	<?php foreach($posts as $post) : setup_postdata($post); ?>		

		<div class="news-post">					
			<h3>
				<a href="<?php the_permalink(); ?>">
					<?php the_date("m/d"); ?>
					<?php the_title(); ?>
				</a>
			</h3>

			<?php print_excerpt(90); ?>		
									
		</div>

	<?php endforeach; ?>

	<!-- END NEWS POSTS -->


	<div class="news-footer">
		<!-- LINK TO ALL POSTS OF TYPE CATEGORY NEWS -->

		<a href="/?cat=<?php echo get_category_id('news'); ?>">
			See all the news
		</a>
	</div>
</div>