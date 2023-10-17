<?php
  /*
  * Template Name: Раздел каталог
  */
?>
<?php get_header(); ?>

<?php $category = get_field('page-category'); ?>

<section class="page page-catalog">
  <div class="container">
    <div class="page-grid">
      <?php $banners = get_field('banners'); if( $banners ): ?>
        <div class="page-banner page-banner__mob">
          <div class="swiper-wrapper">
          <?php foreach( $banners as $banner ): ?>
            <div class="swiper-slide"><img src="<?php echo esc_url($banner['sizes']['large']); ?>" alt="" loading="lazy"></div>
          <?php endforeach; ?>
          </div>
          <div class="page-arrow page-arrow__prev"></div>
          <div class="page-arrow page-arrow__next"></div>
        </div>
      <?php endif; ?>
      <div class="page-sidebar filter">
        <?php include 'blocks/filter.php'; ?>
        <?php include 'blocks/page-best.php'; ?>
        <?php include 'blocks/page-commercial.php'; ?>
      </div>
      <div class="page-content">
        <?php $banners = get_field('banners'); if( $banners ): ?>
        <div class="page-banner page-banner__pc">
          <div class="swiper-wrapper">
          <?php foreach( $banners as $banner ): ?>
            <div class="swiper-slide"><img src="<?php echo esc_url($banner['sizes']['large']); ?>" alt="" loading="lazy"></div>
          <?php endforeach; ?>
          </div>
          <div class="page-arrow page-arrow__prev"></div>
          <div class="page-arrow page-arrow__next"></div>
        </div>
        <?php endif; ?>
        <h1 class="page-title-xl"><?php the_title(); ?></h1>
        <?php
          $hit_args = array(
            'post_type' => 'catalog',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                'key' => 'category',
                'value' => $category,
                'compare' => '=',
              ),
              array(
                'key' => 'hit',
                'value' => '1',
                'compare' => '=',
              ),
            ),
          );

          $hit_query = new WP_Query($hit_args);

          if ($hit_query->have_posts()):
        ?>
          <h2 class="page-title hit">Хиты продаж</h2>
          <div class="item-slider hit">
            <div class="swiper-wrapper">
              <?php while ($hit_query->have_posts()): $hit_query->the_post(); ?>
                <div class="swiper-slide"><?php include 'blocks/item.php'; ?></div>
              <?php endwhile;  wp_reset_postdata(); ?>
            </div>
            <div class="item-arrow item-arrow__prev"></div>
            <div class="item-arrow item-arrow__next"></div>
          </div>
        <?php endif; ?>
        <h2 class="page-title" id="catalog">Весь ассортимент</h2>
        <div class="item-grid">
        	<div class="no-results-message hidden">Ничего не найдено.</div>
          <?php
            $catalog_args = array(
              'post_type' => 'catalog',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'meta_query' => array(
                array(
                  'key' => 'category',
                  'value' => $category,
                  'compare' => '=',
                ),
              ),
            );

            $catalog_query = new WP_Query($catalog_args);

            if ($catalog_query->have_posts()) {
              $post_counter = 0; // Инициализация счетчика записей

              while ($catalog_query->have_posts()): $catalog_query->the_post();
                // Вставляем код баннера после каждой 5-й записи
                if ($post_counter > 0 && $post_counter % 5 == 0) {
                  echo '<div class="item item-banner" data-fancybox data-src="#popup" data-form="Нашли дешевле"></div>';
                }
                include 'blocks/item.php';
                $post_counter++;
              endwhile;
              wp_reset_postdata();

              // Проверяем, нужно ли вставить баннер после последней записи (если количество записей не делится на 5)
              if ($post_counter % 5 != 0) {
                echo '<div class="item item-banner" data-fancybox data-src="#popup" data-form="Нашли дешевле"></div>';
              }

            }else {
              echo '<p>Ничего не найдено</p>';
            }
          ?>
        </div>
        <div class="page-text"><?php the_content(); ?></div>
      </div>
      <div class="page-sidebar mobile">
        <?php include 'blocks/page-best.php'; ?>
        <?php include 'blocks/page-commercial.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>