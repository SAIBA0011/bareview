(function($) {

"use strict";

$(document).ready(function() {
	


	// Input placeholder fallback
	$('input, textarea').placeholder();


	$('.flexslider').flexslider({
		selector: ".slides > .review",
		directionNav: false,
		slideshow: true,
		slideshowSpeed: 5000,
		animationLoop: true,
		animation: "slide",
		direction: "horizontal"
	});

	/* Header
	------------------*/
	var topMenu = $('#menu'),
			topMenuHeight = topMenu.outerHeight(), // include padding&margin, if .outerHeight(true), only padding
			menuItems = topMenu.find('a[href*="#"]'),

			scrolledItems = menuItems.map( function() {
				var item = $( $(this).attr('href') );
				if ( item.length ) { return item; }
			});


	// Scroll to section
	menuItems.click( function( e ) {

		var hrefVal = $(this).attr('href'),
				offsetTop = hrefVal === '#' ? 0 : $(hrefVal).offset().top - topMenu.outerHeight();

		// mobile
		var w = $(window).width();
		if ( w < 768 ){
			offsetTop = hrefVal === '#' ? 0 : $(hrefVal).offset().top - 60;
		}

		$('html, body').stop().animate({ scrollTop: offsetTop }, 800);

		// close mobile menu when item is clicked
		if ( $(window).width() < 768 ) {
			$('#menu-toggle').toggleClass('open');
			$('#menu').slideToggle(400);
		}

	}); // menuItems.click( function( e )

	// Scroll to 'purchase' section
	$('.purchase-button').click( function( e ) {
		var hrefVal = $(this).attr('href'),
				hash = hrefVal.substr(hrefVal.indexOf("#")),
				offsetTop = $(hrefVal).offset().top - topMenu.outerHeight();


		if ( hrefVal.indexOf('#') === 0 ) {
			e.preventDefault();
		}

		
		$('html, body').stop().animate({ scrollTop: offsetTop }, 800);
	});

	
	$(window).scroll( function() {

		// Change .active menu item on scroll
		var fromTop = $(this).scrollTop() + topMenuHeight,

				// return menu item as object when scrolled into view
				itemsScrolled = scrolledItems.map( function(){
					if ( $(this).offset().top - 1 < fromTop ) // -1 so that menuItem detects using click event
					return this;
				});

		var scrolledItem = itemsScrolled[itemsScrolled.length - 1]; // index starts from 0...

		var id = scrolledItem && scrolledItem.length ? scrolledItem[0].id : '';

		menuItems
			.parent().removeClass('active')
			.end()
			.filter('[href="#' + id + '"]').parent().addClass('active');


		// Scale down header
		if ( $(this).scrollTop() < 500 ) {
			$('#header').removeClass('scaled-down');
		} else {
			$('#header').addClass('scaled-down');
		}

		if ( $(window).scrollTop() < 1000 ) {
			$('#back-to-top').fadeOut();
		} else {
			$('#back-to-top').fadeIn();
		}
	}); // $(window).scroll( function()


	// Mobile Menu Toggle
	$('#menu-toggle').click( function( e ) {
		e.preventDefault();
		$(this).toggleClass('open');
		$('#menu').slideToggle(400);
	});
	
	/*------------------
	End Header */
	

	/* Footer
	------------------*/
	// back to top
	$('#back-to-top').click( function( e ) {
		e.preventDefault();

		$('html, body').animate({ scrollTop: 0 }, 800);
	});


	/* Contact Form
	------------------*/
	


});
}(jQuery));