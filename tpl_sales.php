<?php
/*
Template Name: Страница АКЦИИ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_posts">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="p_posts__title">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('Акції'); 
					 	}
					?>
				</div>
				<div class="p_posts__line"></div>
			</div>
		</div>
		<?php 
	  $custom_query_sales = new WP_Query( array( 
	  	'post_type' => 'sales',
	  	'posts_per_page' => 1 
	  ) );
	  if ($custom_query_sales->have_posts()) : while ($custom_query_sales->have_posts()) : $custom_query_sales->the_post(); ?>
	  	<div class="p_posts__first">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-5">
						<div class="p_posts__first-img object-fit">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
						</div>
					</div>
					<div class="col-lg-5">
						<div class="p_posts__first-title">
							<a href="<?php echo get_the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</div>
						<div class="p_posts__first-description">
							<?php echo carbon_get_the_post_meta('crb_sales_description') ?>
						</div>
						<div class="p_posts__first-date">
							<?php echo carbon_get_the_post_meta('crb_sales_date') ?>
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
					  $custom_query_sales = new WP_Query( array( 
					  	'post_type' => 'sales',
					  	'offset' => 1,
					  	'posts_per_page' => 10, 
					  ) );
					  if ($custom_query_sales->have_posts()) : while ($custom_query_sales->have_posts()) : $custom_query_sales->the_post(); ?>
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
				<div class="swiper-button-next swiper-posts-button-next"></div>
				<div class="swiper-button-prev swiper-posts-button-prev"></div>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			<div class="swiper-pagination"></div>	
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_template_part('blocks/b_line') ?>

<?php get_footer(); ?>