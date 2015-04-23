<?php

 
 /* Allow Automatic Updates
  ******************************
  * http://codex.wordpress.org/Configuring_Automatic_Background_Updates
  */
 
 add_filter( 'auto_update_plugin', '__return_true' );
 add_filter( 'auto_update_theme', '__return_true' );
 add_filter( 'allow_major_auto_core_updates', '__return_true' );
 
 
add_action( 'after_setup_theme', 'my_child_theme_setup' );
function my_child_theme_setup() {
    load_theme_textdomain( 'edin', get_stylesheet_directory() . '/languages' );
   
}

add_action( 'widgets_init', 'cowork_register_sidebar' );
if ( ! function_exists( 'cowork_register_sidebar' ) ) :
	/**
	 * Register the sidebars
	 */
	function cowork_register_sidebar() {
		register_sidebar( array(
			'name'=> __( 'Powered By', 'cowork' ),
			'id' => 'powered_sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		) );		
	}

endif; // cowork_register_sidebar
 
 
 /* Allowed FileTypes
  ********************
  * method based on 
  * http://howto.blbosti.com/?p=329
  * List of defaults: https://core.trac.wordpress.org/browser/tags/3.8.1/src/wp-includes/functions.php#L1948
 */
 
 add_filter('upload_mimes', 'custom_upload_mimes');
 function custom_upload_mimes ( $existing_mimes=array() ) {
 
 		// add your extension to the array
 		$existing_mimes['svg'] = 'image/svg+xml';
 
 		// removing existing file types
 		unset( $existing_mimes['bmp'] );
 		unset( $existing_mimes['tif|tiff'] );
 
 		// and return the new full result
 		return $existing_mimes;
 }
 
 
 /* we wanted to allow any logged-in user to view our private posts and pages
  * http://stephanieleary.com/2010/02/changing-roles-capabilities/
  */
  // allow subscribers to view private posts and pages
//  $PrivateRole = get_role('subscriber');
//  $PrivateRole -> add_cap('read_private_pages');
//  $PrivateRole -> add_cap('read_private_posts');
  
  // N.B.: This setting is saved to the database (in table wp_options, field wp_user_roles), so it might be better to run this on theme/plugin activation
  // http://codex.wordpress.org/Function_Reference/add_cap
  
  
  function the_title_trim($title) {
  	$title = esc_attr($title);
  	$findthese = array(
  		'#Privé&nbsp;:#'
  	);
  	$replacewith = array(
  		'' // What to replace "Private:" with
  	);
  	$title = preg_replace($findthese, $replacewith, $title);
  	return $title;
  }
  add_filter('the_title', 'the_title_trim');
  
  
 
 /*
  * File Upload Security
  
  * Sources: 
  * http://www.geekpress.fr/wordpress/astuce/suppression-accents-media-1903/
  * https://gist.github.com/herewithme/7704370
  
  * See also Ticket #22363
  * https://core.trac.wordpress.org/ticket/22363
  * and #24661 - remove_accents is not removing combining accents
  * https://core.trac.wordpress.org/ticket/24661
 */ 
 
 add_filter( 'sanitize_file_name', 'remove_accents', 10, 1 );
 add_filter( 'sanitize_file_name_chars', 'sanitize_file_name_chars', 10, 1 );
  
 function sanitize_file_name_chars( $special_chars = array() ) {
 	$special_chars = array_merge( array( '’', '‘', '“', '”', '«', '»', '‹', '›', '—', 'æ', 'œ', '€','é','à','ç','ä','ö','ü','ï','û','ô','è' ), $special_chars );
 	return $special_chars;
 }
 
 
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
 
 
/*
 * gallery shortcode improvement
 * makes it link to the "large" file (not full size) 
 
 * http://oikos.org.uk/2011/09/tech-notes-using-resized-images-in-wordpress-galleries-and-lightboxes/
*/

function bcf_get_attachment_link_filter( $content, $post_id, $size, $permalink ) {
 
    // Only do this if we're getting the file URL
    if (! $permalink) {
        // This returns an array of (url, width, height)
        $image = wp_get_attachment_image_src( $post_id, 'large' );
        $new_content = preg_replace('/href=\'(.*?)\'/', 'href=\'' . $image[0] . '\'', $content );
        return $new_content;
    } else {
        return $content;
    }
}
 
add_filter('wp_get_attachment_link', 'bcf_get_attachment_link_filter', 10, 4);

