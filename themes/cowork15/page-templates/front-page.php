<?php
/**
 * Template Name: Front Page
 *
 * @package Edin
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>
	
	<?php 
	
	// GOOGLE BUSINESS TOUR
	
	 ?>
	 
	 <div class="iframe-container">
		 <div class="iframe-container-title">
			 <h2 class="h2 title-style">Visite virtuelle du coworking</h2>
			 <h3 class="h3">réalisation: <a href="http://www.proview360.ch/">proview360.ch</a></h3>
		 </div>
	 
	 <iframe id="front-google-tour" class="front-google-tour" src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sch!4v1442477971744!6m8!1m7!1sqmWjn5gYycsAAAQqhCoYLw!2m2!1d46.99445902322461!2d6.927632854255307!3f223.32!4f0!5f0.7820865974627469" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	 </div>

	<?php rewind_posts(); ?>
	
	<?php
	
	// PRESTATIONS
	
	$custom_query = new WP_Query( array(
				'posts_per_page' => 1,
				'page_id' => 380, // = Prestations
		) ); 
		
		if ($custom_query->have_posts()) : 
		
			?><div class="front-item"><?php
		
		while( $custom_query->have_posts() ) : $custom_query->the_post();
		
				// title
				
				?>
				<h2 id="prestations" class="h2 title-style"><?php the_title(); ?></a></h2>
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
						'page_id' => 382,
				) ); 
				
				if ($custom_query->have_posts()) : 
				
					?><div class="front-item"><?php
				
				while( $custom_query->have_posts() ) : $custom_query->the_post();
				
						// title
						
						?>
						<h2 id="tarifs" class="h2 title-style"><?php the_title(); ?></a></h2>
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