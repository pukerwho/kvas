<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <base href="/">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo home_url(); ?>/en">
  <link rel="alternate" hreflang="ru" href="<?php echo home_url(); ?>/ru">
  <link rel="alternate" hreflang="ua" href="<?php echo home_url(); ?>/ua">
  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
</head>
<body <?php echo body_class(); ?>>
  <!-- <div class="preloader"></div> -->
  
  <header id="header" class="header" role="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header__content">
            <div class="header__logo">
              <a href="<?php echo home_url(); ?>">
                <img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt="">
              </a>
            </div>
            <div class="header__center">
              <div class="header__top">
                <a href="#">
                  <div class="header__top-item">
                    <img src="<?php bloginfo('template_url') ?>/img/kvas-icon.svg" alt=""> Квас Арсеньевский
                  </div>
                </a>
                <a href="#">
                  <div class="header__top-item">
                    <img src="<?php bloginfo('template_url') ?>/img/water.svg" alt=""> Напиток Арсеньевский
                  </div>
                </a>
              </div>
              <?php wp_nav_menu([
                'theme_location' => 'head_menu',
                'container' => 'nav',
                'container_class' => 'header__menu',
                'menu_id' => 'head_menu',
              ]); ?>
            </div>
            <div class="header__right">
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
    </div>
  </header>
  <section id="content" role="main">