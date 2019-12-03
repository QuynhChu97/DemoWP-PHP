<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package wimpie lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

            	<header class="entry-header">
        		<h1 class="entry-title ed-container"><?php _e( 'Oops! That page can&rsquo;t be found.', 'wimpie-lite' ); ?></h1>
        		</header><!-- .entry-header -->
        
        	<div class="ed-container">
    			<div class="page-content">
    				<p><?php _e( 'It looks like nothing was found at this location.', 'wimpie-lite' ); ?></p>
    			</div><!-- .page-content -->
                <div class="number404-box">    
                    <div class="number404 animated">
                        <?php _e('404', 'wimpie-lite');?> 
                    <span><?php _e('error', 'wimpie-lite');?></span>   
                    </div>
                </div>
	       </div>
</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>