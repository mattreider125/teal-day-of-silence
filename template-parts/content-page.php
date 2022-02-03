<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OCDOS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
			if ( is_front_page() ) : ?>
				
			<?php else : ?>
				<!--<header class="entry-header">
					<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
				</header>-->
    <h3 class="entry-title">
    <?php 
     
    $current = $post->ID;
     
    $parent = $post->post_parent;
     
    $grandparent_get = get_post($parent);
     
    $grandparent = $grandparent_get->post_parent;
     
    ?>
     
    <?php if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {echo get_the_title($grandparent); }else {echo get_the_title($parent); }?>
 
</h3>

			<?php
			endif;?>
			<?php
			$classes = get_body_class();
if (in_array('buddypress',$classes)) { ?>
<?php 
$random = rand(1,2); 
if ($random == 1) {
	$url = '/share-your-story/';	
	} else {
		$url = '/resources/';
	};

?>
    <div class="graphic">
	<a href="<?php echo $url; ?>"><img src="<?php echo get_template_directory_uri();?>/img/banner<?php echo $random; ?>.jpg" alt="Banner" height="150" width="600" /></a>
	</div>
<?php } ?>


	<div class="entry-content">
		<?php
			the_content();

			/* wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ocdos' ),
				'after'  => '</div>',
			) );*/
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'ocdos' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->