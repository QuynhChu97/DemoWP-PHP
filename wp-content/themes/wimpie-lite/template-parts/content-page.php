<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wimpie lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><b>', '</b></h2><div class="title-border"></div>' ); ?>
	</header><!-- .entry-header -->
    <div class="single-image">
    <?php the_post_thumbnail( 'wimpie-lite-singlepage-image' ); ?>
    </div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wimpie-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'wimpie-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->