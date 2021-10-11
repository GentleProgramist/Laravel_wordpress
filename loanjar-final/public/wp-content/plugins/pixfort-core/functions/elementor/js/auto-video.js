jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_animation();
        video_element();
        init_tilts();
        $element.find('video').each(function (i, elem) {
            this.play();
        });
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-auto-video.default',
        addHandler
    );
});
