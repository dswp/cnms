<?php

// Add exta fields to the woo user registration form
function cnms_woo_extra_register_fields() { ?>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="skype_id"><?php _e( 'Skype ID', 'woocommerce' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="skype_id" size="25" id="skype_id" value="" />
	</p>
	<div class="clear"></div>
	<?php
}
add_action( 'woocommerce_register_form', 'cnms_woo_extra_register_fields' );

// Add exta fields to the WP user registration form
add_action( 'register_form', 'cnms_extra_register_fields' );
function cnms_extra_register_fields() {
	?>
	<p>
		<label for="skype_id"><?php _e( 'Skype ID', 'cnms' ); ?><br />
			<input type="text" name="skype_id" id="skype_id" size="25" class="input" value="" />
		</label>
	</p>
	<?php
}


// Fetch a user field by id
function get_current_user_field( $field ) {
	$user = get_user_meta( get_current_user_id() );
	return ( isset( $user[$field] ) ) ? $user[$field][0] : null;
}

// Show extra fields in WP user screens
function cnms_extra_user_fields( $user ) {
	?>
	<table class="form-table">
		<tr>
			<th><label for="skype_id"><?php _e( 'Skype ID', 'cnms' ); ?></label></th>
			<td>
				<input type="text" class="regular-text" name="skype_id" size="25" value="<?php echo get_current_user_field('skype_id'); ?>" id="skype_id"/><br/>
			</td>
		</tr>
	</table>
	<?php
}
add_action( 'show_user_profile', 'cnms_extra_user_fields' );
add_action( 'edit_user_profile', 'cnms_extra_user_fields' );
add_action( 'user_new_form', 'cnms_extra_user_fields' );

// Show extra fields in the woo user profile page
function cnms_woo_extra_user_fields( $user ) {
	?>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="skype_id"><?php _e( 'Skype ID', 'cnms' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="skype_id" size="25" id="skype_id" value="<?php echo get_current_user_field('skype_id'); ?>">
	</p>
	<?php
}
add_action( 'woocommerce_edit_account_form', 'cnms_woo_extra_user_fields' );


// Save extra fields hooks
function cnms_save_extra_register_fields( $user_id ) {
	if ( isset( $_POST['skype_id'] ) ) {
		update_user_meta( $user_id, 'skype_id', sanitize_text_field( $_POST['skype_id'] ) );
	}
}
add_action( 'woocommerce_created_customer', 'cnms_save_extra_register_fields' );
add_action( 'woocommerce_save_account_details', 'cnms_save_extra_register_fields' );
add_action( 'user_register', 'cnms_save_extra_register_fields' );
add_action( 'profile_update', 'cnms_save_extra_register_fields' );

// redirect after registration
function redirect_to_featured_movies( $redirect ) {
	return home_url( '/movie_category/featured/' ); // @todo get rid of hardcode, put the destination URL into the options
}
add_filter( 'woocommerce_registration_redirect', 'redirect_to_featured_movies' );


