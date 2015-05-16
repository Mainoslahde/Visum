<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Visum
 
 Template name: From The Grill */

?>
    
    <?php get_header(); ?>

        <?php // WP_Query arguments
        $args = array (
            'post_type'          => 'tuote',
            'posts_per_page' => '-1',
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post(); ?>
                <section>
                    <div class="content">
                        <div class="col-sm-6 col-xs-12">
                            <img class="img-responsive" src="<?php the_field('tuotekuva'); ?>" />
                        </div>  
                        <div class="col-sm-6 col-xs-12">
                            <?php if (get_field('nimen_esittaminen') == 'Teksti') : ?>
                                <h1><?php the_field('tuotteen_nimi'); ?></h1>
                            <?php else : ?>
                                <img class="img-responsive" src="<?php the_field('tuotteen_nimi_graafinen'); ?>" />
                            <?php endif; ?>
                            <p class="kuvaus">
                                <?php the_field('tuotteen_kuvaus'); ?>
                            </p>
                            <span class="tags"><?php the_terms( $post->ID, 'tayte', '', ' ' ); ?></span>
                            <div class="hinta-wrapper clearfix">
                                <?php
                                // check if the repeater field has rows of data
                                if( have_rows('annos_koko_wrapper') ):
                                    // loop through the rows of data
                                    while ( have_rows('annos_koko_wrapper') ) : the_row(); ?>
                                        <div class="hinta-inner col-xs-3">
                                            <span class="kpl">
                                                <?php the_sub_field('annos_koko'); ?>
                                            </span>
                                            <span class="hinta">
                                                <?php the_sub_field('annoksen_hinta'); ?> €
                                            </span>
                                        </div>
                                        <?php                                      
                                    endwhile;
                                else :
                                    // no rows found
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>

                </section>  
        <?php }
        } else {
           _e('Sorry, no posts matched your criteria.', 'visum');
        }

        // Restore original Post Data
        wp_reset_postdata(); ?>
    
    <?php get_footer(); ?>
