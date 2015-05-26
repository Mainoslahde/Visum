<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Visum
 
 Template name: Mainos */

?>
    
    <?php get_header(); ?>

        <div class="main-gallery" id="slider">
            <?php // WP_Query arguments
            $args = array (
                'post_type'          => 'mainos',
            );

            // The Query
            $mainos_query = new WP_Query( $args );

            // The Loop
            if ( $mainos_query->have_posts() ) {
                while ( $mainos_query->have_posts() ) {
                    $mainos_query->the_post(); ?>
                    <div class="gallery-cell">
                       <?php if (get_field('mediatyyppi') == 'kuva') : ?>
                           <img src="<?php the_field('mainoskuva'); ?>" class="img-responsive" alt="Esittelyssä"/>                    
                       <?php elseif (get_field('mediatyyppi') == 'video') : ?>
                           <video id="video" width="100%" height="768" autoplay muted loop>
                               <source src="<?php the_field('html5_video'); ?>" type="video/mp4">
                           </video>
                       <?php endif; ?>
                    </div>
              <?php  }
            } else {
               _e('Sorry, no posts matched your criteria.', 'visum');
            }

            // Restore original Post Data
            wp_reset_postdata(); ?>
        </div>
    
    <?php get_footer(); ?>
