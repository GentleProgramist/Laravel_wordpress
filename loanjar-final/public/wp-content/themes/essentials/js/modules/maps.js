(function($){
    "use strict";

    jQuery.cachedScript = function( url, options ) {
        options = $.extend( options || {}, {
            dataType: "script",
            cache: true,
            url: url
        });
        return jQuery.ajax( options );
    };
    let mapsScriptsStarted = false;
    let mapsScriptsLoaded = false;
    function pixDynamicMaps(){
        if(pixfort_main_object.hasOwnProperty('googleMapsUrl')){
            // console.log(pixfort_main_object.googleMapsUrl);
            mapsScriptsStarted = true;
            $.cachedScript(pixfort_main_object.googleMapsUrl)
            .done(function( script, textStatus ) {
                // self.libLoaded = true;
                // console.log(pixfort_main_object.googleMapsUrl);
                // console.log(textStatus);
                mapsScriptsLoaded = true;
                if(pixfort_main_object.hasOwnProperty('googleMapsScript')){
                    $.cachedScript(pixfort_main_object.googleMapsScript)
                    .done(function( script, textStatus ) {
                        // self.libLoaded = true;
                        // console.log(pixfort_main_object.googleMapsScript);
                        // console.log(textStatus);
                        init_pix_maps();
                        mapsScriptsStarted = false;
                    })
                    .fail(function( jqxhr, settings, exception ) {
                        console.log("Script was not loaded!");
                    });
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Library was not loaded!");
            });
        }
    }
    window.pixLoadMaps = function(){
        if($('.pix-google-map').length>0){
            if(mapsScriptsLoaded){
                init_pix_maps();
            }else{
                if(!mapsScriptsStarted){
                    pixDynamicMaps();
                }

            }

        }
    }

})(jQuery);
