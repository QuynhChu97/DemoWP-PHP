<?php
/**
 * Custome Function for theme template
 * 
 * 
 */

function wimpie_lite_web_layout($classes){
	if(get_theme_mod('wimpie_lite_webpage_layout') == 'boxed'){
		$classes[]= 'boxed-layout';
	}
	elseif(get_theme_mod('wimpie_lite_webpage_layout') == 'fullwidth'){
		$classes[]='fullwidth';
	}
	
	return $classes;
}
add_filter( 'body_class', 'wimpie_lite_web_layout' );

function wimpie_lite_sidebar_layout($classes){
	global $post;
	if( is_404()){
		$classes[] = ' ';
	}elseif(is_singular()){
		$post_class = get_post_meta( $post -> ID, 'wimpie_lite_sidebar_layout', true );
		if(empty($post_class)){
			$post_class = 'right-sidebar';
			$classes[] = $post_class;}
			else{
				$post_class = get_post_meta( $post -> ID, 'wimpie_lite_sidebar_layout', true );
				$classes[] = $post_class;}
			}else{
				$classes[] = 'right-sidebar';	
			}
			return $classes;
		}
		add_filter('body_class', 'wimpie_lite_sidebar_layout');

		
		function wimpie_lite_bxslidercb(){
			$wimpie_slider_category = get_theme_mod('wimpie_lite_slider_setting_category');
			$wimpie_show_pager = (!get_theme_mod('wimpie_lite_slider_show_pager') || get_theme_mod('wimpie_lite_slider_show_pager') == "yes") ? "true" : "false";
			$wimpie_show_controls = (!get_theme_mod('wimpie_lite_slider_show_controls') || get_theme_mod('wimpie_lite_slider_show_controls') == "yes") ? "true" : "false";
			$wimpie_auto_transition = "true";
			if(get_theme_mod('wimpie_lite_slider_show_transitions') &&
				get_theme_mod('wimpie_lite_slider_show_transitions')=='no')
			{
				$wimpie_auto_transition = "false";
			}
			$wimpie_slider_transition = (get_theme_mod('wimpie_lite_slider_transitions_type')) ? get_theme_mod('wimpie_lite_slider_transitions_type') :"fade" ;
			$wimpie_slider_speed = (!get_theme_mod('wimpie_lite_slider_speed')) ? "2000" : get_theme_mod('wimpie_lite_slider_speed');
			$wimpie_slider_pause = (!get_theme_mod('wimpie_lite_slider_pause')) ? "2000" : get_theme_mod('wimpie_lite_slider_pause');
			$wimpie_show_caption = get_theme_mod('wimpie_lite_slider_show_caption');       
			?>
			<div id="main-slider" class="slider">
				<script type="text/javascript">
					jQuery(function($){
						$('#main-slider .bx-slider').bxSlider({
							pager: <?php echo esc_attr($wimpie_show_pager); ?>,
							controls: <?php echo esc_attr($wimpie_show_controls); ?>,
							mode: '<?php echo esc_attr($wimpie_slider_transition); ?>',
							auto : <?php echo esc_attr($wimpie_auto_transition); ?>,
							speed: <?php echo esc_attr($wimpie_slider_speed); ?>,
							pause: <?php echo esc_attr($wimpie_slider_pause); ?>,
							//adaptiveHeight: true,
						});
					});
				</script>
				<?php
				if( !empty($wimpie_slider_category)) :

					$loop = new WP_Query(array(
						'cat' => $wimpie_slider_category,
						'posts_per_page' => -1    
						));
						?>
						<div class="bx-slider">
							<?php
							if($loop->have_posts()) : 
								while($loop->have_posts()) : $loop-> the_post();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
							
							?>
							<div class="slides">
								<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" />
								<?php if($wimpie_show_caption == 'yes'): ?>
									<div class="caption-wrapper">  
										<div class="ed-container">
											<div class="slider-caption">
												<div class="mid-content">
													<div class="small-caption"> <?php the_title(); ?> </div>
													<div class="slider-content">
														<?php the_content(); 
														?>
													</div>
													<a href="<?php the_permalink(); ?>" class="slider-btn"> <?php echo esc_attr(get_theme_mod('wimpie_lite_slider_button_text')); ?> </a>
												</div>
											</div>
										</div>
									</div>
								<?php  endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
					
				<?php endif; ?>		
			<?php  endif; ?>
		</div>
		<?php
	}
	add_action('wimpie_bxslider','wimpie_lite_bxslidercb', 10);

	function wimpie_lite_social_cb(){
		$facebooklink = get_theme_mod('wimpie_lite_social_facebook');
		$twitterlink = get_theme_mod('wimpie_lite_social_twitter');
		$google_pluslink = get_theme_mod('wimpie_lite_social_googleplus');
		$youtubelink = get_theme_mod('wimpie_lite_social_youtube');
		$pinterestlink = get_theme_mod('wimpie_lite_social_pinterest');
		$linkedinlink = get_theme_mod('wimpie_lite_social_linkedin');
		$instagramlink = get_theme_mod('wimpie_lite_social_instagram');
		?>
		<div class="social-icons ">
			<?php if(!empty($facebooklink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_facebook')); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($twitterlink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_twitter')); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($google_pluslink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_googleplus')); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($youtubelink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_youtube')); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($pinterestlink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_pinterest')); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($linkedinlink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_linkedin')); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($instagramlink)){ ?>
			<a href="<?php echo esc_url(get_theme_mod('wimpie_lite_social_instagram')); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
			<?php } ?>
		</div>
		<?php
	}
	add_action('wimpie_social','wimpie_lite_social_cb', 10);

	function wimpie_lite_excerpt( $wimpie_content , $wimpie_letter_count){
		$wimpie_letter_count = !empty($wimpie_letter_count) ? $wimpie_letter_count : 100 ;
		$wimpie_striped_content = strip_tags($wimpie_content);
		$wimpie_lite_excerpt = mb_substr($wimpie_striped_content, 0 , $wimpie_letter_count);
		if(strlen($wimpie_striped_content) > strlen($wimpie_lite_excerpt)){
			$wimpie_lite_excerpt.= "...";
		}
		return $wimpie_lite_excerpt;
	}

	//Dynamic styles on header
	function wimpie_lite_header_styles_scripts(){
		$favicon = get_theme_mod('wimpie_lite_favicon_upload');
		$cta_bg_v = get_theme_mod('wimpie_lite_callto_bkgimage');
		$image_url = get_template_directory_uri()."/images/";
		if(!empty($favicon)):
			echo "<link type='image/png' rel='icon' href='".esc_url($favicon)."'/>\n";
		endif;
		echo "<style type='text/css' media='all'>";
		if(!empty($cta_bg_v)){
			$cta_bg =   '.call-to-action {background: url("'.esc_url(get_theme_mod('wimpie_lite_callto_bkgimage')).'") no-repeat scroll center top rgba(0, 0, 0, 0);';
			echo $cta_bg;
		}
		if ( function_exists( 'the_custom_logo' ) ) {
			$header_bg_v = get_header_image();
			if(($header_bg_v)){
				$header_bg_v =   '#masthead.site-header { background: url("'.esc_url($header_bg_v).'") no-repeat scroll left top rgba(0, 0, 0, 0); position: relative; z-index: 1;background-size: cover; }';
				echo $header_bg_v;
				echo "\n";
				echo '.site-header:before {
					content: "";
					position: absolute;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					background: rgba(0,0,0,0.7);
					z-index: -1;
				}';
			}
		}
		echo "</style>\n"; 

		//custom js
		$custom_js = get_theme_mod('wimpielite_custom_tools_js');
		if(!empty($custom_js)){
			echo '<script type="text/javascript">'.$custom_js.'</script>';
		}
	}

	add_action('wp_head','wimpie_lite_header_styles_scripts');

	function wimpie_lite_fonts_cb(){
		$http = 'http';
		echo "<link href='".$http."://fonts.googleapis.com/css?family=Arimo:400,700|Open+Sans:400,700,600italic,300|Roboto+Condensed:300,400,700|Roboto:300,400,700|Slabo+27px|Oswald:400,300,700|Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|PT+Sans:400,700,400italic,700italic|Droid+Sans:400,700|Raleway:400,100,200,300,500,600,700,800,900|Droid+Serif:400,700,400italic,700italic|Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic|Montserrat:400,700|Roboto+Slab:400,100,300,700|Merriweather:400italic,400,900,300italic,300,700,700italic,900italic|Lora:400,700,400italic,700italic|PT+Sans+Narrow:400,700|Bitter:400,700,400italic|Lobster|Yanone+Kaffeesatz:400,200,300,700|Arvo:400,700,400italic,700italic|Oxygen:400,300,700|Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900|Dosis:200,300,400,500,600,700,800|Ubuntu+Condensed|Playfair+Display:400,700,900,400italic,700italic,900italic|Cabin:400,500,600,700,400italic,500italic,600italic|Muli:300,400,300italic,400italic' rel='stylesheet' type='text/css'>";   
	}
	add_action('wp_footer', 'wimpie_lite_fonts_cb');

	// New Template for header search
	function wimpie_lite_get_search_form_header(){
		get_template_part('searchform-header');
	}


if ( is_admin() ) : // Load only if we are viewing an admin page

function wimpie_lite_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'wimpielite_custom_js', get_template_directory_uri().'/inc/js/custom.js', array( 'jquery' ),'',true );
	wp_localize_script( 'wimpielite_custom_js', 'wimpieWelcomeObject', array(
        'admin_nonce'   => wp_create_nonce('wimpie_plugin_installer_nonce'),
        'activate_nonce'    => wp_create_nonce('wimpie_plugin_activate_nonce'),
        'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
        'activate_btn' => __('Activate', 'wimpie-lite'),
        'installed_btn' => __('Activated', 'wimpie-lite'),
        'demo_installing' => __('Installing Demo', 'wimpie-lite'),
        'demo_installed' => __('Demo Installed', 'wimpie-lite'),
        'demo_confirm' => __('Are you sure to import demo content ?', 'wimpie-lite'),
        ) );
	wp_enqueue_style( 'wimpielite_admin_style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );
}
add_action('admin_enqueue_scripts', 'wimpie_lite_admin_scripts');
endif;