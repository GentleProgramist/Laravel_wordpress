(function($){
    "use strict";
    let pilingScriptsStarted = false;
    let pilingScriptsLoaded = false;
    function pixDynamicPiling(cb){
        if(pixfort_main_object.hasOwnProperty('oneScroll')){
            pilingScriptsStarted = true;
            $.cachedScript(pixfort_main_object.oneScroll)
            .done(function( script, textStatus ) {
                pilingScriptsLoaded = true;
                setTimeout(cb, 0);
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Piling Library was not loaded!");
            });
        }
    }

    jQuery(document).ready(function($) {



        pixDynamicPiling(function(){
            console.log("OK2");
            
        });

    });

    window.pixLoadPiling = function(){
        if($('.pix-pixLoadPiling').length>0){
            if(!pilingScriptsLoaded){
                console.log("Piling Ready to load");
                if(!pilingScriptsStarted){
                    pixDynamicPiling();
                }
            }
        }
    }

})(jQuery);
