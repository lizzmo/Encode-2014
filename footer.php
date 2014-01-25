<div class="footer"></div>
<!--WP generated footer-->
<?php wp_footer(); ?>
<!--END WP generated footer-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>

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

$(document).ready(function() {
	$container.hide();
	$overlay.hide();
	$projects.hide();
});
$(window).bind("load", function () {
	$thumbOverlay.hide();
// Clone thumbnail grid to project overlay
	var thumbnails = $grid.clone();
	$projects.html(thumbnails);
// THUMBNAIL OVERLAY
	$('.thumb').each(function () {
		var overlay = $(this).find('.thumb-overlay');
		$(this).mouseenter(function() {
			overlay.fadeIn('fast');
		});
		$(this).mouseleave(function() {
			overlay.fadeOut('slow');
		});
	});
// Projects alignment
	var topAlign = $('.header').outerHeight();
	$('.projects .grid').css('top', topAlign);
	$container.css('top', topAlign);

// Call post content
	$(function() {
	    $('.thumb a').click(function() {
	    	if($container.hasClass('closed') == true) {
	    		$container.removeClass('closed').addClass('open');
	    		$grid.fadeOut('fast');
	    		$projects.fadeOut('fast');
	    		$container.fadeIn('slow');
	    	} else if($container.hasClass('open') == true) {
	    		$projects.fadeOut('fast');
	    	}
	        var post_url = $(this).attr("href");
	        $container.html('<div class="loading"><img src="<?php bloginfo("template_url"); ?>/img/ajax-loader2.gif"></div>');
	        $container.load(post_url);
	        return false;
	    });
	});
});
// toggle projects & profile
$(function() {
	$navLinkLeft.click(function() {
		if ( $projects.is(':hidden') ) {
			$navLinkRight.removeClass('line-through');
			$profile.fadeOut('fast');
			$projects.fadeIn();
			$navLinkLeft.addClass('line-through');
		} else {
			$navLinkLeft.removeClass('line-through');
			$projects.fadeOut('fast');
		}
	});
	$navLinkRight.click(function() {
		if ( $profile.is(':hidden') ) {
			$navLinkLeft.removeClass('line-through');
			$projects.fadeOut('fast');
			$profile.fadeIn();
			$navLinkRight.addClass('line-through');
		} else {
			$navLinkRight.removeClass('line-through');
			$profile.fadeOut('fast');
		}
	});
});
$(window).resize(function () {
});
</script>
</body>
</html>
