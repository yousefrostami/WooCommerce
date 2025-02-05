<?php
// حذف فیلد کمپانی، ایمیل، کدپستی، آدرس 2

function liamWp_remove_specific_checkout_fields( $fields ) {
    // Billing fields
    unset( $fields['billing']['billing_company'] );
    unset( $fields['billing']['billing_email'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    unset( $fields['shipping']['shipping_email'] );
    unset( $fields['shipping']['shipping_company'] );
    unset( $fields['shipping']['shipping_address_2'] );
    unset( $fields['shipping']['shipping_postcode'] );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'liamWp_remove_specific_checkout_fields' );

// یکی کردن فیلد نام و نام خانوادگی و غیرضروری کردن آدرس و تغییر متن پیشفرض آدرس 
function liamWp_customize_name_address_fields($fields)
{

    // Billing fields
    unset($fields['billing']['billing_last_name']);

    // Shipping fields
    unset($fields['shipping']['shipping_last_name']);

    $fields['billing']['billing_address_1']['required'] = false;
    $fields['shipping']['shipping_address_1']['required'] = false;

    $fields['shipping']['shipping_first_name'] = array(
        'label'     => "نام و نام خانوادکی",
        'placeholder'   => "نام و نام خانوادگی",
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'required'  => true,
    );
    $fields['billing']['billing_first_name'] = array(
        'label'     => "نام و نام خانوادگی",
        'placeholder'   => "نام و نام خانوادگی",
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'required'  => true,
    );
    $fields['billing']['billing_address_1'] = array(
        'label'     => "آدرس کامل",
        'placeholder'   => "آدرس دقیق را وارد کنید",
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'required'  => true,
    );

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'liamWp_customize_name_address_fields');

// تغییر ترتیب نمایش فیلدها بصورت دلخواه
function liamWp_reorder_checkout_fields( $fields ) {

    $fields['billing']['billing_first_name']['priority'] = 10;
    $fields['billing']['billing_phone']['priority'] = 20;
    $fields['billing']['billing_email']['priority'] = 30;
    $fields['billing']['billing_country']['priority'] = 40;
    $fields['billing']['billing_state']['priority'] = 50;
    $fields['billing']['billing_city']['priority'] = 60;
    $fields['billing']['billing_address_1']['priority'] = 70;
    $fields['billing']['billing_postcode']['priority'] = 80;

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'liamWp_reorder_checkout_fields' );
