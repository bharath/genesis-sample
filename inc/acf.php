<?php
/**
 * This file adds Gutenberg functions to your Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

add_filter( 'block_categories', 'genesis_sample_block_categories' );
/**
 * Add Custom Blocks Panel in Gutenberg.
 *
 * @param array $categories adds custom category.
 */
function genesis_sample_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'genesis-sample-blocks',
				'title' => __( 'Genesis Sample Custom Blocks', 'genesis-sample' ),
				'icon'  => 'layout',
			],
		]
	);
}
