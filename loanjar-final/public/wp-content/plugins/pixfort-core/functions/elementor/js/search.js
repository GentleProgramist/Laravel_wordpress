jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {};

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/search.default',
        addHandler
    );
});
