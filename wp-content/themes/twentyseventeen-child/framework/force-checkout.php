<?php
// skip past the cart page and go straight to the checkout page
function cnms_add_to_cart_redirect( $wc_get_cart_url ) {
	return WC()->cart->get_checkout_url();
}
add_filter('woocommerce_add_to_cart_redirect', 'cnms_add_to_cart_redirect');


// replace default Add to cart button text
function cnms_cart_button_text() {
	return __( 'Buy Now', 'cnms' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'cnms_cart_button_text' );
