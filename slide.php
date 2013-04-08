
<div id="slider" class="grid_5 banner-box-shadow">
<div class="flexslider">
	<ul class="slides">
	    <?php 	$count = of_get_option('w2f_slide_number');
				$slidecat =of_get_option('w2f_slide_categories');
				$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
	 	
		 		<li>
		 			
				<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 940, 400, true ); //resize & crop the image
				?>
				
				<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>">
						<img wdith="580" height="298" class="slide-image " src="<?php echo $image ?>"/>
					</a>
				<?php endif; ?>

				<div class="flex-summary">
					<h1><?php the_title(); ?></h1>
					<?php print_excerpt(200); ?>		

				</div>
		<?php endwhile; endif; ?>

    		
	  </li>
	</ul>
</div>	
</div>	
		