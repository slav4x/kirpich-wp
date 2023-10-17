<?php

  $conditions = [];
  if ($category === 'Строительный кирпич') {
    $conditions = [
      ['key' => 'hollowness-st', 'value' => get_field('hollowness-st'), 'compare' => '='],
      ['key' => 'type-size-st', 'value' => get_field('type-size-st'), 'compare' => '=']
    ];
  } elseif ($category === 'Облицовочный кирпич') {
    $conditions = [
      ['key' => 'color-ob', 'value' => get_field('color-ob'), 'compare' => '='],
      ['key' => 'type-size-ob', 'value' => get_field('type-size-ob'), 'compare' => '=']
    ];
  } elseif ($category === 'Газобетонные блоки') {
    $conditions = [
      ['key' => 'type-gb', 'value' => get_field('type-gb'), 'compare' => '=']
    ];
  } elseif ($category === 'Керамические блоки') {
    $conditions = [
      ['key' => 'type-cer', 'value' => get_field('type-cer'), 'compare' => '=']
    ];
  } elseif ($category === 'Сухие смеси') {
    $conditions = [
      ['key' => 'work-su', 'value' => get_field('work-su'), 'compare' => '=']
    ];
  }

  $args = [
    'post_type' => 'catalog',
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'meta_query' => $conditions,
  ];

  $hit_query = new WP_Query($args);

  if ($hit_query->have_posts()) {
    while ($hit_query->have_posts()) {
      $hit_query->the_post();
      include 'item.php';
    }
    wp_reset_postdata();
  }