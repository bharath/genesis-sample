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

	$font_families = array();

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat & Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$montserrat   = esc_html_x( 'on', 'Montserrat font: on or off', 'genesis-sample' );
	$merriweather = esc_html_x( 'on', 'Merriweather font: on or off', 'genesis-sample' );
	$opensans     = esc_html_x( 'on', 'Open+Sans font: on or off', 'genesis-sample' );

	if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:400,400i,500,500i,700';
	}

	if ( 'off' !== $merriweather ) {
		$font_families[] = 'Merriweather:400,400i';
	}

	if ( 'off' !== $opensans ) {
		$font_families[] = 'Open+Sans:400,400i,500,500i,700';
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
function genesis_sample_scripts_styles() {

	// Dequeue default theme styles.
	wp_dequeue_style( genesis_get_theme_handle() );

	// Dequeue default Fonts Source Sans Pro.
	wp_dequeue_style( genesis_get_theme_handle() . '-fonts' );

	// Dequeue Gutenberg front-end styles.
	wp_dequeue_style( genesis_get_theme_handle() . '-gutenberg' );

	// Enqueue Custom / Typekit / Google Fonts.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom-fonts', genesis_sample_custom_fonts_url(), array(), genesis_get_theme_version() );

	// Enqueue Fira Code font for code block.
	wp_enqueue_style( genesis_get_theme_handle() . '-code-fonts', '//cdn.jsdelivr.net/gh/tonsky/FiraCode@1.206/distr/fira_code.css', array(), '1.206', 'all' );

	// Enqueue highlight style css for code block.
	wp_enqueue_style( genesis_get_theme_handle() . '-highlight-style', '//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.8/build/styles/xcode.min.css', array(), '9.15.8', 'all' );

	// Sets the default timezone used by all date/time functions in a script to developer timezone.
	date_default_timezone_set( 'Asia/Kolkata' );

	// Enqueue custom Gutenberg front-end styles.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom-gutenberg', get_stylesheet_directory_uri() . '/assets/css/front-end.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/front-end.css' ) ) );

	// Enqueue theme's main styles with variables.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom', get_stylesheet_directory_uri() . '/assets/css/style-main.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) ) );

	if ( has_block( 'code' ) ) {

		// Enqueue Fira Code font for code block.
		wp_enqueue_style( genesis_get_theme_handle() . '-code-fonts', '//cdn.jsdelivr.net/gh/tonsky/FiraCode@1.206/distr/fira_code.css', array(), '1.206', 'all' );

		// Enqueue highlight script for code block.
		wp_enqueue_script( genesis_get_theme_handle() . '-highlight-script', '//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.8/build/highlight.min.js', array( 'jquery' ), '9.15.8', true );

		// Enqueue Clipboard script for code block.
		wp_enqueue_script( genesis_get_theme_handle() . '-code-clipboard', '//cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js', array( 'jquery' ), '2.0.0', true );

	}

	// Enqueue theme's main scripts.
	wp_enqueue_script( genesis_get_theme_handle() . '-scripts', get_stylesheet_directory_uri() . '/assets/js/main-min.js', array( 'jquery' ), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/js/main-min.js' ) ), true );

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
	wp_enqueue_style( genesis_get_theme_handle() . '-var', get_stylesheet_directory_uri() . '/assets/css/style-var-min.css', array(), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/style-var-min.css' ) ) );

	// Enqueue Custom / Typekit / Google Fonts for Gutenberg admin editor.
	wp_enqueue_style( genesis_get_theme_handle() . '-custom-gutenberg-fonts', genesis_sample_custom_fonts_url(), array(), genesis_get_theme_version() );

	// Enqueue Gutenberg admin editor scripts.
	wp_enqueue_script( genesis_get_theme_handle() . '-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor-min.js', array( 'wp-blocks', 'wp-dom' ), date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/js/editor-min.js' ) ), true );

}
add_action( 'enqueue_block_editor_assets', 'genesis_sample_gutenberg_scripts_styles', 11 );


/**
 * Gutenberg theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bkchild
 */

if ( ! function_exists( 'genesis_sample_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function genesis_sample_setup() {

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
					'name'  => esc_html__( 'Primary', 'genesis-sample' ),
					'slug'  => 'primary',
					'color' => 'var(--ccp-primary)',
				),
				array(
					'name'  => esc_html__( 'Secondary', 'genesis-sample' ),
					'slug'  => 'secondary',
					'color' => 'var(--ccp-secondary)',
				),
				array(
					'name'  => esc_html__( 'Black', 'genesis-sample' ),
					'slug'  => 'black',
					'color' => 'var(--ccp-black)',
				),
				array(
					'name'  => esc_html__( 'Blackish', 'genesis-sample' ),
					'slug'  => 'blackish',
					'color' => 'var(--ccp-blackish)',
				),
				array(
					'name'  => esc_html__( 'Grey', 'genesis-sample' ),
					'slug'  => 'grey',
					'color' => 'var(--ccp-grey)',
				),
				array(
					'name'  => esc_html__( 'Greyish', 'genesis-sample' ),
					'slug'  => 'greyish',
					'color' => 'var(--ccp-greyish)',
				),
				array(
					'name'  => esc_html__( 'White', 'genesis-sample' ),
					'slug'  => 'white',
					'color' => 'var(--ccp-white)',
				),
				array(
					'name'  => esc_html__( 'Transparent', 'genesis-sample' ),
					'slug'  => 'transparent',
					'color' => 'var(--ccp-transparent)',
				),
				array(
					'name'  => esc_html__( 'Primary Alt', 'genesis-sample' ),
					'slug'  => 'primary-alt',
					'color' => 'var(--ccp-primary-alt)',
				),
				array(
					'name'  => esc_html__( 'Secondary Alt', 'genesis-sample' ),
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
					'name'      => esc_html__( 'Small', 'genesis-sample' ),
					'shortName' => esc_html__( 'S', 'genesis-sample' ),
					'size'      => 'var(--font-size-s)',
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'genesis-sample' ),
					'shortName' => esc_html__( 'N', 'genesis-sample' ),
					'size'      => 'var(--font-size-n)',
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Medium', 'genesis-sample' ),
					'shortName' => esc_html__( 'M', 'genesis-sample' ),
					'size'      => 'var(--font-size-m)',
					'slug'      => 'medium',
				),
				array(
					'name'      => esc_html__( 'Large', 'genesis-sample' ),
					'shortName' => esc_html__( 'L', 'genesis-sample' ),
					'size'      => 'var(--font-size-l)',
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'X Large', 'genesis-sample' ),
					'shortName' => esc_html__( 'XL', 'genesis-sample' ),
					'size'      => 'var(--font-size-xl)',
					'slug'      => 'x-large',
				),
			)
		);

		// Enqueue editor styles.
		add_editor_style( '/assets/css/style-editor.css' );

	}

endif;

add_action( 'after_setup_theme', 'genesis_sample_setup' );


add_action( 'wp_enqueue_scripts', 'genesis_sample_inline_gutenberg_css', 11 );
/**
 * Outputs front-end inline styles based on colors declared in config/appearance.php.
 *
 * @since 2.9.0
 */
function genesis_sample_inline_gutenberg_css() {

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
		color: var(--ccp-white);
	}

CSS;

	$css .= genesis_sample_custom_font_sizes();
	$css .= genesis_sample_custom_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-custom-gutenberg', $css );

}


add_action( 'enqueue_block_editor_assets', 'genesis_sample_inline_gutenberg_admin_css', 11 );
/**
 * Outputs back-end inline styles based on colors declared in config/appearance.php.
 *
 * Note this will appear before the style-editor.css injected by JavaScript,
 * so overrides will need to have higher specificity.
 *
 * @since 2.9.0
 */
function genesis_sample_inline_gutenberg_admin_css() {

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

	wp_add_inline_style( genesis_get_theme_handle() . '-custom-gutenberg-fonts', $css );

}


/**
 * Generate CSS for editor font sizes from the provided theme support.
 *
 * @since 2.9.0
 *
 * @return string The CSS for editor font sizes if theme support was declared.
 */
function genesis_sample_custom_font_sizes() {

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
function genesis_sample_custom_color_palette() {

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


/**
 * Adds Prism style to code block.
 */
add_filter(
	'mkaz_prism_css_url',
	function() {
		return 'https://raw.githubusercontent.com/PrismJS/prism-themes/master/themes/prism-hopscotch.css';
	}
);


add_filter( 'block_categories', 'genesis_sample_block_categories' );
/**
 * Add Custom Blocks Panel in Gutenberg.
 *
 * @param array $categories adds custom category.
 */
function genesis_sample_block_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'bk-blocks',
				'title' => __( 'Bharath\'s Custom Blocks', 'genesis-sample' ),
				'icon'  => 'layout',
			),
		)
	);
}
