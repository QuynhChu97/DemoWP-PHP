<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nineteen
 */
get_header(); ?>
<!--blogo-page-cont-->
<div class="page-blog main-container" style="background-color: #<?php background_color(); ?>">
    <div class="container">
		<div class="margin-100"> </div>
		<?php get_template_part('post-content'); ?>
    </div>
    <div class="margin-100 "> </div>
</div>
<?php get_footer(); ?>