<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

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

<?php get_footer(); ?>