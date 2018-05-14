<?php
/**
 * Overriding the default theme colors with those chosen by the user in the site options.
 */

/**
 *  ---- BASE COLORS ----
 */
$acf_base_color_styles = '';
if ( get_field( 'base_colors', 'option' ) ) :
	$base_colors = get_field( 'base_colors', 'option' );
	$acf_base_color_styles .= sprintf(
		'body {
			background-color: %s;
			color: %s;
		}
		a,
		a:link, 
		a:visited {
			color: %s;
		}
		a:hover,
		a:link:hover, 
		a:visited:hover,
		a:focus,
		a:link:focus, 
		a:visited:focus,
		a:active,
		a:link:active, 
		a:visited:active {
			color: %s;
		}
		a.no-style {
			color: %s;
		}',
		esc_html( $base_colors[ 'background_color' ] ),
		esc_html( $base_colors[ 'text_color' ] ),
		esc_html( $base_colors[ 'link_color' ] ),
		esc_html( $base_colors[ 'link_hover' ] ),
		esc_html( $base_colors[ 'text_color' ] )
	);
endif;


/**
 *  ---- INVERSE COLORS ----
 */
$acf_inverse_color_styles = '';
if ( get_field( 'inverse_colors', 'option' ) ) :
	$inverse_colors = get_field( 'inverse_colors', 'option' );
	$acf_inverse_color_styles .= sprintf(
		'.inverse-background {
			background-color: %s;
			color: %s;
		}
		.inverse-background a,
		.inverse-background a:link, 
		.inverse-background a:visited {
			color: %s;
		}
		.inverse-background a:hover,
		.inverse-background a:link:hover, 
		.inverse-background a:visited:hover,
		.inverse-background a:focus,
		.inverse-background a:link:focus, 
		.inverse-background a:visited:focus,
		.inverse-background a:active,
		.inverse-background a:link:active, 
		.inverse-background a:visited:active {
			color: %s;
		}',
		esc_html( $inverse_colors[ 'background_color' ] ),
		esc_html( $inverse_colors[ 'text_color' ] ),
		esc_html( $inverse_colors[ 'link_color' ] ),
		esc_html( $inverse_colors[ 'link_hover' ] )
	);
endif;

/**
 *  ---- PRIMARY COLORS ----
 */
$acf_primary_color_styles = '';

if ( get_field( 'primary_colors', 'option' ) ) :
	$primary_colors = get_field( 'primary_colors', 'option' );
	$primary_background_hex = $primary_colors[ 'background_color' ];
	list($r, $g, $b) = sscanf($primary_background_hex, "#%02x%02x%02x");
	$primary_background_rgb = $r . ', ' . $g . ', ' . $b;
	$acf_primary_color_styles .= sprintf(
		'.primary-background {
			background-color: %s;
			color: %s;
		}
		.primary-background a,
		.primary-background a:link, 
		.primary-background a:visited {
			color: %s;
		}
		.primary-background a:hover,
		.primary-background a:link:hover, 
		.primary-background a:visited:hover,
		.primary-background a:focus,
		.primary-background a:link:focus, 
		.primary-background a:visited:focus,
		.primary-background a:active,
		.primary-background a:link:active, 
		.primary-background a:visited:active {
			color: %s;
		}
		.button,
		.button:visited,
		a.button,
		input[type="submit"],
		button,
		a.button:visited,
		nav.page-navigation ul.pagination li a,
		nav.page-navigation ul.pagination li a:link,
		nav.page-navigation ul.pagination li a:visited {
			background-color: %s;
			color: %s !important;
			box-shadow: 0 0 3px rgba( %s, 0.5 );
		}
		.button:hover,
		.button:visited:hover,
		a.button:hover,
		input[type="submit"]:hover,
		button:hover,
		a.button:visited:hover
		nav.page-navigation ul.pagination li a:hover,
		nav.page-navigation ul.pagination li a:link:hover,
		nav.page-navigation ul.pagination li a:visited:hover {
			background-color: %s;
			color: %s !important;
			box-shadow: 0 0 3px %s;
		}
		.site-header .main-navigation {
			border-top: 1px solid rgba( %s, 0.3 );
			border-bottom: 1px solid rgba( %s, 0.3 )
		}
		.site-header .main-navigation a:hover,
		.site-header .main-navigation a:visited:hover {
			background: %s;
			color: %s;
		}
		.archive-list-item {
			border-bottom: 1px solid rgba( %s, 0.3 );
		}
		nav.page-navigation ul.pagination li.current {
			border-color: %s;
		}',
		esc_html( $primary_colors[ 'background_color' ] ),
		esc_html( $primary_colors[ 'text_color' ] ),
		esc_html( $primary_colors[ 'link_color' ] ),
		esc_html( $primary_colors[ 'link_hover' ] ),
		esc_html( $primary_colors[ 'background_color' ] ),
		esc_html( $primary_colors[ 'text_color' ] ),
		esc_html( $primary_background_rgb ),
		esc_html( $inverse_colors[ 'background_color' ] ),
		esc_html( $inverse_colors[ 'text_color' ] ),
		esc_html( $inverse_colors[ 'background_color' ] ),
		esc_html( $primary_background_rgb ),
		esc_html( $primary_background_rgb ),
		esc_html( $primary_colors[ 'background_color' ] ),
		esc_html( $primary_colors[ 'text_color' ] ),
		esc_html( $primary_background_rgb ),
		esc_html( $primary_colors[ 'background_color' ] )
	);
endif;

/**
 *  ---- ACCENT COLORS ----
 */
// first, lets see if there are any accent colors added in the site options,
// and we'll grab all those values from the database to put in the styles below.
// wheeeeeee

$acf_accent_color_styles = '';
if( get_option( 'options_accent_colors_container_accent_color_array' ) ) :
	$number = get_option( 'options_accent_colors_container_accent_color_array' );
	for ( $i=1; $i<=(int)$number; $i++ ) {
		$option_field_name = 'options_accent_colors_container_accent_color_array_' . ($i - 1);

		$acf_accent_color_styles .= sprintf(
			'.accent-color-%s {
				background: %s;
				color: %s;
			}
			.accent-color-%s a, 
			.accent-color-%s a:link,
			.accent-color-%s a:visited {
				color: %s;
			}
			.accent-color-%s a:hover,
			.accent-color-%s a:visited:hover,
			.accent-color-%s a:link:hover,
			.accent-color-%s a:focus,
			.accent-color-%s a:visited:focus,
			.accent-color-%s a:link:focus,
			.accent-color-%s a:active,
			.accent-color-%s a:visited:active,
			.accent-color-%s a:link:active {
				color: %s;
			}',
			$i,
			esc_html( get_option( $option_field_name . '_accent_color' ) ),
			esc_html( get_option( $option_field_name . '_accent_color_details_text_color' ) ),
			$i,
			$i,
			$i,
			esc_html( get_option( $option_field_name . '_accent_color_details_link_color' ) ),
			$i,
			$i,
			$i,
			$i,
			$i,
			$i,
			$i,
			$i,
			$i,
			esc_html( get_option( $option_field_name . '_accent_color_details_link_hover' ) )
		);
	}
endif;


?>

<style>
	<?php
		echo $acf_base_color_styles;
		echo $acf_inverse_color_styles;
		echo $acf_primary_color_styles;
		echo $acf_accent_color_styles;
	?>
</style>
