<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_main.php' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_main_hero', 'Главный слайдер' )
        ->set_layout( 'tabbed-horizontal')
        ->add_fields( array(
          Field::make( 'image', 'crb_main_hero_photo', 'Картинка' )->set_value_type( 'url'),
          Field::make( 'textarea', 'crb_main_hero_title', 'Заголовок' ),
          Field::make( 'textarea', 'crb_main_hero_description', 'Описание' ),
          Field::make( 'text', 'crb_main_hero_link', 'Ссылка' ),
      ) ),
      Field::make( 'image', 'crb_main_brand_photo', 'Картинка для блока БРЕНД (О нас)' )->set_value_type( 'url'),
      Field::make( 'complex', 'crb_advantages', 'Преимущества' )
        ->add_fields( array(
          Field::make( 'image', 'crb_advantages_photo', 'Картинка' )->set_value_type( 'url'),
          Field::make( 'text', 'crb_advantages_text', 'Преимущество' ),
      ) ),
      Field::make( 'textarea', 'crb_main_questions_description', 'Текст для блока ОСТАЛИСЬ ВОПРОСЫ' ),
      Field::make( 'textarea', 'crb_main_adv_description', 'Текст для блока ПРЕИМУЩЕСТВА' ),
    ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_faq.php' )
    ->add_fields( array(
    	Field::make( 'complex', 'crb_faq', 'Вопросы и ответы' )
	    	->add_fields( array(
          Field::make( 'text', 'crb_faq_question', 'Вопрос' ),
          Field::make( 'textarea', 'crb_faq_answer', 'Ответ' ),
	    ) ),
    ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_brand.php' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_brand_description', 'Короткое описание' ),
    ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_test.php' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_test', 'Вопросы и ответы' )
        ->add_fields( array(
          Field::make( 'text', 'crb_test_question', 'Вопрос' ),
          Field::make( 'complex', 'crb_test_answer', 'Ответы' )
          ->set_layout( 'tabbed-horizontal')
          ->add_fields( array(
            Field::make( 'text', 'crb_test_answer_text', 'Ответ' ),
            Field::make( 'text', 'crb_test_answer_value', 'Баллов' ),
          ))
      ) ),
      Field::make( 'textarea', 'crb_test_answer_awesome', 'Если идеально ответили' ),
      Field::make( 'textarea', 'crb_test_answer_good', 'Если хорошо ответили' ),
      Field::make( 'textarea', 'crb_test_answer_bad', 'Если плохо ответили' ),
    ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_brewery.php' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_brewery', 'Шаги' )
        ->set_layout( 'tabbed-horizontal')
        ->add_fields( array(
          Field::make( 'image', 'crb_brewery_photo', 'Картинка' )->set_value_type( 'url'),
          Field::make( 'text', 'crb_brewery_title', 'Заголовок' ),
          Field::make( 'rich_text', 'crb_brewery_text', 'Текст' ),
      ) ),
    ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_contact.php' )
    ->add_fields( array(
      Field::make( 'rich_text', 'crb_contact_office', 'Центральный офис' ),
      Field::make( 'rich_text', 'crb_contact_production', 'Производство' ),
      Field::make( 'complex', 'crb_contact_emails', 'Emails' )
        ->add_fields( array(
          Field::make( 'text', 'crb_contact_specialist', 'Должность' ),
          Field::make( 'text', 'crb_contact_email', 'Email' ),
      ) ),
      Field::make( 'textarea', 'crb_contact_map', 'Карта (iframe)' ),
      Field::make( 'text', 'crb_contact_mainemail', 'Главная почта' ),
      Field::make( 'text', 'crb_contact_facebook', 'Ссылка на Facebook' ),
      Field::make( 'text', 'crb_contact_instagram', 'Ссылка на Instagram' ),
    ) );
}

?>