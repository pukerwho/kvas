<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'products' )
    ->add_fields( array(
      Field::make( 'color', 'crb_product_color', 'Цвет фона' ),
      Field::make( 'text', 'crb_product_volume', 'Обьем' ),
      Field::make( 'text', 'crb_product_qty', 'Кол-во в коробке' ),
      Field::make( 'text', 'crb_product_upakovka', 'Упаковка' ),
      Field::make( 'text', 'crb_product_term', 'Хранение' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'sales' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_sales_description', 'Короткое описание' ),
      Field::make( 'text', 'crb_sales_date', 'Сроки действия' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'recipes' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_recipes_description', 'Короткое описание' ),
      Field::make( 'text', 'crb_recipes_qty', 'Кол-во порций' ),
      Field::make( 'text', 'crb_recipes_time', 'Время приготовления' ),
      Field::make( 'complex', 'crb_recipes_sostavs', 'Состав' )
        ->add_fields( array(
          Field::make( 'text', 'crb_recipes_sostav', 'Что входит?' ),
      ) ),
      Field::make( 'complex', 'crb_recipes_steps', 'Пошаговый рецепт' )
        ->add_fields( array(
          Field::make( 'textarea', 'crb_recipes_step', 'Шаг' ),
      ) ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'news' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_news_description', 'Короткое описание' ),
  ) );
}

?>