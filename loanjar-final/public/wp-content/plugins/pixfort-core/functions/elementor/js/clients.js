jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        init_tilts();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-clients.default',
        addHandler
    );
});
