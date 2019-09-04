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
 * Returns the default settings.
 *
 * @param  array $theme_mod setting option.
 * @return array $default_options
 */
function genesis_sample_get_customiser_default( $theme_mod ) {

	$defaults = [
		'genesis_sample_align_wide'        => 'true',
		'genesis_sample_color_palette'     => 'true',
		'genesis_sample_custom_colors'     => 'false',
		'genesis_sample_editor_font_sizes' => 'true',
		'genesis_sample_custom_font_sizes' => 'false',
		'genesis_sample_editor_styles'     => 'true',
		'genesis_sample_dark_backgrounds'  => 'false',
		'genesis_sample_wp_block_styles'   => 'false',
		'genesis_sample_responsive_embeds' => 'true',
		'primary_color'                    => '#0467c6',
		'secondary_color'                  => '#004990',
		'primary_alt_color'                => '#ff0014',
		'secondary_alt_color'              => '#b3000e',
		'black_color'                      => '#000',
		'dark_gray_01_color'               => '#333',
		'dark_gray_02_color'               => '#666',
		'light_gray_02_color'              => '#eee',
		'light_gray_01_color'              => '#f5f5f5',
		'white_color'                      => '#fff',
		'primary_dark_color'               => '#03a577',
		'secondary_dark_color'             => '#02684c',
		'primary_alt_dark_color'           => '#ff0014',
		'secondary_alt_dark_color'         => '#b3000e',
		'regular_font_size'                => '14',
		'xx_small_font_size'               => '14',
		'x_small_font_size'                => '15',
		'small_font_size'                  => '16',
		'normal_font_size'                 => '18',
		'medium_font_size'                 => '20',
		'large_font_size'                  => '24',
		'xx_large_font_size'               => '27',
		'xx_large_font_size'               => '30',

	];

	return isset( $defaults[ $theme_mod ] ) ? $defaults[ $theme_mod ] : false;

}

/**
 * Registers settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_sample_customize_register( $wp_customize ) {

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

	$dark_mode_color_palette_section_link = "javascript:wp.customize.section( 'genesis_sample_dark_color_options' ).focus()";

	$wp_customize->add_section(
		'genesis_sample_color_options',
		[
			'title'       => __( 'Gutenberg Color Palette', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			// translators: Section description with link to another section.
			'description' => sprintf( __( 'Allows you to set Block color palette for Genesis Sample theme. If you are looking to change colors for Dark Mode, go <a href="%s">here</a>.', 'genesis-sample' ), $dark_mode_color_palette_section_link ),
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

	$gutenberg_color_palette_section_link = "javascript:wp.customize.section( 'genesis_sample_color_options' ).focus()";

	$wp_customize->add_section(
		'genesis_sample_dark_color_options',
		[
			'title'       => __( 'Dark Mode Color Palette', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			// translators: Section description with link to another section.
			'description' => sprintf( __( 'Allows you to set color palette for Dark mode in Genesis Sample theme. If you are looking to change colors for Block color palette, go <a href="%s">here</a>.', 'genesis-sample' ), $gutenberg_color_palette_section_link ),
			'panel'       => 'genesis',
		]
	);

	// Enable wide and full alignments.
	$wp_customize->add_setting(
		'genesis_sample_align_wide',
		[
			'default'           => genesis_sample_get_customiser_default( 'genesis_sample_align_wide' ),
			'sanitize_callback' => 'genesis_sample_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'genesis_sample_align_wide',
		[
			'section'     => 'genesis_sample_gutenberg_options',
			'settings'    => 'genesis_sample_align_wide',
			'priority'    => 10,
			'label'       => __( 'Wide and Full alignments.', 'genesis-sample' ),
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
			'label'       => __( 'Block Color Palettes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes"><code>editor-color-palette</code></a>', 'genesis-sample' ),
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
			'label'       => __( 'Disable Custom colors in block color palettes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes"><code>disable-custom-colors</code></a>', 'genesis-sample' ),
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
			'label'       => __( 'Block font sizes.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes"><code>editor-font-sizes</code></a>', 'genesis-sample' ),
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
			'label'       => __( 'Disable Custom font sizes.', 'genesis-sample' ),
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
			'label'       => __( 'Editor styles.', 'genesis-sample' ),
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
			'label'       => __( 'Dark editor style.', 'genesis-sample' ),
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
			'label'       => __( 'Default core block styles.', 'genesis-sample' ),
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
			'label'       => __( 'Responsive embedded content.', 'genesis-sample' ),
			'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content"><code>responsive-embeds</code></a>', 'genesis-sample' ),
			'type'        => 'checkbox',
		]
	);

	// Separator.
	$wp_customize->add_setting(
		'genesis_sample_separator',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);

	$wp_customize->add_control(
		new Genesis_Sample_Separator_Control(
			$wp_customize,
			'genesis_sample_separator',
			[
				'section' => 'genesis_sample_gutenberg_options',
			]
		)
	);

	// Gutenberg Colors.
	$wp_customize->add_setting(
		'primary_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'primary_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			[
				'label'   => __( 'Primary Color', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'secondary_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			[
				'label'   => __( 'Secondary Color', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'primary_alt_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'primary_alt_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_alt_color',
			[
				'label'   => __( 'Primary Alt Color', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_alt_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'secondary_alt_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_alt_color',
			[
				'label'   => __( 'Secondary Alt Color', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'black_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'black_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'black_color',
			[
				'label'   => __( 'Black', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'dark_gray_01_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'dark_gray_01_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_gray_01_color',
			[
				'label'   => __( 'Dark Gray One', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'dark_gray_02_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'dark_gray_02_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_gray_02_color',
			[
				'label'   => __( 'Dark Gray Two', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'light_gray_02_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'light_gray_02_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'light_gray_02_color',
			[
				'label'   => __( 'Light Gray Two', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'light_gray_01_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'light_gray_01_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'light_gray_01_color',
			[
				'label'   => __( 'Light Gray One', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'white_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'white_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'white_color',
			[
				'label'   => __( 'White', 'genesis-sample' ),
				'section' => 'genesis_sample_color_options',
			]
		)
	);

	// Gutenberg Dark Colors.
	$wp_customize->add_setting(
		'primary_dark_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'primary_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_dark_color',
			[
				'label'   => __( 'Primary Dark Color', 'genesis-sample' ),
				'section' => 'genesis_sample_dark_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_dark_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'secondary_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_dark_color',
			[
				'label'   => __( 'Secondary Dark Color', 'genesis-sample' ),
				'section' => 'genesis_sample_dark_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'primary_alt_dark_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'primary_alt_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_alt_dark_color',
			[
				'label'   => __( 'Primary Alt Dark Color', 'genesis-sample' ),
				'section' => 'genesis_sample_dark_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_alt_dark_color',
		[
			'default'           => genesis_sample_get_customiser_default( 'secondary_alt_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_alt_dark_color',
			[
				'label'   => __( 'Secondary Alt Dark Color', 'genesis-sample' ),
				'section' => 'genesis_sample_dark_color_options',
			]
		)
	);

	// Gutenberg Fonts.
	$wp_customize->add_setting(
		'regular_font_size',
		[
			'default'           => genesis_sample_get_customiser_default( 'regular_font_size' ),
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		new Genesis_Sample_Reset_Control(
			$wp_customize,
			'regular_font_size',
			[
				'section' => 'genesis_sample_font_options',
				'label'   => __( 'Regular Font size (px).', 'genesis-sample' ),
				'type'    => 'number',
			]
		)
	);

	// Gutenberg Font Sizes.
	$wp_customize->add_setting(
		'xx_small_font_size',
		[
			'default'           => '14',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'xx_small_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'priority' => 10,
			'label'    => __( 'XX Small Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'x_small_font_size',
		[
			'default'           => '15',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'x_small_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'priority' => 10,
			'label'    => __( 'X Small Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'small_font_size',
		[
			'default'           => '16',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'small_font_size',
		[
			'section'  => 'genesis_sample_font_options',
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
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		'large_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'priority' => 10,
			'label'    => __( 'Large Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'x_large_font_size',
		[
			'default'           => '27',
			'sanitize_callback' => 'absint',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		'x_large_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'priority' => 10,
			'label'    => __( 'X Large Font size (px).', 'genesis-sample' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'xx_large_font_size',
		[
			'default'           => '30',
			'sanitize_callback' => 'absint',
			//'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		'xx_large_font_size',
		[
			'section'  => 'genesis_sample_font_options',
			'priority' => 10,
			'label'    => __( 'XX Large Font size (px).', 'genesis-sample' ),
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

			/* -- Custom Color Palette
			--------------------------------------------- */

			--ccp-primary: <?php echo esc_attr( get_theme_mod( 'primary_color', genesis_sample_get_customiser_default( 'primary_color' ) ) ); ?>;
			--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'secondary_color', genesis_sample_get_customiser_default( 'secondary_color' ) ) ); ?>;
			--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'primary_alt_color', genesis_sample_get_customiser_default( 'primary_alt_color' ) ) ); ?>;
			--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'secondary_alt_color', genesis_sample_get_customiser_default( 'secondary_alt_color' ) ) ); ?>;
			--ccp-black: <?php echo esc_attr( get_theme_mod( 'black_color', genesis_sample_get_customiser_default( 'black_color' ) ) ); ?>;
			--ccp-dark-gray-01: <?php echo esc_attr( get_theme_mod( 'dark_gray_01_color', genesis_sample_get_customiser_default( 'dark_gray_01_color' ) ) ); ?>;
			--ccp-dark-gray-02: <?php echo esc_attr( get_theme_mod( 'dark_gray_02_color', genesis_sample_get_customiser_default( 'dark_gray_02_color' ) ) ); ?>;
			--ccp-light-gray-02: <?php echo esc_attr( get_theme_mod( 'light_gray_02_color', genesis_sample_get_customiser_default( 'light_gray_02_color' ) ) ); ?>;
			--ccp-light-gray-01: <?php echo esc_attr( get_theme_mod( 'light_gray_01_color', genesis_sample_get_customiser_default( 'light_gray_01_color' ) ) ); ?>;
			--ccp-white: <?php echo esc_attr( get_theme_mod( 'white_color', genesis_sample_get_customiser_default( 'white_color' ) ) ); ?>;

			/* -- Custom Font Sizes
			--------------------------------------------- */

			--font-size-r: <?php echo esc_attr( get_theme_mod( 'regular_font_size', '14' ) ); ?>px;
			--font-size-xxs: <?php echo esc_attr( get_theme_mod( 'xx_small_font_size', '14' ) ); ?>px;
			--font-size-xs: <?php echo esc_attr( get_theme_mod( 'x_small_font_size', '15' ) ); ?>px;
			--font-size-s: <?php echo esc_attr( get_theme_mod( 'small_font_size', '16' ) ); ?>px;
			--font-size-n: <?php echo esc_attr( get_theme_mod( 'normal_font_size', '18' ) ); ?>px;
			--font-size-m: <?php echo esc_attr( get_theme_mod( 'medium_font_size', '20' ) ); ?>px;
			--font-size-l: <?php echo esc_attr( get_theme_mod( 'large_font_size', '24' ) ); ?>px;
			--font-size-xl: <?php echo esc_attr( get_theme_mod( 'x_large_font_size', '27' ) ); ?>px;
			--font-size-xxl: <?php echo esc_attr( get_theme_mod( 'xx_large_font_size', '30' ) ); ?>px;

		}

		@media (prefers-color-scheme: dark) {

			:root {

				/* -- Custom Color Palette
				--------------------------------------------- */

				--ccp-primary: <?php echo esc_attr( get_theme_mod( 'primary_dark_color', genesis_sample_get_customiser_default( 'primary_dark_color' ) ) ); ?>;
				--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'secondary_dark_color', genesis_sample_get_customiser_default( 'secondary_dark_color' ) ) ); ?>;
				--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'primary_alt_dark_color', genesis_sample_get_customiser_default( 'primary_alt_dark_color' ) ) ); ?>;
				--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'secondary_alt_dark_color', genesis_sample_get_customiser_default( 'secondary_alt_dark_color' ) ) ); ?>;

			}

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
