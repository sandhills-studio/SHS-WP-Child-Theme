<?php
//Add Styles
function parent_theme_enqueue_styles(){wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');}
add_action( 'wp_enqueue_scripts','parent_theme_enqueue_styles');
function child_theme_styles(){wp_enqueue_style('child-theme',get_stylesheet_directory_uri().'/style.css');}
add_action( 'wp_enqueue_scripts','child_theme_styles',1000);
//Hide Parent Theme
function remove_parent_theme($themes){
	unset($themes['generatepress']);
	return $themes;
}
add_filter('wp_prepare_themes_for_js','remove_parent_theme');