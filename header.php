<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description' );
	$desc = str_replace("&lt;br&gt;", " | ", $site_description);
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | " . $desc;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'web2feel' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700,900' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<link href='http://fonts.googleapis.com/css?family=Kreon:400,700|Titillium+Web:400,700italic,200,600,400italic' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?>>
<div id="outermost">
<div id="page" class="hfeed site container_8">
		
	<header id="masthead" class="site-header container_8" role="banner">
		<div class="top cf ">
			
			<div class="logo">
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php echo html_entity_decode( get_bloginfo( 'description', 'display' ) ); ?></h2>
			</div>
			
			<div class="head-banner">
				<a href="<?php echo of_get_option('w2f_head_link',''); ?>"> <img src="<?php echo of_get_option('w2f_head_banner',''); ?>" /></a>
			</div>
			
		</div>

		<div id="botmenu" class="grid_8">
			<?php wp_nav_menu( array(
				'container_id' => 'submenu',
				'theme_location' => 'primary',
				'menu_id'=>'web2feel',
				'menu_class'=>'sfmenu',
				'fallback_cb'=> 'fallbackmenu' ) ); ?>
		</div>

	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main cf">