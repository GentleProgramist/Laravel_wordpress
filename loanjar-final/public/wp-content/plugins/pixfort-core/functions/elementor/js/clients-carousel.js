jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_main_slider();
        init_tilts();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-clients-carousel.default',
        addHandler
    );
});
