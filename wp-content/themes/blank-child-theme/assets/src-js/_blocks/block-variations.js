// https://css-tricks.com/how-to-use-block-variations-in-wordpress/
wp.domReady( () => {

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


