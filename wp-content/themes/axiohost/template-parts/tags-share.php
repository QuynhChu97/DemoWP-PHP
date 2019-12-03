<?php 
$axiohost_tags =  get_the_tags();
 if(!empty($axiohost_tags) || class_exists('ThemeixAxiohostPlugin')){?>
     <div class="single-tags-share">
        <?php 
           
            if(!empty($axiohost_tags)){?>  
               <ul class="single-tags list-inline float-left">
                  <?php
                      the_tags('',' ','');
                  ?>
               </ul>
            <?php 
            }
            
            if(class_exists('ThemeixAxiohostPlugin')){
                 echo do_shortcode('[social_share_buttons]'); 
            }
        ?>
        
    </div>
 <?php
 }
?>