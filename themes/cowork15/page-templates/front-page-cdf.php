<?php
/**
 * Template Name: Front Page CdF
 *
 * @package Edin
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>
		
	<?php endwhile; ?>

	<?php rewind_posts(); ?>
	
	<?php
	
	// PRESTATIONS
	
	
	?>

<?php 
?>
<?php get_sidebar( 'front-page' ); 

	// = widget area
?>
<?php get_footer(); ?>