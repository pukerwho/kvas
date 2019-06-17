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
				<?php
				$custom_query_products = new WP_Query( array( 'post_type' => 'products') );
				if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
				<div class="col-6 col-md-4 col-lg-4">
					<div class="p_products__slide" data-product-slide="product-<?php echo get_the_id(); ?>">
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
				</div>
				<?php endwhile; endif; ?>
			</div>
			<!-- <div class="row">
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
			</div> -->
		</div>
	</div>
	<?php
	$custom_query_products = new WP_Query( array( 'post_type' => 'products') );
	if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
		<?php get_template_part('blocks/product-modal') ?>
	<?php endwhile; endif; ?>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_template_part('blocks/b_line') ?>

<?php get_footer(); ?>