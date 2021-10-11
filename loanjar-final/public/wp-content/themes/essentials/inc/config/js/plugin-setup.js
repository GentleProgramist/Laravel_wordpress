
var PluginWizard = (function($){

    var complete;
    var items_completed = 0;
    var current_item = '';
    var $current_node;
    var current_item_hash = '';


    function ajax_callback(response){
        // console.log(response);
        if(typeof response == 'object' && typeof response.message != 'undefined'){
            $current_node.find('span.plugin-install-status').text(response.message);
            if(typeof response.url != 'undefined'){
                // we have an ajax url action to perform.

                if(response.hash == current_item_hash){
                    $current_node.find('span.plugin-install-status').text("failed");
                    find_next();
                }else {
                    current_item_hash = response.hash;
                    jQuery.post(response.url, response, function(response2) {
                        process_current();
                        $current_node.find('span.plugin-install-status').addClass('pix-install-finished').text(response.message + envato_setup_params.verify_text);
                    }).fail(ajax_callback);
                }

            }else if(typeof response.done != 'undefined'){
                // finished processing this plugin, move onto next
                find_next();
            }else{
                // error processing this plugin
                find_next();
            }
        }else{
            // error - try again with next plugin
            $current_node.find('span.plugin-install-status').text("Success");
            find_next();
        }
    }

    function process_current(){
        if(current_item){
            // query our ajax handler to get the ajax to send to TGM
            // if we don't get a reply we can assume everything worked and continue onto the next one.
            $current_node.find('.spinner').css('visibility','visible');
            // console.log(envato_setup_params.ajaxurl);
            jQuery.post(envato_setup_params.ajaxurl, {
                action: 'envato_setup_plugins',
                wpnonce: envato_setup_params.wpnonce,
                slug: current_item
            }, ajax_callback).fail(ajax_callback);
        }
    }

    function find_next(){
        var do_next = false;
        if($current_node){
            if(!$current_node.data('done_item')){
                items_completed++;
                $current_node.data('done_item',1);
            }
            $current_node.find('.spinner').css('visibility','hidden');
        }
        var $li = $('.envato-wizard-plugins li');
        $li.each(function(){
            
            if($(this).find('.pix-plugin-check:checked').length){
                if(current_item == '' || do_next){
                    current_item = $(this).data('slug');
                    $current_node = $(this);
                    process_current();
                    do_next = false;
                }else if($(this).data('slug') == current_item){
                    do_next = true;
                }
            }
        });
        $('.pixfort-install-plugins').hide();
        $('.pixfort-install-plugins-skip').html('Next step');
        // console.log("FINISHED!");
    }

    return {
        init: function(){
            $('body').on( 'click', '.pixfort-install-plugins', function(e){
                e.preventDefault();
                $('.envato-setup-pages').addClass('installing');
                // alert("pixfort-install-plugins");
                find_next();
            });
        }
    }

})(jQuery);


PluginWizard.init();
