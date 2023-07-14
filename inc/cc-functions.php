<?php
/**
 * Format date
 */
function cc_format_date($date) {

	// If there is date error
	if ( !$date  ) {
        $date = '00.00.0000';
    } 

	// Convert the date string to the 'YYYY-MM-DD' format
	$formatted_date = DateTime::createFromFormat('d.m.Y', $date)->format('Y-m-d');

	return $formatted_date;
}

/**
 * Format date from 0000-00-00 to 00.00.0000
 */
function cc_format_date_est($date_string) {
    $date = new DateTime($date_string);
    $formatted_date = $date->format('d.m.Y');

    return $formatted_date;
}

/**
 * Show input data in input field after form submit
 */
function cc_show_post_field_data($field) {
	// If there was POST 
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
        // Check is field filled
        if ( !empty($_POST[$field]) ) {
            echo $_POST[$field];
            return;
        }     
    }
}

/**
 * Redirect after login
 */
function redirect_after_login() {
    // Set the redirect URL
    $redirect_url = home_url('/otsing');

    // Redirect the user
    wp_redirect($redirect_url);
    exit;
}
add_action('wp_login', 'redirect_after_login', 10, 2);

/**
 * Hide admin bar if logged in
 */
function hide_admin_bar_for_logged_in_users() {
    if (is_user_logged_in()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'hide_admin_bar_for_logged_in_users');

/**
 * Redirect to home if user not logged in
 */
function cc_redirect_to_home() {
    if ( !is_user_logged_in() ) {
        // Redirect to the home page
        wp_redirect( home_url() );
        exit;
    }
}
