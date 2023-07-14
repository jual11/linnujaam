<?php 
/**
 * Template Name: Users
 */

// Redirect to home if user not logged in
cc_redirect_to_home();

// Get header
get_header();


?>
<div class="page-content">
	<div class="page-content__inner page-content__inner--1200">

        <div class="page-header">
			<div class="page-header__inner">
				<h1 class="page-header__heading"><?php the_title(); ?></h1>
			</div>
		</div>

        <?php get_template_part('parts/users'); ?>
			
	</div><!--page-content__inner-->
</div><!-- page-content -->

<?php get_footer(); ?>