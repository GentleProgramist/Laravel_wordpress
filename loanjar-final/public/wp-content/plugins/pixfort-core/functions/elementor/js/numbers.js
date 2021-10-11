jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        update_numbers($element);
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-numbers.default',
        addHandler
    );
});
