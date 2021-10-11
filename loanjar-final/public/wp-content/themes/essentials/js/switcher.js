/*==============================
	STYLE SWITCHER SCRIPT INSTALLATION
 ===============================*/
 
(function($) {
	"use strict";

	$(".style1" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles.css" );
		return false;
	});

	$(".style2" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-2.css" );
		return false;
	});

	$(".style3" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-3.css" );
		return false;
	});

	$(".style4" ).on("click", function(){
		$("#colors" ).attr("href", "css/styles-4.css" );
		return false;
	});

})(jQuery);

