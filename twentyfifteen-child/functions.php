<?php
function myThemeEnqueueStyles() {
	// enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
	// enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array('child-theme'));
}
add_action('wp_enqueue_scripts', 'myThemeEnqueueStyles');