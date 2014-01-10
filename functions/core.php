<?php
// ----------------------------------------
// ! call the funcs.
// ----------------------------------------

if(!function_exists('call_func')) {

	function call_func($args = array()) {
		$default = array(
			'admin-media' => true
		);
		$args = wp_parse_args($args, $default);
		if(!empty($args)){
			foreach($args as $func_name=>$func_args){
				if($func_args != false){

					if(is_array($func_args)){
						switch($func_name) {
							case 'browser-check' :
								 require_once( $func_name.'.php');
								 if(belowIE($func_args['version']))
								 	browser_alert();
						}
					}

					else
						require_once( $func_name.'.php');
				}
			}
		}
	}
}

// ----------------------------------------
// ! remove dashboard widgets
// ----------------------------------------
function remove_dashboard_widgets(){
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


// ----------------------------------------
// ! admin bar
// ----------------------------------------
if( current_user_can('level_10') )
	show_admin_bar(true);
else
	show_admin_bar(false);


// ----------------------------------------
// ! admin footer
// ----------------------------------------

add_action('admin_footer_text', 'my_admin_footer_function');
function my_admin_footer_function() {
	echo '同雅设计';
}
?>