<?php

  add_theme_support('title-tag');

  add_action('init', 'jquery');
  add_action('init', 'register_post_type');

  add_action('admin_menu', 'remove_menus');

  add_action('wp_enqueue_scripts', 'style_theme');
  add_action('wp_footer', 'script_theme');
  add_action('admin_enqueue_scripts', 'custom_admin_styles');

  function jquery(){
    if(!is_admin()){
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
      wp_enqueue_script('jquery');
    }
  }

  function style_theme(){
    wp_enqueue_style('libs-css', get_template_directory_uri() . '/css/libs.min.css?v=1.6.0');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.min.css?v=1.6.0');
    wp_enqueue_style('style-base', get_template_directory_uri() . '/style.css?v=1.6.0');
  }

  function script_theme(){
    wp_enqueue_script('libs', get_template_directory_uri() . '/js/libs.min.js?v=1.6.0');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.min.js?v=1.6.0');
    wp_enqueue_script('frontend', get_template_directory_uri() . '/js/frontend.js?v=1.6.0');
	wp_enqueue_script('cart', get_template_directory_uri() . '/js/cart.js?v=1.6.0');
  }

  function custom_admin_styles() {
    wp_enqueue_style('custom-admin-styles', get_template_directory_uri() . '/style.css?v=1.6.0');
  }

  function remove_menus() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
  }

  $slug = 'catalog';
  $slug_name = 'Каталог';
  register_post_type($slug, array(
    'labels' => [
      'name' => $slug_name,
      'singular_name' => $slug_name,
      'menu_name' => $slug_name,
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавить',
      'edit_item' => 'Редактировать',
      'new_item' => $slug_name,
      'view_item' => 'Смотреть',
      'search_items' => 'Найти',
      'not_found' => 'Ничего не найдено',
      'not_found_in_trash' => 'В корзине ничего не найдено',
      'parent_item_colon' => '',
    ],
    'public' => true,
    'has_archive' => false,
    'supports' => array('title', 'custom-fields'),
    'menu_icon' => 'dashicons-star-filled',
    'show_in_rest' => true,
    'rest_base' => $slug,
    'rest_controller_class' => 'WP_REST_Posts_Controller',
  ));

  $slug = 'blog';
  $slug_name = 'Блог';
  register_post_type($slug, array(
    'labels' => [
      'name' => $slug_name,
      'singular_name' => $slug_name,
      'menu_name' => $slug_name,
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавить',
      'edit_item' => 'Редактировать',
      'new_item' => $slug_name,
      'view_item' => 'Смотреть',
      'search_items' => 'Найти',
      'not_found' => 'Ничего не найдено',
      'not_found_in_trash' => 'В корзине ничего не найдено',
      'parent_item_colon' => '',
    ],
    'public' => true,
    'has_archive' => false,
    'supports' => array('title', 'editor'),
    'menu_icon' => 'dashicons-welcome-write-blog',
    'show_in_rest' => true,
    'rest_base' => $slug,
    'rest_controller_class' => 'WP_REST_Posts_Controller',
  ));

  function custom_search_template_redirect() {
    if ( is_search() && !empty( $_GET['s'] ) ) {
      include locate_template( 'search-catalog.php' );
      die;
    }
  }
  add_action( 'template_redirect', 'custom_search_template_redirect' );

  // add_action('acf/init', 'my_acf_op_init');
  // function my_acf_op_init() {
  //   if( function_exists('acf_add_options_page') ) {
  //     $option_page = acf_add_options_page(array(
  //       'page_title'    => __('Контакты'),
  //       'menu_title'    => __('Контакты'),
  //       'menu_slug'     => 'theme-contacts',
  //       'capability'    => 'edit_posts',
  //       'redirect'      => false
  //     ));
  //   }
  // }

	function custom_catalog_columns($columns) {
		$new_columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Заголовок',
			'category' => 'Категория',
			'price' => 'Цена',
			'date' => 'Дата'
		);
		return $new_columns;
	}
	add_filter('manage_catalog_posts_columns', 'custom_catalog_columns');

	// Заполняем колонки данными
	function custom_catalog_column_data($column, $post_id) {
		switch ($column) {
			case 'price':
				$price = get_field('price', $post_id);
				echo $price ? $price.' руб.' : 'Нет данных';
				break;
			case 'category':
				$category = get_field('category', $post_id);
				echo $category ? $category : 'Нет данных';
				break;
			default:
				break;
		}
	}
	add_action('manage_catalog_posts_custom_column', 'custom_catalog_column_data', 10, 2);