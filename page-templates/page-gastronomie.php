<?php
/**
 * Template Name: Gastronomie Template
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/pages/page-header' );
		get_template_part( 'template-parts/pages/page-intro' );
		get_template_part( 'template-parts/pages/gastronomie/content' );
	endwhile;
endif;
get_footer();
