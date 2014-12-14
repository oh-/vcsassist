<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--
Compass CSS files added below
-->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/screen.css" media="screen, projection" rel="stylesheet"  type="text/css" />
 
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/print.css" media="print" rel="stylesheet" type="text/css" />
  <!--[if IE]>
      <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<div id="page-wrap">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', '_s' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			
		</nav><!-- #site-navigation -->
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'description' ); ?>"/></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->
		<?php get_sidebar('header'); ?>
		 
	</header><!-- #masthead -->
	<div id="content" class="site-content">
