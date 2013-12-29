<?php
// ----------------------------------------
// ! remove welcome information
// * that is for new init website
// * may use default tutorial.
// ----------------------------------------

remove_action( 'welcome_panel', 'wp_welcome_panel' );

// ----------------------------------------
// ! remove toolbar node
// ----------------------------------------

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'new-content' );
}
?>