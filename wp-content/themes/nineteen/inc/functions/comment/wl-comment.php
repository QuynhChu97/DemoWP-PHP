<?php // code for comment
if ( ! function_exists( 'nineteen_comment' ) ) :
  	function nineteen_comment( $comment, $args, $depth ) {
  		$GLOBALS['comment'] = $comment;
		//get theme data
		  global $comment_data;
		//translations
		  $leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
		  __( 'Reply', 'nineteen' ); ?>
		<div class="media comment_box" id="comment-<?php comment_ID(); ?>">
			<a class="pull_left_comment" href="#">
		        <?php $argss = array( 'class' => 'comment_img img-fluid', 'alt' => 'img' );
		         echo get_avatar( $comment, $size = '70', $argss ); ?>
		    </a>
            <div class="media-body">
                <div class="comment_detail">
                    <span class="comment_date">
                    	<?php if ( ('d M  y') == get_option( 'date_format' ) ) : comment_date('d F Y'); else : comment_date(); endif;             	?>        		
                    </span> 
                    <h4 class="comment_detail_title">
                    	<?php $avatar = get_comment_author();
                    		$author_url = get_comment_author_url();
							if ( ! empty( $author_url ) && 'http://' !== $author_url ) {
								$avatar = '<a href="' . esc_attr( $author_url ) . '" rel="external nofollow" class="rollover" target="_blank">' . esc_html( $avatar ) . '</a>';
                                echo $avatar ;
							} else {
								echo esc_html( $avatar );
							} ?>
                    </h4>
                    <p><?php comment_text(); ?></p>
                    <div class="reply">
                        <a class="btn main-btn" href="#"> <?php esc_html_e( 'Like', 'nineteen' ); ?>  </a>
                    	<?php comment_reply_link( array_merge( $args, array( 'reply_class' => 'btn main-btn', 'reply_text' => $leave_reply, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
			            <em class="comment-awaiting-moderation">
			            	<?php esc_html_e( 'Your comment is awaiting moderation.', 'nineteen' ); ?>		
			            </em>
			            <br/>
			        <?php endif; ?>
                </div>
            </div>
        </div>
<?php } endif; ?>