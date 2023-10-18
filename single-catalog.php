<?php
  /*
  * Template Name: Страница товара
  */
?>
<?php get_header(); ?>

<?php
  $category = get_field('category');
  $image = get_field('image');
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

<section class="page">
  <div class="container">
    <div class="page-grid">
      <div class="page-content">
        <ul class="breadcrumbs">
          <li><a href="/">Главная</a></li>
          <li><a href="/catalog">Каталог</a></li>
          <li><a href="<?php echo get_page_link(); ?>"><?php the_title(); ?></a></li>
        </ul>
        <div class="card js-shop" data-id="<?php the_ID(); ?>">
          <h2 class="page-title"><?php the_title(); ?></h2>
          <div class="card-image"><img src="<?php echo esc_attr($image['sizes']['medium_large']); ?>" alt="<?php the_title(); ?>" loading="lazy" style="max-height: 300px;"></div>
          <div class="card-info">
            <div class="item-badge">Первая цена от производителя</div>
            <ul class="item-list">
              <li><span>Наличие на складе</span><span class="green">В НАЛИЧИИ</span></li>
              <?php
                if (!isset($categories[$category]['fields'])) {
                  return;
                }

                foreach ($categories[$category]['fields'] as $label => $field_data) {
                  $shouldShowFilter = isset($field_data['show_filter']) && $field_data['show_filter'] === 'true';
                  $field_value = get_field($field_data['id']);

                  $multiple = false;

                  if (is_array($field_value)) {
                    $val = implode(', ', $field_value);
                    $multiple = true;
                  } else {
                    $val = $field_value;
                  }

                  if ($shouldShowFilter && !empty($field_value)) {
                    if ($multiple) {
                      echo "<li class='multiple'><span>{$label}</span><span><p>{$val}</p></span></li>";
                    } else {
                      echo "<li><span>{$label}</span><span>{$val}</span></li>";
                    }
                  }
                }
              ?>
              <?php if ($category !== 'Сухие смеси'): ?>
              <li><span>На поддоне</span><span><?php the_field('pallet'); echo ' '.$unit; ?></span></li>
              <li><span>Машина</span><span><?php the_field('loading'); echo ' '.$unit; ?></span></li>
              <?php endif; ?>
              <li class="no"><span>Самовывоз или доставка</span></li>
            </ul>
            <div class="item-row">
              <div class="item-price"><b><?php the_field('price'); ?></b> ₽</div>
              <a href="javascript:;" data-fancybox data-src="#popup-smeta" data-form="Заказать расчет - <?php the_title(); ?>" class="item-online">Заказать расчет</a>
            </div>
            <div class="item-bottom">
              <div class="item-count">
                <div class="item-count__minus"></div>
                <input type="number" class="item-count__value" data-step="<?php echo $pallet; ?>" value="<?php echo $pallet; ?>" />
                <div class="item-count__plus"></div>
              </div>
              <button class="item-btn">В корзину</button>
              <a href="javascript:;" data-fancybox data-src="#popup" data-form="Купить - <?php the_title(); ?>" class="item-btn item-btn__border">Купить в 1 клик</a>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="content-grid">
            <div class="content-main">
              <?php include 'blocks/content/spec.php'; ?>
              <?php include 'blocks/content/advantages.php'; ?>
              <div class="content-block content-block-mobile">
                <?php include 'blocks/content/form.php'; ?>
              </div>
              <?php include 'blocks/content/best.php'; ?>
              <?php include 'blocks/content/special.php'; ?>
            </div>
            <div class="content-sidebar">
              <div class="content-block content-block-md">
              <?php include 'blocks/content/form.php'; ?>
              </div>
            </div>
          </div>
          <?php include 'blocks/content/showroom.php'; ?>
        </div>
        <h2 class="page-title">Похожие товары</h2>
        <div class="item-grid item-grid-4"><?php include 'blocks/similar.php'; ?></div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>