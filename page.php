<?php get_header(); ?>



<div class="page-content">
	<div class="page-content__inner">

		<div class="page-header">
			<div class="page-header__inner">
				<h1 class="page-header__heading"><?php the_title(); ?></h1>
			</div>
		</div>
		
		<div class="page-content__content">
			<?php the_content(); ?>
		</div>
		
	</div>
</div>
	
<?php get_footer(); ?>