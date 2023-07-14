<?php 
/**
 * Template Name: Home
 */
get_header();


?>
<div class="page-content">
	<div class="page-content__inner">

		<div class="home-cover">
			<?php
			if ( is_user_logged_in() ) {
				$logout_url = wp_logout_url();
				?>
				<a href="<?php echo $logout_url; ?>" class="btn">Logi välja</a>
				<?php
			} else {
				?>
				<a href="<?php echo esc_url(home_url('/login')); ?>" class="btn">Logi sisse</a>
				<?php
			}
			?>
	
			<a href="<?php echo esc_url(home_url('/registreeru')); ?>" class="btn">Registreeru</a>
		</div>
			
	</div><!--page-content__inner-->
</div><!-- page-content -->

<?php get_footer(); ?>