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
						<section class="layer plans tarifs">
						<section>
						<?php
						
						the_content('Read the rest of this entry &raquo;');
	
						?>
						<div style="clear: both;"></div>
						</section>
						</section>
						<?php
						
						edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
				
				endwhile; 
					
					?></div><?php
				
				endif;
				wp_reset_postdata();
	
	
			// ADD-ONS
			
				$custom_query = new WP_Query( array(
							'posts_per_page' => 1,
							'page_id' => 1287,
					) ); 
					
					if ($custom_query->have_posts()) : 
					
						?><div class="front-item"><?php
					
					while( $custom_query->have_posts() ) : $custom_query->the_post();
					
							// title
							
							?>
							<h2 id="tarifs" class="h2 title-style"><?php the_title(); ?></a></h2>
							
							<section class="layer plans tarifs"><section>
							<?php
							
							// content
							
							the_content('Read the rest of this entry &raquo;');
							
							?>
							<div style="clear: both;"></div>
							</section></section>
							<?php
							
							edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
					
					endwhile; 
						
						?></div><?php
					
					endif;
					wp_reset_postdata();
					
					// TEMOIGNAGES
	
    $custom_query = new WP_Query( array(
			'post_type' => 'testimonials',
			'posts_per_page' => 3,
			'orderby' => 'rand'
		) ); 
				
		if ($custom_query->have_posts()) :  ?>
		<section class="testimonials testimonials-home front-item">
  		
  		<h2 id="temoignages" class="h2 title-style">Témoignages</a></h2>
  		
  		<div class="list-testimonials clear">
  		
    		<?php while( $custom_query->have_posts() ) : $custom_query->the_post(); 
          
          $testimonial_infos = get_post_meta($post->ID, 'infos', true);
          
          $testimonial_url = get_post_meta($post->ID, 'url', true);
          $testimonial_url = preg_replace("(https?://)", "", $testimonial_url );
          
          ?>
  		
  				<article class="testimonial">
    				
    				<div class="entry-content"><?php the_content(); ?></div><!-- .entry-content -->
    				
            <?php if ( has_post_thumbnail() ) : ?>
    				<div class="entry-img">
							<figure class="img">
								<?php the_post_thumbnail('thumbnail'); ?>
							</figure>
						</div><!-- .entry-img -->
						<?php endif; ?>
						
    				<div class="entry-meta">
      				
      				<p class="name"><?php the_title(); ?>
      				
      				<?php if ( ! empty ( $testimonial_infos ) ) : 
        				// Display post_meta 'infos' only if it has value
      				?>
      				
      				<p class="infos">
        				
        				<?php if ( ! empty ( $testimonial_url ) ) : 
          				// Add the url only if post_meta 'url' has value
        				?>
          				<a href="http://<?php echo $testimonial_url ?>"><?php echo $testimonial_infos ?></a>
        				<?php else : 
          				// else display info without url
                  echo $testimonial_infos ?>
                  
        				<?php endif; ?>
        				
        		  </p>
      				<?php endif; ?>
      				
    				</div><!-- .entry-meta -->
    				
  				</article><!-- .testimonial -->
  		
  		<?php endwhile; ?>
  		</div><!-- .list-testimonials -->
    	
  	</section>
		
		<?php endif;
		wp_reset_postdata();
			
	
	 edin_featured_pages(); 

	 get_sidebar( 'front-page' ); 

	// = widget area
?>
<?php get_footer(); ?>