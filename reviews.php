<?php /* Template Name: Reviews */ ?>
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
				<div class="col-8" style="margin-left: auto;margin-right: auto;margin-bottom: 70px;"><p><?php the_field('intro_text_reviews'); ?></p></div>
			</div>
		</div>
		<div class="section">
			<div class="row no-gutters">
				<div class="col-12 reviews-container"><!-- TrustYou Widget -->
<script type="text/javascript" src="https://api.trustyou.com/static/3rdparty/iframe-resizer/js/iframeResizer.min.js"></script>
<iframe src="https://api.trustyou.com/hotels/37cbf743-49b8-46e9-b1a6-ea26577395f0/tops_flops.html?key=63fc125c-2c8e-4473-a176-3ea27c63be70&iframe_resizer=true" allowtransparency="true" frameborder="0"width="100%"></iframe>
<script type="text/javascript">iFrameResize({});</script>
<!-- /TrustYou Widget --></div>
			</div>
		</div>

		<div class="section">
			<div class="row no-gutters">
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