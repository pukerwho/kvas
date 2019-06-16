<?php
/*
Template Name: Продукты НАПИТКИ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_products__inner">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">
					<div class="p_products__inner-title">
						<?php the_title(); ?>
					</div>
					<div class="p_products__inner-line"></div>
				</h1>
			</div>
		</div>
		<div class="row">
			<?php
			$custom_query_products = new WP_Query( array( 
				'post_type' => 'products',
				'meta_query' => array(
					array(
						'key'     => 'crb_product_drink',
						'value'   => 'no',
						'compare' => '=',
					),
				)
			) );
			if ($custom_query_products->have_posts()) : while ($custom_query_products->have_posts()) : $custom_query_products->the_post(); ?>
			<div class="col-md-4">
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
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>