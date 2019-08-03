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
require_once get_stylesheet_directory() . '/inc/class-genesis-sample-separator-control.php';


/**
 * Registers settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_sample_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		'genesis_sample_custom_settings',
		array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Genesis Sample Custom Settings', 'genesis-sample' ),
			'description'    => '',
		)
	);

	$wp_customize->add_section(
		'genesis_sample_gutenberg_options',
		array(
			'title'       => __( 'Gutenberg Settings', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set custom options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis',
		)
	);

	$wp_customize->remove_section( 'colors' );

	$wp_customize->add_section(
		'genesis_sample_color_options',
		array(
			'title'       => __( 'Gutenberg Color Palette', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set custom options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis',
		)
	);

	$wp_customize->add_section(
		'genesis_sample_font_options',
		array(
			'title'       => __( 'Gutenberg Font Sizes', 'genesis-sample' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set custom Font options for Genesis Sample theme.', 'genesis-sample' ),
			'panel'       => 'genesis',
		)
	);

	$wp_customize->add_setting(
		'genesis_sample_dark_mode',
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
			'genesis_sample_dark-mode',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Enable a dark theme style.', 'genesis-sample' ),
				'settings' => 'genesis_sample_dark_mode',
				'priority' => 10,
				'section'  => 'genesis_sample_gutenberg_options',
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
				'section' => 'genesis_sample_gutenberg_options',
			)
		)
	);

	// Gutenberg Colors.
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'    => '#0467c6',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_primary_color',
			array(
				'label'    => __( 'Primary Color', 'genesis-sample' ),
				'settings' => 'primary_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'    => '#004990',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_secondary_color',
			array(
				'label'    => __( 'Secondary Color', 'genesis-sample' ),
				'settings' => 'secondary_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'black_color',
		array(
			'default'    => '#000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_black_color',
			array(
				'label'    => __( 'Black Color', 'genesis-sample' ),
				'settings' => 'black_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'blackish_color',
		array(
			'default'    => '#333',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_blackish_color',
			array(
				'label'    => __( 'Blackish Color', 'genesis-sample' ),
				'settings' => 'blackish_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'grey_color',
		array(
			'default'    => '#6e6e6a',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_grey_color',
			array(
				'label'    => __( 'Grey Color', 'genesis-sample' ),
				'settings' => 'grey_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'greyish_color',
		array(
			'default'    => '#999',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_greyish_color',
			array(
				'label'    => __( 'Greyish Color', 'genesis-sample' ),
				'settings' => 'greyish_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'white_color',
		array(
			'default'    => '#fff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_white_color',
			array(
				'label'    => __( 'White Color', 'genesis-sample' ),
				'settings' => 'white_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'transparent_color',
		array(
			'default'    => 'transparent',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_transparent_color',
			array(
				'label'    => __( 'Transparent Color', 'genesis-sample' ),
				'settings' => 'transparent_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'primary_alt_color',
		array(
			'default'    => '#ff0014',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_primary_alt_color',
			array(
				'label'    => __( 'Primary Alt Color', 'genesis-sample' ),
				'settings' => 'primary_alt_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	$wp_customize->add_setting(
		'secondary_alt_color',
		array(
			'default'    => '#b3000e',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_secondary_alt_color',
			array(
				'label'    => __( 'Secondary Alt Color', 'genesis-sample' ),
				'settings' => 'secondary_alt_color',
				'priority' => 10,
				'section'  => 'genesis_sample_color_options',
			)
		)
	);

	// Gutenberg Fonts.
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
				'settings' => 'genesis_sample_custom_editor_font_sizes',
				'priority' => 10,
				'section'  => 'genesis_sample_font_options',
			)
		)
	);

}
add_action( 'customize_register', 'genesis_sample_customize_register' );


/**
 *  This will output the custom WordPress settings to the live theme's WP head.
 *
 *  Used by hook: 'wp_head'
 *
 *  @see add_action('wp_head',$func)
 *  @since MyTheme 1.0
 */
function genesis_sample_customizer_header_output() {
	?>
	<style type="text/css">
		:root {
			--ccp-primary: <?php echo esc_attr( get_theme_mod( 'primary_color', '#0467c6' ) ); ?>;
			--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'secondary_color', '#004990' ) ); ?>;
			--ccp-black: <?php echo esc_attr( get_theme_mod( 'black_color', '#000abc' ) ); ?>;
			--ccp-blackish: <?php echo esc_attr( get_theme_mod( 'blackish_color', '#333' ) ); ?>;
			--ccp-grey: <?php echo esc_attr( get_theme_mod( 'grey_color', '#6e6e6a' ) ); ?>;
			--ccp-greyish: <?php echo esc_attr( get_theme_mod( 'greyish_color', '#999' ) ); ?>;
			--ccp-white: <?php echo esc_attr( get_theme_mod( 'white_color', '#fff' ) ); ?>;
			--ccp-transparent: <?php echo esc_attr( get_theme_mod( 'transparent_color', 'transparent' ) ); ?>;
			--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'primary_alt_color', '#ff0014' ) ); ?>;
			--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'secondary_alt_color', '#b3000e' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'genesis_sample_customizer_header_output' );


/**
 * Enqueue the customizer stylesheet.
 */
function genesis_sample_customizer_stylesheet() {

	wp_register_style( genesis_get_theme_handle() . '-customizer-css', get_stylesheet_directory_uri() . '/assets/css/customizer.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) ), 'all' );
	wp_enqueue_style( genesis_get_theme_handle() . '-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'genesis_sample_customizer_stylesheet' );
