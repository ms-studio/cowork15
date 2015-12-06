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
		
		// Pour coworkers connectés, montrer le menu 
		
		// tester si on est connecté:
		
		if ( is_user_logged_in() ) {
		
			if ( function_exists( 'get_field' ) ) {
		
			?>
			
			<div class="header-member-menu">
			<?php 
			
			$user_ID = get_current_user_id();
			
			// echo 'Welcome, registered user nr '.$user_ID.'! ';
			
			$cwrk_sites = get_field('cowork_site', 'user_'.$user_ID);
			
			// note: if one site = string
			// if two elements = array
			
			function cowork_generate_menu($menu_name) {
				
				if ( has_nav_menu( $menu_name ) ) : ?>
					<nav class="member-navigation" role="navigation">
						<?php
							wp_nav_menu( array(
								'theme_location'  => $menu_name,
								'menu_class'      => 'clear',
								'depth'           => 1,
							) );
						?>
					</nav><!-- .footer-navigation -->
				<?php endif;
			
			}
			
			if ( is_array($cwrk_sites) ) {
			
				
				// if array has 2 items -> global_menu
				
				if ( count($cwrk_sites) == 2 ) {
					cowork_generate_menu('membres_global');
				} else {
				
					// go through array $cwrk_sites
					
					foreach ($cwrk_sites as $key => $site) {
						if ( $site == 'Neuchâtel') {
							cowork_generate_menu('membres_neuch');
						}
						if ( $site == 'La Chaux-de-Fonds') {
							cowork_generate_menu('membres_tchaux');
						} 
					} // end foreach
				
				} // end count test
				
				
			} else if ( is_string($cwrk_sites) ) {
				
				// test if Neuchatel or Chaux de Fonds
				
				if ($cwrk_sites == 'Neuchâtel') {
					cowork_generate_menu('membres_neuch');
				} else if ($cwrk_sites == 'La Chaux-de-Fonds') {
					cowork_generate_menu('membres_tchaux');
				}
				
			} // end testing array vs string
			
			 ?>
			</div>
			
			<?php 
			} // end if-fuction exists
		} // end testing if logged in 
		
//		$variable = get_field('field_name', 'user_1');
//		
//		// do something with $variable
		
		
		 ?>
	
		<?php
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
	
	<?php 
	
	// some testing and debugging... admin only 
	
	if( current_user_can('administrator')) {  
		
		// try to get entries 
		// clé de formulaire: 8m091w2
		// clé du champ: event-date2 - ID: 145
		
		// date format of Formidable: 12/03/2015
		
		// echo '<p>time() selon ce serveur: '.time().'</p>';
		// echo '<p>'.FrmProDisplaysController::get_shortcode(array('id' => 993)).'</p>';
		
	// 	echo FrmProEntriesController::get_form_results(array('id' => '8m091w2'));
//		echo '[tomorrow] shortcode produces: ' ;
//		echo do_shortcode('[tomorrow]');
		// echo FrmProDisplaysController::get_shortcode(array('id' => 993));
		
//		echo FrmProEntriesController::get_field_value_shortcode(array(
//		'field_id' => x, 
//		'entry' => $entry_id)
//		);
		
	}
	
	 ?>

	<div id="content" class="site-content">
