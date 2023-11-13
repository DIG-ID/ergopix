<?php 
/*
 * Template Name: News Page
 */

get_header();

while ( have_posts() ) : the_post();
	
	# Fields
	$entityFields = get_fields();

	# Collect Articles
	
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	
	$args = array(
			'posts_per_page' 	=> get_option( 'posts_per_page' ),
			'category' 			=> 0,
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
			'include' 			=> array(),
			'exclude' 			=> array(),
			'meta_key' 			=> '',
			'meta_value' 		=>'',
			'post_type' 		=> 'post',
			'suppress_filters' 	=> false,
			'paged' 			=> $paged
	);
	
	$articlesQuery = new Wp_Query($args);
	
	$articlesItems = false;
	
	if($articlesQuery->posts && is_array($articlesQuery->posts) && count($articlesQuery->posts) > 0){
		$articlesItems = $articlesQuery->posts;
	}
	?>
	<div class="container articles">
		<div class="row">
			<div class="col-md-12 page-content">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<?php 
		$ItemsSize = count($articlesItems);
			
		# No articles
		if($ItemsSize == 0){
			
			?>
			<div class="row">
				<div class="col-xs-12"><?php _e('Aucun article trouv&eacute;'); ?></div>
			</div>
			<?php 					
		}
		# Articles
		else {
			
			# Init
			$index = 0;
			
			$gridDisplay = array(
									0 => array( 3, 5), 1 => array( 4, 4), 2 => array( 5, 3),
									3 => array( 6, 2), 4 => array( 5, 3), 5 => array( 4, 4)
			);
			$gridSize = count($gridDisplay);
			
			echo '<div class="row news">';
			
			foreach($articlesItems as $i => $item){
				
				if($index == $gridSize)
					$index = 0;
				
				echo '<div class="col-md-4 offset-md-'.$gridDisplay[$index][0].'">
						<a href="'.get_the_permalink($item->ID).'" class="news-text">
							<span class="news-date">'.get_the_date( 'd F Y', $item->ID).'</span>
							<h3>'.get_the_title($item->ID).'</h3>
							<p>'.wpautop(wp_trim_words( $item->post_content, 25, '[&hellip;]' )).'</p>
						</a>
					</div>
					<div class="col-md-'.$gridDisplay[$index][1].'"></div>';
				
				$index++;
			}
			
			echo '</div>';
			
			?>
			<div class="row justify-content-md-center">
				<div class="col-md-10">
					<nav class="pagination">
						<?php 
						# Pagination
						$total_pages = $articlesQuery->max_num_pages;
						$format = 'page/%#%/';
						
						if ($total_pages > 1){
							$baseReplace = get_pagenum_link(1);
							$current_page = max(1, get_query_var('paged'));
											
							echo paginate_links(array(
									'base' => preg_replace('/\?.*/', '', $baseReplace) . '%_%',
									'format' => $format,
									'current' => $current_page,
									'total' => $total_pages,
							));
						}
						?>
					</nav>
				</div>
			</div>
			<?php 
		}
	
		
	?>
	</div>
	<?php 
	# Content Composer
	ergopix_home_content_composer($entityFields);
	
	# Page Bottom
	if(array_key_exists('page_bottom', $entityFields) && is_array($entityFields['page_bottom']) && count($entityFields['page_bottom']) > 0){
		
		$pageBottom = $entityFields['page_bottom'];
		
		$bgImage = '';
		if($pageBottom['background_image'] != ''){
			$bgImage = wp_get_attachment_image_src($entityFields['page_bottom']['background_image'], 'large');
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
?>