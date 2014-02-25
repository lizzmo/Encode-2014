<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;', true, 'left'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" />
	<link rel="stylesheet" href="http://cdn.jsdelivr.net/qtip2/2.2.0/basic/jquery.qtip.min.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
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
	<div class="overlay projects">
		<div class="grid">
			<?php $catID = get_category_by_slug('projects')->term_id;
			$posts = get_posts('category='.$catID.'&posts_per_page=-1&numberposts=-1&orderby=post_date&order=ASC');
			foreach ( $posts as $post ) { 
				$subtitle = get_post_meta($post->ID, 'Subtitle', true); ?>
				<div class="thumb">
					<a href="<?php echo the_permalink(); ?>">
						<div class="thumb-overlay">
							<p><?php echo $post->post_title; ?><br /><span class="subtitle"><?php echo $subtitle; ?></span></p>
						</div>
						<?php echo the_post_thumbnail(); ?>
					</a>
				</div>
			<?php } 
			wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="overlay profile"></div>