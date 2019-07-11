<?php
/**
 * This file adds custom functions to your Theme.
 *
 * @package bkchild
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.blog/
 */

/**
 * Register Custom/Google/Adobe Fonts
 */
function bk_fonts_url() {

	$fonts_url = '';

	$font_families = array();

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat & Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$montserrat   = esc_html_x( 'on', 'Montserrat font: on or off', 'bk-child' );
	$merriweather = esc_html_x( 'on', 'Merriweather font: on or off', 'bk-child' );

	if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:400,400i,700';
	}

	if ( 'off' !== $merriweather ) {
		$font_families[] = 'Merriweather:400,400i';
	}

	$query_args = array(
		'family'  => rawurlencode( implode( '|', array_unique( $font_families ) ) ),
		'display' => rawurlencode( 'swap' ),
		'subset'  => rawurlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );

}


/**
 * Gutenberg Stuff & Global Enqueues.
 * Enqueue scripts and styles.
 */
function bk_scripts_styles() {

	// Dequeue default theme styles.
	wp_dequeue_style( genesis_get_theme_handle() );

	// Dequeue default Fonts Source Sans Pro.
	wp_dequeue_style( genesis_get_theme_handle() . '-fonts' );

	// Dequeue Gutenberg front-end styles.
	wp_dequeue_style( genesis_get_theme_handle() . '-gutenberg' );

	// Enqueue Custom / Typekit / Google Fonts.
	wp_enqueue_style( 'bk-fonts', bk_fonts_url(), array(), genesis_get_theme_version() );

	// Sets the default timezone used by all date/time functions in a script to developer timezone.
	date_default_timezone_set( 'Asia/Kolkata' );

	// Enqueue custom Gutenberg front-end styles.
	wp_enqueue_style( 'bk-gutenberg', get_stylesheet_directory_uri() . '/assets/css/front-end.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/front-end.css' ) ) );

	// Enqueue theme's main styles with variables.
	wp_enqueue_style( 'bk-style', get_stylesheet_directory_uri() . '/assets/css/style-main.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) ) );

	// Enqueue Fira Code font for code block.
	wp_enqueue_style( 'blog-code', '//cdn.jsdelivr.net/gh/tonsky/FiraCode@1.206/distr/fira_code.css', array(), '1.206', 'all' );

	// Enqueue Clipboard script for code block.
	wp_enqueue_script( 'clipboard-script', '//cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js', array( 'jquery' ), '2.0.0', true );

	// Enqueue theme's main scripts.
	wp_enqueue_script( 'bk-scripts', get_stylesheet_directory_uri() . '/assets/js/main-min.js', array( 'jquery' ), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/js/main-min.js' ) ), true );

	$wp_jquery_ver = $GLOBALS['wp_scripts']->registered[ $jquery_handle ]->ver;

	// Move jQuery to footer.
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, $wp_jquery_ver, true );
		wp_enqueue_script( 'jquery' );
	}

}
add_action( 'wp_enqueue_scripts', 'bk_scripts_styles', 11 );


/**
 * Enqueue Gutenberg editor styles and scripts
 */
function bk_gutenberg_scripts_styles() {

	// Dequeue default Gutenberg admin editor fonts, Source Sans Pro.
	wp_dequeue_style( genesis_get_theme_handle() . '-gutenberg-fonts' );

	// Enqueue CSS Variables.
	wp_enqueue_style( 'bk-var', get_stylesheet_directory_uri() . '/assets/css/style-var-min.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/style-var-min.css' ) ) );

	// Enqueue Custom / Typekit / Google Fonts for Gutenberg admin editor.
	wp_enqueue_style( 'bk-gutenberg-fonts', bk_fonts_url(), array(), genesis_get_theme_version() );

	// Enqueue Gutenberg admin editor scripts.
	wp_enqueue_script( 'bk-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor-min.js', array( 'wp-blocks', 'wp-dom' ), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/js/editor-min.js' ) ), true );

}
add_action( 'enqueue_block_editor_assets', 'bk_gutenberg_scripts_styles', 11 );


/**
 * Gutenberg theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bkchild
 */

if ( ! function_exists( 'bk_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bk_setup() {

		// Disable the custom color picker.
		add_theme_support( 'disable-custom-colors' );

		/**
		 *
		 * Custom colors for use in the editor.
		 * Add support for custom color palettes in Gutenberg.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Primary', 'bk-child' ),
					'slug'  => 'primary',
					'color' => 'var(--ccp-primary)',
				),
				array(
					'name'  => esc_html__( 'Secondary', 'bk-child' ),
					'slug'  => 'secondary',
					'color' => 'var(--ccp-secondary)',
				),
				array(
					'name'  => esc_html__( 'Black', 'bk-child' ),
					'slug'  => 'black',
					'color' => 'var(--ccp-black)',
				),
				array(
					'name'  => esc_html__( 'Blackish', 'bk-child' ),
					'slug'  => 'blackish',
					'color' => 'var(--ccp-blackish)',
				),
				array(
					'name'  => esc_html__( 'Grey', 'bk-child' ),
					'slug'  => 'grey',
					'color' => 'var(--ccp-grey)',
				),
				array(
					'name'  => esc_html__( 'Greyish', 'bk-child' ),
					'slug'  => 'greyish',
					'color' => 'var(--ccp-greyish)',
				),
				array(
					'name'  => esc_html__( 'White', 'bk-child' ),
					'slug'  => 'white',
					'color' => 'var(--ccp-white)',
				),
				array(
					'name'  => esc_html__( 'Transparent', 'bk-child' ),
					'slug'  => 'transparent',
					'color' => 'var(--ccp-transparent)',
				),
				array(
					'name'  => esc_html__( 'Primary Alt', 'bk-child' ),
					'slug'  => 'primary-alt',
					'color' => 'var(--ccp-primary-alt)',
				),
				array(
					'name'  => esc_html__( 'Secondary Alt', 'bk-child' ),
					'slug'  => 'secondary-alt',
					'color' => 'var(--ccp-secondary-alt)',
				),
			)
		);

		// -- Disable custom font sizes
		add_theme_support( 'disable-custom-font-sizes' );

		/**
		 * Custom font sizes for use in the editor.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'bk-child' ),
					'shortName' => esc_html__( 'S', 'bk-child' ),
					'size'      => 'var(--font-size-s)',
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'bk-child' ),
					'shortName' => esc_html__( 'N', 'bk-child' ),
					'size'      => 'var(--font-size-n)',
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Medium', 'bk-child' ),
					'shortName' => esc_html__( 'M', 'bk-child' ),
					'size'      => 'var(--font-size-m)',
					'slug'      => 'medium',
				),
				array(
					'name'      => esc_html__( 'Large', 'bk-child' ),
					'shortName' => esc_html__( 'L', 'bk-child' ),
					'size'      => 'var(--font-size-l)',
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'X Large', 'bk-child' ),
					'shortName' => esc_html__( 'XL', 'bk-child' ),
					'size'      => 'var(--font-size-xl)',
					'slug'      => 'x-large',
				),
			)
		);

		// Enqueue editor styles.
		add_editor_style( '/assets/css/style-editor.css' );

	}

endif;

add_action( 'after_setup_theme', 'bk_setup' );


add_action( 'wp_enqueue_scripts', 'bk_custom_gutenberg_css', 11 );
/**
 * Outputs front-end inline styles based on colors declared in config/appearance.php.
 *
 * @since 2.9.0
 */
function bk_custom_gutenberg_css() {

	$css = <<<CSS
	.ab-block-post-grid .ab-post-grid-items h2 a:hover {
		color: var(--ccp-primary);
	}

	.site-container .wp-block-button .wp-block-button__link {
		background-color: var(--ccp-primary);
	}

	.wp-block-button .wp-block-button__link:not(.has-background),
	.wp-block-button .wp-block-button__link:not(.has-background):focus,
	.wp-block-button .wp-block-button__link:not(.has-background):hover {
		color: var(--ccp-white);
	}

	.site-container .wp-block-button.is-style-outline .wp-block-button__link {
		color: var(--ccp-primary);
	}

	.site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
	.site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
		color: var(--ccp-secondary);
	}

CSS;

	$css .= bk_inline_font_sizes();
	$css .= bk_inline_color_palette();

	wp_add_inline_style( 'bk-gutenberg', $css );

}


add_action( 'enqueue_block_editor_assets', 'bk_custom_gutenberg_admin_css', 11 );
/**
 * Outputs back-end inline styles based on colors declared in config/appearance.php.
 *
 * Note this will appear before the style-editor.css injected by JavaScript,
 * so overrides will need to have higher specificity.
 *
 * @since 2.9.0
 */
function bk_custom_gutenberg_admin_css() {

	$css = <<<CSS
	.ab-block-post-grid .ab-post-grid-items h2 a:hover,
	.block-editor__container .editor-block-list__block a {
		color: var(--ccp-primary);
	}

	.editor-styles-wrapper .editor-rich-text .button,
	.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		background-color: var(--ccp-primary);
		color: var(--ccp-white);
	}

	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
		color: var(--ccp-primary);
	}

	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
		color: var(--ccp-secondary);
	}

CSS;

	wp_add_inline_style( 'bk-gutenberg-fonts', $css );

}


/**
 * Generate CSS for editor font sizes from the provided theme support.
 *
 * @since 2.9.0
 *
 * @return string The CSS for editor font sizes if theme support was declared.
 */
function bk_inline_font_sizes() {

	$css               = '';
	$editor_font_sizes = get_theme_support( 'editor-font-sizes' );

	if ( ! $editor_font_sizes ) {
		return '';
	}

	foreach ( $editor_font_sizes[0] as $font_size ) {
		$css .= <<<CSS
		.site-container .has-{$font_size['slug']}-font-size {
			font-size: {$font_size['size']};
		}
CSS;
	}

	return $css;

}


/**
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 2.9.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function bk_inline_color_palette() {

	$css                  = '';
	$editor_color_palette = get_theme_support( 'editor-color-palette' );

	foreach ( $editor_color_palette[0] as $color_info ) {
		$css .= <<<CSS
		.site-container .has-{$color_info['slug']}-color,
		.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-color,
		.site-container .wp-block-button.is-style-outline .wp-block-button__link.has-{$color_info['slug']}-color {
			color: {$color_info['color']};
		}

		.site-container .has-{$color_info['slug']}-background-color,
		.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-background-color,
		.site-container .wp-block-pullquote.is-style-solid-color.has-{$color_info['slug']}-background-color {
			background-color: {$color_info['color']};
		}
CSS;
	}

	return $css;

}


/**
 * Adds alternate style to code block.
 */
add_filter(
	'code_syntax_block_style',
	function() {
		return 'github-gist';
	}
);


add_filter( 'block_categories', 'bk_block_categories' );
/**
 * Add Custom Blocks Panel in Gutenberg.
 *
 * @param array $categories adds custom category.
 */
function bk_block_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'bk-blocks',
				'title' => __( 'Bharath\'s Custom Blocks', 'bk-child' ),
				'icon'  => 'layout',
			),
		)
	);
}
