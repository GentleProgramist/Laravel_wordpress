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

    class DynamicLoader {
        constructor(url, lib = false) {
            this.url = url;
            this.lib = lib;
            this.loaded = false;
            this.libLoaded = false;
        }
        loadLib(cb){
            let self = this;
            if(this.libLoaded){
                setTimeout(cb, 0);
            }else{
                $.cachedScript(this.lib)
                .done(function( script, textStatus ) {
                    self.libLoaded = true;
                    setTimeout(cb, 0);
                })
                .fail(function( jqxhr, settings, exception ) {
                    console.log("Library was not loaded!");
                    console.log(this.lib);
                });
            }
        }
        loadScript(cb){
            let self = this;
            if(this.loaded){
                setTimeout(cb, 0);
            }else{
                $.cachedScript(this.url)
                .done(function( script, textStatus ) {
                    self.loaded = true;
                    setTimeout(cb, 0);
                })
                .fail(function( jqxhr, settings, exception ) {
                    console.log("Script was not loaded!");
                    console.log(this.url);
                });
            }
        }
        run(cb){
            if(this.lib){
                if(this.libLoaded){
                    setTimeout(cb, 0);
                }else{

                }
            }else{
                if(this.loaded){
                    setTimeout(cb, 0);
                }else{

                }
            }
            else{
                $.cachedScript(this.url)
                .done(function( script, textStatus ) {
                    setTimeout(cb, 0);
                })
                .fail(function( jqxhr, settings, exception ) {
                    console.log("Script was not loaded!");
                    console.log(this.url);
                });
            }
        }
    }
})(jQuery);
