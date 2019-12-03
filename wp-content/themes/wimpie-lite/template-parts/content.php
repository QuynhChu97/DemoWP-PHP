<?php
/**
 * @package WimpieLite
 */
?>
<?php
$wimpie_lite_cat_portfolio = get_theme_mod('wimpie_lite_portfolio_setting_category');
$wimpie_lite_read_more_port = get_theme_mod('wimpie_lite_archive_setting_portfolio_readmore','Read More');
$wimpie_lite_wl_port_style = get_theme_mod('wimpie_lite_archive_setting_portfolio_layout');
$wimpie_lite_cat_teammember = get_theme_mod('wimpie_lite_teammember_setting_category');
$wimpie_lite_cat_services  =   get_theme_mod('wimpie_lite_services_setting_category');
$wimpie_lite_cat_af      =   get_theme_mod('wimpie_lite_awesome_feature_setting_category');

$wimpie_lite_read_more_archive = get_theme_mod('wimpie_lite_archive_setting_archive_readmore','Read More');

if(!empty($wimpie_lite_cat_portfolio) && is_category() && is_category($wimpie_lite_cat_portfolio)): 
	?>
<div class="portfolio-archive clearfix <?php if($wimpie_lite_wl_port_style=='list'){ echo 'list'; } ?>">
	<article id="post-<?php the_ID(); ?>" class="cat-portfolio-list ">
		<?php 
		$wimpie_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wimpie-lite-portfolio-thumbnail', false ); 
		if($wimpie_lite_wl_port_style=='list'){
			?>
			<div class="cat-portfolio-image">
				<img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="cat-portfolio-content">
				<h3 class="entry-title"><?php the_title(); ?></h3>
				<div class="port-content"><?php echo esc_attr(wimpie_lite_excerpt(get_the_content(), 250, true)); ?></div>
				<a  class="bttn" href="<?php the_permalink(); ?>"><?php echo esc_attr($wimpie_lite_read_more_port); ?></a>
			</div>
			<?php 
		} else {
			?>
			<a class="fancybox-gallery" href="<?php the_permalink(); ?>" data-lightbox-gallery="gallery">
				<div class="cat-portfolio-image">
					<div class="cat-port-image-wrapper">
						<img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>">
					</div>
					<div class="portofolio-layout-wrap">
						<div class="portofolio-layout-wrapper">
							<h1 class="entry-title"><?php the_title(); ?></h1>  
							<a class="read-more" href="<?php the_permalink(); ?>"> <?php echo esc_attr($wimpie_lite_read_more_port); ?> </a>
						</div>   
					</div>
				</div>
			</a>
			<?php
		}
		?>
	</article>
</div>
<!-- Portfolio End -->
<?php
elseif(!empty($wimpie_lite_cat_teammember) && is_category() && is_category($wimpie_lite_cat_teammember)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-event-list">
	<div class="entry-content">
		<div class="team-block">
			<a href="<?php the_permalink(); ?>">
				<figure class="team-image">
					<?php if (has_post_thumbnail()):
					$wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-team-image'); ?>
					<img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
					endif;
					?>
					<div class="team-hover">
						<div class="team-hover-title"><?php echo get_the_title();?>
							<div class="team-hover-text"><?php echo esc_attr(wimpie_lite_excerpt(get_the_content(), 60));?></div>
						</div>
					</div>
				</figure>
			</a> 
		</div>        
	</div><!-- .entry-content -->
</article>
<!-- TeamMember End -->
<?php
elseif(!empty($wimpie_lite_cat_services) && is_category() && is_category($wimpie_lite_cat_services)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-event-list">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if( has_post_thumbnail() ){
			$wimpie_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail', false );
			?>
			<div class="cat-event-image">
				<img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>">
			</div>
			<?php
		} ?>
		<div class="cat-event-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
			<div><?php echo esc_attr(wimpie_lite_excerpt( get_the_content() , 400 )); ?></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="cat-event-more bttn"><?php echo esc_attr($wimpie_lite_read_more_archive);?></a>
	</div><!-- .entry-content -->
</article>
<!-- Services End -->
<?php 
elseif(!empty($wimpie_lite_cat_af) && is_category() && is_category($wimpie_lite_cat_af)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-event-list">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if( has_post_thumbnail() ){
			$wimpie_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wimpie-lite-feature-grid-image', false ); 
			?>
			<div class="cat-event-image">
				<img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>">
			</div>
			<?php
		} ?>
		<div class="cat-event-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
			<?php 
			?>
			<div><?php echo esc_attr(wimpie_lite_excerpt( get_the_content() , 200 )) ?></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="cat-event-more bttn"><?php echo esc_attr($wimpie_lite_read_more_archive);?></a>
	</div><!-- .entry-content -->
</article>
<!-- Portfolio End -->
<?php
else: ?>
<?php
$wimpie_lite_blog_post_layout = " ";
if(get_theme_mod('wimpie_lite_blog_post_layout')){
	$wimpie_lite_blog_post_layout .= get_theme_mod('wimpie_lite_blog_post_layout');
}
else{
	$wimpie_lite_blog_post_layout .= "blog_layout1";
}
if(has_post_thumbnail()){
	if($wimpie_lite_blog_post_layout==' blog_layout2' || $wimpie_lite_blog_post_layout==' blog_layout3' ) {
		$wimpie_lite_image_size = 'wimpie-lite-archive-image-medium';
	}
	else {
		$wimpie_lite_image_size = 'wimpie-lite-archive-image';
	}
	$wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(),$wimpie_lite_image_size);
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!is_search() ) : // Only display image if not in Search ?>
		<?php if(has_post_thumbnail()){?>
		<div class="archive-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo $wimpie_lite_image[0] ?>" alt="<?php the_title(); ?>">
			</a>
		</div>
		<?php } ?>
	<?php endif; //end if search?>
	<div class="text-content">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php wimpie_lite_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if (is_search() ) ://on search page show excerpt ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_attr($wimpie_lite_read_more_archive); ?></a>
			</div><!-- .entry-summary -->
		<?php else: ?>
			<div class="entry-content">
				<div class="short-content">
					<?php 
					if(is_home()):
						the_content();
					elseif($wimpie_lite_blog_post_layout == ' blog_layout1' ||
						$wimpie_lite_blog_post_layout == ' blog_layout2' ||
						$wimpie_lite_blog_post_layout == ' blog_layout3'):
						echo esc_attr(wimpie_lite_excerpt( get_the_content() , 300 ));
					else:
						the_content();
					endif;
					?>
				</div>
				<a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_attr($wimpie_lite_read_more_archive); ?></a>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'wimpie-lite' ),
					'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
			<?php endif; ?>
			<footer class="entry-footer">
				<?php
				// Hide category and tag text for pages on Search
				//translators: used between list items, there is a space after the comma
				if ( 'post' == get_post_type() ) : 
					$wimpie_lite_categories_list = get_the_category_list( __( ', ', 'wimpie-lite' ) );

				if ( $wimpie_lite_categories_list && wimpie_lite_categorized_blog() ) : ?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'wimpie-lite' ), $wimpie_lite_categories_list ); ?>
				</span>
				<?php 
					endif; // End if categories 
					// translators: used between list items, there is a space after the comma
					$wimpie_lite_tags_list = get_the_tag_list( '', __( ', ', 'wimpie-lite' ) );
					if ( $wimpie_lite_tags_list ) : ?>
					<span class="tags-links">
						<?php printf( __( 'Tagged %1$s', 'wimpie-lite' ), $wimpie_lite_tags_list ); ?>
					</span>
					<?php 
					endif; // End if $wimpie_lite_tags_list ?>
					<?php
					endif; // End if 'post' == get_post_type() ?>
				</footer><!-- .entry-footer -->
			</div>
			<div class="clearfix"></div>
		</article><!-- #post-## -->
	<?php endif; ?>