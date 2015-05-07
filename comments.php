<?php 
// estä sivun suora lataaminen
if (!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
    die(__('Sinulla ei ole pääsyä tälle sivulle.', 'visum'));
}

// jos artikkeli on salasanasuojattu
if (post_password_required()) : ?>
    <p>
       <?php _e('Sivu on salasanasuojattu. Syötä salasana lukeaksesi kommentteja.', 'visum'); ?> 
       <?php return; ?>
    </p>

<?php endif;

if (have_comments()) : ?>
  
<h3><?php comments_number( 'Ei kommentteja', '1 kommentti', '% kommenttia' ); ?></h3>
   
<ul class="media-list">
    <?php wp_list_comments('callback=visum_comments'); ?>
</ul>
    
<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <p>
        <?php _e('Kommentit on suljettu.', 'visum') ?>
    </p>
    <?php endif;

// näytä kommenttilomake
comment_form();
?>