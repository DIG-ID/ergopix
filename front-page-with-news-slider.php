<?php 
get_header();
while ( have_posts() ) : the_post();

	# Fields
	$entityFields = get_fields();
	
	# Get Latest News
	$args = array(
			'posts_per_page' => 5,
			'category' => 0,
			'orderby' => 'date',
			'order' => 'DESC',
			'include' => array(),
			'exclude' => array(),
			'meta_key' => '',
			'meta_value' =>'',
			'post_type' => 'post',
			'suppress_filters' => false
	);
	$news = get_posts($args);
	?>
	<div class="section home-section-news">
		<div class="row no-gutters">
			<div class="col-11 offset-1">
				<div id="home-news-slider">
					<?php 
					foreach($news as $a => $article){
						echo '<div class="col-md-4">';
						
						echo '<a href="'.get_the_permalink($article->ID).'">
								<span class="article-info">
									<span class="date">'.get_the_date('l d F Y', $article->ID).'</span>
									<span class="excerpt">'.$article->post_title.'</span>
								</span>
								</a>';
						
						echo '</div>';
					}
					?>
				</div>
				<script>											
					$(document).ready(function(){
						$("#home-news-slider").slick({
							dots: false,
							infinite: true,
							speed: 300,
							centerMode: true,
							centerPadding: '15px',
							slidesToShow: 3, 
							autoplay: true,
							prevArrow: '<img class="slick-prev slick-arrow arrow-news" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-prev-shadow.svg" height="40" width="40" />',
							nextArrow: '<img class="slick-next slick-arrow arrow-news" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-next-shadow.svg" height="40" width="40" />',
							responsive: [
							    {
							      breakpoint: 981,
							      settings: {
							        slidesToShow: 2,
							      }
							    },
							    {
							      breakpoint: 767,
							      settings: {
							        slidesToShow: 1,
							      }
							    }
							  ]
						});
					});
				</script>
			</div>
		</div>
	</div>
	<?php 
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