<?php get_header(); ?>
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
	<?php } ?>
</div>
<?php get_footer(); ?>
