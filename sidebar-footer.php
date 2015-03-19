<?php if ( is_active_sidebar( 'footer-space' ) ) : ?>
	<aside id="footer-space" class="footer-space widget-area site-footer" role="complementary">
		<?php dynamic_sidebar( 'footer-space' ); ?>
	</aside><!-- /#footer-space -->
<?php else : ?>
	<aside id="footer-space" class="footer-space widget-area site-footer" role="complementary">
		<div class="partner-logos">
			<img src="<?php bloginfo( 'template_url' ); ?>/img/lvscandunitedwayfooterlogo.png" id="logo-lvsc-unitedway" alt="Lvscandunitedwayfooterlogo">
			<img src="<?php bloginfo( 'template_url' ); ?>/img/MAYOR-LOGO-CMYK.png" id="logo-MOL" class="logo" alt="MAYOR LOGO CMYK">
			<img src="<?php bloginfo( 'template_url' ); ?>/img/esf_logo_rgb_45mm_lores.png" id="logo-esf" class="logo" alt="Esf Logo Rgb 45mm Lores">
			<img src="<?php bloginfo( 'template_url' ); ?>/img/hi_big_e_lrg_pink-e1423675905446.jpg" id="logo-lottery" class="logo" alt="Hi Big E Lrg Pink E1423675905446">
		</div> <!-- /.partner-logos -->
		<div id="lvsc-info"><p>VCS Assist is a project of London Voluntary Service Council (LVSC). It is part-financed by the European Social Fund (ESF), Trust for London, and Big Lottery Fund.  ESF invests in jobs and skills, focusing on people who need support the most.</p></div>

	</aside><!-- /#footer-space -->
<?php endif; ?>