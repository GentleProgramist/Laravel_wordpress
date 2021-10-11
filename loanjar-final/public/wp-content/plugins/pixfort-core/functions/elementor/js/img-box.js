jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_animation($element);
        init_tilts();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-3d-box.default',
        addHandler
    );
});
