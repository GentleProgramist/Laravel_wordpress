(function($){
    "use strict";

    jQuery(document).ready(function($) {
        // woocommerce product preview popup
        $('.pix-product-preview').on('click', function(e){
            e.preventDefault();
            var link = $(this).data('preview-link');
            $.alert({
                title: '',
                columnClass: 'col-12 col-sm-10',
                backgroundDismiss: true,
                theme: 'pix-product-popup',
                closeIcon: true,
                content: '<div></div>',
                onOpenBefore: function () {
                    var self = this;
                    self.showLoading(true);
                },
                onContentReady: function () {
                    var self = this;
                    return $.ajax({
                        url: link,
                        method: 'get'
                    }).done(function (response) {
                        self.setContentAppend( '<div class="pix-popup-content-div">' + response + '</div>');
                        self.hideLoading(true);
                        setTimeout(function(){
                            self.$body.addClass('pix-popup-animate');
                        }, 300);
                    }).fail(function(){
                        self.setContent('Something went wrong, please try again.');
                    });
                }
            });
        });

        $('.pixfort-shop-select').selectpicker({
            styleBase: 'btn dropdown-toggle btn-light bg-white shadow-sm font-weight-bold text-body-default text-sm'
        });

        $('body').on( 'click', 'a.plus, a.minus', function(e) {
            e.preventDefault();
           // Get current quantity values
           var qty = $( this ).closest( '.quantity' ).find( '.qty' );
           var val   = parseFloat(qty.val());
           var max = parseFloat(qty.attr( 'max' ));
           var min = parseFloat(qty.attr( 'min' ));
           var step = parseFloat(qty.attr( 'step' ));
           // Change the value if plus or minus
           if ( $( this ).is( '.plus' ) ) {
              if ( max && ( max <= val ) ) {
                 qty.val( max );
              } else {
                 qty.val( val + step ).change();
              }
           } else {
              if ( min && ( min >= val ) ) {
                 qty.val( min );
              } else if ( val > 1 ) {
                 qty.val( val - step ).change();
              }
           }
        });

        $('.widget_product_categories .count').each(function(i, elem){
            let c = $(this).html().replace('(', '').replace(')', '');
            $(this).html(c);
        });


        $('.pix-add-to-cart').on('click', function(e){
            e.preventDefault();
            var self = $(this);
            var name = "Success";
            if($(this).data('name')){
                name = $(this).data('name');
            }
            var link = $(this).attr('data-link');
            var img = false;
            if(self.data('img')){
                img = self.data('img');
            }
            var id = $(this).data('product_id');
            $(this).find('.btn-icon').removeClass('pixicon-bag-2');
            var loading_icon = '<svg class="pix-icon-loading bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 00-.708 0l-2 2a.5.5 0 10.708.708L2.5 8.207l1.646 1.647a.5.5 0 00.708-.708l-2-2zm13-1a.5.5 0 00-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 00-.708.708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 000-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 3a4.995 4.995 0 00-4.192 2.273.5.5 0 01-.837-.546A6 6 0 0114 8a.5.5 0 01-1.001 0 5 5 0 00-5-5zM2.5 7.5A.5.5 0 013 8a5 5 0 009.192 2.727.5.5 0 11.837.546A6 6 0 012 8a.5.5 0 01.501-.5z" clip-rule="evenodd"/></svg>';
            $(this).find('.btn-icon').addClass('').html(loading_icon);
            var html = '<div class="toast pix-notification bg-white shadow-lg border-0 rounded-lg w-100" role="alert" aria-live="assertive" aria-atomic="true">';
            html += '<div class="toast-header pix-p-10">';
            if(img){
                html += '<img src="'+img+'" class="rounded-lg pix-mr-10 " alt="" style="width:25px;height:25px;">';
            }
            html += '<strong class="mr-auto">'+name+'</strong>';
            html += '<button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">';
            html += '<span aria-hidden="true">&times;</span>';
            html += '</button>';
            html += '</div>';
            html += '<div class="toast-body pix-p-10 text-body-default font-weight-bold">';
            if(pixfort_main_object.hasOwnProperty('dataAddCartMsg')){
                html += pixfort_main_object.dataAddCartMsg;
            }else{
                html += 'The item has been added to your shopping cart!';
            }
            html += '</div>';
            html += '</div>';
            var data = {
                product_id: id,
                quantity: 1
            }
            return $.ajax({
                url: link,
                method: 'GET'
            }).done(function (data) {
                $( document.body ).trigger( 'wc_fragment_refresh' );
                var el = $(html);
                $('.pix-notifications-area').append(el);
                el.toast({
                    autohide: true,
                    animation: true,
                    delay: 3000
                });
                el.toast('show');
                self.find('.btn-icon').replaceWith('<span class="btn-icon text-success pixicon-check-circle-1 align-self-center"></span>');
                self.find('.btn-icon').removeClass('pixicon-rotate-right pix-icon-loading').html('');
                self.find('.btn-icon').addClass('text-success pixicon-check-circle-1');
                setTimeout(function(){
                    self.find('.btn-icon').removeClass('text-success pixicon-check-circle-1');
                    self.find('.btn-icon').addClass('pixicon-bag-2');
                }, 1000);

            }).fail(function(){
                // console.log('Something went wrong, please try again.');
                self.find('.btn-icon').removeClass('pixicon-rotate-right pix-icon-loading').html('');
                self.find('.btn-icon').addClass('text-red pixicon-close-circle');
                setTimeout(function(){
                    self.find('.btn-icon').removeClass('text-red pixicon-close-circle');
                    self.find('.btn-icon').addClass('pixicon-bag-2');
                }, 1000);
            });
        });

        $('.pix-add-to-wishlist').on('click', function(e){
            e.preventDefault();
            var self = $(this);
            var id = false;
            id = self.data('id');
            if(!id) return false;
            var link = $(this).attr('data-wishlist-link');
            $(this).find('.btn-icon').removeClass('pixicon-heart');
            var loading_icon = '<svg class="pix-icon-loading bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 00-.708 0l-2 2a.5.5 0 10.708.708L2.5 8.207l1.646 1.647a.5.5 0 00.708-.708l-2-2zm13-1a.5.5 0 00-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 00-.708.708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 000-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 3a4.995 4.995 0 00-4.192 2.273.5.5 0 01-.837-.546A6 6 0 0114 8a.5.5 0 01-1.001 0 5 5 0 00-5-5zM2.5 7.5A.5.5 0 013 8a5 5 0 009.192 2.727.5.5 0 11.837.546A6 6 0 012 8a.5.5 0 01.501-.5z" clip-rule="evenodd"/></svg>';
            $(this).find('.btn-icon').addClass('').html(loading_icon);
            var data = {
                add_to_wishlist: id,
                product_type: 'simple',
                action: 'add_to_wishlist'
            }
            if(self.hasClass('remove-item')){
                data = {
                    remove_from_wishlist: id,
                    product_type: 'simple',
                    action: 'remove_from_wishlist'
                }
            }
            return $.ajax({
                url: link,
                data: data,
                method: 'POST'
            }).done(function (data) {

                if(self.hasClass('remove-item')){
                    self.removeClass('remove-item');
                    self.find('.btn-icon').removeClass('pixicon-rotate-right pix-icon-loading text-red').html('');
                    self.find('.btn-icon').addClass('text-body-default pixicon-heart');
                    let wishCount = Number($('.pix-header-wishlist .cart-count').html());
                    if(wishCount&&wishCount>0){
                        wishCount--;
                        $('.pix-header-wishlist .cart-count').html(wishCount);
                    }
                }else{
                    self.find('.btn-icon').removeClass('pixicon-rotate-right pix-icon-loading text-body-default').html('');
                    self.find('.btn-icon').addClass('text-red pixicon-heart');
                    self.addClass('remove-item');
                    let wishCount = Number($('.pix-header-wishlist .cart-count').html());
                    if(wishCount){
                        wishCount++;
                        $('.pix-header-wishlist .cart-count').html(wishCount);
                    }
                }
            }).fail(function(){
                // console.log('Something went wrong, please try again.');
                self.find('.btn-icon').removeClass('pixicon-rotate-right pix-icon-loading').html('');
                self.find('.btn-icon').addClass('text-red pixicon-close-circle');
                setTimeout(function(){
                    self.find('.btn-icon').removeClass('text-red pixicon-close-circle').html('');
                    self.find('.btn-icon').addClass('pixicon-heart');
                }, 1000);
            });
        });


    });
})(jQuery);
