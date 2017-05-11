<?php
function movie_product_options_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return null;
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
		<label for="movie_product_options_subtitle"><?php _e( 'Subtitle', 'cnms' ); ?></label><br>
		<input type="text" name="movie_product_options_subtitle" id="movie_product_options_subtitle" value="<?php echo movie_product_options_get_meta( 'movie_product_options_subtitle' ); ?>" style="width: 100%;">
	</p>
	<p>
		<label for="_price"><?php _e( 'Price', 'cnms' ); ?></label><br>
		<input type="text" name="_price" id="_price" value="<?php echo movie_product_options_get_meta( '_price' ); ?>">
	</p>
	<?php
}

function movie_product_options_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['movie_product_options_nonce'] ) || ! wp_verify_nonce( $_POST['movie_product_options_nonce'], '_movie_product_options_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['movie_product_options_subtitle'] ) )
		update_post_meta( $post_id, 'movie_product_options_subtitle', esc_attr( $_POST['movie_product_options_subtitle'] ) );

	if ( isset( $_POST['_price'] ) )
		update_post_meta( $post_id, '_price',  floatval( esc_attr( $_POST['_price'] ) ) );
}
add_action( 'save_post', 'movie_product_options_save' );

