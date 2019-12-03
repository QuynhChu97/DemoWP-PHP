<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * Learn more: https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nineteen
 */
 
get_header(); ?>
<div class="page-blog main-container"style="background-color: #<?php background_color(); ?>">
    <div class="container">
		<div class="margin-100"></div>
		<div class="section-heading text-center animate " data-anim-type="zoomIn" data-anim-delay="600">
            <h2 class="section-description"><?php esc_html_e( 'Oops!', 'nineteen' ) ?></h2>
			<h4><?php esc_html_e( 'We can\'t seem to find the page you\'re looking for.', 'nineteen' ) ?></h4>
			<a class="btn main-btn" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Go Back To Home', 'nineteen' ) ?></a>
        </div>
	</div>
	<div class="margin-100"></div>
</div>
<?php get_footer(); ?>