<?php 
# Languages
$lang = 'fr';
if(function_exists('icl_get_languages')) {

	$languages = icl_get_languages('skip_missing=0&orderby=name&order=asc&link_empty_to=str');
						
	foreach($languages as $abrv => $language){
							
		# Active?
		if($language['active'] == 1){
			$lang = $abrv;
			break;
		}
		
	}
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php wp_title(''); ?></title>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,700i|Work+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/fontawesome/css/font-awesome.min.css" />
    <?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/slick/slick-theme.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">var $ = jQuery;</script>
    <!--Start of Zendesk Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){
	z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	$.src='https://v2.zopim.com/?5zNxPNIi7TlyYthFmKw7I5kkA6OACmr7';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
	<!--End of Zendesk Chat Script-->
	<script type="text/javascript">
		(function (i, s, o, g, r, a, m) {
		    i['SBSyncroBoxParam'] = r; i[r] = i[r] || function () {
		        (i[r].q = i[r].q || []).push(arguments)
		    }, i[r].l = 1 * new Date(); a = s.createElement(o),
		    m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://cdn.simplebooking.it/search-box-script.axd?IDA=5288','SBSyncroBox');
		
		SBSyncroBox({
		    CodLang: '<?php echo strtoupper($lang); ?>',
		    Styles: {
				Theme: 'light-pink',
				CustomColor: "#000000",
				CustomButtonBGColor: "rgba(0,0,0,0.2)",
				CustomButtonHoverBGColor: "rgba(0,0,0,0.1)",
				CustomIconColor: "rgba(0,0,0,0.2)",
				CustomLinkColor: "rgba(0,0,0,0.6)"
    		}
			
		});
	</script>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="header-mobile d-block d-md-none d-lg-none hidden-print">
			<div style="display:table;width:100%;">
				<div style="display:table-cell">
					<a class="logo" href="<?php echo get_home_url('/'); ?>">
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo" width="150" />
					</a>
				</div>
				<div style="display:table-cell;text-align:right;vertical-align: middle;">
					<a id="hamburger-mobile" href="#menu-mobile" class="hamburger hamburger-mobile">
						<span class="top-bar"></span>
						<span class="middle-bar"></span>
						<span class="bottom-bar"></span>
					</a>
				</div>
			</div>	
		</div>
		<?php 
		global $post, $entityFields;
		
		# Get Fields
		$entityFields = get_fields();
		
		$bg = '';
		$imageBg = get_template_directory_uri().'/images/default-header.png';
		$headerTitle = $post->post_title;
		if(is_front_page()){
			# Get Random Headers if exists
			$randomHeaders = get_field('random_headers');
			if(is_array($randomHeaders) && array_key_exists('header', $randomHeaders) && count($randomHeaders['header']) > 0){
				$headers = $randomHeaders['header'];
				shuffle($headers);
				$header = reset($headers);
				
				$imageBg = @reset(wp_get_attachment_image_src( $header['image'], 'gallery-full'));
				$headerTitle = $header['title'];
				#[image] => 98
				#[link] =>
				
			}
			
		}
		else if(is_page()){
			$imageBg = @reset(wp_get_attachment_image_src( get_post_thumbnail_id(), 'gallery-full'));
		}
		else if(is_single() && $post->post_type == 'post'){
			// $imageBg = @reset(wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'));
		}
		
		if($imageBg != '') {
			$bg = ' style="background:linear-gradient(0deg, rgba(0, 0, 0, .45) 0%, rgba(0, 0, 0, .297) 30%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 60%, rgba(0, 0, 0, .297) 80%, rgba(0, 0, 0, .45) 100%), url(\''.$imageBg.'\');"';
			if(is_front_page())
				$bg = ' style="background: url(\''.$imageBg.'\');"';
		}
		?>
		<header <?php echo $bg; ?>>
			<div class="main-header">
				<div class="header-menu-wrapper container">
					<div class="header-menu">
						<div style="display:table-cell;text-align:right;vertical-align: middle;" class="big-mac">
							<a id="hamburger" href="#hamburger" class="hamburger">
								<span class="top-bar"></span>
								<span class="middle-bar"></span>
								<span class="bottom-bar"></span>
							</a>
						</div>
						<div class="header-languages">
							<ul>
							<?php 
							
							# TEMP
							// http://shop.e-guma.ch/ambassador-zermatt/fr/bons-cadeaux
							$bookingUrlLg = 'https://www.simplebooking.it/ibe/hotelbooking/search?hid=5288&lang=fr';
							$bookingURL = array(
												'fr' => 'https://www.simplebooking.it/ibe/hotelbooking/search?hid=5288&lang=fr',
												'en' => 'https://www.simplebooking.it/ibe/hotelbooking/search?hid=5288&lang=en',
												'de' => 'https://www.simplebooking.it/ibe/hotelbooking/search?hid=5288&lang=de'
												);
							
							
							
							# Languages
							$languages = icl_get_languages('skip_missing=0&orderby=custom&link_empty_to=str');
							
							foreach($languages as $abrv => $language){
								
								# Active?
								$selected = '';
								if($language['active'] == 1){
									$selected = ' selected';
									$bookingUrlLg = $bookingURL[$abrv];
								}
								# No translation available
								$noTranslation = '';
								if($language['url'] == 'str'){
									$noTranslation = ' disabled';
								}
								echo '<li class="menu-lang"'.$selected.$noTranslation.'><a href="'.$language['url'].'">'.$abrv.'</a></li>';
							}
							?>
							</ul>
						</div>
					</div>
					<div class="header-logo">
						<a class="logo" href="<?php echo get_home_url('/'); ?>">
							<img class="img-responsive logo-neg" src="<?php echo get_template_directory_uri(); ?>/images/logo-neg.svg" alt="Logo" width="350" />
							<img class="img-responsive logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo" width="350" />
						</a>
					</div>
					<div class="header-booking">
						<a href="<?php echo $bookingUrlLg; ?>" class="btn" target="_blank"><?php _e('Booking'); ?></a>
					</div>
				</div>
			</div>
			<div class="page-header-block">
				<?php 
				if(is_front_page()){
					$zermattWeather = ergopix_getFormattedWeather();
					?>
						<h1><?php echo $headerTitle; ?></h1>
						<?php 
						# Weather
						if(is_array($zermattWeather)){
							?><span class="weather"><?php echo '<img src="'.get_template_directory_uri().'/images/weather/'.$zermattWeather['icon'].'.png" alt="" class="weather-icon" /><span> '.$zermattWeather['temp'].'&deg; '.date_i18n('l d F  H \h i', ( time() + 7200 ) ); ?> (UTC +1)<span></span></span><?php 
						}
				}
				else {
					?>
					<div class="container">
						<div class="row">
							<div class="col-md-11 offset-md-1">
								<h1><?php echo $headerTitle; ?></h1>
							</div>
						</div>
					</div>
					<?php 
				} 
				?>
			</div>
			<div class="header-social">
				<div class="container reference-container">
					<div class="row">
						<div class="col-12">
							<a href="https://www.facebook.com/pages/Hotel-Ambassador-Zermatt/213432722020893" target="_blank" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://www.instagram.com/ambassadorzermatt/" target="_blank" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="header-menu-container">
				<div class="header-menu-content">
					<ul>
					<?php 
					# Menus
					$menu = array(wp_get_nav_menu_items( 'Main Menu' ));
					
					$remasterizeMMenu = array();
					
					# Parse Menu Mobile
					foreach($menu as $m => $aMenu){
						
						$i = 0;
						foreach($aMenu as $m => $item){
							
							# Parent
							if(icl_object_id($item->menu_item_parent, 'page') == 0){
								$remasterizeMMenu[$item->ID] = array('parent' => array( 'url' => $item->url, 'title' => $item->title ),
										'active' => '',
										'active-as-child' => '',
										'children' => array()
								);
								
								if(icl_object_id($post->post_parent, 'page') == icl_object_id($item->object_id, 'page') || icl_object_id($post->ID, 'page') == icl_object_id($item->object_id, 'page')){
									$remasterizeMMenu[$item->ID]['active'] = 'active';
									# Repeating current/parent item at the top of the potential child list (if any)
									$remasterizeMMenu[$item->ID]['active-as-child'] = 'active selected';
								}
							}
							# Child
							else {
								$remasterizeMMenu[$item->menu_item_parent]['children'][$item->ID] = array( 'url' => $item->url, 'title' => $item->title, 'active' => '' );
								
								if(icl_object_id($post->ID, 'page') == icl_object_id($item->object_id, 'page')){
									$remasterizeMMenu[$item->menu_item_parent]['children'][$item->ID]['active'] = 'active';
									$remasterizeMMenu[$item->menu_item_parent]['active-as-child'] = '';
								}
							}
							 
						}
						
					}
					foreach($remasterizeMMenu as $mID => $menuItem){
						
						$menuItemHTML = '<li id="li-'.$mID.'" class="item '.$activeItem.'">';
						
						# Do we have Children?
						$childList = '';
						
						if(count($menuItem['children']) > 0){
							
							# Check validity of each
							foreach($menuItem['children'] as $cID => $child){
								$childList.= '<li class="item child-item '.$child['active'].'"><a href="'.$child['url'].'" class="'.$child['active'].'">'.$child['title'].'</a></li>'."\n";
							}
							
						}
						
						# We Have one or some child valid
						if($childList != ''){
							$itemItSelf = '<li class="item child-item '.$menuItem['parent']['active-as-child'].' itemItself"><a href="'.$menuItem['parent']['url'].'" class="'.$menuItem['parent']['active'].'">'.$menuItem['parent']['title'].'</a></li>';
							$menuItemHTML.= '<ul class="sub-menu">'.$itemItSelf.$childList.'</ul>'."\n"; // '<span>'.$menuItem['parent']['title'].'</span>'.
						}
						else $menuItemHTML.= '<a href="'.$menuItem['parent']['url'].'" class="'.$menuItem['parent']['active'].'">'.$menuItem['parent']['title'].'</a>';
						
						$menuItemHTML.= '</li>'."\n";
						
						# Print Element
						echo $menuItemHTML;
					}
					?>
		     		</ul>
		     	</div>
		     	<div class="header-sub-menu-content">
		     		<div class="container">
		     			<div class="row no-gutters">
		     				<div class="col-12">
								<ul>
								<?php 
								# Menus
								$menu = wp_get_nav_menu_items( 'Sub Menu' );
								
								# Parse Menu Mobile
								foreach($menu as $m => $item){
									
									$active = '';
									if($post->post_parent == $item->object_id || $post->ID == $item->object_id){
										$active = 'active';
									}
									
									echo '<li class="'.$active.'"><a href="'.$item->url.'" class="'.$active.'">'.$item->title.'</a></li>';
								
								}
								?>
					     		</ul>
					     	</div>
					     </div>
		     		</div>
		     	</div>
			</div>
			<?php 
			# Page Header Buttons
			if(is_array($entityFields) && array_key_exists('page_content', $entityFields) && is_array($entityFields['page_content']) && count($entityFields['page_content']) > 0) {
				
				# Parse Layouts
				foreach($entityFields['page_content'] as $l => $layout){
					
					# Header Buttons
					if($layout['acf_fc_layout'] == 'header_buttons'){
						
						# Do we have buttons?
						if(array_key_exists('buttons', $layout) && is_array($layout['buttons']) && count($layout['buttons']) > 0){
							?>
							<div class="header-page-buttons">
								<div class="container">
									<div class="row">
										<div class="col-md-11 offset-md-1">
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
									</div>
								</div>
							</div>
							<?php 
						}
						
					}
					
				} 
			
			}
			?>
		</header>
	</div>
	<?php if (is_front_page()) { ?>
		<div id="sb-container"></div> 
	<?php } ?>