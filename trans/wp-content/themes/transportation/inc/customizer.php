<?php
/**
 * Transportation Theme Customizer
 *
 * @package Transportation
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function transportation_customize_register( $wp_customize ) {
	
	function transportation_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	$wp_customize->get_setting( 'blogname' )->tranport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->tranport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => 'h1.site-title',
	    'render_callback' => 'transportation_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => 'p.site-description',
	    'render_callback' => 'transportation_customize_partial_blogdescription',
	) );
	
	/***************************************
	** Color Scheme
	***************************************/
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#3d65b8',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','transportation'),
			'description' => __('Select theme main color from here.','transportation'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	$wp_customize->add_setting('color_sub_scheme', array(
		'default' => '#e33c2f',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_sub_scheme',array(
			'description' => __('Select theme sub color from here.','transportation'),
			'section' => 'colors',
			'settings' => 'color_sub_scheme'
		))
	);
	
	$wp_customize->add_setting('transport_topheadbg_color', array(
		'default' => '#1e2a34',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'transport_topheadbg_color',array(
			'label' => __('Top Header Background color','transportation'),
			'description'	=> __('Select background color for top header.','transportation'),
			'section' => 'colors',
			'settings' => 'transport_topheadbg_color'
		))
	);

	$wp_customize->add_setting('transport_headerbg_color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'transport_headerbg_color',array(
			'label' => __('Header Background color','transportation'),
			'description'	=> __('Select background color for header.','transportation'),
			'section' => 'colors',
			'settings' => 'transport_headerbg_color'
		))
	);

	$wp_customize->add_setting('transport_footer_color', array(
		'default' => '#353534',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'transport_footer_color',array(
			'label' => __('Footer Background Color','transportation'),
			'description' => __('Select background color for footer.','transportation'),
			'section' => 'colors',
			'settings' => 'transport_footer_color'
		))
	);

	/***************************************
	** Registerd Theme Setup Panel
	***************************************/
	$wp_customize->add_panel( 'transport_theme_panel',
		array(
			'title'            => __( 'Setting up Theme', 'transportation' ),
			'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'transportation' ),
		)
	);
	
	/***************************************
	** Top Header Bar
	***************************************/
	$wp_customize->add_section( 'transport_tophead',
		array(
			'title' => __('Top Header Bar', 'transportation'),
			'priority' => null,
			'description' => __('Adding information to top header bar','transportation'),
			'panel' => 'transport_theme_panel',
		)
	);
	
	$wp_customize->add_setting('transport_th_wrkhrs',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'transport' => 'refresh'
	));
	
	$wp_customize->add_control('transport_th_wrkhrs',array(
		'type'	=> 'text',
		'label'	=> __('Add working hours here.','transportation'),
		'section'	=> 'transport_tophead'
	));
	
	$wp_customize->add_setting('transport_th_mail',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'transport' => 'refresh'
	));
	
	$wp_customize->add_control('transport_th_mail',array(
		'type'	=> 'text',
		'label'	=> __('Add email address here here.','transportation'),
		'section'	=> 'transport_tophead'
	));
	
	$wp_customize->add_setting('transport_th_phn',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'transport' => 'refresh'
	));
	
	$wp_customize->add_control('transport_th_phn',array(
		'type'	=> 'text',
		'label'	=> __('Add phone number here.','transportation'),
		'section'	=> 'transport_tophead'
	));
	
	$wp_customize->add_setting('transport_th_cttxt',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'transport' => 'refresh'
	));
	
	$wp_customize->add_control('transport_th_cttxt',array(
		'type'	=> 'text',
		'label'	=> __('Add button label here.','transportation'),
		'section'	=> 'transport_tophead'
	));
	
	$wp_customize->add_setting('transport_th_ctlnk',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('transport_th_ctlnk',array(
		'type'	=> 'text',
		'label'	=> __('Add button link here.','transportation'),
		'section'	=> 'transport_tophead'
	));
	
	$wp_customize->selective_refresh->add_partial('transport_headinfo_ricn', array(
        'selector' => '.head-right'
    ));
	
	$wp_customize->add_setting('transport_hide_tophead',array(
		'default' => true,
		'sanitize_callback' => 'transportation_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'transport_hide_tophead', array(
	   'settings' => 'transport_hide_tophead',
	   'section'   => 'transport_tophead',
	   'label'     => __('Check this to hide Top Header Bar.','transportation'),
	   'type'      => 'checkbox'
	));
	
	/***************************************
	** Slider Section
	***************************************/
	$wp_customize->add_section(
		'transport_theme_slider',
		array(
			'title' => __('Theme Slider', 'transportation'),
			'priority' => null,
			'description'	=> __('Recommended image size (1600x900). Slider will work only when you select the static front page.','transportation'),
			'panel' => 'transport_theme_panel',
		)
	);
	
	$wp_customize->add_setting('slide_sbttl',array(
		'default'	=> __('','transportation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('slide_sbttl',array(
		'label'	=> __('Add slider sub title text here.','transportation'),
		'section'	=> 'transport_theme_slider',
		'setting'	=> 'slide_sbttl',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('slide1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','transportation'),
			'section'	=> 'transport_theme_slider'
	));

	$wp_customize->add_setting('slide2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','transportation'),
			'section'	=> 'transport_theme_slider'
	));

	$wp_customize->add_setting('slide3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','transportation'),
			'section'	=> 'transport_theme_slider'
	));

	$wp_customize->add_setting('slide_more',array(
		'default'	=> __('Read More','transportation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('slide_more',array(
		'label'	=> __('Add slider link button text.','transportation'),
		'section'	=> 'transport_theme_slider',
		'setting'	=> 'slide_more',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('transport_hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'transportation_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'transport_hide_slider', array(
	   'settings' => 'transport_hide_slider',
	   'section'   => 'transport_theme_slider',
	   'label'     => __('Check this to hide slider.','transportation'),
	   'type'      => 'checkbox'
	));
	
	/***************************************
	** First Section
	***************************************/
	$wp_customize->add_section(
		'transport_first_sec',
		array(
			'title' => __('First Section', 'transportation'),
			'priority' => null,
			'description'	=> __('Select pages for homepage fisrt section. This section will be displayed only when you select the static front page.','transportation'),
			'panel' => 'transport_theme_panel',
		)
	);
	
	$wp_customize->add_setting('fsec1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('fsec1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first column','transportation'),
		'section'	=> 'transport_first_sec'
	));

	$wp_customize->add_setting('fsec2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('fsec2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second column','transportation'),
		'section'	=> 'transport_first_sec'
	));

	$wp_customize->add_setting('fsec3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('fsec3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third column','transportation'),
		'section'	=> 'transport_first_sec'
	));
	
	$wp_customize->add_setting('fsec_more',array(
		'default'	=> __('Read More','transportation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('fsec_more',array(
		'label'	=> __('Add read more button text.','transportation'),
		'section'	=> 'transport_first_sec',
		'setting'	=> 'fsec_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('transport_hide_fsec',array(
		'default' => true,
		'sanitize_callback' => 'transportation_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'transport_hide_fsec', array(
	   'settings' => 'transport_hide_fsec',
	   'section'   => 'transport_first_sec',
	   'label'     => __('Check this to hide first section.','transportation'),
	   'type'      => 'checkbox'
	));
	
	/***************************************
	** Second Section
	***************************************/
	$wp_customize->add_section(
		'transport_intro_sec',
		array(
			'title' => __('Second Section', 'transportation'),
			'priority' => null,
			'description'	=> __('Select page for homepage second section. This section will be displayed only when you select the static front page.','transportation'),
			'panel' => 'transport_theme_panel',
		)
	);
	
	$wp_customize->add_setting('transport_intro',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('transport_intro',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for display second section','transportation'),
		'section'	=> 'transport_intro_sec'
	));
	
	$wp_customize->selective_refresh->add_partial('transport_intro', array(
        'selector' => '.intro-content'
    ));
	
	$wp_customize->add_setting('intro_more',array(
		'default'	=> __('Read More','transportation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('intro_more',array(
		'label'	=> __('Add read more button text.','transportation'),
		'section'	=> 'transport_intro_sec',
		'setting'	=> 'intro_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('transport_hide_intro',array(
		'default' => true,
		'sanitize_callback' => 'transportation_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'transport_hide_intro', array(
	   'settings' => 'transport_hide_intro',
	   'section'   => 'transport_intro_sec',
	   'label'     => __('Check this to hide second section.','transportation'),
	   'type'      => 'checkbox'
	));
}
add_action( 'customize_register', 'transportation_customize_register' );

function transportation_css_func(){ ?>
<style>
	.header-top,
	.feat-box{
		background-color:<?php echo esc_attr(get_theme_mod('transport_topheadbg_color','#1e2a34'));?>;
	}
	#header,
	.sitenav ul li.menu-item-has-children:hover > ul,
	.sitenav ul li.menu-item-has-children:focus > ul,
	.sitenav ul li.menu-item-has-children.focus > ul{
		background-color:<?php echo esc_attr(get_theme_mod('transport_headerbg_color','#000000'));?>;
	}
	a,
	.tm_client strong,
	.postmeta a:hover,
	#sidebar ul li a:hover,
	.blog-post h3.entry-title,
	a.blog-more:hover,
	#commentform input#submit,
	input.search-submit,
	.blog-date .date{
		color:<?php echo esc_attr(get_theme_mod('color_scheme','#3d65b8'));?>;
	}
	h3.widget-title,
	.nav-links .current,
	.nav-links a:hover,
	p.form-submit input[type="submit"],
	.transport-slider .inner-caption .sliderbtn,
	.read-more,
	.nivo-controlNav a,
	h2.section_title:after,
	.massage-slider .inner-caption .sliderbtn,
	.cta-btn a{
		background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#3d65b8'));?>;
	}
	.header-top-left span i,
	p.site-description,
	.sitenav ul li.current_page_item a,
	.sitenav ul li a:hover,
	.sitenav ul li.current_page_item ul li a:hover{
		color:<?php echo esc_attr(get_theme_mod('color_sub_scheme','#e33c2f'));?>;
	}
	.cta-btn a:hover,
	.massage-slider .inner-caption .sliderbtn:hover{
		background-color:<?php echo esc_attr(get_theme_mod('color_sub_scheme','#e33c2f'));?>;
	}
	.copyright-wrapper{
		background-color:<?php echo esc_attr(get_theme_mod('transport_footer_color','#353534'));?>;
	}
</style>
<?php }
add_action('wp_head','transportation_css_func');

function transportation_customize_preview_js() {
	wp_enqueue_script( 'transportation-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'transportation_customize_preview_js' );