<?php
/**
 * The template for displaying search results pages.
 *
 * @package wimpie lite
 */

get_header(); ?>
<div class="ed-container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2 class="page-title"><b><?php printf( __( 'Search Results for: %s', 'wimpie-lite' ), '<span>' . get_search_query() . '</span>' ); ?></b></h2>
				<div class="title-border"></div>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php wimpie_lite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
	
<?php get_sidebar('right'); ?>

</div>
<?php get_footer(); ?>