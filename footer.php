    </section>
    <?php if( !is_page_template( 'tpl_main.php' )): ?>
    <footer class="footer" id="footer">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="footer__content">
	            <div class="footer__logo">
	              <a href="<?php echo home_url(); ?>">
	                <img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt="">
	              </a>
	            </div>
	            <div class="footer__center">
	              <?php if ( $_SESSION['menuvar'] === 'drink' ): ?>
	                <?php wp_nav_menu([
	                  'theme_location' => 'footer_menu_drink',
	                  'container' => 'nav',
	                  'container_class' => 'footer__menu',
	                  'menu_id' => 'head_menu',
	                ]); ?>
	              <?php else: ?>
	                <?php wp_nav_menu([
	                  'theme_location' => 'head_menu',
	                  'container' => 'nav',
	                  'container_class' => 'footer__menu',
	                  'menu_id' => 'head_menu',
	                ]); ?>
	              <?php endif; ?>
	            </div>
	            <div class="footer__right">
	            	<?php 
			          $args_contact_page = [
			              'post_type' => 'page',
			              'fields' => 'ids',
			              'nopaging' => true,
			              'meta_key' => '_wp_page_template',
			              'meta_value' => 'tpl_contact.php'
			          ];
			          $pages_contacts = get_posts( $args_contact_page );
			          foreach ( $pages_contacts as $pages_contact ): ?>
		              <div class="d-flex">
		                <a href="mailto:<?php echo carbon_get_post_meta($pages_contact, 'crb_contact_mainemail'); ?>" target="_blank">
		                  <div class="contact-icon">
		                    <img src="<?php bloginfo('template_url') ?>/img/email.svg" alt="Email" class="contact-icon__email">
		                  </div>
		                </a>
		                <a href="<?php echo carbon_get_post_meta($pages_contact, 'crb_contact_facebook'); ?>" target="_blank">
		                  <div class="contact-icon">
		                    <img src="<?php bloginfo('template_url') ?>/img/facebook.svg" alt="Facebook" class="contact-icon__facebook">
		                  </div>
		                </a>
		                <a href="<?php echo carbon_get_post_meta($pages_contact, 'crb_contact_instagram'); ?>" target="_blank">
		                  <div class="contact-icon">
		                    <img src="<?php bloginfo('template_url') ?>/img/instagram.svg" alt="Instagram" class="contact-icon__instagram">
		                  </div>
		                </a>
		                <div class="mr-0">
	                    <div class="header__lang">
	                      <?php 
	                        if ( function_exists( 'pll_the_languages' ) ) {pll_the_languages( array() );
	                        }
	                      ?>
	                    </div>
	                  </div>
		              </div>
		            <?php endforeach; ?>
	            </div>
	          </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="copyright">
    					<div>
    						© <?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('2019 Арсеньевский. Всі права захищені'); 
								 	}
								?>
    					</div>
    					<div>
    						<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('Розроблено'); 
								 	}
								?> <a href="http://webkitchen.kiev.ua/" target="_blank">Webkitchen</a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </footer>
    <?php if( is_page_template( 'tpl_test.php' )): ?>
	  <div class="testresult__modal">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="testresult__modal-box">
	            <div class="testresult__modal-close">
	              <img src="<?php bloginfo('template_url') ?>/img/close.svg" alt="" width="8px">
	            </div>
	            <div class="testresult__modal-title">
	            	<?php
									if ( function_exists( 'pll_the_languages' ) ) {
								 		pll_e('Результати'); 
								 	}
								?>
	            </div>
	            <div class="testresult__modal-line"></div>
	            <div class="testresult__modal-grid">
	            	<div class="testresult__modal-item">
	            		<img src="<?php bloginfo('template_url') ?>/img/kvass.jpg" alt="">
	            	</div>
	            	<div class="testresult__modal-item">
	            		<div class="testresult__modal-text">
	            			<?php 
					          $args_tests = [
					              'post_type' => 'page',
					              'fields' => 'ids',
					              'nopaging' => true,
					              'meta_key' => '_wp_page_template',
					              'meta_value' => 'tpl_test.php'
					          ];
					          $pages_tests = get_posts( $args_tests );
					          foreach ( $pages_tests as $pages_test ): ?>
		            			<div class="testresult__modal-awesome">
		            				<?php echo carbon_get_post_meta($pages_test, 'crb_test_answer_awesome') ?>
		            			</div>
		            			<div class="testresult__modal-good">
		            				<?php echo carbon_get_post_meta($pages_test, 'crb_test_answer_good') ?>
		            			</div>
		            			<div class="testresult__modal-bad">
		            				<?php echo carbon_get_post_meta($pages_test, 'crb_test_answer_bad') ?>
		            			</div>
		            		<?php endforeach; ?>
	            		</div>
	            		<a href="<?php echo get_page_url('tpl_products') ?>">
		            		<div class="kvas-button">
		            			<?php
												if ( function_exists( 'pll_the_languages' ) ) {
											 		pll_e('Вибрати квас'); 
											 	}
											?>
		            		</div>
		            	</a>
	            	</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="modal__bg"></div>
	  <?php endif ?>
	  <?php endif ?>
    <?php wp_footer(); ?>
</body>
</html>