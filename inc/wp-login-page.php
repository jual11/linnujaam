<?php
function cc_login_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/login.css?v=0.65">';
}
add_action('login_head', 'cc_login_css');

function cc_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'cc_login_logo_url' );

function cc_login_logo_url_title() {
	return '';
}
add_filter( 'login_headertext', 'cc_login_logo_url_title' );