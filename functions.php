<?php
function theme_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	//load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
		  'header-menu' => __( '页头' )
		)
	);	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	/*
add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
*/

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'theme_setup' );

/*
require_once(get_template_directory() . '/functions/core.php');

call_func(array(
	'remove-origin' => true,
	'protection-code' => true,
//	'employee' => true,
	'browser-check' => array('version'=> 8),
	'banner-option' => true,
	'add-setting' => true,
	'dashboard' => true,
//	'qn/qn-support' => true
));
*/
