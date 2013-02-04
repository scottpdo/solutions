<?php get_header(); ?>

<h1 class="visuallyhidden">News</h1>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section <?php post_class('news'); ?>>
		<h3><?php the_title(); ?></h3>
		<div class="meta">
			<div class="date sans"><?php $date = get_the_date('n.j.y'); echo $date; ?></div>
			<div class="share">
				<a href="" class="icon-facebook"></a>
				<a href="" class="icon-twitter"></a><br>
				<a href="" class="icon-linkedin"></a>
				<a href="" class="icon-google-plus"></a><br>
				<a class="border blacklink hoverable link" href="<?php the_permalink(); ?>">article link</a>
			</div>
		</div>
		<div class="content">
			<?php 
			$images = get_field('featured_images');
			if ($images) {
				$count = count($images);
				if ($count == 1) {
					while (has_sub_field('featured_images')) {
						the_sub_field('image');
					}
				} elseif ($count == 2) {
					while (has_sub_field('featured_images')) {
						
					}
				}
			} ?>
		</div>
	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>