(function($){
    "use strict";
    let isotopeScriptsStarted = false;
    let isotopeScriptsLoaded = false;
    function pixDynamicIsotope(cb=false){
        if(pixfort_main_object.hasOwnProperty('isotopeUrl')){
            isotopeScriptsStarted = true;
            $.cachedScript(pixfort_main_object.isotopeUrl)
            .done(function( script, textStatus ) {
                isotopeScriptsLoaded = true;
                if(cb){
                    setTimeout(cb, 0);
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Isotope Library was not loaded!");
            });
        }
    }

    window.pixLoadIsotope = function(cb=false){
        if(!isotopeScriptsLoaded){
            console.log("Loading Isotope...");
            pixDynamicIsotope(cb);
        }else{
            setTimeout(cb, 0);
        }
    }

})(jQuery);
