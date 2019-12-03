<?php
/**
 * The template for displaying all single posts.
 *
 * @package wimpie lite
 */

get_header(); ?>
<div class="ed-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php wimpie_lite_post_nav(); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
