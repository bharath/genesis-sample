<?php
/**
 * This file adds custom functions to your Theme Customizer.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

/**
 *  Description: Customize class
 *
 *  @param \Genesis_Sample_Customize check.
 */
class Genesis_Sample_Customize {
	/**
	 *  This hooks into 'customize_register' (available as of WP 3.4) and allows
	 *  you to add new sections and controls to the Theme Customize screen.
	 *
	 *  Note: To enable instant preview, we have to actually write a bit of custom
	 *  javascript. See live_preview() for more.
	 *
	 *  @see add_action('customize_register',$func)
	 *  @param \WP_Customize_Manager $wp_customize check.
	 *  @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	 *  @since BK Child 1.0
	 */
	public static function register( $wp_customize ) {

		$wp_customize->add_panel(
			'genesis-sample-options',
			array(
				'priority'       => 10,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => __( 'Genesis Sample Options', 'genesis-sample' ),
				'description'    => '',
			)
		);

		// 1. Define a new section (if desired) to the Theme Customizer.
		$wp_customize->add_section(
			'mytheme_options',
			array(
				'title'       => __( 'Genesis Design Options', 'genesis-sample' ), // Visible title of section.
				'priority'    => 10, // Determines what order this appears in.
				'capability'  => 'edit_theme_options', // Capability needed to tweak.
				'description' => __( 'Allows you to set custom colors for BK Child theme.', 'genesis-sample' ), // Descriptive tooltip.
			)
		);

		// 2. Register new settings to the WP database.
		$wp_customize->add_setting(
			'link_textcolor', // No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record.
			array(
				'default'    => '#000', // Default setting/value to save.
				'type'       => 'theme_mod', // Is this an 'option' or a 'theme_mod'?.
				'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?.
			)
		);

		// 3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		$wp_customize->add_control(
			new WP_Customize_Color_Control( // Instantiate the color control class.
				$wp_customize, // P ass the $wp_customize object (required).
				'mytheme_link_textcolor', // Set a unique ID for the control.
				array(
					'label'    => __( 'Link Color', 'genesis-sample' ), // Admin-visible name of the control.
					'settings' => 'link_textcolor', // Which setting to load and manipulate (serialized is okay).
					'priority' => 10, // Determines the order this control appears in for the specified section.
					'section'  => 'mytheme_options', // ID of the section this control should render in (can be one of yours, or a WordPress default section).
				)
			)
		);

		// 2. Register new settings to the WP database...
		$wp_customize->add_setting(
			'link_textaccentcolor', // No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record.
			array(
				'default'    => '#000', // Default setting/value to save.
				'type'       => 'theme_mod', // Is this an 'option' or a 'theme_mod'?.
				'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?.
			)
		);

		// 3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		$wp_customize->add_control(
			new WP_Customize_Color_Control( // Instantiate the color control class.
				$wp_customize, // Pass the $wp_customize object (required).
				'mytheme_link_textaccentcolor', // Set a unique ID for the control.
				array(
					'label'    => __( 'Link Accent Color', 'genesis-sample' ), // Admin-visible name of the control.
					'settings' => 'link_textaccentcolor', // Which setting to load and manipulate (serialized is okay).
					'priority' => 10, // Determines the order this control appears in for the specified section.
					'section'  => 'mytheme_options', // ID of the section this control should render in (can be one of yours, or a WordPress default section).
				)
			)
		);
	}

	/**
	 *  This will output the custom WordPress settings to the live theme's WP head.
	 *
	 *  Used by hook: 'wp_head'
	 *
	 *  @see add_action('wp_head',$func)
	 *  @since MyTheme 1.0
	 */
	public static function header_output() {
		?>
			<!--Customizer CSS-->
			<style type="text/css">
			:root {
				--color-linkkkk: <?php echo esc_attr( get_theme_mod( 'link_textcolor', '#000000' ) ); ?>;
				--color-link-accentkkk: <?php echo esc_attr( get_theme_mod( 'link_textaccentcolor', '#000000' ) ); ?>;

				--ccp-primary: <?php echo esc_attr( get_theme_mod( 'ccp_primary', '#03a577' ) ); ?>;
				--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'ccp_secondary', '#02684c' ) ); ?>;
				--ccp-black: <?php echo esc_attr( get_theme_mod( 'ccp_black', '#000000' ) ); ?>;
				--ccp-blackish: <?php echo esc_attr( get_theme_mod( 'ccp_blackish', '#2c2c2c' ) ); ?>;
				--ccp-grey: <?php echo esc_attr( get_theme_mod( 'ccp_grey', '#6e6e6a' ) ); ?>;
				--ccp-greyish: <?php echo esc_attr( get_theme_mod( 'ccp_greyish', '#999' ) ); ?>;
				--ccp-white: <?php echo esc_attr( get_theme_mod( 'ccp_white', '#fff' ) ); ?>;
				--ccp-transparent: <?php echo esc_attr( get_theme_mod( 'ccp_transparent', 'transparent' ) ); ?>;
				--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'ccp_primary_alt', '#ff0014' ) ); ?>;
				--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'ccp_secondary_alt', '#b3000e' ) ); ?>;
			}
			</style>
			<!--/Customizer CSS-->
		<?php
	}

	/**
	 *  This outputs the javascript needed to automate the live settings preview.
	 *  Also keep in mind that this function isn't necessary unless your settings
	 *  are using 'transport'=>'postMessage' instead of the default 'transport'
	 *  => 'refresh'
	 *
	 *  Used by hook: 'customize_preview_init'
	 *
	 *  @see add_action('customize_preview_init',$func)
	 *  @since MyTheme 1.0
	 */
	public static function live_preview() {
		wp_enqueue_script( genesis_get_theme_handle() . '-themecustomizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), 0.1, true );
	}


	/**
	 *  This will generate a line of CSS for use in header output. If the setting
	 *  ($mod_name) has no defined value, the CSS will not be output.
	 *
	 *  @uses get_theme_mod()
	 *  @param string $selector CSS selector.
	 *  @param string $style The name of the CSS *property* to modify.
	 *  @param string $mod_name The name of the 'theme_mod' option to fetch.
	 *  @param string $prefix Optional. Anything that needs to be output before the CSS property.
	 *  @param string $postfix Optional. Anything that needs to be output after the CSS property.
	 *  @param bool   $echo Optional. Whether to print directly to the page (default: true).
	 *  @return string Returns a single line of CSS with selectors and a property.
	 *  @since MyTheme 1.0
	 */
	public static function generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
		$return = '';
		$mod    = get_theme_mod( $mod_name );
		if ( ! empty( $mod ) ) {
			$return = sprintf(
				'%s {
					%s:%s;
				}',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);
			if ( $echo ) {
				echo esc_attr( $return );
			}
		}
		return $return;
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'bk_Customize', 'register' ) );

// Output custom CSS to live site.
add_action( 'wp_head', array( 'bk_Customize', 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen.
add_action( 'customize_preview_init', array( 'bk_Customize', 'live_preview' ) );
