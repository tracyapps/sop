<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="main container" role="main">
			<header>
				<h1 class="page-title"><span class="smaller"><?php _e( 'Search Results for: ',
						'start' ); ?></span><?php echo esc_attr( get_search_query() ); ?></h1>
			</header>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- To see additional archive styles, visit the /parts directory -->
				<?php get_template_part( 'parts/loop', 'archive-list' ); ?>

			<?php endwhile; ?>

				<?php start_page_navi(); ?>

			<?php else : ?>

				<?php get_template_part( 'parts/content', 'missing' ); ?>

			<?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
