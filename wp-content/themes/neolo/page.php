<?php get_header(); ?>

<?php 
if ( ! isset( $content_width ) ) $content_width = 900;
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section>
        <div class="container">
        	<div id="post-<?php the_ID(); ?>" <?php post_class("single-page"); ?>>
	            <h1><?php the_title(); ?></h1>
	            <?php the_content(); ?>
	        </div>

	        <div class="">
        		<?php echo wp_link_pages(); ?>
        	</div>
        </div>
    </section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
