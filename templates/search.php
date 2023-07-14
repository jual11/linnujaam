<?php 
/**
 * Template Name: Search
 */

// Redirect to home if user not logged in
cc_redirect_to_home();

// Get header
get_header();

?>
<div class="page-content">
	<div class="page-content__inner">

		<?php get_template_part('parts/search'); ?>
	
	</div><!--page-content__inner-->
</div><!-- page-content -->

<?php get_template_part('parts/search-results'); ?>

<?php get_footer(); ?>