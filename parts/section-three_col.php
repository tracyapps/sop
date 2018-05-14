<?php
/**
 * The template for displaying three column section
 */

$columns = 3;
?>

<div class="container section-intro-text">
	<?php the_sub_field( 'three_col_intro_text' ); ?>
</div>


<div class="columns-wrapper three-column">

	<?php for ( $col = 1; $col <= $columns; $col++ ) : 

		$col_background_color = get_sub_field( 'column_' . $col . '_background_color' );
		$show_the_button = get_sub_field( 'column_' . $col . '_show_button_select' );

		?>

		<div class="column column-<?php echo $col ?> <?php echo esc_html( $col_background_color ); ?>">

			<div class="column-header">
				<h4 class="column-title"><?php the_sub_field( 'column_' . $col . '_title' ); ?></h4>
			</div>

			<div class="column-body">
				<?php the_sub_field( 'column_' . $col . '_content' ); ?>
			</div>
			<div class="column-footer">
				<?php if( $show_the_button == true ) : ?>
				<p class="learn-more-button">
					<a class="button" href="<?php the_sub_field( 'column_' . $col . '_link' ); ?>">
						<?php the_sub_field( 'column_' . $col . '_button_label' ); ?>
					</a>
				</p>
				<?php endif; ?>
			</div>

		</div>

	<?php endfor; ?>

</div>
