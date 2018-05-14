<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
	</header> <!-- end article header -->

	<section class="entry-content" itemprop="articleBody">
		<?php //the_post_thumbnail( 'full' ); ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'start' ),
			'after' => '</div>'
		) ); ?>
		<p class="categories">
			<span class="categories-title">Categorized: </span>
			<?php
			$category_list = get_the_category();
			foreach( $category_list as $category ) :
				printf(
					'<span class="inverse-background"><a href="%s">%s</a></span>',
					get_category_link( $category->term_id ),
					$category->name
				);
			endforeach;
			?>
		</p>
		<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'start' ) . '</span><span class="inverse-background">', '</span><span class="inverse-background">',
				'</span>' ); ?></p>
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->