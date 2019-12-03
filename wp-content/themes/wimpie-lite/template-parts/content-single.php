<?php
/**
 * @package wimpie lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><b>', '</b></h2><div class="title-border"></div>' ); ?>
        <?php the_post_thumbnail(); ?>
		<div class="entry-meta">
			<?php wimpie_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

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
		<?php wimpie_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->