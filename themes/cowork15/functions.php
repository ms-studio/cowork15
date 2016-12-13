<?php
/**
 * Cowork functions and definitions
 *
 * @package Cowork
 *
 */

// Change-Detector-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX - for Espresso.app

/**
 * Set the content width based on the theme's design and stylesheet.
 */
$content_width = 700; /* pixels */


/**
 * Adjust the content width for Front Page, Full Width and Grid Page Template.
 */
function edin_content_width() {
	global $content_width;

	if ( is_page_template( 'page-templates/front-page.php' ) || is_page_template( 'page-templates/full-width-page.php' ) || is_page_template( 'page-templates/grid-page.php' ) ) {
		$content_width = 1086;
	}
}

// body classes: voir INC/extras

function cowork2_body_classes( $classes ) {

	
	return $classes;
}
add_filter( 'body_class', 'cowork2_body_classes' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cowork_setup() {

	/*
	 * Declare textdomain for this child theme.
	 */
	load_child_theme_textdomain( 'cowork', get_stylesheet_directory() . '/languages' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_image_size( 'edin-thumbnail-landscape', 314, 228, true );
	add_image_size( 'edin-thumbnail-square', 314, 314, true );
	add_image_size( 'edin-featured-image', 772, 9999 );
	add_image_size( 'edin-hero', 1230, 1230 );

	/*
	 * Unregister nav menu.
	 */
	unregister_nav_menu( 'secondary' );

	/*
	 * Editor styles.
	 */
	add_editor_style( array( 'editor-style.css', cowork_noto_sans_font_url(), cowork_noto_serif_font_url(), cowork_droid_sans_mono_font_url() ) );

}
add_action( 'after_setup_theme', 'cowork_setup', 11 );

/*
 * Setup the WordPress core custom background feature.
 */
function cowork_custom_background_args( $args ) {
    return array( 'default-color' => 'e1dfdf' );
}
add_filter( 'edin_custom_background_args', 'cowork_custom_background_args' );

/**
 * Register Noto Sans font.
 *
 * @return string
 */
function cowork_noto_sans_font_url() {
	$noto_sans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'cowork' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Noto Sans character subset specific to your language, translate this to 'cyrillic', 'greek', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Noto Sans font: add new subset (cyrillic, greek, devanagari or vietnamese)', 'cowork' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic-ext,cyrillic';
		} else if ( 'greek' == $subset ) {
			$subsets .= ',greek-ext,greek';
		} else if ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} else if ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Noto Sans:400,700,400italic,700italic' ),
			'subset' => urlencode( $subsets ),
		);

		$noto_sans_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $noto_sans_font_url;
}

/**
 * Register Noto Serif font.
 *
 * @return string
 */
function cowork_noto_serif_font_url() {
	$noto_serif_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'cowork' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Noto Serif character subset specific to your language, translate this to 'cyrillic', 'greek' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Noto Serif font: add new subset (cyrillic, greek, vietnamese)', 'cowork' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic-ext,cyrillic';
		} else if ( 'greek' == $subset ) {
			$subsets .= ',greek-ext,greek';
		} else if ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Noto Serif:400,700,400italic,700italic' ),
			'subset' => urlencode( $subsets ),
		);

		$noto_serif_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $noto_serif_font_url;
}

/**
 * Register Droid Sans Mono font.
 *
 * @return string
 */
function cowork_droid_sans_mono_font_url() {
	$droid_sans_mono_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Droid Mono Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Droid Sans Mono font: on or off', 'cowork' ) ) {
		$query_args = array(
			'family' => urlencode( 'Droid Sans Mono' ),
		);

		$droid_sans_mono_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $droid_sans_mono_font_url;
}


/**
 * Enqueue scripts and styles.
 */
function cowork_scripts() {

// remove parent styles
	wp_dequeue_style( 'edin-pt-sans' );

	wp_dequeue_style( 'edin-pt-serif' );

	wp_dequeue_style( 'edin-pt-mono' );

	wp_dequeue_style( 'edin-edincon' );
	

	wp_dequeue_script( 'edin-navigation' );

// add custom fonts

//	wp_enqueue_style( 'cowork-noto-sans', cowork_noto_sans_font_url(), array(), null );
//
//	wp_enqueue_style( 'cowork-noto-serif', cowork_noto_serif_font_url(), array(), null );
//
//	wp_enqueue_style( 'cowork-droid-sans-mono', cowork_droid_sans_mono_font_url(), array(), null );
	

	wp_enqueue_script( 'cowork-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140807', true );

	wp_enqueue_script( 'cowork-script', get_stylesheet_directory_uri() . '/js/cowork.js', array( 'jquery' ), '20140808', true );
}
add_action( 'wp_enqueue_scripts', 'cowork_scripts', 11 );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @return void
 */
 
 function custom_register_styles() {
 
 // wp_dequeue_style( 'edin-style' );
 // Do not dequeue, or we lose some functionality!
 
 $cowork_dev_mode = false;
 
 if ( $cowork_dev_mode == true ) {
 
 		// DEV: the MAIN stylesheet - uncompressed
 		wp_enqueue_style(
 				'cowork-style',
 				get_stylesheet_directory_uri() . '/css/dev/01-init.css', // main.css
 				false, // dependencies
 				null // version
 		); 
 
 } else {
 
 		// PROD: the MAIN stylesheet - combined and minified
 		wp_enqueue_style( 
 				'cowork-style', 
 				get_stylesheet_directory_uri() . '/css/build/styles.20161129210741.css', // main.css
 				false, // dependencies
 				null // version
 		); 
 }
 
 } 
 add_action( 'wp_enqueue_scripts', 'custom_register_styles', 20 );
 
 
 
function cowork_admin_fonts() {

	wp_dequeue_style( 'edin-pt-sans' );

	wp_dequeue_style( 'edin-pt-serif' );

	wp_dequeue_style( 'edin-pt-mono' );
	

//	wp_enqueue_style( 'cowork-noto-sans', cowork_noto_sans_font_url(), array(), null );
//
//	wp_enqueue_style( 'cowork-noto-serif', cowork_noto_serif_font_url(), array(), null );
//
//	wp_enqueue_style( 'cowork-droid-sans-mono', cowork_droid_sans_mono_font_url(), array(), null );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', 'cowork_admin_fonts', 11 );

/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';


require_once('functions/init.php');

require_once('functions/formidable.php');

 
 /* WooCommerce Support
 ******************************/
 
 add_action( 'after_setup_theme', 'woocommerce_support' );
 function woocommerce_support() {
     add_theme_support( 'woocommerce' );
 }


/* admin interface
******************************/

if ( is_user_logged_in() ) {
		require_once('functions/admin.php');
}



