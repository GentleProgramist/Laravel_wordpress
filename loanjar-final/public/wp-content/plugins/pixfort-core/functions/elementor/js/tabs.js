jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_animation($element);
        $element.find('.pix_tabs_btns').each(function (i, elem) {
            jQuery(elem).find('.nav-item:first a').tab('show');
        });
    };
    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-horizontal-tabs.default',
        addHandler
    );
    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-vertical-tabs.default',
        addHandler
    );
});
