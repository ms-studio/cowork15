<?php
/**
* Template Name: Biblio
*
* @package Cowork15
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>
	
	<?php if ( '' != $post->post_content ) : // only display if content not empty ?>

	<div class="content-wrapper">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); 
					
					endwhile; // end of the loop. ?>
					
			</main><!-- #main -->
		</div><!-- #primary -->
		
		</div><!-- .content-wrapper -->
		
	<?php endif; ?>
						
						<?php 
						
						// A random list of books
						
						$child_pages = new WP_Query( array(
							'post_type'      => 'cwn_book',
							'orderby'        => 'rand',
							'order'          => 'ASC',
							'posts_per_page' => 3,
							'no_found_rows'  => true,
						) );
						
						 ?>
						<?php if ( $child_pages->have_posts() ) : ?>
											 
					 <div id="quaternary" class="grid-area">
					 
					 	<h2>Quelques livres</h2>
					 	
					 			<div class="grid-wrapper clear">
					 			
					 				<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
					 
					 					<div class="grid">
					 						<?php get_template_part( 'content', 'grid-book' ); ?>
					 					</div><!-- .grid -->
					 
					 				<?php endwhile; ?>
					 									 					
			</div><!-- .grid-wrapper -->
		</div><!-- #quaternary -->
		
		<?php
			endif;
			wp_reset_postdata();
		?>
		
		<div class="content-wrapper biblio-tags clear">
		
				<div id="primary-bis" class="content-area">
					<main id="main-bis" class="site-main" role="main">
					
					<h2>Thématiques</h2>
					
					<ul class="biblio-tag-cloud text">
					<?php 
					      		
					$args = array(
					    'show_option_all'    => '',
					    	'orderby'            => 'name',
					    	'order'              => 'ASC',
					    	'style'              => 'list',
					    	'show_count'         => 0,
					    	'hide_empty'         => 1,
					    	'use_desc_for_title' => 0,
					    	'exclude'            => '',
					    	'exclude_tree'       => '',
					    	'hierarchical'       => 0,
					    	'title_li'           => '',
					    	'number'             => null,
					    	'echo'               => 1,
					    	'depth'              => 0,
					    	'current_category'   => 0,
					    	'pad_counts'         => 0,
					    	'taxonomy'           => 'cwn_thematique',
					    	'walker'             => null
					   ); 
					   
					wp_list_categories( $args );
								 
					?>
					</ul>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) {
							comments_template();
						}
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>