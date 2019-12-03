<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
 *
 * @package Cryout Creations
 * @subpackage nirvana
 * @since nirvana 0.5
 */

get_header(); ?>

		<section id="container" class="one-column">
	
			<div id="content" role="main">
			
			<?php cryout_before_content_hook(); ?>

				<?php get_template_part( 'content/content', 'page'); ?>
				
			<?php cryout_after_content_hook(); ?>

			</div><!-- #content -->
			
		</section><!-- #container -->

<?php get_footer(); ?>
