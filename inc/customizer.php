<?php
/**
 * This file adds custom functions to your Theme Customizer.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Include customizer controls.
require_once get_stylesheet_directory() . '/inc/class/class-genesis-sample-separator-control.php';
require_once get_stylesheet_directory() . '/inc/class/class-genesis-sample-reset-control.php';

/**
 * Registers settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_sample_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		'genesis_sample_custom_settings',
		[
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Genesis Sample Custom Settings', 'genesis-sample' ),
			'description'    => '',
		]
	);

	$wp_customize->add_section(
		'genesis_sample_gutenberg_options',
		[
			'title'       => __( 'Gutenberg Theme Support', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set Gutenberg Theme Support options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis',
		]
	);

	$wp_customize->remove_section( 'colors' );

	$wp_customize->add_section(
		'genesis_sample_color_options',
		[
			'title'       => __( 'Gutenberg Color Palette', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set Block color palettes for Genesis Sample theme. <a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes"><code>editor-color-palette</code></a>', 'genesis-sample' ),
			'panel'       => 'genesis',
		]
	);

	$wp_customize->add_section(
		'genesis_sample_font_options',
		[
			'title'       => __( 'Gutenberg Font Sizes', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set Block Font sizes for Genesis Sample theme. <a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes"><code>editor-font-sizes</code></a>', 'genesis-sample' ),
			'panel'       => 'genesis',
		]
	);

	// Enable wide and full alignments.
	$wp_customize->add_setting(
		'genesis_sample_align_wide',
		[
			'default'           => true,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_align_wide',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_align_wide',
			'priority'    => 10,
			'label'       => __( 'Enable Wide and Full alignments.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment"><code>align-wide</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Enable Block Color Palettes.
	$wp_customize->add_setting(
		'genesis_sample_color_palette',
		[
			'default'           => true,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_color_palette',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_color_palette',
			'priority'    => 10,
			'label'       => __( 'Enable Block Color Palettes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes"><code>editor-color-palette</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Enable Block font sizes.
	$wp_customize->add_setting(
		'genesis_sample_editor_font_sizes',
		[
			'default'           => true,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_editor_font_sizes',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_editor_font_sizes',
			'priority'    => 10,
			'label'       => __( 'Enable Block font sizes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes"><code>editor-font-sizes</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Disable custom colors in block Color Palettes.
	$wp_customize->add_setting(
		'genesis_sample_custom_colors',
		[
			'default'           => false,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_custom_colors',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_custom_colors',
			'priority'    => 10,
			'label'       => __( 'Disable custom colors in Color Palettes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes"><code>disable-custom-colors</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Disable custom font sizes.
	$wp_customize->add_setting(
		'genesis_sample_custom_font_sizes',
		[
			'default'           => false,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_custom_font_sizes',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_custom_font_sizes',
			'priority'    => 10,
			'label'       => __( 'Disable custom font sizes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes"><code>disable-custom-font-sizes</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Enable editor styles.
	$wp_customize->add_setting(
		'genesis_sample_editor_styles',
		[
			'default'           => true,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_editor_styles',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_editor_styles',
			'priority'    => 10,
			'label'       => __( 'Enable Editor styles.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles"><code>editor-styles</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Enable a dark theme style.
	$wp_customize->add_setting(
		'genesis_sample_dark_backgrounds',
		[
			'default'           => false,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_dark-backgrounds',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_dark_backgrounds',
			'priority'    => 10,
			'label'       => __( 'Enable Dark editor style.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#dark-backgrounds"><code>dark-editor-style</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Enable default block styles.
	$wp_customize->add_setting(
		'genesis_sample_wp_block_styles',
		[
			'default'           => false,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_wp_block_styles',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_wp_block_styles',
			'priority'    => 10,
			'label'       => __( 'Enable Default core block styles.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles"><code>wp-block-styles</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Enable responsive embedded content.
	$wp_customize->add_setting(
		'genesis_sample_responsive_embeds',
		[
			'default'           => true,
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_responsive_embeds',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_responsive_embeds',
			'priority'    => 10,
			'label'       => __( 'Enable Responsive embedded content.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content"><code>responsive-embeds</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Separator.
	$wp_customize->add_setting(
		'genesis_sample_separator_1',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);

	$wp_customize->add_control(
		new Genesis_Sample_Separator_Control(
			$wp_customize,
			'genesis_sample_separator_1',
			[
				'section' => 'genesis_sample_gutenberg_options',
			]
		)
	);

	// Gutenberg Colors.
	$wp_customize->add_setting(
		'primary_color',
		[
			'default'           => '#0467c6',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_primary_color',
			[
				'label'       => __( 'Primary Color', 'genesis-sample' ),
				'description' => esc_html__( 'Add a color to use within the Gutenberg editor color palette.', 'genesis-sample' ),
				'settings'    => 'primary_color',
				'priority'    => 10,
				'section'     => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_color',
		[
			'default'    => '#004990',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_secondary_color',
			[
				'label'    => __( 'Secondary Color', 'genesis-sample' ),
				'settings' => 'secondary_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'black_color',
		[
			'default'    => '#000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_black_color',
			[
				'label'    => __( 'Black Color', 'genesis-sample' ),
				'settings' => 'black_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'blackish_color',
		[
			'default'    => '#333',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_blackish_color',
			[
				'label'    => __( 'Blackish Color', 'genesis-sample' ),
				'settings' => 'blackish_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'grey_color',
		[
			'default'    => '#6e6e6a',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_grey_color',
			[
				'label'    => __( 'Grey Color', 'genesis-sample' ),
				'settings' => 'grey_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'greyish_color',
		[
			'default'    => '#999',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_greyish_color',
			[
				'label'    => __( 'Greyish Color', 'genesis-sample' ),
				'settings' => 'greyish_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'white_color',
		[
			'default'    => '#fff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_white_color',
			[
				'label'    => __( 'White Color', 'genesis-sample' ),
				'settings' => 'white_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'transparent_color',
		[
			'default'    => 'transparent',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_transparent_color',
			[
				'label'    => __( 'Transparent Color', 'genesis-sample' ),
				'settings' => 'transparent_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'primary_alt_color',
		[
			'default'    => '#ff0014',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_primary_alt_color',
			[
				'label'    => __( 'Primary Alt Color', 'genesis-sample' ),
				'settings' => 'primary_alt_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_alt_color',
		[
			'default'    => '#b3000e',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_secondary_alt_color',
			[
				'label'    => __( 'Secondary Alt Color', 'genesis-sample' ),
				'settings' => 'secondary_alt_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'small_font_size',
		[
			'default'           => '15',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'small_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'settings' => 'small_font_size',
			'priority' => 10,
			'label'    => __( 'Small Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'normal_font_size',
		[
			'default'           => '18',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'normal_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'settings' => 'normal_font_size',
			'priority' => 10,
			'label'    => __( 'Normal Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'medium_font_size',
		[
			'default'           => '20',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'medium_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'settings' => 'medium_font_size',
			'priority' => 10,
			'label'    => __( 'Medium Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'large_font_size',
		[
			'default'           => '24',
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		'large_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'settings' => 'large_font_size',
			'priority' => 10,
			'label'    => __( 'Large Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'xlarge_font_size',
		[
			'default'           => '28',
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		'xlarge_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'settings' => 'xlarge_font_size',
			'priority' => 10,
			'label'    => __( 'XLarge Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

}
add_action( 'customize_register', 'genesis_sample_customize_register' );


/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function genesis_sample_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}


/**
 * Add custom body class to give some more weight to our styles.
 *
 * @since  1.0.0
 * @access public
 * @param  array $classes customizer body classes.
 * @return array
 */
function genesis_sample_body_class( $classes ) {
	return array_merge( $classes, [ 'gsc' ] );
}


/**
 * This will output the custom WordPress settings to the live theme's WP head.
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 * @since MyTheme 1.0
 */
function genesis_sample_customizer_header_output() {

	?>
	<style type="text/css">

		:root {
			--ccp-primary: <?php echo esc_attr( get_theme_mod( 'primary_color', '#0467c6' ) ); ?>;
			--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'secondary_color', '#004990' ) ); ?>;
			--ccp-black: <?php echo esc_attr( get_theme_mod( 'black_color', '#000' ) ); ?>;
			--ccp-blackish: <?php echo esc_attr( get_theme_mod( 'blackish_color', '#333' ) ); ?>;
			--ccp-grey: <?php echo esc_attr( get_theme_mod( 'grey_color', '#6e6e6a' ) ); ?>;
			--ccp-greyish: <?php echo esc_attr( get_theme_mod( 'greyish_color', '#999' ) ); ?>;
			--ccp-white: <?php echo esc_attr( get_theme_mod( 'white_color', '#fff' ) ); ?>;
			--ccp-transparent: <?php echo esc_attr( get_theme_mod( 'transparent_color', 'transparent' ) ); ?>;
			--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'primary_alt_color', '#ff0014' ) ); ?>;
			--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'secondary_alt_color', '#b3000e' ) ); ?>;

			--font-size-r: <?php echo esc_attr( get_theme_mod( 'regular_font_size', '14' ) ); ?>px;
			--font-size-s: <?php echo esc_attr( get_theme_mod( 'small_font_size', '15' ) ); ?>px;
			--font-size-n: <?php echo esc_attr( get_theme_mod( 'normal_font_size', '18' ) ); ?>px;
			--font-size-m: <?php echo esc_attr( get_theme_mod( 'medium_font_size', '20' ) ); ?>px;
			--font-size-l: <?php echo esc_attr( get_theme_mod( 'large_font_size', '24' ) ); ?>px;
			--font-size-xl: <?php echo esc_attr( get_theme_mod( 'xlarge_font_size', '28' ) ); ?>px;

		}

	</style>
	<?php

}
add_action( 'wp_head', 'genesis_sample_customizer_header_output' );


/**
 * Enqueue script for custom customize control.
 */
function genesis_sample_customizer_controls_enqueue() {

	wp_enqueue_script( genesis_get_theme_handle() . '-customizer-controls-script', get_stylesheet_directory_uri() . '/assets/js/customizer-controls.js', [ 'jquery', 'customize-controls' ], genesis_get_theme_version(), true );

	wp_register_style( genesis_get_theme_handle() . '-customizer-controls-style', get_stylesheet_directory_uri() . '/assets/css/customizer-controls.css', [], date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/customizer-controls.css' ) ), 'all' );

	wp_enqueue_style( genesis_get_theme_handle() . '-customizer-controls-style' );

}
add_action( 'customize_controls_enqueue_scripts', 'genesis_sample_customizer_controls_enqueue' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function genesis_sample_customize_preview_js() {

	wp_enqueue_script( genesis_get_theme_handle() . '-customizer-preview-script', get_stylesheet_directory_uri() . '/assets/js/customizer-preview.js', [ 'jquery', 'customize-preview' ], genesis_get_theme_version(), true );

}
add_action( 'customize_preview_init', 'genesis_sample_customize_preview_js' );


/**
 * Enqueue the customizer stylesheet.
 */
function genesis_sample_customizer_stylesheet() {

	wp_register_style( genesis_get_theme_handle() . '-customizer-styles', get_stylesheet_directory_uri() . '/assets/css/customizer.css', [], date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/customizer.css' ) ), 'all' );
	wp_enqueue_style( genesis_get_theme_handle() . '-customizer-styles' );

}
add_action( 'customize_controls_print_styles', 'genesis_sample_customizer_stylesheet' );
