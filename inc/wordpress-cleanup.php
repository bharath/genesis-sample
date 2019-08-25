<?php
/**
 * WordPress Cleanup
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

/**
 * Dont Update the Theme
 *
 * If there is a theme in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Bill Erickson
 * @link   http://www.billerickson.net/excluding-theme-from-updates
 * @param  array  $r Existing request arguments.
 * @param  string $url Request URL.
 * @return array  Amended request arguments
 */
function genesis_sample_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}
	$themes = json_decode( $r['body']['themes'] );
	$child  = get_option( 'stylesheet' );
	unset( $themes->themes->$child );
	$r['body']['themes'] = wp_json_encode( $themes );
	return $r;
}
add_filter( 'http_request_args', 'genesis_sample_dont_update_theme', 5, 2 );


/**
 * Dequeue jQuery Migrate
 *
 * @param array $scripts remove jQuery Migrate.
 */
function genesis_sample_dequeue_jquery_migrate( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->add( 'jquery', false, [ 'jquery-core' ], '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'genesis_sample_dequeue_jquery_migrate' );


/**
 * Comment form, button class
 *
 * @param array $args for button block.
 */
function genesis_sample_comment_form_button_class( $args ) {
	$args['class_submit'] = 'submit wp-block-button__link';
	return $args;
}
add_filter( 'comment_form_defaults', 'genesis_sample_comment_form_button_class' );


/**
 * Excerpt More
 */
function genesis_sample_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'genesis_sample_excerpt_more' );
