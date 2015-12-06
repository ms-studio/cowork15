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
 
 
 
 
 /* Allow Automatic Updates
  ******************************
  * http://codex.wordpress.org/Configuring_Automatic_Background_Updates
  */
 
 add_filter( 'auto_update_plugin', '__return_true' );
 add_filter( 'auto_update_theme', '__return_true' );
 add_filter( 'allow_major_auto_core_updates', '__return_true' );
 
 

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


