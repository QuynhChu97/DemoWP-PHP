<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wimpie lite
 */

get_header(); ?>
<div class="ed-container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h2 class="page-title">
						<b>
							<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'wimpie-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'wimpie-lite' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'wimpie-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wimpie-lite' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'wimpie-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wimpie-lite' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'wimpie-lite' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'wimpie-lite' );

							else :
								_e( 'Archives', 'wimpie-lite' );

							endif;
							?>
						</b>
					</h2>
					<div class="title-border"></div>
					<?php
					// Show an optional term description.
					$wimpie_lite_term_description = term_description();
					if ( ! empty( $wimpie_lite_term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $wimpie_lite_term_description );
					endif;
					?>
				</header><!-- .page-header -->
				<?php
				$wimpie_lite_cat_portfolio = get_theme_mod('wimpie_lite_portfolio_setting_category');
				$wimpie_lite_layout_portfolio = get_theme_mod('wimpie_lite_archive_setting_portfolio_layout');

				$wimpie_lite_cat_services  =   get_theme_mod('wimpie_lite_services_setting_category');
				$wimpie_lite_cat_teammember = get_theme_mod('wimpie_lite_teammember_setting_category');
				$wimpie_lite_cat_af      =   get_theme_mod('wimpie_lite_awesome_feature_setting_category');
				
				if(is_category($wimpie_lite_cat_portfolio)){
					$wimpie_lite_cat =  'portfolio-'.$wimpie_lite_layout_portfolio;
				}
				elseif(is_category($wimpie_lite_cat_teammember)){
					$wimpie_lite_cat =  'team-member'; 
				}
				elseif(is_category($wimpie_lite_cat_af)){
					$wimpie_lite_cat =  'feature';
				}
				elseif(is_category($wimpie_lite_cat_services)){
					$wimpie_lite_cat = "services";
				}
				else{
					$wimpie_lite_cat =  'archive-list'; 
				}
				$wimpie_lite_blog_post_layout = " ";
				if(get_theme_mod('wimpie_lite_blog_post_layout')){
					$wimpie_lite_blog_post_layout .= get_theme_mod('wimpie_lite_blog_post_layout');
				}
				else{
					$wimpie_lite_blog_post_layout .= "blog_layout1";
				}
				?>
				<div class="archive-wrap <?php echo $wimpie_lite_cat.$wimpie_lite_blog_post_layout; ?>">            

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
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>