<?php

/* Jetpack Stuff
* see: http://jeremyherve.com/2013/11/19/customize-the-list-of-modules-available-in-jetpack/
 * Disable all non-whitelisted jetpack modules.
 *
 * This will allow all of the currently available Jetpack modules to work
 * normally. If there's a module you'd like to disable, simply comment it out
 * or remove it from the whitelist and it will no longer load.
 *
 * @author FAT Media, LLC
 * @link   http://wpbacon.com/tutorials/disable-jetpack-modules/
 */


 /* Jetpack Stuff
 * see: http://jeremyherve.com/2013/11/19/customize-the-list-of-modules-available-in-jetpack/
  * Disable all non-whitelisted jetpack modules.
  *
  * This will allow all of the currently available Jetpack modules to work
  * normally. If there's a module you'd like to disable, simply comment it out
  * or remove it from the whitelist and it will no longer load.
  *
  * @author FAT Media, LLC
  * @link   http://wpbacon.com/tutorials/disable-jetpack-modules/
  */
  
  
  function prefix_kill_all_the_jetpacks( $modules ) {
  	// A list of Jetpack modules which are allowed to activate.
  	$whitelist = array(
  //		'after-the-deadline',
  		'carousel',
  //		'comments',
//  		'contact-form',
//  		'custom-css',
		 'custom-content-types', // = Testimonials, Portfolio...
  		'enhanced-distribution',
//  		'gplus-authorship',
//  		'gravatar-hovercards',
//  		'infinite-scroll',
//  		'json-api',
//  		'latex',
//  		'likes',
 		'markdown',
//  		'minileven', = Theme pour portables
//  		'mobile-push',
  		'monitor',
//  		'notes',
//  		'omnisearch',
//  		'photon',
//  		'post-by-email',
  		'protect',
  		
  		'publicize',
  		
  		'related-posts',
  		
  		'sharedaddy',
//  		'shortcodes',
//  		'shortlinks',
//  		'sso', Authentification unique
//  		'stats',
//  		'subscriptions',
  		'tiled-gallery',
//  		'vaultpress',
//  		'videopress',
  		'widget-visibility',
//  		'widgets', Extra sidebar widgets
  	);
  	
  	// Deactivate all non-whitelisted modules.
  	$modules = array_intersect_key( $modules, array_flip( $whitelist ) );
  	return $modules;
 }
 
add_filter( 'jetpack_get_available_modules', 'prefix_kill_all_the_jetpacks' );
 
 
 /* Hide Jetpack for non-admins */
 
 function ap_remove_jetpack_page( ) {
 		if ( class_exists( 'Jetpack' ) && !current_user_can( 'manage_options' ) ) {
 					remove_menu_page( 'jetpack' );
 				}
 }
 add_action( 'admin_menu', 'ap_remove_jetpack_page', 999 );
 
 /* Remove Publicize Support for WooCommerce products */

add_action( 'init', 'my_remove_post_type_support', 10 );
function my_remove_post_type_support() {
    remove_post_type_support( 'product', 'publicize' );
}
