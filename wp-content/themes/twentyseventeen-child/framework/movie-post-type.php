<?php
function movie_post_type() {

	$labels = array(
		'name'                  => _x( 'Movies', 'Post Type General Name', 'cnms' ),
		'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'cnms' ),
		'menu_name'             => __( 'Movies', 'cnms' ),
		'name_admin_bar'        => __( 'Movies', 'cnms' ),
		'archives'              => __( 'Movie Archives', 'cnms' ),
		'attributes'            => __( 'Movie Attributes', 'cnms' ),
		'parent_item_colon'     => __( 'Parent Movie:', 'cnms' ),
		'all_items'             => __( 'All Movies', 'cnms' ),
		'add_new_item'          => __( 'Add New Movie', 'cnms' ),
		'add_new'               => __( 'Add New', 'cnms' ),
		'new_item'              => __( 'New Movie', 'cnms' ),
		'edit_item'             => __( 'Edit Movie', 'cnms' ),
		'update_item'           => __( 'Update Movie', 'cnms' ),
		'view_item'             => __( 'View Movie', 'cnms' ),
		'view_items'            => __( 'View Movies', 'cnms' ),
		'search_items'          => __( 'Search Movie', 'cnms' ),
		'not_found'             => __( 'Not found', 'cnms' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cnms' ),
		'featured_image'        => __( 'Featured Image', 'cnms' ),
		'set_featured_image'    => __( 'Set featured image', 'cnms' ),
		'remove_featured_image' => __( 'Remove featured image', 'cnms' ),
		'use_featured_image'    => __( 'Use as featured image', 'cnms' ),
		'insert_into_item'      => __( 'Insert into Movie', 'cnms' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'cnms' ),
		'items_list'            => __( 'Items list', 'cnms' ),
		'items_list_navigation' => __( 'Items list navigation', 'cnms' ),
		'filter_items_list'     => __( 'Filter Movies list', 'cnms' ),
	);
	$args = array(
		'label'                 => __( 'Movie', 'cnms' ),
		'description'           => __( 'Movie product', 'cnms' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'            => array( 'movie_category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-editor-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'movie', $args );

}
add_action( 'init', 'movie_post_type', 0 );
