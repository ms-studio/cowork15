<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Cowork
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script src="//use.typekit.net/gha6bfi.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'cowork' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	
		<?php 
		
		/* 
		 * Pour coworkers connectés, montrer le menu
		 * Tester si on est connecté:
		 * NOTE: avec WooCommerce, il y a un nouveau type d'utilisateur, "customer"
		*/
		
		if ( is_user_logged_in() ) {
		
			// default for connected users:
			echo '<div class="header-member-menu">';
			cowork_generate_menu('membres_neuch');
			echo '</div>';
		
			
		} // end testing if logged in 
				
	
			$top_area_content = get_theme_mod( 'cowork_top_area_content' );
			if ( '' != $top_area_content ) :
		?>
		<div class="site-top-content">
			<?php echo $top_area_content; ?>
		</div><!-- .site-top-content -->
		<?php endif; ?>

		<div class="site-branding">
			<?php edin_the_site_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'cowork' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container_class' => 'menu-primary',
						'menu_class'      => 'clear',
					) );
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">
