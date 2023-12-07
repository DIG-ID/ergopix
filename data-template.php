<?php /* Template Name: Data-template */ ?>
<?php
get_header();

while ( have_posts() ) : the_post();

	# Fields
	// $entityFields = get_fields();
	global $entityFields;
	
	# Content Composer
	ergopix_content_composer($entityFields);
	

endwhile;
get_footer('digid');