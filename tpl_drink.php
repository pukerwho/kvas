<?php
/*
Template Name: Страница НАПИТОК
*/
?>

<?php $_SESSION['menuvar'] = 'drink'; ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="p_main">
	<div class="main-hero-swiper swiper-container">
		<div class="swiper-wrapper">
			<?php 
			$mainsliders = carbon_get_the_post_meta('crb_drink_hero');
			foreach( $mainsliders as $mainslider ): ?>
				<div class="swiper-slide">
					<div class="main-hero" style="background-image: url(<?php echo $mainslider['crb_drink_hero_photo'] ?>) ;background-size: cover; -webkit-background-size: cover; background-position: center top;">
						<div class="container">
							<div class="row">
								<div class="col-md-5 offset-md-7">
									<div class="main-hero__title">
										<?php echo $mainslider['crb_drink_hero_title'] ?>
									</div>
									<div class="main-hero__description">
										<?php echo $mainslider['crb_drink_hero_description'] ?>
									</div>
									<a href="<?php echo $mainslider['crb_drink_hero_link'] ?>">
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
			<img src="<?php echo carbon_get_the_post_meta('crb_drink_brand_photo') ?>" alt="">
		</div>
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
										<div class="animate-puk-mask">
											<div class="animate-puk" data-effect="fade-up" data-delay="<?php echo $i ?>s">
												<div class="p_products__slide-top">
													<div class="p_products__slide-cover" style="background-color: <?php echo carbon_get_the_post_meta('crb_product_color') ?>;"></div>
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
		              'meta_value' => 'tpl_drink.php'
		          ];
		          $pages_questions = get_posts( $args_questions );
		          foreach ( $pages_questions as $pages_question ): ?>
		          	<?php echo carbon_get_post_meta($pages_question, 'crb_drink_questions_description'); ?>
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
	<!-- Новости -->
	<div class="p_posts">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_posts__title">
						<?php
							if ( function_exists( 'pll_the_languages' ) ) {
						 		pll_e('Новини'); 
						 	}
						?>
					</div>
					<div class="p_posts__line"></div>
				</div>
			</div>
			<?php 
		  $custom_query_news = new WP_Query( array( 
		  	'post_type' => 'news',
		  	'posts_per_page' => 1 
		  ) );
		  if ($custom_query_news->have_posts()) : while ($custom_query_news->have_posts()) : $custom_query_news->the_post(); ?>
		  	<div class="p_posts__first">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-5">
							<div class="p_posts__first-img object-fit">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
							</div>
						</div>
						<div class="col-md-5">
							<div class="p_posts__first-title">
								<a href="<?php echo get_the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</div>
							<div class="p_posts__first-description">
								<?php echo carbon_get_the_post_meta('crb_news_description') ?>
							</div>
							<div class="p_posts__first-date">
								<?php echo get_the_date('j.m.y') ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="swiper-container p_posts__slider">
						<div class="swiper-wrapper">
							<?php 
						  $custom_query_news = new WP_Query( array( 
						  	'post_type' => 'news',
						  	'offset' => 1,
						  	'posts_per_page' => 10, 
						  ) );
						  if ($custom_query_news->have_posts()) : while ($custom_query_news->have_posts()) : $custom_query_news->the_post(); ?>
				  			<div class="p_posts__item swiper-slide">
				  				<a href="<?php echo get_the_permalink(); ?>">
					  				<div class="p_posts__item-img object-fit">
					  					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
					  				</div>
					  				<div class="p_posts__item-title">
					  					<?php the_title(); ?>
					  				</div>
				  				</a>
				  			</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<div class="swiper-pagination"></div>	
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
            'meta_value' => 'tpl_drink.php'
        ];
        $pages_advantages = get_posts( $args_advantages );
        foreach ( $pages_advantages as $pages_advantage ): ?>
        	<?php echo carbon_get_post_meta($pages_advantage, 'crb_drink_adv_description'); ?>
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
		              'meta_value' => 'tpl_drink.php'
		          ];
		          $pages_advantages = get_posts( $args_advantages );
		          foreach ( $pages_advantages as $pages_advantage ): ?>
		          	<?php $i=0; ?>
		          	<?php 
								$advantages = carbon_get_post_meta($pages_advantage, 'crb_drink_advantages');
								foreach ( $advantages as $advantage ): ?>
									<?php $i++; $i=$i/2 ?>
									<div class="swiper-slide">
										<div class="animate-puk-mask">
											<div class="animate-puk" data-effect="fade-up" data-delay="<?php echo $i ?>s">
												<div class="p_main__advantages-photo object-fit">
													<img src="<?php echo $advantage['crb_drink_advantages_photo'] ?>">
												</div>
												<div class="p_main__advantages-text">
													<?php echo $advantage['crb_drink_advantages_text'] ?>
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
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>