<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OCDOS
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php
	if ( is_front_page() ) : ?>
        <aside id="fpsecondary" class="widget-area" role="complementary">
            <h1 class="hp-entry-title"><a href="<?php echo site_url();?>/get-ready/"><?php the_title();?>:</a></h1>
		<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
	<?php else : ?>
        <aside id="secondary" class="widget-area" role="complementary" aria-expanded="false">
		<?php dynamic_sidebar( 'sidebar-1' );
	endif;?>
</aside><!-- #secondary -->