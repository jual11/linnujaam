<?php
/**
 * Registers custom menus
 */
function cc_menus() {
	register_nav_menus(
		array( 
			'header-public-menu' => 'Primary menu',

		)
  );
}
add_action( 'init', 'cc_menus' );

/** 
 * Displays header menu 
 */
function cc_display_menu() {
  wp_nav_menu(array('theme_location' => 'header-public-menu', 'container' => '', 'menu_class' => '', 'fallback_cb' => false ));
  return;
}

/**
 * Checks user role 
 */
function cc_user_has_role($user_role) {
    if (is_user_logged_in()) {
        if ($user_role == wp_get_current_user()->roles[0]) {
            return true;
        }
    }
}