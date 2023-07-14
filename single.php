<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page-header">
	<div class="page-header__inner">
		<h1 class="page-header__heading"><?php the_title(); ?></h1>
	</div>
</div>

<div class="page-content">
	<div class="page-content__inner">
			<?php the_content(); ?>
	</div>
</div>
	
<?php endwhile; endif; ?>
<?php get_footer(); ?>