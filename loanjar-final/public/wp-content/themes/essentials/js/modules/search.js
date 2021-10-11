(function($){
    "use strict";
    let searchScriptsStarted = false;
    let searchScriptsLoaded = false;
    function pixDynamicSearch(cb=false){
        if(pixfort_main_object.hasOwnProperty('searchUrl')){
            searchScriptsStarted = true;
            $.cachedScript(pixfort_main_object.searchUrl)
            .done(function( script, textStatus ) {
                searchScriptsLoaded = true;
                if(cb){
                    setTimeout(cb, 0);
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Search Library was not loaded!");
            });
        }
    }
    jQuery(document).ready(function($) {
        let isLoaded = false;
        $(".pix-ajax-search").hover(function(){
            if(!isLoaded){
                pixLoadSearch(function(){
                    initSuggestions();
                    isLoaded = true;
                });
            }
        });
        $(".pix-ajax-search").focus(function(){
            if(!isLoaded){
                pixLoadSearch(function(){
                    initSuggestions();
                    isLoaded = true;
                });
            }
        });

        function initSuggestions(){
            $('.pix-ajax-search').each(function(i, elem){
                var container = $(elem).closest('.pix-ajax-search-container');
                var searchForm = $(elem).closest('.pix-search-form');
                var link = $(this).data('search-link');
                let phrase = '';
                $(elem).autoComplete({
                    autoSelect: false,
                    // minLength: 2,
                    // preventEnter: true,
                    noResultsText: '',
                    resolver: 'custom',
                        formatResult: function (item) {
                            if(item.icon){
                                return {
        							value: item.id,
        							text: item.text,
        							html: [
                                            $('<img>').attr('src', item.icon), ' ',
        									item.text
        								]
        						};
                            }else{
                                return {
        							value: item.id,
        							text: item.text,
        							html: [
        									item.text
        								]
        						};
                            }

    					},
                        events: {
                            search: function (query, process) {
                                // let's do a custom ajax call
                                if(phrase!=$(elem).val()){
                                    phrase = $(elem).val();
                                    $.get(link, { term: $(elem).val() }, function (response) {
                                        if(!response.error){
                                            var data =  JSON.parse(response);
                                            // console.log(data);
                                            process(data);
                                        }

                                    });
                                }

                            }
                        }
                });
                let enableSubmit = true;
                $(elem).on('autocomplete.select', function(e, item) {
                    e.preventDefault();
                    e.stopPropagation();
                    enableSubmit = false;
                    if(item.value){
                        window.location.href = item.value;
                    }
                    return false;
        		});
                container.submit(function(e){
                    if(!enableSubmit){
                        e.preventDefault();
                    }
                });
                searchForm.submit(function(e){
                    if(!enableSubmit){
                        e.preventDefault();
                    }
                });
                $(elem).on('autocomplete.freevalue', function(evt, item) {
                    enableSubmit = true;
    			});

            });
        }

    });

    window.pixLoadSearch = function(cb){
        if(!searchScriptsLoaded){
            // console.log("Suggestions Ready to load");
            if(!searchScriptsStarted){
                // console.log("Loading Suggestions...");
                pixDynamicSearch(cb);
            }
        }else{
            setTimeout(cb, 0);
        }
    }
})(jQuery);
