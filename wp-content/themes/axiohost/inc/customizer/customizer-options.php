<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Customizer panels.
 *
 * @since 1.0.0
 */
 
/*------------------------------------------
 => Panel 
------------------------------------------*/


Kirki::add_panel( 'general_options', array(
    'priority'    => 5,
    'title'       => esc_html__( 'General', 'axiohost' ),
) );

Kirki::add_panel( 'header_options', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Header', 'axiohost' ),
) );

Kirki::add_panel( 'page_options', array(
    'priority'    => 15,
    'title'       => esc_html__( 'Page', 'axiohost' ),
) ); 

Kirki::add_panel( 'blog_options', array(
    'priority'    => 15,
    'title'       => esc_html__( 'Blog', 'axiohost' ),
) ); 

Kirki::add_panel( 'typography', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Typograhy', 'axiohost' ),
) ); 

Kirki::add_panel( 'color_options', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Color', 'axiohost' ),
) ); 

/*------------------------------------------
 => Sections 
------------------------------------------*/

Kirki::add_section('back_to_top', array(
	'title'       => esc_html__('Scroll Back to Top', 'axiohost'),
	'priority'    => 600,
	'panel'       => 'general_options',
));
Kirki::add_section('read_more', array(
	'title'       => esc_html__('Read More', 'axiohost'),
	'priority'    => 10,
	'panel'       => 'blog_options',
));
Kirki::add_section('excerpt_limit', array(
	'title'       => esc_html__('Excerpt Limit', 'axiohost'),
	'priority'    => 15,
	'panel'       => 'blog_options',
));
Kirki::add_section('site_brand', array(
	'title'       => esc_html__('Site Brand', 'axiohost'),
	'priority'    => 5,
	'panel'       => 'header_options',
));
Kirki::add_section('page', array(
	'title'       => esc_html__('Inner Pages Header BG', 'axiohost'),
	'priority'    => 5,
	'panel'       => 'page_options',
));
Kirki::add_section('body', array(
	'title'       => esc_html__('Body', 'axiohost'),
	'priority'    => 5,
	'panel'       => 'typography',
));
Kirki::add_section('color_options_section', array(
	'title'       => esc_html__('Footer', 'axiohost'),
	'priority'    => 5,
	'panel'       => 'color_options',
));


/*------------------------------------------
 => Fields 
------------------------------------------*/
 
Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'switch',
	'settings'    => 'back_to_top',
	'label'       => esc_html__('Enable/Disable Scroll Back to Top', 'axiohost'),
	'section'     => 'back_to_top',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__('Enable', 'axiohost'),
		'off' => esc_html__('Disable', 'axiohost'),
	),
)
);

Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'switch',
	'settings'    => 'readmore_switch',
	'label'       => esc_html__('Enable/Disable Read More', 'axiohost'),
	'description' => esc_html__('You can show or hide your read more button.', 'axiohost'),
	'section'     => 'read_more',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__('Enable', 'axiohost'),
		'off' => esc_html__('Disable', 'axiohost'),
	),
)
);
Kirki::add_field( 	'axiohost_config', array(
	'type'     => 'text',
	'settings' => 'read_more_label',
	'label'    => esc_html__('Read More Label', 'axiohost'),
	'section'  => 'read_more',
	'default'  => esc_html__('Read More', 'axiohost'),
	'priority' => 10,
)
);
Kirki::add_field( 	'axiohost_config', array(
	'type'     => 'text',
	'settings' => 'post_excerpt_limit',
	'label'    => esc_html__('Post Excerpt Limit', 'axiohost'),
	'section'  => 'excerpt_limit',
	'default'  => 25,
	'priority' => 10,
)
);
Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'slider',
	'settings'    => 'brand',
	'label'       => esc_html__('Logo Brand Width(px)', 'axiohost'),
	'description'       => esc_html__('You can set your header logo image width', 'axiohost'),
	'section'     => 'site_brand',
	'default'     => 115,
	'choices'     => array(
		'min'  => 1,
		'max'  => 200,
		'step' => 1,
	)
	)
);
Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'page_title_bg',
	'label'       => esc_html__('Page Title Background', 'axiohost'),
	'section'     => 'page',
	'default'     => 'image',
	'priority'    => 10,
	'choices'     => array(
		'image'   => esc_html__('Image', 'axiohost'),
		'color' => esc_html__('Color', 'axiohost'),
	)
	)
);
Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'image',
	'settings'    => 'page_title_bg_image',
	'label'       => esc_html__('Upload an Image', 'axiohost'),
	'description' => esc_html__('You can upload you page title bg image', 'axiohost'),
	'section'     => 'page',
	'active_callback' => array(
		array(
			'setting'  => 'page_title_bg',
			'operator' => '==',
			'value'    => 'image',

		)
	)
	)
);
Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'color',
	'settings'    => 'page_title_bg_color',
	'label'       => esc_html__('Color', 'axiohost'),
	'description' => esc_html__('You can pick page title bg color', 'axiohost'),
	'section'     => 'page',
	'default'     => '#8066dc',
	'active_callback' => array(
		array(
			'setting'  => 'page_title_bg',
			'operator' => '==',
			'value'    => 'color',

		)
	)
	)
);

Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'typography',
	'settings'    => 'bodytypography',
	'label'       => esc_html__('Body Typography', 'axiohost'),
	'section'     => 'body',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'color'          => '',
		'text-transform' => 'none',
		'text-align'     => '',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
	)

);

Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'color',
	'settings'    => 'theme_primary_color',
	'label'       => esc_html__('Theme Main Color', 'axiohost'),
	'section'     => 'colors',
	'priority'    => 1,	
	'default'     => '#8066dc',
	)
);

 
Kirki::add_field( 	'axiohost_config', array(
	'type'        => 'color',
	'settings'    => 'footer_text_color',
	'label'       => esc_html__('Footer Text Color', 'axiohost'),
	'section'     => 'color_options_section',
	'priority'    => 2,	
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.footer-copyright-text',
		),
	),
	
	)
);

 
