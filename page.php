<?php get_header(); ?>
<div class="container" id="content">
	<div class="carousel">
	</div>
</div>
<div class="grid">
	<?php $posts = get_posts();
	foreach ( $posts as $post ) { ?>
		<div class="thumb">
			<a href="<?php echo the_permalink(); ?>">
				<div class="overlay"><p><?php echo $post->post_title; ?></p></div>
				<?php echo the_post_thumbnail(); ?>
			</a>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>
