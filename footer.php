<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OCDOS
 */

?>
</div>
	</div><!-- #main-area -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="besilent">
				<img src="/wp-content/uploads/2017/09/Be-Silent-Footer.png">
			</div>
			<div class="social-media">
				<a href="https://www.facebook.com/OvarianCancerDayOfSilence/" target="_blank"><img src="<?php bloginfo('template_url')?>/img/fb.png" alt="Facebook"></a>
				<!--<a href="#"><img src="<?php bloginfo('template_url')?>/img/twitter.png" alt="Twitter"></a>
				<a href="#"><img src="<?php bloginfo('template_url')?>/img/youtube.png" alt="YouTube"></a>
				<a href="#"><img src="<?php bloginfo('template_url')?>/img/pinterest.png" alt="Pinterest"></a>
				<a href="#"><img src="<?php bloginfo('template_url')?>/img/googleplus.png" alt="Google+"></a>-->
				<a href="https://www.linkedin.com/company/ovarian-cancer-day-of-silence/" target="_blank"><img src="<?php bloginfo('template_url')?>/img/linkedin.png" alt="LinkedIn"></a>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>&copy;Copyright <?php echo date("Y"); ?>
		<p style="font-size: 12px; color: #000; text-align: center; display: none;">designed by <a style="color: #000;" href="https://www.heartbeatwebsites.com" target="_blank" rel="noopener">Heartbeat Websites</a></p>
	</footer><!-- #colophon -->
<!-- #page -->

<script>
jQuery(document).ready(function() {
	jQuery('#menu-sidebar li > .sub-menu').parent().hover(function() {
  var submenu = jQuery(this).children('.sub-menu');
  if ( jQuery(submenu).is(':hidden') ) {
    jQuery(submenu).slideDown(200);
  } else {
    jQuery(submenu).slideUp(200);
  }
});
}); 

</script>
	
<?php wp_footer(); ?>

</body>
</html>
