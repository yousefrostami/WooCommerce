<?php
add_filter( 'woocommerce_is_purchasable', 'themefars_hide_add_cart_if_already_purchased', 9999, 2 );
function themefars_hide_add_cart_if_already_purchased( $is_purchasable, $product ) {
if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
$is_purchasable = false;}
return $is_purchasable;}
