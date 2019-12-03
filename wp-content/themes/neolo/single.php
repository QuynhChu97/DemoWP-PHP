<?php get_header(); ?>
<?php
if ( ! isset( $content_width ) ) $content_width = 900;
if ( have_posts() ) :
	?>
	<section class="single-post">
        <div class="container">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content-single', get_post_format() );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
					paginate_comments_links();
				endif;
			    wp_reset_postdata();
			?>	

		</div>
		
	</section>
			<div class="navigation">
				<p><?php previous_post_link('%link', __( '< Previous', 'neolo')); ?> | <?php next_post_link('%link',  __( 'Next >', 'neolo')); ?></p>
			</div>
	<?php
endwhile; 
endif;
?>


<?php get_footer(); ?>