<?php
/**
 * Genesis related changes.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Remove Edit link.
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove Genesis Favicon (use site icon instead).
remove_action( 'wp_head', 'genesis_load_favicon' );

// Remove Header Description.
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

/**
 * Custom search form
 */
function genesis_sample_search_form() {
	ob_start();
	get_template_part( 'searchform' );
	return ob_get_clean();
}
add_filter( 'genesis_search_form', 'genesis_sample_search_form' );
