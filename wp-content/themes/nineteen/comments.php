<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nineteen
 */
?>
<section class="comment-section animate " data-anim-type="fadeInUp" data-anim-delay="400">
    <div class="comment_section animate fadeInUp wow" data-anim-type="fadeInUp" data-anim-delay="600">
    	<?php if ( post_password_required() ) : ?>
		<p> <?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'nineteen' ); ?> </p>
		<?php return; 
			endif;
	     	if ( have_comments() ) : ?>
    	<div class="section-titel2 mb-5">
            <h2 class="sction-cntfont-size"> <span> <span><?php echo comments_number(); ?></span></h2>
        </div>
    	<?php wp_list_comments( array( 'callback' => 'nineteen_comment') );
    		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below">
				<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'nineteen' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'nineteen' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'nineteen' ) ); ?></div>
			</nav>
		<?php endif;
    	endif;
    	if ( comments_open() ) :
    		$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$required_text = sprintf( ' ' . esc_html__( 'Required fields are marked %s', 'nineteen' ), '<span class="required">*</span>' );	?>
    		<div class="comment_form" id="contact-form-1">
    			<?php $fields = array(
				        'author' => '<div class="form-group">
				                        <div class="input-group">
				                            <input type="text" name="author" class="form-control" placeholder="' . esc_html__( 'Name&#42;', 'nineteen' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" "' . $aria_req . ' />
				                        </div>
				                    </div>',

				        'email' => '<div class="form-group">
				                        <div class="input-group">
				                            <input type="email" name="email" class="form-control" placeholder="' . esc_html__( 'Email&#42;', 'nineteen' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" "' . $aria_req . ' />
				                        </div>
				                    </div>',

				        'url' =>   '<div class="form-group">
				                        <div class="input-group">
				                            <input type="text" name="url" class="form-control" placeholder="' . esc_html__( 'Website', 'nineteen' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" >
				                        </div>
				                    </div>',
					);

					function my_fields( $fields ) { 
						return $fields;
					}

					add_filter( 'comment_form_default_fields','my_fields' );

						$defaults = array(

						'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
						
						'comment_field' =>  '<div class="form-group">
						                        <div class="input-group mb-2 mb-sm-0">
						                            <textarea id="comment" name="comment" class="form-control" placeholder="Messages" aria-required="true"></textarea>
						                        </div>
						                    </div>
						                    <div class="margin-40 "> </div>',

						'must_log_in' => '<p class="must-log-in text-small">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'nineteen' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',

						'logged_in_as' => '<p class="logged-in-as text-small">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'nineteen' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',

						'comment_notes_before' => '<p class="comment-notes text-small">' . __( 'Your email address will not be published.',  'nineteen' ) . ( $req ? $required_text : '' ) . '</p> <div class="margin-40 "> </div>',

						'title_reply_to' => esc_html__( 'Leave a Reply to %s', 'nineteen' ),

						'id_submit' => 'wl_comment_button',

						'class_submit' => 'btn main-btn',

						'label_submit'=>esc_html__( 'Send Message', 'nineteen' ),

						'comment_notes_after'=>'',

						'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',

						'title_reply_after' => '</h2>',

						'title_reply'=> '<h2>'.esc_html__('Leave a Comment', 'nineteen' ).'</h2>',		

						'role_form'=> 'form',		

						);	
					comment_form($defaults); ?>
    		</div>
    	<?php endif; ?>
    </div>
</section>