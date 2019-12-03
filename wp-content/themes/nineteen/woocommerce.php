<?php
/**
 * The Template for Woocommerce.
 */
get_header();
?>
<div class="page-blog main-container"style="background-color: #<?php background_color(); ?>">
    <div class="container">
		<div class="margin-100"> </div>
		<div class="blog-post-all row animate " data-anim-type="fadeInLeft" data-anim-delay="400">
			<!--post-->
            <div class="col-md-8">
				<div class="blog-post mb-5" id="post-<?php the_ID(); ?>">
					<div class="blog-post-cnt">
						<p class="mb-4"><?php woocommerce_content(); ?></p>
					</div>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="margin-100 "> </div>
</div>
<?php 
get_footer();
?>