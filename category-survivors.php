<?php

/**

 * The template for displaying all pages.

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package OCDOS

 */


get_header(); ?>

<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
             <?php get_sidebar(); ?>
            <div id="left-area">
			

<?php 
					$args = array( 
						'post_type' => 'stories', 
						'posts_per_page' => 12,
						'orderby' => rand,
						'category_name' => 'survivors' );
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : 
						$count = 1;
						while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="img-wrap">
						<?php
$forms = GFAPI::get_forms();
?>
						<a class="indiv" href="<?php the_permalink();?>" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(), medium);?>');">
							<p><?php echo the_title();?><br><span><?php echo get_post_meta($post->ID, 'City', true); ?>, <?php echo get_post_meta($post->ID, 'State', true); ?></span></p>
						</a>

						</div>
					<?php endwhile; endif;
					?>

		</main><!-- #main -->

	</div><!-- #primary -->
</div></div>

<?php

get_footer();