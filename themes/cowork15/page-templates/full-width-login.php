<?php
/**
 * Template Name: Login
 *
 * @package Cowork15
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); 
	
	get_template_part( 'content', 'hero' ); 
	
	?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper clear no-sidebar-full">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); 
				
					if ( is_user_logged_in() ) {
				
						get_template_part( 'content', 'page' );
					
					} else {
						
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<p>Veuillez <a href="<?php echo wp_login_url( get_permalink().'?version=10923482' ); ?>" title="Login">vous identifier</a> pour accéder à cette page.</p>
								<div class="clear"></div>
							</div><!-- .entry-content -->
						
						</article><!-- #post-## -->
						
						<?php
			
					}
					
				 endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .content-wrapper -->

<?php get_footer(); ?>