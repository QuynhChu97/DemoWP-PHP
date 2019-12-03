<?php
/**
 * Dynamic style for site primary color
 */
if (!function_exists('axiohost_css_strip_whitespace')):
    /**
     * Get minified css and removed space
     *
     * @since 1.0.0
     */
    function axiohost_css_strip_whitespace($css) {
        $replace = array("#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
        );
        $search = array_keys($replace);
        $css = preg_replace($search, $replace, $css);
        $replace = array(": " => ":", "; " => ";", " {" => "{", " }" => "}", ", " => ",", "{ " => "{", ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys($replace);
        $css = str_replace($search, $replace, $css);
        return trim($css);
    }
endif;
if (!function_exists('axiohost_hover_color')):
    /**
     * Generate darker color
     * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
     *
     * @since 1.0.0
     */
    function axiohost_hover_color($hex, $steps) {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));
        // Normalize into a six character long hex string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }
        // Split into three parts: R, G and B
        $color_parts = str_split($hex, 2);
        $return = '#';
        foreach ($color_parts as $color) {
            $color = hexdec($color); // Convert to decimal
            $color = max(0, min(255, $color + $steps)); // Adjust color
            $return.= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
            
        }
        return $return;
    }
endif;
if (!function_exists('axiohost_dynamic_styles')):
    /**
     * Dynamic Styles
     */
    function axiohost_dynamic_styles() {
        $axiohost_background_color = get_theme_mod('background_color', '#ffffff');
        $theme_primary_color = get_theme_mod('theme_primary_color', '#DF3550');
        $axiohost_primary_color_hover = axiohost_hover_color($theme_primary_color, '-20');
        $logo_width = get_theme_mod('brand') . 'px';
        if (!empty(get_header_image())) {
            $home_header_bg = '' . get_header_image() . '';
        } else {
            $home_header_bg = '' . AXIOHOST_IMG_URL . '/page-title-img.png';
        }
        if (get_theme_mod('page_title_bg') == 'color') {
            $page_header_bg = get_theme_mod('page_title_bg_color');
        } else {
            $page_header_bg = 'url(' . get_theme_mod('page_title_bg_image') . ')';
        }
        $footer_text_color = get_theme_mod('footer_text_color', '#ffffff');
        $footer_link_color = get_theme_mod('footer_text_color', '#ffffff');
        $output_css = '';
        $output_css.= "section.bg-color2.home-page{ background: url('" . esc_attr($home_header_bg) . "');; }";
        $output_css.= ".post-title-area{ background:" . esc_attr($page_header_bg) . "; }";
        $output_css.= ".navigation-brand a img{ width:" . esc_attr($logo_width) . "; }";
        $output_css.= ".btn,button,input[type='button'],input[type='reset'],input[type='submit'], .bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.reply .comment-reply-link,.widget_search .search-submit,.woocommerce .price-cart:after,.woocommerce ul.products li.product .price-cart .button:hover,.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.added_to_cart.wc-forward,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt[disabled]:disabled,.woocommerce #respond input#submit.alt[disabled]:disabled:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt[disabled]:disabled,.woocommerce a.button.alt[disabled]:disabled:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt[disabled]:disabled,.woocommerce button.button.alt[disabled]:disabled:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt[disabled]:disabled,.woocommerce input.button.alt[disabled]:disabled:hover,.em-cat-menu .category-dropdown li a:hover,.site-primary-nav-wrapper .cv-container,  .em-ticker-section .ticker-title,.slider-btn,.axiohost_slider .slider-btn:hover,.woocommerce-active .product .onsale,.add_to_cart_button,.front-page-slider-block .lSAction > a:hover,.section-title::before,.cv-block-title:before,.woocommerce-products-header .page-title:before,.widget-title:before,.axiohost_category_collection .category-title-btn-wrap .category-btn,.axiohost_category_collection .category-title-btn-wrap .category-btn:hover,.post-date-attr,.em-scroll-up,.header_sticky.shrink,.follow-us-section .follow-us-content a , button#menu-toggle:hover,button#menu-toggle:focus{ background-color:" . esc_attr($theme_primary_color) . ";}";
        $output_css.= "a,a:hover,a:focus,.blog-content h4 a, [class*=light-text] .btn,.headeing-2 span,.section-label, .cart-popup-wrapper .cart-popup-btn a,.slider-content .slider-btn2,.slider-content .slider-btn:hover,
.slider-content .slider-btn2:hover, .banner-carousel2 .content-box.center-align .link-box .theme-btn,.domain-search-form button,.faq-listed .faq-heading button:hover,
.faq-listed .faq-heading button:focus, .solution-list .solution-list-item:before,.solution-tab-nav li a.active,
.solution-tab-nav li a:hover,.call-to-wrapper .call-to-btn-wrapper a.call-to-btn:hover,.call-to-wrapper .call-to-btn-wrapper a.call-to-btn2,.transfer-domain-form button[type=\"submit\"],.pricing-plan-controls .controls-btn,.pricing-plan-box .pricing-big,.pricing-plan-box .pricing-btn:hover,.pricing-plan-box2 .pricing-btn:hover,.pricing-plan-box3 .pricing-btn:hover,.pricing-plan-box4 h2 , 
.pricing-plan-box4 .pricing-btn:hover, .pricing-plan-box4 .pricing-btn:focus, .pricing-plan-table thead,.pricing-plan-table tbody td .pricing-btn,.testimonial-box .testimonial-content h4 a:hover , .checkout-form button[type=\"submit\"], .blog-post .blog-content h4 a:hover,
.blog-post .blog-content h4 a:focus , .blog-post .blog-content .recent-meta li a:hover,.blog-post .blog-content .blog-readmore-btn:hover,.blog-post .blog-content .blog-readmore-btn2,.error-btn:hover,.single-post .calender-day,
.page-pagination .next-btn:hover,
.page-pagination .prev-btn:hover, .single-comment-title,.single-comment-title,.single-comment-desc .single-comment-btn, .comment-form-title,.sidebar-title, .blog-post .blog-content h4 a:hover, .blog-post .blog-content h4 a:focus , .sidebar-title,.category-widget li.list-group-active:before,
.category-widget li:hover:before, .category-widget li:hover a,
.category-widget li.list-group-active a , .recent-widget .recent-wrapper .recent-details h6 a:hover, .tag-widget li a:hover, .sidebar-title span, .footer-title span, .widget li a:hover,.widget li a:focus, .hosting-solution-wrapper .hosting-text-big, .hosting-solution-wrapper .hosting-to-btn:hover,
.hosting-solution-wrapper .hosting-to-btn:focus, .got-questions-wrapper .got-questions-btn, .register-form button[type=\"submit\"]:hover , .contact-form button[type=\"submit\"], .shop-product-box .shop-product-rating li, .shop-product-box h4 a:hover,.shop-product-box .price-discount,.single-shop-content .shop-product-rating li,.single-shop-content .price-discount,.simplecart-box .cart-btn,.footer-contact .footer-contact-intro .footer-contact-icon i ,.footer-widget .footer-title,.footer-widget .footer-latest-content a:hover,.footer-widget .footer-category li a:hover,.footer-copyright a ,h4.sub-title span,li.recentcomments > a,a.rsswidget,.comment-pagination .prev, .comment-pagination .next, .contact-form div.wpcf7-mail-sent-ok, 
#wdc-style .small button#Submit, [class*=light-text] .btn
,.headeing-2 span,.section-label ,  .cart-popup-wrapper .cart-popup-btn a , .dropdown-toggle:hover,
.dropdown-toggle:focus

{color:" . esc_attr($theme_primary_color) . ";}";
        $output_css.= ".btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show>.btn-primary.dropdown-toggle, .lds-roller div:after, .searchBoxTop button[type=\"submit\"] , .feature-box .feature-logo, .feature-box2:hover .feature-logo, .service-box:hover, .solution-step .solution-step-round, .pricing-plan-controls .controls-btn.active,
.pricing-plan-controls .controls-btn:hover, .pricing-plan-box .pricing-btn, .pricing-plan-box2 .pricing-header, .pricing-plan-box2 .pricing-btn , .pricing-plan-box3 .pricing-header, .pricing-plan-box3 .pricing-btn , .pricing-plan-box4 .pricing-btn, .pricing-plan-table thead, .testimonial-slider .slick-dots li.slick-active button , .testimonial-box:hover, .testimonial-box:focus, .plan-list-table thead, .cart-table thead, 
.checkout-form button[type=\"submit\"]:hover, .checkout-total-list thead, .blog-post .calender-month, blog-post .blog-content .blog-readmore-btn2:focus, .page-navigation .pagination li a.active,
.page-navigation .pagination li a:hover, .error-content .error-btn , .single-post .calender-month, .single-post .single-quote:before, .comment-form button[type=\"submit\"], .hosting-solution-wrapper .hosting-to-btn , .got-questions-wrapper .got-questions-btn:hover,
.got-questions-wrapper .got-questions-btn:focus , .register-form button[type=\"submit\"], .contact-form button[type=\"submit\"]:hover, .single-shop-content .add-to-cart-btn,.cart-search-form button, .cart-wrapper .cart-procced-btn,.simplecart-box .cart-body, .simplecart-box .cart-btn:hover, nav.pagination .nav-links .page-numbers:hover, nav.pagination .nav-links .page-numbers:focus,nav.pagination .nav-links .page-numbers:active,span.page-numbers.current,.prev,.next , .comment-form input[type=\"submit\"],.comment-pagination .prev, .comment-pagination .next 
, .blog-post .blog-content .blog-readmore-btn2:hover, .blog-post .blog-content .blog-readmore-btn2:focus, .bg-color2, #scrollUp, .pricing-plan-box4 .pricing-badge, .simplecart-box .cart-angle, li.page-item a:hover, li.page-item a:focus,.single-post .single-tags-share .single-tags a:hover, .single-post .single-tags-share .single-tags a:focus,.single-page-numbers a:hover, .single-page-numbers .current,.sidebar-title:after, .footer-title:after, h4.sub-title:before, h3#reply-title:after,   .feature-box2:hover span.elementor-icon, form.post-password-form p > input, h4.sub-title:before, #wp-calendar caption, .tagcloud a:hover
{  background-color:" . esc_attr($theme_primary_color) . "; }";
        $output_css.= "li.page-item a:hover, .single-post .single-tags-share .single-tags a:hover, .single-post .single-tags-share .single-tags a:focus, .wp-block-quote , #wp-calendar tbody td#today:after
	   ,.comment-pagination .prev, .comment-pagination .next, .contact-form div.wpcf7-mail-sent-ok, form.post-password-form p > input, .searchBoxTop button[type=\"submit\"], .pricing-plan-controls .controls-btn , .pricing-plan-controls .controls-btn.active, .pricing-plan-box .pricing-btn:hover,
.pricing-plan-controls .controls-btn:hover,.pricing-plan-box2 .pricing-btn:hover,.pricing-plan-box3 .pricing-btn:hover, .pricing-plan-box4 .pricing-btn:hover, .pricing-plan-box4 .pricing-btn:focus, .pricing-plan-table tbody td .pricing-btn, .checkout-form button[type=\"submit\"]:hover,  .error-btn:hover , .register-form button[type=\"submit\"], .register-form button[type=\"submit\"]:hover , .contact-form button[type=\"submit\"]:hover, .shop-thumbnail-small .slide.slick-current, .shop-single-tab li a.active, .simplecart-box .cart-anglehover, .simplecart-box .cart-btn, .single-page-numbers a:hover , .single-page-numbers .current, blockquote, #scrollUp, button#menu-toggle:hover,button#menu-toggle:focus
	   {  border-color:" . esc_attr($theme_primary_color) . "; }";
        $output_css.= ".footer-copyright-text { color:" . esc_attr($footer_text_color) . "; }";
        $refine_output_css = axiohost_css_strip_whitespace($output_css);
        wp_register_style('axiohost-inline-style', false);
        wp_enqueue_style('axiohost-inline-style');
        wp_add_inline_style('axiohost-inline-style', $refine_output_css);
    }
endif;
add_action('wp_enqueue_scripts', 'axiohost_dynamic_styles');
