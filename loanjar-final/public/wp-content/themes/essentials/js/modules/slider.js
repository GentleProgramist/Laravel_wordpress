(function($){
    "use strict";
    let sliderScriptsStarted = false;
    let sliderScriptsLoaded = false;
    function pixDynamicSlider(cb=false){
        if(pixfort_main_object.hasOwnProperty('sliderUrl')){
            sliderScriptsStarted = true;
            $.cachedScript(pixfort_main_object.sliderUrl)
            .done(function( script, textStatus ) {
                sliderScriptsLoaded = true;
                if(cb){
                    setTimeout(cb, 0);
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Slider Library was not loaded!");
            });
        }
    }
    // jQuery(document).ready(function($) {
    //     pixLoadLightbox();
    // });

    window.pixLoadSlider = function(cb){
        if(!sliderScriptsLoaded){
            console.log("Slider Ready to load");
            if(!sliderScriptsStarted){
                console.log("Loading slider...");
                pixDynamicSlider(cb);
            }
        }else{
            setTimeout(cb, 0);
        }
    }

    // window.pix_init_slider = function(el) {
    //     if(!el){
    //         el = $('body');
    //     }
    //     if(el.find('.pix-main-slider').length>0){
    //         pixLoadSlider(function(){
    //
    //
    //             var $sliders = el.find('.pix-main-slider');
    //             $sliders.each(function(i, elem){
    //
    //                 if($(elem).hasClass('flickity-enabled')){
    //                     $(elem).flickity('destroy');
    //                 }
    //                 var opts  = {};
    //                 if($(elem).attr('data-flickity')){
    //                     opts = JSON.parse($(elem).attr('data-flickity'));
    //                 }
    //                 opts.draggable = true;
    //                 if(opts.adaptiveHeight) opts.adaptiveHeight = true;
    //                 opts.resize = true;
    //                 opts.imagesLoaded = true;
    //                 opts.arrowShape = 'M83.7718595,45.4606514 L31.388145,45.4606514 L54.2737785,23.1973134 C56.1027533,21.4180712 56.1027533,18.4982892 54.2737785,16.719047 C52.4448037,14.9398048 49.4903059,14.9398048 47.6613311,16.719047 L16.7563465,46.7836776 C14.9273717,48.5629198 14.9273717,51.4370802 16.7563465,53.2163224 L47.6613311,83.280953 C49.4903059,85.0601952 52.4448037,85.0601952 54.2737785,83.280953 C56.1027533,81.5017108 56.1027533,78.6275504 54.2737785,76.8483082 L31.388145,54.5849702 L83.7718595,54.5849702 C86.3511829,54.5849702 88.4615385,52.5319985 88.4615385,50.0228108 C88.4615385,47.5136231 86.3511829,45.4606514 83.7718595,45.4606514 Z';
    //                 if($( window ).width()<600) opts.autoPlay = false;
    //                 $(elem).on( 'ready.flickity', function() {
    //                     if(opts.pix_id && $(opts.pix_id).hasClass('flickity-enabled') ){
    //                         setTimeout(function(){ $(opts.pix_id).flickity('resize'); }, 500);
    //                     }
    //                     if(opts.pix_id && $(opts.pix_id).hasClass('flickity-enabled') ){
    //                         setTimeout(function(){ $(opts.pix_id).flickity('resize'); }, 1500);
    //                     }
    //                     setTimeout(function(){
    //                         $(elem).addClass('pix-slider-loaded');
    //                     },100);
    //
    //                 });
    //                 $(elem).flickity((opts));
    //                 if(opts.slider_effect){
    //                     var slider_style = '';
    //                     if(opts.slider_style) slider_style = opts.slider_style;
    //                     $(elem).closest('.vc_row:not(.overflow-visible)').removeClass('vc_row_visible').addClass('overflow-hidden').css({'overflow': 'hidden !important'});
    //                     $(elem).closest('.elementor-top-section').addClass('overflow-hidden').css({'overflow': 'hidden !important'});
    //                     var frameRender = 4;
    //                     $(elem).on( 'scroll.flickity', function( event, progress ) {
    //                         var el_width = $(elem).width();
    //                         if($( window ).width()<600) return false;
    //                         var el_left = $(elem).offset().left;
    //                         var slideWidth = $(elem).find('.carousel-cell').width();
    //                         if(!$(elem).data('flickity') || !$(elem).data('flickity').slides) return false;
    //                         $(elem).data('flickity').slides.forEach(function(slide, j) {
    //                             var flkInstanceSlide = $(elem).find('.carousel-cell:nth-child(' + (j + 1) + ')');
    //                             var slide_offset = $(slide.cells[0].element).offset().left;
    //                             var op = 1;
    //                             var local_offset = 0;
    //                             var rotate = 0;
    //                             var translate = 0;
    //                             var scale = 1;
    //                             var depth = 0;
    //                             var index = 10;
    //                             var pointer = 'auto';
    //                             if(slide_offset - el_left < 0 ){
    //                                     if(opts.slider_effect== 'pix-circular-slider'
    //                                     || opts.slider_effect== 'pix-circular-left'
    //                                     || opts.slider_effect== 'pix-fade-out-effect'
    //                                 ){
    //                                     local_offset = slide_offset - el_left;
    //                                     op = 1 + ( local_offset / slideWidth);
    //                                     if(op<0){op=0;}
    //                                     if(op>1){op=1;}
    //                                     if(opts.slider_effect!='pix-fade-out-effect'){
    //                                         rotate = (1-op)*20;
    //                                         translate =  1.8 * ( -1 * slide_offset + el_left );
    //                                         depth = -180 * ( (el_left-slide_offset) / slideWidth);
    //                                         scale = 1- ((1 - op)*0.1);
    //                                     }
    //                                 }else if(slider_style=='pix-opacity-slider'){
    //                                     local_offset = slide_offset - el_left;
    //                                     op = 1 + ( local_offset / slideWidth);
    //                                     if(op<0.3){op=0.3;}
    //                                     if(op>1){op=1;}
    //                                 }
    //                                 if(op<0.1) op = 0;
    //                                 if( (slide_offset - el_left) < -10 ){
    //                                     pointer = 'none';
    //                                 }
    //
    //
    //                                 index = -1;
    //                             }else if(slide_offset  > (el_left + el_width - slideWidth + 1) ){
    //                                 pointer = 'none';
    //                                 if(opts.slider_effect== 'pix-circular-slider'
    //                                     || opts.slider_effect== 'pix-circular-right'
    //                                     || opts.slider_effect== 'pix-fade-out-effect'
    //                                 ){
    //                                     local_offset = el_left  + el_width - slide_offset;
    //                                     op =  local_offset / slideWidth;
    //                                     if(op<0){op=0;}
    //                                     if(op>1){op=1;}
    //                                     if(opts.slider_effect!='pix-fade-out-effect'){
    //                                         rotate = -1 * (1-op)*20;
    //                                         translate = -1*(1-op)*2.2*slideWidth * 0.82;
    //                                         depth = -1*(1-op)*slideWidth*0.52;
    //                                         scale = 1- ((1 - op)*0.1);
    //                                     }
    //                                 }else if(slider_style=='pix-opacity-slider'){
    //                                     local_offset = el_left  + el_width - slide_offset;
    //                                     op =  local_offset / slideWidth;
    //                                     if(op<0.3){op=0.3;}
    //                                     if(op>1){op=1;}
    //                                 }
    //                                 index = -1;
    //                                 if(op<0.2) op = 0;
    //                             }
    //                             flkInstanceSlide.find('.slide-inner').css({
    //                                 'transform': 'perspective('+slideWidth+'px) translateX(' + translate + 'px) rotateY(' + rotate + 'deg) translateZ( '+depth+'px)',
    //                                 '-webkit-transform': 'perspective('+slideWidth+'px) translateX(' + translate + 'px) rotateY(' + rotate + 'deg) translateZ( '+depth+'px)',
    //                                 '-moz-transform': 'perspective('+slideWidth+'px) translateX(' + translate + 'px) rotateY(' + rotate + 'deg) translateZ( '+depth+'px)'
    //                             });
    //                             if(opts.slider_effect== 'pix-circular-slider'
    //                             || opts.slider_effect== 'pix-circular-right'
    //                             || opts.slider_effect== 'pix-circular-left'
    //                             || opts.slider_effect== 'pix-fade-out-effect'
    //                             ){
    //                                 flkInstanceSlide.css({
    //                                     'opacity': op,
    //                                     'z-index': index
    //                                 });
    //                             }
    //                             flkInstanceSlide.css({
    //                                 'pointer-events': pointer
    //                             });
    //                             flkInstanceSlide.parent().css({
    //                                 'pointer-events': pointer
    //                             });
    //                         });
    //                     });
    //                 }
    //
    //             });
    //
    //
    //
    //         });
    //     }
    //
    //
    // }
})(jQuery);
