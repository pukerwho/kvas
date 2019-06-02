<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="p_main">
	<div class="main-hero-swiper swiper-container">
		<div class="swiper-wrapper">
			<?php 
			$mainsliders = carbon_get_the_post_meta('crb_main_hero');
			foreach( $mainsliders as $mainslider ): ?>
				<div class="swiper-slide">
					<div class="main-hero" style="background-image: url(<?php echo $mainslider['crb_main_hero_photo'] ?>) ;background-size: cover; -webkit-background-size: cover;">
						<div class="container">
							<div class="row">
								<div class="col-md-5 offset-md-7">
									<div class="main-hero__title">
										<?php echo $mainslider['crb_main_hero_title'] ?>
									</div>
									<div class="main-hero__description">
										<?php echo $mainslider['crb_main_hero_description'] ?>
									</div>
									<a href="<?php echo $mainslider['crb_main_hero_link'] ?>">
										<div class="kvas-button__white">
											Узнать больше
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="main-hero-swiper-pagination"></div>
	</div>
	<div class="p_brewery">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_brewery__title">
						<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Квасоварня'); 
							 	}
							?>
					</div>
					<div class="p_brewery__line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="slider-puk-container">
						<div class="slider-puk-wrapper">
							<?php 
		          $args_brewery = [
		              'post_type' => 'page',
		              'fields' => 'ids',
		              'nopaging' => true,
		              'meta_key' => '_wp_page_template',
		              'meta_value' => 'tpl_brewery.php'
		          ];
		          $pages_brewery = get_posts( $args_brewery );
		          foreach ( $pages_brewery as $pages_brew ): ?>
		          	<?php 
								$brewery = carbon_get_post_meta($pages_brew, 'crb_brewery');
								foreach ( $brewery as $brew ): ?>
									<?php $brew_number++; ?>
									<div class="slider-puk-slide" data-slider-puk-id="<?php echo $brew_number ?>">
										<div class="p_brewery__grid">
											<div class="animate-puk-mask">
												<div class="p_brewery__img">
													<img src="<?php echo $brew['crb_brewery_photo'] ?>" alt="">
													<div class="p_brewery__number">
														<div class="p_brewery__number-inner">
															<?php echo $brew_number ?>.	
														</div>
													</div>
													<div class="slider-puk-left">
														<img src="<?php bloginfo('template_url') ?>/img/left.svg" alt="">
													</div>
													<div class="slider-puk-right">
														<img src="<?php bloginfo('template_url') ?>/img/right.svg" alt="">
													</div>
												</div>
											</div>
											<div class="p_brewery__content">
												<div class="animate-puk-mask">
													<div class="p_brewery__subtitle">
														<?php echo $brew['crb_brewery_title'] ?>
													</div>
												</div>
												<div class="p_brewery__text">
													<?php echo $brew['crb_brewery_text'] ?>
												</div>
												<div class="kvas-button">
													Узнать подробности
												</div>
											</div>
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
	<div class="p_main__brand">
		<div class="p_main__brand-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="animate-puk-mask">
							<div class="p_main__brand-title animate-puk" data-effect="fade-up" data-delay="0.8s">
								Бренд Арсеньевский
							</div>
						</div>
						<div class="animate-puk-mask">
							<div class="p_main__brand-description animate-puk" data-effect="fade-up" data-delay="1.2s">
								We Use Best Quality Products for Our Kvass
							</div>
						</div>
						<div class="animate-puk-mask">
							<a href="<?php echo get_page_url('tpl_brand') ?>">
								<div class="kvas-button animate-puk" data-effect="fade-up" data-delay="1.5s">
									Узнать больше
								</div>
							</a>
						</div>
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
					<div class="animate-puk-mask">
						<div class="p_main__products-title animate-puk" data-effect="fade-up" data-delay="0.8s">
							Наша продукция
						</div>
					</div>
					<div class="p_main__products-line"></div>
					<div class="animate-puk-mask">
						<div class="p_main__products-description animate-puk" data-effect="fade-up" data-delay="1.2s">
							We Are Really Good
						</div>
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
								<?php $i++; $i=$i/1.5 ?>
								<div class="p_products__slide swiper-slide animate-puk" data-product-slide="product-<?php echo get_the_id(); ?>" >
									<div class="animate-puk-mask">
										<div class="animate-puk" data-effect="fade-up" data-delay="<?php echo $i ?>s">
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
			<img src="<?php bloginfo('template_url') ?>/img/questions.jpg" alt="">
		</div>
		<div class="p_main__questions-absolute"></div>
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
		<div class="animate-puk-mask">
			<div class="p_main__advantages-title animate-puk" data-effect="fade-up" data-delay="0.7s">
				Наши преимущества
			</div>
		</div>
		<div class="p_main__advantages-line"></div>
		<div class="animate-puk-mask">
			<div class="p_main__advantages-description animate-puk" data-effect="fade-up" data-delay="1.2s">
				Живий хлібний квас ТМ «Арсеніївський» - натуральний хлібний квас, отриманий в результаті природного бродіння, непастеризований, і, на відміну від інших, не насичений штучно вуглекислим газом. 
			</div>
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
										<div class="animate-puk-mask">
											<div class="animate-puk" data-effect="fade-up" data-delay="<?php echo $i ?>s">
												<div class="p_main__advantages-photo">
													<img src="<?php echo $advantage['crb_advantages_photo'] ?>">
												</div>
												<div class="p_main__advantages-text">
													<?php echo $advantage['crb_advantages_text'] ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
		          <?php endforeach; ?>
						</div>
					</div>
					<div class="d-flex justify-content-center">
						<div class="swiper-pagination"></div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="p_main__test">
		<div class="animate-puk-mask">
			<div class="p_main__test-title animate-puk" data-effect="fade-up" data-delay="0.8s">
				Хочешь подобрать напиток?
			</div>
		</div>
		<div class="animate-puk-mask">
			<div class="p_main__test-description animate-puk" data-effect="fade-up" data-delay="1.2s">
				Мы разработали улинакальный опросник лично для тебя!
			</div>
		</div>
		<div class="animate-puk-mask">
			<a href="<?php echo get_page_url('tpl_test') ?>">
				<div class="p_main__test-button animate-puk" data-effect="fade-up" data-delay="1.5s">
					Пройти тест
				</div>
			</a>
		</div>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>