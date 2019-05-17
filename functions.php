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
			'name'      => 'BulletProof Security',
			'slug'      => 'bulletproof-security',
			'required'  => false,
		),
		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => false,
		),
		array(
			'name'      => 'Favicon door RealFaviconGenerator',
			'slug'      => 'favicon-by-realfavicongenerator',
			'required'  => false,
		),
		array(
			'name'      => 'UpdraftPlus - Backup/Restore',
			'slug'      => 'updraftplus',
			'required'  => false,
		),
		array(
			'name'      => 'WP Mail SMTP',
			'slug'      => 'wp-mail-smtp',
			'required'  => false,
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
		//Premium Plugins
		array(
			'name'      => 'Elementor Pro',
			'slug'      => 'elementor-pro',
			'required'  => false,
			'source'    => get_stylesheet_directory() . '/inc/plugins/elementor-pro.zip'
		),
		array(
			'name'      => 'Swift Performance',
			'slug'      => 'swift-performance',
			'required'  => false,
			'source'    => get_stylesheet_directory() . '/inc/plugins/swift-performance.zip'
		),
	);
	$config = array(
		'id'           => 'shs',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa($plugins,$config);
}
