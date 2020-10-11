wp.domReady( () => {

	wp.blocks.unregisterBlockStyle(
		'core/button',
		[ 'default', 'outline', 'squared', 'fill' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'default', 'wide', 'dots' ],
	);

	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/image',
		[ 'default', 'rounded' ]
	);

	// wp.blocks.registerBlockStyle( 'core/heading', [
	// 	{
	// 		name: 'default',
	// 		label: 'Default',
	// 		isDefault: true,
	// 	},
	// 	{
	// 		name: 'alt',
	// 		label: 'Alternate',
	// 	}
	// ]);

} );
