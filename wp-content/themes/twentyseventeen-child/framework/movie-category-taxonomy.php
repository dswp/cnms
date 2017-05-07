<?php
function movie_category_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Movie Categories', 'Taxonomy General Name', 'cnms' ),
		'singular_name'              => _x( 'Movie Category', 'Taxonomy Singular Name', 'cnms' ),
		'menu_name'                  => __( 'Movie Categories', 'cnms' ),
		'all_items'                  => __( 'All Categories', 'cnms' ),
		'parent_item'                => __( 'Parent Category', 'cnms' ),
		'parent_item_colon'          => __( 'Parent Category:', 'cnms' ),
		'new_item_name'              => __( 'New Category Name', 'cnms' ),
		'add_new_item'               => __( 'Add New Category', 'cnms' ),
		'edit_item'                  => __( 'Edit Category', 'cnms' ),
		'update_item'                => __( 'Update Category', 'cnms' ),
		'view_item'                  => __( 'View Category', 'cnms' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'cnms' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'cnms' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'cnms' ),
		'popular_items'              => __( 'Popular Categories', 'cnms' ),
		'search_items'               => __( 'Search Categories', 'cnms' ),
		'not_found'                  => __( 'Not Found', 'cnms' ),
		'no_terms'                   => __( 'No Categories', 'cnms' ),
		'items_list'                 => __( 'Categories list', 'cnms' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'cnms' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'movie_category', array( 'movie' ), $args );

}
add_action( 'init', 'movie_category_taxonomy', 0 );
