<?php

/**
 * Extend Product Datastore class to allow 'Movie' CPT as a product.
 * Override parrent's class methods to support 'Movie' CPT as well
 *
 * @see https://github.com/woocommerce/woocommerce/wiki/Data-Stores
 **/

class Movie_Product_Data_Store_CPT extends WC_Product_Data_Store_CPT {

    public function get_product_type( $product_id ) {
        $post_type = get_post_type( $product_id );
        if ( 'product_variation' === $post_type ) {
            return 'variation';
        } elseif ( in_array( $post_type, array( 'movie', 'product' ) ) ) {
            $terms = get_the_terms( $product_id, 'product_type' );
            return ! empty( $terms ) ? sanitize_title( current( $terms )->name ) : 'simple';
        } else {
            return false;
        }
    }

    public function read( &$product ) {

        $product->set_defaults();

        if ( ! $product->get_id() || ! ( $post_object = get_post( $product->get_id() ) ) || ! in_array( $post_object->post_type, array( 'movie', 'product' ) ) ) {
            throw new Exception( __( 'Invalid product.', 'woocommerce' ) );
        }

        $id = $product->get_id();

        $product->set_props( array(
            'name'              => $post_object->post_title,
            'slug'              => $post_object->post_name,
            'date_created'      => 0 < $post_object->post_date_gmt ? wc_string_to_timestamp( $post_object->post_date_gmt ) : null,
            'date_modified'     => 0 < $post_object->post_modified_gmt ? wc_string_to_timestamp( $post_object->post_modified_gmt ) : null,
            'status'            => $post_object->post_status,
            'description'       => $post_object->post_content,
            'short_description' => $post_object->post_excerpt,
            'parent_id'         => $post_object->post_parent,
            'menu_order'        => $post_object->menu_order,
            'reviews_allowed'   => 'open' === $post_object->comment_status,
        ) );

        $this->read_attributes( $product );
        $this->read_downloads( $product );
        $this->read_visibility( $product );
        $this->read_product_data( $product );
        $this->read_extra_data( $product );
        $product->set_object_read( true );
    }

}

add_filter( 'woocommerce_data_stores', 'woocommerce_data_stores' );
function woocommerce_data_stores ( $stores ) {
    $stores['product'] = 'Movie_Product_Data_Store_CPT';
    return $stores;
}


// When the_post is called, put product data into a global.
function cnms_setup_product_data( $post ) {

    if ($post->post_type !== 'movie') return;

    remove_filter( current_filter(), __FUNCTION__ );
    if ( is_int( $post ) )
        $post = get_post( $post );

    unset( $GLOBALS['product'] );

    $GLOBALS['product'] = wc_get_product( $post );
}
add_action( 'the_post', 'cnms_setup_product_data', 999 );

// add necessery body class to support default theme styling
function cnms_body_class( $classes ) {
    $classes = (array) $classes;

    if ( is_singular( 'movie' ) ) {
        $classes[] = 'single-product';
    }
    return $classes;
}
add_filter( 'body_class', 'cnms_body_class' );

function cnms_product_post_class( $classes, $class = '', $post_id = '' ) {
    $post = get_post( $post_id );

    $product = wc_get_product( $post_id );

    if ( $product ) {
        $classes[] = 'product';
        $classes[] = wc_get_loop_class();
        $classes[] = $product->get_stock_status();
    }

    if ( false !== ( $key = array_search( 'hentry', $classes ) ) ) {
        unset( $classes[ $key ] );
    }

    return $classes;
}
add_filter( 'post_class', 'cnms_product_post_class', 20, 3 );


// Returns true if on a page which uses WooCommerce templates
function cnms_is_woocommerce( $is_woocommerce ) {
    return ( $is_woocommerce || is_singular( 'movie' ) || is_archive( 'movie' ) );
}
add_filter( 'is_woocommerce', 'cnms_is_woocommerce' );
