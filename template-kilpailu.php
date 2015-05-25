<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Visum
 
 Template name: Kilpailu */

?>
    
<?php get_header(); ?>

<div class="container-fluid">        
        <?php /* Sandy vs Bablo äänestyslomake */ ?>
       
       <div class="content">     
        <script type="text/javascript">var submitted=false;</script>
        <iframe name="hidden_iframe" id="hidden_iframe"
        style="display:none;" onload="if(submitted)
        {window.location='./confirmation-page';}"></iframe>
        <form action="#" method="post" target="hidden_iframe" id="arvontaForm" onsubmit="submitted=true;">
            <ol role="list" class="ss-question-list" style="padding-left: 0">
                <div class="ss-form-question errorbox-good" role="listitem">
                    <div dir="ltr" class="ss-item ss-item-required ss-radio">
                        <div class="ss-form-entry">
                        <label class="ss-q-item-label" for="entry_341244083">
                            <div class="ss-q-title">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/aanestys2/sandybablo_title.png" alt="drinkit otsikko" class="img-responsive center-block" width="37%">
                                <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                            </div>
                        </label>
                        <div class="row">
                        <ul class="ss-choices" role="radiogroup" aria-label="Parempi Juoma?  ">
                           <div class="col-xs-4">
                            <li class="ss-choice-item">
                                <label>
                                    <span class="ss-choice-item-control goog-inline-block clearfix">
                                    <input type="radio" name="entry.551993266" value="Sandy" id="group_551993266_1" title="Valitse juoma" role="radio" class="required" aria-label="Sandy" required="true" aria-required="true">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/aanestys2/juoma1.png" alt="sandy" class="img-responsive center-block">
                                    </span>

                                </label>
                            </li> 
                            </div>
                            <div class="col-xs-3"><img src="<?php echo get_template_directory_uri(); ?>/img/guide.png" alt="ohje" class="img-responsive center-block"></div>
                            <div class="col-xs-4">
                            <li class="ss-choice-item">
                                <label>
                                    <span class="ss-choice-item-control goog-inline-block clearfix">
                                    <input type="radio" name="entry.551993266" value="Bablo" id="group_551993266_2" title="Valitse juoma" role="radio" class="required" aria-label="Bablo" required="true" aria-required="true"><img src="<?php echo get_template_directory_uri(); ?>/img/aanestys2/juoma2.png" alt="bablo"  class="img-responsive center-block"></span>                                    
    
                                </label>
                            </li>
                            </div>
                        </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="tiedot-wrapper clearfix"> 
                <div class="ss-form-question errorbox-good" role="listitem">
                    <div dir="ltr" class="ss-item  ss-text">
                        <div class="ss-form-entry">
                            <label class="ss-q-item-label" for="entry_1524474309">
                                <div class="ss-q-title">Etu- ja sukunimi * </div>
                                <div class="ss-q-help ss-secondary-text" dir="ltr"></div>
                            </label>
                            <input type="text" name="entry.1129769129" value="" class="required form-control" id="entry.1129769129" dir="auto" aria-label="Etu- ja sukunimi  " title="Syötä nimesi" required="true">
                        </div>
                    </div>
                </div> 
                <div class="ss-form-question errorbox-good" role="listitem">
                    <div dir="ltr" class="ss-item  ss-text">
                        <div class="ss-form-entry">
                            <label class="ss-q-item-label" for="entry_1779279613">
                                <div class="ss-q-title">Sähköposti * </div>
                                <div class="ss-q-help ss-secondary-text" dir="ltr"></div>
                            </label>
                            <input type="email" name="entry.1557860943" value="" class="form-control {validate:{required:true, email:true, messages:{required:'Please enter your email address', email:'Please enter a valid email address'}}}" id="required" dir="auto" aria-label="Sähköposti  Must be a valid email address" title="Syötä sähköpostiosoite muodossa email@email.com" required="true">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="draftResponse" value="[,,&quot;1662286536667752852&quot;]">
                <input type="hidden" name="pageHistory" value="0">


                <input type="hidden" name="fbzx" value="1662286536667752852">

                <div class="ss-item ss-navigate">
                    <table id="navigation-table">
                        <tbody>
                            <tr>
                                <td class="ss-form-entry goog-inline-block" id="navigation-buttons" dir="ltr">
                <input type="submit" name="submit" value="Äänestä" id="ss-submit" class="jfk-button jfk-button-action ">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </ol>
        </form>    
    </div>          
</div>
    
<?php get_footer(); ?>
