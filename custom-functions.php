<?php
/**
 * This file adds custom functions to your Theme.
 *
 * @package obk
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.blog/
 */


/**
 * Register Custom/Google/Adobe Fonts
 */
function obk_fonts_url() {
    
    $fonts_url = '';

    $font_families = array();

    /**
     * Translators: If there are characters in your language that are not
     * supported by Montserrat & Merriweather, translate this to 'off'. Do not translate
     * into your own language.
     */

    $montserrat = esc_html_x( 'on', 'Montserrat font: on or off', 'theme-name' );
    $merriweather = esc_html_x( 'on', 'Merriweather font: on or off', 'theme-name' );
    
    if ( 'off' !== $montserrat ) {
        $font_families[] = 'Montserrat:400,400i,700';
    }

    if ( 'off' !== $merriweather ) {
        $font_families[] = 'Merriweather:400,400i';
    }

    $query_args = array(
        'family' => rawurlencode( implode( '|', array_unique( $font_families ) ) ),
        'display' => rawurlencode( 'swap' ),
        'subset' => rawurlencode( 'latin,latin-ext' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    //$fonts_url = 'https://use.typekit.net/tlh3veq.css';
    
    return esc_url_raw( $fonts_url );

}


 /* -- Gutenberg Stuff & Global Enqueues 
--------------------------------------------- */

/**
 * Enqueue scripts and styles.
 */
function obk_scripts_styles() {

    // Dequeue default theme styles.
    wp_dequeue_style( 'starter' );

    // Dequeue default Fonts Source Sans Pro.
    wp_dequeue_style( 'starter-fonts' );
    
    // Dequeue Gutenberg front-end styles.
    wp_dequeue_style( 'starter-gutenberg' );

    // Enqueue Google Fonts.
    wp_enqueue_style( genesis_get_theme_handle() . '-custom-fonts', obk_fonts_url(), array(), null );

    // Enqueue Adobe Fonts.
    //wp_enqueue_style( genesis_get_theme_handle() . '-typekit', '//use.typekit.net/tlh3veq.css', array(), '1.0', 'all');
    
    // Sets the default timezone used by all date/time functions in a script
    date_default_timezone_set('Asia/Kolkata');

    // Enqueue CSS Variables.
    wp_enqueue_style( genesis_get_theme_handle() . '-var', get_stylesheet_directory_uri() . '/assets/css/style-var-min.css', array(), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-var-min.css' ) ) );

    // Enqueue CSS Variables overrides for genesis-sample style.css.
    //wp_enqueue_style( genesis_get_theme_handle() . '-var-gs', get_stylesheet_directory_uri() . '/assets/css/style-var-gs-min.css', array(), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-var-gs-min.css' ) ) );
    
    // Enqueue custom Gutenberg front-end styles.
    wp_enqueue_style( genesis_get_theme_handle() . '-custom-gutenberg', get_stylesheet_directory_uri() . '/assets/css/front-end.css', array(), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/front-end.css' ) ) );
    
    // Enqueue theme's main styles.
    //wp_enqueue_style( genesis_get_theme_handle() . '-main', get_stylesheet_directory_uri() . '/assets/css/style-main.css', array(), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) ) );

    // Enqueue theme's main styles with variables.
    wp_enqueue_style( genesis_get_theme_handle() . '-main', get_stylesheet_directory_uri() . '/assets/css/style-main-var.css', array(), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-main-var.css' ) ) );
    
    // Enqueue theme's main scripts.
    wp_enqueue_script( genesis_get_theme_handle() . '-scripts', get_stylesheet_directory_uri() . '/assets/js/main-min.js', array( 'jquery' ), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/js/main-min.js' ) ), true );
    
    // Move jQuery to footer
    if( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
        wp_enqueue_script( 'jquery' );
    }

}
add_action( 'wp_enqueue_scripts', 'obk_scripts_styles', 11 );


/**
 * Enqueue Gutenberg editor styles and scripts
 */
function obk_gutenberg_scripts_styles() {	

    // Dequeue default Gutenberg admin editor fonts, Source Sans Pro.
    wp_dequeue_style( genesis_get_theme_handle() . '-gutenberg-fonts' );

    // Enqueue theme's main styles.
    wp_enqueue_style( genesis_get_theme_handle() . '-var', get_stylesheet_directory_uri() . '/assets/css/style-var-min.css', array(), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-var-min.css' ) ) );
    
    // Enqueue Google Fonts for Gutenberg admin editor.
    wp_enqueue_style( genesis_get_theme_handle() . '-custom-gutenberg-fonts', obk_fonts_url(), array(), null );

    // Enqueue Adobe Fonts for Gutenberg admin editor.
    //wp_enqueue_style( genesis_get_theme_handle() . '-typekit', '//use.typekit.net/tlh3veq.css', array(), '1.0', 'all');

    // Enqueue Gutenberg admin editor scripts.
    wp_enqueue_script( genesis_get_theme_handle() . '-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor-min.js', array( 'wp-blocks', 'wp-dom' ), date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/js/editor-min.js' ) ), true );

}
add_action( 'enqueue_block_editor_assets', 'obk_gutenberg_scripts_styles', 11 );


/**
 * Gutenbergtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package obk
 */

if ( ! function_exists( 'obk_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

    function obk_setup() {

        // Disable the custom color picker.
        add_theme_support( 'disable-custom-colors' );

        /**
         * Custom colors for use in the editor.
         * Add support for custom color palettes in Gutenberg.
        * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
        */
        add_theme_support(
            'editor-color-palette', array(
                array(
                    'name'  => esc_html__( 'Main', 'theme-name' ),
                    'slug' => 'main',
                    'color' => 'var(--ccp-main)',
                ),
                array(
                    'name'  => esc_html__( 'Accent', 'theme-name' ),
                    'slug' => 'accent',
                    'color' => 'var(--ccp-accent)',
                ),
                array(
                    'name'  => esc_html__( 'Gray', 'theme-name' ),
                    'slug' => 'gray',
                    'color' => 'var(--ccp-gray)',
                ),
                array(
                    'name'  => esc_html__( 'Blackish', 'theme-name' ),
                    'slug' => 'blackish',
                    'color' => 'var(--ccp-blackish)',
                ),
                array(
                    'name'  => esc_html__( 'Black', 'theme-name' ),
                    'slug' => 'black',
                    'color' => 'var(--ccp-black)',
                ),
                array(
                    'name'  => esc_html__( 'White', 'theme-name' ),
                    'slug' => 'white',
                    'color' => 'var(--ccp-white)',
                ),
                array(
                    'name'  => esc_html__( 'Transparent', 'theme-name' ),
                    'slug' => 'transparent',
                    'color' => 'var(--ccp-transparent)',
                )
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
            'editor-font-sizes', array(
                array(
                    'name'      => esc_html__( 'Small', 'theme-name' ),
                    'shortName' => esc_html__( 'S', 'theme-name' ),
                    'size'      => 16,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => esc_html__( 'Normal', 'theme-name' ),
                    'shortName' => esc_html__( 'N', 'theme-name' ),
                    'size'      => 18,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => esc_html__( 'Medium', 'theme-name' ),
                    'shortName' => esc_html__( 'M', 'theme-name' ),
                    'size'      => 20,
                    'slug'      => 'medium',
                ),
                array(
                    'name'      => esc_html__( 'Large', 'theme-name' ),
                    'shortName' => esc_html__( 'L', 'theme-name' ),
                    'size'      => 24,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => esc_html__( 'Huge', 'theme-name' ),
                    'shortName' => esc_html__( 'XL', 'theme-name' ),
                    'size'      => 28,
                    'slug'      => 'huge',
                ),
            )
        );

        // Enqueue editor styles.
        add_editor_style( '/assets/css/style-editor.css' );

    }

endif;

add_action( 'after_setup_theme', 'obk_setup' );


add_action( 'wp_enqueue_scripts', 'obk_custom_gutenberg_css', 11 );
/**
 * Outputs front-end inline styles based on colors declared in config/appearance.php.
 *
 * @since 2.9.0
 */
function obk_custom_gutenberg_css() {

    $css = <<<CSS
    .ab-block-post-grid .ab-post-grid-items h2 a:hover {
        color: var(--ccp-main);
    }

    .site-container .wp-block-button .wp-block-button__link {
        background-color: var(--ccp-main);
    }

    .wp-block-button .wp-block-button__link:not(.has-background),
    .wp-block-button .wp-block-button__link:not(.has-background):focus,
    .wp-block-button .wp-block-button__link:not(.has-background):hover {
        color: var(--ccp-white);
    }

    .site-container .wp-block-button.is-style-outline .wp-block-button__link {
        color: var(--ccp-main);
    }

    .site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
    .site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
        color: var(--ccp-accent);
    }

CSS;
    
    $css .= obk_inline_font_sizes();
	$css .= obk_inline_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-custom-gutenberg', $css );

}


add_action( 'enqueue_block_editor_assets', 'obk_custom_gutenberg_admin_css', 11 );
/**
 * Outputs back-end inline styles based on colors declared in config/appearance.php.
 *
 * Note this will appear before the style-editor.css injected by JavaScript,
 * so overrides will need to have higher specificity.
 *
 * @since 2.9.0
 */
function obk_custom_gutenberg_admin_css() {


    $css = <<<CSS
    .ab-block-post-grid .ab-post-grid-items h2 a:hover,
    .block-editor__container .editor-block-list__block a {
        color: var(--ccp-main);
    }

    .editor-styles-wrapper .editor-rich-text .button,
    .editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
        background-color: var(--ccp-main);
        color: var(--ccp-white);
    }

    .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
        color: var(--ccp-main);
    }

    .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
    .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
        color: var(--ccp-accent);
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
function obk_inline_font_sizes() {

	$css               = '';
	$editor_font_sizes = get_theme_support( 'editor-font-sizes' );

	if ( ! $editor_font_sizes ) {
		return '';
	}

	foreach ( $editor_font_sizes[0] as $font_size ) {
		$css .= <<<CSS
		.site-container .has-{$font_size['slug']}-font-size {
			font-size: {$font_size['size']}px;
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
function obk_inline_color_palette() {

	$css                   = '';
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
