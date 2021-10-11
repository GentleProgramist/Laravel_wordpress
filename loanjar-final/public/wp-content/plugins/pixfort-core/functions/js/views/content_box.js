(function ( $ ) {
	'use strict';
	if(window.InlineShortcodeView){
	    // This name is defined automatically (InlineShortcodeView_you, for Frontend editor only
	    window.InlineShortcodeView_content_box = window.InlineShortcodeViewContainer.extend({
	    	// Render called every time when some of attributes changed.
	    	render: function () {
	            // console && console.log('InlineShortcodeView_content_box: render called.');
	    		window.InlineShortcodeView_content_box.__super__.render.call(this); // it is recommended to call parent method to avoid new versions problems.
				// _.bindAll( this);
				vc.frame_window.destroy_Parallax();
	            vc.frame_window.init_Parallax();
	            vc.frame_window.init_scroll_rotate(this.$el);
	    		return this;
	    	},

	    	updated: function () {
	    		window.InlineShortcodeView_content_box.__super__.updated.call(this);
	            vc.frame_window.destroy_Parallax();
	            vc.frame_window.init_Parallax();
	            vc.frame_window.init_scroll_rotate(this.$el);
	            return this;
	    	},
	    	parentChanged: function () {
	    		window.InlineShortcodeView_content_box.__super__.parentChanged.call(this);
	    	}
	    });
	}

})( window.jQuery );
