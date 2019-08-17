<?php
/**
 * This file adds automattic related custom functions to your Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

/**
 * Remove Jetpack Ads from plugin installer search results as no one
 * needs these anyway dditionally remove other promotions and Ads from Jetpack.
 *
 * @link https://wptavern.com/jetpack-7-1-adds-feature-suggestions-to-plugin-search-results#comment-284531
 *
 * @since 1.0.0
 */
add_filter( 'jetpack_show_promotions', '__return_false', 20 );


/**
 * Additionally remove other promotions and Ads from Jetpack.
 *
 * @since 1.0.0
 */
add_filter( 'can_display_jetpack_manage_notice', '__return_false', 20 );
add_filter( 'jetpack_just_in_time_msgs', '__return_false', 20 );


/**
 * Remove WooCommerce 3.6+ Ads injections.
 *
 * @since 1.0.0
 */
add_filter( 'woocommerce_allow_marketplace_suggestions', '__return_false' );


/**
 * Clean up the Woocommerce tracking.
 *
 * @since 1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) :

	if ( class_exists( 'WC_Tracker' ) ) :

		/**
		 * Nope out of Woo Tracking - Clear the tracker hook we know about.
		 *
		 * @since 1.0.0
		 */
		remove_action( 'woocommerce_tracker_send_event', [ 'WC_Tracker', 'send_tracking_data' ] );

		/**
		 * And clear the entire cron job.
		 *
		 * @since 1.0.0
		 */
		wp_clear_scheduled_hook( 'woocommerce_tracker_send_event' );

		/**
		 * Just in case, filter the Woo tracking data and just return an empty
		 *   array any time Woo tries to track anything.
		 *
		 * @since 1.0.0
		 */
		add_filter( 'woocommerce_tracker_data', '__return_empty_array', 100 );

	endif;

endif;
