<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Visum
 
 Template name: Ohjelma */

?>
    
<?php get_header(); ?>

    <div class="container-fluid">        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="content">
            <div class="col-xs-12">
                <img src="<?php echo get_template_directory_uri() ?>/img/tulevaaohjelmaa.png" class="img-responsive" /> 
            </div>  
                <div class="col-xs-6 col-xs-offset-6 ohjelma">
                    <?php // WP_Query arguments
                    $args = array (
                        'post_type'              => 'ohjelma_post_type',
                        'posts_per_page'         => '100',
                        'order'                  => 'ASC',
                    );

                    // The Query
                    $ohjelma_query = new WP_Query( $args );

                    // The Loop
                    if ( $ohjelma_query->have_posts() ) {
                        while ( $ohjelma_query->have_posts() ) {
                            $ohjelma_query->the_post(); ?>
                            <div class="ohjelma-wrapper">
                                <div class="paivamaara">
                                    <!-- DateTime::createFromFormat vaatii vähintään PHP 5.3 source: http://stackoverflow.com/questions/8749688/fatal-error-call-to-undefined-method-datetimecreatefromformat 

                                    Parsee päivämäärän luettavampaan muotoon -->

                                    <p> <?php  // $date = DateTime::createFromFormat('Ymd', get_field('paivamaara')); echo $date->format('d.m.Y'); ?>

                                        <?php 

                                $date = get_field('paivamaara');

                                // extract Y,M,D
                                $y = substr($date, 0, 4);
                                $m = substr($date, 4, 2);
                                $d = substr($date, 6, 2);

                                // create UNIX
                                $time = strtotime("{$d}-{$m}-{$y}");

                                // format date (pp/kk/vvvv)
                                echo date('d.m.Y', $time);

                                ?></p>

                                </div>
                                <div class="ohjelma-nimi">
                                    <h3><?php the_field('ohjelma_nimi'); ?></h3>
                                </div>
                                <div class="ohjelma-kuvaus">
                                    <p><?php the_field('ohjelma_kuvaus'); ?></p>
                                </div>
                            </div>
                        <?php }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data
                    wp_reset_postdata(); ?>
            </div>
        </div>

        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.', 'istand'); ?></p>
        <?php endif; ?>          
    </div>


<?php get_footer(); ?>
