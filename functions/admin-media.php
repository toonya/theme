<?php
// ----------------------------------------
// ! load bootstrap support & css/js files
// ----------------------------------------

function loadBootstrap() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'admin-javascript', get_template_directory_uri() . '/js/admin.js', array('jquery'), '1.0.0', true );

	wp_enqueue_media(); //call the media management.
}

add_action( 'admin_enqueue_scripts', 'loadBootstrap' );

?>