<?php
    if(!post_password_required()){
         wp_list_comments(array(
    		'avatar_size'	=> 60,
    		'style'			=> 'ul',
    		'callback'		=> 'axiohost_comments',
    		'type'			=> 'all'
    	)); 
    }
     $comments_number = get_comments_number();
 ?>
<div class="comment-pagination <?php if(empty($comments_number)){echo 'minus-comment-spacing';}?>">
    <?php 
        paginate_comments_links(array(
            'prev_text' => esc_html__('<','axiohost'),
            'next_text' => esc_html__('>','axiohost'),
            'mid_size'  => 3
        ));
    ?>
   
</div>
   
<?php

$comments_args = array(
    // Change the title of send button 
    'label_submit' => esc_html__( 'Add Comment', 'axiohost' ),
    // Change the title of the reply section
    'title_reply' => esc_html__( 'Leave a Comment', 'axiohost' ),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    // Redefine your own textarea (the comment body).
    'class_submit' => 'submit_class',
    'fields' => array(
        'author' => '<div class="row"> <div class="col-md-6"><input type="text" class="form-control" name="author" placeholder="'.esc_html__('Your Name*','axiohost').'" required /></div>',
        'email' => '<div class="col-md-6"><input class="form-control" placeholder="'.esc_html__('Your Email*','axiohost').'" name="email" type="email" required></div></div> ',
    ),
    'comment_field' => '<textarea placeholder="'.esc_html__('Type Comment','axiohost').'" class="form-control" id="comment" name="comment" rows="6" aria-required="true"></textarea>',
    'id_form'           => 'commentform',
    'class_form'      => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'   => 'btn-primary btn',
    'title_reply_to'    => esc_html( 'Leave a Reply to %s' ),
    'cancel_reply_link' => esc_html__( 'Cancel Reply', 'axiohost' ),
    'format'            => 'xhtml',

);
comment_form( $comments_args );
?>