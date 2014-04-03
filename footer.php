<div class="footer"></div>
<!--WP generated footer-->
<?php wp_footer(); ?>
<!--END WP generated footer-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider2-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fittext.js"></script>

<script type="text/javascript">
// CACHE 
var $thumbOverlay = $('.thumb-overlay');
var $overlay = $('.overlay');
var $container = $('.container');
var $projects = $('.projects');
var $profile = $('.profile');
var $grid = $('.grid');
var $navLinkLeft = $('.nav-link.left');
var $navLinkRight = $('.nav-link.right');
var $carousel = $('.carousel');
var $carousel_div = $('.carousel div');
var $carousel_img = $('.carousel img');
var $slides = $('.slides');
var $slides_img = $('.slides img');
var $prev = $('.prev');
var $next = $('.next');
var $arrow_left = $('.arrow_left');
var $arrow_right = $('.arrow_right');
var $browser_bar = $('.slides .browser-bar');
var $project_info = $('.project-info');

// Toggle Projects & Profile
$(function() {
	$navLinkLeft.click(function() {
		if ( $projects.is(':hidden') ) {
			$('.nav-link.right hr').removeClass('line-through').addClass('underline');
			$profile.fadeOut('fast');
			$projects.fadeIn();
			$('body').addClass('fixed');
			$('.nav-link.left hr').addClass('line-through').removeClass('underline');
		} else {
			$('.nav-link.left hr').removeClass('line-through').addClass('underline');
			$projects.fadeOut('fast');
			$('body').removeClass('fixed');
		}
	});
	$navLinkRight.click(function() {
		if ( $profile.is(':hidden') ) {
			$('.nav-link.left hr').removeClass('line-through').addClass('underline');
			$projects.fadeOut('fast');
			$profile.fadeIn();
			$('body').addClass('fixed');
			$('.nav-link.right hr').addClass('line-through').removeClass('underline');
		} else {
			$('.nav-link.right hr').removeClass('line-through').addClass('underline');
			$profile.fadeOut('fast');
			$('body').removeClass('fixed');
		}
	});
});

// Add current class to middle image of carousel
function highlight( items ) {
	items.filter(":eq(1)").addClass('current').fadeTo('fast', 1.0);
	items.find('.info-icon').fadeIn('fast');
	return items;
}
function unhighlight( items ) {
	items.removeClass('current').fadeTo('fast', 0.3);
	items.find('.info-icon').hide();
	return items;
}
$(document).ready(function() {
// HOLDING page positioning
	var windowHeight= $(window).height();
	var holdingMargin = ((windowHeight - $('.holding').outerHeight()) * 0.5) - 10;
	$('.holding').css('margin-top', holdingMargin);
// Overlay height 
	$('.overlay').height(windowHeight);
// HIDE layers
	$overlay.hide();
	$projects.hide();
	$('.info-overlay').hide();
	$('.info-solid').hide();
	$('.info-icon').hide();
	$('.holding-overlay').fadeOut();
	var gifMargin = (windowHeight - 34) * 0.5;
	$('.loading-gif').css('padding-top', gifMargin);
}); // ***** end doc ready *****

$(window).bind("load", function () {
// Calculate carousel dimensions
	var windowWidth = $(window).width();
	var windowHeight= $(window).height();
	if (windowHeight >= windowWidth || windowHeight <= 600) { // height greater than width OR height too short, base dimensions on width
		if (windowHeight <= 600) {
			var slideWidth = $(window).width() * 0.6; // 60% of window width
		} else {
			var slideWidth = $(window).width() * 0.8; // 80% of window width
		}
		var slideHeight = slideWidth * 0.625;
		var containerHeight = $(window).height() - $('.header').outerHeight();
		var slidePadding = Math.ceil(slideWidth * 0.03);
		var leftAlign = ($(window).width() - slideWidth) / 2;
		var paddingTop = Math.floor(slideWidth * 0.013);
		var divHeight = slideHeight + paddingTop;
		$carousel_div.css({height: divHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
		$slides.css('height', slideHeight).css('padding-top', paddingTop);
		$slides_img.css('height', slideHeight);
		$browser_bar.css('height', 'auto');
		$project_info.css({left: leftAlign, width: slideWidth, position: 'relative'});
		$('.profile-content').css('width', slideWidth).css('margin-left', leftAlign);
	} else { // height less than width but greater than 600px, base dimensions on height
		var slideHeight = ($(window).height() - ($('.header').outerHeight() + $('.project-info').outerHeight())) * 0.9;
		var slideWidth = slideHeight * 1.6;
		var containerHeight = $(window).height() - $('.header').outerHeight();
		var slidePadding = Math.ceil(slideWidth * 0.03);
		var leftAlign = ($(window).width() - slideWidth) / 2;
		var paddingTop = Math.floor(slideWidth * 0.013);
		var divHeight = slideHeight + paddingTop;
		$carousel_div.css({height: divHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
		$slides.css('height', slideHeight).css('padding-top', paddingTop);
		$slides_img.css('height', slideHeight);
		$browser_bar.css('height', 'auto');
		$project_info.css({left: leftAlign, width: slideWidth, position: 'fixed'});
		$('.profile-content').css('width', slideWidth).css('margin-left', leftAlign);
	}
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
// remove slide's title attribute
	$('.slides li').removeAttr('title');
// fade in images
	$carousel_img.fadeIn();
	var newPadding = $('.browser-bar').height();
// Animate link underlines
	$('.project-info .description a').append('<hr class="underline" />');
	$('.animated').append('<hr class="underline" />');
// show info icon of current slide
	$('.carousel .current').find('.info-icon').fadeIn('fast');
	showCurrentInfo($carousel_div);
	$(document).keyup(function (e) {
		if (e.keyCode == 37 || e.keyCode == 39) {
			setTimeout(function() {
				showCurrentInfo($carousel_div);
			}, 100);
		}
	});
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
// Thumbnail overlay
	$('.thumb').each(function () {
		var thumbOverlay = $(this).find('.thumb-overlay');
		var thumbText = $(this).find('.thumb-title');
		$(this).mouseenter(function() {
			var textHeight = thumbText.height();
			var textWidth = thumbText.width();
			var textTop = (($(this).height() - textHeight) * 0.5) - 10;
			var textLeft = (($(this).width() - textWidth) * 0.5) - 10;
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
// Fade in content
	$('.loading-overlay').fadeOut();
}); // ***** end window load *****


$(window).resize(function() {
// Carousel proportions
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	// HOLDING page positioning
	var holdingMargin = ((windowHeight - $('.holding').outerHeight()) * 0.5) - 10;
	$('.holding').css('margin-top', holdingMargin);

	if (windowHeight >= windowWidth || windowHeight <= 600) { // height greater than width OR height too short, base dimensions on width
		if (windowHeight <= 600) {
			var slideWidth = $(window).width() * 0.6; // 60% of window width
		} else {
			var slideWidth = $(window).width() * 0.8; // 80% of window width
		}
		var slideHeight = slideWidth * 0.625;
		var containerHeight = $(window).height() - $('.header').outerHeight();
		var slidePadding = Math.ceil(slideWidth * 0.03);
		var leftAlign = ($(window).width() - slideWidth) / 2;
		var paddingTop = Math.floor(slideWidth * 0.013);
		var divHeight = slideHeight + paddingTop;
		$carousel_div.css({height: divHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
		$slides.css('height', slideHeight).css('padding-top', paddingTop);
		$slides_img.css('height', slideHeight);
		$browser_bar.css('height', 'auto');
		$project_info.css({left: leftAlign, width: slideWidth, position: 'relative'});
		$('.profile-content').css('width', slideWidth).css('margin-left', leftAlign);
	} else { // height less than width but greater than 600px, base dimensions on height
		var slideHeight = ($(window).height() - ($('.header').outerHeight() + $('.project-info').outerHeight())) * 0.9;
		var slideWidth = slideHeight * 1.6;
		var containerHeight = $(window).height() - $('.header').outerHeight();
		var slidePadding = Math.ceil(slideWidth * 0.03);
		var leftAlign = ($(window).width() - slideWidth) / 2;
		var paddingTop = Math.floor(slideWidth * 0.013);
		var divHeight = slideHeight + paddingTop;
		$carousel_div.css({height: divHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
		$slides.css('height', slideHeight).css('padding-top', paddingTop);
		$slides_img.css('height', slideHeight);
		$browser_bar.css('height', 'auto');
		$project_info.css({left: leftAlign, width: slideWidth, position: 'fixed'});
		$('.profile-content').css('width', slideWidth).css('margin-left', leftAlign);
	}

	// fix for browser bar spacing
	var newPadding = $('.browser-bar').height();
	if ( paddingTop > $('.browser-bar').height() ) {	
		$slides.css('padding-top', newPadding);
	}
	// Overlay height 
	$('.overlay').height(windowHeight);

	$('.thumb').each(function () {
		var thumbText = $(this).find('.thumb-title');
		var textHeight = thumbText.height();
		var textWidth = thumbText.width();
		var textTop = (($(this).height() - textHeight) * 0.5) - 10;
		var textLeft = (($(this).width() - textWidth) * 0.5) - 10;
		thumbText.css('margin-top', textTop);
		thumbText.css('padding-left', textLeft);
	});
});
</script>
</body>
</html>
