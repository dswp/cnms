<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('parent-style')
		);
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

require_once( get_stylesheet_directory() . '/framework/movie-category-taxonomy.php' );
require_once( get_stylesheet_directory() . '/framework/movie-post-type.php' );
require_once( get_stylesheet_directory() . '/framework/movies-metabox.php' );
require_once( get_stylesheet_directory() . '/framework/movie-cpt-woocommerce-support.php' );
require_once( get_stylesheet_directory() . '/framework/custom-registration.php' );
