<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="prerol">
	<div class="prerol__block prerol__kvas" style="background: url('<?php echo carbon_get_the_post_meta( 'crb_main_photo_one' ); ?>'); background-size: cover; background-position: center;">
		<a href="<?php echo get_page_url('tpl_kvas') ?>">
			<div class="prerol__absolute" style="background-color: <?php echo carbon_get_the_post_meta( 'crb_main_color_one' ); ?>"></div>
			<div class="prerol__content">
				<div class="prerol__icon">
					<img src="<?php echo carbon_get_the_post_meta( 'crb_main_icon_one' ); ?>" alt="">
				</div>
				<div class="prerol__title">
					<?php echo carbon_get_the_post_meta( 'crb_main_name_one' ); ?>
				</div>
			</div>
		</a>
	</div>
	
	<div class="prerol__block prerol__drink" style="background: url('<?php echo carbon_get_the_post_meta( 'crb_main_photo_two' ); ?>');background-size: cover; background-position: center;">
		<a href="<?php echo get_page_url('tpl_drink') ?>">
			<div class="prerol__absolute" style="background-color: <?php echo carbon_get_the_post_meta( 'crb_main_color_two' ); ?>;"></div>
			<div class="prerol__content">
				<div class="prerol__icon">
					<img src="<?php echo carbon_get_the_post_meta( 'crb_main_icon_two' ); ?>" alt="">
				</div>
				<div class="prerol__title">
					<?php echo carbon_get_the_post_meta( 'crb_main_name_two' ); ?>
				</div>
			</div>
		</a>
	</div>
	
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>