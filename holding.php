<?php
/*
Template Name: Holding Page
*/
?>

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
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />

	<?php wp_enqueue_script("jquery"); ?>
	<!--WP generated header-->
	<?php wp_head(); ?>
	<!--END WP generated header-->
	<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<div class="holding-overlay"></div>
<div class="holding">
	<h1>Encode</h1>
	<h2>design &amp; development</h2>
	<h3>New site coming soon.<br/>For quotes and other enquiries contact <a class="animated" href="mailto:liz@encode-design.com">liz@encode-design.com</a></h3>
</div>

<?php get_footer(); ?>