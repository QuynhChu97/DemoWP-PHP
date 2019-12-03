<?php
/**
 * wimpie lite Theme Customizer
 *
 * @package wimpie lite
 */

function wimpie_lite_custom_customize_register( $wp_customize ) {
	//New Options By Sadip
  // Start of the Header Options
  $wp_customize->add_panel('wimpie_lite_general_settings', array(
    'capabitity' => 'edit_theme_options',
    'priority' => 10,
    'title' => __('General Settings', 'wimpie-lite')
    ));

  $wp_customize->get_section('background_image')->panel = 'wimpie_lite_general_settings'; //priority 80
  $wp_customize->get_section('static_front_page')->panel = 'wimpie_lite_general_settings'; //priority 120

  //Webpage layout
  $wp_customize->add_section('wimpie_lite_webpage_layout', array(
    'priority' => 30,
    'title' => __('Webpage Layout', 'wimpie-lite'),
    'panel' => 'wimpie_lite_general_settings'
    ));
  $wp_customize->add_setting('wimpie_lite_webpage_layout', array(
    'default' => 'fullwidth',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_webpagelayout',
    ));

  $wp_customize->add_control('wimpie_lite_webpage_layout', array(
    'type' => 'radio',
    'label' => __('Choose the layout that you want', 'wimpie-lite'),
    'section' => 'wimpie_lite_webpage_layout',
    'setting' => 'wimpie_lite_webpage_layout',
    'choices' => array(
     'fullwidth' => __('Full Width', 'wimpie-lite'),
     'boxed' => __('Boxed', 'wimpie-lite')
     )
    ));

   //Footer Copy Right Text
  $wp_customize->add_section('wimpie_lite_footer_copyright', array(
    'priority' => 50,
    'title' => __('Footer Copyright Text', 'wimpie-lite'),
    'panel' => 'wimpie_lite_general_settings'
    ));

  $wp_customize->add_setting('wimpie_lite_footer_copyright', array(
    'default' => '',
    'sanitize_callback' => 'wimpie_lite_sanitize_text',
    'transport' => 'postMessage'
    ));

  $wp_customize->add_control('wimpie_lite_footer_copyright',array(
    'type' => 'text',
    'section' => 'wimpie_lite_footer_copyright',
    'setting' => 'wimpie_lite_footer_copyright',
    ));

  /* New Panel For Header Settings */
  $wp_customize->add_panel('wimpie_lite_header_settings', array(
    'capabitity' => 'edit_theme_options',
    'priority' => 20,
    'title' => __('Header Settings', 'wimpie-lite')
    ));

   //header type
  $wp_customize->add_section('wimpie_lite_header_type', array(
    'priority' => 5,
    'title' => __('Header Type', 'wimpie-lite'),
    'panel' => 'wimpie_lite_header_settings'
    ));

  $wp_customize->add_setting('wimpie_lite_header_type', array(
    'default' => 'classic',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_headertype',
    ));

  $wp_customize->add_control('wimpie_lite_header_type', array(
    'type' => 'radio',
    'label' => __('Choose the layout that you want', 'wimpie-lite'),
    'section' => 'wimpie_lite_header_type',
    'setting' => 'wimpie_lite_header_type',
    'choices' => array(
     'transparent' => __('Transparent', 'wimpie-lite'),
     'classic' => __('Classic', 'wimpie-lite'),
     )
    ));

  //Add Default Sections to header Panel
  $wp_customize->get_section('title_tagline')->panel = 'wimpie_lite_header_settings'; //priority 20
  $wp_customize->get_section('colors')->panel = 'wimpie_lite_header_settings'; //priority 40
  $wp_customize->get_section('header_image')->panel = 'wimpie_lite_header_settings'; //priority 60

  //logo Alignment
  $wp_customize->add_section('wimpie_lite_logo_alignment', array(
    'priority' => 65,
    'title' => __('Logo Alignment', 'wimpie-lite'),
    'panel' => 'wimpie_lite_header_settings'
    ));

  $wp_customize->add_setting('wimpie_lite_logo_alignment', array(
    'default' => 'left',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_alignment_logo',
    ));

  $wp_customize->add_control('wimpie_lite_logo_alignment', array(
    'type' => 'radio',
    'label' => __('Choose the layout that you want', 'wimpie-lite'),
    'section' => 'wimpie_lite_logo_alignment',
    'setting' => 'wimpie_lite_logo_alignment',
    'choices' => array(
     'left'=>__('Left', 'wimpie-lite'),
     'center'=>__('Center', 'wimpie-lite'),
     'right'=>__('Right', 'wimpie-lite')
     )
    ));

   //search box
  $wp_customize->add_section('wimpie_lite_search_options', array(
    'priority' => 160,
    'title' => __('Search Settings', 'wimpie-lite'),
    'panel' => 'wimpie_lite_header_settings'
    ));

  $wp_customize->add_setting('wimpie_lite_search_options', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_checkbox_sanitize'
    ));

  $wp_customize->add_control('wimpie_lite_search_options', array(
    'type' => 'checkbox',
    'label' => __('Check to Show Search in Header', 'wimpie-lite'),
    'section' => 'wimpie_lite_search_options',
    'setting' => 'wimpie_lite_search_options'
    ));

  $wp_customize->add_setting('wimpie_lite_search_placeholder', array(
    'default' => 'Search...',
    'sanitize_callback' => 'wimpie_lite_sanitize_text',
    'transport' => 'postMessage',
    ));

  $wp_customize->add_control('wimpie_lite_search_placeholder',array(
    'type' => 'text',
    'label' => __('Search Button Placeholder Text', 'wimpie-lite'),
    'section' => 'wimpie_lite_search_options',
    'setting' => 'wimpie_lite_search_placeholder',
    ));

  $wp_customize->add_setting('wimpie_lite_search_button_text', array(
    'default' => 'Search',
    'sanitize_callback' => 'wimpie_lite_sanitize_text',
    'transport' => 'postMessage',
    ));

  $wp_customize->add_control('wimpie_lite_search_button_text',array(
    'type' => 'text',
    'label' => __('Search Button Text', 'wimpie-lite'),
    'section' => 'wimpie_lite_search_options',
    'setting' => 'wimpie_lite_search_button_text',
    ));

    // Panel Homepage Settings 
  $wp_customize->add_panel('wimpie_lite_homepage_settings', array(
    'capabitity' => 'edit_theme_options',
    'priority' => 30,
    'title' => __('Homepage Settings', 'wimpie-lite')
    ));
   //Slider Settings
  $wp_customize->add_section('wimpie_lite_slider_setting', array(
    'priority' => 5,
    'title' => __('Slider Section', 'wimpie-lite'),
    'panel' => 'wimpie_lite_homepage_settings',
    ));

  $wp_customize->add_setting('wimpie_lite_slider_setting_option', array(
    'default' => 'disable',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
    ));

  $wp_customize->add_control('wimpie_lite_slider_setting_option', array(
    'type' => 'radio',
    'label' => __('Enable Disable Slider', 'wimpie-lite'),
    'description' => __('Select category to load slider after enabling', 'wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_setting_option',
    'choices' => array(
     'enable' => __('Enable', 'wimpie-lite'),
     'disable' => __('Disable', 'wimpie-lite'),
     )
    ));

   //select category for slider
  $wp_customize->add_setting('wimpie_lite_slider_setting_category',array(
    'default' => '0',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_integer_sanitize'
    ));

  $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_slider_setting_category', array(
    'label' => __('Select a category to show in slider','wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    )));

   //slider button Text
  $wp_customize->add_setting('wimpie_lite_slider_button_text', array(
    'default' => 'Details',
    'sanitize_callback' => 'wimpie_lite_sanitize_text',
    'transport' => 'postMessage'
    ));

  $wp_customize->add_control('wimpie_lite_slider_button_text',array(
    'type' => 'text',
    'label' => __('Slider Button Text','wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_button_text'
    ));

    //slider pager
  $wp_customize->add_setting('wimpie_lite_slider_show_pager', array(
    'default' => 'no',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_yesno',
    ));

  $wp_customize->add_control('wimpie_lite_slider_show_pager', array(
    'type' => 'radio',
    'label' => __('Show Pager / Navigation Dot', 'wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_show_pager',
    'choices' => array(
     'yes' => __('Yes', 'wimpie-lite'),
     'no' => __('No', 'wimpie-lite'),
     )
    ));

   //slider controls
  $wp_customize->add_setting('wimpie_lite_slider_show_controls', array(
    'default' => 'no',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_yesno',
    ));

  $wp_customize->add_control('wimpie_lite_slider_show_controls', array(
    'type' => 'radio',
    'label' => __('Show Controls', 'wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_show_controls',
    'choices' => array(
     'yes' => __('Yes', 'wimpie-lite'),
     'no' => __('No', 'wimpie-lite'),
     )
    ));

   //transition type
  $wp_customize->add_setting('wimpie_lite_slider_transitions_type', array(
    'default' => 'no',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_sanitize_transitiontype',
    ));

  $wp_customize->add_control('wimpie_lite_slider_transitions_type', array(
    'type' => 'select',
    'label' => __('Slider Transitions (Slide/Fade)', 'wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_transitions_type',
    'choices' => array(
     'fade' => __('Fade', 'wimpie-lite'),
     'horizontal' => __('Slide Horizontal', 'wimpie-lite'),
     'vertical' => __('Slide Vertical', 'wimpie-lite'),
     )
    ));
   //slider transition
  $wp_customize->add_setting('wimpie_lite_slider_show_transitions', array(
    'default' => 'no',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_yesno',
    ));

  $wp_customize->add_control('wimpie_lite_slider_show_transitions', array(
    'type' => 'radio',
    'label' => __('Show Auto Transitions', 'wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_show_transitions',
    'choices' => array(
     'yes' => __('Yes', 'wimpie-lite'),
     'no' => __('No', 'wimpie-lite'),
     )
    ));

   //slider speed
  $wp_customize->add_setting('wimpie_lite_slider_speed', array(
    'default' => '5000',
    'sanitize_callback' => 'wimpie_lite_sanitize_text',
    ));

  $wp_customize->add_control('wimpie_lite_slider_speed',array(
    'type' => 'number',
    'label' => __('Slider Speed','wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_speed'
    ));

    //slider pause
  $wp_customize->add_setting('wimpie_lite_slider_pause', array(
    'default' => '5000',
    'sanitize_callback' => 'wimpie_lite_sanitize_text',
    ));

  $wp_customize->add_control('wimpie_lite_slider_pause',array(
    'type' => 'number',
    'label' => __('Slider Pause','wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_pause'
    ));
    //slider caption
  $wp_customize->add_setting('wimpie_lite_slider_show_caption', array(
    'default' => 'no',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_yesno',
    ));

  $wp_customize->add_control('wimpie_lite_slider_show_caption', array(
    'type' => 'radio',
    'label' => __('Show Caption', 'wimpie-lite'),
    'section' => 'wimpie_lite_slider_setting',
    'setting' => 'wimpie_lite_slider_show_caption',
    'choices' => array(
     'yes' => __('Yes', 'wimpie-lite'),
     'no' => __('No', 'wimpie-lite'),
     )
    ));

   //homepage about us section
  $wp_customize->add_section('wimpie_lite_about_section', array(
    'priority' => 10,
    'title' => __('About Section', 'wimpie-lite'),
    'panel' => 'wimpie_lite_homepage_settings',
    ));

    //enable disable about us section
  $wp_customize->add_setting('wimpie_lite_about_setting_option', array(
    'default' => 'disable',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
    ));

  $wp_customize->add_control('wimpie_lite_about_setting_option', array(
    'type' => 'radio',
    'label' => __('Enable Disable About Us Section', 'wimpie-lite'),
    'section' => 'wimpie_lite_about_section',
    'setting' => 'wimpie_lite_about_setting_option',
    'choices' => array(
     'enable' => __('Enable', 'wimpie-lite'),
     'disable' => __('Disable', 'wimpie-lite'),
     )
    ));

  $options_posts = array();
  $options_posts_obj = get_posts('posts_per_page=-1');
  $options_posts[''] = 'Select a Post:';
  foreach ($options_posts_obj as $post) {
   $options_posts[$post->ID] = $post->post_title;
 }
   //select post for about us
 $wp_customize->add_setting('wimpie_lite_about_setting_post',array(
  'default' => '',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control('wimpie_lite_about_setting_post', array(
  'type' => 'select',
  'label' => __('Select a Post to show in About Us Section','wimpie-lite'),
  'section' => 'wimpie_lite_about_section',
  'setting' => 'wimpie_lite_about_setting_option',
  'choices' => $options_posts
  ));

   //about us view more text
 $wp_customize->add_setting('wimpie_lite_aboutus_viewmore_text', array(
  'default' => 'Details',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_aboutus_viewmore_text',array(
  'type' => 'text',
  'label' => __('About View More Text','wimpie-lite'),
  'section' => 'wimpie_lite_about_section',
  'setting' => 'wimpie_lite_aboutus_viewmore_text'
  ));

    //homepage services section
 $wp_customize->add_section('wimpie_lite_services_section', array(
  'priority' => 20,
  'title' => __('Services Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable services section
 $wp_customize->add_setting('wimpie_lite_services_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_services_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Services Section', 'wimpie-lite'),
  'section' => 'wimpie_lite_services_section',
  'setting' => 'wimpie_lite_services_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //services section Title
 $wp_customize->add_setting('wimpie_lite_services_title', array(
  'default' => 'Our Services',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_services_title',array(
  'type' => 'text',
  'label' => __('Services Section Title','wimpie-lite'),
  'section' => 'wimpie_lite_services_section',
  'setting' => 'wimpie_lite_services_title'
  ));

    //services section description
 $wp_customize->add_setting('wimpie_lite_services_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_services_desc',array(
  'type' => 'textarea',
  'label' => __('Services Section Description','wimpie-lite'),
  'section' => 'wimpie_lite_services_section',
  'setting' => 'wimpie_lite_services_desc'
  ));

   //select category for services
 $wp_customize->add_setting('wimpie_lite_services_setting_category',array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_services_setting_category', array(
  'label' => __('Select a Category to show in services section','wimpie-lite'),
  'section' => 'wimpie_lite_services_section',
  )));

    //enable disable services section button
 $wp_customize->add_setting('wimpie_lite_services_button_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_services_button_option', array(
  'type' => 'radio',
  'label' => __('Display Button for Category Page', 'wimpie-lite'),
  'section' => 'wimpie_lite_services_section',
  'setting' => 'wimpie_lite_services_button_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //services Button View more text
 $wp_customize->add_setting('wimpie_lite_services_button_text', array(
  'default' => 'View More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_services_button_text',array(
  'type' => 'text',
  'label' => __('Button Text','wimpie-lite'),
  'section' => 'wimpie_lite_services_section',
  'setting' => 'wimpie_lite_services_button_text'
  ));

     //homepage feature section
 $wp_customize->add_section('wimpie_lite_awesome_feature_section', array(
  'priority' => 30,
  'title' => __('Feature Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable feature section
 $wp_customize->add_setting('wimpie_lite_awesome_feature_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_awesome_feature_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Feature Section', 'wimpie-lite'),
  'section' => 'wimpie_lite_awesome_feature_section',
  'setting' => 'wimpie_lite_awesome_feature_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Feature section Title
 $wp_customize->add_setting('wimpie_lite_awesome_feature_title', array(
  'default' => 'Features',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_awesome_feature_title',array(
  'type' => 'text',
  'label' => __('Feature Section Title','wimpie-lite'),
  'section' => 'wimpie_lite_awesome_feature_section',
  'setting' => 'wimpie_lite_awesome_feature_title'
  ));

    //Feature section description
 $wp_customize->add_setting('wimpie_lite_awesome_feature_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_awesome_feature_desc',array(
  'type' => 'textarea',
  'label' => __('Feature Section Description','wimpie-lite'),
  'section' => 'wimpie_lite_awesome_feature_section',
  'setting' => 'wimpie_lite_awesome_feature_desc'
  ));

   //select category for features section
 $wp_customize->add_setting('wimpie_lite_awesome_feature_setting_category',array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_awesome_feature_setting_category', array(
  'label' => __('Select a Category to show in Feature Section','wimpie-lite'),
  'section' => 'wimpie_lite_awesome_feature_section',
  )));

    //enable disable feature section button
 $wp_customize->add_setting('wimpie_lite_awesome_feature_button_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_awesome_feature_button_option', array(
  'type' => 'radio',
  'label' => __('Display Button for Category Page', 'wimpie-lite'),
  'section' => 'wimpie_lite_awesome_feature_section',
  'setting' => 'wimpie_lite_awesome_feature_button_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Awesome Feature Button View more text
 $wp_customize->add_setting('wimpie_lite_awesome_feature_button_text', array(
  'default' => 'View More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_awesome_feature_button_text',array(
  'type' => 'text',
  'label' => __('Button Text','wimpie-lite'),
  'section' => 'wimpie_lite_awesome_feature_section',
  'setting' => 'wimpie_lite_awesome_feature_button_text'
  ));

    //homepage Portfolio section
 $wp_customize->add_section('wimpie_lite_portfolio_section', array(
  'priority' => 40,
  'title' => __('Portfolio Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable Portfolio section
 $wp_customize->add_setting('wimpie_lite_portfolio_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_portfolio_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Portfolio Section', 'wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_section',
  'setting' => 'wimpie_lite_portfolio_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Portfolio section Title
 $wp_customize->add_setting('wimpie_lite_portfolio_title', array(
  'default' => 'Portfolio Section',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_portfolio_title',array(
  'type' => 'text',
  'label' => __('Portfolio Title','wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_section',
  'setting' => 'wimpie_lite_portfolio_title'
  ));

    //Portfolio section description
 $wp_customize->add_setting('wimpie_lite_portfolio_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_portfolio_desc',array(
  'type' => 'textarea',
  'label' => __('Portfolio Section Description','wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_section',
  'setting' => 'wimpie_lite_portfolio_desc'
  ));

   //select category for Portfolio section
 $wp_customize->add_setting('wimpie_lite_portfolio_setting_category',array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_portfolio_setting_category', array(
  'label' => __('Select a Category to show in Portfolio Section','wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_section',
  )));

   //portfolio button enable disable portfolio button
 $wp_customize->add_setting('wimpie_lite_portfolio_button_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_portfolio_button_option', array(
  'type' => 'radio',
  'label' => __('Display Button for Category Page', 'wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_section',
  'setting' => 'wimpie_lite_portfolio_button_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Portfolio Button View more text
 $wp_customize->add_setting('wimpie_lite_portfolio_button_text', array(
  'default' => 'View More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_portfolio_button_text',array(
  'type' => 'text',
  'label' => __('Button Text','wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_section',
  'setting' => 'wimpie_lite_portfolio_button_text'
  ));



    //Call to Action Section
 $wp_customize->add_section('wimpie_lite_callto_section', array(
  'priority' => 60,
  'title' => __('Call To Action Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable call to action section
 $wp_customize->add_setting('wimpie_lite_callto_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_callto_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Call To Action', 'wimpie-lite'),
  'section' => 'wimpie_lite_callto_section',
  'setting' => 'wimpie_lite_callto_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));


   //call to action Title
 $wp_customize->add_setting('wimpie_lite_callto_title', array(
  'default' => 'wimpie lite',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_callto_title',array(
  'type' => 'text',
  'label' => __('Call To Action Title','wimpie-lite'),
  'section' => 'wimpie_lite_callto_section',
  'setting' => 'wimpie_lite_callto_title'
  ));

    //clientlogo section description
 $wp_customize->add_setting('wimpie_lite_callto_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_callto_desc',array(
  'type' => 'textarea',
  'label' => __('Call To Description','wimpie-lite'),
  'section' => 'wimpie_lite_callto_section',
  'setting' => 'wimpie_lite_callto_desc'
  ));

    //call to action read more
 $wp_customize->add_setting('wimpie_lite_callto_readmore', array(
  'default' => 'Start Trial',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_callto_readmore',array(
  'type' => 'text',
  'label' => __('Call To Action Read More Text','wimpie-lite'),
  'section' => 'wimpie_lite_callto_section',
  'setting' => 'wimpie_lite_callto_readmore'
  ));

   //call to action link
 $wp_customize->add_setting('wimpie_lite_callto_link', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_callto_link',array(
  'type' => 'text',
  'label' => __('Call To Action Link','wimpie-lite'),
  'section' => 'wimpie_lite_callto_section',
  'setting' => 'wimpie_lite_callto_link'
  ));
   //call to action background image
 $wp_customize->add_setting('wimpie_lite_callto_bkgimage', array(
  'default' => '',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw'
  ));

 $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wimpie_lite_callto_bkgimage', array(
  'label' => __('Background Image for Call to Action', 'wimpie-lite'),
  'section' => 'wimpie_lite_callto_section',
  'setting' => 'wimpie_lite_callto_bkgimage'
  )));

    //Team Member Section
 $wp_customize->add_section('wimpie_lite_teammember_section', array(
  'priority' => 70,
  'title' => __('Team Member Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable call to action section
 $wp_customize->add_setting('wimpie_lite_teammember_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_teammember_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Team Member', 'wimpie-lite'),
  'section' => 'wimpie_lite_teammember_section',
  'setting' => 'wimpie_lite_teammember_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));


   //Team member Title
 $wp_customize->add_setting('wimpie_lite_teammember_title', array(
  'default' => 'Team Member Section',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_teammember_title',array(
  'type' => 'text',
  'label' => __('Team Memeber Title','wimpie-lite'),
  'section' => 'wimpie_lite_teammember_section',
  'setting' => 'wimpie_lite_teammember_title'
  ));

     //select category for team member
 $wp_customize->add_setting('wimpie_lite_teammember_setting_category',array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_teammember_setting_category', array(
  'label' => __('Select a Category to show in Team Member Section','wimpie-lite'),
  'section' => 'wimpie_lite_teammember_section',
  'setting' => 'wimpie_lite_teammember_setting_category'
  )));

   //Team Member button enable disable
 $wp_customize->add_setting('wimpie_lite_teammember_button_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_teammember_button_option', array(
  'type' => 'radio',
  'label' => __('Display Button for Category Page', 'wimpie-lite'),
  'section' => 'wimpie_lite_teammember_section',
  'setting' => 'wimpie_lite_teammember_button_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Team Member Button View more text
 $wp_customize->add_setting('wimpie_lite_teammember_button_text', array(
  'default' => 'View More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_teammember_button_text',array(
  'type' => 'text',
  'label' => __('Button Text','wimpie-lite'),
  'section' => 'wimpie_lite_teammember_section',
  'setting' => 'wimpie_lite_teammember_button_text'
  ));

   //homepage Client Logo section
 $wp_customize->add_section('wimpie_lite_clientlogo_section', array(
  'priority' => 75,
  'title' => __('Client Logo Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable clientlogo section
 $wp_customize->add_setting('wimpie_lite_clientlogo_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_clientlogo_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Client Logo Section', 'wimpie-lite'),
  'section' => 'wimpie_lite_clientlogo_section',
  'setting' => 'wimpie_lite_clientlogo_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //enable disable clientlogo view type
 $wp_customize->add_setting('wimpie_lite_clientlogo_viewtype', array(
  'default' => 'static',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_clientlogo_viewtype',
  ));

 $wp_customize->add_control('wimpie_lite_clientlogo_viewtype', array(
  'type' => 'radio',
  'label' => __('Enable Disable Client Logo Section', 'wimpie-lite'),
  'section' => 'wimpie_lite_clientlogo_section',
  'setting' => 'wimpie_lite_clientlogo_viewtype',
  'choices' => array(
   'static' => __('Static', 'wimpie-lite'),
   'scroll' => __('Scroll', 'wimpie-lite'),
   )
  ));

   //clientlogo section Title
 $wp_customize->add_setting('wimpie_lite_clientlogo_title', array(
  'default' => 'Client Logo Section',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_clientlogo_title',array(
  'type' => 'text',
  'label' => __('Client\'s Title','wimpie-lite'),
  'section' => 'wimpie_lite_clientlogo_section',
  'setting' => 'wimpie_lite_clientlogo_title'
  ));

    //clientlogo section description
 $wp_customize->add_setting('wimpie_lite_clientlogo_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_clientlogo_desc',array(
  'type' => 'textarea',
  'label' => __('Client Description','wimpie-lite'),
  'section' => 'wimpie_lite_clientlogo_section',
  'setting' => 'wimpie_lite_clientlogo_desc'
  ));

    //select category for client logos
 $wp_customize->add_setting('wimpie_lite_clientlogo_category_setting',array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_clientlogo_category_setting', array(
  'label' => __('Select a Category to show in Client Logo Section','wimpie-lite'),
  'section' => 'wimpie_lite_clientlogo_section',
  )));

    //Stat Counter Section
 $wp_customize->add_section('wimpie_lite_statcounter_section', array(
  'priority' => 80,
  'title' => __('Stat Counter Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));
    //Stat Counter Section
 $wp_customize->add_section('wimpie_lite_statcounter_section', array(
  'priority' => 80,
  'title' => __('Stat Counter Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable Stat counter section
 $wp_customize->add_setting('wimpie_lite_statcounter_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Stat Counter', 'wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Stat counter Title
 $wp_customize->add_setting('wimpie_lite_statcounter_title', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter_title',array(
  'type' => 'text',
  'label' => __('Stat Counter Title','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter_title'
  ));

     //stat counter description
 $wp_customize->add_setting('wimpie_lite_statcounter_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter_desc',array(
  'type' => 'textarea',
  'label' => __('Stat Counter Description','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter_desc'
  ));

    //stat counter 1
    //enable disable sc1 section
 $wp_customize->add_setting('wimpie_lite_statcounter1_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter1_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Stat Counter 1', 'wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter1_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Stat counter 1 Title
 $wp_customize->add_setting('wimpie_lite_statcounter1_title', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter1_title',array(
  'type' => 'text',
  'label' => __('Stat Counter 1 Title','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter1_title'
  ));

    //Stat counter 1 number
 $wp_customize->add_setting('wimpie_lite_statcounter1_number', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter1_number',array(
  'type' => 'text',
  'label' => __('Stat Counter 1 Number','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter1_number'
  ));

    //Stat counter 1 font awesome text
 $wp_customize->add_setting('wimpie_lite_statcounter1_fatext', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter1_fatext',array(
  'type' => 'text',
  'label' => __('Stat Counter 1 Font Awesome Text','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter1_fatext'
  ));

    //stat counter 2
    //enable disable sc2 section
 $wp_customize->add_setting('wimpie_lite_statcounter2_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter2_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Stat Counter 2', 'wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter2_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Stat counter Title
 $wp_customize->add_setting('wimpie_lite_statcounter2_title', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter2_title',array(
  'type' => 'text',
  'label' => __('Stat Counter 2 Title','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter2_title'
  ));

    //Stat counter 2 number
 $wp_customize->add_setting('wimpie_lite_statcounter2_number', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter2_number',array(
  'type' => 'text',
  'label' => __('Stat Counter 2 Number','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter2_number'
  ));

    //Stat counter 2 font awesome text
 $wp_customize->add_setting('wimpie_lite_statcounter2_fatext', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter2_fatext',array(
  'type' => 'text',
  'label' => __('Stat Counter 2 Font Awesome Text','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter2_fatext'
  ));

    //stat counter 3
    //enable disable sc3 section
 $wp_customize->add_setting('wimpie_lite_statcounter3_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter3_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Stat Counter 3', 'wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter3_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Stat counter 3 Title
 $wp_customize->add_setting('wimpie_lite_statcounter3_title', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter3_title',array(
  'type' => 'text',
  'label' => __('Stat Counter 3 Title','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter3_title'
  ));

    //Stat counter 3 number
 $wp_customize->add_setting('wimpie_lite_statcounter3_number', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter3_number',array(
  'type' => 'text',
  'label' => __('Stat Counter 3 Number','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter3_number'
  ));

    //Stat counter 3 font awesome text
 $wp_customize->add_setting('wimpie_lite_statcounter3_fatext', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter3_fatext',array(
  'type' => 'text',
  'label' => __('Stat Counter 3 Font Awesome Text','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter3_fatext'
  ));

    //stat counter 4
    //enable disable sc4 section
 $wp_customize->add_setting('wimpie_lite_statcounter4_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter4_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Stat Counter 4', 'wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter4_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //Stat counter 4 Title
 $wp_customize->add_setting('wimpie_lite_statcounter4_title', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter4_title',array(
  'type' => 'text',
  'label' => __('Stat Counter 4 Title','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter4_title'
  ));

    //Stat counter 4 number
 $wp_customize->add_setting('wimpie_lite_statcounter4_number', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_statcounter4_number',array(
  'type' => 'text',
  'label' => __('Stat Counter 4 Number','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter4_number'
  ));

    //Stat counter 4 Font awesome text
 $wp_customize->add_setting('wimpie_lite_statcounter4_fatext', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_statcounter4_fatext',array(
  'type' => 'text',
  'label' => __('Stat Counter 4 Font Awesome Text','wimpie-lite'),
  'section' => 'wimpie_lite_statcounter_section',
  'setting' => 'wimpie_lite_statcounter4_fatext'
  ));

    //Homepage Blog Section
 $wp_customize->add_section('wimpie_lite_blog_section', array(
  'priority' => 90,
  'title' => __('Blog Section', 'wimpie-lite'),
  'panel' => 'wimpie_lite_homepage_settings',
  ));

    //enable disable blog section
 $wp_customize->add_setting('wimpie_lite_blog_setting_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_blog_setting_option', array(
  'type' => 'radio',
  'label' => __('Enable Disable Blog Section', 'wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  'setting' => 'wimpie_lite_blog_setting_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //blog section Title
 $wp_customize->add_setting('wimpie_lite_blog_title', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_blog_title',array(
  'type' => 'text',
  'label' => __('Blog Section Title','wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  'setting' => 'wimpie_lite_blog_title'
  ));

    //blog section description
 $wp_customize->add_setting('wimpie_lite_blog_desc', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_blog_desc',array(
  'type' => 'textarea',
  'label' => __('Blog Section Description','wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  'setting' => 'wimpie_lite_blog_desc'
  ));

    //read more text for single page
 $wp_customize->add_setting('wimpie_lite_blog_single_readmore', array(
  'default' => 'View More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_blog_single_readmore',array(
  'type' => 'text',
  'label' => __('Details','wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  'setting' => 'wimpie_lite_blog_single_readmore'
  ));
   //select category for blog
 $wp_customize->add_setting('wimpie_lite_blog_setting_category',array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_integer_sanitize'
  ));

 $wp_customize->add_control( new Wimpie_Lite_WP_Customize_Category_Control( $wp_customize,'wimpie_lite_blog_setting_category', array(
  'label' => __('Select a category to show in blog section','wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  )));

    //enable disable blog section button
 $wp_customize->add_setting('wimpie_lite_blog_button_option', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_blog_button_option', array(
  'type' => 'radio',
  'label' => __('Display Button for Category Page', 'wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  'setting' => 'wimpie_lite_blog_button_option',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //blog Button View more text
 $wp_customize->add_setting('wimpie_lite_blog_button_text', array(
  'default' => 'Details',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  'transport' => 'postMessage'
  ));

 $wp_customize->add_control('wimpie_lite_blog_button_text',array(
  'type' => 'text',
  'label' => __('Button Text','wimpie-lite'),
  'section' => 'wimpie_lite_blog_section',
  'setting' => 'wimpie_lite_blog_button_text'
  ));

//Archive Settings
 $wp_customize->add_panel('wimpie_lite_archive_settings', array(
  'capabitity' => 'edit_theme_options',
      //'description' => __('Change the general Settings from here as you want', 'wimpie-lite'),
  'priority' => 40,
  'title' => __('Archive Pages Settings', 'wimpie-lite')
  ));

 //Portfolio Page Settings section
 $wp_customize->add_section('wimpie_lite_portfolio_setting', array(
  'priority' => 36,
  'title' => __('Portfolio Page Layout Settings', 'wimpie-lite'),
  'panel' => 'wimpie_lite_archive_settings',
  ));

    //Archive Page setting portfolio layout
 $wp_customize->add_setting('wimpie_lite_archive_setting_portfolio_layout', array(
  'default' => 'grid',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_listgrid',
  ));

 $wp_customize->add_control('wimpie_lite_archive_setting_portfolio_layout', array(
  'type' => 'radio',
  'label' => __('Portfolio Layout', 'wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_setting',
  'choices' => array(
   'grid' => __('Grid', 'wimpie-lite'),
   'list' => __('List', 'wimpie-lite'),
   )
  ));

   //Archive page portfolio list readmore text 
 $wp_customize->add_setting('wimpie_lite_archive_setting_portfolio_readmore', array(
  'default' => 'Read More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_archive_setting_portfolio_readmore',array(
  'type' => 'text',
  'label' => __('Read More Text for Portfolio list','wimpie-lite'),
  'section' => 'wimpie_lite_portfolio_setting',
  ));

//Portfolio Page Settings section
 $wp_customize->add_section('wimpie_lite_archive_setting', array(
  'priority' => 36,
  'title' => __('Read More Settings For Archives', 'wimpie-lite'),
  'panel' => 'wimpie_lite_archive_settings',
  ));

 $wp_customize->add_section('wimpie_lite_blog_setting',array(
  'title' => __('Blog Settings', 'wimpie-lite'),
  'priority' => '41',
  'panel' => 'wimpie_lite_archive_settings',
  ));

 $wp_customize->add_setting('wimpie_lite_blog_post_layout',array(
  'default'       =>      'blog_layout1',
  'sanitize_callback'     =>  'wimpie_lite_blog_layout'
  ));

 $wp_customize->add_control( 'wimpie_lite_blog_post_layout',array(
  'section' => 'wimpie_lite_blog_setting',
  'label' => __('Blog Layout', 'wimpie-lite'),
  'type' => 'select',
  'choices' => array( 
    'blog_layout1' => __('Blog Image Large', 'wimpie-lite'),
    'blog_layout2' => __('Blog Image Medium', 'wimpie-lite'),
    'blog_layout3' => __('Blog Image Alternate Medium', 'wimpie-lite'),
    'blog_layout4' => __('Blog Full Content', 'wimpie-lite'),
    )
  ));

    //Archive page archives list readmore text 
 $wp_customize->add_setting('wimpie_lite_archive_setting_archive_readmore', array(
  'default' => 'Read More',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_archive_setting_archive_readmore',array(
  'type' => 'text',
  'label' => __('Read More Text for All Other Archive list','wimpie-lite'),
  'section' => 'wimpie_lite_archive_setting',
  'setting' => 'wimpie_lite_archive_setting_archive_readmore'
  ));

 

    //social Settings section
 $wp_customize->add_section('wimpie_lite_social_setting', array(
  'priority' => 40,
  'title' => __('Social Section', 'wimpie-lite'),
  ));

 $wp_customize->add_setting('wimpie_lite_social_setting_option_footer', array(
  'default' => 'disable',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wimpie_lite_radio_sanitize_enabledisable',
  ));

 $wp_customize->add_control('wimpie_lite_social_setting_option_footer', array(
  'type' => 'radio',
  'label' => __('Enable Disable Social Icons in Footer', 'wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_setting_option_footer',
  'choices' => array(
   'enable' => __('Enable', 'wimpie-lite'),
   'disable' => __('Disable', 'wimpie-lite'),
   )
  ));

   //social facebook link
 $wp_customize->add_setting('wimpie_lite_social_facebook', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_facebook',array(
  'type' => 'text',
  'label' => __('Facebook','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_facebook'
  ));

    //social twitter link
 $wp_customize->add_setting('wimpie_lite_social_twitter', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_twitter',array(
  'type' => 'text',
  'label' => __('Twitter','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_twitter'
  ));

    //social googleplus link
 $wp_customize->add_setting('wimpie_lite_social_googleplus', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_googleplus',array(
  'type' => 'text',
  'label' => __('Google Plus','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_googleplus'
  ));

     //social youtube link
 $wp_customize->add_setting('wimpie_lite_social_youtube', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_youtube',array(
  'type' => 'text',
  'label' => __('YouTube','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_youtube'
  ));

     //social pinterest link
 $wp_customize->add_setting('wimpie_lite_social_pinterest', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_pinterest',array(
  'type' => 'text',
  'label' => __('Pinterest','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_pinterest'
  ));

    //social linkedin link
 $wp_customize->add_setting('wimpie_lite_social_linkedin', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_linkedin',array(
  'type' => 'text',
  'label' => __('Linkedin','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_linkedin'
  ));
  //social instagram link
 $wp_customize->add_setting('wimpie_lite_social_instagram', array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));

 $wp_customize->add_control('wimpie_lite_social_instagram',array(
  'type' => 'text',
  'label' => __('Instagram','wimpie-lite'),
  'section' => 'wimpie_lite_social_setting',
  'setting' => 'wimpie_lite_social_instagram'
  ));

 //Typography settings
 $wp_customize->add_panel( 'typography_panel',array(
  'priority' => 30,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
  'description' => __('Choose color and fonts/typography settings.','wimpie-lite'),
  'title' => __( 'Typography Settings', 'wimpie-lite' ),
  ));
 
    //typogarphy settings
 $wp_customize->add_section( 'wimpielite_typography_option' , array(
  'title'       => __('Typography Options','wimpie-lite'),
  'priority'    => 20,
  'panel' => 'typography_panel',
  ) );
 
    //heading typography   
 $wp_customize->add_setting('heading_typography',array(
  'default' => 'Open Sans Condensed',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control( new Wimpie_Lite_Typography_Dropdown( $wp_customize ,'heading_typography',array(
  'label' => __('Choose Fonts for Heading Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_option',
  'description' => __('Choose a font for the heading H1, H2, H3, H4, H5, H6 text','wimpie-lite'),
  'type' => 'select',
  )));

     //heading typography   
 $wp_customize->add_setting('body_typography',array(
  'default' => 'Open Sans Condensed',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control( new Wimpie_Lite_Typography_Dropdown( $wp_customize ,'body_typography',array(
  'label' => __('Choose Fonts for Body Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_option',
  'description' => 'Choose fonts for body text.',
  'type' => 'select',
  )));

     //typography formating
 $wp_customize->add_section( 'wimpielite_typography_format' , array(
  'title'       => 'Typography Formating',
  'priority'    => 20,
  'panel' => 'typography_panel',
  ));
 
  //body fonts size
 $wp_customize->add_setting('typography_size_body',array(
  'default' => '14',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control( 'typography_size_body',array(
  'label' => __('Body Fonts Size.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));

     //body color
 $wp_customize->add_setting('typography_color_body',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_body',array(
  'label' => __('Choose Body Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

    //heading typography formating h1  
 $wp_customize->add_setting('typography_format_h1',array(
  'default' => '26',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('typography_format_h1',array(
  'label' => __('Choose Fonts Size for H1 Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));

  //text color h1
 $wp_customize->add_setting('typography_color_h1',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_h1',array(
  'label' => __('Choose H1 Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

     //heading typography formating h2  
 $wp_customize->add_setting('typography_format_h2',array(
  'default' => '24',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('typography_format_h2',array(
  'label' => __('Choose Fonts Size for H2 Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));

//text color h2
 $wp_customize->add_setting('typography_color_h2',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_h2',array(
  'label' => __('Choose H2 Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

     //heading typography formating h13  
 $wp_customize->add_setting('typography_format_h3',array(
  'default' => '22',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('typography_format_h3',array(
  'label' => __('Choose Fonts Size for H3 Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));
 
 //text color h3
 $wp_customize->add_setting('typography_color_h3',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_h3',array(
  'label' => __('Choose H3 Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

  //heading typography formating h4  
 $wp_customize->add_setting('typography_format_h4',array(
  'default' => '20',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('typography_format_h4',array(
  'label' => __('Choose Fonts Size for H4 Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));

 //text color h4
 $wp_customize->add_setting('typography_color_h4',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_h4',array(
  'label' => __('Choose H4 Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

 //heading typography formating h5  
 $wp_customize->add_setting('typography_format_h5',array(
  'default' => '20',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('typography_format_h5',array(
  'label' => __('Choose Fonts Size for H5 Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));

 //text color h5
 $wp_customize->add_setting('typography_color_h5',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_h5',array(
  'label' => __('Choose H5 Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

 //heading typography formating h6  
 $wp_customize->add_setting('typography_format_h6',array(
  'default' => '20',
  'transport' => 'postMessage',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('typography_format_h6',array(
  'label' => __('Choose Fonts Size for H6 Text.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  'type' => 'number',
  ));

 //text color h6
 $wp_customize->add_setting('typography_color_h6',array(
  'default' => '#000000',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color',
  ));
 
 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'typography_color_h6',array(
  'label' => __('Choose H6 Text Color.','wimpie-lite'),
  'section' => 'wimpielite_typography_format',
  )));

 //Custom Css Js Tools Section
 $wp_customize->add_section( 'wimpielite_custom_tools' , array(
  'title'       => __('Custom Tools','wimpie-lite'),
  'priority'    => 220,
  ) );

  //custom js
 $wp_customize->add_setting('wimpielite_custom_tools_js',array(
  'default' => '',
  'sanitize_callback' => 'wimpie_lite_sanitize_text',
  ));
 
 $wp_customize->add_control('wimpielite_custom_tools_js',array(
  'type' => 'textarea',
  'label' => __('Custom Js','wimpie-lite'),
  'section' => 'wimpielite_custom_tools',
  ));

 function wimpie_lite_sanitize_text( $input ) {
  return wp_kses_post( force_balance_tags( $input ) );
}
function wimpie_lite_radio_sanitize_webpagelayout($input) {
  $valid_keys = array(
   'fullwidth' => __('Full Width', 'wimpie-lite'),
   'boxed' => __('Boxed', 'wimpie-lite')
   );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}
function wimpie_lite_radio_sanitize_headertype($input) {
  $valid_keys = array(
   'transparent'=>__('Transparent', 'wimpie-lite'),
   'classic'=>__('Classic', 'wimpie-lite')
   );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}
function wimpie_lite_radio_sanitize_alignment_logo($input) {
  $valid_keys = array(
    'left'=>__('Left', 'wimpie-lite'),
    'center'=>__('Center', 'wimpie-lite'),
    'right'=>__('Right', 'wimpie-lite')
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wimpie_lite_radio_sanitize_clientlogo_viewtype($input) {
  $valid_keys = array(
    'static' => __('Static', 'wimpie-lite'),
    'scroll' => __('Scroll', 'wimpie-lite')
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wimpie_lite_radio_sanitize_listgrid($input) {
  $valid_keys = array(
    'grid'=>__('Grid', 'wimpie-lite'),
    'list'=>__('List', 'wimpie-lite')
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wimpie_lite_radio_sanitize_enabledisable($input) {
  $valid_keys = array(
    'enable'=>__('Enable', 'wimpie-lite'),
    'disable'=>__('Disable', 'wimpie-lite')
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wimpie_lite_radio_sanitize_yesno($input) {
  $valid_keys = array(
    'yes'=>__('Yes', 'wimpie-lite'),
    'no'=>__('No', 'wimpie-lite')
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wimpie_lite_sanitize_transitiontype($input){
  $valid_keys = array(
    'fade' => __('Fade', 'wimpie-lite'),
    'horizontal' => __('Slide Horizontal', 'wimpie-lite'),
    'vertical' => __('Slide Vertical', 'wimpie-lite'),
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wimpie_lite_blog_layout($input){
  $valid_keys = array( 
    'blog_layout1' => __('Blog Large Image', 'wimpie-lite'),
    'blog_layout2' => __('Blog Medium Image ', 'wimpie-lite'),
    'blog_layout3' => __('Blog Medium Image - Alternate', 'wimpie-lite'),
    'blog_layout4' => __('Blog Full Content', 'wimpie-lite'),
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }

}
   // checkbox sanitization
function wimpie_lite_checkbox_sanitize($input) {
  if ( $input == 1 ) {
   return 1;
 } else {
   return '';
 }
}

   //integer sanitize
function wimpie_lite_integer_sanitize($input){
  return intval( $input );
}
}
add_action( 'customize_register', 'wimpie_lite_custom_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wimpie_lite_custom_customize_preview_js() {
	wp_enqueue_script( 'wimpie_lite_custom_customizer', get_template_directory_uri() . '/js/wimpielite-customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wimpie_lite_custom_customize_preview_js' );