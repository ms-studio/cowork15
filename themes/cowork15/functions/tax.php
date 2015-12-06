<?php 


/* Custom taxonomies
 ********************
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 * http://codex.wordpress.org/Function_Reference/register_post_type
*/

function custom_taxonomies() 
{  	 

		register_post_type(
			'rendez-vous', array(	
				'label' => 'Rendez-vous',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_icon' => 'dashicons-megaphone', // src: http://melchoyce.github.io/dashicons/
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array('slug' => ''),
				'query_var' => true,
				'exclude_from_search' => false,
				'menu_position' => 8,
				'supports' => array('title','editor','custom-fields','comments','author'),
				'taxonomies' => array(),
				'labels' => array (
			  	  'name' => 'Rendez-vous',
			  	  'singular_name' => 'Rendez-vous',
			  	  'menu_name' => 'Rendez-vous',
			  	  'add_new' => 'Ajouter',
			  	  'add_new_item' => 'Ajouter un rendez-vous',
			  	  'edit' => 'Modifier',
			  	  'edit_item' => 'Modifier le rendez-vous',
			  	  'new_item' => 'Nouveau rendez-vous',
			  	  'view' => 'Afficher',
			  	  'view_item' => 'Afficher le rendez-vous',
			  	  'search_items' => 'Rechercher',
			  	  'not_found' => 'Aucun résultat',
			  	  'not_found_in_trash' => 'Aucun résultat',
			  	  'parent' => 'Élément Parent',
			),) );


} // end custom_taxonomies()  function
 //hook into the init action and call custom_taxonomies() when it fires
 add_action( 'init', 'custom_taxonomies', 0 ); 
