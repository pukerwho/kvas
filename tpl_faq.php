<?php
/*
Template Name: Страница FAQ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="p_faq__title">
					FAQ
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<?php
				$faqs = carbon_get_the_post_meta( 'crb_faq' );
				foreach ( $faqs as $faq ): ?>
					<div class="p_faq__item">
						<div class="p_faq__question">
							<span><?php echo $faq['crb_faq_question'] ?></span>
							<div class="p_faq__question-toggle">
								>
							</div>
						</div>
						<div class="p_faq__line"></div>
						<div class="p_faq__answer">
							<div class="p_faq__answer-text">
								<?php echo $faq['crb_faq_answer'] ?>	
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_template_part('blocks/b_line') ?>

<?php get_footer(); ?>