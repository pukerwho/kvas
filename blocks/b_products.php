<div class="b_products">
	<div class="container">
		<div class="row">
			<div class="col-md-6 b_products__col">
				<a href="<?php echo get_page_url('tpl_product_kvas') ?>">
					<div class="b_products__item" style="background: url('<?php bloginfo('template_url') ?>/img/kvass.jpg');">
						<div class="b_products__item-title">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Квас'); 
							 	}
							?>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 b_products__col">
				<a href="<?php echo get_page_url('tpl_product_drink') ?>">
					<div class="b_products__item" style="background: url('<?php bloginfo('template_url') ?>/img/drinks.jpg');">
						<div class="b_products__item-title">
							<?php
								if ( function_exists( 'pll_the_languages' ) ) {
							 		pll_e('Напої'); 
							 	}
							?>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>