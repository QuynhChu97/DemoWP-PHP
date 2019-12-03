<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wimpie lite
 */

get_header(); ?>
<div class="ed-container">
    <?php global $post;
    $wimpie_lite_both_sidebar = get_post_meta($post->ID, 'wimpie_lite_sidebar_layout', true);
    if($wimpie_lite_both_sidebar==''){
    	$wimpie_lite_both_sidebar = 'right-sidebar';
    }
    if($wimpie_lite_both_sidebar=='both-sidebar'){
        ?>
    <div class="left-sidbar-right">
        <?php
    }
     ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php wimpie_lite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar('left');
    if($wimpie_lite_both_sidebar=='both-sidebar'){
        ?>
    </div>
        <?php
    } 
     get_sidebar('right');
    ?>
</div>

<?php get_footer(); ?>