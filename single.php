<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package OCDOS
 */

get_header(); ?>

<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
             <?php get_sidebar(); ?>
            <div id="left-area">
            	<a href="<?php wp_get_attachment_image( get_the_ID(), 'full'); ?>"><?php the_post_thumbnail('medium', ['class' => 'story-photo']); ?></a>
			<?php

			while ( have_posts() ) : the_post();



				get_template_part( 'template-parts/content', 'page' );



				// If comments are open or we have at least one comment, load up the comment template.

				if ( comments_open() || get_comments_number() ) :

					comments_template();

				endif;



			endwhile; // End of the loop.

			?>



		</main><!-- #main -->

	</div><!-- #primary -->

</div></div>

<?php

get_footer();