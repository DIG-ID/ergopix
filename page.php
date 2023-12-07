<?php
get_header();

while ( have_posts() ) : the_post();

	# Fields
	// $entityFields = get_fields();
	global $entityFields;
	
	# Content Composer
	ergopix_content_composer( $entityFields );
	
	get_template_part( 'template-parts/modules/page-links' );
endwhile;
get_footer( 'digid' );