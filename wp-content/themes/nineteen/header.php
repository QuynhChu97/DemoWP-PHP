<?php 
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nineteen
 */
?>
<!Doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php if( get_theme_mod( 'show_hs' ) ){
                $output = get_theme_mod( 'header_script' ); 
                echo ( $output );
          }
    ?>
</head>

<body <?php body_class(); ?> >

<!--header-part-->
<div class="header_banner header_banner_page clearfix">
    <header>
        <!--navbar-->
        <nav class="navbar navbar-expand-sm animate " data-anim-type="fadeInLeft" data-anim-delay="400">
            <div class="container navbar-containernt animate " data-anim-type="fadeInRight" data-anim-delay="400">
                <!-- Brand -->
				<div class="col-md-3 mob-menu">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    if ( has_custom_logo() ) { ?>
					
                <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
                    <img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_html( bloginfo('name') ); ?>" class="img-fluid" <?php if ( wl_theme_is_companion_active() ) { ?> style="height: <?php echo esc_attr(get_theme_mod('nineteen_logo_heigth','70')); ?>px;
                            width: <?php echo esc_attr(get_theme_mod('nineteen_logo_width','180')); ?>px;" <?php } ?>>
                </a>
                <?php if (display_header_text()==true){ ?>
                <p><span class="site-description"><?php esc_html( bloginfo('description') ); ?></span></p>
                <?php } } else { ?>
                <?php if (display_header_text()==true){ ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
                    <span class="site-title"><?php esc_html( bloginfo('name') ); ?></span>
                </a>
                <p><span class="site-description"><?php esc_html( bloginfo('description') ); ?></span></p>
                <?php }
                    }
                ?>
				</div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa fa-bars"> </span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php wp_nav_menu( array(
                          'theme_location' => 'primary',
                          'menu_class'     => 'navbar-nav nav justify-content-center',
                          'container'      => false,
                          'menu_id'        => false,
                          'fallback_cb'    => 'wl_fallback_page_menu',
                          'walker'         => new wl_nav_walker(),
                          )
                        ); 
                    ?>
                    <?php if ( wl_theme_is_companion_active() ) { 
                            if ( get_theme_mod( 'nineteen_search_box', '1' ) == "1" ) { 
                                get_template_part( 'searchform1' ); 
                            } 
                        } ?>
                </div>
            </div>
        </nav>
        <!--close-navbar-->
        <div class="hd-bnar bg_1" style="background-image: url(<?php header_image(); ?>)">
            <div class="margin-60 "> </div>
            <div class="page-title content-center ">
                <div class="page-title-iiner">
                    <h1><?php wl__breadcrumb_trail(); ?></h1>
                </div>
            </div>
        </div>
    </header>
</div>