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




// ----------------------------------------
// ! custom theme setting.
// ----------------------------------------
require_once('functions/core.php');
call_func(array(
	'remove-origin-tool-bar' => true,
	'protection-code' => true,
	'employee' => true,
	'browser-check' => true,
	'banner-option' => true,
	'add-setting' => true,
//	'qn/qn-support' => true
));

if(belowIE(8))
	browser_alert();

function browser_alert() {
	wp_die('<p>Please update your browser.</p>
			<p>请更新您的浏览器到较新的版本，点击下列列表中的浏览器，进入对应下载页面。</p>
			<ul>
				<li><a target="_blank" href="http://browser.qq.com/index_m.html">QQ浏览器（这个网页可酷，一般浏览器体会不了其奥妙哟）</a></li>
				<li><a target="_blank" href="http://se.360.cn/">360安全浏览器</a></li>
				<li>或者其它浏览器，看您的喜好。</li>
			</ul>
			<p>如果你仍然执着于IE，那么请下载一个IE 9版本（不支持xp系统）吧。IE8以下正在渐渐被淘汰。</p>
			<ul>
				<li><a target="_blank" href="http://soft.hao123.com/soft/appid/890.html">IE9(windows7 32位)</a></li>
				<li><a target="_blank" href="http://soft.hao123.com/soft/appid/895.html">IE9(windows7 64位)</a></li>
				<li><a target="_blank" href="http://www.baidu.com/s?ie=UTF-8&wd=ie10">IE10</a></li>
		    </ul>
			<p>为得到最佳体验效果，360浏览器下请以<span style="color:red">极速模式</span>访问，搜狗浏览器下以<span style="color:red">高速模式</span>访问。在地址栏右侧有模式切换的按钮，点击即可切换浏览模式。</p>
			<p>我们采用较新的技术，希望尊敬的用户您也能够自觉跟上时代的步伐哦！</p>
			');
}