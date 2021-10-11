jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        jQuery('body')
            .find('.pix-shape-dividers')
            .each(function () {
                if (!jQuery(this).hasClass('loaded')) {
                    let divider = new dividerShapes(this);
                    divider.initPoints();
                    jQuery(this).addClass('loaded');
                }
            });
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-dividers.default',
        addHandler
    );
});
