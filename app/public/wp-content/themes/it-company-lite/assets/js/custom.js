function it_company_lite_menu_open_nav() {
	window.it_company_lite_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function it_company_lite_menu_close_nav() {
	window.it_company_lite_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
	"use strict";
	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
	});
});

jQuery(document).ready(function () {
	window.it_company_lite_currentfocus=null;
  	it_company_lite_checkfocusdElement();
	var it_company_lite_body = document.querySelector('body');
	it_company_lite_body.addEventListener('keyup', it_company_lite_check_tab_press);
	var it_company_lite_gotoHome = false;
	var it_company_lite_gotoClose = false;
	window.it_company_lite_responsiveMenu=false;
 	function it_company_lite_checkfocusdElement(){
	 	if(window.it_company_lite_currentfocus=document.activeElement.className){
		 	window.it_company_lite_currentfocus=document.activeElement.className;
	 	}
 	}
 	function it_company_lite_check_tab_press(e) {
		"use strict";
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.it_company_lite_responsiveMenu){
			if (!e.shiftKey) {
				if(it_company_lite_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				it_company_lite_gotoHome = true;
			} else {
				it_company_lite_gotoHome = false;
			}

		}else{

			if(window.it_company_lite_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.it_company_lite_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.it_company_lite_responsiveMenu){
				if(it_company_lite_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					it_company_lite_gotoClose = true;
				} else {
					it_company_lite_gotoClose = false;
				}
			
			}else{

			if(window.it_company_lite_responsiveMenu){
			}}}}
		}
	 	it_company_lite_checkfocusdElement();
	}
});

jQuery(function($){
	new WOW().init();
});

(function( $ ) {

	jQuery('document').ready(function($){
	    setTimeout(function () {
    		jQuery("#preloader").fadeOut("slow");
	    },1000);
	});

	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});

	$(document).ready(function () {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});

		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});
	});
	
})( jQuery );