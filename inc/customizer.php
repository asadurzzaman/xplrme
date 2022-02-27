<?php
/**
 * xplrme Theme Customizer
 *
 * @package xplrme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xplrme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'xplrme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'xplrme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'xplrme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function xplrme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function xplrme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xplrme_customize_preview_js() {
	wp_enqueue_script( 'xplrme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'xplrme_customize_preview_js' );


add_action("customize_register","wpc_customizer_settings");

function wpc_customizer_settings($wp_customize){

    $wp_customize->add_panel( 'header_naviation_panel',
        array(
            'title' => __( 'Header & Navigation' ),
            'description' => esc_html__( 'Adjust your Header and Navigation sections.' ), // Include html tags such as

            'priority' => 160, // Not typically needed. Default is 160
            'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
        )
    );
    $wp_customize->add_section( 'sample_custom_controls_section',
        array(
            'title' => __( 'Sample Custom Controls' ),
            'description' => esc_html__( 'These are an example of Customizer Custom Controls.' ),
            'panel' => 'header_naviation_panel', // Only needed if adding your Section to a Panel
            'priority' => 160, // Not typically needed. Default is 160
            'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
        )
    );
    $wp_customize->add_setting( 'sample_custom_controls_section',
        array(
            'transport' => 'refresh', // Optional. 'refresh' or 'postMessage'. Default: 'refresh'
        )
    );
    $wp_customize->add_setting( 'sample_default_text3',
        array(
            'default' => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control( 'sample_default_text3',
        array(
            'label' => __( 'Default Text Control' ),
            'description' => esc_html__( 'Text controls Type can be either text, email, url, number, hidden, or date' ),
            'section' => 'sample_custom_controls_section',
            'settings'   => 'sample_default_text3',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'my-custom-class',
                'style' => 'border: 1px solid rebeccapurple',
                'placeholder' => __( 'Enter name...' ),
            ),
        )
    );






    $wp_customize->add_section( 'cd_button' , array(
        'title'      => 'Xplrme',
        'priority'   => 10,
    ) );

    $wp_customize->add_setting( 'cd_banner_img' , array(
        'transport'   => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'sample_default_media',
        array(
            'label' => __( 'Banner Image', 'xplrme' ),
            'description' => esc_html__( 'This is the description for the Media Control','xplrme' ),
            'section' => 'cd_button',
            'settings'   => 'cd_banner_img',
            'mime_type' => 'image',
            'button_labels' => array(
                'select' => esc_html__( 'Select File' ),
                'change' => esc_html__( 'Change File' ),
                'default' => esc_html__( 'Default' ),
                'remove' => esc_html__( 'Remove' ),
                'placeholder' => esc_html__( 'No file selected' ),
                'frame_title' => esc_html__( 'Select File' ),
                'frame_button' => esc_html__( 'Choose File' ),
            )
        )
    ) );

    $wp_customize->add_setting( 'banner_text_cb' , array(
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'Banner Text', array(
        'label' => 'Banner text',
        'section' => 'cd_button',
        'settings' => 'banner_text_cb',
        'type' => 'text',
    ) );

    $wp_customize->add_setting( 'banner_text_pre' , array(
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'Banner Desc', array(
        'label' => 'Banner Desc',
        'section' => 'cd_button',
        'settings' => 'banner_text_pre',
        'type' => 'textarea',
    ) );

    $wp_customize->add_setting( 'banner_button_cb' , array(
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'cd_button_text', array(
        'label' => 'Button Text',
        'section' => 'cd_button',
        'settings' => 'banner_button_cb',
        'type' => 'text',
    ) );

    $wp_customize->add_setting( 'courses_title_cb' , array(
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'courses_title', array(
        'label' => 'Courses Section Title',
        'section' => 'cd_button',
        'settings' => 'courses_title_cb',
        'type' => 'text',
    ) );

    $wp_customize->add_setting( 'review_title_cb' , array(
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'review_title', array(
        'label' => 'Review Section Title',
        'section' => 'cd_button',
        'settings' => 'review_title_cb',
        'type' => 'text',
    ) );

    $wp_customize->add_setting( 'join_us_img' , array(
        'transport'   => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'join_us_default_media',

        array(
            'label' => __( 'Join us Image', 'xplrme' ),
            'description' => esc_html__( 'This is the description for the Media Control','xplrme' ),
            'section' => 'cd_button',
            'settings'   => 'join_us_img',
            'mime_type' => 'image',
            'button_labels' => array(
                'select' => esc_html__( 'Select File' ),
                'change' => esc_html__( 'Change File' ),
                'default' => esc_html__( 'Default' ),
                'remove' => esc_html__( 'Remove' ),
                'placeholder' => esc_html__( 'No file selected' ),
                'frame_title' => esc_html__( 'Select File' ),
                'frame_button' => esc_html__( 'Choose File' ),
            )
        )
    ) );
}

