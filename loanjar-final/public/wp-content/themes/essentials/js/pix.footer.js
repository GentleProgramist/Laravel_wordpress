(function ( $ ) {
    $.fn.pixfooter = function() {
        if(!$('body').hasClass('pix-is-sticky-footer') ){
            return false;
        }
        var bgclass = 'bg-gradient-primary';
        var bgstyle = '';
        if($('.pix-footer-overlay').length==0){
            if( $('.site-footer2:first').data('sticky-bg') ){
                bgclass = $('.site-footer2:first').data('sticky-bg');
                if( bgclass=='custom' ){
                    if($('.site-footer2:first').data('sticky-color')){
                        bgstyle = 'style="background:'+$('.site-footer2:first').data('sticky-color')+';"';
                    }
                }
                bgclass = 'bg-'+bgclass;
            }
            $('#page').append('<div class="pix-footer-overlay '+bgclass+'" '+bgstyle+'></div>');
        }
        var ph = $('#page').outerHeight();
        var fh = $('.pix-sticky-footer').outerHeight();
        $('.pix-footer-sticky-placeholder').height(fh);
        var bp = $('body').css('padding');
        if(bp&&bp!=''&&bp!='0px'){
            $('.pix-sticky-footer, .pix-footer-overlay').css('bottom', bp);
        }

        setTimeout(function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        }, 2000);

        $(window).on('resize', function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        });
        setTimeout(function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        }, 6000);
        setTimeout(function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        }, 12000);
        $( '.pix-footer-overlay' ).css( 'height' , fh);
        if($('body').hasClass('pix-sections-stack')){
            $('.pix-footer-overlay').css({
                'z-index': 11
            });
        }
        var s = $('.site-content');
        if($('.site-content').length>0){
            s = $('.pix-portfolio-site-content');
        }
        var f = $('.pix-sticky-footer');

        let pos = $( window ).scrollTop();
        if((pos + $( window ).height()) > ph){
            var op = 1 - (( pos + $( window ).height() - ph ) / fh);
            if (op<0){op = 0};
            if (op>1){op = 1};
            op = op*1.2;
            $('.pix-footer-overlay').css('opacity', op);
        }
        $( window ).scroll(function() {
            let pos = $( window ).scrollTop();
            if((pos + $( window ).height()) > ph){
                $('.pix-sticky-footer').css('opacity', 1);
                var op = 1 - (( pos + $( window ).height() - ph ) / fh);
                if (op<0){op = 0};
                op = op*1.2;
                if (op>1){op = 1};
                $('.pix-footer-overlay').css('opacity', op);
            }else{
                $('.pix-footer-overlay, .pix-sticky-footer').css('opacity', 0);
            }

        });

    };
}( jQuery ));
