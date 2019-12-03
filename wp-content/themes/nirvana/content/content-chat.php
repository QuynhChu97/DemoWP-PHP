<?php
/**
 * The template for displaying posts in the Link Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package Cryout Creations
 * @subpackage Nirvana
 * @since Nirvana 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
			<h2 class="entry-title">
				<span class="entry-format"><i class="crycon-comment" title="<?php _e( 'Chat', 'nirvana' ); ?>"></i></span>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nirvana' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php cryout_post_title_hook(); ?>
			<div class="entry-meta">
				<?php cryout_post_meta_hook(); ?>
			</div><!-- .entry-meta -->	
		</header><!-- .entry-header -->
		
		<?php cryout_post_before_content_hook(); ?>
		
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nirvana' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'nirvana' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>
			
		<footer class="entry-meta">
			<?php cryout_post_after_content_hook();  ?>
		</footer>

	</article><!-- #post-<?php the_ID(); ?> -->
