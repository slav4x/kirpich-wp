<?php
  /*
  * Template Name: Главная
  */
?>
<?php get_header(); ?>

<section class="hero">
  <div class="container">
    <div class="hero-slider">
      <div class="swiper-wrapper">
        <?php $banners = get_field('banners'); if( $banners ): foreach( $banners as $banner ): ?>
          <div class="swiper-slide"><img src="<?php echo esc_url($banner['sizes']['large']); ?>" alt="" loading="lazy"></div>
        <?php endforeach; endif; ?>
      </div>
      <div class="hero-arrow hero-arrow__prev"></div>
      <div class="hero-arrow hero-arrow__next"></div>
    </div>
    <ul class="hero-category">
      <?php if( have_rows('categories') ): while( have_rows('categories') ): the_row(); $image = get_sub_field('image'); ?>
        <li>
          <a href="<?php the_sub_field('page'); ?>">
            <img src="<?php echo esc_attr($image['sizes']['medium_large']); ?>" alt="">
            <p><?php the_sub_field('name'); ?></p>
          </a>
        </li>
      <?php endwhile; endif; ?>
    </ul>
  </div>
</section>

<section class="page">
  <div class="container">
    <div class="page-grid">
      <div class="page-content">
        <h2 class="page-title">Хиты продаж</h2>
        <div class="item-grid item-grid-4">
          <?php
            $hit_query = new WP_Query(array(
              'post_type' => 'catalog',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'meta_query' => array(
                array(
                  'key' => 'hit',
                  'value' => '1',
                  'compare' => '=',
                ),
              ),
            ));

            if ($hit_query->have_posts()) {
              while ($hit_query->have_posts()) {
                $hit_query->the_post();
                include 'blocks/item.php';
              }
              wp_reset_postdata();
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>