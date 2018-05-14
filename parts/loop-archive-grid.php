<?php
/**
 *  Displays archive entries with just featured image, title, category/tag, 
 * date posted and then the link
 */

$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
$article_excerpt_classes = '';

if ( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) :
	$article_excerpt_classes = 'featured-image';
else :
	$article_excerpt_classes = 'no-image';
endif;
 ?>


<article id="post-<?php the_ID(); ?>" <?php post_class( $article_excerpt_classes ); ?> role="article">



	<header class="article-header" style="background-image: url('<?php echo esc_url( $featured_image_url ); ?>')">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><object>
			<h3 class="title inverse-overlay">
				<?php the_title(); ?>
			</h3>
		</object></a>


	</header> <!-- end article header -->
	<section class="article-excerpt" itemprop="articleBody">
		<?php get_template_part( 'parts/content', 'byline' );
		the_excerpt(); ?>
	</section>
	<footer class="article-footer centered-text">
		<?php
		if ( get_field( 'excerpt_link_text', 'option' ) ) :
			printf( '<a href="%s" rel="bookmark" class="button">%s <small class="screen-reader-text">about %s</small> &raquo;</a>',
				get_the_permalink(),
				get_field( 'excerpt_link_text', 'option' ),
				get_the_title()
				);
		endif;
		?>
	</footer>

</article> <!-- end article -->

	