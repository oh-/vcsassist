<?php if ( is_active_sidebar( 'footer-space' ) ) : ?>
	<aside id="footer-space" class="footer-space widget-area site-footer" role="complementary">
		<?php dynamic_sidebar( 'footer-space' ); ?>
	</aside><!-- /#footer-space -->
<?php else : ?>
	<aside id="footer-space" class="footer-space widget-area site-footer" role="complementary">
		<div class="partner-logos">
			<div id="logo-lvsc-unitedway" class="logoother">
				<img src="<?php bloginfo( 'template_url' ); ?>/img/lvscandunitedwayfooterlogo.png" alt="Lvscandunitedwayfooterlogo">
				<p>VCS Assist is a project of London Voluntary Service Council (LVSC). It is part-financed by the European Social Fund (ESF), Trust for London, and Big Lottery Fund.  ESF invests in jobs and skills, focusing on people who need support the most.</p>
			</div>
			<div id="logo-MOL" class="logo"> 
				<img src="<?php bloginfo( 'template_url' ); ?>/img/MAYOR-LOGO-CMYK.png" alt="MAYOR LOGO CMYK"></div>
			<div id="logo-esf" class="logo">
				<img src="<?php bloginfo( 'template_url' ); ?>/img/esf_logo_rgb_45mm_lores.png" alt="Esf Logo Rgb 45mm Lores">
			</div>
			<div id="logo-lottery" class="logo">
				<img src="<?php bloginfo( 'template_url' ); ?>/img/hi_big_e_lrg_pink-e1423675905446.jpg"alt="Hi Big E Lrg Pink E1423675905446">
			</div>
			<div class="logo" id="logo-trustforlondon">
				<img src="<?php bloginfo( 'template_url' ); ?>/img/trustforlondon-logo300.png" alt="Trustforlondon Logo300">
			</div>
		</div> <!-- /.partner-logos -->
	</aside><!-- /#footer-space -->
<?php endif; ?>