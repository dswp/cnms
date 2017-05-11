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


// Show movies archive as a front page (for demo purpose)
add_action("pre_get_posts", "custom_front_page");
function custom_front_page($wp_query) {
	if ( is_admin() ) return;

	if ( $wp_query->get('page_id') == get_option('page_on_front') ) {
		$wp_query->set( 'post_type', 'movie' );
		$wp_query->set( 'page_id', '' );
		$wp_query->is_page = 0;
		$wp_query->is_singular = 0;
		$wp_query->is_post_type_archive = 1;
		$wp_query->is_archive = 1;
	}
}
