<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Visum
 
 Template name: Palaute */

?>
    
<?php get_header(); ?>

<div class="container-fluid">        
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="content">
  <div class="col-xs-5">
      <img src="<?php echo get_template_directory_uri() ?>/img/hoyhen.png" alt="hoyhen" width="776" height="981" class="img-responsive size-full wp-image-184" />
    </div>
  <div class="col-xs-6">
      <img class="img-responsive size-full wp-image-180 marginBottom-15" src="<?php echo get_template_directory_uri() ?>/img/palaute.png" alt="palaute" width="899" height="240"/>
      <?php the_content(); ?>
  </div>
</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'visum'); ?></p>
<?php endif; ?>          
</div>
    
<?php get_footer(); ?>
