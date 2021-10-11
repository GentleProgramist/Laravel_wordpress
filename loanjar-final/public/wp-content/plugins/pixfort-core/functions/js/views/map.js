(function ( $ ) {
	'use strict';
	if(window.InlineShortcodeView){
	    // This name is defined automatically (InlineShortcodeView_you, for Frontend editor only
	    window.InlineShortcodeView_pix_map = window.InlineShortcodeView.extend({
	    	// Render called every time when some of attributes changed.
	    	render: function () {
	            // console && console.log('InlineShortcodeView_pix_map: render called.');
	    		window.InlineShortcodeView_pix_map.__super__.render.call(this); // it is recommended to call parent method to avoid new versions problems.
	            // vc.frame_window.init_pix_maps(this.$el);
	            vc.frame_window.pixLoadMaps(this.$el);
	    		return this;
	    	},

	    	updated: function () {
	            // console && console.log('InlineShortcodeView_pix_map: updated called.');
	    		window.InlineShortcodeView_pix_map.__super__.updated.call(this);
	            // vc.frame_window.init_pix_maps(this.$el);
	            vc.frame_window.pixLoadMaps(this.$el);
	            return this;
	    	},
	    	parentChanged: function () {
	            // console && console.log('InlineShortcodeView_pix_map: parentChanged called.');
	    		window.InlineShortcodeView_pix_map.__super__.parentChanged.call(this);
	    	}

	    });
	}

})( window.jQuery );
