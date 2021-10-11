jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        setTimeout(function () {
            pixLoadLightbox();
            update_masonry();
            console.log('Updatessss');
        }, 1400);
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-gallery.default',
        addHandler
    );
});
