<?php

/* Custom translation strings
 */


// remove_action( 'bp_core_loaded', 'bp_core_load_buddypress_textdomain' );
// = completely disables the buddypress translation

add_action( 'plugins_loaded', 'cowork_load_textdomain', 1 ); // must be earlier than 10!

function cowork_load_textdomain() {
			
			// woocommerce
			
			load_plugin_textdomain( 
				'woocommerce',
				false, 
				'cwn-functions/languages/' //
			);
			
			// subscriptio
			
			load_plugin_textdomain( 
				'subscriptio',
				false, 
				'cwn-functions/languages/'
			);
			
			// woocommerce-membership
			
			load_plugin_textdomain( 
				'woocommerce-membership',
				false, 
				'cwn-functions/languages/'
			);
			
			// woocommerce-pdf-invoice
			
			load_plugin_textdomain( 
				'woo_pdf',
				false, 
				'cwn-functions/languages/'
			);
			
}


// A stronger override for WooCommerce

// Code to be placed in functions.php of your theme or a custom plugin file.
add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file', 10, 2 );

/*
 * Replace 'textdomain' with your plugin's textdomain. e.g. 'woocommerce'. 
 * File to be named, for example, yourtranslationfile-en_GB.mo
 * File to be placed, for example, wp-content/lanaguages/textdomain/yourtranslationfile-en_GB.mo
 */
function load_custom_plugin_translation_file( $mofile, $domain ) {

  if ( 'woocommerce' === $domain ) {
    // $mofile = WP_PLUGIN_DIR . '/textdomain/yourtranslationfile-' . get_locale() . '.mo';
    $mofile = WP_PLUGIN_DIR . '/cwn-functions/languages/woocommerce-' . get_locale() . '.mo';
  }
  return $mofile;
}




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