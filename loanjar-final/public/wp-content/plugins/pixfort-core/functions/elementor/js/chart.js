jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        init_chart($element);
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-chart.default',
        addHandler
    );
});
