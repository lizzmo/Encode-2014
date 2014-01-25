<?php get_header(); ?>
<div class="overlay projects"></div>
<div class="overlay profile"></div>
<div class="container closed">
</div>
<div class="grid">
	<?php $catID = get_category_by_slug('projects')->ID;
	$posts = get_posts('category='.$catID.'&posts_per_page=-1&numberposts=-1&orderby=post_date&order=ASC');
	foreach ( $posts as $post ) { ?>
		<div class="thumb">
			<a href="<?php echo the_permalink(); ?>">
				<div class="thumb-overlay"><p><?php echo $post->post_title; ?></p></div>
				<?php echo the_post_thumbnail(); ?>
			</a>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>
