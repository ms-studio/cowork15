<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package Edin
 */
 
 $cowork_template_name = get_page_template_slug( get_the_ID() );
 
 $cowork_front_templates = array(
 	"page-templates/front-page.php", 
 	"page-templates/front-page-cdf.php"
 	);
  
?>

<div class="hero <?php echo edin_additional_class(); ?>">
	
	<?php if ( is_post_type_archive( 'jetpack-testimonial' ) ) : ?>

		<div class="hero-wrapper">
			<h1 class="page-title">
				<?php
					$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

					if ( '' != $jetpack_options['page-title'] ) {
						echo esc_html( $jetpack_options['page-title'] );
					} else {
						_e( 'Testimonials', 'edin' );
					}
				?>
			</h1>
		</div>

	<?php elseif ( in_array( $cowork_template_name, $cowork_front_templates ) ) : 
	
	?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				if ( 1 == get_theme_mod( 'edin_title_front_page' ) ) {
					the_title( '<header class="entry-header"><h1 class="page-title">', '</h1></header>' );
				}
			?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			
			<?php if ( is_active_sidebar( 'frontpage_gallery' ) ): ?>
			 <div id="frontpage-gallery" class="frontpage-gallery">
			 <?php dynamic_sidebar( 'frontpage_gallery' ) ?>
			 </div>
			<?php endif; ?>
			
		</article><!-- #post-## -->

	<?php else : ?>

			<?php the_title( '<div class="hero-wrapper"><h1 class="page-title">', '</h1></div>' ); ?>

	<?php endif; ?>
</div><!-- .hero -->

<?php
	if ( ! function_exists( 'jetpack_breadcrumbs' ) || 0 == get_theme_mod( 'edin_breadcrumbs' ) || ! is_page() || is_page_template( 'page-templates/front-page.php' ) || is_front_page() ) {
		return;
	}
?>

<div class="breadcrumbs-wrapper">
	<?php jetpack_breadcrumbs(); ?>
</div><!-- .breadcrumbs-wrapper -->
