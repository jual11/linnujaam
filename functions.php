<?php
/**
 * Main constants etc
 */
define('STYLE_VER', '1.03');
define('JS_VER', '1.03');

# 1. Enqueue CSS and JS
# 2. Theme setup
# 3. Include other functions

/**
 * 1. 
 * Inserts styles and scripts.
 * Uses wp_head and wp_footer hooks 
 */
function cc_css_js() {
	$stylesheet_directory_uri = get_stylesheet_directory_uri();

	/* Styles */	
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), STYLE_VER );
	wp_enqueue_style( 'main', $stylesheet_directory_uri . '/css/main.css', array(), STYLE_VER );
	wp_enqueue_style( 'cc-components', $stylesheet_directory_uri . '/css/components.css', array(), STYLE_VER );

	/* Fonts */
	wp_enqueue_style( 'custom-fonts-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600&display=swap', array(), STYLE_VER );

	/* Icons */
	wp_enqueue_script( 'font-awesome-5', 'https://kit.fontawesome.com/b0586ad550.js', array(), '5.0', false );

	
	/* Scripts */
  	wp_enqueue_script( 'main', $stylesheet_directory_uri . '/js/main.js', array( 'jquery' ), JS_VER, true );  // Site-wide JavaScript
	wp_enqueue_script( 'jquery-validations', $stylesheet_directory_uri . '/lib/jquery.validate.min.js', array( 'jquery' ), '1.19.2', false  ); 

	
}
add_action( 'wp_enqueue_scripts', 'cc_css_js' );

// Custom CSS for WP-admin
function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/wp-admin.css', array(), STYLE_VER );
}
add_action('admin_enqueue_scripts', 'admin_style');

/**
 * 2.
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cc_setup() {
	/* Title tags since WP 4.1 */
	add_theme_support( 'title-tag' );
		
	/* Featured image */
	add_theme_support( 'post-thumbnails' ); 

	/* Load theme languages */
	load_theme_textdomain('alligaator', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'cc_setup' );

// Add custom image size
add_image_size( 'reference-cover', 1900, 1900 ); 

ini_set('memory_limit', '1024M');

/**
 * 3.
 * Include other functions below.
 * 
 * Let's keep this file super-clean and put 
 * other functions into the inc folder.
 */
require __DIR__ . '/inc/acf.php';
require __DIR__ . '/inc/menus.php';
require __DIR__ . '/inc/wp-login-page.php';
require __DIR__ . '/inc/wp-admin-functions.php';
require __DIR__ . '/inc/cc-functions.php';
require __DIR__ . '/inc/custom-db-tables.php';
require __DIR__ . '/inc/reg-from-functions.php';
require __DIR__ . '/inc/select-species.php';
require __DIR__ . '/inc/search-functions.php';

?>