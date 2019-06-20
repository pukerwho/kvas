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
  <?php if( !is_page_template( 'tpl_main.php' )): ?>
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
              <?php 
              $args_main = [
                  'post_type' => 'page',
                  'fields' => 'ids',
                  'nopaging' => true,
                  'meta_key' => '_wp_page_template',
                  'meta_value' => 'tpl_main.php'
              ];
              $pages_main = get_posts( $args_main );
              foreach ( $pages_main as $page_main ): ?>
                <div class="header__top">
                  <a href="<?php echo get_page_url('tpl_kvas') ?>">
                    <div class="header__top-item">
                      <img src="<?php echo carbon_get_post_meta($page_main, 'crb_main_icon_one') ?>" alt=""> <?php echo carbon_get_post_meta($page_main, 'crb_main_name_one') ?>
                    </div>
                  </a>
                  <a href="<?php echo get_page_url('tpl_drink') ?>">
                    <div class="header__top-item">
                      <img src="<?php echo carbon_get_post_meta($page_main, 'crb_main_icon_two') ?>" alt=""> <?php echo carbon_get_post_meta($page_main, 'crb_main_name_two') ?>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
              <?php if ( $_SESSION['menuvar'] === 'drink' ): ?>
                <?php wp_nav_menu([
                  'theme_location' => 'head_menu_drink',
                  'container' => 'nav',
                  'container_class' => 'header__menu',
                  'menu_id' => 'head_menu',
                ]); ?>
              <?php else: ?>
                <?php wp_nav_menu([
                  'theme_location' => 'head_menu',
                  'container' => 'nav',
                  'container_class' => 'header__menu',
                  'menu_id' => 'head_menu',
                ]); ?>
              <?php endif; ?>
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
            <div class="mobile-show">
              <div class="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="mobile-show">
    <div class="mobile-cover">
      <div>
        <?php 
        $args_main = [
            'post_type' => 'page',
            'fields' => 'ids',
            'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => 'tpl_main.php'
        ];
        $pages_main = get_posts( $args_main );
        foreach ( $pages_main as $page_main ): ?>
          <div class="header__top">
            <a href="<?php echo get_page_url('tpl_kvas') ?>">
              <div class="header__top-item">
                <img src="<?php echo carbon_get_post_meta($page_main, 'crb_main_icon_one') ?>" alt=""> <?php echo carbon_get_post_meta($page_main, 'crb_main_name_one') ?>
              </div>
            </a>
            <a href="<?php echo get_page_url('tpl_drink') ?>">
              <div class="header__top-item">
                <img src="<?php echo carbon_get_post_meta($page_main, 'crb_main_icon_two') ?>" alt=""> <?php echo carbon_get_post_meta($page_main, 'crb_main_name_two') ?>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <?php if ( $_SESSION['menuvar'] === 'drink' ): ?>
        <?php wp_nav_menu([
          'theme_location' => 'head_menu_drink',
          'container' => 'nav',
          'container_class' => 'header__menu',
          'menu_id' => 'head_menu',
        ]); ?>
      <?php else: ?>
        <?php wp_nav_menu([
          'theme_location' => 'head_menu',
          'container' => 'nav',
          'container_class' => 'header__menu',
          'menu_id' => 'head_menu',
        ]); ?>
      <?php endif; ?>
      <div class="mobile-cover-line"></div>
      <div class="mobile-lang">
        <?php 
          if ( function_exists( 'pll_the_languages' ) ) {
            pll_the_languages();
          }
        ?>  
      </div>
    </div>
  </div>
  <?php endif; ?>
  <section id="content" role="main">