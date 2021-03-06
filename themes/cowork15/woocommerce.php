<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Edin
 */

get_header(); ?>


	<div class="content-wrapper clear">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php woocommerce_content();
				
				// See: https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
				
				 ?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>