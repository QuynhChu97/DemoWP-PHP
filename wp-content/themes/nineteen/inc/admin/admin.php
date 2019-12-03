<?php
defined( 'ABSPATH' ) or die();

/**
 *  Nineteen theme info page 
 */
class Nineteen_info_page 
{
	public static function get_menu_page() {
		add_action( 'admin_menu', array( 'Nineteen_info_page', 'nineteen_info_page_menu' ) );
		add_action( 'admin_enqueue_scripts', array( 'Nineteen_info_page', 'fontawesome_assests' ) );
	}
	
	public static function nineteen_info_page_menu() {
		$page1 = add_theme_page( __( 'Welcome to Nineteen', 'nineteen' ), __( 'Nineteen <i class="fa fa-star theme-icon"></i>', 'nineteen' ), 'manage_options', 'nineteen', array( 'Nineteen_info_page','nineteen_display_theme_info_page') );
		add_action( 'admin_print_styles-'.$page1, array( 'Nineteen_info_page','nineteen_info_page_assets' ) );
	}

	public static function nineteen_info_page_assets() {
		wp_enqueue_style( 'nineteen-bootstrap-css', get_template_directory_uri(). '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'nineteen-font-awesome', get_template_directory_uri(). '/assets/font-awesome/css/fontawesome-all-v5.3.1.min.css' );
		wp_enqueue_style( 'nineteen-main-style', get_template_directory_uri(). '/assets/css/document_style.css' );

		wp_enqueue_script( 'nineteen-bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.js' );
		wp_enqueue_script( 'nineteen-popper', get_template_directory_uri(). '/assets/js/popper.js' );
	}

	public static function fontawesome_assests() {
		wp_enqueue_style( 'nineteen-font-awesome', get_template_directory_uri(). '/assets/font-awesome/css/fontawesome-all-v5.3.1.min.css' );
	}

	public static function nineteen_display_theme_info_page() {
		$theme_data = wp_get_theme();
	?>
		<div class="wrap elw-page-welcome about-wrap seting-page">
		    <div class="row col-md-12 settings">
		         <div class=" col-md-9">
		            <div class="col-md-12" style="padding:0">
						<h2><span class="elw_shortcode_heading"><?php printf( esc_html__( 'Welcome to %1$s ¬ Version %2$s', 'nineteen' ), esc_html( $theme_data->Name ), esc_html( $theme_data->Version )); ?> </span></h2>
						<p class="text-justify" style="font-size:19px;color: #555d66;"><?php _e( 'Nineteen is a feature-loaded, user-friendly, fully responsive, Modern Design WordPress theme built with care and is loaded with SEO optimized code.Theme features a frontpage slider, Portfolio , Services ,Team, Clients, Blogs. Nineteen allows you to fully customize your site without having to work with code. Nineteen also features a live customizer, allowing you to change settings and preview them live.', 'nineteen' ); ?> </p>
		            </div>
		        </div>
				<div class=" col-md-3">
					<div class="update_pro">
						<h3><?php _e( 'Upgrade Pro', 'nineteen' ); ?>  </h3>
						<a class="demo" href="<?php echo esc_url( __( 'http://demo.weblizar.com/nineteen-premium-wordpress-theme/', 'nineteen' ) ); ?>"><?php _e( 'Get Pro In $20', 'nineteen' ); ?> </a>
					</div>
				</div>
			</div>

            <!-- Themes & Plugin -->
            <div class="col-md-12  product-main-cont">
                <ul class="nav nav-tabs product-tbs">
				    <li class="active"><a data-toggle="tab" href="#start"> <?php _e( 'Getting Started', 'nineteen' ); ?></a></li>
                    <li><a data-toggle="tab" href="#themesd"><?php _e( 'Nineteen premium', 'nineteen' ); ?> </a></li>
					<li><a data-toggle="tab" href="#freepro"><?php _e( 'Free Vs Pro', 'nineteen' ); ?></a></li>
                </ul>

                <div class="tab-content">			
					<div id="start" class="tab-pane in active">
	                        <div class="space  theme active">							
	                            <div class="row p_plugin blog_gallery">
	                                <div class="col-xs-12 col-sm-7 col-md-7 p_plugin_pic">
	                                    <h4><?php _e( 'Step 1: Homepage Setup', 'nineteen' ); ?></h4>
										<ol>
										<li> <?php _e( 'First Download "weblizar-companion" Plugin (Its required to setup theme Home Page).', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Then Install it and activate it.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Create a new page name it as > "Home".', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Assign this "Home" >> "Home-Page" template , Save it.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Now Set this "Home" as custom static Home for your site', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Save changes and you are done.', 'nineteen' ); ?> </li>
										</ol>
	                                </div>
	                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
	                                    <div class="row p-box">
	                                         <div class="img-thumbnail">
											<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" class="img-responsive" alt="img"/>
	                                    </div>
	                                    </div>
	                                </div>
	                            </div>
													
								<div class="row p_plugin blog_gallery">
	                                <div class="col-xs-12 col-sm-4 col-md-12 p_plugin_pic">
	                                    <h4><?php _e( 'Step 2: Customizer Options Panel', 'nineteen' ); ?> </h4>
										<ol>
										<li> <?php _e( 'Go to Appearance -> Customize > Theme Options', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Theme General Options - Theme General Options use for logo width and height, and show search box.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Search Box - use to add search box on header.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Theme Slider Options - It is use to add slider image, title, description and enable/disable slider on homepage.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Service Options - It is use to add service title, description, service icon, title, description and enable/disable service on homepage.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Portfolio Options - It is use to add portfolio title, description, portfolio image, title, link and enable/disable portfolio on homepage.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Home Team Options - Use to add team title, description, team member name, image, designation and discription, profile link on homepage.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Home Client Options - Use to add client title, description, client name, image on homepage.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Home Blog Options - Use to add blog title, description, blog excerpt length and enable/disable blog section on homepage.', 'nineteen' ); ?> </li>
										<li> <?php _e( 'Footer Options - Use to add Customization text, developed by text and developed by link.', 'nineteen' ); ?> </li>
										</ol>
										<a class="add_page" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php _e( 'Go to Customizer', 'nineteen' ); ?></a>
	                                </div>
	                            </div>	
	                        </div>
	                    </div>
					
					<div id="themesd" class="tab-pane fade">
                        <div class="space theme">

                            <div class=" p_head theme">
                                <!--<h1 class="section-title">WordPress Themes</h1>-->
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                    <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/NP.png" class="img-responsive" alt="img"/>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                        <div>
                                            <p><strong><?php _e( 'Description:', 'nineteen' ); ?> </strong><?php _e( 'Creative agencies, financial advisors, business development institutions, investment centers and other local business foundations can make the best out of Nineteen Premium template.', 'nineteen' ); ?></p>
                                        </div>
										<p><strong><?php _e( 'Tags:', 'nineteen' ); ?></strong><?php _e( '>clean, responsive, portfolio, blog, e-commerce, Business, WordPress, Corporate, dark, real estate, shop, restaurant.', 'nineteen' ); ?></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                    <div class="price1">
                                        <span class="currency"><?php _e( 'USD', 'nineteen' ); ?></span>
                                        <span class="price-number">$<span>20</span>
										</span>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-primary btn-lg" href="<?php echo esc_url( __( 'https://weblizar.com/themes/nineteen-premium-theme-for-business/', 'nineteen' ) ); ?>"><?php _e( 'Detail', 'nineteen' ); ?></a>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/construction-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/construction-premium-wordpress-theme/', 'nineteen' ) ); ?>"><?php _e( 'Construction Premium', 'nineteen' ); ?></a></h4>
										</div>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/beautyspa-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/beautyspa-premium/', 'nineteen' ) ); ?>"><?php _e( 'Beautyspa Premium', 'nineteen' ); ?></a></h4>
										</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/healthcare-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/healthcare/', 'nineteen' ) ); ?>"><?php _e( 'Healthcare Premium', 'nineteen' ); ?> </a></h4>
										</div>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery visit_pro">
                                <p class="text-center"><?php _e( 'Visit Our Latest Pro Themes & See Demos', 'nineteen' ); ?> </p>
								<p style="font-size: 17px !important;"><?php _e( 'We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.', 'nineteen' ); ?> </p>
								<a href="<?php echo esc_url( __( 'https://weblizar.com/themes/', 'nineteen' ) ); ?>"><?php _e( 'Visit Themes', 'nineteen' ); ?></a>
                            </div>	
                        </div>
                    </div>
			  
					<div id="freepro" class="tab-pane fade">
							<div class=" p_head theme">
                                <!--<h1 class="section-title">Weblizar Offers</h1>-->
                            </div>
						<div class="row p_plugin blog_gallery">		
						<div class="columns">
						  <ul class="price">
							<li class="header" style="background:#f45f47"><?php _e( 'Nineteen', 'nineteen' ); ?> </li>
							<li class="grey"><?php _e( 'Features', 'nineteen' ); ?></li>
							<li><?php _e( 'Custom Home Page', 'nineteen' ); ?></li>
							<li><?php _e( 'Multiple Theme Templates', 'nineteen' ); ?></li>
							<li><?php _e( 'Shortcodes', 'nineteen' ); ?></li>
							<li><?php _e( 'Mega Menu Support', 'nineteen' ); ?></li>
							<li><?php _e( 'Page Builder Support', 'nineteen' ); ?></li>
							<li><?php _e( 'Woocommerce Ready', 'nineteen' ); ?></li>
							<li><?php _e( 'Responsive & Lightweight', 'nineteen' ); ?></li>
							<li><?php _e( 'SEO Friendly', 'nineteen' ); ?></li>
							<li><?php _e( 'Priority Support', 'nineteen' ); ?></li>
						  </ul>
						</div>
						
						 <div class="columns">
						  <ul class="price">
							<li class="header"><?php _e( 'Free', 'nineteen' ); ?></li>
							<li class="grey">$ 00</li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
							<li><i class="fas fa-times"></i></li>
						  </ul>
						</div>

						<div class="columns">
						  <ul class="price">
							<li class="header" style="background-color:#f45f47"><?php _e( 'Nineteen Pro', 'nineteen' ); ?></li>
							<li class="grey"><?php _e( '$ 20', 'nineteen' ); ?></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li class="grey"><a href="<?php echo esc_url( __( 'http://demo.weblizar.com/nineteen-premium-wordpress-theme/', 'nineteen' ) ); ?>" class="pro_btn"><?php _e( 'Visit Demo', 'nineteen' ); ?></a></li>
						  </ul>
						</div>
						</div>
					</div>	
			  </div>
            </div>
        </div>
	<?php
	}
}
Nineteen_info_page::get_menu_page();

?>