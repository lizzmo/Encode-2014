<?php
/*
Template Name: Holding Page
*/
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;', true, 'left'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
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

<div class="holding">
	<h1>Encode</h1>
	<h2>design &amp; development</h2>
	<hr></hr>
	<h3>coming soon</h3>
</div>

<?php get_footer(); ?>