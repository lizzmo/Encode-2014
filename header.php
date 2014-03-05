<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Web design and development studio based in Glasgow">
	<meta name="keywords" content="Liz, Morrison, Smith, Elizabeth, web, design, development, programming, developer, programmer, codeing, coder, designer, website, responsive, mobile, UK, Glasgow, Scotland">
	<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;', true, 'left'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- /**
	 * @license
	 * MyFonts Webfont Build ID 2760689, 2014-03-04T05:27:57-0500
	 * 
	 * The fonts listed in this notice are subject to the End User License
	 * Agreement(s) entered into by the website owner. All other parties are 
	 * explicitly restricted from using the Licensed Webfonts(s).
	 * 
	 * You may obtain a valid license at the URLs below.
	 * 
	 * Webfont: Booster Next FY Medium by Fontyou
	 * URL: http://www.myfonts.com/fonts/fontyou/booster-next-fy/medium/
	 * 
	 * Webfont: Booster Next FY Regular by Fontyou
	 * URL: http://www.myfonts.com/fonts/fontyou/booster-next-fy/regular/
	 * 
	 * 
	 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2760689
	 * Licensed pageviews: 10,000
	 * Webfonts copyright: Copyright (c) 2013 by FONTYOU. All rights reserved.
	 * www.fontyou.com
	 * 
	 * © 2014 MyFonts Inc
	*/ -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" />
	
	<?php wp_enqueue_script("jquery"); ?>
	<!--WP generated header-->
	<?php wp_head(); ?>
	<!--END WP generated header-->
	<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
</head>
<body>
	<div class="header">
		<span class="nav-link left"><h3>Projects<hr class="underline" /></h3></span>
		<div class="title"><a href="<?php bloginfo('url'); ?>">
			<h1>Encode</h1>
			<h2>design &amp; development</h2>
		</a></div>
		<span class="nav-link right"><h3>Profile<hr class="underline" /></h3></span>
	</div>
	<div class="loading-overlay">
		<div class="loading-gif"><img src="<?php bloginfo('template_url'); ?>/img/ajax-loader.gif"></div>
	</div>
	<div class="overlay projects">
		<div class="grid">
			<?php $catID = get_category_by_slug('projects')->term_id;
			$posts = get_posts('category='.$catID.'&posts_per_page=-1&numberposts=-1&orderby=post_date&order=ASC');
			foreach ( $posts as $post ) { 
				$subtitle = get_post_meta($post->ID, 'Subtitle', true); ?>
				<div class="thumb">
					<a href="<?php echo the_permalink(); ?>">
						<div class="thumb-border">
							<div class="thumb-title"><?php echo $post->post_title; ?><br /><span class="subtitle"><?php echo $subtitle; ?></span></div>
							<div class="thumb-overlay"></div>
						</div>
						<?php echo the_post_thumbnail(); ?>
					</a>
				</div>
			<?php } wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="overlay profile"></div>