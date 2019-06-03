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
					<a href="<?php echo get_page_url('tpl_sales') ?>">
						<div class="p_post__meta-back">
							<img src="<?php bloginfo('template_url') ?>/img/arrow-left.svg" alt=""> <?php if ( function_exists( 'pll_the_languages' ) ) { pll_e('Назад'); } ?> <span>
								<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('до всіх акцій'); 
								 	}
								?>
							</span>
						</div>
					</a>
					<div class="p_post__meta-date">
						<?php echo get_the_date('j/m/y') ?>
					</div>
				</div>
				<div class="p_post__photo">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
				</div>
				<div class="p_post__content">
					<div class="p_post__content-title">
						<?php the_title(); ?>
					</div>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>