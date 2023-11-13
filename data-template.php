<?php /* Template Name: Data-template */ ?>
<?php
get_header();

while ( have_posts() ) : the_post();

	# Fields
	// $entityFields = get_fields();
	global $entityFields;
	
	# Content Composer
	ergopix_content_composer($entityFields);
	
	# Get random parent page
	$args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
// 			'include' => ''.icl_object_id(26, 'page').','.icl_object_id(32, 'page').','.icl_object_id(40, 'page').','.icl_object_id(47, 'page').'',
			'include' => ''.icl_object_id(34, 'page').','.icl_object_id(42, 'page').','.icl_object_id(51, 'page').','.icl_object_id(28, 'page').'',
			'parent' => 0,
			'exclude_tree' => '',
			'number' => '4',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
	); 
	$pages = get_pages($args);
	shuffle($pages);
	?>
	<div class="wrapper">
		<div class="section">
			<div class="row no-gutters">
				
			</div>
		</div>
<br><br>
		<div class="section">
			<div class="row no-gutters">
				<style type="text/css">
					.col-md-5.image-collector-container{display: none;}
					.text-container.wysiwyg-container{max-width: none!important;}
				</style>
				<div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
				<?php 
				for($i = 0; $i < 2; $i++){
					$imageBg = @reset(wp_get_attachment_image_src( get_post_thumbnail_id($pages[$i]->ID), 'large'));
					?>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(<?php echo $imageBg; ?>);">
						<a href="<?php echo get_permalink($pages[$i]->ID)?>" class="see-also-element"><?php echo get_the_title($pages[$i]->ID)?></a>
					</div>
					<?php 
				}
				?>
			</div>
		</div>

	</div>
 <?php  
endwhile;
get_footer();