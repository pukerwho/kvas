<?php
/*
Template Name: Страница БРЕНД
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="hero" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-position: center top; background-size: cover;">
		
		<div class="hero-content">
			<div class="animate-puk-mask">
				<div class="hero-subtitle">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('Бренд'); 
					 	}
					?>
				</div>
			</div>
			<div class="animate-puk-mask">
				<div class="hero-title">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('«АРСЕНІЇВСЬКИЙ»'); 
					 	}
					?>
				</div>
			</div>
			<div class="animate-puk-mask">
				<div class="hero-text">
					<?php echo carbon_get_the_post_meta('crb_brand_description') ?>
				</div>
			</div>
		</div>
		<div class="hero-bottom">
			<div class="hero-bottom__text">
				<?php
					if ( function_exists( 'pll_the_languages' ) ) {
				 		pll_e('Вниз'); 
				 	}
				?>
			</div>
		</div>
	</div>
	<div class="p_brand">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_brand__title">
						<?php
							if ( function_exists( 'pll_the_languages' ) ) {
						 		pll_e('ТМ «Арсеніївський»'); 
						 	}
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="p_brand__content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_brand__title">
						<?php
							if ( function_exists( 'pll_the_languages' ) ) {
						 		pll_e('Наші продукти'); 
						 	}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('blocks/b_products') ?>
		<?php get_template_part('blocks/b_line') ?>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
