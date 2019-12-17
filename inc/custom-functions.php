<?php
/**
 * This file adds custom functions to your Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

/**
 * Register Custom/Google/Adobe Fonts
 */
function genesis_sample_custom_fonts_url() {

	$fonts_url = '';

	$font_families = [];

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat & Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$montserrat   = esc_html_x( 'on', 'Montserrat font: on or off', 'genesis-sample' );
	$merriweather = esc_html_x( 'on', 'Merriweather font: on or off', 'genesis-sample' );

	if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:400,400i,500,500i,700';
	}

	if ( 'off' !== $merriweather ) {
		$font_families[] = 'Merriweather:400,400i';
	}

	$query_args = [
		'family'  => rawurlencode( implode( '|', array_unique( $font_families ) ) ),
		'display' => rawurlencode( 'swap' ),
		// 'subset'  => rawurlencode( 'latin,latin-ext' ),.
	];

	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );

}


/**
 * Enqueue scripts and styles.
 */
function genesis_sample_scripts_styles() {

	// Deregister default syntax highlight theme.
	wp_deregister_style( 'syntax-highlighting-code-block' );

	// Dequeue default theme styles.
	wp_dequeue_style( genesis_get_theme_handle() );

	// Dequeue default Fonts Source Sans Pro.
	wp_dequeue_style( genesis_get_theme_handle() . '-fonts' );

	// Dequeue Gutenberg front-end styles.
	wp_dequeue_style( genesis_get_theme_handle() . '-gutenberg' );

	// Dequeue Woocommerce styles.
	wp_dequeue_style( genesis_get_theme_handle() . '-woocommerce-styles' );

	// Enqueue Custom / Typekit / Google Fonts.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom-fonts', genesis_sample_custom_fonts_url(), [], genesis_get_theme_version() );

	// Enqueue custom Gutenberg front-end styles.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom-gutenberg', get_stylesheet_directory_uri() . '/assets/css/front-end.css', [], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/css/front-end.css' ) ) );

	// Enqueue theme's main styles with variables.
	wp_enqueue_style( genesis_get_theme_handle() . '-main', get_stylesheet_directory_uri() . '/assets/css/style-main.css', [], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) ) );

	// Enqueue theme Extras styles.
	wp_enqueue_style( genesis_get_theme_handle() . '-extras', get_stylesheet_directory_uri() . '/assets/css/style-extras.css', [], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/css/style-extras.css' ) ) );

	if ( has_block( 'code' ) ) {

		// Enqueue Fira Code font for code block.
		wp_enqueue_style( genesis_get_theme_handle() . '-code-fonts', '//cdn.jsdelivr.net/gh/tonsky/FiraCode@1.207/distr/fira_code.css', [], '1.207', 'all' );

		// phpcs:disable
		// Enqueue highlight style css for code block.
		//wp_enqueue_style( genesis_get_theme_handle() . '-highlight-style', '//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.8/build/styles/xcode.min.css', [], '9.15.8', 'all' );

		// Enqueue highlight script for code block.
		//wp_enqueue_script( genesis_get_theme_handle() . '-highlight-script', '//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.10/build/highlight.min.js', [ 'jquery' ], '9.15.10', true );
		// phpcs:enable

		// Enqueue Clipboard script for code block.
		wp_enqueue_script( genesis_get_theme_handle() . '-code-clipboard', '//cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js', [ 'jquery' ], '2.0.4', true );

		// Enqueue theme's main scripts.
		wp_enqueue_script( genesis_get_theme_handle() . '-code-init', get_stylesheet_directory_uri() . '/assets/js/code.js', [ 'jquery' ], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/js/code.js' ) ), true );

	}

	// Enqueue theme's main scripts.
	wp_enqueue_script( genesis_get_theme_handle() . '-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', [ 'jquery' ], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/js/main.js' ) ), true );

	$wp_jquery_ver = $GLOBALS['wp_scripts']->registered[ $jquery_handle ]->ver;

	// Move jQuery to footer.
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, $wp_jquery_ver, true );
		wp_enqueue_script( 'jquery' );
	}

}
add_action( 'wp_enqueue_scripts', 'genesis_sample_scripts_styles', 11 );


/**
 * Enqueue Gutenberg editor styles and scripts
 */
function genesis_sample_gutenberg_scripts_styles() {

	// Dequeue default Gutenberg admin editor fonts, Source Sans Pro.
	wp_dequeue_style( genesis_get_theme_handle() . '-gutenberg-fonts' );

	// Enqueue CSS Variables.
	wp_enqueue_style( genesis_get_theme_handle() . '-var', get_stylesheet_directory_uri() . '/assets/css/style-var.css', [], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/css/style-var.css' ) ) );

	// Enqueue Custom / Typekit / Google Fonts for Gutenberg admin editor.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom-gutenberg-fonts', genesis_sample_custom_fonts_url(), [], genesis_get_theme_version() );

	// Enqueue Gutenberg admin editor scripts.
	wp_enqueue_script( genesis_get_theme_handle() . '-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor.js', [ 'wp-blocks', 'wp-dom' ], wp_date( 'dmy.His', filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ) ), true );

}
add_action( 'enqueue_block_editor_assets', 'genesis_sample_gutenberg_scripts_styles', 11 );
