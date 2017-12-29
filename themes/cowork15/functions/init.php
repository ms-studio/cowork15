<?php

/**
 * Text Domain
 */
 

function my_child_theme_setup() {
    load_theme_textdomain( 'edin', get_stylesheet_directory() . '/languages' );
    
    register_nav_menus( array(
    	'membres_neuch'   => __( 'Membres Neuchâtel', 'cowork' ),
    ) );
   
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );



add_action( 'widgets_init', 'cowork_register_sidebar' );
if ( ! function_exists( 'cowork_register_sidebar' ) ) :
	/**
	 * Register the sidebars
	 */
	function cowork_register_sidebar() {
		
		// Espace Sponsors
//		register_sidebar( array(
//			'name'=> __( 'Powered By', 'cowork' ),
//			'id' => 'powered_sidebar',
//			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//			'after_widget' => '</aside>',
//			'before_title' => '<h3 class="widgettitle">',
//			'after_title' => '</h3>'
//		) );	
		
		// Hero pour Front Page
		register_sidebar( array(
			'name'=> __( 'FrontPage Gallery', 'cowork' ),
			'id' => 'frontpage_gallery',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		) );
			
	}

endif; // cowork_register_sidebar
 
 
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
  


