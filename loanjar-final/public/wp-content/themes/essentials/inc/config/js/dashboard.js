(function($){
    $('.pixfort-skip').on('click', function(){
        $('.is-active').addClass('finished');
        var next = $($(this).attr("href"));
        setTimeout(function(){
            $('.is-active').removeClass('is-active');
            next.addClass('is-active');
        }, 400);


    });
    $('.pixfort-finish').on('click', function(){
        $('.is-active').removeClass('is-active');
        setTimeout(function(){
            $('.dashboard-grid').removeClass('getting-started');
            $('.dashboard-grid').addClass('animate-dashboard');
        }, 200);

        var data = {
            action: 'pix_finish_dashboard'
        };
        $.ajax({
            url: dashboard_object.AJAX_URL,
            data: data,
            method: 'POST'
        }).done(function (data) {

        });



    });
    $('.pix-theme-deactivate').on('click', function(){
        if (window.confirm("Are you sure that you want to deactivate the theme?")) {


            var data = {
                action: 'pix_deactivate_theme'
            };
            $.ajax({
                url: dashboard_object.AJAX_URL,
                data: data,
                method: 'POST'
            }).done(function (response) {
                var data = JSON.parse(response);
                if(data.result){
                    $('.svg-dashboard-done').removeClass('pix-start-animation').addClass('pix-start-animation');
                    $('.pix-verify-status-text').html(data.message);
                    $('.pix-theme-deactivate').hide();
                }else{
                    $('.dashboard-done').hide();
                    $('.pix-verify-status-text').html(data.message);
                }
            }).fail(function(err){
            });
        }

    });

    setTimeout(function(){
        $('.svg-dashboard-done').addClass('pix-start-animation');
    }, 1200);

})(jQuery);
