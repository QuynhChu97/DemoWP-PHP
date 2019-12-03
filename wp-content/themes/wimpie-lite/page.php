<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package wimpie lite
 */

get_header(); ?>
<div class="ed-container">

<?php 
global $post;
$wimpie_lite_both_sidebar = get_post_meta($post->ID, 'wimpie_lite_sidebar_layout', true);
if($wimpie_lite_both_sidebar=='both-sidebar'){
    ?>
        <div class="left-sidbar-right">
    <?php
}
 ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
get_sidebar('left');
if($wimpie_lite_both_sidebar=='both-sidebar'){
    ?>
        </div>
    <?php
} 
 get_sidebar('right');
?>
</div>
<?php get_footer(); ?>
