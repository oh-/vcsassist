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
		<div id="footer-content">
		<?php // get_sidebar('footer'); ?>
		<div class="site-info">
			<?php printf( __( 'Theme: %1$s by %2$s.', '_s' ), 'VCS Assist', '<a href="http://madeso.uk/" rel="designer"><strong>made</strong>so</a>' ); ?>
		</div><!-- .site-info -->
			
		</div> <!-- /#footer-content --> 
		<div class="footnote">
		        <ul class="footer-menu">
					<!--
						enter footer menu here
					-->
				</ul>
		        <div class="footer-logo">
		          <img src="http://www.lvsc.org.uk/media/164941/lvscandunitedwayfooterlogo.png" alt="LVSC United Way">
		        </div>
		        <div class="address">LVSC, 200a Pentonville Road, London N1 9JP Tel 020 7832 5830 Email info@lvsc.org.uk</div>
		        <div class="social">
		          <a target="_blank" href="https://www.facebook.com/pages/London-Voluntary-Service-Council/196113707837"><img src="http://www.lvsc.org.uk/media/164946/facebook.png" alt="LVSC on Facebook"></a>
		          <a target="_blank" href="https://twitter.com/LVSCnews"><img src="http://www.lvsc.org.uk/media/164951/twitter.png" alt="LVSC on Twitter"></a>        
		        </div> <!--/.social-->
		        <div class="copyright">Registered charity number 276886 Company registration number 1395546</div>
			</div> <!-- /.footnote -->
	</footer><!-- #colophon -->

</div><!-- page-wrap --> </div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
