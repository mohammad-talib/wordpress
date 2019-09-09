<?php
/**
 * business_prima Theme Customizer
 *
 * @package business_prima
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_prima_customize_register( $wp_customize ) {

	global $business_primaPostsPagesArray, $business_primaYesNo, $business_primaSliderType, $business_primaServiceLayouts, $business_primaAvailableCats, $business_primaBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'business_prima_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'business_prima_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'business_prima_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'business-prima'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'business_prima_general';
	$wp_customize->get_section( 'background_image' )->panel = 'business_prima_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'business-prima');
	$wp_customize->get_section( 'header_image' )->panel = 'business_prima_general';
	$wp_customize->get_section( 'header_image' )->title = __('Header Settings', 'business-prima');
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_control( 'header_image' )->active_callback = 'business_prima_show_wp_header_control';	
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_prima_panel';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'business-prima');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'business-prima' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_prima_business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'business-prima'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'business_prima_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new business_prima_Customize_Control_Upgrade(
		$wp_customize,
		'business_prima_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'business-prima' ),
			'settings'   => 'business_prima_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_prima_business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_prima_business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'business-prima'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'business_prima_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new business_prima_Customize_Control_Guide(
		$wp_customize,
		'business_prima_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'business-prima' ),
			'settings'   => 'business_prima_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_prima_business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );
	
	/* Header Section */
	$wp_customize->add_setting( 'business_prima_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_show_slider',
		array(
			'label'      => __( 'Show header?', 'business-prima' ),
			'settings'   => 'business_prima_show_slider',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $business_primaYesNo,
		)
	) );	
	$wp_customize->add_setting( 'business_prima_header_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_header_type',
		array(
			'label'      => __( 'Header type :', 'business-prima' ),
			'settings'   => 'business_prima_header_type',
			'priority'   => 11,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $business_primaSliderType,
		)
	) );
	
	$wp_customize->add_setting( 'business_prima_slider_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_slider_cat',
		array(
			'label'      => __( 'Select a category for owl slider :', 'business-prima' ),
			'settings'   => 'business_prima_slider_cat',
			'priority'   => 20,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $business_primaAvailableCats,
			'active_callback' => 'business_prima_show_owl_control'
		)
	) );	
	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_prima_panel', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'business-prima'),
		'active_callback' => '',
	) );
	
	$wp_customize->add_section( 'business_prima_layout_selection', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select FrontPage Layout', 'business-prima'),
		'active_callback' => 'business_prima_front_page_sections',
		'panel'  => 'business_prima_panel',
	) );
	$wp_customize->add_setting( 'business_prima_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_layout_type',
		array(
			'label'      => __( 'Layout type :', 'business-prima' ),
			'settings'   => 'business_prima_layout_type',
			'priority'   => 10,
			'section'    => 'business_prima_layout_selection',
			'type'    => 'select',
			'choices' => $business_primaBusinessLayoutType,
		)
	) );	
	
	$wp_customize->add_section( 'business_prima_layout_one', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('One settings', 'business-prima'),
		'active_callback' => 'business_prima_front_page_sections',
		'panel'  => 'business_prima_panel',
	) );
	$wp_customize->add_setting( 'business_prima_one_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_one_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'business-prima' ),
			'settings'   => 'business_prima_one_welcome_post',
			'priority'   => 10,
			'section'    => 'business_prima_layout_one',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'business_prima_one_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_one_services_cat',
		array(
			'label'      => __( 'Select a category :', 'business-prima' ),
			'settings'   => 'business_prima_one_services_cat',
			'priority'   => 20,
			'section'    => 'business_prima_layout_one',
			'type'    => 'select',
			'choices' => $business_primaAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'business_prima_one_services_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_one_services_num',
		array(
			'label'      => __( 'Number of posts :', 'business-prima' ),
			'settings'   => 'business_prima_one_services_num',
			'priority'   => 20,
			'section'    => 'business_prima_layout_one',
			'type'    => 'text',
		)
	) );	
	
	$wp_customize->add_section( 'business_prima_layout_two', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Two settings', 'business-prima'),
		'active_callback' => 'business_prima_front_page_sections',
		'panel'  => 'business_prima_panel',
	) );
	$wp_customize->add_setting( 'business_prima_two_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_six_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'business-prima' ),
			'settings'   => 'business_prima_two_welcome_post',
			'priority'   => 10,
			'section'    => 'business_prima_layout_two',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'business_prima_two_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_two_services_cat',
		array(
			'label'      => __( 'Select a category :', 'business-prima' ),
			'settings'   => 'business_prima_two_services_cat',
			'priority'   => 20,
			'section'    => 'business_prima_layout_two',
			'type'    => 'select',
			'choices' => $business_primaAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'business_prima_two_services_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_two_services_num',
		array(
			'label'      => __( 'Number of posts :', 'business-prima' ),
			'settings'   => 'business_prima_two_services_num',
			'priority'   => 20,
			'section'    => 'business_prima_layout_two',
			'type'    => 'text',
		)
	) );
	
	$wp_customize->add_setting( 'business_prima_two_portfolio_title',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_two_portfolio_title',
		array(
			'label'      => __( 'Portfolio section title :', 'business-prima' ),
			'settings'   => 'business_prima_two_portfolio_title',
			'priority'   => 20,
			'section'    => 'business_prima_layout_two',
			'type'    => 'text',
		)
	) );	
	
	$wp_customize->add_setting( 'business_prima_two_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_two_portfolio_cat',
		array(
			'label'      => __( 'Select a category :', 'business-prima' ),
			'settings'   => 'business_prima_two_portfolio_cat',
			'priority'   => 20,
			'section'    => 'business_prima_layout_two',
			'type'    => 'select',
			'choices' => $business_primaAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'business_prima_two_portfolio_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_two_portfolio_num',
		array(
			'label'      => __( 'Number of posts :', 'business-prima' ),
			'settings'   => 'business_prima_two_portfolio_num',
			'priority'   => 20,
			'section'    => 'business_prima_layout_two',
			'type'    => 'text',
		)
	) );	
	
	$wp_customize->add_section( 'business_prima_layout_wooone', array(
		'priority'       => 60,
		'capability'     => 'edit_theme_options',
		'title'      => __('Woo One settings', 'business-prima'),
		'active_callback' => 'business_prima_front_page_sections',
		'panel'  => 'business_prima_panel',
	) );

	$wp_customize->add_setting( 'business_prima_wooone_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_wooone_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'business-prima' ),
			'settings'   => 'business_prima_wooone_welcome_post',
			'priority'   => 10,
			'section'    => 'business_prima_layout_wooone',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'business_prima_wooone_latest_heading',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_wooone_latest_heading',
		array(
			'label'      => __( 'Products Heading :', 'business-prima' ),
			'settings'   => 'business_prima_wooone_latest_heading',
			'priority'   => 20,
			'section'    => 'business_prima_layout_wooone',
			'type'    => 'text',
		)
	) );
	$wp_customize->add_setting( 'business_prima_wooone_latest_text',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_wooone_latest_text',
		array(
			'label'      => __( 'Products Text :', 'business-prima' ),
			'settings'   => 'business_prima_wooone_latest_text',
			'priority'   => 30,
			'section'    => 'business_prima_layout_wooone',
			'type'    => 'text',
		)
	) );
	
	$wp_customize->add_section( 'business_prima_layout_seven', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Seven settings', 'business-prima'),
		'active_callback' => 'business_prima_front_page_sections',
		'panel'  => 'business_prima_panel',
	) );
	$wp_customize->add_setting( 'business_prima_seven_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_seven_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'business-prima' ),
			'settings'   => 'business_prima_seven_welcome_post',
			'priority'   => 10,
			'section'    => 'business_prima_layout_seven',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'business_prima_seven_work_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_seven_work_post',
		array(
			'label'      => __( 'Work post :', 'business-prima' ),
			'settings'   => 'business_prima_seven_work_post',
			'priority'   => 20,
			'section'    => 'business_prima_layout_seven',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'business_prima_seven_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_seven_portfolio_cat',
		array(
			'label'      => __( 'Select a category for portfolio:', 'business-prima' ),
			'settings'   => 'business_prima_seven_portfolio_cat',
			'priority'   => 30,
			'section'    => 'business_prima_layout_seven',
			'type'    => 'select',
			'choices' => $business_primaAvailableCats,
		)
	) );
	$wp_customize->add_setting( 'business_prima_seven_work_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_seven_work_num',
		array(
			'label'      => __( 'Number of posts :', 'business-prima' ),
			'settings'   => 'business_prima_seven_work_num',
			'priority'   => 40,
			'section'    => 'business_prima_layout_two',
			'type'    => 'text',
		)
	) );	
	$wp_customize->add_setting( 'business_prima_seven_about_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_seven_about_post',
		array(
			'label'      => __( 'About post :', 'business-prima' ),
			'settings'   => 'business_prima_seven_about_post',
			'priority'   => 50,
			'section'    => 'business_prima_layout_seven',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );	

	$wp_customize->add_section( 'business_prima_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'business-prima'),
		'active_callback' => '',
		'panel'  => 'business_prima_general',
	) );
	$wp_customize->add_setting( 'business_prima_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_show_quote',
		array(
			'label'      => __( 'Show quote?', 'business-prima' ),
			'settings'   => 'business_prima_show_quote',
			'priority'   => 10,
			'section'    => 'business_prima_quote',
			'type'    => 'select',
			'choices' => $business_primaYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_prima_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_quote_post',
		array(
			'label'      => __( 'Select post', 'business-prima' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'business-prima' ),
			'settings'   => 'business_prima_quote_post',
			'priority'   => 11,
			'section'    => 'business_prima_quote',
			'type'    => 'select',
			'choices' => $business_primaPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_prima_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'business-prima'),
		'active_callback' => '',
		'panel'  => 'business_prima_general',
	) );	
	$wp_customize->add_setting( 'business_prima_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'business_prima_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_prima_show_social',
		array(
			'label'      => __( 'Show social?', 'business-prima' ),
			'settings'   => 'business_prima_show_social',
			'priority'   => 10,
			'section'    => 'business_prima_social',
			'type'    => 'select',
			'choices' => $business_primaYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_prima_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_facebook', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'business-prima' ),
	  'description' => __( 'Enter your facebook url.', 'business-prima' ),
	) );
	$wp_customize->add_setting( 'business_prima_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_flickr', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'business-prima' ),
	  'description' => __( 'Enter your flickr url.', 'business-prima' ),
	) );
	$wp_customize->add_setting( 'business_prima_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_gplus', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'business-prima' ),
	  'description' => __( 'Enter your gplus url.', 'business-prima' ),
	) );
	$wp_customize->add_setting( 'business_prima_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'business-prima' ),
	  'description' => __( 'Enter your linkedin url.', 'business-prima' ),
	) );
	$wp_customize->add_setting( 'business_prima_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_reddit', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'business-prima' ),
	  'description' => __( 'Enter your reddit url.', 'business-prima' ),
	) );
	$wp_customize->add_setting( 'business_prima_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_stumble', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'business-prima' ),
	  'description' => __( 'Enter your stumble url.', 'business-prima' ),
	) );
	$wp_customize->add_setting( 'business_prima_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_prima_twitter', array(
	  'type' => 'text',
	  'section' => 'business_prima_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'business-prima' ),
	  'description' => __( 'Enter your twitter url.', 'business-prima' ),
	) );	
	
}
add_action( 'customize_register', 'business_prima_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_prima_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_prima_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_prima_customize_preview_js() {
	wp_enqueue_script( 'business_prima-customizer', esc_url( get_template_directory_uri() ) . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_prima_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function business_prima_sanitize_yes_no_setting( $value ){
	global $business_primaYesNo;
    if ( ! array_key_exists( $value, $business_primaYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function business_prima_sanitize_post_selection( $value ){
	global $business_primaPostsPagesArray;
    if ( ! array_key_exists( $value, $business_primaPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function business_prima_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function business_prima_show_wp_header_control(){
	
	$value = false;
	
	if( 'header' == get_theme_mod( 'business_prima_header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function business_prima_show_header_one_control(){
	
	$value = false;
	
	if( 'header-one' == get_theme_mod( 'business_prima_header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function business_prima_show_owl_control(){
	
	$value = false;
	
	if( 'owl' == get_theme_mod( 'business_prima_header_type' ) || 'select' == get_theme_mod( 'business_prima_header_type' ) || '' == get_theme_mod( 'business_prima_header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function business_prima_sanitize_slider_type_setting( $value ){

	global $business_primaSliderType;
    if ( ! array_key_exists( $value, $business_primaSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function business_prima_sanitize_cat_setting( $value ){
	
	global $business_primaAvailableCats;
	
	if( ! array_key_exists( $value, $business_primaAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function business_prima_sanitize_layout_type( $value ){
	
	global $business_primaBusinessLayoutType;
	
	if( ! array_key_exists( $value, $business_primaBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'business_prima_load_customize_classes', 0 );
function business_prima_load_customize_classes( $wp_customize ) {
	
	class business_prima_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'business_prima-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="business_prima-upgrade-container" class="business_prima-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .business_prima-upgrade-container -->
			
		<?php }	
		
	}
	
	class business_prima_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'business_prima-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="business_prima-upgrade-container" class="business_prima-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .business_prima-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'business_prima_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'business_prima_Customize_Control_Guide' );
	
	
}