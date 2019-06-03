<?php
/*
Template Name: Страница ТЕСТ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="p_test">
	<div class="p_test__banner">
		<img src="<?php echo get_the_post_thumbnail_url(); ?>" srcset="<?php echo get_the_post_thumbnail_url('full'); ?>" alt="">
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="p_test__title">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('Дізнайся який ти любитель квасу?'); 
					 	}
					?>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php
				$tests = carbon_get_the_post_meta( 'crb_test' );
				foreach ( $tests as $test ): ?>
					<?php $i++; ?>
					<?php $y++; $y=$y/4 ?>
					<div class="p_test__item">
						<div class="p_test__question">
							<div class="p_test__number">
								<?php echo $i ?>.
							</div>
							<span>
								<?php echo $test['crb_test_question'] ?>		
							</span>
						</div>
						<div class="p_test__answers">
							<?php
							$tests_answer = $test['crb_test_answer'];
							foreach ( $tests_answer as $test_answer ): ?>
								<?php $y++; ?>
								<div class="p_test__answer">
									<input type="radio" name="kvastest<?php echo $i ?>" id="kvastest<?php echo $i ?><?php echo $y ?>" value="<?php echo $test_answer['crb_test_answer_value'] ?>" class="kvastest">
									<label for="kvastest<?php echo $i ?><?php echo $y ?>"><?php echo $test_answer['crb_test_answer_text'] ?></label>	
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="kvas-button p_test__submit">
					<?php
						if ( function_exists( 'pll_the_languages' ) ) {
					 		pll_e('Дізнатися результат'); 
					 	}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>