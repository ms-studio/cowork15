<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Cowork
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cowork_body_classes( $classes ) {

	// Adds a class of hero-image to pages with featured image.
	if ( ( is_page() && has_post_thumbnail() ) || ( '' != get_header_image() && ( ( is_page() && ! has_post_thumbnail() ) || is_404() || is_search() || is_archive() ) ) || ( is_home() ) ) {
		$classes[] = 'hero-image';
	}

	// Adds a class of has-quinary to blogs with front page widgets
	if ( is_active_sidebar( 'sidebar-5' ) || is_active_sidebar( 'sidebar-6' ) || is_active_sidebar( 'sidebar-7' ) )  {
		$classes[] = 'has-quinary';
	}
	
	// Add a class for the Red Circle
	
	if ( is_home() || is_page( 12 ) ) {
		// 12 = Coworking
		$classes[] = 'red-circle';
	}
	
	// Adds a class of no-sidebar-full, no-sidebar or sidebar-(right|left) to blogs.
	if ( is_page_template( 'page-templates/page-biblio.php' ) ) {
		$classes[] = 'no-sidebar-full';
	}

	return $classes;
}
add_filter( 'body_class', 'cowork_body_classes' );

/**
 * Wrap more link
 */
function cowork_more_link( $link ) {
	return '<p>' . $link . '</p>';
}
add_filter( 'the_content_more_link', 'cowork_more_link' );
