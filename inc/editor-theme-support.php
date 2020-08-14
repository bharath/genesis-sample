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

		// phpcs:disable
		// Add default block styles
		//add_theme_support( 'wp-block-styles' );
		// phpcs:enable

		// Adds support for block alignments.
		add_theme_support( 'align-wide' );

		// Custom colors for use in the editor.
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => esc_html__( 'Primary', 'genesis-sample' ),
					'slug'  => 'primary',
					'color' => 'var(--ccp-primary)',
				],
				[
					'name'  => esc_html__( 'Secondary', 'genesis-sample' ),
					'slug'  => 'secondary',
					'color' => 'var(--ccp-secondary)',
				],
				[
					'name'  => esc_html__( 'Primary Alt', 'genesis-sample' ),
					'slug'  => 'primary-alt',
					'color' => 'var(--ccp-primary-alt)',
				],
				[
					'name'  => esc_html__( 'Secondary Alt', 'genesis-sample' ),
					'slug'  => 'secondary-alt',
					'color' => 'var(--ccp-secondary-alt)',
				],
				[
					'name'  => esc_html__( 'Black', 'genesis-sample' ),
					'slug'  => 'black',
					'color' => 'var(--ccp-black)',
				],
				[
					'name'  => esc_html__( 'Grey One', 'genesis-sample' ),
					'slug'  => 'grey-one',
					'color' => 'var(--ccp-grey-01)',
				],
				[
					'name'  => esc_html__( 'Grey Two', 'genesis-sample' ),
					'slug'  => 'grey-two',
					'color' => 'var(--ccp-grey-02)',
				],
				[
					'name'  => esc_html__( 'Grey Three', 'genesis-sample' ),
					'slug'  => 'grey-three',
					'color' => 'var(--ccp-grey-03)',
				],
				[
					'name'  => esc_html__( 'Grey Four', 'genesis-sample' ),
					'slug'  => 'grey-four',
					'color' => 'var(--ccp-grey-04)',
				],
				[
					'name'  => esc_html__( 'White', 'genesis-sample' ),
					'slug'  => 'white',
					'color' => 'var(--ccp-white)',
				],
			]
		);

		// Custom font sizes for use in the editor.
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name'      => __( 'XX Small', 'genesis-sample' ),
					'shortName' => __( 'XXS', 'genesis-sample' ),
					'size'      => 14,
					'slug'      => 'xx-small',
				],
				[
					'name'      => __( 'X Small', 'genesis-sample' ),
					'shortName' => __( 'XS', 'genesis-sample' ),
					'size'      => 15,
					'slug'      => 'x-small',
				],
				[
					'name'      => __( 'Small', 'genesis-sample' ),
					'shortName' => __( 'S', 'genesis-sample' ),
					'size'      => 16,
					'slug'      => 'small',
				],
				[
					'name'      => __( 'Normal', 'genesis-sample' ),
					'shortName' => __( 'N', 'genesis-sample' ),
					'size'      => 18,
					'slug'      => 'normal',
				],
				[
					'name'      => __( 'Medium', 'genesis-sample' ),
					'shortName' => __( 'M', 'genesis-sample' ),
					'size'      => 20,
					'slug'      => 'medium',
				],
				[
					'name'      => __( 'Large', 'genesis-sample' ),
					'shortName' => __( 'L', 'genesis-sample' ),
					'size'      => 24,
					'slug'      => 'large',
				],
				[
					'name'      => __( 'X Large', 'genesis-sample' ),
					'shortName' => __( 'XL', 'genesis-sample' ),
					'size'      => 27,
					'slug'      => 'x-large',
				],
				[
					'name'      => __( 'XX Large', 'genesis-sample' ),
					'shortName' => __( 'XXL', 'genesis-sample' ),
					'size'      => 30,
					'slug'      => 'xx-large',
				],
			]
		);

		// Custom Gradients.
		add_theme_support(
			'editor-gradient-presets',
			[
				[
					'name'     => __( 'Light green cyan to vivid green cyan', 'genesis-sample' ),
					'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
					'slug'     => 'light-green-cyan-to-vivid-green-cyan',
				],
				[
					'name'     => __( 'Luminous vivid amber to luminous vivid orange', 'genesis-sample' ),
					'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
					'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
				],
				[
					'name'     => __( 'Luminous vivid orange to vivid red', 'genesis-sample' ),
					'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
					'slug'     => 'luminous-vivid-orange-to-vivid-red',
				],
				[
					'name'     => __( 'Very light gray to cyan bluish gray', 'genesis-sample' ),
					'gradient' => 'linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%)',
					'slug'     => 'very-light-gray-to-cyan-bluish-gray',
				],
				[
					'name'     => __( 'Blush light purple', 'genesis-sample' ),
					'gradient' => 'linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%)',
					'slug'     => 'blush-light-purple',
				],
				[
					'name'     => __( 'Midnight', 'genesis-sample' ),
					'gradient' => 'linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%)',
					'slug'     => 'midnight',
				],
			]
		);

		// phpcs:disable
		// Disable the custom color picker.
		//add_theme_support( 'disable-custom-colors' );

		// Disable custom font sizes
		//add_theme_support( 'disable-custom-font-sizes' );

		// Disable custom Gradients
		//add_theme_support( 'disable-custom-gradients' );
		// phpcs:enable

		// Supporting custom line heights.
		add_theme_support( 'custom-line-height' );

		// Support custom units. The available units are: px, em, rem, vh, vw.
		add_theme_support( 'custom-units', 'px', 'rem', 'em' );

		// Disabling the default block patterns.
		remove_theme_support( 'core-block-patterns' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// phpcs:disable
		// Dark backgrounds.
		// add_theme_support( 'dark-editor-style' );
		// phpcs:enable

		// Enqueue editor styles.
		add_editor_style( '/assets/css/style-editor.css' );

		// Make media embeds responsive.
		add_theme_support( 'responsive-embeds' );

		// Experimental — Cover block padding.
		add_theme_support( 'experimental-custom-spacing' );

		// Experimental — Link color control.
		add_theme_support( 'experimental-link-color' );

	}

endif;
add_action( 'after_setup_theme', 'genesis_sample_setup' );


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
add_action( 'wp_enqueue_scripts', 'genesis_sample_inline_gutenberg_css', 11 );


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
	.block-editor__container .editor-styles-wrapper a {
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
		color: var(--ccp-white);
	}

CSS;

	$css .= genesis_sample_editor_custom_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-custom-gutenberg-fonts', $css );

}
add_action( 'enqueue_block_editor_assets', 'genesis_sample_inline_gutenberg_admin_css', 11 );


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
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 3.3.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function genesis_sample_editor_custom_color_palette() {

	$css                  = '';
	$editor_color_palette = get_theme_support( 'editor-color-palette' );

	foreach ( $editor_color_palette[0] as $color_info ) {

		$css .= <<<CSS

	.has-{$color_info['slug']}-color {
		color: {$color_info['color']};
	}

CSS;

	}

	return $css;

}
