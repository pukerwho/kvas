<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="p_main">
	<div class="p_main__brand">
		<div class="p_main__brand-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="p_main__brand-title">
							Бренд Арсеньевский
						</div>
						<div class="p_main__brand-description">
							We Use Best Quality Products for Our Kvass
						</div>
						<a href="<?php echo get_page_url('tpl_brand') ?>">
							<div class="kvas-button">
								Узнать больше
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="p_main__brand-photo">
			<img src="<?php bloginfo('template_url') ?>/img/kvass.jpg" alt="">
		</div>
	</div>
	<div class="p_main__products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_main__products-title">
						Наша продукция
					</div>
					<div class="p_main__products-line"></div>
					<div class="p_main__products-description">
						We Are Really Good
					</div>
				</div>
			</div>
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
									</div>
									<div class="p_products__slide-title">
										<?php the_title(); ?>	
									</div>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
					<!-- <div class="d-flex justify-content-center">
						<div class="swiper-pagination"></div>	
					</div> -->
					<a href="<?php echo get_page_url('tpl_products') ?>">
						<div class="d-flex justify-content-center">
							<div class="kvas-button">
								Все продукты
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="p_main__questions">
		<div class="p_main__questions-photo">
			<img src="<?php bloginfo('template_url') ?>/img/kvass.jpg" alt="">
		</div>
		<div class="p_main__questions-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5 offset-md-7">
						<div class="p_main__questions-title">
							Остались вопросы?
						</div>
						<div class="p_main__questions-line"></div>
						<div class="p_main__questions-description">
							In the fields of economics, marketing and advertising, a consumer is generally defined as the one who pays to consume the goods and services produced by a seller (i.e., company, organization). A consumer can be a person (or group of people), generally categorized as an end user or target demographic for a product, good, or service. A consumer can be a person (or group of people), generally categorized as an end user or target demographic for a product, good, or service.
						</div>
						<div class="kvas-button__white">
							Узнать больше
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="p_main__advantages">
		<div class="p_main__advantages-title">
			Наши преимущества
		</div>
		<div class="p_main__advantages-line"></div>
		<div class="p_main__advantages-description">
			Живий хлібний квас ТМ «Арсеніївський» - натуральний хлібний квас, отриманий в результаті природного бродіння, непастеризований, і, на відміну від інших, не насичений штучно вуглекислим газом. 
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_main__advantages-slider swiper-container">
						<div class="swiper-wrapper">
							<?php 
		          $args_advantages = [
		              'post_type' => 'page',
		              'fields' => 'ids',
		              'nopaging' => true,
		              'meta_key' => '_wp_page_template',
		              'meta_value' => 'tpl_main.php'
		          ];
		          $pages_advantages = get_posts( $args_advantages );
		          foreach ( $pages_advantages as $pages_advantage ): ?>
		          	<?php $i=0; ?>
		          	<?php 
								$advantages = carbon_get_post_meta($pages_advantage, 'crb_advantages');
								foreach ( $advantages as $advantage ): ?>
									<?php $i++; $i=$i/2 ?>
									<div class="swiper-slide">
										<div class="p_main__advantages-photo">
											<img src="<?php bloginfo('template_url') ?>/img/icon-1.svg" alt="">
											<!-- <img src="<?php echo $advantage['crb_advantages_photo'] ?>"> -->
										</div>
										<div class="p_main__advantages-text">
											<?php echo $advantage['crb_advantages_text'] ?>
										</div>
									</div>
								<?php endforeach; ?>
		          <?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="p_main__test">
		<div class="p_main__test-title">
			Хочешь подобрать напиток?
		</div>
		<div class="p_main__test-description">
			Мы разработали улинакальный опросник лично для тебя!
		</div>
		<a href="<?php echo get_page_url('tpl_test') ?>">
			<div class="p_main__test-button">
				Пройти тест
			</div>
		</a>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>