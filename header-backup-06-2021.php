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
    <meta name="facebook-domain-verification" content="v1p8aczbsqycbj3beuw4xf7jd7d5s1" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/site.webmanifest">
    <title><?php wp_title(''); ?></title>
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
	<!-- Facebook Pixel Code -->
	<script>   !function(f,b,e,v,n,t,s)   {if(f.fbq) return;n=f.fbq=function() {n.callMethod?   n.callMethod.apply(n,arguments) :n.queue.push(arguments) };  if(!f._fbq) f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';  n.queue=[];t=b.createElement(e) ;t.async=!0;  t.src=v;s=b.getElementsByTagName(e) [0];  s.parentNode.insertBefore(t,s) }(window, document,'script',  'https://connect.facebook.net/en_US/fbevents.js') ;  fbq('init', '290390748774757') ;  fbq('track', 'PageView') ;</script> <noscript> <img height="1" width="1" style="display:none"  src="https://www.facebook.com/tr? id=290390748774757&ev=PageView&noscript=1"/> </noscript>
	<!-- End Facebook Pixel Code -->



	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-34934377-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-34934377-1');
	</script>
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

		SBSyncroBox({
	     CodLang: '<?php echo strtoupper($lang); ?>',
	     Currency: 'CHF',
	     MainContainerId: 'sb-container-bar',
		 Labels: {
		 	NumAdults: {'DE':'Pers.'},
		 },
		 Styles: {
			Theme: 'light-pink',
	        CustomColor: "#eeeeee", 
			CustomLabelColor:"#eeeeee",
			CustomBGColor: "transparent",
			CustomButtonColor: "#eeeeee",
			CustomButtonBGColor: "#9e0e0e",
			CustomIntentSelectionDaysBGColor: "#9e0e0e",
			CustomIntentSelectionColor: "#eeeeee",
			CustomButtonHoverBGColor:"#9e0e0e",
			CustomLabelHoverColor:"#eeeeee", 
			CustomLinkColor:"#eeeeee",  
			CustomBoxShadowColorFocus:"#141414", 
			CustomAddRoomBoxShadowColor:"#141414", 
			CustomAccentColor:"#eeeeee",
			CustomFieldBackgroundColor:"#141414", 
			CustomSelectedDaysColor:"#9e0e0e", 
			CustomCalendarBackgroundColor:"#141414",
			CustomWidgetColor:"#eeeeee", 
			CustomWidgetBGColor:"#141414", 
			CustomWidgetElementHoverColor:"#000", 
			CustomWidgetElementHoverBGColor:"#000", 
			CustomBoxShadowColor:"#141414", 
			CustomBoxShadowColorHover:"#141414",
			CustomColorHover:"#eeeeee",
			CustomIconColor:"#eeeeee",
			CustomAccentColorHover:"#eeeeee" 
		    }
		});
	</script>
	<script type="text/javascript">
		$(function() { 
			$(document).click(function() {
			  $('#covid-button').removeClass('opened');
			  $('#covid-text').animate({left: '-705px'});
			  $('#covid-text').fadeOut(600);
			});
			$('#covid-button').click(function(){
			  $(this).addClass('opened');
			  $('#covid-text').fadeIn();
			  $('#covid-text').animate({left: '0px'});
			  return false;
			});
		});
	</script>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
<!--        <div class="header-mobile d-block d-lg-none d-md-none hidden-print">-->
        <div class="header-mobile d-block d-lg-none hidden-print">
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
		
		$bg = '';
		$imageBg = get_template_directory_uri().'/images/default-header.png';
		
		if(!is_404()){
			
			# Get Fields
			$entityFields = get_fields();
			
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
		
		}
			
		if($imageBg != '') {
			$bg = ' style="background:linear-gradient(0deg, rgba(0, 0, 0, .45) 0%, rgba(0, 0, 0, .297) 30%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 60%, rgba(0, 0, 0, .297) 80%, rgba(0, 0, 0, .45) 100%), url(\''.$imageBg.'\');"';
			if(is_front_page())
				$bg = ' style="background: url(\''.$imageBg.'\');"';
		}
		?>
		<header <?php echo $bg; ?>>
			<div class="main-header">
				<div class="header-menu-wrapper container-fluid">
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
					<?php if(ICL_LANGUAGE_CODE=='de'){ ?><a href="https://shop.e-guma.ch/ambassador-zermatt/de/gift-vouchers" class="btn" target="_blank">Gutscheine</a><?php } ?>
				    <?php if(ICL_LANGUAGE_CODE=='en'){ ?><a href="https://shop.e-guma.ch/ambassador-zermatt/en/gift-vouchers" class="btn" target="_blank">Voucher</a><?php } ?>
				    <?php if(ICL_LANGUAGE_CODE=='fr'){ ?><a href="https://shop.e-guma.ch/ambassador-zermatt/fr/bons-cadeaux" class="btn" target="_blank">Bons Cadeaux</a><?php } ?>
						
					</div>
				</div>
			</div>
			<div class="page-header-block">
				<?php 
				if(is_front_page() && !is_404()){
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
					$menu = array(wp_get_nav_menu_items( 'Main Menu - '.$lang ));
					
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
							$itemItSelf = '<li class="item child-item '.$menuItem['parent']['active-as-child'].' itemItself">'.$menuItem['parent']['title'].'</li>';
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
								$menu = wp_get_nav_menu_items( 9 );
								
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

		<?php 
	if ( is_front_page() ) {
	    ?>
	    <div id="label-hotel-home"><img src="https://www.ambassadorzermatt.com/wp-content/uploads/2020/06/cleansafehotellabel.png"></div>
	    <?php
	}
	?>
	<?php 
	if ( is_page(array(898,899,900)) ) {
	    ?>
	    <div id="label-hotel-rooms"><img src="https://www.ambassadorzermatt.com/wp-content/uploads/2020/06/cleansafehotellabel.png"></div>
	    <?php
	}
	?>
		<?php 
	if ( is_page(array(192,539,34,187,36,531)) ) {
	    ?>
	    <div id="label-hotel-restaurants"><img src="https://www.ambassadorzermatt.com/wp-content/uploads/2020/06/cleansaferestaurantlabel.png"></div>
	    <?php
	}
	?>
			<?php 
	if ( is_page(array(203,42,563)) ) {
	    ?>
	    <div id="label-hotel-restaurants"><img src="https://www.ambassadorzermatt.com/wp-content/uploads/2020/06/cleansafewellnesslabel.png"></div>
	    <?php
	}
	?>
	<style>
		#covid-button:hover{cursor: pointer;background:#9e0e0e!important;color:#ffffff!important;}
		#covid-button.opened{background:#9e0e0e!important;color:#ffffff!important;}
		#covid-button:focus{border:none;outline:0;}
		#covid-button{transition: .3s all ease-in-out;}
		#covid-text{display: none;}
		#covid-text ul{list-style-type: square;padding-left: 17px;margin-left:0;}
		#covid-text ul > li{font-size: 14px;line-height: 18px;color:#ffffff;}
	</style>

	<button id="covid-button" class="toggle" style="border:2px solid #9e0e0e;background:#ffffff;font-family: 'Work Sans';height: 150px;width: 45px;position:fixed;left:0px;top:400px;z-index: 99;font-size:18px;text-align: center;padding:14px 0;color:#9e0e0e;text-transform:uppercase;"><span style="transform: rotate(270deg);display: inline-block;white-space: nowrap;padding-bottom: 65px;letter-spacing: 2.67px;">Covid-19</span></button>
	<div id="covid-text" style="position:fixed;top:360px;width: 650px;min-height:230px;padding:20px 20px 0px 85px;background:#141414;color:#ffffff!important;z-index: 990;font-size: 16px;line-height: 18px;left:-705px;">
		<p style="font-size: 16px;line-height: 18px!important;color:#ffffff!important;font-weight: bold;">
		<?php if(ICL_LANGUAGE_CODE=='de'){ ?>Unbeschwerte Tage in Zermatt<?php } ?>
		<?php if(ICL_LANGUAGE_CODE=='en'){ ?>Carefree days in Zermatt<?php } ?>
		<?php if(ICL_LANGUAGE_CODE=='fr'){ ?>Un séjour sans soucis à Zermatt<?php } ?>
		</p>
		<p style="font-size: 16px;line-height: 18px;color:#ffffff;">	
			<?php if(ICL_LANGUAGE_CODE=='de'){ ?>
			Die Gesundheit unserer Gäste und Mitarbeiter hat bei uns höchste Priorität.<br><br>
			Daher haben wir interne Abläufe angepasst und unsere Mitarbeiter intensiv geschult.<br><br>
			Des Weiteren haben wir uns entschieden nur 50 unserer Zimmer zu belegen, um so sicherzustellen, dass überall die benötigten Abstände eingehalten werden können, sodass Sie einen gewohnt unbeschwerten Urlaub im Ambassador erleben können.<br><br>
			<?php } ?>
			<?php if(ICL_LANGUAGE_CODE=='en'){ ?>
			The health of our guests and employees is our highest priority.<br><br>
			For this reason, we have adapted internal processes and provided intensive training for our employees, so that you can experience a usual carefree holiday in the Ambassador.
			<?php } ?>
			<?php if(ICL_LANGUAGE_CODE=='fr'){ ?>
			La santé de nos clients et employés nous tient très à coeur, c’est notre priorité absolue.<br><br>
			Nous avons adapté les processus internes et formé nos collaborateurs de manière intensive afin que vous puissiez vivre vos vacances sans inquiétude et profitez du bon temps !
			<?php } ?>
		</p>
		<p style="font-size: 16px;line-height: 18px!important;color:#ffffff;">
			<?php if(ICL_LANGUAGE_CODE=='de'){ ?>
			Wir freuen uns auf Ihren Besuch.<br>
			Ihr Ambassador Team<br><br>
			Informationen zu den Massnahmen der Bergbahnen finden Sie unter:<br>
			<a href="https://www.matterhornparadise.ch/iSite/Corona%20Schutzkonzept" target="_blank">https://www.matterhornparadise.ch/iSite/Corona%20Schutzkonzept</a>
		<?php } ?>
			<?php if(ICL_LANGUAGE_CODE=='en'){ ?>
			We look forward to your visit.<br>
			Your Ambassador Team<?php } ?>
			<?php if(ICL_LANGUAGE_CODE=='fr'){ ?>
			Nous nous réjouissons de votre visite !<br>
			Votre équipe de l’hôtel Ambassador<?php } ?>
		</p>
	</div>

	<div id="booking-section" style="width: 100%;position: fixed;bottom: 60px;max-height: 72px!important;z-index: 9999;">
		<style>
			@media(min-width: 767px){
				footer{height: 356px;}
				#footbar{display: none;}
				.zopim{display: none;}
			}
			@media(max-width: 766px){
				#booking-section, .zopim, #covid-button{display: none!important;}
				#footbar {position: fixed;background: #9e0e0e;bottom: 0px;height: 60px;width: 100%;z-index: 9999;}
				#iconsfixed {width: 100%;}
				.pfixed {color: #ffffff;text-align: center;font-size: 22px;padding-top: 15px;}
			}
			html.opened #covid-button{display: none;}
			.header-social{visibility: hidden;}
			#sb-container-bar {max-width: 1280px;width:100%;padding: 0 84px;margin:0 auto;}
			#sb-container-bar_sb-container_sb__form-field--checkin {margin-right: 11px;}
			#sb-container-bar_sb-container_sb__form-field--checkin, #sb-container-bar_sb-container_sb__form-field--checkout{width: 48%!important;}
			#sb-container-bar .sb__form-field-label{visibility: hidden;}
			#sb-container-bar .sb-screen-m .sb__guests-rooms{padding-left: 0!important;padding-right: 14px!important;}
			#sb-container-bar .sb__footer{visibility: hidden;}
			#sb-container-bar input{transition: .3s all ease-in-out;}
			#sb-container-bar input:hover{transform: scale(1.04);}
			#sb-container-bar input,#sb-container-bar .sb-custom-field-bg-color{border-radius: 0!important;}
			#sb-container-bar .sb__guests-room select > option{background:#141414;}
		</style>
		<div id="sb-container-bar" style=""></div> 
	</div>	
	<div id="footbar" class="fixed_foot">
	<div id="iconsfixed">
		<a href="<?php echo $bookingUrlLg; ?>" target="_blank">
			<p class="pfixed"><?php if(ICL_LANGUAGE_CODE=='de'): ?>
<?php _e('Jetzt Buchen'); ?>
<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
<?php _e('Book Now'); ?>
<?php elseif(ICL_LANGUAGE_CODE=='fr'): ?>
<?php _e('Réservation'); ?>
<?php endif; ?></p>
		</a>
	</div>
</div>
	<?php if (is_front_page()) { ?>
		<!-- <div id="sb-container"></div>  -->
	<?php } ?>