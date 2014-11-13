<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="slideshow">
	<ul class="slide-images">
		<?php $homeID = get_page_by_title('Home')->ID;
		$images = get_posts('post_type=attachment&post_mime_type=image&post_parent='.$homeID.'&posts_per_page=-1&orderby=menu_order&order=ASC'); // check for images 
		foreach ($images as $image) {
			$imageID = $image->ID;
			$imageSrc = wp_get_attachment_image_src( $imageID, 'full' ); 
			$homeURL = home_url(); 
			$projectURL = $image->post_excerpt; ?>
			<li><a href="<?php echo $homeURL.'/'.$projectURL; ?>"><img src="<?php echo $imageSrc[0];?>" width="<?php echo $imageSrc[1]; ?>" height="<?php echo $imageSrc[2];?>" /></a></li>
		<?php } ?>
	</ul>
</div>

<?php get_footer(); ?>