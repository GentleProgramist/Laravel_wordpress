jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        updateSldier($element);
    };
    function updateSldier($element) {
        // if(typeof window.Flickity !== "undefined"){
        setTimeout(function () {
            window.pix_sliders();
            pix_animation_display($element);
            piximations.init();
        }, 1500);
        setTimeout(function () {
            window.pix_sliders();
        }, 2500);
        // }else{
        //     setTimeout(function(){
        //         console.log("retrying slider update...");
        //         updateSldier();
        //     }, 1000);
        // }
    }
    // const addHandler = ( $element ) => {
    //     setTimeout(function(){
    //         window.pix_sliders();
    //         pix_animation_display($element);
    //         piximations.init();
    //         console.log("HERERE");
    //     }, 1400);
    // };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-slider.default',
        addHandler
    );
});
