jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        init_tilts();
        pix_animation();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-blog.default',
        addHandler
    );
});
