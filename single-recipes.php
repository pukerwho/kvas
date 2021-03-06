<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="p_post">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="p_post__title">
					<?php the_title(); ?>
				</div>
				<div class="p_post__line"></div>
				<div class="p_post__meta">
					<a href="<?php echo get_page_url('tpl_recipes') ?>">
						<div class="p_post__meta-back">
							<img src="<?php bloginfo('template_url') ?>/img/arrow-left.svg" alt=""> <span><?php if ( function_exists( 'pll_the_languages' ) ) { pll_e('Назад'); } ?> </span> <span class="pc-show">
								<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('до всіх рецептів'); 
								 	}
								?>
							</span>
						</div>
					</a>
					<div class="p_post__meta-date">
						<?php echo get_the_date('j/m/y') ?>
					</div>
				</div>
				<div class="p_post__photo object-fit">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
				</div>
				<div class="p_post__grid">
					<div class="p_post__item">
						<div class="p_post__item-subtitle">
							<img src="<?php bloginfo('template_url') ?>/img/sostav.svg" alt=""> <?php if ( function_exists( 'pll_the_languages' ) ) { pll_e('Склад'); } ?>
						</div>
						<?php $sostavs = carbon_get_the_post_meta('crb_recipes_sostavs'); 
						foreach ($sostavs as $sostav): ?>
							<div class="p_post__item-text">
								<div class="p_post__item-block">
									<?php echo $sostav['crb_recipes_sostav'] ?>		
								</div>
							</div>
						<?php endforeach; ?>
						<div class="p_post__item-subtitle">
							<img src="<?php bloginfo('template_url') ?>/img/time.png" alt=""> <?php if ( function_exists( 'pll_the_languages' ) ) { pll_e('Час приготування'); } ?>
						</div>
						<div class="p_post__item-text">
							<?php echo carbon_get_the_post_meta('crb_recipes_time') ?>
						</div>
					</div>
					<div class="p_post__item">
						<div class="p_post__item-subtitle">
							<img src="<?php bloginfo('template_url') ?>/img/steps.png" alt=""> <?php if ( function_exists( 'pll_the_languages' ) ) { pll_e('Покроковий рецепт приготування'); } ?>
						</div>
						<div class="p_post__steps">
							<?php $steps = carbon_get_the_post_meta('crb_recipes_steps');
							foreach ($steps as $step): ?>
								<?php $step_number++ ?>
								<div class="p_post__steps-subtitle">
									<?php if ( function_exists( 'pll_the_languages' ) ) { pll_e('Крок'); } ?> <?php echo $step_number; ?>
								</div>
								<div class="p_post__steps-text">
									<?php echo $step['crb_recipes_step']; ?>
								</div>
							<?php endforeach; ?>
						</div>
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