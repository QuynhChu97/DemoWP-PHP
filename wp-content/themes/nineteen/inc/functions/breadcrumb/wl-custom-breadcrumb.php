<?php
/* File Security Check */
defined( 'ABSPATH' ) or die();

/* get page title */
if( ! function_exists( 'wl__breadcrumb_trail' ) ) {
    function wl__breadcrumb_trail() {
        if ( ! is_front_page() && ! is_home() ) { 
            if ( is_archive() ) {
                if( have_posts() ) {
                    if ( is_day() ) :
                        esc_html_e( 'Daily Archives: ', 'nineteen' );
                        echo '<span>' . esc_html( get_the_date() ) . '</span>';
                    elseif ( is_month() ) :
                        esc_html_e( 'Monthly Archives: ', 'nineteen' );
                        echo '<span>' . esc_html( get_the_date( _x( 'F Y', 'monthly archives date format', 'nineteen' ) ) ) . '</span>';
                    elseif ( is_year() ) :
                        esc_html_e( 'Yearly Archives: ', 'nineteen' );
                        echo '<span>' . esc_html( get_the_date( _x( 'Y', 'yearly archives date format', 'nineteen' ) ) ) . '</span>';
                    else :
                        esc_html_e( 'Archives ', 'nineteen' );
                    endif;
                } elseif ( is_tag() ) {
                    esc_html_e( 'Tag Archives: ', 'nineteen' );
                    echo '<span>' . esc_html( single_tag_title( '', false ) ) . '</span>';
                } elseif ( is_category() ) {
                    esc_html_e( 'Category Archives: ', 'nineteen' );
                    echo '<span>' . esc_html( single_cat_title( '', false ) ) . '</span>';
                } elseif ( is_author() ) {
                    esc_html_e( 'Author Archives: ', 'nineteen' );
                    echo '<span class="vcard">' . esc_html( get_the_author() ) . '</span>';
                }
            } elseif ( is_search() ) {
                esc_html_e( 'Search Results for: ', 'nineteen' );
                echo '<span>' . esc_html( get_search_query() ) . '</span>';
            } elseif ( is_404() ) { 
                esc_html_e( '404 Error - Page Not Found', 'nineteen' );
            }
            else {
                esc_html( the_title() );
            }
        } else {
            esc_html_e( 'Home', 'nineteen' );
        }
    }
}

?>