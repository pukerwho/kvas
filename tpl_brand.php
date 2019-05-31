<?php
/*
Template Name: Страница БРЕНД
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="hero">
		<div class="hero-content">
			<div class="hero-subtitle">
				Бренд
			</div>
			<div class="hero-title">
				«АРСЕНІЇВСЬКИЙ»
			</div>
			<div class="hero-text">
				Під ТМ «Арсеніївський» випускається квас бутильований, розливний, а також напої соковмісні.
			</div>
		</div>
		<div class="hero-bottom">
			<div class="hero-bottom__text">
				Вниз	
			</div>
		</div>
	</div>
	<div class="p_brand">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p_brand__title">
						 ТМ «Арсеніївський»
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
						Наши продукты
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
