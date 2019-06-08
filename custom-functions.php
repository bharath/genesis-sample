<?php
/**
 * obk.
 *
 * This file adds functions to the obk Theme.
 *
 * @package obk
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.blog/
 */


 /* -- Gutenberg Stuff & Global Enqueues 
--------------------------------------------- */

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
    
    return esc_url_raw( $fonts_url );

}


/**
 * Enqueue scripts and styles.
 */
function obk_scripts_styles() {

    // Dequeue default Fonts Source Sans Pro.
    wp_dequeue_style( 'starter-fonts' );

    // Dequeue default theme styles.
    wp_dequeue_style( 'starter' );

    // Dequeue genesis-sample script.
    wp_dequeue_script( 'genesis-sample' );
    
    // Dequeue Gutenberg front-end styles.
    wp_dequeue_style( 'genesis-sample-gutenberg' );

    // Enqueue Google Fonts.
    wp_enqueue_style( 'obk-fonts', obk_fonts_url() );
    
    // Sets the default timezone used by all date/time functions in a script
    date_default_timezone_set('Asia/Kolkata');
    
    // Enqueue custom Gutenberg front-end styles.
    $last_modified_front_end_css = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/front-end.css' ) );
    wp_enqueue_style( 'obk-gutenberg', get_stylesheet_directory_uri() . '/assets/css/front-end.css', array(), $last_modified_front_end_css );
    
    // Enqueue theme's main styles.
    $last_modified_main_css = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/css/style-main.css' ) );
    wp_enqueue_style( 'obk', get_stylesheet_directory_uri() . '/assets/css/style-main.css', array(), $last_modified_main_css );
    
    // Enqueue theme's main scripts.
    $last_modified_main_js = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/js/main.js' ) ); 
    wp_enqueue_script( 'obk-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $last_modified_main_js, true );
    
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
    wp_dequeue_style( 'genesis-sample-gutenberg-fonts' );
    
    // Enqueue Google Fonts for Gutenberg admin editor.
    wp_enqueue_style( 'obk-gutenberg-fonts', obk_fonts_url() );
    
    // Enqueue Gutenberg admin editor scripts.
    $last_modified_editor_js = date ( "dmyHis", filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ) );
    wp_enqueue_script( 'obk-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), $last_modified_editor_js, true );

}
add_action( 'enqueue_block_editor_assets', 'obk_gutenberg_scripts_styles', 11 );


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
                'size'      => 15,
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


add_filter(
	'code_syntax_block_style',
	function() {
		//return 'tomorrow';
		//return 'xcode';
        //return 'color-brewer';
        return 'github-gist';
        //return 'bharath';
    }

    //if ( ! is_page() ) {
    //    return 'atom-one-light';
    //}
    //return 'atom-one-light';

);


add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
    }
    return $result;
});