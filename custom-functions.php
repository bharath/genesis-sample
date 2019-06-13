<?php
/**
 * This file adds functions to the Starter Theme.
 *
 * @package obk
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */


 /* -- Gutenberg Stuff & Global Enqueues 
--------------------------------------------- */

/**
 * Enqueue scripts and styles.
 */
function obk_scripts_styles() {

    // Dequeue default Fonts Source Sans Pro.
    wp_dequeue_style( 'starter-fonts' );

    // Dequeue default theme styles.
    wp_dequeue_style( 'starter' );
    
    // Dequeue Gutenberg front-end styles.
    wp_dequeue_style( 'genesis-sample-gutenberg' );

    // Enqueue Google Fonts.
    wp_enqueue_style( genesis_get_theme_handle() . '-fonts', obk_fonts_url(), array(), null );

    // Enqueue Adobe Fonts.
    wp_enqueue_style( genesis_get_theme_handle() . '-typekit', '//use.typekit.net/tlh3veq.css', array(), '1.0', 'all');
    
    // Sets the default timezone used by all date/time functions in a script
    date_default_timezone_set('Asia/Kolkata');

    // Enqueue theme's main styles.
    $last_modified_var_css = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-var-min.css' ) );
    wp_enqueue_style( genesis_get_theme_handle() . '-var', get_stylesheet_directory_uri() . '/assets/css/style-var-min.css', array(), $last_modified_var_css );
    
    // Enqueue custom Gutenberg front-end styles.
    $last_modified_front_end_css = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/front-end.css' ) );
    wp_enqueue_style( genesis_get_theme_handle() . '-gutenberg', get_stylesheet_directory_uri() . '/assets/css/front-end.css', array(), $last_modified_front_end_css );
    
    // Enqueue theme's main styles.
    $last_modified_main_css = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) );
    wp_enqueue_style( genesis_get_theme_handle() . '-main', get_stylesheet_directory_uri() . '/assets/css/style-main.css', array(), $last_modified_main_css );
    
    // Enqueue theme's main scripts.
    $last_modified_main_js = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/js/main-min.js' ) ); 
    wp_enqueue_script( genesis_get_theme_handle() . '-scripts', get_stylesheet_directory_uri() . '/assets/js/main-min.js', array( 'jquery' ), $last_modified_main_js, true );
    
    // Move jQuery to footer
    if( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
        wp_enqueue_script( 'jquery' );
    }

    //Outputs front-end inline styles based on colors declared in config/block-editor-settings.php.
    $block_editor_settings = genesis_get_config( 'block-editor-settings' );

	$css = <<<CSS
.ab-block-post-grid .ab-post-grid-items h2 a:hover {
	color: {$block_editor_settings['default-link-color']};
}

.site-container .wp-block-button .wp-block-button__link {
	background-color: {$block_editor_settings['default-link-color']};
}

.wp-block-button .wp-block-button__link:not(.has-background),
.wp-block-button .wp-block-button__link:not(.has-background):focus,
.wp-block-button .wp-block-button__link:not(.has-background):hover {
	color: {$block_editor_settings['default-button-color']};
}

.site-container .wp-block-button.is-style-outline .wp-block-button__link {
	color: {$block_editor_settings['default-button-bg']};
}

.site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
.site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
	color: {$block_editor_settings['default-button-outline-hover']};
}
CSS;

	$css .= genesis_sample_inline_font_sizes();
	$css .= genesis_sample_inline_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-gutenberg', $css );

}
add_action( 'wp_enqueue_scripts', 'obk_scripts_styles', 11 );


/**
 * Enqueue Gutenberg editor styles and scripts
 */
function obk_gutenberg_scripts_styles() {	

    // Dequeue default Gutenberg admin editor fonts, Source Sans Pro.
    wp_dequeue_style( 'genesis-sample-gutenberg-fonts' );
    
    // Enqueue Google Fonts for Gutenberg admin editor.
    wp_enqueue_style( genesis_get_theme_handle() . '-gutenberg-fonts', obk_fonts_url(), array(), null );

    // Enqueue Adobe Fonts for Gutenberg admin editor.
    wp_enqueue_style( genesis_get_theme_handle() . '-typekit', '//use.typekit.net/tlh3veq.css', array(), '1.0', 'all');
    
    // Enqueue Gutenberg admin editor scripts.
    $last_modified_editor_js = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/js/editor-min.js' ) );
    wp_enqueue_script( genesis_get_theme_handle() . '-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor-min.js', array( 'wp-blocks', 'wp-dom' ), $last_modified_editor_js, true );


    //Outputs back-end inline styles based on colors declared in config/block-editor-settings.php.
    //Note this will appear before the style-editor.css injected by JavaScript,
    //so overrides will need to have higher specificity.
    
    $block_editor_settings = genesis_get_config( 'block-editor-settings' );

	$css = <<<CSS
.ab-block-post-grid .ab-post-grid-items h2 a:hover,
.block-editor__container .editor-block-list__block a {
	color: {$block_editor_settings['default-link-color']};
}

.editor-styles-wrapper .editor-rich-text .button,
.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
	background-color: {$block_editor_settings['default-button-bg']};
	color: {$block_editor_settings['default-button-color']};
}

.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
	color: {$block_editor_settings['default-button-bg']};
}

.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
	color: {$block_editor_settings['default-button-outline-hover']};
}
CSS;

	wp_add_inline_style( genesis_get_theme_handle() . '-gutenberg-fonts', $css );

}
add_action( 'enqueue_block_editor_assets', 'obk_gutenberg_scripts_styles', 11 );


/**
 * Register Google Fonts
 */
function obk_fonts_url() {
    
    $fonts_url = '';

    $font_families = array();

    /**
     * Translators: If there are characters in your language that are not
     * supported by Merriweather and Lora, translate this to 'off'. Do not translate
     * into your own language.
     */

    $montserrat = esc_html_x( 'on', 'Montserrat font: on or off', 'obk' );
    $lora = esc_html_x( 'on', 'Lora font: on or off', 'obk' );
    
    if ( 'off' !== $montserrat ) {
        $font_families[] = 'Montserrat:400,400i,600,700';
    }

    if ( 'off' !== $lora ) {
        $font_families[] = 'Lora:400,400i,700';
    }

    $query_args = array(
        'family' => rawurlencode( implode( '|', array_unique( $font_families ) ) ),
        'subset' => rawurlencode( 'latin,latin-ext' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    //$fonts_url = 'https://use.typekit.net/tlh3veq.css';
    //<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
    return esc_url_raw( $fonts_url );

}


/**
 * Sets up theme defaults and registers support for various WordPress features.
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
                'name'  => esc_html__( 'Red', 'obk' ),
                'slug' => 'red',
                'color' => '#FF0014',
            ),
            array(
                'name'  => esc_html__( 'Gray', 'obk' ),
                'slug' => 'gray',
                'color' => '#6E6E6A',
            ),
            array(
                'name'  => esc_html__( 'Black', 'obk' ),
                'slug' => 'black',
                'color' => '#000000',
            ),
            array(
                'name'  => esc_html__( 'Blackish', 'obk' ),
                'slug' => 'blackish',
                'color' => '#2c2c2c',
            ),
            array(
                'name'  => esc_html__( 'White', 'obk' ),
                'slug' => 'white',
                'color' => '#ffffff',
            ),
            array(
                'name'  => esc_html__( 'Transparent', 'obk' ),
                'slug' => 'transparent',
                'color' => 'transparent',
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
                'name'      => esc_html__( 'Small', 'obk' ),
                'shortName' => esc_html__( 'S', 'obk' ),
                'size'      => 16,
                'slug'      => 'small',
            ),
            array(
                'name'      => esc_html__( 'Normal', 'obk' ),
                'shortName' => esc_html__( 'N', 'obk' ),
                'size'      => 18,
                'slug'      => 'normal',
            ),
            array(
                'name'      => esc_html__( 'Medium', 'obk' ),
                'shortName' => esc_html__( 'M', 'obk' ),
                'size'      => 20,
                'slug'      => 'medium',
            ),
            array(
                'name'      => esc_html__( 'Large', 'obk' ),
                'shortName' => esc_html__( 'L', 'obk' ),
                'size'      => 24,
                'slug'      => 'large',
            ),
            array(
                'name'      => esc_html__( 'Huge', 'obk' ),
                'shortName' => esc_html__( 'XL', 'obk' ),
                'size'      => 28,
                'slug'      => 'huge',
            ),
        )
    );

    // Enqueue editor styles.
    add_editor_style( '/assets/css/style-editor.css' );

}
add_action( 'after_setup_theme', 'obk_setup' );
