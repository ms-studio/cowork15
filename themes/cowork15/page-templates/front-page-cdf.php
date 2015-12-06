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
	
	$custom_query = new WP_Query( array(
				'posts_per_page' => 1,
				'page_id' => 883,
		) ); 
		
		if ($custom_query->have_posts()) : 
		
			?><div class="front-item"><?php
		
		while( $custom_query->have_posts() ) : $custom_query->the_post();
		
				// title
				
				?>
				<h2 id="prestations" class="h2 title-style">Prestations</a></h2>
				<?php
				
				// content
				
				the_content('Read the rest of this entry &raquo;');
				
				edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
		
		endwhile; 
			
			?></div><?php
		
		endif;
		wp_reset_postdata();
		
		
		// TARIFS
			
			$custom_query = new WP_Query( array(
						'posts_per_page' => 1,
						'page_id' => 878,
				) ); 
				
				if ($custom_query->have_posts()) : 
				
					?><div class="front-item"><?php
				
				while( $custom_query->have_posts() ) : $custom_query->the_post();
				
						// title
						
						?>
						<h2 id="tarifs" class="h2 title-style">Tarifs</a></h2>
						<?php
						
						// content
						
						the_content('Read the rest of this entry &raquo;');
						
						edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
				
				endwhile; 
					
					?></div><?php
				
				endif;
				wp_reset_postdata();
	
	?>

<?php edin_featured_pages(); 

	
?>
<?php get_sidebar( 'front-page' ); 

	// = widget area
?>
<?php get_footer(); ?>