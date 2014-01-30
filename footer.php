<div class="footer"></div>
<!--WP generated footer-->
<?php wp_footer(); ?>
<!--END WP generated footer-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.min.js"></script>

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
var $slides = $('.slides');
var $slides_img = $('.slides img');
var $browser_bar = $('.slides .browser-bar');
var $project_info = $('.project-info');

// toggle projects & profile
$(function() {
	$navLinkLeft.click(function() {
		if ( $projects.is(':hidden') ) {
			$('.nav-link.right hr').removeClass('line-through').addClass('underline');
			$profile.fadeOut('fast');
			$projects.fadeIn();
			$('.nav-link.left hr').addClass('line-through').removeClass('underline');
		} else {
			$('.nav-link.left hr').removeClass('line-through').addClass('underline');
			$projects.fadeOut('fast');
		}
	});
	$navLinkRight.click(function() {
		if ( $profile.is(':hidden') ) {
			$('.nav-link.left hr').removeClass('line-through').addClass('underline');
			$projects.fadeOut('fast');
			$profile.fadeIn();
			$('.nav-link.right hr').addClass('line-through').removeClass('underline');
		} else {
			$('.nav-link.right hr').removeClass('line-through').addClass('underline');
			$profile.fadeOut('fast');
		}
	});
});

$(document).ready(function() {
	$container.hide();
	$overlay.hide();
	$projects.hide();
});
$(window).bind("load", function () {
	//$thumbOverlay.hide();
// Clone thumbnail grid to project overlay
	var thumbnails = $grid.clone();
	$projects.html(thumbnails);
// THUMBNAIL OVERLAY
	/*$('.thumb').each(function () {
		var overlay = $(this).find('.thumb-overlay');
		$(this).mouseenter(function() {
			overlay.fadeIn('fast');
		});
		$(this).mouseleave(function() {
			overlay.fadeOut('slow');
		});
	});*/
// Projects alignment
	var topAlign = $('.header').outerHeight();
	$('.projects .grid').css('top', topAlign);
	$container.css('top', topAlign);

// Call post content
	$(function() {
		$('.thumb a').click(function() {
			$navLinkLeft.removeClass('line-through');
			if($container.hasClass('closed') === true) {
				$container.removeClass('closed').addClass('open');
				$grid.fadeOut('fast');
				$projects.fadeOut('fast');
				$container.fadeIn('slow');
			} else if($container.hasClass('open') === true) {
				$projects.fadeOut('fast');
			}
			var post_url = $(this).attr("href");
			$container.html('<div class="loading"><img src="<?php bloginfo("template_url"); ?>/img/ajax-loader2.gif"></div>');
			$container.load(post_url);
			return false;
		});
	});
});

// resize carousel
$(function() {
	$(window).resize(function() {
	// Carousel proportions
		var windowWidth = $(window).width();
		var windowHeight = $(window).height();
		if ( windowWidth <= windowHeight ) {
			var slideWidth2 = $(window).width() * 0.8; // 80% of window width
			var slideHeight2 = slideWidth2 * 0.625;
			var containerHeight2 = $(window).height() - $('.header').outerHeight();
			var slidePadding2 = Math.ceil(slideWidth2 * 0.03);
			var leftAlign2 = ($(window).width() - slideWidth2) / 2;
			var paddingTop2 = Math.ceil(slideWidth2 * 0.013);
			$container.height(containerHeight2);
			$carousel.height(slideHeight2 + slidePadding2);
			$carousel_div.css({height: slideHeight2, width: slideWidth2}).css('padding-left', slidePadding2).css('padding-right', slidePadding2);
			$slides.css('height', slideHeight2).css('padding-top', paddingTop2);
			$slides_img.css('height', slideHeight2);
			$browser_bar.css('height', paddingTop2);
			$project_info.css({left: leftAlign2, width: slideWidth2});
		/*} else if ( windowHeight >= 480) {	
			// for small screens / mobile devices */
		} else { // width > height
			var slideHeight3 = ($(window).height() - ($('.header').outerHeight() + $('.project-info').outerHeight())) * 0.9;
			var slideWidth3 = slideHeight3 * 1.6;
			var containerHeight3 = $(window).height() - $('.header').outerHeight();
			var slidePadding3 = Math.ceil(slideWidth3 * 0.03);
			var leftAlign3 = ($(window).width() - slideWidth3) / 2;
			var paddingTop3 = Math.ceil(slideWidth3 * 0.013);
			$container.height(containerHeight3);
			$carousel.height(slideHeight3 + slidePadding3);
			$carousel_div.css({height: slideHeight3, width: slideWidth3}).css('padding-left', slidePadding3).css('padding-right', slidePadding3);
			$slides.css('height', slideHeight3).css('padding-top', paddingTop3);
			$slides_img.css('height', slideHeight3);
			$browser_bar.css('height', paddingTop3);
			$project_info.css({left: leftAlign3, width: slideWidth3});
		}
		// don't let description and credits overlap
		if ( windowWidth > windowHeight && windowHeight <= 600 ) {
			$('.project-info').css('min-width', '500px'); // ************** NEEDS WORK *************
		}

		// fix for browser bar spacing
		var newPadding = $('.browser-bar').height();
		if ( paddingTop2 > $('.browser-bar').height() ) {	
			$slides.css('padding-top', newPadding);
		}
		if ( paddingTop3 > $('.browser-bar').height() ) {	
			$slides.css('padding-top', newPadding);
		}
	}).resize();
});
$(window).resize(function () {
	var windowWidth2 = $(window).width();	
	if ( windowWidth2 <= 535 ) {
			var newWidth = $('.slides').width();
			$('.project-info').css('width', newWidth);
	}
});
</script>
</body>
</html>
