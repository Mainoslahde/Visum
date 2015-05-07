<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Visum
 */
?>

	</div><!-- #content -->

</div><!-- #page -->

<?php if (is_page('from-the-grill')) { ?>
    <div class="rmenu">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/r-menu.png" alt="r-menu" />
    </div>

<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
