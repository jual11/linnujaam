<?php
/**
 * ACF plugin fallback
 * Keeps it clean if ACF is switched off
 */
function cc_acf_fallback() {
	/* Check if ACF is ON */
	if ( function_exists('get_field') ) {
		define('ACF_ON', true);
	} else {
		define('ACF_ON', false);
	}
	
	/* ACF switched OFF - declare main functions */
	if ( !ACF_ON && !is_admin() ) {
		function get_field() {};
		function the_field() {};
		function have_rows() {};
	}
}
add_action( 'after_setup_theme', 'cc_acf_fallback' );

/**
 * Adds ACF options page to wp-admin
 */
if( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Üldised väljad',
		'menu_title'	=> 'Üldised väljad',
		'menu_slug' 	=> 'theme-global-fields',
		'capability'	=> 'edit_pages',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-list-view',
		'position' 		=> '35.1',
	));
}
