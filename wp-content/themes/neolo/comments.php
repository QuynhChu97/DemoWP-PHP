<?php if ( post_password_required() ) {
	return;
} ?>
	<div id="comments">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
      		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
      			<p class="no-comments">
      				<?php _e( 'Comments are closed.', 'neolo' ); ?>
      			</p>
      		<?php endif; ?>
      		<?php comment_form(); ?>
          <?php if ( have_comments() ) : ?>
      			<h5 class="comments-title"></h5>
      			<ul class="comment-list">
      				<?php 
      				wp_list_comments( array(
      					'short_ping'  => true,
      					'avatar_size' => 0,
      				) );
      				?>
      			</ul>
      		<?php endif; ?>
        </div>
      </div>
      
    </div>
		
	</div>