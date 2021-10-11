(function ( $ ) {
	'use strict';

	jQuery(document).ready(function($) {
		// console.log("Header Builder! 2");
		var res = $('.pixfort_header_builder').find('.pixfort_res');
		// console.log( JSON.parse(res.val()) );
		if(!res||res.length==0){
			return false;
		}
		// console.log( res.val() );
		var pix_colors = JSON.parse($('#pix_colors').val());
		var pix_colors_no_custom = JSON.parse($('#pix_colors_no_custom').val());
		var pix_text_colors = JSON.parse($('#pix_text_colors').val());
		var pix_btn_colors = JSON.parse($('#pix_btn_colors').val());
		var pix_btn_style = JSON.parse($('#pix_btn_style').val());
		var pix_menus_list = JSON.parse($('#pix_menus').val());
		var pix_popups = JSON.parse($('#pix_popups').val());
		var pix_bg = JSON.parse($('#pix_bg').val());
		var pix_bg_with_custom = JSON.parse($('#pix_bg_with_custom').val());
		// var pix_bg_custom = pix_bg;
		// pix_bg_custom.custom = 'Custom2';

		var pix_bg_with_default = [];
		pix_bg_with_default[''] = 'Default';
		$.each(pix_bg, function(i, item){
			pix_bg_with_default[i] = item;
		});


		var pix_menus = [];
		$.each(pix_menus_list, function(i, item){
			// console.log(item);
			pix_menus[item.slug] = item.name;
		});
		// console.log(pix_menus);
		var url = plugin_header_object.PIX_CORE_PLUGIN_URI;
		var elms = [];
		elms['menu'] = '<div class="ui-state-default pix_el_green pix_flex_fill pix_header_element" data-title="Menu" title="Menu" data-name="menu"><span class="pix_el_icon"><img src="'+url+'functions/images/header/bars-menu.svg"/></span> Menu</div>';
		elms['btn'] = '<div class="ui-state-default pix_el_green pix_header_element" data-title="Button" data-name="btn" title="Button"><span class="pix_el_icon"><img src="'+url+'functions/images/header/btn.svg"/></span> Button</div>';
		elms['logo'] = '<div class="ui-state-default pix_el_blue pix_header_element" data-title="Logo" data-name="logo" title="logo"><span class="pix_el_icon"><img src="'+url+'functions/images/header/logo-mini.svg"/></span> Logo</div>';
		elms['social'] = '<div class="ui-state-default pix_el_blue pix_header_element" data-title="Social" data-name="social" title="social"><span class="pix_el_icon"><img src="'+url+'functions/images/header/twitter.svg"/></span></div>';
		elms['text'] = '<div class="ui-state-default pix_header_element" data-title="Text" data-name="text" title="text"><span class="pix_el_icon"><img src="'+url+'functions/images/header/text.svg"/></span> Text</div>';
		elms['link'] = '<div class="ui-state-default pix_header_element" data-title="Link" data-name="link" title="link">Link</div>';
		elms['phone'] = '<div class="ui-state-default pix_header_element" data-title="Phone" data-name="phone" title="phone"><span class="pix_el_icon"><img src="'+url+'functions/images/header/phone.svg"/></span> Phone</div>';
		elms['address'] = '<div class="ui-state-default pix_header_element" data-title="Address" data-name="address" title="address"><span class="pix_el_icon"><img src="'+url+'functions/images/header/address.svg"/></span> Address</div>';
		elms['search'] = '<div class="ui-state-default pix_el_yellow pix_header_element" data-title="Search" data-name="search" title="search"><img src="'+url+'functions/images/header/zoom.svg"/></span></div>';
		elms['space'] = '<div class="ui-state-default pix_header_element" data-title="Space" data-name="space" title="space"><span class="pix_el_icon"><img src="'+url+'functions/images/header/space.svg"/></span> Space</div>';
		elms['divider'] = '<div class="ui-state-default pix_header_element" data-title="Divider" data-name="divider" title="divider"><span class="pix_el_icon"><img src="'+url+'functions/images/header/divider.svg"/></span> Divider</div>';
		elms['cart'] = '<div class="ui-state-default pix_el_red pix_header_element" data-title="Cart" data-name="cart" title="cart"><span class="pix_el_icon"><img src="'+url+'functions/images/header/cart.svg"/></span> Cart</div>';
		elms['wishlist'] = '<div class="ui-state-default pix_el_red pix_header_element" data-title="Wishlist" data-name="wishlist" title="Wishlist"><span class="pix_el_icon"><img src="'+url+'functions/images/header/cart.svg"/></span> Wishlist</div>';
		elms['language'] = '<div class="ui-state-default pix_el_yellow pix_header_element" data-title="Language" data-name="language" title="language"><span class="pix_el_icon"><img src="'+url+'functions/images/header/language.svg"/></span></div>';

		// {"topbar_1":["text"],"header_1":["logo","menu"],"header_2":["text","btn"]}
		// console.log(plugin_header_object.PIX_ICONS);

		if(res.val()){
			// console.log(res.val());
			init_builder(JSON.parse(res.val()));
		}

		var dragging = false;


		$(".pix_header_area").on("click", '.pix_header_element', function(e) {
			e.preventDefault();
			if(!dragging){
				init_el_settings(this);
			}
		});
		$(".pix_main_area").on("click", '.pix_main_area_btn', function(e) {
			e.preventDefault();
			if(!dragging){
				init_el_settings(this);
			}
		});
		$(".pix_area_div").on("click", '.pix_col_btn', function(e) {
			e.preventDefault();
			if(!dragging){
				let el = $(this).parent().find('.pix_header_area:first');
				// console.log(el);
				init_el_settings(el);
			}
			return false;
		});
		$("body").on("click", '.pix_delete_all', function(e) {
			e.preventDefault();
			var r = confirm("Are you sure that you want to delete all elements?");
			if (r == true) {
			  $('.pix_header_area').html('');
			  res.val(get_data());
			  return false;
			}
		});

		// var send = JSON.stringify(data);
		$( ".pix_sortable" ).sortable({
			connectWith: [".pix_sortable", ".pix_header_trash"],
	      revert: "invalid",
		  containment: $('#pixfort_header_builder'),
		  tolerance:'pointer',
		  start: function(event, ui) {
		      dragging = true;
			  // $('.pix_header_trash').css({
				//   'height': '120px'
			  // });
			  $('.pix_header_trash').attr('style','');
			  $('.pix_header_trash').addClass('is-active');
		  },
		  stop: function( event, ui ) {
			  res.val(get_data());
			  ui.item.attr('style', '');
			   setTimeout(function(){dragging = false;}, 300);
			   $('.pix_header_trash').removeClass('is-active');
			  //  $('.pix_header_trash').css({
 				//   'height': '0px'
 			  // });
		  },


		  // placeholder: "ui-state-highlight"
	    });


		$( ".pix_header_el" ).draggable({
		 connectToSortable: ".pix_sortable, .pix_header_trash",
		 helper: "clone",
		 // containment: $('#pixfort_header_builder'),
		 tolerance:'pointer',
		 revert: "invalid",
		 droppable: "drop",
		 stop: function( event, ui ) {
			 res.val(get_data());
		 },
		 drop: function (event, ui) {
			 // console.log(ui);
					// var x = ui.helper.clone();
					// x.removeClass().attr('style', '');
					// x.addClass("ui-state-default");
					// x.appendTo('#container');
				ui.helper.attr('style', '');
			}
	   });

		$( ".pix_header_trash" ).sortable({
			connectWith: [".pix_sortable", ".pix_header_el"],
			// containment:'document',
			containment: $('#pixfort_header_builder'),
   			tolerance:'pointer',
			opacity: 0.5,

	      // revert: 'invalid',
		  start: function(event, ui) {
		      dragging = true;
			 //  $('.pix_header_trash').css({
				//  'background': 'red'
			 // });
		  },
		  stop: function( event, ui ) {
			  ui.item.attr('style', '');
			   setTimeout(function(){dragging = false;}, 300);
			   $('.pix_header_trash .pix_header_element').hide().remove();
			//    $('.pix_header_trash').css({
  			// 	'background': 'red'
  			// });
		  },
		  receive: function( event, ui ) {
			//   $('.pix_header_trash').css({
 			// 	'background': 'red'
 			// });
			$('.pix_header_trash').addClass('has-element');
			   setTimeout(function(){dragging = false;}, 300);
			   $('.pix_header_trash .pix_header_element').hide().remove();
			   $('.pix_header_trash').removeClass('is-active');
		  },
		  change: function( event, ui ) {
			 //  $('.pix_header_trash').css({
				//  'background': '#E3FFF3'
			 // });
		  },


		  // placeholder: "ui-state-highlight"
	    });
		$('.pixfort_headerbuilder_loading').addClass('is-ready');
		$('.pixfort_header_builder').addClass('is-ready');
		$('.pixfort_header_builder').attr('style','');


	    // $( ".pix_header_el" ).draggable({
	    //   connectToSortable: ".pix_sortable, .pix_header_trash",
	    //   helper: "clone",
		//   containment: $('#pixfort_header_builder'),
		//   tolerance:'pointer',
	    //   revert: "invalid",
		//   stop: function( event, ui ) {
		// 	  res.val(get_data());
		//   },
		//   drop: function (event, ui) {
		// 	  console.log(ui);
        //             // var x = ui.helper.clone();
        //             // x.removeClass().attr('style', '');
        //             // x.addClass("ui-state-default");
        //             // x.appendTo('#container');
        //             ui.helper.attr('style', '');
        //         }
	    // });
	    $( "ul, li" ).disableSelection();


		function init_builder(data){
			$.each(data,function(i, main_area){
				// console.log(main_area);
				$('.pix_main_area[data-name="'+i+'"]').find('.pix_main_area_btn:first').attr('data-val', JSON.stringify(main_area.opts) );
				$.each(main_area.val,function(i, area){
					$('.pix_header_area[data-name="'+i+'"]').html("");
					// console.log(area);
					$('.pix_header_area[data-name="'+i+'"]').attr('data-val', JSON.stringify(area.opts));
					$.each(area.val,function(index, el){
						// let obj = JSON.parse(el);
						// console.log(el);
						// console.log(el.val);
						if(el.name in elms){
							// console.log(elms[el.name]);
							let item = $(elms[el.name]);
							if(el.val){
								item.attr('data-val', JSON.stringify(el.val));
								// $.each(el.val,function(i, opt){
								// 	item.attr('data-'+opt.name, opt.val);
								// })
							}
							$('div[data-name="'+i+'"]').append(item);
						}
					});
				});
			});
		}

		function init_el_settings(el){
			var type = $(el).data('name');
			if($(el).hasClass('pix_header_area')){
				type = 'col_area';
			}

			var options = [];

			if(type=="text"){
				options.push({
					type: "text",
					name: "text",
					title: "Text",
					val: "Default Text"
				});
				options.push({
					type: "icon",
					name: "icon",
					title: "Icon",
					val: ""
				});
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "disabled",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});
			}
			if(type=="social"){
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "disabled",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});
			}
			if(type=="wishlist"){
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "fade-in-left",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});
			}
			if(type=="logo"){
				options.push({
					type: "text",
					name: "height",
					title: "Logo height",
					desc: "Input custom height in pixels, for example: 30px",
					val: ""
				});
				options.push({
					type: "image",
					name: "logo_img",
					title: "Logo image (Optional)",
					desc: "Choose a different logo from the main website logo.",
					val: ""
				});
				options.push({
					type: "image",
					name: "logo_scroll_img",
					title: "Logo scroll image (Optional)",
					desc: "Choose a different scoll logo from the main website scroll logo (Desktop only).",
					val: ""
				});
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "slide-in-up",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
						"slide-in-up"		: "slide-in-up",
					}
				});
				options.push({
					type: "text",
					name: "custom_url",
					title: "Link (Optional)",
					desc: "Choose logo link or leave empty to use website homepage link.",
					val: ""
				});
				options.push({
					type: "checkbox",
					name: "target",
					title: "Open in a new tab",
					val: 'off'
				});
				options.push({
					type: "text",
					name: "width",
					title: "Logo width (optional)",
					desc: "Input custom width",
					val: ""
				});
			}
			if(type=="cart"){
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "fade-in-left",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});
			}
			if(type=="search"){
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "fade-in-left",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});
				options.push({
					type: "select",
					name: "search_style",
					title: "Style",
					val: "",
					options: {
						"": "Default",
						"floating-sm" 			: "Small Floating Bar"
					}
				});
				options.push({
					type: "select",
					name: "search_bar_direction",
					title: "Open direction",
					val: "",
					options: {
						"": "Right",
						"open-bar-left" 			: "Left"
					},
					dependency: {
						field: "search_style",
						val: "floating-sm"
					}
				});
			}
			if(type=="menu"){
				options.push({
					type: "select",
					name: "menu",
					title: "Menu",
					val: "",
					options: pix_menus
				});
				options.push({
					type: "checkbox",
					name: "disable_bold",
					title: "Disable Bold text",
					val: false
				});
				options.push({
					type: "select",
					name: "is_right_float",
					title: "Menu align",
					val: '',
					options: { "start": "Left", "end": "Right", "center":"Center" }
				});
				options.push({
					type: "checkbox",
					name: "is_right_drop",
					title: "Right align dropdown menu",
					val: 'off'
				});
				options.push({
					type: "select",
					name: "drop_bg",
					title: "Dropdown Color",
					val: "white",
					options: pix_bg
				});
				options.push({
					type: "checkbox",
					name: "dark_mode",
					title: "Light dropdown text colors",
					val: 'off'
				});
				options.push({
					type: "select",
					name: "nav_line_color",
					title: "Menu underline color (Only in desktop mode)",
					val: "",
					options: { "": "Default (Gradient)", "pix-primary-nav-line": "Primary", "pix-secondary-nav-line": "Secondary", "pix-dark-nav-line": "Dark", "pix-light-nav-line":"Light" }
				});
				// options.push({
				// 	type: "select",
				// 	name: "nav_scroll_line_color",
				// 	title: "Menu underline scroll color (Only in desktop mode)",
				// 	val: "",
				// 	options: { "": "Default (Don't change)", "blue": "Blue" }
				// });
				options.push({
					type: "select",
					name: "nav_scroll_line_color",
					title: "Menu underline scroll color (Only in desktop mode)",
					val: "",
					options: { "": "Default", "pix-gradient-scroll-nav-line": "Gradient", "pix-primary-scroll-nav-line": "Primary", "pix-secondary-scroll-nav-line": "Secondary", "pix-dark-scroll-nav-line": "Dark", "pix-light-scroll-nav-line":"Light" }
				});
				// options.push({
				// 	type: "color",
				// 	name: "nav_scroll_line_color",
				// 	title: "Menu underline scroll color (Optional, leave empty for default color)",
				// 	val: '',
				// 	// dependency: {
				// 	// 	field: "nav_line_color",
				// 	// 	val: "custom"
				// 	// }
				// });
				options.push({
					type: "select",
					name: "active_line",
					title: "Enable underline for active items",
					val: "",
					options: { "": "Disabled", "pix-nav-active-line": "Yes, only for exact active item", "pix-nav-global-active-line":"Yes, for active item or if it has an active sub item" }
				});

				options.push({
					type: "select",
					name: "menu_style",
					title: "Menu Style (Desktop Only)",
					val: "",
					options: {
						"": "Default",
						"hidden" 			: "Hidden",
					}
				});

				options.push({
					type: "select",
					name: "dropdown_angle",
					title: "Disaply angle icon for dropdown items",
					val: "",
					options: {
						"": "No (Default)",
						"yes" 			: "Yes",
					}
				});

				options.push({
					type: "select",
					name: "disable_mega",
					title: "Force Disable Megamenus",
					val: "",
					options: {"": "No (Use menu defaults)", "disable": "Yes (disable all mega menus)"}
				});

				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "fade-in",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});

			}
			if(type=="phone"){
				options.push({
					type: "text",
					name: "text",
					title: "Text",
					val: "+06 48 48 87 40"
				});
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "disabled",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});

			}
			if(type=="address"){
				options.push({
					type: "text",
					name: "text",
					title: "Text",
					val: "La Défense, Paris"
				});
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "disabled",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});

			}
			if(type=="btn"){
				options.push({
					type: "text",
					name: "text",
					title: "Text",
					val: "Default Text"
				});
				options.push({
					type: "text",
					name: "url",
					title: "Link",
					val: ""
				});
				options.push({
					type: "select",
					name: "btn_popup_id",
					title: "Open a popup instead of link",
					val: "",
					options: pix_popups
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});
				options.push({
					type: "checkbox",
					name: "secondary",
					title: "Use Secondary Font",
					val: 'off'
				});
				// options.push({
				// 	type: "select",
				// 	name: "style",
				// 	title: "Style",
				// 	val: "mx-2",
				// 	options: ['mx-1', 'mx-2', 'mx-3']
				// });
				options.push({
					type: "checkbox",
					name: "target",
					title: "Open in a new tab",
					val: 'off'
				});

				options.push({
					type: "select",
					name: "btn_style",
					title: "Button style",
					val: "",
					options: pix_btn_style
				});
				options.push({
					type: "select",
					name: "btn_color",
					title: "Button color",
					val: "light",
					options: pix_btn_colors
				});
				options.push({
					type: "select",
					name: "btn_text_color",
					title: "Text color",
					val: "",
					options: pix_text_colors
				});
				options.push({
					type: "color",
					name: "custom_btn_color",
					title: "Custom button background color",
					val: '#333',
					dependency: {
						field: "btn_color",
						val: "custom"
					}
				});
				options.push({
					type: "color",
					name: "custom_btn_text_color",
					title: "Custom button text color",
					val: '#fff',
					dependency: {
						field: "btn_color",
						val: "custom"
					}
				});
				options.push({
					type: "checkbox",
					name: "btn_rounded",
					title: "Rounded",
					val: 'off'
				});

				options.push({
					type: "icon",
					name: "btn_icon",
					title: "Icon",
					val: ""
				});
				options.push({
					type: "select",
					name: "btn_icon_position",
					title: "Icon position",
					val: "",
					options: {
						"": "Before text (left)",
						"after" 			: "After text (right)"
					}
				});

				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "disabled",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});

			}
			if(type=="link"){
				options.push({
					type: "text",
					name: "text",
					title: "Link Text",
					val: ""
				});
				options.push({
					type: "text",
					name: "url",
					title: "Link",
					val: ""
				});
				options.push({
					type: "checkbox",
					name: "target",
					title: "Open in a new tab",
					val: 'off'
				});
				options.push({
					type: "checkbox",
					name: "arrow",
					title: "Add arrow icon after the text",
					val: 'off'
				});
				options.push({
					type: "icon",
					name: "icon",
					title: "Icon (before text)",
					val: ""
				});
				options.push({
					type: "select",
					name: "animation",
					title: "Animation",
					val: "disabled",
					options: {
						"disabled": "Disabled",
						"fade-in" 			: "fade-in",
						'fade-in-down'		: 'fade-in-down',
						'fade-in-left'		: 'fade-in-left',
						'fade-in-right'		: 'fade-in-right',
						'fade-in-up'		: 'fade-in-up',
					}
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});

			}
			if(type=="space"){
				options.push({
					type: "select",
					name: "size",
					title: "Spacing",
					val: "mx-2",
					options: { "mx-1": "Small", "mx-2": "Default", "mx-3":"Big", "mx-4": "Extra Big", "flex-grow-1": "Fill all space" }
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});

			}
			if(type=="divider"){
				options.push({
					type: "select",
					name: "divider_size",
					title: "Spacing",
					val: "mx-2",
					options: { "mx-0": "none",  "mx-1": "Small", "mx-2": "Default", "mx-3":"Big", "mx-4": "Extra Big" }
				});
				options.push({
					type: "select",
					name: "divider_color",
					title: "Color",
					val: "body-default",
					options: pix_bg
				});
				// options.push({
				// 	type: "color",
				// 	name: "divider_custom_color",
				// 	title: "Custom Color",
				// 	val: '#333',
				// 	dependency: {
				// 		field: "divider_color",
				// 		val: "custom"
				// 	}
				// });
				options.push({
					type: "select",
					name: "divider_color_scroll",
					title: "Scroll Color",
					val: "body-default",
					options: pix_bg_with_default
				});
				options.push({
					type: "select",
					name: "divider_height",
					title: "Height",
					val: "full",
					options: { "": "Full height",  "pix-sm": "Small" }
				});

				options.push({
					type: "select",
					name: "permissions",
					title: "Permissions",
					val: "",
					options: {
						"": "Default (All)",
						"logged-in" 			: "Logged In Users Only",
						"logged-out" 			: "Logged Out Users Only",
					}
				});
			}
			if(type=="topbar_area"){
				options.push({
					type: "select",
					name: "background",
					title: "Background Color",
					val: "gray-1",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_background",
					title: "Custom background Color",
					val: '#333',
					dependency: {
						field: "background",
						val: "custom"
					}
				});
				options.push({
					type: "select",
					name: "color",
					title: "Text Color",
					val: "body-default",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_color",
					title: "Custom Text Color",
					val: '#333',
					dependency: {
						field: "color",
						val: "custom"
					}
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});

				options.push({
					type: "select",
					name: "style",
					title: "Style",
					val: "",
					options: { "": "Default", "border-bottom": "Line", "border-bottom-wide": "Line wide"}
				});
				options.push({
					type: "select",
					name: "line_color",
					title: "Line color",
					val: "gray-1",
					options: pix_colors_no_custom,
					dependency: {
						field: "style",
						val: "border-bottom border-bottom-wide"
					}
				});
			}
			if(type=="header_area"){
				options.push({
					type: "select",
					name: "background",
					title: "Background Color",
					val: "white",
					options: pix_bg
				});
				options.push({
					type: "select",
					name: "scroll_background",
					title: "Scroll Background Color",
					val: "white",
					options: pix_bg
				});
				options.push({
					type: "color",
					name: "scroll_custom_background",
					title: "Custom scroll background Color",
					val: '#333',
					dependency: {
						field: "scroll_background",
						val: "custom"
					}
				});
				options.push({
					type: "select",
					name: "color",
					title: "Text Color",
					val: "dark-opacity-4",
					options: pix_colors
				});

				options.push({
					type: "color",
					name: "custom_color",
					title: "Custom Text Color",
					val: '#333',
					dependency: {
						field: "color",
						val: "custom"
					}
				});
				options.push({
					type: "select",
					name: "scroll_color",
					title: "Scroll text Color",
					val: "",
					options: pix_colors_no_custom
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});

				options.push({
					type: "select",
					name: "style",
					title: "Style",
					val: "",
					options: { "": "Default", "border-bottom": "Line", "border-bottom-wide": "Line wide"}
				});


				options.push({
					type: "select",
					name: "line_color",
					title: "Line color",
					val: "gray-1",
					options: pix_colors_no_custom,
					dependency: {
						field: "style",
						val: "border-bottom border-bottom-wide"
					}
				});
				options.push({
					type: "select",
					name: "header_shadow",
					title: "Area shadow (Boxed Style Only)",
					val: "",
					options: {
						"": "Default",
						"shadow-sm": "Small shadow",
						"shadow": "Medium shadow",
						"shadow-lg": "Large shadow",
						"shadow-inverse-sm": "Inversed Small shadow",
						"shadow-inverse": "Inversed Medium shadow",
						"shadow-inverse-lg": "Inversed Large shadow",
					}
				});
			}
			if(type=="stack_area"){
				options.push({
					type: "select",
					name: "background",
					title: "Background Color",
					val: "white",
					options: pix_bg_with_custom
				});
				options.push({
					type: "color",
					name: "custom_background",
					title: "Custom background Color",
					val: '#333',
					dependency: {
						field: "background",
						val: "custom"
					}
				});

				options.push({
					type: "select",
					name: "color",
					title: "Text Color",
					val: "body-default",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_color",
					title: "Custom Text Color",
					val: '#333',
					dependency: {
						field: "color",
						val: "custom"
					}
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});

				options.push({
					type: "select",
					name: "style",
					title: "Style",
					val: "",
					options: {
						"": "Default",
						"border-top": "Top Line",
						"border-top-wide": "Top Line wide",
						"border-bottom": "Bottom Line",
						"border-bottom-wide": "Bottom Line wide",
						"border-both": "Top & Bottom Lines",
						"border-both-wide": "Top & Bottom Lines wide",
					}
				});
				options.push({
					type: "select",
					name: "line_color",
					title: "Line color",
					val: "gray-1",
					options: pix_colors_no_custom,
					dependency: {
						field: "style",
						val: "border-top border-top-wide border-bottom border-bottom-wide border-both border-both-wide"
					}
				});
			}
			if(type=="col_area"){
				options.push({
					type: "select",
					name: "align",
					title: "Elements Align",
					val: "",
					options: { "": "Default", "text-left": "Left", "text-center": "Center", "text-right": "Right", "d-flex": "Justify content between"}
				});
			}
			if(type=="m_topbar_area"){
				options.push({
					type: "select",
					name: "background",
					title: "Color",
					val: "gray-1",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_background",
					title: "Custom Color",
					val: '#333',
					dependency: {
						field: "background",
						val: "custom"
					}
				});

				options.push({
					type: "select",
					name: "color",
					title: "Text Color",
					val: "body-default",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_color",
					title: "Custom Text Color",
					val: '#333',
					dependency: {
						field: "color",
						val: "custom"
					}
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});

				options.push({
					type: "select",
					name: "style",
					title: "Style",
					val: "",
					options: { "": "Default", "border-bottom": "Line", "border-bottom-wide": "Line wide"}
				});
				options.push({
					type: "select",
					name: "line_color",
					title: "Line color",
					val: "gray-1",
					options: pix_colors_no_custom,
					dependency: {
						field: "style",
						val: "border-bottom border-bottom-wide"
					}
				});

			}
			if(type=="m_header_area"){
				options.push({
					type: "select",
					name: "background",
					title: "Background Color",
					val: "white",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_background",
					title: "Custom background Color",
					val: '#333',
					dependency: {
						field: "background",
						val: "custom"
					}
				});





				options.push({
					type: "select",
					name: "color",
					title: "Text Color",
					val: "body-default",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_color",
					title: "Custom Text Color",
					val: '#333',
					dependency: {
						field: "color",
						val: "custom"
					}
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});
				options.push({
					type: "select",
					name: "style",
					title: "Style",
					val: "",
					options: { "": "Default", "border-bottom": "Line", "border-bottom-wide": "Line wide"}
				});
				options.push({
					type: "select",
					name: "line_color",
					title: "Line color",
					val: "gray-1",
					options: pix_colors_no_custom,
					dependency: {
						field: "style",
						val: "border-bottom border-bottom-wide"
					}
				});





			}
			if(type=="m_stack_area"){


				options.push({
					type: "select",
					name: "background",
					title: "Color",
					val: "white",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_background",
					title: "Custom Color",
					val: '#333',
					dependency: {
						field: "background",
						val: "custom"
					}
				});
				options.push({
					type: "select",
					name: "color",
					title: "Text Color",
					val: "body-default",
					options: pix_colors
				});
				options.push({
					type: "color",
					name: "custom_color",
					title: "Custom Text Color",
					val: '#333',
					dependency: {
						field: "color",
						val: "custom"
					}
				});
				options.push({
					type: "checkbox",
					name: "bold",
					title: "Use Bold Text",
					val: 'on'
				});




				options.push({
					type: "select",
					name: "style",
					title: "Style",
					val: "",
					options: {
						"": "Default",
						"border-top": "Top Line",
						"border-top-wide": "Top Line wide",
						"border-bottom": "Bottom Line",
						"border-bottom-wide": "Bottom Line wide",
						"border-both": "Top & Bottom Lines",
						"border-both-wide": "Top & Bottom Lines wide",
					}
				});
				options.push({
					type: "select",
					name: "line_color",
					title: "Line color",
					val: "gray-1",
					options: pix_colors_no_custom,
					dependency: {
						field: "style",
						val: "border-top border-top-wide border-bottom border-bottom-wide border-both border-both-wide"
					}
				});






			}
			if(type=="m_col_area"){
				options.push({
					type: "select",
					name: "align",
					title: "Elements Align",
					val: "text-center",
					options: { "text-left": "Left", "text-center": "Center", "text-right": "Right"}
				});
			}

			var html = '';
			if($(el).attr('data-val')){
				$.each(JSON.parse($(el).attr('data-val')),function(i, v){
					$.each(options,function(i, o){
						if(o.name==v.name){
							o.val = v.val;
						}
						// menu align Migration
						if(o.name=='is_right_float'){
							if(o.val){
								if(o.val===true){
									o.val = 'end';
								}
							}
						}
						// -------
					});
				});
			}
			$.each(options,function(i, o){


				switch(o.type) {
				  case 'checkbox':
					  var opt = $('<input type="checkbox" class="uiswitch pix-el-settings-field large-text" />');
					  opt.attr('name', o.name);
					  if(o.val&&o.val!='off'){
						  opt.attr('checked', 'checked');
					  }
					  opt = $('<label>').append('<div class="pix_popup_label">'+ o.title + '</div>').append(opt);
					  opt = $('<div class="pix_popup_field">').append(opt);
					  opt = $('<div>').append(opt);
					  html += opt.html();
				    break;
				case 'color':
  					  var opt = $('<input type="text" value="" class="pix-color-field pix-el-settings-field" data-default-color="" />');
  					  opt.attr('name', o.name);
  					  if(o.val){
  						  opt.attr('value', o.val);
  					  }
  					  opt = $('<div>').append(opt);
  					  opt = $('<label>').append('<div class="pix_popup_label">'+ o.title + '</div>').append(opt);
  					  var classes = '';
  					  var dep = '';
  					  if(o.dependency){
  						  classes = 'pix-dependency';
  						  dep = 'data-field="'+o.dependency.field+'" data-val="'+o.dependency.val+'"';
  					  }
  					  opt = $('<div class="pix_popup_field '+classes+'" '+dep+'>').append(opt);
  					  opt = $('<div>').append(opt);
  					  html += opt.html();
  				    break;
				case 'icon':
					var opt = $('<input type="text" name="text" class="pix-el-settings-field large-text" placeholder="Icon name (Click on icon in the list)"/>');
					opt.attr('name', o.name);
					opt.attr('type', o.type);
					opt.attr('value', o.val);
					opt = $('<label>').append('<div class="pix_popup_label">'+ o.title + '</div>').append(opt);
					if(o.desc&&o.desc!=''){
						opt.append('<div class="pix-builder-desc">' + o.desc + '</div>');
					}
					opt = $('<div class="pix_popup_field pix_popup_icon_field">').append(opt);
					opt.append('<div style="pading-bottom:5px;"><input type="text" class="pix_param_icons_search" placeholder="Search..." /></div>');
					let iconsOut = '';
					iconsOut += '<div class="pix-header-builder-icons pix_param_icon_container">';

					let extraClass = '';
					if(o.val==='') extraClass = 'icon-selected';
					iconsOut += '<div data-value="" class="icon-item '+extraClass+'" title="Disable">';
					iconsOut += '</div>';

					$.each(plugin_header_object.PIX_ICONS,function(j, icon){
						// console.log(Object.keys(icon)[0]);
						extraClass = '';
						if(o.val===Object.keys(icon)[0]) extraClass = 'icon-selected';
						iconsOut += '<div class="icon-item '+extraClass+'" data-value="'+Object.keys(icon)[0]+'" title="'+Object.keys(icon)[0]+'">';

						iconsOut += '<i class="'+Object.keys(icon)[0]+'"></i>';
						iconsOut += '</div>';
					});

					iconsOut += '</div>';
					opt.append(iconsOut);

					opt = $('<div>').append(opt);
					html += opt.html();
  				    break;
				  case 'select':
					  var classes = '';
					  var dep = '';
					  if(o.dependency){
						  classes = 'pix-dependency';
						  dep = 'data-field="'+o.dependency.field+'" data-val="'+o.dependency.val+'"';
					  }
					  var opt = $('<select/>');
						for (var i in o.options) {
							var s_opt = $("<option />", {value: i, text: o.options[i]});
							if(o.val==i){
								s_opt.attr("selected","selected");
							}
							s_opt.appendTo(opt);
						    // opt.append($('<option/>').html(o[i]));
						}
					  opt.attr('name', o.name);
					  opt.attr('class', 'pix-el-settings-field pix_select');

					  opt = $('<label>').append('<div class="pix_popup_label">'+ o.title + '</div>').append(opt);
					  opt = $('<div class="pix_popup_field '+classes+'" '+dep+'>').append(opt);
					  opt = $('<div>').append(opt);
					  html += opt.html();
				    break;
				  case 'image':

					var opt = $('<input type="text" value="" class="pix-el-settings-field large-text" />');
					opt.attr('name', o.name);
					let previewID = Math.random().toString(36).substr(2, 9);
					var imgPreview = $('<img id="'+previewID+'" class="image_upload_preview" style="display:none;" title="Image Preview"/>')
					if(o.val){
						opt.attr('value', o.val);
						imgPreview.attr("src", o.val).show();
					}
					var imageBtn = $('<button class="pix_header_upload_image button button-primary">Upload Image</button> ');
					var removeBtn = $('<button class="pix_header_remove_image button button-danger">remove Image</button>');
					opt = $('<label>').append('<div class="pix_popup_label">'+ o.title + '</div>').append(opt);
					if(o.desc&&o.desc!=''){
						opt.append('<div class="pix-builder-desc">' + o.desc + '</div>');
					}
					if(imgPreview){
						opt.append(imgPreview);
					}
					opt.append(imageBtn);
					opt.append(removeBtn);
					var classes = '';
					var dep = '';
					if(o.dependency){
						classes = 'pix-dependency';
						dep = 'data-field="'+o.dependency.field+'" data-val="'+o.dependency.val+'"';
					}
					opt = $('<div class="pix_popup_field pix_image_upload_field '+classes+'" '+dep+'>').append(opt);

					opt = $('<div>').append(opt);
					html += opt.html();
				  	break;
				  default:
					  var opt = $('<input type="text" name="text" class="pix-el-settings-field large-text" />');
					  opt.attr('name', o.name);
					  opt.attr('type', o.type);
					  opt.attr('value', o.val);
					  opt = $('<label>').append('<div class="pix_popup_label">'+ o.title + '</div>').append(opt);
					  if(o.desc&&o.desc!=''){
						  opt.append('<div class="pix-builder-desc">' + o.desc + '</div>');
					  }
					  opt = $('<div class="pix_popup_field">').append(opt);

					  opt = $('<div>').append(opt);
					  html += opt.html();
				}


			});

			if(options.length>0){
				$.alert({
					title: 'Options',
					useBootstrap: false,
					 theme: 'material',
					 animation: 'bottom',
					 closeAnimation: 'top',
					content: html,
					onContentReady: function(){
						$('.pix-color-field').wpColorPicker();
						check_dep();
						$( "select, input" ).change(function() {
						  check_dep();
						});
					},
					// onClose: function(){
					// 	var temp = [];
					// 	$('body').find('.pix-el-settings-field').each(function (i, field) {
					// 		let obj = {};
					// 		obj.name = $(field).attr('name');
					// 		// console.log(obj);
					// 		if($(field).hasClass('uiswitch')){
					// 			obj.val = $(field).is(":checked");
					// 		}else if($(field).hasClass('pix_select')){
					// 			obj.val = $(field).find(":selected").val();
					// 		}else{
					// 			obj.val = $(field).val();
					// 		}
					// 		temp.push(obj);
					// 	});
					// 	$(el).attr('data-val', JSON.stringify(temp));
					// 	res.val(get_data());
					// 	console.log("DONE");
					// },
					// onAction: function(){
					// 	var temp = [];
					// 	$('body').find('.pix-el-settings-field').each(function (i, field) {
					// 		let obj = {};
					// 		obj.name = $(field).attr('name');
					// 		// console.log(obj);
					// 		if($(field).hasClass('uiswitch')){
					// 			obj.val = $(field).is(":checked");
					// 		}else if($(field).hasClass('pix_select')){
					// 			obj.val = $(field).find(":selected").val();
					// 		}else{
					// 			obj.val = $(field).val();
					// 		}
					// 		temp.push(obj);
					// 	});
					// 	$(el).attr('data-val', JSON.stringify(temp));
					// 	res.val(get_data());
					// 	console.log("DONE");
					// },
					// onDestroy: function(){
					// 	res.val(get_data());
					// },
					buttons: {
						cancel: {
				            text: 'Cancel',
							btnClass: 'btn-header-cancel',
				            action: function () {

				            }
				        },
						save: {
				            text: 'Save',
							btnClass: 'btn-header-save',
				            action: function () {
								var temp = [];
								$('body').find('.pix-el-settings-field').each(function (i, field) {
									let obj = {};
									obj.name = $(field).attr('name');
									// console.log(obj);
									if($(field).hasClass('uiswitch')){
										obj.val = $(field).is(":checked");
									}else if($(field).hasClass('pix_select')){
										obj.val = $(field).find(":selected").val();
									}else{
										obj.val = $(field).val();
									}
									temp.push(obj);
								});
								$(el).attr('data-val', JSON.stringify(temp));
								setTimeout(function(){
									res.val(get_data());
								}, 500);

				            }
				        }

				    }
				});
			}

		}

		function check_dep(){
			$('.pix-dependency').each(function(){
				var field = $(this).data('field');
				var val = $(this).data('val');
				var el = $(this).closest('.jconfirm-content').find('[name="'+field+'"]');
				var res = val.split(' ');
				// if(el.val() == val){
				if(res.includes(el.val()) ){
					$(this).show();
				}else{
					$(this).hide();
				}
			});

		}

		function get_data(){
			var data = {};
			// console.log("GET2");
			$('.pix_main_area').each(function (i, main_area) {
				var main_data = {};
				var main_data_val = {};
				main_data.name = $(this).data('name');
				if($(this).find('.pix_main_area_btn').length>0){
					// main_data.opts = $(this).find('.pix_main_area_btn:first').data('val');
					if($(this).find('.pix_main_area_btn:first').attr('data-val')){
						main_data.opts = JSON.parse($(this).find('.pix_main_area_btn:first').attr('data-val'));
					}else{
						main_data.opts = $(this).find('.pix_main_area_btn:first').data('val');
					}

					// if($(this).data('name')=='header'){
					// 	console.log($(this).find('.pix_main_area_btn:first').data('val'));
					// 	console.log($(this).find('.pix_main_area_btn:first').attr('data-val'));
					// 	console.log(JSON.parse($(this).find('.pix_main_area_btn:first').attr('data-val')));
					// }

					// if($(this).data('name')=='topbar'){
					// 	console.log($(this).find('.pix_main_area_btn:first').data('val'));
					// }
				}
				$(main_area).find('.pix_header_area').each(function (i, area) {
					var temp = [];
					var col = {};
					$(this).find('.pix_header_element').each(function (i, el) {
						// console.log('div' + index + ':' + $(this).attr('id'));
						var obj = {};
						obj.name = $(this).data('name');
						// console.log($(this).attr('data-val'));
						if($(this).data('val')){
							obj.val = JSON.parse($(this).attr('data-val'));
						}
						temp.push(obj);
						// console.log(temp);
					});
					col.name = $(this).data('name');
					col.val = temp;
					if($(this).attr('data-val')){
						// col.opts = $(this).data('val');
						col.opts = JSON.parse($(this).attr('data-val'));
						// console.log($(this).data('val'));
					}else{
						col.opts = $(this).data('val');
					}


					main_data_val[$(this).data('name')] = col;
				});
				main_data.val = main_data_val;
				data[$(this).data('name')] = main_data;
			});
			// console.log(data);
			return JSON.stringify(data);
		}



		var d_width = $('.pix_device_item.is_active').width();
		var d_height = $('.pix_device_item.is_active').height();
		$('.pix_device_placeholder').width(d_width);
		$('.pix_device_placeholder').height(d_height);
		$(".pix_devices_area").on("click", '.pix_device_item', function(e) {
			e.preventDefault();
			$('.pix_device_item').removeClass('is_active');
			$(this).addClass('is_active');
			d_width = $('.pix_device_item.is_active').width();
			d_height = $('.pix_device_item.is_active').height();
			$('.pix_device_placeholder').width(d_width);
			$('.pix_device_placeholder').height(d_height);
			var left = $('.pix_device_item.is_active').position().left;
			if($(this).hasClass('pix_mobile')){
				$('.pix_device_placeholder').css({
					'left':left
				});
				$('.pix_desktop_header').removeClass('is-active');
				$('.pix_mobile_header').addClass('is-active');
			}else{
				$('.pix_device_placeholder').css({
					'left':left
				});
				$('.pix_desktop_header').addClass('is-active');
				$('.pix_mobile_header').removeClass('is-active');
			}
			return false;
		});




   $(document).on("click", ".pix_header_remove_image", function (e) {
	   e.preventDefault();
	   var $button = $(this);
	   $button.siblings('input').val('');
	   $button.siblings('.image_upload_preview').hide();
	   return false;
   });
   $(document).on("click", ".icon-item", function (e) {
	   e.preventDefault();
	   $(this).closest('.pix_popup_icon_field').find('.pix-el-settings-field').val($(this).attr('data-value'));
	   $(this).closest('.pix-header-builder-icons').find('.icon-item').removeClass('icon-selected');
	   $(this).addClass('icon-selected');
	   return false;
   });
   $(document).on("change keydown paste input", ".pix_param_icons_search", function (e) {
   	let search = $(this).val();
   	$(this).closest('.pix_popup_icon_field').find(".icon-item").show().filter(function () {
   		return $(this).data('value').indexOf(search) < 0;
   	}).hide();

   });

   $(document).on("click", ".pix_header_upload_image", function (e) {
      e.preventDefault();
      var $button = $(this);


      // Create the media frame.
      var file_frame = wp.media.frames.file_frame = wp.media({
         title: 'Select or upload image',
         library: { // remove these to show all
            type: [ 'image' ] // specific mime
         },
         button: {
            text: 'Select'
         },
         multiple: false  // Set to true to allow multiple files to be selected
      });

      // When an image is selected, run a callback.
      file_frame.on('select', function () {
         // We set multiple to false so only get one image from the uploader

         var attachment = file_frame.state().get('selection').first().toJSON();
         $button.siblings('input').val(attachment.url);
         $button.siblings('.image_upload_preview').attr('src',attachment.url);
		 $button.siblings('.image_upload_preview').show();
      });

      // Finally, open the modal
      file_frame.open();
      return false;
   });



		// {"topbar":{
		// 	"name":"topbar",
		// 	"opts":[{
		// 		"name":"background",
		// 		"val":"gray-2"
		// 		},{"name":"custom_background",
		// 		"val":"#333"
		// 	}],
		// 	"val":{
		// 		"topbar_1":[{
		// 			"name":"text",
		// 			"opts":[{
		// 				"name":"text",
		// 				"val":"Default Text"
		// 			},{
		// 				"name":"bold",
		// 				"val":true
		// 			},{
		// 				"name":"color",
		// 				"val":"body-default"
		// 			},{
		// 				"name":"custom_color",
		// 				"val":"#333"
		// 			}],
		// 			"val":[{
		// 				"name":"text",
		// 				"val":"Default Text"
		// 			},{
		// 				"name":"bold",
		// 				"val":true
		// 			},{
		// 				"name":"color",
		// 				"val":"body-default"
		// 			},{
		// 				"name":"custom_color",
		// 				"val":"#333"
		// 			}]
		// 		}],
		// 	}},
		// 	"header":{"name":"header","opts":[{"name":"background","val":"green"},{"name":"custom_background","val":"#333"}],"val":{"header_1":[{"name":"logo"},{"name":"menu"}]}},"stack":{"name":"stack","opts":[{"name":"background","val":"yellow"},{"name":"custom_background","val":"#333"}],"val":{"stack_1":[],"stack_2":[{"name":"text","opts":[{"name":"text","val":"Default Text"},{"name":"bold","val":true},{"name":"color","val":"white"},{"name":"custom_color","val":"#333"}],"val":[{"name":"text","val":"Default Text"},{"name":"bold","val":true},{"name":"color","val":"white"},{"name":"custom_color","val":"#333"}]}],"stack_3":[]}}}

	});



})();
