<?php
/**
 * The template for displaying all single posts.
 *
 * @package Visum
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			                <section>
                    <div class="content">
                        <div class="col-sm-6 col-xs-12">
                            <img class="img-responsive" src="<?php the_field('tuotekuva'); ?>" />
                        </div>  
                        <div class="col-sm-6 col-xs-12">
                            <img class="img-responsive" src="<?php the_field('tuotteen_nimi'); ?>" />
                            <p class="kuvaus"><?php the_field('tuotteen_kuvaus'); ?></p>
                            <span class="tags"><?php the_tags('', ' ', ''); ?></span>
                            <div class="hinta-wrapper clearfix"><?php the_field('tuotteen_hinta'); ?></div>
                        </div>
                    </div>
                </section>  

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					get_template_part('content-comments'); // COMMENTS     
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
