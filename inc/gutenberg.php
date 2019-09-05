<?php
/**
 * This file adds Gutenberg related functions to your Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

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

		// Adds support for block alignments.
		remove_theme_support( 'align-wide' );

		// Add support for editor styles.
		remove_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		remove_theme_support( '/lib/gutenberg/style-editor.css' );

		// Make media embeds responsive.
		remove_theme_support( 'responsive-embeds' );

		if ( true === get_theme_mod( 'genesis_sample_align_wide' ) ) {

			// Adds support for block alignments.
			add_theme_support( 'align-wide' );

		}

		if ( true === get_theme_mod( 'genesis_sample_editor_styles' ) ) {

			// Add support for editor styles.
			add_theme_support( 'editor-styles' );

			// Enqueue editor styles.
			add_editor_style( '/assets/css/style-editor.css' );

		}

		if ( true === get_theme_mod( 'genesis_sample_dark_backgrounds' ) ) {

			// Add support for editor styles.
			add_theme_support( 'editor-styles' );

			// Enqueue editor styles.
			add_theme_support( 'dark-editor-style' );

			// Enqueue editor styles.
			add_editor_style( '/assets/css/style-dark-editor.css' );

		}

		if ( true === get_theme_mod( 'genesis_sample_wp_block_styles' ) ) {

			// Add default block styles.
			add_theme_support( 'wp-block-styles' );

		}

		if ( true === get_theme_mod( 'genesis_sample_responsive_embeds' ) ) {

			// Make media embeds responsive.
			add_theme_support( 'responsive-embeds' );

		}

	}

endif;
add_action( 'after_setup_theme', 'genesis_sample_setup' );


add_filter( 'render_block', 'genesis_sample_custom_button_classes', 5, 2 );
/**
 * Add Custom classes to Button block link. For example fancybox.
 *
 * @param array $block_content remove allowed button link classes from the button container first.
 * @param array $block button block.
 */
function genesis_sample_custom_button_classes( $block_content, $block ) {

	if ( 'core/button' === $block['blockName'] && isset( $block['attrs']['className'] ) ) {

		// Setting up a subset of custom button link classes.
		$allowed_button_link_classes = [
			'fancybox',
			'another-custom-class',
			'example-custom-class',
			// ...
		];

		// Remove allowed button link classes from the button container first.
		$block_content = str_replace(
			$allowed_button_link_classes,
			'',
			$block_content
		);

		// Get custom button classes set for the block.
		$custom_classes = explode( ' ', $block['attrs']['className'] );

		// Apply allowed custom button link classes.
		$block_content = str_replace(
			'wp-block-button__link',
			'wp-block-button__link ' . implode( ' ', array_intersect( $custom_classes, $allowed_button_link_classes ) ),
			$block_content
		);

	}

	return $block_content;

}


/**
 * Default Block Styles.
 */
function genesis_sample_default_block_styles() {
	add_theme_support(
		'editor-default-block-styles',
		[
			'core/quote'     => 'large',
			'core/pullquote' => 'solid-color',
		]
	);
}

add_action( 'after_setup_theme', 'genesis_sample_default_block_styles' );
