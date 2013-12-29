<?php
// ----------------------------------------
// ! remove some role
// ----------------------------------------

remove_role( 'subscriber' );
remove_role( 'contributor' );
remove_role( 'author' );
remove_role( 'editor' );

// ----------------------------------------
// ! add custom role
// ----------------------------------------

$result = add_role(
	'员工',
	'员工',
	array(
		'read'         => true,  // True allows this capability
		'edit_posts'   => false,
		'delete_posts' => false, // Use false to explicitly deny
	)
);

// ----------------------------------------
// ! cunstomer system page
// ----------------------------------------

add_action( 'admin_menu', 'my_menu_pages');
function my_menu_pages() {
	//remove page
	$cc_remove_page = array(
		'edit.php',
		'edit.php?post_type=page',
		'tools.php',
		'index.php',
		'upload.php',
		'post-new.php?post_type=page',
		'edit-comments.php',
		'themes.php',
		'plugins.php',
		'options-general.php'
		);

	foreach($cc_remove_page as $id=>$menu){
		remove_menu_page($menu);
	}
	//remove subpage
	$remove_submenu_page = array(
		'edit.php?post_type=page' => 'post-new.php?post_type=page',
		'edit.php' => 'post-new.php',
		'users.php' => 'profile.php'
		);

	foreach($remove_submenu_page as $menu=>$submenu){
		remove_submenu_page($menu,$submenu);
	};
	remove_submenu_page('edit.php','edit-tags.php?taxonomy=category');
	remove_submenu_page('edit.php','edit-tags.php?taxonomy=post_tag');
	remove_submenu_page('users.php','user-new.php');
	remove_submenu_page('upload.php','upload.php');
	remove_submenu_page('upload.php','media-new.php');

	//add pageevernote:///view/283963/s10/80680381-86d9-4e14-808c-fa782a0160a0/80680381-86d9-4e14-808c-fa782a0160a0/
	add_menu_page( '新闻', '新闻', 'manage_options', 'edit.php', '', '', 1 );
	add_menu_page( '页面', '页面', 'manage_options', 'edit.php?post_type=page', '', '', 2 );
	add_menu_page( '导航', '导航', 'manage_options', 'nav-menus.php', '', '', 3);
	add_menu_page( '图片库', '图片库', 'manage_options', 'upload.php', '', '', 10);
}

// ----------------------------------------
// ! add customer dashboard widgets
// ----------------------------------------
add_action('wp_dashboard_setup','add_dashboard_widgets');


function dashboardWidgetContent() {
	echo '祝全体员工工作顺利!';
}


function add_dashboard_widgets() {

	$custom_dashboard_widgets = array(
	    'my-dashboard-widget' => array(
	        'title' => '汇付友',
	        'callback' => 'dashboardWidgetContent'
	    )
	);

    foreach ( $custom_dashboard_widgets as $widget_id => $options ) {
        wp_add_dashboard_widget(
            $widget_id,
            $options['title'],
            $options['callback']
        );
    }
}




// ----------------------------------------
// ! add news for employee
// ----------------------------------------
function employee_news() {
  $default = array(
		'name' => '员工通知',
		'slug' => 'employee_news'
	);

  $labels = array(
    'name' => $default['name'],
    'singular_name' => $default['name'],
    'add_new' => '添加新'.$default['name'],
    'add_new_item' => '添加新'.$default['name'],
    'edit_item' => '编辑'.$default['name'].'信息',
    'new_item' => '添加新'.$default['name'],
    'all_items' => '全部'.$default['name'],
    'view_item' => '浏览该'.$default['name'],
    'search_items' => '查找'.$default['name'],
    'not_found' =>  '没有发现',
    'not_found_in_trash' => '垃圾箱中没有',
    'parent_item_colon' => '',
    'menu_name' => $default['name']
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
	//Provide a callback function that will be called when setting up the meta boxes for the edit form. Do remove_meta_box() and add_meta_box() calls in the callback.
	//'register_meta_box_cb' => '',
	//'with_front' => bool Should the permastruct be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
    'rewrite' => array( 'slug' => $default['slug'] ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 70,
    'supports' => array( 'title', 'editor','thumbnail', 'excerpt' )
  );

  register_post_type( $default['slug'], $args );
}
if(!post_type_exists('employee_news'))
	add_action( 'init', 'employee_news' );

// ----------------------------------------
// ! remove logo
// ----------------------------------------
function my_custom_login_logo()
{
    echo '<style  type="text/css">.login h1 a {  	background-image: none; } </style>';
}
add_action('login_head',  'my_custom_login_logo');


// ----------------------------------------
// ! load single post template
// ----------------------------------------

function get_custom_post_type_template($single_template) {
     global $post;

     if ($post->post_type == 'employee_news') {
          $single_template = get_template_directory() . '/single-templates/employee_news.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );
?>