<?php
/**
 * This file adds custom functions to your Theme Customizer.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

/**
 * Load Custom Controls
 */
require_once get_stylesheet_directory() . '/inc/class-genesis-sample-separator-control.php';

/**
 * Registers settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_sample_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		'genesis-sample-custom-options',
		array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Genesis Sample Custom Options', 'genesis-sample' ),
			'description'    => '',
		)
	);

	// All our sections, settings, and controls will be added here.
	$wp_customize->add_section(
		'genesis-sample-gutenberg-options',
		array(
			'title'       => __( 'Gutenberg', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set custom options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis-sample-custom-options',
		)
	);

	$wp_customize->remove_section( 'colors');

	$wp_customize->add_section(
		'genesis-sample-color-options',
		array(
			'title'       => __( 'Editor Color Palette', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set custom options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis-sample-custom-options',
		)
	);

	$wp_customize->add_section(
		'genesis-sample-font-options',
		array(
			'title'       => __( 'Editor Font Sizes', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set custom Font options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis-sample-custom-options',
		)
	);


	$wp_customize->add_setting(
		'genesis-sample-dark-mode',
		array(
			'default'    => '',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis-sample-dark-mode',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Enable a dark theme style.', 'genesis-sample' ),
				'settings' => 'genesis-sample-dark-mode',
				'priority' => 10,
				'section'  => 'genesis-sample-gutenberg-options',
			)
		)
	);

	// Separator.
	$wp_customize->add_setting(
		'genesis_sample_separator_1',
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new Genesis_Sample_Separator_Control(
			$wp_customize,
			'genesis_sample_separator_1',
			array(
				'section' => 'genesis-sample-options',
			)
		)
	);

	// 2. Register new settings to the WP database.
		$wp_customize->add_setting(
			'link_textcolor', // No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record.
			array(
				'default'    => '#000', // Default setting/value to save.
				'type'       => 'theme_mod', // Is this an 'option' or a 'theme_mod'?.
				'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?.
			)
		);

		// 3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		$wp_customize->add_control(
			new WP_Customize_Color_Control( // Instantiate the color control class.
				$wp_customize, // P ass the $wp_customize object (required).
				'mytheme_link_textcolor', // Set a unique ID for the control.
				array(
					'label'    => __( 'Link Color', 'genesis-sample' ), // Admin-visible name of the control.
					'settings' => 'link_textcolor', // Which setting to load and manipulate (serialized is okay).
					'priority' => 10, // Determines the order this control appears in for the specified section.
					'section'  => 'genesis-sample-color-options', // ID of the section this control should render in (can be one of yours, or a WordPress default section).
				)
			)
		);

		// 2. Register new settings to the WP database...
		$wp_customize->add_setting(
			'link_textaccentcolor', // No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record.
			array(
				'default'    => '#000', // Default setting/value to save.
				'type'       => 'theme_mod', // Is this an 'option' or a 'theme_mod'?.
				'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?.
			)
		);

		// 3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		$wp_customize->add_control(
			new WP_Customize_Color_Control( // Instantiate the color control class.
				$wp_customize, // Pass the $wp_customize object (required).
				'mytheme_link_textaccentcolor', // Set a unique ID for the control.
				array(
					'label'    => __( 'Link Accent Color', 'genesis-sample' ), // Admin-visible name of the control.
					'settings' => 'link_textaccentcolor', // Which setting to load and manipulate (serialized is okay).
					'priority' => 10, // Determines the order this control appears in for the specified section.
					'section'  => 'genesis-sample-color-options', // ID of the section this control should render in (can be one of yours, or a WordPress default section).
				)
			)
		);

	$wp_customize->add_setting(
		'genesis_sample_custom_editor_font_sizes',
		array(
			'default'    => '',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_custom_editor_font_sizes',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Enable a dark theme style.', 'genesis-sample' ),
				'settings' => 'genesis-sample-dark-mode',
				'priority' => 10,
				'section'  => 'genesis-sample-font-options',
			)
		)
	);

}
add_action( 'customize_register', 'genesis_sample_customize_register' );
