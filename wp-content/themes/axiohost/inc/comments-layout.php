<?php 
    function axiohost_comments($comment, $args, $depth) {?>
    	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    		
    		<div class="axiohost-comment">
    					
    			<div class="author-img">
    				<?php echo get_avatar($comment,$args['avatar_size']); ?>
    			</div>
    			
    			<div class="comment-meta">
                    <h6 class="author">
                        <?php echo get_comment_author_link(); ?>
                        <span class="reply-link">
                            <?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'axiohost'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?> 
                        </span>
                    </h6>
                    <div class="date-and-edit"><span class="date"><?php printf(esc_html('%1$s'), esc_html(get_comment_date())); ?></span></div>
    				<?php if ($comment->comment_approved == '0') : ?>
    					<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'axiohost'); ?></em>
    					<br />
                    <?php endif; ?>
                    <div class="comment-text">
                        <?php comment_text(); ?>
                    </div>
    				
    			</div>
    					
    		</div>
    		
    		
    	</li>
    
    	<?php 
    }