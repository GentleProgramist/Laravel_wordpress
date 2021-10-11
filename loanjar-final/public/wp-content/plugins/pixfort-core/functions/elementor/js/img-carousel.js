jQuery(window).on('elementor/frontend/init', () => {
    // const addHandler = ( $element ) => {
    //     pix_main_slider();
    //     init_tilts();
    //
    //     setTimeout(function(){
    //         pix_main_slider();
    //         init_tilts();
    //         console.log("now");
    //     }, 2500);
    // };

    const addHandler = ($element) => {
        updateSldier();
    };
    function updateSldier() {
        if (typeof window.Flickity !== 'undefined') {
            setTimeout(function () {
                pix_main_slider();
                init_tilts();
            }, 2500);
        } else {
            setTimeout(function () {
                console.log('retrying slider update...');
                updateSldier();
            }, 500);
        }
    }
    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-img-carousel.default',
        addHandler
    );
});
