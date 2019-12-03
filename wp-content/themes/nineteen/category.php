<?php
/**
 * The template for displaying Category Posts
 *
 * @package nineteen
 */
get_header(); ?>
<!--blogo-page-cont-->
<div class="page-blog main-container"style="background-color: #<?php background_color(); ?>">
    <div class="container">
		<div class="margin-100"> </div>
		<?php get_template_part('post-content'); ?>
    </div>
    <div class="margin-100 "> </div>
</div>
<?php get_footer(); ?>