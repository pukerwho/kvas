<?php
/*
Template Name: Страница КВАС
*/
?>
<?php 
	$_SESSION['menuvar'] = 'kvas'; 
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
					<div class="main-hero" style="background-image: url(<?php echo $mainslider['crb_main_hero_photo'] ?>); background-position: center center; background-repeat: no-repeat; ">
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
											<?php
												if ( function_exists( 'pll_the_languages' ) ) {
											 		pll_e('Дізнатися більше'); 
											 	}
											?>
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
											<div class="p_brewery__item">
												<div class="animate-puk-mask">
													<div class="p_brewery__img object-fit">
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
											</div>
											<div class="p_brewery__item">
												<div class="p_brewery__content">
													<div class="animate-puk-mask">
														<div class="p_brewery__subtitle">
															<?php echo $brew['crb_brewery_title'] ?>
														</div>
													</div>
													<div class="p_brewery__text">
														<?php echo $brew['crb_brewery_text'] ?>
													</div>
													<a href="<?php echo get_page_url('tpl_brewery') ?>">
														<div class="kvas-button">
															<?php
																if ( function_exists( 'pll_the_languages' ) ) {
															 		pll_e('Дізнатися подробиці'); 
															 	}
															?>
														</div>
													</a>
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
					<div class="col-md-4">
						<div class="animate-puk-mask">
							<div class="p_main__brand-title animate-puk" data-effect="fade-up" data-delay="0.8s">
								<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('Бренд Арсеніївський'); 
								 	}
								?>
							</div>
						</div>
						<?php 
            $args_brand = [
                'post_type' => 'page',
                'fields' => 'ids',
                'nopaging' => true,
                'meta_key' => '_wp_page_template',
                'meta_value' => 'tpl_brand.php'
            ];
            $pages_brands = get_posts( $args_brand );
            foreach ( $pages_brands as $pages_brand ): ?> 
            	<div class="animate-puk-mask">
								<div class="p_main__brand-description animate-puk" data-effect="fade-up" data-delay="1.2s">
									<?php echo carbon_get_post_meta($pages_brand, 'crb_brand_description') ?>
								</div>
							</div>
						<div class="animate-puk-mask">
							<a href="<?php echo get_page_url('tpl_brand') ?>">
								<div class="kvas-button animate-puk" data-effect="fade-up" data-delay="1.5s">
									<?php
										if ( function_exists( 'pll_the_languages' ) ) {
									 		pll_e('Дізнатися більше'); 
									 	}
									?>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<div class="p_main__brand-photo object-fit">
			<div class="p_main__brand-photo-inner">
				<div class="p_main__brand-photo-img" style="background-image: url(<?php echo carbon_get_the_post_meta('crb_main_brand_photo') ?>); background-size: cover"></div> 
				<!-- <img src="<?php echo carbon_get_the_post_meta('crb_main_brand_photo') ?>" alt=""> -->
			</div>
		</div>
	</div>
	<div class="imgsize">
		<img src="<?php echo carbon_get_the_post_meta('crb_main_brand_photo') ?>" alt="">
	</div>
	<div class="p_main__products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="animate-puk-mask">
						<div class="p_main__products-title animate-puk" data-effect="fade-up" data-delay="0.8s">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Наша продукція'); 
							 	}
							?>
						</div>
					</div>
					<div class="p_main__products-line"></div>
					<div class="animate-puk-mask">
						<div class="p_main__products-description animate-puk" data-effect="fade-up" data-delay="1.2s">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Ми дійсно хороші'); 
							 	}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="p_products__block">
						<div class="swiper-products swiper-container">
							<div class="swiper-wrapper">
								<?php
								$custom_query_products = new WP_Query( array( 
									'post_type' => 'products'
								) );
								if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
									<?php $i++; $i=$i/1.5 ?>
									<div class="p_products__slide swiper-slide animate-puk" data-product-slide="product-<?php echo get_the_id(); ?>" >
										<div class="pc-show">
											<div class="animate-puk-mask">
												<div class="animate-puk" data-effect="fade-up" data-delay="<?php echo $i ?>s">
													<div class="p_products__slide-top">
														<div class="p_products__slide-photo object-fit">
															<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
														</div>
													</div>
													<div class="p_products__slide-title">
														<?php the_title(); ?>	
													</div>
												</div>
											</div>
										</div>
										<div class="mobile-show">
											<div class="p_products__slide-top">
												<div class="p_products__slide-photo object-fit">
													<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
												</div>
											</div>
											<div class="p_products__slide-title">
												<?php the_title(); ?>	
											</div>
										</div>
									</div>
								<?php endwhile; endif; wp_reset_postdata(); ?>
							</div>
							<div class="swiper-button-next swiper-products-button-next"></div>
							<div class="swiper-button-prev swiper-products-button-prev"></div>
						</div>
						<div class="d-flex justify-content-center">
							<div class="swiper-mainproducts-pagination"></div>	
						</div>
					</div>
					<?php
					$custom_query_products = new WP_Query( array( 'post_type' => 'products') );
					if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
						<?php get_template_part('blocks/product-modal') ?>
					<?php endwhile; endif; ?>
					<!-- <div class="d-flex justify-content-center">
						<div class="swiper-pagination"></div>	
					</div> -->
					<div class="d-flex justify-content-center">
						<a href="<?php echo get_page_url('tpl_products') ?>">
							<div class="kvas-button">
								<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('Всі продукти'); 
								 	}
								?>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="p_main__questions">
		<div class="p_main__questions-photo object-fit">
			<img src="<?php bloginfo('template_url') ?>/img/questions.jpg" alt="">
		</div>
		<div class="p_main__questions-absolute"></div>
		<div class="p_main__questions-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5 offset-md-7">
						<div class="p_main__questions-title">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Залишилися питання?'); 
							 	}
							?>
						</div>
						<div class="p_main__questions-line"></div>
						<div class="p_main__questions-description">
							<?php 
		          $args_questions = [
		              'post_type' => 'page',
		              'fields' => 'ids',
		              'nopaging' => true,
		              'meta_key' => '_wp_page_template',
		              'meta_value' => 'tpl_kvas.php'
		          ];
		          $pages_questions = get_posts( $args_questions );
		          foreach ( $pages_questions as $pages_question ): ?>
		          	<?php echo carbon_get_post_meta($pages_question, 'crb_main_questions_description'); ?>
		          <?php endforeach; ?>	
						</div>
						<a href="<?php echo get_page_url('tpl_faq') ?>">
							<div class="kvas-button__white">
								<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('Дізнатися більше'); 
								 	}
								?>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="p_main__advantages">
		<div class="animate-puk-mask">
			<div class="p_main__advantages-title animate-puk" data-effect="fade-up" data-delay="0.7s">
				<?php
					if ( function_exists( 'pll_the_languages' ) ) {
				 		pll_e('Наші переваги'); 
				 	}
				?>
			</div>
		</div>
		<div class="p_main__advantages-line"></div>
		<div class="animate-puk-mask">
			<div class="p_main__advantages-description animate-puk" data-effect="fade-up" data-delay="1.2s">
				<?php 
        $args_advantages = [
            'post_type' => 'page',
            'fields' => 'ids',
            'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => 'tpl_kvas.php'
        ];
        $pages_advantages = get_posts( $args_advantages );
        foreach ( $pages_advantages as $pages_advantage ): ?>
        	<?php echo carbon_get_post_meta($pages_advantage, 'crb_main_adv_description'); ?>
        <?php endforeach; ?>
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
		              'meta_value' => 'tpl_kvas.php'
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
												<div class="p_main__advantages-photo object-fit">
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
				<?php
					if ( function_exists( 'pll_the_languages' ) ) {
				 		pll_e('Хочеш підібрати напій?'); 
				 	}
				?>
			</div>
		</div>
		<div class="animate-puk-mask">
			<div class="p_main__test-description animate-puk" data-effect="fade-up" data-delay="1.2s">
				<?php
					if ( function_exists( 'pll_the_languages' ) ) {
				 		pll_e('Ми розробили улінакальний опитувальник особисто для тебе!'); 
				 	}
				?>
			</div>
		</div>
		<div class="animate-puk-mask">
			<a href="<?php echo get_page_url('tpl_test') ?>">
				<div class="p_main__test-button animate-puk" data-effect="fade-up" data-delay="1.5s">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('Пройти тест'); 
					 	}
					?>
				</div>
			</a>
		</div>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>