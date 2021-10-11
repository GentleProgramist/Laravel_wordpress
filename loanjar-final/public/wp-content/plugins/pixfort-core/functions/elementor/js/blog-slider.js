jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_main_slider();
        init_tilts();
        pix_animation();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-blog-slider.default',
        addHandler
    );
});
