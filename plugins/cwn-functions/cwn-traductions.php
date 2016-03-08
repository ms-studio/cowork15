<?php

/* Custom translation strings
 */


// remove_action( 'bp_core_loaded', 'bp_core_load_buddypress_textdomain' );
// = completely disables the buddypress translation

add_action( 'plugins_loaded', 'cowork_load_textdomain', 1 ); // must be earlier than 10!

function cowork_load_textdomain() {
			
			// subscriptio
			
			load_plugin_textdomain( 
				'subscriptio',
				false, 
				'cwn-functions/languages/' // relative to WP_PLUGIN_DIR
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


/*
* End of file
*/