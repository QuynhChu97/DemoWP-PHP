<?php 
/*
    Template Name: Page with Full Width
*/
get_header(); 
?>
<!-- Start Post Title Area -->
<section class="post-title-area bg-color2">
 <div class="container">
	<div class="post-title-content">
	   <h1 class="heading-1"><?php wp_title(' '); ?></h1>
	</div>
 </div>
 <div id="post-title-shape"></div>
</section>

<!-- End Post Title  Area -->
<div id="content" class="blog-area">
 <div class="blog-wrapper">
	<div class="container">
	   <div class="row">
		  <div class="col-md-12">   
			 <div id="post-<?php the_ID(); ?>">
					<?php 
						 get_template_part('template-parts/content', 'content'); 
						 get_template_part('template-parts/comments-template', 'comments-template');
					?>  
			 </div>
		  </div>

	   </div>
	</div>
 </div>
</div>
<!-- End Blog Area -->
 <?php get_footer(); ?>