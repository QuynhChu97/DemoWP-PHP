<?php
/**
 * Welcome Page Initiation
*/

include get_template_directory() . '/welcome/welcome.php';

/** Plugins **/
$plugins = array(
	// *** Companion Plugins
	'companion_plugins' => array(
		'access-demo-importer' 	=> array(
			'slug' 				=> 'access-demo-importer',
			'name' 				=> esc_html__('Instant Demo Importer', 'wimpie-lite'),
			'filename' 			=>'access-demo-importer.php',
 			// Use either bundled, remote, wordpress
			'host_type' 		=> 'wordpress',
			'class' 			=> 'Access_Demo_Importer',
			'info' => __('Access Demo Importer Plugin adds the feature to Import the Demo Conent with a single click.', 'wimpie-lite'),
		)
	),
	// *** Required Plugins
	'required_plugins' 			=> array(),

	// *** Recommended Plugins
	'recommended_plugins' => array(
			// Free Plugins
		'free_plugins' => array(
			'accesspress-social-counter' => array(
				'slug' 		=> 'accesspress-social-counter',
				'filename' 	=> 'accesspress-social-counter.php',
				'class' 	=> 'SC_Class'
			),
			'contact-form-7' => array(
				'slug' 		=> 'contact-form-7',
				'filename' 	=> 'wp-contact-form-7.php',
				'class' 	=> 'WPCF7_Submission'
			),
			'accesspress-twitter-feed' => array(
				'slug' 		=> 'accesspress-twitter-feed',
				'filename' 	=> 'accesspress-twitter-feed.php',
				'class' 	=> 'APTF_Class'
			)
		),
		// Pro Plugins
		'pro_plugins' => array()
	),
);

$strings = array(
		// Welcome Page General Texts
	'welcome_menu_text' => esc_html__( 'Wimpie Lite Setup', 'wimpie-lite' ),
	'theme_short_description' => esc_html__( 'Wimpie lite is a powerful, feature-rich and beautiful business theme. It comes up with customizer panel which allows you to live preview your changes, configurations, settings and design! It is super user friendly, lightweight and saves a lot of setup/configuration time. Features include: access to Google Fonts, unlimited color setting, layout control, logo/fav icon upload, category slider, sticky (menu) navigation, blog layout, testimonial,  portfolio, several page and post layout and much more. Compatibility: all major browser, fully responsive, WooCommerce, bbPress and all major plugins. Others: Translation ready, SEO friendly, RTL support.', 'wimpie-lite' ),

	// Plugin Action Texts
	'install_n_activate' => esc_html__('Install and Activate', 'wimpie-lite'),
	'deactivate' => esc_html__('Deactivate', 'wimpie-lite'),
	'activate' => esc_html__('Activate', 'wimpie-lite'),

	// Recommended Plugins Section
	'pro_plugin_title' => esc_html__( 'Pro Plugins', 'wimpie-lite' ),
	'pro_plugin_description' => esc_html__( 'Take Advantage of some of our Premium Plugins.', 'wimpie-lite' ),
	'free_plugin_title' => esc_html__( 'Free Plugins', 'wimpie-lite' ),
	'free_plugin_description' => esc_html__( 'These Free Plugins might be handy for you.', 'wimpie-lite' ),

	// Demo Actions
	'installed_btn' => esc_html__('Activated', 'wimpie-lite'),
	'deactivated_btn' => esc_html__('Activated', 'wimpie-lite'),
	'demo_installing' => esc_html__('Installing Demo', 'wimpie-lite'),
	'demo_installed' => esc_html__('Demo Installed', 'wimpie-lite'),
	'demo_confirm' => esc_html__('Are you sure to import demo content ?', 'wimpie-lite'),

	// Actions Required
	'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'wimpie-lite' ),
	'customize_theme_btn' => esc_html__( 'Customize Theme', 'wimpie-lite' ),
);

/**
 * Initiating Welcome Page
*/
$my_theme_wc_page = new Wimpie_Lite_Welcome( $plugins, $strings );


