<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cryout Creations
 * @subpackage nirvana
 * @since nirvana 0.5
 */

get_header();?>

		<section id="container" class="<?php echo nirvana_get_layout_class(); ?>">
			<div id="content" role="main">
			<?php cryout_before_content_hook(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php cryout_post_title_hook(); ?>
					<div class="entry-meta">
						<?php nirvana_meta_before(); cryout_post_meta_hook(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'nirvana' ), 'after' => '</span></div>' ) ); ?>
					</div><!-- .entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'nirvana_author_bio_avatar_size', 80 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php echo __('About','nirvana').' '.esc_attr( get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by ','nirvana').'%s <span class="meta-nav">&rarr;</span>', get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<footer class="entry-meta">
						<?php nirvana_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'nirvana' ), '<span class="edit-link"><i class="crycon-edit crycon-metas"></i> ', '</span>' ); cryout_post_footer_hook(); ?>
					</footer><!-- .entry-meta -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<i class="crycon-left-dir"></i> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <i class="crycon-right-dir"></i>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			<?php cryout_after_content_hook(); ?>
			</div><!-- #content -->
	<?php nirvana_get_sidebar(); ?>
		</section><!-- #container -->

<?php get_footer(); ?>
