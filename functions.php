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
			'name'               => 'Envato Market',
			'slug'               => 'envato-market',
			'required'           => false,
		),
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
			'force_activation'   => false,
		),
		array(
			'name'               => 'Favicon door RealFaviconGenerator',
			'slug'               => 'favicon-by-realfavicongenerator',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'UpdraftPlus - Backup/Restore',
			'slug'               => 'updraftplus',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'WP Mail SMTP',
			'slug'               => 'wp-mail-smtp',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'WordPress SEO by Yoast',
			'slug'               => 'wordpress-seo',
			'is_callable'        => 'wpseo_init',
			'required'           => false,
			'force_activation'   => false,
		),
		//Premium Plugins
		array(
			'name'               => 'SEO by Rank Math',
			'slug'               => 'seo-by-rank-math',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/seo-by-rank-math.zip',
		),
		
		array(
			'name'               => 'Elementor Pro',
			'slug'               => 'elementor-pro',
			'required'           => false,
			'force_activation'   => true,
			'source'             => get_stylesheet_directory().'/inc/plugins/elementor-pro.zip',
		),
		array(
			'name'               => 'Essential Addons for Elementor - Pro',
			'slug'               => 'essential-addons-elementor',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/essential-addons-elementor-pro.zip',
		),
		array(
			'name'               => 'The Plus Addons',
			'slug'               => 'theplus',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/theplus_elementor_addon.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Elements',
			'slug'               => 'jet-elements',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/jet-elements.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Popups',
			'slug'               => 'jet-popup',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/jet-popup.zip',
		),
		array(
			'name'               => 'Swift Performance',
			'slug'               => 'swift-performance',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/swift-performance.zip'
		),
		array(
			'name'               => 'WP Real Media Library',
			'slug'               => 'real-media-library',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/real-media-library.zip'
		),
		array(
			'name'               => 'Happy Files Pro',
			'slug'               => 'happyfiles',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/happyfiles-pro.zip'
		),
		array(
			'name'               => 'Mailpoet',
			'slug'               => 'mailpoet',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Mailpoet Premium',
			'slug'               => 'mailpoet-premium',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/mailpoet-premium.zip'
		),
	);
	$config = array(
		'id'                     => 'shs',
		'default_path'           => '',
		'menu'                   => 'shs-install-plugins', // Menu slug.
		'parent_slug'            => 'themes.php',
		'capability'             => 'edit_theme_options',
		'has_notices'            => false,
		'dismissable'            => true,
		'dismiss_msg'            => '',
		'is_automatic'           => true,
		'message'                => '',
	);
	tgmpa($plugins,$config);
}
