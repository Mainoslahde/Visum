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
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                    <div class="gallery-cell">
                        <img src="<?php the_field('mainoskuva'); ?>" class="img-responsive" alt="Esittelyssä"/>
                    </div>
              <?php  }
            } else {
               _e('Sorry, no posts matched your criteria.', 'istand');
            }

            // Restore original Post Data
            wp_reset_postdata(); ?>
        </div>
    
    <?php get_footer(); ?>
