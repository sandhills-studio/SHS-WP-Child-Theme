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
add_action('tgmpa_register','yd_register_required_plugins');
function yd_register_required_plugins(){
	$plugins = array(
		//Plugin Manager
		array(
			'name'               => 'Arcadia CMS',
			'slug'               => 'arcadia',
			'source'             => 'https://github.com/yama-digital/YD-Manager/archive/refs/heads/master.zip',
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => true,
			'external_url'       => 'https://github.com/yama-digital/YD-Manager',
		),
		//WordPress.org Plugin Directory Must Have Plugins.
		array(
			'name'               => 'Envato Market',
			'slug'               => 'envato-market',
			'required'           => false,
		),
		array(
			'name'               => 'Woocommerce',
			'slug'               => 'woocommerce',
			'required'           => false,
		),
		array(
			'name'               => 'ManageWP - Worker',
			'slug'               => 'worker',
			'required'           => true,
			'force_activation'   => false,
		),
		array(
			'name'               => 'BulletProof Security',
			'slug'               => 'bulletproof-security',
			'required'           => false,
			'force_activation'   => false,
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
			'name'               => 'LiteSpeed Cache',
			'slug'               => 'litespeed-cache',
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
			'name'               => 'SEO by Rank Math',
			'slug'               => 'seo-by-rank-math',
			'required'           => false,
			'force_activation'   => false,
		),
		//Premium Plugins
		array(
			'name'               => 'Elementor Pro',
			'slug'               => 'elementor-pro',
			'required'           => false,
			'force_activation'   => false,
			'source'             => 'https://raw.githubusercontent.com/yama-digital/Arcadia-Theme/master/inc/plugins/elementor-pro.zip',
			'external_url'       => 'https://github.com/yama-digital/Arcadia-Theme',
		),
		array(
			'name'               => 'Essential Addons for Elementor - Lite',
			'slug'               => 'essential-addons-for-elementor-lite',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'Essential Addons for Elementor - Pro',
			'slug'               => 'essential-addons-elementor',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/essential-addons-elementor-pro.zip',
		),
		array(
			'name'               => 'The Plus Addons for Elementor Page Builder Lite',
			'slug'               => 'theplus-lite',
			'required'           => false,
			'force_activation'   => false,
		),
		array(
			'name'               => 'The Plus Addons for Elementor Page Builder',
			'slug'               => 'theplus',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/theplus_elementor_addon.zip',
		),
		array(
			'name'               => 'Dynamic.ooo - Dynamic Content for Elementor',
			'slug'               => 'dynamic-content-for-elementor',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/dynamic-content-for-elementor.zip',
		),
		//CrocoBlocks - Jet Elements
		array(
			'name'               => 'CrocoBlocks Interactive Kit',
			'slug'               => 'crocoblock-interactive-kit',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/crocoblock-interactive-kit.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Appointments Booking',
			'slug'               => 'jet-appointments-booking',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-appointments-booking.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Blocks',
			'slug'               => 'jet-blocks',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-blocks.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Blog',
			'slug'               => 'jet-blog',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-blog.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Booking',
			'slug'               => 'jet-booking',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-booking.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Compare Wishlist',
			'slug'               => 'jet-compare-wishlist',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-compare-wishlist.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Elements',
			'slug'               => 'jet-elements',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-elements.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Engine',
			'slug'               => 'jet-engine',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-engine.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Menu',
			'slug'               => 'jet-menu',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-menu.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Popups',
			'slug'               => 'jet-popup',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-popup.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Reviews',
			'slug'               => 'jet-reviews',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-reviews.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Search',
			'slug'               => 'jet-search',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-search.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Smart Filters',
			'slug'               => 'jet-smart-filters',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-smart-filters.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Style Manager',
			'slug'               => 'jet-style-manager',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-style-manager.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Tabs',
			'slug'               => 'jet-tabs',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-tabs.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Theme Core',
			'slug'               => 'jet-theme-core',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-theme-core.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Woo Builder',
			'slug'               => 'jet-woo-builder',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-woo-builder.zip',
		),
		array(
			'name'               => 'CrocoBlocks Jet Woo Product Gallery',
			'slug'               => 'jet-woo-product-gallery',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/crocoblocks/jet-woo-product-gallery.zip',
		),
		//Optimisation
		array(
			'name'               => 'Swift Performance',
			'slug'               => 'swift-performance',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/swift-performance.zip'
		),
		//Media Organisation
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
		//Marketing Mails
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
		/*WooCommerce Plugins*/
		array(
			'name'               => 'Woostify Pro',
			'slug'               => 'woostify-pro',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/woostify-pro.zip'
		),
		/*Modern Event Calendar*/
		/*array(
			'name'               => 'Modern Events Calendar',
			'slug'               => 'mec',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/modern-events-calendar.zip'
		),
		array(
			'name'               => 'MEC Fluent-view Layouts',
			'slug'               => 'modern-events-calendar',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/mec-fluent-layouts.zip'
		),
		array(
			'name'               => 'Elementor Form Builder for MEC',
			'slug'               => 'mec-form-builder',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/mec-form-builder.zip'
		),
		array(
			'name'               => 'Elementor Shortcode Builder for MEC',
			'slug'               => 'mec-shortcode-builder',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/mec-shortcode-builder.zip'
		),
		array(
			'name'               => 'Elementor Shortcode Designer',
			'slug'               => 'mec-shortcode-designer',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/mec-shortcode-designer.zip'
		),
		array(
			'name'               => 'Elementor Single Builder for MEC',
			'slug'               => 'mec-single-builder',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/mec-single-builder.zip'
		),
		array(
			'name'               => 'WooCommerce Integration for MEC',
			'slug'               => 'mec-woocommerce',
			'required'           => false,
			'force_activation'   => false,
			'source'             => get_stylesheet_directory().'/inc/plugins/modern-events-calendar-pro/mec-woocommerce.zip'
		),*/
	);
	$config = array(
		'id'                     => 'arc',
		'default_path'           => '',
		'menu'                   => 'arc-install-plugins', // Menu slug.
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
