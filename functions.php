<?php
//Add Styles
function parent_theme_enqueue_styles(){wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css');}
add_action('wp_enqueue_scripts','parent_theme_enqueue_styles');
function child_theme_styles(){wp_enqueue_style('child-theme',get_stylesheet_directory_uri().'/style.css');}
add_action('wp_enqueue_scripts','child_theme_styles',1000);
//Hide Parent Theme
function remove_parent_theme($themes){
	unset($themes['generatepress']);
	return $themes;
}
add_filter('wp_prepare_themes_for_js','remove_parent_theme');
//TGM-Plugin
require_once get_stylesheet_directory().'/class-tgm-plugin-activation.php';
add_action('tgmpa_register','shs_register_required_plugins');
function shs_register_required_plugins(){
	$plugins = array(
		//SHS Manager
		array(
			'name'               => 'Sandhills Studio Manager',
			'slug'               => 'shs-manager',
			'source'             => 'https://github.com/sandhills-studio/Sandhills-Studio-Manager/archive/master.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => true,
			'external_url'       => 'https://github.com/sandhills-studio/Sandhills-Studio-Manager',
		),
		//WordPress.org Plugin Directory Must Have Plugins.
		array(
			'name'               => 'ManageWP - Worker',
			'slug'               => 'worker',
			'required'           => true,
			'force_activation'   => true,
		),
		array(
			'name'               => 'BulletProof Security',
			'slug'               => 'bulletproof-security',
			'required'           => false,
			'force_activation'   => true,
		),
		array(
			'name'               => 'Elementor',
			'slug'               => 'elementor',
			'required'           => false,
			'force_activation'   => true,
		),
		array(
			'name'               => 'Favicon door RealFaviconGenerator',
			'slug'               => 'favicon-by-realfavicongenerator',
			'required'  => false,
			'force_activation'   => true,
		),
		array(
			'name'               => 'UpdraftPlus - Backup/Restore',
			'slug'               => 'updraftplus',
			'required'           => false,
			'force_activation'   => true,
		),
		array(
			'name'               => 'WP Mail SMTP',
			'slug'               => 'wp-mail-smtp',
			'required'           => false,
			'force_activation'   => true,
		),
		array(
			'name'                 => 'WordPress SEO by Yoast',
			'slug'                 => 'wordpress-seo',
			'is_callable'          => 'wpseo_init',
			'force_activation'     => true,
		),
		//Premium Plugins
		array(
			'name'               => 'Elementor Pro',
			'slug'               => 'elementor-pro',
			'required'           => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/elementor-pro.zip',
			'force_activation'   => true,
		),
		array(
			'name'               => 'Swift Performance',
			'slug'               => 'swift-performance',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/swift-performance.zip'
		),
	);
	$config = array(
		'id'           => 'shs',
		'default_path' => '',
		'menu'         => 'shs-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => false,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);
	tgmpa($plugins,$config);
}
