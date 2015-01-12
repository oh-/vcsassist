<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar('footer'); ?>
		<div class="site-info">
			<?php printf( __( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="http://madeso.uk/" rel="designer">madeso</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- page-wrap --> </div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
