wp.domReady( () => {

    //wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	//wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	//wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

    //wp.blocks.registerBlockStyle( 'core/button', {
		//name: 'default',
		//label: 'Default',
        //isDefault: true,
	//});
	
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'bk-child-default',
		label: 'BK Child Default',
        //isDefault: true,
	} );

} );