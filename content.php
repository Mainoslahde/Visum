<?php
/**
 * @package Visum
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if(post_type_exists('tuote') ) : ?>
	           <article class="col-sm-3 tag-list">
                        <div class="col-xs-12">
                            <img class="img-responsive" src="<?php the_field('tuotekuva'); ?>" />
                        </div>  
                        <div class="col-xs-12">
                            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?> </h1></a>
                            <div class="hinta-wrapper clearfix"><?php the_field('tuotteen_hinta'); ?></div>
                        </div>
                </article>  
    <?php else : ?>
    
    	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php visum_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'visum' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'visum' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<?php endif; ?>

	<footer class="entry-footer">
		<?php visum_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->