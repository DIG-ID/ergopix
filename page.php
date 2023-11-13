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
			'include' => ''.icl_object_id(1972, 'page').','.icl_object_id(42, 'page').','.icl_object_id(51, 'page').','.icl_object_id(28, 'page').'',
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
	<div class="wrapper random-blocks">
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

	 
	<?php if ( is_page( 192 ) ) { ?>
			<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/wellnessbereich/" class="see-also-element">Pool & Sauna</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 539 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres & Suites</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/fr/espace-bien-etre/" class="see-also-element">Piscine & sauna</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 498 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 497 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/en/gastronomy/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 168 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/fr/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 34 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/en/wellness-area/" class="see-also-element">Pool & sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 1971 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/wellnessbereich/" class="see-also-element">Pool & Sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 1972 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/en/wellness-area/" class="see-also-element">Pool & sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 1973 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres & Suites</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/fr/espace-bien-etre/" class="see-also-element">Piscine & sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 1059 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/wellnessbereich/" class="see-also-element">Pool & Sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 1060 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/en/wellness-area/" class="see-also-element">Pool & sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 1061 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres & Suites</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/fr/espace-bien-etre/" class="see-also-element">Piscine & sauna</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 197 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/wellnessbereich/" class="see-also-element">Pool & Sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 49 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/en/wellness-area/" class="see-also-element">Pool & sauna</a>
					</div>
				</div></div>
			</div></div>
		<?php } elseif( is_page( 554 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres & Suites</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/ambassador-zermatt-wellness-indoor-pool.png);">
					<a href="/fr/espace-bien-etre/" class="see-also-element">Piscine & sauna</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 203 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 563 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/fr/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 42 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/en/gastronomy/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 1102 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 1104 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/fr/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 1103 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/10/ambassador-zermatt-restaurant-11.png);">
					<a href="/en/gastronomy/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 187 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 561 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/fr/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 36 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/en/gastronomy/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 898 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/zimmer-suiten-familienzimmer/" class="see-also-element">Zimmer</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 900 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/fr/gastronomie/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/fr/chambres-suites-chambres-familiales/" class="see-also-element">Chambres</a>
					</div>
				</div></div>
			</div></div>
	<?php } elseif( is_page( 899 ) ){ ?>
		<div class="wrapper random-blocks-alt"><div class="section">
				<div class="row no-gutters"><div class="col-12"><h2 class="see-also-title"><?php _e('See also'); ?></h2></div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2021/11/restaurant-ambassadoir-zermatt-header-2-1980x1320.jpg);">
					<a href="/en/gastronomy/" class="see-also-element">Restaurant</a>
					</div>
					<div class="col-md-6 bg-cover-norepeat" style="background-image:url(/wp-content/uploads/2020/05/hotel-zimmer-ambassador-zermatt.png);">
					<a href="/en/rooms-suites-family-rooms/" class="see-also-element">Rooms</a>
					</div>
				</div></div>
			</div></div>
	<?php } ?>

 <?php  
endwhile;
get_footer();