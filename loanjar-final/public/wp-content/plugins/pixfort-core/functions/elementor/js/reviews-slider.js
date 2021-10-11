jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        updateReviewsSldier();
    };
    function updateReviewsSldier() {
        if (typeof window.Flickity !== 'undefined') {
            setTimeout(function () {
                pix_main_slider();
                init_tilts();
            }, 2500);
        } else {
            setTimeout(function () {
                console.log('retrying slider reviews update...');
                updateReviewsSldier();
            }, 1000);
        }
    }
    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-reviews-slider.default',
        addHandler
    );
});
