<?php
/*
Template Name: Страница КОНТАКТЫ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="p_contact__title">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('Контакти'); 
					 	}
					?>
				</div>
				<div class="p_contact__line"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="p_contact__grid">
					<div class="p_contact__item">
						<div class="p_contact__subtitle">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Центральний офіс'); 
							 	}
							?>
						</div>
						<div class="p_contact__content">
							<?php echo carbon_get_the_post_meta( 'crb_contact_office' ); ?>
						</div>
					</div>
					<div class="p_contact__item">
						<div class="p_contact__subtitle">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Виробництво'); 
							 	}
							?>:
						</div>
						<div class="p_contact__content">
							<?php echo carbon_get_the_post_meta( 'crb_contact_production' ); ?>
						</div>
					</div>
					<div class="p_contact__item">
						<div class="p_contact__subtitle">
							E-mail
						</div>
						<div class="p_contact__content">
							<?php 
							$contact_emails = carbon_get_the_post_meta('crb_contact_emails');
							foreach ($contact_emails as $email): ?>
								<div class="p_contact__emails">
									<div class="p_contact__specialist">
										<?php echo $email['crb_contact_specialist'] ?>
									</div>
									<div class="p_contact__email">
										<?php echo $email['crb_contact_email'] ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="p_contact__map">
		<?php echo carbon_get_the_post_meta( 'crb_contact_map' ); ?>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>