<?php

if ( ! function_exists( 'digid_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions dig_theme_enqueue_styles() and twentytwentytwo_editor_styles() above.
	 */
	function digid_get_font_face_styles() {

		return "
			@import url('https://fonts.googleapis.com/css?family=Playfair+Display:700,700i|Work+Sans');
		";

	}

endif;

if ( ! function_exists( 'digid_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 */
	function digid_preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'digid_preload_webfonts' );

/**
 * Enqueue styles and scripts
 */
function digid_theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Theme styles by ergopix.
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), $theme_version );
	wp_enqueue_style( 'fa-styles', get_template_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css', array(), $theme_version );
	wp_enqueue_style( 'fancybox-styles', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css', array(), $theme_version );
	wp_enqueue_style( 'slick-default', get_template_directory_uri() . '/js/slick/slick.css', array(), $theme_version );
	wp_enqueue_style( 'slick-custom', get_template_directory_uri() . '/js/slick/slick-theme.css', array(), $theme_version );

	// Register Theme main style by dig.
	wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version );

	// Add styles inline.
	wp_add_inline_style( 'theme-styles', digid_get_font_face_styles() );

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'theme-styles' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), $theme_version, false );
	wp_enqueue_script( 'digid-scripts', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), $theme_version, false );
	wp_enqueue_script( 'fancybox-scripts', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'slick-scripts', get_stylesheet_directory_uri() . '/js/slick/slick.js', array( 'jquery' ), $theme_version, false );

}

add_action( 'wp_enqueue_scripts', 'digid_theme_enqueue_styles' );


require("include/tinymce.php");
require("include/post-types.php");
require("include/taxonomies.php");

function mySearchWPXpdfPath(){
	$url = get_template_directory().'/pdftotext';
	return $url;
}
add_filter( 'searchwp_xpdf_path', 'mySearchWPXpdfPath' );


# SESSION

add_action('init', 'register_my_session');

function register_my_session(){
	if( !session_id() ) {
		session_start();
	}
	
	
	if (!isset($_SESSION['CREATED'])) {
		$_SESSION['CREATED'] = time();
		$_SESSION['WEATHER'] = '';
	}
	else if (time() - $_SESSION['CREATED'] > 600) {
		// session started more than 10 minutes ago
		session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		$_SESSION['CREATED'] = time();  // update creation time
		$_SESSION['WEATHER'] = '';
	}
	
}

register_my_session();


# Images

	# Initialisation la fonction "post-thumbnails"
	add_theme_support('post-thumbnails');
	
	# Scale up image size
	function image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop){
		if ( !$crop ) return null; // let the wordpress default function handle this
		
		$aspect_ratio = $orig_w / $orig_h;
		$size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
		
		$crop_w = round($new_w / $size_ratio);
		$crop_h = round($new_h / $size_ratio);
		
		$s_x = floor( ($orig_w - $crop_w) / 2 );
		$s_y = floor( ($orig_h - $crop_h) / 2 );
		
		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
	
	add_filter('image_resize_dimensions', 'image_crop_dimensions', 10, 6);
	
	
# Add Menus
	
	# Menus
	function register_menus() {
		register_nav_menus(
				array(
						'menu-main' 	=> __( 'Main menu' ),
						'menu-sub' 	=> __( 'Sub menu' ),
						'menu-images' => __( 'Menu Images' )
				)
				);
	}
	add_action( 'init', 'register_menus' );
	

# Custom print_r
	
	function print_rgopix($data){
		
		if(is_array($data) || $data != ''){
			echo '<pre>';
			print_r($data);
			echo '</pre>';
		}
		
	}
	
	/** https://wordpress.org/ideas/topic/add-rel-or-class-to-image-links
	 * Attach a class to linked images' parent anchors
	 * e.g. a img => a.img img
	 */
	function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
		$classes = 'fresco'; // separated by spaces, e.g. 'img image-link'
		
		// check if there are already classes assigned to the anchor
		if ( preg_match('/<a.*? class=".*?">/', $html) ) {
			$html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
		} else {
			$html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
		}
		return $html;
	}
	add_filter('image_send_to_editor','give_linked_images_class',10,8);
	
# Page Composer

	function ergopix_content_composer($entityFields){
		
		# Do we have Page Content?
		if(is_array($entityFields) && array_key_exists('page_content', $entityFields) && is_array($entityFields['page_content']) && count($entityFields['page_content']) > 0) {
			
			# Parse Layouts
			foreach($entityFields['page_content'] as $l => $layout){
				
				# Header Buttons
				if($layout['acf_fc_layout'] == 'header_buttons'){
					continue;
					/*
					# Do we have buttons?
					if(array_key_exists('buttons', $layout) && is_array($layout['buttons']) && count($layout['buttons']) > 0){
						
						foreach($layout['buttons'] as $b => $btn){
							# Get Link
							$link = '#';
							$target = '';
							if(is_array($btn['link'])){
								if($btn['link']['url'] != '') $link = $btn['link']['url'];
								if($btn['link']['target'] != '') $target = ' target="'.$btn['link']['target'].'"';
								
								// echo '<a href="'.$link.'"'.$target.'>'.$btn['link']['title'].'</a>';
							}
										
						}
						
					}
					*/
					
				}
				# Content
				else if($layout['acf_fc_layout'] == 'img_text_block'){
					
					?>
					<div class="wrapper">
						<div class="section img_text_block">
							<div class="row no-gutters">
								<div class="col-md-12">
									<h2><?php echo $layout['title']; ?></h2>
								</div>
								<div class="col-md-5 image-collector-container">
									<?php 
									# Single Image or Carousel?
									if(is_array($layout['images'])){
										?>
										<div class="image-collector">
											<?php 
											# Single
											if(count($layout['images']) == 1){
												$img = reset($layout['images']);
												echo '<a href="'.$img['sizes']['large'].'" class="fresco single-image-collected">
														<img src="'.$img['sizes']['gallery'].'" alt="'.$img['alt'].'" class="single-img" />
														<span class="vertical-caption vertical-caption-one-image">'.$layout['single_image_description'].'</span>
													</a>';
											}
											# Carousel
											else if(count($layout['images']) > 1){
												
												$randID = 'id'.rand(0, 1000);
												?>
												<div class="section slider-section slider-small">
													<section class="variable slider" id="<?php echo $randID; ?>">
													<?php 
													foreach($layout['images'] as $i => $img){
														echo '<div><img src="'.$img['sizes']['page-slider-small'].'" alt="" /></div>';
													}
													?>
													</section>
												</div>
												<script>											
													$(document).ready(function(){
														$("#<?php echo $randID; ?>").slick({
															dots: false,
															infinite: true,
															speed: 700,
															slidesToShow: 1, 
															autoplay: true,
															variableWidth: true,
															prevArrow: '<img class="slick-prev slick-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-prev-small.svg" height="20" width="20" />',
															nextArrow: '<img class="slick-next slick-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-next-small.svg" height="20" width="20" />'
														});
													});
												</script>
												<?php 
											}
											?>
										</div>
										<?php 
									}
									?>
									<?php 
									# Do we have buttons?
									if(array_key_exists('buttons', $layout) && is_array($layout['buttons']) && count($layout['buttons']) > 0){
										?>
										<div class="link-collector">
										<?php 
										foreach($layout['buttons'] as $b => $btn){
											# Get Link
											$link = '#';
											$target = '';
											if(is_array($btn['link'])){
												if($btn['link']['url'] != '') $link = $btn['link']['url'];
												if($btn['link']['target'] != '') $target = ' target="'.$btn['link']['target'].'"';
												
												echo '<a href="'.$link.'"'.$target.'>'.$btn['link']['title'].'</a>';
											}
											
										}
										?>
										</div>
										<?php 
									}
									?>
								</div>
								<div class="col-md-6 offset-md-1">
									<div class="text-container wysiwyg-container"><?php echo wpautop($layout['text']); ?></div>
								</div>
							</div>
						</div>
					</div>
					<?php 
				}
				# Content Inverted
				else if($layout['acf_fc_layout'] == 'img_text_block2'){
					
					?>
					<div class="wrapper">
						<div class="section img_text_block_2">
							<div class="row no-gutters">
								<div class="col-md-12">
									<h2><?php echo $layout['title']; ?></h2>
								</div>
																<div class="col-md-6 offset-md-1">
									<div class="text-container wysiwyg-container"><?php echo wpautop($layout['text']); ?></div>
								</div>
								<div class="col-md-5 image-collector-container">
									<?php 
									# Single Image or Carousel?
									if(is_array($layout['images'])){
										?>
										<div class="image-collector">
											<?php 
											# Single
											if(count($layout['images']) == 1){
												$img = reset($layout['images']);
												echo '<a href="'.$img['sizes']['large'].'" class="fresco single-image-collected">
														<img src="'.$img['sizes']['gallery'].'" alt="'.$img['alt'].'" class="single-img" />
														<span class="vertical-caption vertical-caption-one-image">'.$layout['single_image_description'].'</span>
													</a>';
											}
											# Carousel
											else if(count($layout['images']) > 1){
												
												$randID = 'id'.rand(0, 1000);
												?>
												<div class="section slider-section slider-small">
													<section class="variable slider" id="<?php echo $randID; ?>">
													<?php 
													foreach($layout['images'] as $i => $img){
														echo '<div><img src="'.$img['sizes']['page-slider-small'].'" alt="" /></div>';
													}
													?>
													</section>
												</div>
												<script>											
													$(document).ready(function(){
														$("#<?php echo $randID; ?>").slick({
															dots: false,
															infinite: true,
															speed: 700,
															slidesToShow: 1, 
															autoplay: true,
															variableWidth: true,
															prevArrow: '<img class="slick-prev slick-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-prev-small.svg" height="20" width="20" />',
															nextArrow: '<img class="slick-next slick-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-next-small.svg" height="20" width="20" />'
														});
													});
												</script>
												<?php 
											}
											?>
										</div>
										<?php 
									}
									?>
									<?php 
									# Do we have buttons?
									if(array_key_exists('buttons', $layout) && is_array($layout['buttons']) && count($layout['buttons']) > 0){
										?>
										<div class="link-collector">
										<?php 
										foreach($layout['buttons'] as $b => $btn){
											# Get Link
											$link = '#';
											$target = '';
											if(is_array($btn['link'])){
												if($btn['link']['url'] != '') $link = $btn['link']['url'];
												if($btn['link']['target'] != '') $target = ' target="'.$btn['link']['target'].'"';
												
												echo '<a href="'.$link.'"'.$target.'>'.$btn['link']['title'].'</a>';
											}
											
										}
										?>
										</div>
										<?php 
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<?php 
				}
				# Carousel
				else if($layout['acf_fc_layout'] == 'carousel'){
					if(is_array($layout['images']) && count($layout['images']) > 0){
						?>
						<div class="wrapper">
							<div class="image-collector">
								<?php 
								# Single
								if(count($layout['images']) == 1){
									
								}
								# Carousel
								else if(count($layout['images']) > 1){
									
									$randID = 'id'.rand(0, 1000);
									
									?>
									<div class="section slider-section slider-full">
										<section class="variable slider" id="<?php echo $randID; ?>">
										<?php 
										foreach($layout['images'] as $i => $img){
											echo '<div><a href="'.$img['sizes']['large'].'" class="fresco"><img src="'.$img['sizes']['page-slider-full'].'" alt="" /></a></div>';
										}
										?>
										</section>
									</div>
									<script>											
										$(document).ready(function(){
											$("#<?php echo $randID; ?>").slick({
												dots: false,
												infinite: true,
												speed: 700,
												centerMode: true,
												centerPadding: '5px',
												slidesToShow: 3, 
												autoplay: true,
												variableWidth: true,
												prevArrow: '<img class="slick-prev slick-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-prev-small.svg" height="20" width="20" />',
												nextArrow: '<img class="slick-next slick-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-button-next-small.svg" height="20" width="20" />',
												responsive: [
												    {
												      breakpoint: 1172,
												      settings: {
												        slidesToShow: 1,
												      }
												    }
												  ]
											});
										});
									</script>
									<?php 
								}
								?>
							</div>
						</div>
						<?php 
					}
				}
				
			} // /# Parse Layouts
			
		} //  /# Do we have Page Content?
		
	} // /function ergopix_content_composer
	
	
	function ergopix_home_content_composer($entityFields){
		
		// print_rgopix($entityFields);
		
		# Page Composer
		if(is_array($entityFields) && array_key_exists('page_composer', $entityFields) && is_array($entityFields['page_composer']) && count($entityFields['page_composer']) > 0){
			
			$pageComposer = $entityFields['page_composer'];
			
			if(array_key_exists('pages_presentation', $pageComposer) && is_array($pageComposer['pages_presentation']) && count($pageComposer['pages_presentation']) > 0){
				
				$index = 0;
				
				foreach($pageComposer['pages_presentation'] as $p => $pageID){
					
					# Left / Right
					$orientation = 'right-left';
					if($index % 2 == 0 ){
						$orientation = 'left-right';
					}
					$index++;
					
					# Get Page
					$page = get_post($pageID);
					
						# Title
							$title = $page->post_title;
						# Featured Image + Caption
							$image = @reset(wp_get_attachment_image_src( get_post_thumbnail_id($pageID), 'home-section-img'));
							// $caption = wp_get_attachment_caption( get_post_thumbnail_id($pageID) );
						# Link
							$linkPg = get_permalink($pageID);
					
					# Get Page Fields
					$pageFields = get_fields($pageID);
					
						# Presentation
							$presentation = $pageFields['presentation'];
							$caption = $pageFields['header_image_description'];
					?>
					<div class="section home-section home-<?php echo $orientation; ?>">
						<div class="container">
							<div class="row">
								<div class="col-lg-1 hidden-md-down"></div>
								<div class="col-lg-10">
									<h2><?php echo $title; ?></h2>
									<div class="hp-st-image">
										<?php echo '<img src="'.$image.'" alt="'.$title.'" /><span class="vertical-caption">'.$caption.'</span>'; ?>
										<?php 
										# Buttons
										if(array_key_exists('page_content', $pageFields) && is_array($pageFields['page_content'])) {
											foreach($pageFields['page_content'] as $l => $layout){
												
												# Header Buttons
												if($layout['acf_fc_layout'] == 'header_buttons'){
													
													# Do we have buttons?
													if(array_key_exists('buttons', $layout) && is_array($layout['buttons']) && count($layout['buttons']) > 0){
														?>
														<div class="home-link-collector link-collector">
														<?php 
														foreach($layout['buttons'] as $b => $btn){
															# Get Link
															$link = '#';
															$target = '';
															if(is_array($btn['link'])){
																if($btn['link']['url'] != '') $link = $btn['link']['url'];
																if($btn['link']['target'] != '') $target = ' target="'.$btn['link']['target'].'"';
																
																echo '<a href="'.$link.'"'.$target.'>'.$btn['link']['title'].'</a>';
															}
														}
														?>
														</div>
														<?php 
													}
												}
												else continue;
												
											}
										}
										?>
									</div>
									<div class="hp-st-text wysiwyg-container">
										<span><?php echo wpautop($presentation); ?></span>
										<span class="hp-st-readmore"><?php echo '<a href="'.$linkPg.'" class="btn">'.__('Read more').'</a>'; ?></span>
									</div>
								</div>
								<div class="col-lg-1 hidden-md-down"></div>
							</div>
						</div>
					</div>
					<?php 					
				}
				
			}
			
		}
		
	}
	

# Weather
	
	function kelvin_to_celsius($given_value) {
		$celsius = $given_value-273.15;
		return $celsius ;
	}
	
	function ergopix_getWeather(){
		
		if(isset($_SESSION['WEATHER']) && $_SESSION['WEATHER'] != ''){
			return $_SESSION['WEATHER'];
		}
		if(defined('CURRENT_WEATHER') && is_array(CURRENT_WEATHER) && count(CURRENT_WEATHER) > 0){
			return CURRENT_WEATHER;
		}
		
		# Zermatt
		$cityId = "2657928";
		# Weather API Key
		$wappId = "a4b090f7220b52d63103ca2ac163748e";
		$host = 'http://api.openweathermap.org/data/2.5/weather?id='.$cityId.'&appid='.$wappId.'';
		// $response = wp_remote_get($host)
		
		$curl = curl_init();
		curl_setopt( $curl, CURLOPT_URL, $host );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt( $curl, CURLOPT_HTTPHEADER, array( "Content-type: application/json" ));
		
		$return = curl_exec( $curl ); // {"affectedTaskIds":"4442305","id":"4442305","STATUS":"OK"}
		curl_close ( $curl );
		
		$return = json_decode($return, true);
		$_SESSION['WEATHER'] = $return;
		define('CURRENT_WEATHER', $return) ; // Array is returned
		
		return CURRENT_WEATHER;
	}
	
	function ergopix_getFormattedWeather(){
		
		$weather = false;
		
		$currentData = ergopix_getWeather();
		if(is_array($currentData) && count($currentData) > 0){
			$weather = array(
					'title' => __($currentData['weather'][0]['main']),
					'text' 	=> __($currentData['weather'][0]['description']),
					'icon' 	=> $currentData['weather'][0]['icon'],
					'temp' 	=> round(kelvin_to_celsius($currentData['main']['temp']))
			);
			
		}
		return $weather;
	}
?>