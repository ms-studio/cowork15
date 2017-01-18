<?php

/* Custom taxonomies
 ********************
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 * http://codex.wordpress.org/Function_Reference/register_post_type
*/

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Livres', 'Post Type General Name', 'edin' ),
		'singular_name'       => _x( 'Livre', 'Post Type Singular Name', 'edin' ),
		'menu_name'           => __( 'Livres', 'edin' ),
		'name_admin_bar'      => __( 'Livre', 'edin' ),
		'parent_item_colon'   => __( 'Elément parent:', 'edin' ),
		'all_items'           => __( 'Tous les livres', 'edin' ),
		'add_new_item'        => __( 'Ajouter', 'edin' ),
		'add_new'             => __( 'Ajouter', 'edin' ),
		'new_item'            => __( 'Nouveau livre', 'edin' ),
		'edit_item'           => __( 'Modifier', 'edin' ),
		'update_item'         => __( 'Mettre à jour', 'edin' ),
		'view_item'           => __( 'Afficher', 'edin' ),
		'search_items'        => __( 'Recherche', 'edin' ),
		'not_found'           => __( 'Aucun résultat', 'edin' ),
		'not_found_in_trash'  => __( 'Aucun résultat dans la corbeille', 'edin' ),
	);
	
	$args = array(
		'label'               => __( 'Livres', 'edin' ),
		'description'         => __( 'Les livres de la bibliothèque coworking', 'edin' ),
		'labels'              => $labels,
		'supports'            => array(
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'comments',
				'revisions',
				'thumbnail',
				'author',
				'publicize',
			),
		'taxonomies'          => array( 'cwn_thematique' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon' => 'dashicons-book', // src: http://melchoyce.github.io/dashicons/
		'menu_position'       => 20,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'     => 'post',
	);
	register_post_type( 'cwn_book', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

function cwn_testimonials() {
	$labels = array(
		'name'               => 'Témoignages',
		'singular_name'      => 'Témoignage',
		'add_new'            => 'Nouveau témoignage',
		'add_new_item'       => 'Ajouter un témoignage',
		'new_item'           => 'Nouveau témoignage',
		'all_items'          => 'Tous les témoignages'
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-testimonial',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' )
	);

	register_post_type( 'testimonials', $args );
}

add_action( 'init', 'cwn_testimonials' );

function custom_taxonomies() 
{  	 

//		register_post_type(
//			'rendez-vous', array(	
//				'label' => 'Rendez-vous',
//				'description' => '',
//				'public' => true,
//				'show_ui' => true,
//				'show_in_menu' => true,
//				'menu_icon' => 'dashicons-megaphone', // src: http://melchoyce.github.io/dashicons/
//				'capability_type' => 'post',
//				'hierarchical' => false,
//				'rewrite' => array('slug' => ''),
//				'query_var' => true,
//				'exclude_from_search' => false,
//				'menu_position' => 8,
//				'supports' => array('title','editor','custom-fields','comments','author'),
//				'taxonomies' => array(),
//				'labels' => array (
//			  	  'name' => 'Rendez-vous',
//			  	  'singular_name' => 'Rendez-vous',
//			  	  'menu_name' => 'Rendez-vous',
//			  	  'add_new' => 'Ajouter',
//			  	  'add_new_item' => 'Ajouter un rendez-vous',
//			  	  'edit' => 'Modifier',
//			  	  'edit_item' => 'Modifier le rendez-vous',
//			  	  'new_item' => 'Nouveau rendez-vous',
//			  	  'view' => 'Afficher',
//			  	  'view_item' => 'Afficher le rendez-vous',
//			  	  'search_items' => 'Rechercher',
//			  	  'not_found' => 'Aucun résultat',
//			  	  'not_found_in_trash' => 'Aucun résultat',
//			  	  'parent' => 'Élément Parent',
//			),) );
//			

				register_taxonomy( 'cwn_thematique',
						array( 'cwn_book' ),
						array( 
				 		'hierarchical' => false, 
				 		'label' => 'Thématiques',
				 		'labels'  => array(
				 			'name'                => _x( 'Thématiques', 'taxonomy general name' ),
				 			'singular_name'       => _x( 'Thématique', 'taxonomy singular name' ),
				 			'search_items'        => __( 'Chercher parmi les thématiques' ),
				 			'popular_items'              => __( 'Les plus utilisées' ),
				 					'all_items'                  => __( 'Toutes les thématiques' ),
				 					'parent_item'                => null,
				 					'parent_item_colon'          => null,
				 					'edit_item'                  => __( 'Modifier la thématique' ),
				 					'update_item'                => __( 'Mettre à jour la thématique' ),
				 					'add_new_item'               => __( 'Nouvelle thématique' ),
				 					'new_item_name'              => __( 'Nouvelle thématique' ),
				 					'separate_items_with_commas' => __( 'Séparez les thématiques par des virgules' ),
				 					'add_or_remove_items'        => __( 'Ajouter ou supprimer des thématiques' ),
				 					'choose_from_most_used'      => __( 'Choisir parmi les thématiques les plus utilisés' ),
				 					'not_found'                  => __( 'Aucune thématique trouvée.' ),
				 			'menu_name'           => __( 'Thématiques' )
				 		),
				 		'show_ui' => true,
				 		'query_var' => true,
				 		'rewrite' => array('slug' => 'thematique'),
				 		'singular_label' => 'Thématique') 
				 );

} // end custom_taxonomies()  function
add_action( 'init', 'custom_taxonomies', 0 ); 
