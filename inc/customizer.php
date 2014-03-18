<?php
/**
 * Theme Customizer
 *
 * @package cwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->remove_control('header_textcolor');

	$wp_customize->add_section( 'codeinwp_logo_section' , array(
    	'title'       => __( 'Logo', 'cwp' ),
    	'priority'    => 30,
    	'description' => __('Upload a logo to replace the default site name and description in the header','cwp'),
	) );

	$wp_customize->add_setting( 'codeinwp_logo', array('default' => get_template_directory_uri().'/images/logo.png') );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
	    'label'    => __( 'Logo', 'cwp' ),
	    'section'  => 'codeinwp_logo_section',
	    'settings' => 'codeinwp_logo',
	) ) );
	

	/* Socials */
	$wp_customize->add_section( 'codeinwp_socials_section' , array(
    	'title'       => __( 'Socials', 'cwp' ),
    	'priority'    => 31,
	) );

	$wp_customize->add_setting( 'codeinwp_social_link_fb', array('sanitize_callback' => 'cwp_sanitize_text') );
	$wp_customize->add_control( 'codeinwp_social_link_fb', array(
	    'label'    => __( 'Facebook link', 'cwp' ),
	    'section'  => 'codeinwp_socials_section',
	    'settings' => 'codeinwp_social_link_fb',
		'priority'    => 5,
	) );
	$wp_customize->add_setting( 'codeinwp_social_link_tw', array('sanitize_callback' => 'cwp_sanitize_text') );
	$wp_customize->add_control( 'codeinwp_social_link_tw', array(
	    'label'    => __( 'Twitter link', 'cwp' ),
	    'section'  => 'codeinwp_socials_section',
	    'settings' => 'codeinwp_social_link_tw',
		'priority'    => 10,
	) );

}
add_action( 'customize_register', 'cwp_customize_register' );

function cwp_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}