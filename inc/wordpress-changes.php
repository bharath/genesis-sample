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
