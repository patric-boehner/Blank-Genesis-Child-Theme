// https://css-tricks.com/how-to-use-block-variations-in-wordpress/
wp.domReady( () => {

    // Full Width Block
    wp.blocks.registerBlockVariation('core/group', {
        name: 'full-width-group',
        title: 'Full Width Group',
        attributes: {
            align: 'full',
            layout: {
                inherit: true,
            },
        },
    });    

    // Inherit Layout by Default for Group Block
    wp.blocks.registerBlockVariation(
        'core/group',
        {
            isDefault: true,
            attributes: {
                layout: {
                    inherit: true,
                },
            },
        }
    );

} );


