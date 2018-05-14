<?php
/**
 *  Displays archive entries with featured image, tag/category (etc) and short excerpt
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-list-item' ); ?> role="article">

	<?php if ( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) : ?>

		<section class="featured-image" itemprop="articleBody">
			<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'full' ); ?></a>
		</section> <!-- end article section -->

	<?php endif; ?>

	<div class="main-excerpt-content">
		<header class="article-header">
			<h3 class="title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
		</header> <!-- end article header -->

		<section class="article-excerpt" itemprop="articleBody">
			<?php get_template_part( 'parts/content', 'byline' );
			the_excerpt(); ?>
		</section>
	</div>

</article> <!-- end article -->
