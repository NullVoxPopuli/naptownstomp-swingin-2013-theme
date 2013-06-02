<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?>

	</div><!-- #main .site-main -->
</div><!-- #page .hfeed .site -->

	<div id="bottom" >
	<div class="twit-feed">
		<?php get_template_part( 'twit-feed' ); ?>
	</div>
	
	<div class="clear"> </div>
	</div>



	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="fcred">
			<!-- Copyright &copy; <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>.<br /> -->
			<a href="http://swingin.org">SwingIN</a> • <a href="http://naptownstomp.org">Naptown Stomp  Lindy Hop Society</a> • Copyright &copy; 2013<br/>
			All Rights Reserved.  (<a href="http://www.swingin.org/privacy/">Privacy Policy</a>)<br />
			<?php fflink(); ?> WordPress Theme: <a href="http://topwpthemes.com/<?php echo wp_get_theme(); ?>/" ><?php echo wp_get_theme(); ?></a> 	
			</div>		
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
	
</div><!-- outer-->

<?php wp_footer(); ?>

</body>
</html>