<?php 
/*
Plugin Name: Coworking Neuchatel WooCommerce
Plugin URI: https://coworking-neuchatel.ch
Description: Optimisations de WooCommerce.
Version: 0.0.1
Author: Manuel Schmalstieg
Author URI: http://ms-studio.net
*/


if ( class_exists( 'WooCommerce' ) ) {
  
  // pour les pages WooCommerce, ajouter la classe no-sidebar-full:
  add_filter( 'body_class', 'woo_cowork_custom_class' );
  
  function woo_cowork_custom_class( $classes ) {
      if ( is_woocommerce() ) {
          $classes[] = 'no-sidebar-full';
      }
      return $classes;
  }
  
  
  // Rendre des champs optionnels lors de la commande
  
  // Hook in
  // add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
  
  // Our hooked in function - $address_fields is passed via the filter!
  function custom_override_default_address_fields( $address_fields ) {
       // $address_fields['address_1']['required'] = false;
  
       return $address_fields;
  }
  
}




