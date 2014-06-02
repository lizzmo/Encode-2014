<!doctype html>
<!--[if IE 7 ]>    <html class="ie ie7 lte8 lte9"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 lte8 lte9"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 lte9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;', true, 'left'); ?></title>
	<meta name="description" content="Web design and development studio run by Liz Smith, based in Glasgow, UK.">
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
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
	<!--WP generated header-->
	<?php wp_head(); ?>
	<!--END WP generated header-->
	<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!--[if IE]>
		<style type="text/css">
		.overlay { 
			background:transparent;
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#E6C0DFD7,endColorstr=#E6C0DFD7); 
			zoom: 1;
		} 
		</style>
	<![endif]-->
</head>
<body>
	<div class="header">
		<?php if(is_front_page()) { ?>
			<span class="nav-link inactive-left"><h3>Projects</h3></span>
		<?php } else { ?>
			<span class="nav-link left"><h3>Projects<hr class="underline" /></h3></span>
		<?php } ?>
		<div class="title"><a href="<?php bloginfo('url'); ?>">
			<h1>Encode</h1>
		</a></div>
		<span class="nav-link right"><h3>Profile<hr class="underline" /></h3></span>
	</div>
	<div class="loading-overlay">
		<div class="loading-gif"><img src="<?php bloginfo('template_url'); ?>/img/ajax-loader.gif"></div>
	</div>
	<div class="overlay projects">
		<div class="grid">
			<?php $projectsID = get_page_by_title('Projects')->ID;
			$project_posts = get_children('post_parent='.$projectsID.'&posts_type=page&orderby=menu_order');
			if (!empty($project_posts)) {
				foreach ($project_posts as $post) {
					$subtitle = get_post_meta($post->ID, 'subtitle', true); ?>
					<div class="thumb">
						<a href="<?php echo the_permalink(); ?>">
							<div class="thumb-border">
								<div class="thumb-title"><?php echo $post->post_title; ?><br /><span class="subtitle"><?php echo $subtitle; ?></span></div>
								<div class="thumb-overlay"></div>
							</div>
							<?php echo the_post_thumbnail(); ?>
						</a>
					</div>
				<?php }
			} wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="overlay profile">
		<div class="profile-wrapper">
			<div class="profile-main">
				<?php $profile = get_page_by_title('Profile');
				echo apply_filters('the_content', $profile->post_content); ?>
			</div>
			<div class="profile-footer">
				<div class="copyright"><p>Except where otherwise noted, all content on this site has been created by Encode and is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.en_US" target="_blank">Creative Commons License</a>.</p></div>
				<div class="social">
					<li class="twitter"><a href="http://twitter.com/lizbmorrison" target="_blank"></a></li>
					<li class="linkedin"><a href="http://www.linkedin.com/pub/liz-smith/22/334/849" target="_blank"></a></li>
				</div>
			</div>
		</div>
	</div>
	<img class="nav-arrow left-white" src="<?php bloginfo('template_url'); ?>/img/leftwhitearrow.png"/>
	<img class="nav-arrow right-white" src="<?php bloginfo('template_url'); ?>/img/rightwhitearrow.png"/>

