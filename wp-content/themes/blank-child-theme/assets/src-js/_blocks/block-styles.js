wp.domReady( () => {

	wp.blocks.unregisterBlockStyle(
		'core/button',
		[ 'default', 'outline', 'squared', 'fill' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'default', 'wide', 'dots' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large', 'plain' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/image',
		[ 'default', 'rounded' ]
	);

	wp.blocks.registerBlockStyle( 'core/cover', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		}
	]);

	wp.blocks.registerBlockStyle( 'core/group', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		}
	]);

	wp.blocks.registerBlockStyle( 'core/heading', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		}
	]);

	wp.blocks.registerBlockStyle( 'core/paragraph', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		}
	]);

	wp.blocks.registerBlockStyle( 'acf/icon-block', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		}
	]);

	wp.blocks.registerBlockStyle( 'core/columns', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'medium-gap',
			label: 'Medium Gap',
		},
		{
			name: 'large-gap',
			label: 'Large Gap',
		}
	]);

	wp.blocks.registerBlockStyle( 'core/column', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		}
	]);


} );
