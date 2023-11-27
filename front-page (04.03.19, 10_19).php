<?php 
get_header();
while ( have_posts() ) : the_post();

	# Fields
	$entityFields = get_fields();
	
	# Content Composer
	ergopix_home_content_composer($entityFields);
	
	# Page Bottom
	if(array_key_exists('page_bottom', $entityFields) && is_array($entityFields['page_bottom']) && count($entityFields['page_bottom']) > 0){
		
		$pageBottom = $entityFields['page_bottom'];
		
		$bgImage = '';
		if($pageBottom['background_image'] != ''){
			$bgImage = wp_get_attachment_image_src($entityFields['page_bottom']['background_image'], 'gallery-full');
			$bgImage = 'style="background-image:url('.reset($bgImage).');"';
		}
	?>
	<div class="section home-section-bottom" <?php echo $bgImage; ?>>
		<div class="row no-gutters">
			<div class="col-12">
				<div class="text-block">
					<?php if($pageBottom['title'] != '' ) { ?>
						<span class="hp-bt-title"><?php echo $pageBottom['title']; ?></span>
					<?php } ?>
					<?php if($pageBottom['text'] != '' ) { ?>
						<span class="hp-bt-text"><?php echo wpautop($pageBottom['text']); ?></span>
					<?php } ?>
					<?php if(is_array($pageBottom['link']) && count($pageBottom['link']) > 0 ) { ?>
						<span class="hp-bt-link">
							<a href="<?php echo $pageBottom['link']['url']; ?>" target="<?php echo $pageBottom['link']['target']; ?>" class="btn"><?php echo $pageBottom['link']['title']; ?></a>
						</span>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	
endwhile;
get_footer();