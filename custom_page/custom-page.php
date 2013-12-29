<?php
// ----------------------------------------
// ! Custom page
// ----------------------------------------

	// ----------------------------------------
	// ! Load css & js.
	// ----------------------------------------

	function load_cus_page_media() {
		wp_enqueue_style( 'custom_page_css', get_template_directory_uri() . '/custom_page/css/cus-page.css' );
		wp_enqueue_script( 'custom_page_js', get_template_directory_uri() . '/custom_page/js/cus-page.js', array('jquery'), '1.0.0', true );
	}

	add_action( 'admin_enqueue_scripts', 'load_cus_page_media' );

	// ----------------------------------------
	// ! Create a custom post type
	// ----------------------------------------

	function custom_page() {
		$default = array(
			'name' => '自定义页面',
			'slug' => 'cus_page'
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
			'register_meta_box_cb' => 'call_custom_page_metabox',
			//'with_front' => bool Should the permastruct be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
			'rewrite' => array( 'slug' => $default['slug'] ),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array( 'title' )
		);

		register_post_type( $default['slug'], $args );
	}

	// ----------------------------------------
	// ! Call metabox builder.
	// ----------------------------------------

	function call_custom_page_metabox() {
		$default = array(
			'name' => '自定义页面',
			'slug' => 'cus_page'
		);
		add_meta_box('cus-page', '自定义页面', 'custom_page_metabox_builder', $default['slug'], 'normal', 'high');
		add_meta_box('cus-page-controller', '属性', 'custom_page_metabox_controller', $default['slug'], 'side', 'low');
	}

	// ----------------------------------------
	// ! metabox builder
	// ----------------------------------------

	function custom_page_metabox_builder() {

	}

	// ----------------------------------------
	// ! metabox controller
	// ----------------------------------------

	function custom_page_metabox_controller() {

	}

	// ----------------------------------------
	// ! Call when init wp.
	// ----------------------------------------

	if(!post_type_exists('cus_page'))
		add_action( 'init', 'custom_page' );


?>