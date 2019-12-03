<?php // If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() && get_comments_number() ) {?>
	 <h4 class="sub-title heading-4"><?php comments_number(esc_html__('0 Comments', 'axiohost'), esc_html__('1 Comment','axiohost'),'%'.esc_html__(' Comments', 'axiohost')); ?></h4>
        <div class="comments_template">
        <?php 
            comments_template();
        ?>
        </div>
    <?php
	}
	else if ( !comments_open() && get_comments_number() ) {?>
	 <h4 class="sub-title heading-4"><?php comments_number(esc_html__('0 Comments', 'axiohost'), esc_html__('1 Comment','axiohost'),'%'.esc_html__(' Comments', 'axiohost')); ?></h4>
        <div class="comments_template">
        <?php 
           comments_template();
        ?>
        <p class="comments-closed"> <?php esc_html_e('Comments are closed', 'axiohost'); ?> </p>
        </div>
    <?php
	}
	else if (comments_open() && !get_comments_number() ) {?>
	 <h4 class="sub-title heading-4"><?php comments_number(esc_html__('0 Comments', 'axiohost'), esc_html__('1 Comment','axiohost'),'%'.esc_html__(' Comments', 'axiohost')); ?></h4>
        <div class="comments_template">
        <?php 
           comments_template();
            
        ?>
        </div>
    <?php
	}
	else{
	     echo '';    
	}
        
?>