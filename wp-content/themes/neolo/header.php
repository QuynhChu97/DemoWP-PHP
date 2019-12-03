<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="theme-color" content="#9DBC19">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div class="is-hidden"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path d="M7.169 14a.836.836 0 0 1-.587-.238L.243 7.573a.797.797 0 0 1 0-1.146L6.582.238a.845.845 0 0 1 1.175 0 .797.797 0 0 1 0 1.146L2.004 7l5.753 5.616a.797.797 0 0 1 0 1.146.84.84 0 0 1-.588.238z" id="a"/></defs><symbol id="angle-left" viewBox="0 0 8 14"><title>angle-left</title><path d="M.174 7.286c0-.116.045-.219.134-.308L6.549.737a.423.423 0 0 1 .616 0l.67.67a.423.423 0 0 1 0 .615L2.57 7.286l5.264 5.263a.423.423 0 0 1 0 .616l-.67.67a.423.423 0 0 1-.616 0L.308 7.594a.423.423 0 0 1-.134-.308z" fill-rule="evenodd"/></symbol><symbol id="angle-right" viewBox="0 0 12 21"><title>angle-right</title><path d="M11.953 10.929a.635.635 0 0 1-.2.462L2.39 20.752a.635.635 0 0 1-.462.201.635.635 0 0 1-.462-.2L.462 19.747a.635.635 0 0 1-.2-.462c0-.174.066-.328.2-.462l7.895-7.895L.462 3.033a.635.635 0 0 1-.2-.462c0-.174.066-.328.2-.462l1.005-1.004a.635.635 0 0 1 .462-.201c.174 0 .328.067.462.2l9.361 9.363c.134.133.201.287.201.462z" fill-rule="nonzero"/></symbol><symbol id="arrow-left" viewBox="0 0 8 14"><title>Group 317</title><use xlink:href="#a" fill-rule="evenodd"/></symbol></svg></div>
	
	<header class="mainHeader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<nav class="mainNav">
						<a class="mainNav-logo" href="<?php echo esc_url( site_url() );?>" title="Neolo">
							<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo bloginfo('name'); ?>" />
						</a>
						<button class="navbar-toggler" type="button" data-target="#menu">
							<span class="first-bar bar"></span>
							<span class="second-bar bar"></span>
							<span class="third-bar bar"></span>
						</button>
						<div id="menu">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'main-menu'
									)
								);
							?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<div class="header-placeholder"></div>
