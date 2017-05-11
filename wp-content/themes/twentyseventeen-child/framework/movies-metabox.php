<?php
function movie_product_options_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return 1;
	}
}

function movie_product_options_add_meta_box() {
	add_meta_box(
		'movie_product_options-movie-product-options',
		__( 'Movie Product Options', 'cnms' ),
		'movie_product_options_html',
		'movie',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'movie_product_options_add_meta_box' );

function movie_product_options_html( $post) {
	wp_nonce_field( '_movie_product_options_nonce', 'movie_product_options_nonce' ); ?>

	<p>
		<label for="movie_product_options_price"><?php _e( 'Price', 'cnms' ); ?></label><br>
		<input type="text" name="movie_product_options_price" id="movie_product_options_price" value="<?php echo movie_product_options_get_meta( 'movie_product_options_price' ); ?>">
	</p><?php
}

function movie_product_options_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['movie_product_options_nonce'] ) || ! wp_verify_nonce( $_POST['movie_product_options_nonce'], '_movie_product_options_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['movie_product_options_price'] ) )
		update_post_meta( $post_id, 'movie_product_options_price', esc_attr( $_POST['movie_product_options_price'] ) );
}
add_action( 'save_post', 'movie_product_options_save' );

movie_product_options_get_meta( 'movie_product_options_price' );

/*
* Return woocommerce price value from CPT custom field
*/
function cnms_woocommerce_get_price( $price, $post ) {
	if ( $post->post->post_type === 'movie' ) {
		$price = movie_product_options_get_meta( 'movie_product_options_price' );
	}
	return $price;
}
add_filter( 'woocommerce_product_get_price','cnms_woocommerce_get_price', 20, 2 );
