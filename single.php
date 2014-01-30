<?php while ( have_posts() ) : the_post(); ?>
		<div class="carousel">
			<?php // get FEATURED posts
			$post_slug = $post->post_name;
			$featured_posts = get_posts('posts_per_page=-1&numberposts=-1&tag='.$post_slug.'&orderby=post_date&order=ASC');
			if (!empty($featured_posts)) {
				foreach ($featured_posts as $post) {
					$postTitle = $post->post_title;
					$featuredID = $post->ID; 
					$featuredVideo = get_post_meta($featuredID, 'VIDEO', true); // check for video
					$array = array( 'post_type' => 'attachment', 'post_mime_type' => 'image', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_parent' => $featuredID );
					$featuredImages = get_posts( $array ); // check for images
					if (!empty($featuredVideo)) { // show video ?>
						<div>
							<ul class="slides">
								<li id="<?php echo $catTitle; ?>" title="<?php echo $postTitle; ?>">
									<iframe src="http://player.vimeo.com/video/<?php echo $featuredVideo; ?>?portrait=0&loop=0" width="100%" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>	
								</li>
							</ul>
						</div>
					<?php } else if (!empty($featuredImages)) { // if no video, show image ?>
						<div>
							<ul class="slides">
								<img src="<?php bloginfo('template_url'); ?>/img/browser-bar.jpg" class="browser-bar">
								<span class="tooltip-overlay" title="<?php echo $post->post_content; ?>"></span>
								<?php foreach ($featuredImages as $image) {
									$imageID = $image->ID;
									$imageSrc = wp_get_attachment_image_src( $imageID, 'large' ); ?>
									<li id="<?php echo $catTitle; ?>" title="<?php echo $postTitle; ?>"><img src="<?php echo $imageSrc[0];?>" width="<?php echo $imageSrc[1]; ?>" height="<?php echo $imageSrc[2];?>" /></li>
								<?php } ?>
							</ul>
						</div>
					<?php } else { // if no video or image, show big title ?>
						<div>
							<ul class="slides">
								<li class="big_title" id="<?php echo $catTitle; ?>"title="<?php echo $postTitle; ?>"><?php echo $postTitle; ?></li>
							</ul>
						</div>
					<?php } 
				}
			} wp_reset_postdata(); ?>
		</div>
		<!--<a href="#" class="prev" title="Show previous"><img class="arrow" src="<?php bloginfo('template_url'); ?>/images/WG-arrow-left.png"/></a>
		<a href="#" class="next" title="Show next"><img class="arrow" src="<?php bloginfo('template_url'); ?>/images/WG-arrow-right.png"/></a>-->
		<div class="project-info">
			<?php $website = get_post_meta($post->ID, 'website', true); ?>
			<h3><a href="http://<?php echo $website; ?>" target="_blank"><?php echo $post->post_title; ?></a>
				<!--<a href="http://<?php //echo $website; ?>" target="_blank">
					<span class="link-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
							<path id="link-icon" d="M156.226 199.679c7.541-7.54 15.902-13.757 24.794-18.659c49.556-27.318 113.117-12.788 145 35.5 l-38.547 38.547c-11.059-25.227-38.5-39.565-65.813-33.456c-10.282 2.3-20.054 7.427-28.039 15.413l-73.898 73.9 c-22.433 22.433-22.432 58.9 0 81.369c22.433 22.4 58.9 22.4 81.4 0l22.78-22.779 c20.71 8.2 42.9 11.5 64.9 9.863l-50.278 50.278c-43.105 43.105-112.991 43.105-156.096 0 c-43.105-43.104-43.106-112.991-0.001-156.096L156.226 199.679z M273.574 82.33l-50.278 50.3 c21.928-1.643 44.2 1.6 64.9 9.865l22.779-22.78c22.434-22.434 58.936-22.434 81.4 0c22.434 22.4 22.4 58.9 0 81.4 l-73.897 73.895c-22.501 22.501-59.061 22.311-81.368 0c-5.202-5.201-9.694-11.678-12.484-18.04l-38.546 38.5 c4.049 6.1 8.3 11.5 13.7 16.858c13.949 13.9 31.7 24.3 52.1 29.251c26.466 6.4 54.8 2.8 79.185-10.592 c8.892-4.903 17.254-11.119 24.794-18.659l73.896-73.895c43.105-43.105 43.105-112.991 0.001-156.097 C386.566 39.2 316.7 39.2 273.6 82.33z"/>
						</svg>
					</span>
				</a>-->
			</h3>
			<div class="description">
				<?php echo $post->post_content; ?>
			</div>
			<div class="credits">
				<?php 
				$design = get_post_meta($post->ID, 'design', true); 
				$designURL = get_post_meta($post->ID, 'design-url', true); 
				if (!empty($design)) { ?>
					<p>Design - <?php if (!empty($designURL)) { echo '<a href="'.$designURL.'" target="_blank">'; } echo $design; if (!empty($designURL)) { echo '</a>'; } ?></p>
				<?php } ?>
				<p>Development - Encode</p>
			</div>
		</div>
<?php endwhile; ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.min.js"></script>

<script type="text/javascript">
// CACHE
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

// Add current class to middle image of carousel
function highlight( items ) {
	items.filter(":eq(1)").addClass('current').fadeTo('fast', 1.0);
	return items;
}
function unhighlight( items ) {
	items.removeClass('current').fadeTo('fast', 0.3);
	return items;
}

// Calculate carousel dimensions
var windowWidth = $(window).width();
var windowHeight= $(window).height();
if ( windowWidth <= windowHeight ) {
	var slideWidth = $(window).width() * 0.8; // 80% of window width
	var slideHeight = slideWidth * 0.625;
	var containerHeight = $(window).height() - $('.header').outerHeight();
	var slidePadding = Math.ceil(slideWidth * 0.03);
	var leftAlign = ($(window).width() - slideWidth) / 2;
	var paddingTop = Math.ceil(slideWidth * 0.013);
	$carousel_div.css({height: slideHeight, width: slideWidth}).css('padding-left', slidePadding).css('padding-right', slidePadding);
	$slides.css('height', slideHeight).css('padding-top', paddingTop);
	$slides_img.css('height', slideHeight);
	$browser_bar.css('height', 'auto');
	$project_info.css({left: leftAlign, width: slideWidth});
} else {		
	var slideHeight4 = ($(window).height() - ($('.header').outerHeight() + $('.project-info').outerHeight())) * 0.9;
	var slideWidth4 = slideHeight4 * 1.6;
	var containerHeight4 = $(window).height() - $('.header').outerHeight();
	var slidePadding4 = Math.ceil(slideWidth4 * 0.03);
	var leftAlign4 = ($(window).width() - slideWidth4) / 2;
	var paddingTop4 = Math.ceil(slideWidth4 * 0.013);
	$carousel_div.css({height: slideHeight4, width: slideWidth4}).css('padding-left', slidePadding4).css('padding-right', slidePadding4);
	$slides.css('height', slideHeight4).css('padding-top', paddingTop4);
	$slides_img.css('height', slideHeight4);
	$browser_bar.css('height', 'auto');
	$project_info.css({left: leftAlign4, width: slideWidth4});
}

// CAROUSELS
	$carousel_div.each(function() {
		$(this).flexslider({
			directionNav: false,
			slideshowSpeed: 5000
		});
	});
	$('.flex-control-paging li a').html('<span class="dash"></span>');
	/*if ( $(window).width() < 950 ) {
		$('.prev .arrow').attr('src', '<?php bloginfo('template_url'); ?>/images/WG-arrow-left-s.png');
		$('.next .arrow').attr('src', '<?php bloginfo('template_url'); ?>/images/WG-arrow-right-s.png');
		$('.arrow_left img').attr('src', '<?php bloginfo('template_url'); ?>/images/WG-arrow-left-s.png');
		$('.arrow_right img').attr('src', '<?php bloginfo('template_url'); ?>/images/WG-arrow-right-s.png');
		$arrow_left.css({ 'width': '15px', 'height': '30px', 'padding': '15px 20px 15px 15px'});
		$arrow_right.css({ 'width': '15px', 'height': '30px', 'padding': '15px 15px 15px 20px'});
	}
	if ( $(window).width() < 950 && $(window).width() > 540 ) {
		$carousel_div.css({ 'width': '500px', 'height': '280px', 'padding': '0 25px' });
		$slides.css('height', '280px');
		$slides_img.css({ 'width': 'auto', 'height': '280px' });
		$('iframe').attr('height', '280');
		$prev.css({ 'top': '115px', 'height': '50px', 'width': '50px', 'left': '-301px'});
		$next.css({ 'top': '115px', 'height': '50px', 'width': '50px', 'right': '-301px'});
		$('hr').css('width', '500px');
	} else if ( $(window).width() < 540 ) {
		$carousel_div.css({ 'width': '300px', 'height': '166px', 'padding': '0 25px' });
		$slides.css('height', '166px');
		$slides_img.css({ 'width': 'auto', 'height': '166px' });
		$('iframe').attr('height', '166');
		$prev.css({ 'top': '58px', 'height': '50px', 'width': '50px', 'left': '-201px', 'margin-left': '50%'});
		$next.css({ 'top': '58px', 'height': '50px', 'width': '50px', 'right': '-201px', 'margin-right': '50%'});
		$('hr').css('width', '300px');
	}
	if ( $(window).width() < 350 ) {
		$prev.css({ 'left': '0', 'margin-left': '0'});
		$next.css({ 'right': '0', 'margin-right': '0'});
	}*/
	// CAROUFREDSEL
	$carousel.carouFredSel({
		width: '100%',
		items: {
			visible: 3,
			start: 1, 
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
	// trigger tooltips
	$('.tooltip-overlay').each(function() {
		$(this).qtip({
			content: {
				text: $(this).attr('title')
			},
			position: {
				target: 'mouse'
			},
			style: 'light',
		});
	});
</script>

