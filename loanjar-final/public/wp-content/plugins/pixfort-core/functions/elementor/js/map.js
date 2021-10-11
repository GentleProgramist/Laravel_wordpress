jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        // init_pix_maps($element);
        pixLoadMaps($element);
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-map.default',
        addHandler
    );
});
