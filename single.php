<?php while ( have_posts() ) : the_post(); ?>
	<div class="carousel">
		<?php echo the_title(); ?>
		<?php echo the_content(); ?>
	</div>
<?php endwhile; ?>

