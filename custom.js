// Cache 
var $body = $('body');
var $overlay = $('.overlay');
var $container = $('.container');
var $projects = $('.projects');
var $profile = $('.profile');
var $navLinkLeft = $('.nav-link.left');
var $navLinkRight = $('.nav-link.right');
var $navLeft_hr = $('.nav-link.left hr');
var $navRight_hr = $('.nav-link.right hr');
var $carousel = $('.carousel');
var $carousel_div = $('.carousel div');
var $carousel_img = $('.carousel img');
var $carousel_nav = $('.carousel-nav');
var $slides = $('.slides');
var $slides_img = $('.slides img');
var $browser_bar = $('.slides .browser-bar');
var $project_info = $('.project-info');
var $browser_bar = $('.browser-bar');
var $holding = $('.holding');
var $prev = $('.prev');
var $next = $('.next');

// Calculate carousel dimensions
	function widthBased(windowWidth, windowHeight) {
		var slideWidth;
		if (windowHeight <= 600 && windowWidth > 400) {
			slideWidth = windowWidth * 0.6; // 60% of window width
		} else {
			slideWidth = windowWidth * 0.8; // 80% of window width
		}
		var slideHeight = slideWidth * 0.625;
		var slidePadding = Math.ceil(slideWidth * 0.03);
		var leftAlign = (windowWidth - slideWidth) / 2;
		var paddingTop = Math.floor(slideWidth * 0.013);
		var divHeight = slideHeight + paddingTop;
		$carousel_div.css({height: divHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
		$slides.css({width: slideWidth, height: slideHeight}).css('padding-top', paddingTop);
		$slides_img.css('height', slideHeight);
		$browser_bar.css('height', 'auto');
		$project_info.css({left: leftAlign, width: slideWidth, position: 'relative'});
		// fix for browser bar spacing
		var newPadding = $browser_bar.height();
		if ( paddingTop > $browser_bar.height() ) {
			$slides.css('padding-top', newPadding);
		}
	}
	function heightBased(windowWidth, windowHeight) {
		var slideHeight = (windowHeight - ($('.header').outerHeight() + $project_info.outerHeight())) * 0.9;
		var slideWidth = slideHeight * 1.6;
		var slidePadding = Math.ceil(slideWidth * 0.03);
		var leftAlign = (windowWidth - slideWidth) / 2;
		var paddingTop = Math.floor(slideWidth * 0.013);
		var divHeight = slideHeight + paddingTop;
		$carousel_div.css({height: divHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
		$slides.css({width: slideWidth, height: slideHeight}).css('padding-top', paddingTop);
		$slides_img.css('height', slideHeight);
		$browser_bar.css('height', 'auto');
		$project_info.css({left: leftAlign, width: slideWidth, position: 'fixed'});
		// fix for browser bar spacing
		var newPadding = $browser_bar.height();
		if ( paddingTop > $browser_bar.height() ) {
			$slides.css('padding-top', newPadding);
		}
	}
// Home slideshow
	function homeSlideshow(windowWidth, windowHeight) {
		if (windowHeight < windowWidth && windowHeight >= 601) { // landscape, 601px or more
			var homeHeight = windowHeight - $('.header').outerHeight();
			var homeWidth = homeHeight * 1.6;
			if (homeWidth >= (windowWidth * 0.8)) { // if slideshow is wider than window, do width-based calc
				if (windowHeight <= 600) {
					homeWidth = windowWidth * 0.6; // 60% of window width
				} else {
					homeWidth = windowWidth * 0.8; // 80% of window width
				}
				var homeHeight = homeWidth * 0.625;
			}
			$('.slideshow').css({height: homeHeight, width: homeWidth});
			$('.slide-images').css({height: homeHeight, width: homeWidth});
		} else { // portrait
			var homeWidth;
			if (windowHeight <= 600) {
				homeWidth = windowWidth * 0.6; // 60% of window width
			} else {
				homeWidth = windowWidth * 0.8; // 80% of window width
			}
			var homeHeight = homeWidth * 0.625;
			$('.slideshow').css({height: homeHeight, width: homeWidth});
			$('.slide-images').css({height: homeHeight, width: homeWidth});
		}
	}
// Carousel nav button width
	function carouselBtnWidth(container) {
		var theWidth = container.children().width();
		var btnWidth = ($(window).width() - theWidth) / 2;
		var btnHeight = container.height();
		$carousel_nav.css({width: btnWidth, height: btnHeight});
	}
// Add current class to middle image of carousel
	function highlight( items ) {
		items.filter(":eq(1)").addClass('current').fadeTo('fast', 1.0);
		items.find('.info-icon').fadeIn('fast');
		items.find('.flex-control-paging').fadeIn('fast');
		return items;
	}
	function unhighlight( items ) {
		items.removeClass('current').fadeTo('fast', 0.3);
		items.find('.info-icon').hide();
		items.find('.flex-control-paging').hide();
		return items;
	}
// Show info icon of active slide
	function showCurrentInfo(carouselDiv) {
		carouselDiv.each(function() {
			if($(this).hasClass('current')) {
				$(this).find('.info-icon').fadeIn('fast');
				$(this).find('.flex-control-paging').fadeIn('fast');
			} else {
				$(this).find('.info-icon').hide();
				$(this).find('.flex-control-paging').hide();
			}
		});
	}


// Loading gif position
	var windowHeight= $(window).height();
	var gifMargin = (windowHeight - 34) * 0.5;
	$('.loading-gif').css('padding-top', gifMargin).fadeIn('fast');

// Toggle Projects & Profile
	if(WURFL.is_mobile === false) { // animated underline for desktops only
		$navLinkLeft.click(function() { // click PROJECTS
			if ( $projects.is(':hidden') ) {
				$navRight_hr.removeClass('line-through').addClass('underline');
				$profile.fadeOut('fast');
				$projects.fadeIn();
				$body.addClass('fixed');
				$navLeft_hr.addClass('line-through').removeClass('underline');
			} else {
				$navLeft_hr.removeClass('line-through').addClass('underline');
				$projects.fadeOut('fast');
				$body.removeClass('fixed');
			}
		});
		$navLinkRight.click(function() { // click PROFILE
			if ( $profile.is(':hidden') ) {
				$navLeft_hr.removeClass('line-through').addClass('underline');
				$projects.fadeOut('fast');
				$profile.fadeIn();
				$body.addClass('fixed');
				$navRight_hr.addClass('line-through').removeClass('underline');
			} else {
				$navRight_hr.removeClass('line-through').addClass('underline');
				$profile.fadeOut('fast');
				$body.removeClass('fixed');
			}
		});
	} else {
		$('.underline').remove();
		$('a').removeClass('animated');
		$navLinkLeft.click(function() {
			if ( $projects.is(':hidden') ) {
				$profile.fadeOut('fast');
				$projects.fadeIn();
				$body.addClass('fixed');
			} else {
				$projects.fadeOut('fast');
				$body.removeClass('fixed');
			}
		});
		$navLinkRight.click(function() {
			if ( $profile.is(':hidden') ) {
				$projects.fadeOut('fast');
				$profile.fadeIn();
				$body.addClass('fixed');
			} else {
				$profile.fadeOut('fast');
				$body.removeClass('fixed');
			}
		});
	}

// Close overlays by clicking container
function profileHandler(event) {
	var target = $(event.target);
	if(!target.parents('.profile').length > 0) {
		$navRight_hr.removeClass('line-through').addClass('underline');
		$profile.fadeOut('fast');
		$body.removeClass('fixed');
		console.log('Close Profile');
	}
}
$('.profile').click(profileHandler);
function projectsHandler(event) {
	var target = $(event.target);
	if(!target.parents('.projects').length > 0) {
		$navLeft_hr.removeClass('line-through').addClass('underline');
		$projects.fadeOut('fast');
		$body.removeClass('fixed');
		console.log('Close Projects');
	}
}
$('.projects').click(projectsHandler);

$(document).ready(function() {
	// HOLDING page positioning
		var windowHeight= $(window).height();
		var holdingMargin = ((windowHeight - $holding.outerHeight()) * 0.5) - 10;
		$holding.css('margin-top', holdingMargin);
	// Overlay height 
		$('.overlay').height(windowHeight);
	// HIDE layers
		$overlay.hide();
		$projects.hide();
		$('.info-overlay').hide();
		$('.info-solid').hide();
		$('.info-icon').hide();
		$('.holding-overlay').fadeOut();
});

$(window).bind("load", function () {
	// CAROUSEL SLIDES
		var windowWidth = $(window).width();
		var windowHeight= $(window).height();
		console.log(windowWidth+', '+windowHeight);
		if (windowHeight < windowWidth && windowHeight >= 601) { // landscape, 601px or more
			heightBased(windowWidth,windowHeight);
		} else {
			widthBased(windowWidth,windowHeight);
		}
		homeSlideshow(windowWidth, windowHeight);

	// flexSlider
		$carousel_div.each(function() {
			$(this).flexslider({
				directionNav: false,
				slideshowSpeed: 8000,
				start: function(slider) {
					$slides_img.click(function(event){
						event.preventDefault();
						slider.flexAnimate(slider.getTarget("next"));
					});
				}
			});
		});
		$('.flex-control-paging li a').html('<span class="dot"></span>');
		// HOME
		$('.slideshow').flexslider({
			directionNav: false,
			controlNav: false,
			slideshowSpeed: 5000,
			selector: ".slide-images > li",
		});
	// carouFredSel
		$carousel.carouFredSel({
			width: '100%',
			items: {
				visible: 3,
				start: -1,
				minimum: 1,
				width: 'variable',
				height: 'variable'
			},
			scroll: {
				items: 1,
				duration: 500,
				timeoutDuration: 8000,
				onBefore: function( data ) {
					unhighlight( data.items.old );
					highlight( data.items.visible );
				}
			},
			auto: {
				play: false
			},
			prev: {
				button: '.prev',
				key: 'left'
			},
			next: {
				button: '.next',
				key: 'right'
			}
		});
		$slides_img.each(function() {
			var imgWidth = $(this).width();
			var imgHeight = $(this).height();
			if( imgWidth > imgHeight && imgWidth > 1080 ) { // if image width is greater than its height AND greater than slide width
				var widthDif = (550 - imgWidth) / 2; // subtract image width from slide width and divide by two
				$(this).css('margin-left', widthDif);
			}
		});
		carouselBtnWidth($carousel);
		$('.caroufredsel_wrapper').css('z-index', '1');
	// remove slide's title attribute
		$('.slides li').removeAttr('title');
	// fade in images
		$carousel_img.fadeIn();
	// Animate link underlines
		if(WURFL.is_mobile === false) {
			$('.project-info .description a').append('<hr class="underline" />');
			$('.animated').append('<hr class="underline" />');
		}
	// show info icon of current slide
		$('.carousel .current').find('.info-icon').fadeIn('fast');
		showCurrentInfo($carousel_div);
		$(document).keyup(function (e) {
			if (e.keyCode === 37 || e.keyCode === 39) {
				setTimeout(function() {
					showCurrentInfo($carousel_div);
				}, 100);
			}
		});
	// Enable carousel SWIPE nav
		$carousel.swipe( {
			swipeRight:function() {
				$('.carousel-nav.prev').trigger('click');
				setTimeout(function() {
					showCurrentInfo($carousel_div);
				}, 100);
			},
			swipeLeft:function() {
				$('.carousel-nav.next').trigger('click');
				setTimeout(function() {
					showCurrentInfo($carousel_div);
				}, 100);
			}
		});
	// Thumbnail overlay
		var borderWidth;
		var borderHeight;
		if(windowWidth > 850) {
			borderWidth = ((windowWidth * 0.95) * 0.31) - 9;
			borderHeight = (((windowWidth * 0.95) * 0.31) * 0.70) - 10;
		} else {
			borderWidth = ((windowWidth * 0.95) * 0.46) - 9;
			borderHeight = (((windowWidth * 0.95) * 0.46) * 0.70) - 10;
		}
		$('.thumb-border').css({ width: borderWidth, height: borderHeight });
		$('.thumb').each(function () {
			var thumbOverlay = $(this).find('.thumb-overlay');
			var thumbText = $(this).find('.thumb-title');
			$(this).mouseenter(function() {
				var textHeight = thumbText.height();
				var textWidth = thumbText.width();
				var textTop;
				var textLeft;
				if(windowWidth >= 535) {
					textTop = (($(this).height() - textHeight) * 0.5) - 5;
					textLeft = (($(this).width() - textWidth) * 0.5) - 5;
				} else {
					textTop = (($(this).height() - textHeight) * 0.5) - 5;
					textLeft = (($(this).width() - textWidth) * 0.5) - 5;
				}
				thumbText.css('margin-top', textTop);
				thumbText.css('padding-left', textLeft);
				thumbOverlay.animate({ opacity: 0.80 }, 100);
				thumbText.animate({ opacity: 1.0 }, 100);
			});
			$(this).mouseleave(function() {
				thumbOverlay.animate({ opacity: 0 }, 250);
				thumbText.animate({ opacity: 0 }, 250);
			});
		});
	// CUSTOM ARROWS
		if(WURFL.is_mobile === false ) {
			// target IE 11
			var isIE11 = !!navigator.userAgent.match(/Trident.*rv[ :]*11\./);
			// target IE 10
			var isIE10 = false;
			if (Function('/*@cc_on return /^10/.test(@_jscript_version) @*/')()) {
				isIE10 = true;
			}
			//if(isIE11 === true) { $('html').addClass('ie'); } // used for CSS as well
			if(isIE10 === true) { $('html').addClass('ie'); }
			if ($('html').hasClass('ie')) {
				// for IE use .cur
				$prev.css("cursor", "url('http://encode-design.com/wp-content/themes/encode_theme/img/leftwhitearrow.cur'), none");
				$next.css("cursor", "url('http://encode-design.com/wp-content/themes/encode_theme/img/rightwhitearrow.cur'), none");
			} else { // all other browsers use .png
				$prev.mouseenter(function() {
					$(".left-white").show();
				}).mouseleave(function() {
					$(".left-white").hide();
				});
				$prev.mousemove(function(e){
					var centerX = e.pageX - 15;
					var centerY = e.pageY - 30;
					$(".left-white").css({left:centerX, top:centerY});
				});
				$next.mouseenter(function() {
					$(".right-white").show();
				}).mouseleave(function() {
					$(".right-white").hide();
				});
				$next.mousemove(function(e){
					var centerX = e.pageX - 15;
					var centerY = e.pageY - 30;
					$(".right-white").css({left:centerX, top:centerY});
				});
			}
		}
	// Projects alignment
		var topAlign = $('.header').outerHeight();
		$('.projects .grid').css('top', topAlign);
		$('.profile-content').css('top', topAlign);
		$container.css('top', topAlign);
	// toggle info overlay
		$('.info-icon').click(function() {
			$('.info-overlay').fadeToggle('fast');
			$('.info-outline').fadeToggle('fast');
			$('.info-solid').fadeToggle('fast');
		});
		// toggle with up and down arrows
		$(document).keydown(function(e){
			if (e.keyCode == 38) { // up arrow, 
				$('.info-overlay').fadeIn('fast');
				$('.info-outline').fadeOut('fast');
				$('.info-solid').fadeIn('fast');
				return false;
			}
			if (e.keyCode == 40) { // up arrow, 
				$('.info-overlay').fadeOut('fast');
				$('.info-outline').fadeIn('fast');
				$('.info-solid').fadeOut('fast');
				return false;
			}
		});
	// Fade in content
		$('.loading-overlay').fadeOut();
});

if(WURFL.is_mobile === true) {
	// Reload page when orientation changes
	/*function doOnOrientationChange() {
		switch(window.orientation) {  
			case -90:
			case 90:
			alert('landscape');
			break; 
			default:
			alert('portrait');
			break; 
		}
	}
	window.addEventListener('orientationchange', doOnOrientationChange);*/

	$(window).on( 'orientationchange', function(event) {
		if(event.orientation === 'landscape') {
			$('.caroufredsel_wrapper').hide();
			$project_info.hide();
			location.reload();
		}
	});
}

$(window).resize(function() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	// HOLDING page positioning
	var holdingMargin = ((windowHeight - $holding.outerHeight()) * 0.5) - 10;
	$holding.css('margin-top', holdingMargin);

	// carousel dimensions
	if (windowHeight < windowWidth && windowHeight  >= 601) { // landscape, 601px or more
		heightBased(windowWidth,windowHeight);
	} else {
		widthBased(windowWidth,windowHeight);
	}
	homeSlideshow(windowWidth, windowHeight)

	// Overlay height 
	$('.overlay').height(windowHeight);
	var borderWidth;
	var borderHeight;
	if(windowWidth > 850) {
		borderWidth = ((windowWidth * 0.95) * 0.31) - 9;
		borderHeight = (((windowWidth * 0.95) * 0.31) * 0.70) - 10;
	} else {
		borderWidth = ((windowWidth * 0.95) * 0.46) - 9;
		borderHeight = (((windowWidth * 0.95) * 0.46) * 0.70) - 10;
	}
	$('.thumb-border').css({ width: borderWidth, height: borderHeight });

	$('.thumb').each(function () {
		var thumbText = $(this).find('.thumb-title');
		var textHeight = thumbText.height();
		var textWidth = thumbText.width();
		var textTop;
		var textLeft;
		if(windowWidth >= 535) {
			textTop = (($(this).height() - textHeight) * 0.5) - 5;
			textLeft = (($(this).width() - textWidth) * 0.5) - 5;
		} else {
			textTop = (($(this).height() - textHeight) * 0.5) - 5;
			textLeft = (($(this).width() - textWidth) * 0.5) - 5;
		}
		thumbText.css('margin-top', textTop);
		thumbText.css('padding-left', textLeft);
	});
	carouselBtnWidth($carousel);
});