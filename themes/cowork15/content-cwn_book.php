<?php
/**
 * @package Cowork15
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("book-page"); ?>>

	<header class="entry-header">
		<?php 
		
		if ( is_single() ) {
		
			the_title( '<h1 class="entry-title">', '</h1>' ); 
		
		} else {
		 
		the_title( sprintf( '<header class="entry-header"><h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1></header>' ); 
		
		} 
		
		?>
			<?php edin_post_thumbnail(); ?>

		<div class="entry-meta">
			<?php // edin_posted_on();
			
			if ( get_field('auteur_livre') )
			{
				echo '<div>Auteur: ' . get_field('auteur_livre') . '</div>';
			}
			
			if ( get_field('editeur_livre') )
			{
				echo '<div>Editeur: ' . get_field('editeur_livre') . '</div>';
			}
			
			// Keywords:
			
			$terms_thematiques = get_the_term_list( $post->ID, 'cwn_thematique', '<p>Thématiques: ', ', ', '</p>' );
			
			if ( ($terms_thematiques) ) {
					
					echo '<div class="thematiques">';
			
					echo $terms_thematiques;
					
					echo '</div>';
			
			}
			
			 ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
			the_content();

		?>
	</div><!-- .entry-content -->
	
	<?php 
	
	//  we show the footer only if we are on a single page, not in archive pages or search results.
	
	if ( is_single() ) {
	
	 ?>
	<footer class="entry-footer">
		<?php 
		// edin_posted_on();
		//edin_entry_meta();
		?>
		Cet ouvrage appartient à la <a href="//coworking-neuchatel.ch/bibliotheque/">Bibliothèque Collective</a> du Coworking Neuchâtel</p>
	</footer><!-- .entry-footer -->
	<?php  
	
	} // end if
	
	?>
</article><!-- #post-## -->
