<?php
/*
Template Name: Страница ПРОДУКТЫ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_products">
	<div class="p_products__block">
		<?php get_template_part('blocks/b_products') ?>	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-products swiper-container">
						<div class="swiper-wrapper">
							<?php
							$custom_query_products = new WP_Query( array( 'post_type' => 'products') );
							if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
								<div class="p_products__slide swiper-slide" data-product-slide="product-<?php echo get_the_id(); ?>">
									<div class="p_products__slide-top">
										<div class="p_products__slide-cover" style="background-color: <?php echo carbon_get_the_post_meta('crb_product_color') ?>;"></div>
										<div class="p_products__slide-photo">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
										</div>
										<div class="p_products__slide-volume">
											<img src="<?php bloginfo('template_url') ?>/img/volume.svg" alt=""> <?php echo carbon_get_the_post_meta('crb_product_volume') ?>
										</div>
									</div>
									<div class="p_products__slide-title">
										<?php the_title(); ?>	
									</div>
								</div>
							<?php endwhile; endif; ?>
						</div>
						<div class="swiper-button-next swiper-products-button-next"></div>
						<div class="swiper-button-prev swiper-products-button-prev"></div>
					</div>
					<div class="d-flex justify-content-center">
						<div class="swiper-pagination"></div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Product -->
	<?php
	$custom_query_products = new WP_Query( array( 'post_type' => 'products') );
	if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
		<div class="p_products__modal product-<?php echo get_the_id(); ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="p_products__modal-box">
							<div class="p_products__modal-close">
								<img src="<?php bloginfo('template_url') ?>/img/close.svg" alt="" width="8px">
							</div>
							<div class="p_products__modal-title">
								<?php the_title(); ?>		
							</div>
							<div class="p_products__modal-line"></div>
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="p_products__modal-grid">
											<div class="p_products__modal-item">
												<div class="p_products__modal-photo">
													<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
												</div>
											</div>
											<div class="p_products__modal-item">
												<div class="p_products__modal-text">
													<img src="<?php bloginfo('template_url') ?>/img/product-icon2.png" alt="">
													<?php
														if ( function_exists( 'pll_the_languages' ) ) {
													 		pll_e('Обсяг'); 
													 	}
													?>
												</div>
												<div class="p_products__modal-text">
													<img src="<?php bloginfo('template_url') ?>/img/product-icon3.png" alt="">
													<?php
														if ( function_exists( 'pll_the_languages' ) ) {
													 		pll_e('Кількість в коробці'); 
													 	}
													?>:
												</div>
												<div class="p_products__modal-text">
													<img src="<?php bloginfo('template_url') ?>/img/product-icon4.png" alt="">
													<?php
														if ( function_exists( 'pll_the_languages' ) ) {
													 		pll_e('Упаковка'); 
													 	}
													?>
												</div>
												<div class="p_products__modal-text">
													<img src="<?php bloginfo('template_url') ?>/img/product-icon5.png" alt="">
													<?php
														if ( function_exists( 'pll_the_languages' ) ) {
													 		pll_e('Зберігання'); 
													 	}
													?>
												</div>
											</div>
											<div class="p_products__modal-item">
												<div class="p_products__modal-value">
													<?php echo carbon_get_the_post_meta('crb_product_volume') ?>
												</div>
												<div class="p_products__modal-value">
													<?php echo carbon_get_the_post_meta('crb_product_qty') ?>
												</div>
												<div class="p_products__modal-value">
													<?php echo carbon_get_the_post_meta('crb_product_upakovka') ?>
												</div>
												<div class="p_products__modal-value">
													<?php echo carbon_get_the_post_meta('crb_product_term') ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="p_products__modal-title">
											<?php
												if ( function_exists( 'pll_the_languages' ) ) {
											 		pll_e('Схожі товари'); 
											 	}
											?>
										</div>
										<div class="p_products__modal-line"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="swiper-products swiper-container">
											<div class="swiper-wrapper">
												<?php
												$custom_query_products_inner = new WP_Query( array( 'post_type' => 'products') );
												if ($custom_query_products_inner->have_posts()) : while ($custom_query_products_inner->have_posts()) : $custom_query_products_inner->the_post(); ?>
													<div class="p_products__slide swiper-slide" data-product-slide="product-<?php echo get_the_id(); ?>">
														<div class="p_products__slide-top">
															<div class="p_products__slide-cover" style="background-color: <?php echo carbon_get_the_post_meta('crb_product_color') ?>;"></div>
															<div class="p_products__slide-photo">
																<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
															</div>
															<div class="p_products__slide-volume">
																<img src="<?php bloginfo('template_url') ?>/img/volume.svg" alt=""> <?php echo carbon_get_the_post_meta('crb_product_volume') ?>
															</div>
														</div>
														<div class="p_products__slide-title">
															<?php the_title(); ?>	
														</div>
													</div>
												<?php endwhile; endif; ?>
											</div>
											<div class="swiper-button-next swiper-products-button-next"></div>
											<div class="swiper-button-prev swiper-products-button-prev"></div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="swiper-pagination"></div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_template_part('blocks/b_line') ?>

<?php get_footer(); ?>