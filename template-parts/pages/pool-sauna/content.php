<section class="section-blocks-content">
	<div class="container">
		<div class="row justify-content-center">
		<?php
		if ( have_rows( 'blocks' ) ) :
			$counter = 0;
			while ( have_rows( 'blocks' ) ) :
				the_row();
				if ( $counter % 2 == 0 ) :
					?>
					<div class="col-12 col-sm-12 col-md-12 col-lg-10 block-card-wrapper">
						<div class="row justify-content-start">
							<div class="col-12 col-md-6 col-lg-6 col-xl-6 block-gallery block-gallery-<?php echo esc_attr( $counter ); ?> swiper">
								<div class="swiper-wrapper">
									<?php
									$images = get_sub_field( 'gallery' );
									if ( $images ) :
										foreach ( $images as $image_id ) :
											?>
											<div class="swiper-slide">
												<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
											</div>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-5 align-self-start block-content-wrapper">
								<div class="block-content">
									<h2 class="block-title"><?php the_sub_field( 'title' ); ?></h2>
									<p class="block-description"><?php the_sub_field( 'description' ); ?></p>
									<?php
										$notes = get_sub_field( 'notes' );
										if ( $notes ) :
											?>
											<p class="block-notes-title"><?php esc_html_e( 'Öffnungszeiten:', 'digid' ); ?></p>
											<p class="block-description"><?php the_sub_field( 'notes' ); ?></p>
											<?php
										endif;
									?>
								</div>
								<div class="block-gallery-navigation">
									<div class="swiper-button-prev block-gallery-button-prev-<?php echo esc_attr( $counter ); ?>"></div>
									<div class="swiper-button-next block-gallery-button-next-<?php echo esc_attr( $counter ); ?>"></div>
								</div>
							</div>
						</div>
					</div>
					<?php
				else :
					?>
					<div class="col-12 col-sm-12 col-md-12 col-lg-10 block-card-wrapper block-card-wrapper--rev">
						<div class="row justify-content-start">
							<div class="col-12 col-md-6 col-lg-6 col-xl-5 align-self-start block-content-wrapper">
								<div class="block-content">
									<h2 class="block-title"><?php the_sub_field( 'title' ); ?></h2>
									<p class="block-description"><?php the_sub_field( 'description' ); ?></p>
									<?php
										$notes = get_sub_field( 'notes' );
										if ( $notes ) :
											?>
											<p class="block-notes-title"><?php esc_html_e( 'Öffnungszeiten:', 'digid' ); ?></p>
											<p class="block-description"><?php the_sub_field( 'notes' ); ?></p>
											<?php
										endif;
									?>
								</div>
								<div class="block-gallery-navigation">
									<div class="swiper-button-prev block-gallery-button-prev-<?php echo esc_attr( $counter ); ?>"></div>
									<div class="swiper-button-next block-gallery-button-next-<?php echo esc_attr( $counter ); ?>"></div>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6 block-gallery block-gallery-<?php echo esc_attr( $counter ); ?> swiper">
								<div class="swiper-wrapper">
									<?php
									$images = get_sub_field( 'gallery' );
									if ( $images ) :
										foreach ( $images as $image_id ) :
											?>
											<div class="swiper-slide">
												<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
											</div>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
				endif;
				$counter++;
			endwhile;
		endif;
		?>
		</div>
	</div>
</section>
