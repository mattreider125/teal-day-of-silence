<?php

get_header(); ?>

<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
             <?php get_sidebar(); ?>
            <div id="fpleft-area">
                <div id="grid">
            	<?php 
					$args = array( 
						'post_type' => 'stories', 
						'posts_per_page' => 9,
						'orderby' => 'rand' );
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : 
						$count = 1;
						while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="img-wrap">
						<a class="featured-img" href="<?php the_permalink();?>" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(), medium);?>');">
							<p><?php echo the_title();?><br><span><?php echo get_post_meta($post->ID, 'City', true); ?>, <?php echo get_post_meta($post->ID, 'State', true); ?></span></p>
						</a>

						<a class="default-img" href="<?php the_permalink();?>"><img src="<?php bloginfo('template_url')?>/img/grid<?php echo $count++;?>.png"></a></div>
					<?php endwhile; endif;
					?>
                </div><!-- end of grid -->
            </div><!-- end of left-area -->
            </div><!--end of content-area -->
            </div><!-- end of container -->


<?php get_footer(); ?>