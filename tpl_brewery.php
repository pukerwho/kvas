<?php
/*
Template Name: Страница КВАСОВАРНЯ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_brewery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="p_brewery__title">
					Квасоварня
				</div>
				<div class="p_brewery__line"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="slider-puk-container">
					<div class="slider-puk-wrapper">
						<?php 
						$brewery = carbon_get_the_post_meta('crb_brewery');
						foreach ( $brewery as $brew ): ?>
							<?php $brew_number++; ?>
							<div class="slider-puk-slide" data-slider-puk-id="<?php echo $brew_number ?>">
								<div class="p_brewery__grid">
									<div class="animate-puk-mask">
										<div class="p_brewery__img">
											<img src="<?php echo $brew['crb_brewery_photo'] ?>" alt="">
											<div class="p_brewery__number">
												<?php echo $brew_number ?>.
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_template_part('blocks/b_line') ?>

<?php get_footer(); ?>