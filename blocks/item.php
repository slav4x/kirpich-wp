<?php
  global $categories;

  $category = get_field('category');
  $image = get_field('image');
  $title = get_the_title();

  $size_field_id = getFieldID($categories[$category], 'size');

  $pallet_field = get_field('pallet');
  $one_field = get_field('one');

  if ($one_field) {
    $pallet = 1;
  } elseif ($pallet_field) {
    $pallet = $pallet_field;
  } else {
    $pallet = 100;
  }

  $unit = 'шт.';
  if (get_field('m3')) $unit = 'м<sup>3</sup>';
?>

<div <?php if (isset($categories[$category])) itemData($categories[$category]); ?> data-id="<?php the_ID(); ?>" class="item js-shop">
  <div class="item-badge">Сертифицированная продукция</div>
  <a href="<?php the_permalink(); ?>" class="item-image"><img src="<?php echo esc_attr($image['sizes']['medium_large']); ?>" alt="<?php echo $title; ?>" loading="lazy"></a>
  <a href="<?php the_permalink(); ?>" class="item-title" title="<?php echo $title; ?>"><?php echo $title; ?></a>
  <ul class="item-list">
    <?php if ($size_field_id) : ?>
    <li><span>Размер, мм</span><span><?php the_field($size_field_id) ?></span></li>
    <?php endif; ?>
    <?php if ($category !== 'Сухие смеси'): ?>
    <li><span>На поддоне</span><span><?php the_field('pallet'); echo ' '.$unit; ?></span></li>
    <li><span>Машина</span><span><?php the_field('loading'); echo ' '.$unit; ?></span></li>
    <?php else : ?>
    <li><span>Цвет</span><span><?php the_field('color-su'); ?></span></li>
    <li><span>Вес</span><span><?php the_field('kg-su'); ?> кг.</span></li>
    <?php endif; ?>
    <li class="no"><span>Самовывоз или доставка</span></li>
  </ul>
  <div class="item-row">
    <div class="item-price"><b><?php the_field('price'); ?></b> ₽</div>
    <a href="javascript:;" data-fancybox data-src="#popup-smeta" data-form="Заказать расчет - <?php echo $title; ?>" class="item-online">Заказать расчет</a>
  </div>
  <div class="item-bottom">
    <div class="item-count">
      <div class="item-count__minus"></div>
      <input type="number" class="item-count__value" data-step="<?php echo $pallet; ?>" value="<?php echo $pallet; ?>" />
      <div class="item-count__plus"></div>
    </div>
    <button class="item-btn">В корзину</button>
  </div>
</div>