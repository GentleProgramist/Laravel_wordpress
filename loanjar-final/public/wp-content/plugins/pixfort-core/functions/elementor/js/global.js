jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pixLoadImgs();
        pix_animation($element);
    };

    // elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
    // 	setTimeout(function(){
    //         pix_animation(false, true);
    //     }, 1500);
    // } );

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/widget',
        function ($scope) {
            pix_animation($scope, true);
        }
    );

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/widget',
        addHandler
    );
});
