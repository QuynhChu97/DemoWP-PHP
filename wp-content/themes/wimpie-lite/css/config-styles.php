<?php
add_action('wp_head' , 'dynamic_style');
function dynamic_style(){

//font-family for header h1 to h6.
	$wimpie_lite_heading_fonts = get_theme_mod('heading_typography');

//font-family for body text.
	$wimpie_lite_body_fonts = get_theme_mod('body_typography');

//typography format body
	$wimpie_lite_body_fonts_size = get_theme_mod('typography_size_body');
	$wimpie_lite_body_color = get_theme_mod('typography_color_body');

//typography format for h1 to h6

	$wimpie_lite_font_size_h1 = get_theme_mod('typography_format_h1');
	$wimpie_lite_text_transform_h1 = get_theme_mod('typography_type_h1');
	$wimpie_lite_color_h1 = get_theme_mod('typography_color_h1');

	$wimpie_lite_font_size_h2 = get_theme_mod('typography_format_h2');
	$wimpie_lite_text_transform_h2 = get_theme_mod('typography_type_h2');
	$wimpie_lite_color_h2 = get_theme_mod('typography_color_h2');

	$wimpie_lite_font_size_h3 = get_theme_mod('typography_format_h3');
	$wimpie_lite_text_transform_h3 = get_theme_mod('typography_type_h3');
	$wimpie_lite_color_h3 = get_theme_mod('typography_color_h3');

	$wimpie_lite_font_size_h4 = get_theme_mod('typography_format_h4');
	$wimpie_lite_text_transform_h4 = get_theme_mod('typography_type_h4');
	$wimpie_lite_color_h4 = get_theme_mod('typography_color_h4');

	$wimpie_lite_font_size_h5 = get_theme_mod('typography_format_h5');
	$wimpie_lite_text_transform_h5 = get_theme_mod('typography_type_h5');
	$wimpie_lite_color_h5 = get_theme_mod('typography_color_h5');

	$wimpie_lite_font_size_h6 = get_theme_mod('typography_format_h6');
	$wimpie_lite_text_transform_h6 = get_theme_mod('typography_type_h6');
	$wimpie_lite_color_h6 = get_theme_mod('typography_color_h6');

	?>
	<style type="text/css">
		body{
			<?php
			if(!empty($wimpie_lite_body_fonts)){ echo "font-family:".$wimpie_lite_body_fonts.";"; }
			if(!empty($wimpie_lite_body_fonts_size)){ echo "font-size:".$wimpie_lite_body_fonts_size."px;"; }
			if(!empty($wimpie_lite_body_color)){ echo "color:".$wimpie_lite_body_color.";"; }
			?>
		}

		h1, h2, h3, h4, h5, h6 {
			<?php if(!empty($wimpie_lite_heading_fonts)){ echo "font-family:".$wimpie_lite_heading_fonts.";"; } ?>
		}

		h1{
			<?php
			if(!empty($wimpie_lite_color_h1)){ echo "color:".$wimpie_lite_color_h1.";"; }
			if(!empty($wimpie_lite_font_size_h1)){ echo "font-size:".$wimpie_lite_font_size_h1."px;"; }
			?>
		}
		h2{
			<?php
			if(!empty($wimpie_lite_color_h2)){ echo "color:".$wimpie_lite_color_h2.";"; }
			if(!empty($wimpie_lite_font_size_h2)){ echo "font-size:".$wimpie_lite_font_size_h2."px;"; }
			?>
		}
		h3{
			<?php
			if(!empty($wimpie_lite_color_h3)){ echo "color:".$wimpie_lite_color_h3.";"; }
			if(!empty($wimpie_lite_font_size_h3)){ echo "font-size:".$wimpie_lite_font_size_h3."px;"; }
			?>
		}
		h4{
			<?php
			if(!empty($wimpie_lite_color_h4)){ echo "color:".$wimpie_lite_color_h4.";"; }
			if(!empty($wimpie_lite_font_size_h4)){ echo "font-size:".$wimpie_lite_font_size_h4."px;"; }
			?>
		}
		h5{
			<?php
			if(!empty($wimpie_lite_color_h5)){ echo "color:".$wimpie_lite_color_h5.";"; }
			if(!empty($wimpie_lite_font_size_h5)){ echo "font-size:".$wimpie_lite_font_size_h5."px;"; }
			?>
		}
		h6{
			<?php
			if(!empty($wimpie_lite_color_h6)){ echo "color:".$wimpie_lite_color_h6.";"; }
			if(!empty($wimpie_lite_font_size_h6)){ echo "font-size:".$wimpie_lite_font_size_h6."px;"; }
			?>
		}
		?>
	</style>
	<?php
}