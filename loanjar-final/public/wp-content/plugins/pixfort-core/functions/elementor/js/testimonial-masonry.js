jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        update_masonry($element);
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-testimonial-masonry.default',
        addHandler
    );
});
