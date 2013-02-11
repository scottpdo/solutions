<?php 
/*
Template Name: Capabilities
*/
get_header(); 
the_post(); ?>

<?php 
// Include capabilities
include( MAIN . 'caps.php'); ?>

<h1 class="visuallyhidden">Contact</h1>

<div id="full_capabilities" class="clearfix">
	<div class="icons">
		<?php 
		foreach ($capabilities as $cap=>$name) { ?>
			<a class="round" href="#<?php echo $cap; ?>">
				<span class="hoverable icon-<?php echo $cap; ?>"></span>
			</a>
		<?php 
		} ?> 
	</div>
		<?php
		foreach ($capabilities as $cap=>$name) { ?>
			<div class="content" id="<?php echo $cap; ?>">
				<h3 class="big"><?php echo $name; ?></h3>
				<?php while (has_sub_field($cap)) { ?>
					<div class="clearfix">
						<p class="point"><?php the_sub_field('point'); ?></p>
						<p class="description"><?php the_sub_field('description'); ?></p>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		
	</div>
</div>

<script>
jQuery(document).ready(function($){
	if (window.location.hash.length == 0) {
		// If we're not coming to a specific capability,
		// assume that we're here to check out pre-project support
		window.history.pushState('', document.title, '#support');
	}
	$('html, body').animate({
		'scrollTop': 0
	}, 1);

	var container = $('#full_capabilities'),
		content = container.find('.content'),
		height = 0,
		icons = $('.icons a');
	
	// Set the right one to active
	icons.each(function(){
		$this = $(this);
		if ($this.attr('href') == window.location.hash) {
			$this.addClass('active');
		}
	});
	// Given all the content...
	content.each(function(){
		$this = $(this);
		// Find the tallest of the bunch
		if ($this.outerHeight() > height) {
			height = $this.outerHeight();
		}
	});
	// Set height of container equal to the height of the tallest content
	container.height(height);

	// When clicking on icons, we want to fade in and out, so we need to override
	// default anchor behavior
	icons.click(function(e){
		e.preventDefault();
		$this = $(this);
		$this.addClass('active').siblings().removeClass('active');
		// console.log(content.filter($this.attr('href')));
		content.filter($this.attr('href')).fadeIn().siblings('.content').fadeOut();

		window.history.pushState('', document.title, $this.attr('href'));
	});
});
</script>

<?php get_footer(); ?>