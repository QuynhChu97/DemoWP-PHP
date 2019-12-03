<?php
/**
 * The template for displaying author's Posts
 *
 * Used to display author's Posts if nothing more specific matches a query.
 * For example, puts together date-based Posts if no date.php file exists.
 *
 * If you'd like to further customize these author's views, you may create a
 * new template file for each one. For example, author.php (Author archives), etc.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
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