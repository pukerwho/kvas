    </section>
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
	              <?php wp_nav_menu([
	                'theme_location' => 'head_menu',
	                'container' => 'nav',
	                'container_class' => 'footer__menu',
	                'menu_id' => 'head_menu',
	              ]); ?>
	            </div>
	            <div class="footer__right">
	              <div class="d-flex">
	                <a href="#">
	                  <div class="contact-icon">
	                    <img src="<?php bloginfo('template_url') ?>/img/email.svg" alt="Email" class="contact-icon__email">
	                  </div>
	                </a>
	                <a href="#">
	                  <div class="contact-icon">
	                    <img src="<?php bloginfo('template_url') ?>/img/facebook.svg" alt="Facebook" class="contact-icon__facebook">
	                  </div>
	                </a>
	                <a href="#">
	                  <div class="contact-icon">
	                    <img src="<?php bloginfo('template_url') ?>/img/instagram.svg" alt="Instagram" class="contact-icon__instagram">
	                  </div>
	                </a>
	                <a href="#">
	                  <div class="contact-icon mr-0">
	                    <div class="footer__lang">
	                    	RU
	                    </div>
	                  </div>
	                </a>
	              </div>
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
	            	Поздравляем!
	            </div>
	            <div class="testresult__modal-line"></div>
	            <div class="testresult__modal-grid">
	            	<div class="testresult__modal-item">
	            		<img src="<?php bloginfo('template_url') ?>/img/kvass.jpg" alt="">
	            	</div>
	            	<div class="testresult__modal-item">
	            		<div class="testresult__modal-text">
	            			Когда мы были детьми в Советском Союзе, газировки у нас не было – воду на улицах вообще почти не продавали. Поэтому квас буквально спасал нам жизнь!Когда мы были детьми в Советском Союзе, газировки у нас не было – воду на улицах вообще почти не продавали.
	            		</div>
	            		<div class="kvas-button">
	            			Выбрать квас
	            		</div>
	            	</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="modal__bg"></div>
	  <?php endif ?>
    <?php wp_footer(); ?>
</body>
</html>