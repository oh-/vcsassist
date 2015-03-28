<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
<?php get_sidebar(); ?>
	<div id="primary" class="content-area">
		<?php get_sidebar('box'); ?>
		<?php get_sidebar("long"); ?>
		<main id="main" class="site-main" role="main">

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
