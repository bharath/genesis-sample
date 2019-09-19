wp.domReady(() => {

	wp.blocks.registerBlockStyle('core/heading', {
		name: 'default',
		label: 'Default',
		isDefault: true
	});

	wp.blocks.registerBlockStyle('core/heading', {
		name: 'alt',
		label: 'Alternate'
	});

	wp.blocks.registerBlockStyle('core/group', {
		name: 'default',
		label: 'Default',
		isDefault: true
	});

	wp.blocks.registerBlockStyle('core/group', {
		name: 'small-padding',
		label: 'Small Padding'
	});

	wp.blocks.registerBlockStyle('core/group', {
		name: 'normal-padding',
		label: 'Normal Padding'
	});

	wp.blocks.registerBlockStyle('core/group', {
		name: 'large-padding',
		label: 'Large Padding'
	});

	wp.blocks.registerBlockStyle('core/button', {
		name: 'fill-alt',
		label: 'Fill Alt'
	});

	wp.blocks.registerBlockStyle('core/button', {
		name: 'outline-alt',
		label: 'Outline Alt'
	});

	/*
	// If your theme needs custom style uncomment this
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'circular' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'dark' );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'custom',
		label: 'Custom'
	} );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'custom-dark',
		label: 'Custom Dark'
	} );
	*/

});

/*
// If your theme needs custom style uncomment this
// Our filter function
function setBlockCustomClassName( className, blockName ) {
	return blockName === 'core/button' ?
		'wp-block-button is-style-custom' :
		className;
}

// Adding the filter
wp.hooks.addFilter(
	'blocks.getBlockDefaultClassName',
	'wp-block-button/set-block-custom-class-name',
	setBlockCustomClassName
);
*/