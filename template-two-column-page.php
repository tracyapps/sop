<?php
/*
Template Name: Two column page (with sidebar)
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="row container">

		<main id="main" class="main-column" role="main">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/loop', 'page' ); ?>

			<?php endwhile; endif; ?>

		</main> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>