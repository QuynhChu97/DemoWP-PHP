<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nineteen
 */
 get_header(); ?>
<div class="page-blog main-container"style="background-color: #<?php background_color(); ?>">
    <div class="container">
		<div class="margin-100"> </div>
		<div class="blog-post-all row animate " data-anim-type="fadeInLeft" data-anim-delay="400">
			<?php if( have_posts() ) { 
				while ( have_posts() ) { the_post(); ?>
			<!--post-->
            <div class="col-md-8">
				<div class="blog-post mb-5">
					<?php if ( has_post_thumbnail() ) { ?>
			        <div class="blog-post-img mb-3">
			            <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
			        </div>
			        <?php } ?>
					<div class="blog-post-cnt">
						<p class="mb-4"><?php the_content(); ?></p>
					</div>
				</div>
			</div>
			<?php } } get_sidebar(); ?>
		</div>
	</div>
	<div class="margin-100 "> </div>
</div>
<?php get_footer(); ?>