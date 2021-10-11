(function($){
    "use strict";
    let lightboxScriptsStarted = false;
    let lightboxScriptsLoaded = false;
    function pixDynamicLightbox(){
        if(pixfort_main_object.hasOwnProperty('lightboxUrl')){
            lightboxScriptsStarted = true;
            $.cachedScript(pixfort_main_object.lightboxUrl)
            .done(function( script, textStatus ) {
                lightboxScriptsLoaded = true;
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Lightbox Library was not loaded!");
            });
        }
    }
    jQuery(document).ready(function($) {
        pixLoadLightbox();
    });

    window.pixLoadLightbox = function(){
        if($('.pix-lightbox').length>0){
            if(!lightboxScriptsLoaded){
                console.log("Lightbox Ready to load");
                if(!lightboxScriptsStarted){
                    // console.log("Loading...");
                    pixDynamicLightbox();
                }
            }
        }
    }

})(jQuery);
