<?php

/* Custom translation strings
 */


// remove_action( 'bp_core_loaded', 'bp_core_load_buddypress_textdomain' );
// = completely disables the buddypress translation

add_action( 'plugins_loaded', 'cowork_load_textdomain', 1 ); // must be earlier than 10!

function cowork_load_textdomain() {
			
			// 
			
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