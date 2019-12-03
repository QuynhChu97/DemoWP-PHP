<?php
/**
 * Template Name: Category page with intro
 *
 * A custom page template for category sections with rich HTML intro.
 *
 * @package Cryout Creations
 * @subpackage nirvana
 * @since nirvana 0.5
 */

get_header(); ?>

	<section id="container" class="<?php echo nirvana_get_layout_class(); ?>">
		<div id="content" role="main">
		
		<?php cryout_before_content_hook(); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : 
			the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'nirvana' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'nirvana' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<div style="clear: both;"></div>
			</div>
			<?php
			// try to retrieve specific template meta parameter
			$slug = basename( esc_url( get_permalink() ) );
			$meta_slug = get_post_meta(get_the_ID(), "slug", $single); // slug custom field
			$meta_catid = get_post_meta(get_the_ID(), "catid", $single); // category_id custom field
			$key = get_post_meta(get_the_ID(), "key", $single); // either slug or category_id custom field
			$slug = ($key?$key:($meta_catid?$meta_catid:($meta_slug?$meta_slug:($slug?$slug:0)))); // select one value out of the custom fields
			?>
		<?php endwhile; endif; ?>
		<br>
		<?php
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$paged = (get_query_var('page')) ? get_query_var('page') : $paged;
		
		if ( is_numeric($slug)&&($slug>0) ):
			$the_query = new WP_Query( apply_filters( 'nirvana_template_catpage_query', array( 
				'cat' 			=> $slug,
				'post_status' 	=> 'publish',
				'orderby'		=> 'date',
				'order'			=> 'desc',
				'posts_per_page'=> get_option('posts_per_page'),
				'paged' 		=> $paged,
			) )	);
		else:
			$the_query = new WP_Query( apply_filters( 'nirvana_template_catpage_query', array( 
				'category_name' => $slug,
				'post_status'	=> 'publish',
				'orderby'		=> 'date', 
				'order'			=> 'desc',
				'posts_per_page'=> get_option('posts_per_page'),
				'paged'			=> $paged,
			) ) );
		endif;
		
		/* The Loop */
		while ( $the_query->have_posts() ) : $the_query->the_post();
			global $more; $more=0; // more gets lost inside page templates
			get_template_part( 'content/content', get_post_format() );
		endwhile;
		
		if ( $nirvanas['nirvana_pagination']=="Enable" ) 
			nirvana_pagination( $the_query->max_num_pages ); 
		else 
			nirvana_content_nav( 'nav-below' ); ?>

		<?php cryout_after_content_hook(); ?>
		</div><!-- #content -->

		<?php nirvana_get_sidebar(); ?>

	</section><!-- #container -->

<?php get_footer(); ?>
