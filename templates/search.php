<?php 
/**
 * Template Name: Search
 */

// Redirect to home if user is not logged in
cc_redirect_to_home();

// Start or resume the WordPress session
if (!session_id()) {
    session_start();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data here

    // Unset the search results session variable
    unset($_SESSION['search_results']);
}

get_header();
?>
<div class="page-content">
	<div class="page-content__inner">

		<?php get_template_part('parts/search'); ?>
	
	</div><!--page-content__inner-->
</div><!-- page-content -->

<?php get_template_part('parts/search-results'); ?>

<?php get_footer(); ?>