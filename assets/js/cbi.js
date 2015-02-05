jQuery(document).ready(function($){
 

	$(".homeslides").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500,            // Integer: Speed of the transition, in milliseconds
		timeout: 5000,          // Integer: Time between slide transitions, in milliseconds

	});

	$(".page-slides").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500,            // Integer: Speed of the transition, in milliseconds
		timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
		pager: true,           // Boolean: Show pager, true or false
		nav: true,             // Boolean: Show navigation, true or false
		prevText: "<i class='fa fa-angle-left'></i>",   // String: Text for the "previous" button
		nextText: "<i class='fa fa-angle-right'></i>",       // String: Text for the "next" button
	});


	//MENU SLIDEOUT ON MOUSEOVER
	$('#menu-main-navigation > li.menu-item-has-children > a').mouseover(function(event) {
		$('header.home').animate({
			'background-position-x': '-250px'
		}, 400, 'swing');
		$('.active-nav').hide();
		$('#menu-main-navigation li ul').removeClass('active-nav');
		$('#menu-main-navigation li a').removeClass('hover');
		$(this).parent('li').children('ul').addClass('active-nav');
		$('.active-nav').stop().fadeIn(500);
		$(this).addClass('hover');

	});

	//MENU SLIDEIN MOUSELEAVE
	$('header.home').mouseleave(function(event){
		$('.active-nav').hide();
		$('#menu-main-navigation li a').removeClass('hover');
		$(this).animate({
			'background-position-x': '-555px'
		}, 200, 'swing');
	});

	$( "a.hover-img" )
	.mouseenter(function() {
		$( "img:first", this ).hide();
		$( "img:last", this ).show();
	})
	.mouseleave(function() {
		$( "img:first", this ).show();
		$( "img:last", this ).hide();
	});


	$( ".logo" )
	.mouseenter(function() {
		$( "img#static-blocks", this ).hide();
		$( "img#animated-blocks", this ).show();
 
	})
	.mouseleave(function() {
		$( "img#static-blocks", this ).show();
		$( "img#animated-blocks", this ).hide();
	});









});
