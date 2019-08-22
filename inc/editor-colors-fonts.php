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

		// Add default block styles
		// add_theme_support( 'wp-block-styles' );.
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
			[
				[
					'name'  => esc_html__( 'Primary', 'genesis-sample' ),
					'slug'  => 'primary',
					'color' => 'var(--primary)',
				],
				[
					'name'  => esc_html__( 'Secondary', 'genesis-sample' ),
					'slug'  => 'secondary',
					'color' => 'var(--secondary)',
				],
				[
					'name'  => esc_html__( 'Primary Alt', 'genesis-sample' ),
					'slug'  => 'primary-alt',
					'color' => 'var(--primary-alt)',
				],
				[
					'name'  => esc_html__( 'Secondary Alt', 'genesis-sample' ),
					'slug'  => 'secondary-alt',
					'color' => 'var(--secondary-alt)',
				],
				[
					'name'  => esc_html__( 'Black', 'genesis-sample' ),
					'slug'  => 'black',
					'color' => 'var(--black)',
				],
				[
					'name'  => esc_html__( 'Dark Gray One', 'genesis-sample' ),
					'slug'  => 'dark-gray-one',
					'color' => 'var(--dark-gray-one)',
				],
				[
					'name'  => esc_html__( 'Dark Gray Two', 'genesis-sample' ),
					'slug'  => 'dark-gray-two',
					'color' => 'var(--dark-gray-two)',
				],
				[
					'name'  => esc_html__( 'Dark Gray Three', 'genesis-sample' ),
					'slug'  => 'dark-gray-three',
					'color' => 'var(--dark-gray-three)',
				],
				[
					'name'  => esc_html__( 'Light Gray Four', 'genesis-sample' ),
					'slug'  => 'light-gray-four',
					'color' => 'var(--light-gray-four)',
				],
				[
					'name'  => esc_html__( 'Light Gray Three', 'genesis-sample' ),
					'slug'  => 'light-gray-three',
					'color' => 'var(--light-gray-three)',
				],
				[
					'name'  => esc_html__( 'Light Gray Two', 'genesis-sample' ),
					'slug'  => 'light-gray-two',
					'color' => 'var(--light-gray-two)',
				],
				[
					'name'  => esc_html__( 'Light Gray One', 'genesis-sample' ),
					'slug'  => 'light-gray-one',
					'color' => 'var(--light-gray-one)',
				],
				[
					'name'  => esc_html__( 'White', 'genesis-sample' ),
					'slug'  => 'white',
					'color' => 'var(--white)',
				],
				[
					'name'  => esc_html__( 'Transparent', 'genesis-sample' ),
					'slug'  => 'transparent',
					'color' => 'var(--transparent)',
				],
			]
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
			[
				[
					'name'      => esc_html__( 'XX Small', 'genesis-sample' ),
					'shortName' => esc_html__( 'XXS', 'genesis-sample' ),
					'size'      => 'var(--font-size-xxs)',
					'slug'      => 'xx-small',
				],
				[
					'name'      => esc_html__( 'X Small', 'genesis-sample' ),
					'shortName' => esc_html__( 'XS', 'genesis-sample' ),
					'size'      => 'var(--font-size-xs)',
					'slug'      => 'x-small',
				],
				[
					'name'      => esc_html__( 'Small', 'genesis-sample' ),
					'shortName' => esc_html__( 'S', 'genesis-sample' ),
					'size'      => 'var(--font-size-s)',
					'slug'      => 'small',
				],
				[
					'name'      => esc_html__( 'Normal', 'genesis-sample' ),
					'shortName' => esc_html__( 'N', 'genesis-sample' ),
					'size'      => 'var(--font-size-n)',
					'slug'      => 'normal',
				],
				[
					'name'      => esc_html__( 'Medium', 'genesis-sample' ),
					'shortName' => esc_html__( 'M', 'genesis-sample' ),
					'size'      => 'var(--font-size-m)',
					'slug'      => 'medium',
				],
				[
					'name'      => esc_html__( 'Large', 'genesis-sample' ),
					'shortName' => esc_html__( 'L', 'genesis-sample' ),
					'size'      => 'var(--font-size-l)',
					'slug'      => 'large',
				],
				[
					'name'      => esc_html__( 'X Large', 'genesis-sample' ),
					'shortName' => esc_html__( 'XL', 'genesis-sample' ),
					'size'      => 'var(--font-size-xl)',
					'slug'      => 'x-large',
				],
				[
					'name'      => esc_html__( 'XX Large', 'genesis-sample' ),
					'shortName' => esc_html__( 'XXL', 'genesis-sample' ),
					'size'      => 'var(--font-size-xxl)',
					'slug'      => 'xx-large',
				],
			]
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
		color: var(--primary);
	}

	.site-container .wp-block-button .wp-block-button__link {
		background-color: var(--primary);
	}

	.wp-block-button .wp-block-button__link:not(.has-background),
	.wp-block-button .wp-block-button__link:not(.has-background):focus,
	.wp-block-button .wp-block-button__link:not(.has-background):hover {
		color: var(--white);
	}

	.site-container .wp-block-button.is-style-outline .wp-block-button__link {
		color: var(--primary);
	}

	.site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
	.site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
		color: var(--white);
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
		color: var(--primary);
	}

	.editor-styles-wrapper .editor-rich-text .button,
	.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		background-color: var(--primary);
		color: var(--white);
	}

	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
		color: var(--primary);
	}

	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
		color: var(--secondary);
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
