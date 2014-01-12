
<div class="footer"></div>
<!--WP generated footer-->
<?php wp_footer(); ?>
<!--END WP generated footer-->
<script type="text/javascript">
jQuery(function()
{
    jQuery(".thumb a").click(function(){ //here I select the links of the widget
        var post_url = jQuery(this).attr("href");
        jQuery(".carousel").html('<div class="loading"><img src="<?php bloginfo("template_url"); ?>/img/ajax-loader.gif"></div>');
        jQuery(".carousel").load(post_url);
        return false;
    });
});

$overlay = $('.overlay');

$(document).ready(function() {
});
$(window).bind("load", function () {
	$overlay.hide();
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
