jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_main_slider();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-testimonials-slider.default',
        addHandler
    );
});
