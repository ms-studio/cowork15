<?php
/*
Plugin Name: Coworking Neuchatel Traductions
Plugin URI: https://coworking-neuchatel.ch
Description: Personalise des traductions.
Version: 0.0.1
Author: Manuel Schmalstieg
Author URI: http://ms-studio.net
*/


/* Custom translation strings
 */

/*
 * Replace 'textdomain' with your plugin's textdomain. e.g. 'woocommerce'. 
 * File to be named, for example, yourtranslationfile-en_GB.mo
 * File to be placed, for example, wp-content/lanaguages/textdomain/yourtranslationfile-en_GB.mo
 */
function load_custom_plugin_translation_file( $mofile, $domain ) {
	
	// folder location
	$folder = WP_PLUGIN_DIR . '/cwn-functions/languages/';
	
	// filename ending
	$file = '-' . get_locale() . '.mo';
	
	$plugins = array(
		// 'woocommerce',
		'subscriptio',
		'woocommerce-membership'
	);
	
	foreach ($plugins as &$plugin) {
		if ( $plugin === $domain ) {
			$mofile = $folder.$domain.$file;
		}
	}
	
  return $mofile;

}

add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file', 10, 2 );


// filtering for Active => Actif

function cwn_subscriptio_formatted_status($title){
    
    if ($title == 'Active') {
    	$title = 'Actif';
    }
    return $title;
}
add_filter('subscriptio_formatted_status','cwn_subscriptio_formatted_status');




/*
* End of file
*/