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
				// REPEAT
				foreach ($featured_posts as $post) {
					$postTitle = $post->post_title;
					$featuredID = $post->ID;
					$featuredVideo = get_post_meta($featuredID, 'VIDEO', true); // check for video
					$array = array( 'post_type' => 'attachment', 'post_mime_type' => 'image', 'posts_per_page' => -1, 'orderby' => 'post_date', 'post_parent' => $featuredID );
					$featuredImages = get_posts( $array ); // check for images
					if (!empty($featuredVideo)) { // show video ?>
						<div>
							<ul class="slides">
								<li class="homepage_video" id="<?php echo $catTitle; ?>" title="<?php echo $postTitle; ?>">
									<iframe src="http://player.vimeo.com/video/<?php echo $featuredVideo; ?>?portrait=0&loop=0" width="100%" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>	
								</li>
							</ul>
						</div>
					<?php } else if (!empty($featuredImages)) { // if no video, show image ?>
						<div>
							<ul class="slides">
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
			} ?>
		</div>
		<!--<a href="#" class="prev" title="Show previous"><img class="arrow" src="<?php bloginfo('template_url'); ?>/images/WG-arrow-left.png"/></a>
		<a href="#" class="next" title="Show next"><img class="arrow" src="<?php bloginfo('template_url'); ?>/images/WG-arrow-right.png"/></a>-->
		<div class="slide_captions">
			<?php 
			foreach ($featured_posts as $post) {
				$postTitle = $post->post_title;
				$postSlug = $post->post_name;
				$featuredID = $post->ID;
				$postURL = get_permalink($featuredID); 
				$catInfo = get_the_category($featuredID); // Category of post
				$catTitle = $catInfo[0]->name; // Get main category name 
				$catSlug = $catInfo[0]->slug; // main category slug
				$catID = $catInfo[0]->term_id; // main category ID
				$installID = get_cat_ID('Installations'); // Get Installations category ID
				if($catID == $installID) { // if is Installation, link to post ?>
					<li class="caption">
						<p class="slide_title"><?php echo $postTitle; ?></p>
						<p class="slide_category"><a href="<?php echo $postURL; ?>"><?php echo $catTitle; ?></a></p>
					</li>
				<?php } else if ($catSlug == 'uncategorized') { ?>
					<li class="caption">
						<p class="slide_title"><?php echo $postTitle; ?></p>
						<p class="slide_category"><a href="<?php echo site_url(); ?>/press">Press</a></p>
					</li>
				<?php } else { // else link to post's category page (News or Press) ?>
					<li class="caption">
						<p class="slide_title"><?php echo $postTitle; ?></p>
						<p class="slide_category"><a href="<?php echo site_url(); ?>/<?php echo $catSlug; ?>#<?php echo $postSlug; ?>">Learn More</a></p>
					</li>
				<?php } 
			} 
			wp_reset_postdata(); ?>
		</div>
		<div class="project-info">
			<div class="description">
				<h3><?php echo $post->post_title; ?></h3>
				<?php the_content(); ?>
			</div>
			<div class="credits">
				<?php // get design custom field plus URL ?>
				<p>Development - Encode</p>
			</div>
		</div>
<?php endwhile; ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>

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

// Add current class to middle image of carousel
function highlight( items ) {
	items.filter(":eq(1)").addClass('current').fadeTo('fast', 1.0);
	return items;
}
function unhighlight( items ) {
	items.removeClass('current').fadeTo('fast', 0.3);
	return items;
}

// Align project info with slides
var slideW = $('.slides').width();
var leftAlign = ($(window).width() - slideW) / 2;
$('.project-info').css({left: leftAlign, width: slideW});

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
	$('.slide_captions').carouFredSel({
		width: '100%',
		auto: false,
		items: {
			visible: 1,
			start: 1
		},
		scroll:{
			fx: 'fade',
			duration: 500
		}
	});
	$('.carousel').carouFredSel({
		synchronise: ['.slide_captions', false],
		width: '100%',
		items: {
			visible: 3,
			start: 1
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
	$carousel_img.fadeIn();
</script>

