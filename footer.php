<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cowork
 */
?>

	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); ?>
	
	<?php if ( is_active_sidebar( 'powered_sidebar' ) ): ?>
		<div id="powered-by" class="powered-by">
			<?php dynamic_sidebar( 'powered_sidebar' ) ?>
		</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		
		// #colophon = la partie avec fond sombre
		
		
		 if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" role="navigation">
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'footer',
						'menu_class'      => 'clear',
						'depth'           => 1,
					) );
				?>
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<!-- Website by <a href="http://ms-studio.net/webdesign/coworking-neuchatel/" rel="designer">ms-studio</a> -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>