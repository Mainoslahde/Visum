<?php
/**
 * @package Visum
 */
?>

<!-- Kommenttipaneeli -->
<div class="cd-panel from-left">
    <header class="cd-panel-header">
        <h3>Kommentoi</h3>
        <a href="#0" class="cd-panel-close">Close</a>
    </header>
    <div class="cd-panel-container">
        <div class="cd-panel-content" id="content">
            <?php 
                //Näytä kommentit + lomake
                comments_template('', true); 
            ?>                                        
        </div> <!-- cd-panel-content -->
    </div> <!-- cd-panel-container -->
</div> <!-- cd-panel -->

<?php
    // Näytä jos kommentit on sallittu
    if ( comments_open() && is_user_logged_in() ) :
        echo '<a href="#0" class="cd-btn"><div class="comments"><p><i class="fa fa-comments"></i> ';
        //Näytä kommenttien lukumäärä
        comments_number( '0', '1', '%' );
        echo '</p></div></a>';
    endif;
?>