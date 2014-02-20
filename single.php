<?php get_header(); ?>
	<div class="carousel">
		<?php // get FEATURED posts
		$post_slug = $post->post_name;
		$featured_posts = get_posts('posts_per_page=-1&numberposts=-1&tag='.$post_slug.'&orderby=post_date&order=ASC');
		if (!empty($featured_posts)) {
			foreach ($featured_posts as $post) {
				$postTitle = $post->post_title;
				$featuredID = $post->ID; 
				$featuredVideo = get_post_meta($featuredID, 'VIDEO', true); // check for video
				$array = array( 'post_type' => 'attachment', 'post_mime_type' => 'image', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_parent' => $featuredID );
				$featuredImages = get_posts( $array ); // check for images
				if (!empty($featuredVideo)) { // show video ?>
					<div>
						<ul class="slides">
							<li>
								<iframe src="http://player.vimeo.com/video/<?php echo $featuredVideo; ?>?portrait=0&loop=0" width="100%" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>	
							</li>
						</ul>
					</div>
				<?php } else if (!empty($featuredImages)) { // if no video, show image ?>
					<div>
						<ul class="slides">
							<?php if(!empty($post->post_content)) { ?>
								<span class="info-overlay">
									<span class="info">
										<?php echo $post->post_content; ?>
									</span>
								</span>
							<?php } ?>
							<img src="<?php bloginfo('template_url'); ?>/img/browser-bar.jpg" class="browser-bar">
							<?php foreach ($featuredImages as $image) {
								$imageID = $image->ID;
								$imageSrc = wp_get_attachment_image_src( $imageID, 'large' ); ?>
								<li><img src="<?php echo $imageSrc[0];?>" width="<?php echo $imageSrc[1]; ?>" height="<?php echo $imageSrc[2];?>" /></li>
							<?php } ?>
						</ul>
						<span class="info-icon">
							<svg class="info-outline" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<path id="info-6-icon" d="M256,90.002c91.74,0,166,74.241,166,165.998c0,91.739-74.245,165.998-166,165.998
								c-91.738,0-166-74.242-166-165.998C90,164.259,164.243,90.002,256,90.002 M256,50.002C142.229,50.002,50,142.228,50,256
								c0,113.769,92.229,205.998,206,205.998c113.77,0,206-92.229,206-205.998C462,142.228,369.77,50.002,256,50.002L256,50.002z
								 M252.566,371.808c-28.21,9.913-51.466-1.455-46.801-28.547c4.667-27.098,31.436-85.109,35.255-96.079
								c3.816-10.97-3.502-13.977-11.346-9.513c-4.524,2.61-11.248,7.841-17.02,12.925c-1.601-3.223-3.852-6.906-5.542-10.433
								c9.419-9.439,25.164-22.094,43.803-26.681c22.27-5.497,59.492,3.29,43.494,45.858c-11.424,30.34-19.503,51.276-24.594,66.868
								c-5.088,15.598,0.955,18.868,9.863,12.791c6.959-4.751,14.372-11.214,19.806-16.226c2.515,4.086,3.319,5.389,5.806,10.084
								C295.857,342.524,271.182,365.151,252.566,371.808z M311.016,184.127c-12.795,10.891-31.76,10.655-42.37-0.532
								c-10.607-11.181-8.837-29.076,3.955-39.969c12.794-10.89,31.763-10.654,42.37,0.525
								C325.577,155.337,323.809,173.231,311.016,184.127z"/>
							</svg>
							<svg class="info-solid" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<path id="info-5-icon" d="M256,50.002C142.229,50.002,50,142.228,50,256c0,113.769,92.229,205.998,206,205.998
									c113.77,0,206-92.229,206-205.998C462,142.228,369.77,50.002,256,50.002z M251.989,376.93
									c-29.694,10.436-54.175-1.531-49.264-30.049c4.913-28.523,33.09-89.589,37.11-101.135c4.017-11.547-3.687-14.712-11.943-10.015
									c-4.763,2.749-11.84,8.254-17.916,13.606c-1.685-3.393-4.055-7.27-5.833-10.983c9.915-9.936,26.488-23.256,46.108-28.083
									c23.441-5.787,62.624,3.463,45.783,48.271c-12.024,31.937-20.529,53.976-25.888,70.388c-5.356,16.418,1.006,19.861,10.382,13.464
									c7.325-5.001,15.129-11.804,20.849-17.079c2.646,4.301,3.494,5.672,6.11,10.614C297.559,346.105,271.584,369.924,251.989,376.93z
									 M313.516,179.372c-13.469,11.463-33.433,11.216-44.601-0.561c-11.166-11.77-9.302-30.606,4.163-42.072
									c13.468-11.463,33.435-11.215,44.6,0.553C328.843,149.066,326.98,167.902,313.516,179.372z"/>
								</svg>
						</span>
					</div>
				<?php } else { // if no video or image, show big title ?>
					<div>
						<ul class="slides">
							<li class="big_title"><?php echo $postTitle; ?></li>
						</ul>
					</div>
				<?php } 
			}
		} wp_reset_postdata(); ?>
	</div>
	<!--<a href="#" class="prev" title="Show previous"><img class="arrow" src="<?php bloginfo('template_url'); ?>/images/WG-arrow-left.png"/></a>
	<a href="#" class="next" title="Show next"><img class="arrow" src="<?php bloginfo('template_url'); ?>/images/WG-arrow-right.png"/></a>-->
	<div class="project-info">
		<?php $website = get_post_meta($post->ID, 'website', true); ?>
		<h3><a class="animated" href="http://<?php echo $website; ?>" target="_blank"><?php echo $post->post_title; ?></a>
			<!--<a href="http://<?php echo $website; ?>" target="_blank">
				<span class="link-icon">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12"
 height="16" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
						<g id="Icons" style="opacity:0.75;">
							<g id="external">
								<polygon id="box" style="fill-rule:evenodd;clip-rule:evenodd;" points="2,2 5,2 5,3 3,3 3,9 9,9 9,7 10,7 10,10 2,10 		"/>
								<polygon id="arrow" style="fill-rule:evenodd;clip-rule:evenodd;" points="6.211,2 10,2 10,5.789 8.579,4.368 6.447,6.5
								5.5,5.553 7.632,3.421 		"/>
							</g>
						</g>
					</svg>
				</span>
			</a>-->
		</h3>
		<div class="description">
			<?php echo $post->post_content; ?>
		</div>
		<div class="credits">
			<?php 
			$design = get_post_meta($post->ID, 'design', true); 
			$designURL = get_post_meta($post->ID, 'design-url', true); 
			if (!empty($design)) { ?>
				<p>Design - <?php if (!empty($designURL)) { echo '<a class="animated" href="'.$designURL.'" target="_blank">'; } echo $design; if (!empty($designURL)) { echo '</a>'; } ?></p>
			<?php } ?>
			<p>Development - Encode</p>
		</div>
	</div>

<?php get_footer(); ?>

