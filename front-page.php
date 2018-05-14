<?php get_header(); ?>

	<div id="content">

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) :

				if ( is_home() ) {
					get_template_part( 'parts/content', 'post-filter-bar' );
				}

				while ( have_posts() ) : the_post(); ?>

				<?php

				if ( is_home() ) {
					get_template_part( 'parts/loop', 'archive-grid' );
				} else {

					if( get_option( 'options_disable_sections_on_pages' ) == 1 ) :
						echo '<div class="container">';
						get_template_part( 'parts/loop', 'front-page' );
						echo '</div>';
					else :
						get_template_part( 'parts/sections' );
					endif;
				}
				
				?>

			<?php endwhile;

			if ( is_home() ) {
				start_page_navi();
				get_template_part( 'parts/content', 'post-filter-bar' );
			}

			endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #content -->

<?php get_footer(); ?>