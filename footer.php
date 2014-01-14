<div class="footer"></div>
<!--WP generated footer-->
<?php wp_footer(); ?>
<!--END WP generated footer-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>

<script type="text/javascript">
// CACHE 
var $overlay = $('.overlay');
var $container = $('.container');

// call post content
$(function() {
    $('.thumb a').click(function() {
    	if($container.hasClass('closed') == true) {
    		$container.removeClass('closed').addClass('open');
    		$container.slideDown('slow');
    	} else if($container.hasClass('open') == true) {
    	}
        var post_url = $(this).attr("href");
        $container.html('<div class="loading"><img src="<?php bloginfo("template_url"); ?>/img/ajax-loader.gif"></div>');
        $container.load(post_url);
        return false;
    });
});

$(document).ready(function() {
	$container.hide();
});
$(window).bind("load", function () {
	$overlay.hide();
// THUMBNAIL OVERLAY
	$('.thumb').each(function () {
		var overlay = $(this).find('.overlay');
		$(this).mouseenter(function() {
			overlay.fadeIn('fast');
		});
		$(this).mouseleave(function() {
			overlay.fadeOut('slow');
		});
	});
});
$(window).resize(function () {
});
</script>
</body>
</html>
