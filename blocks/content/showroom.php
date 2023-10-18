<div class="content-block content-showroom">
  <h2 class="content-title">Шоу-рум</h2>
  <div class="content-showroom__slider">
    <div class="swiper-wrapper">
      <?php $showroom = get_field('showroom', 829); if( $showroom ): foreach( $showroom as $item ): ?>
        <div class="swiper-slide"><img src="<?php echo esc_url($item['sizes']['large']); ?>" alt="" loading="lazy"></div>
      <?php endforeach; endif; ?>
    </div>
    <div class="content-showroom__arrow content-showroom__arrow-prev"></div>
    <div class="content-showroom__arrow content-showroom__arrow-next"></div>
  </div>
  <div class="content-showroom__text">
    <ul class="content-showroom__list">
      <li>Все коллекции и расцветки в шоу-руме</li>
      <li>Облицовочный кирпич, клинкер, брусчатка, кровля и др.</li>
      <li>Цены ниже рынка</li>
      <li>Быстрая доставка</li>
      <li>Индивидуальная работа с проектом, аудит сметы</li>
      <li>Скидка по предварительной записи</li>
    </ul>
    <a href="javascript:;" data-fancybox data-src="#popup" data-form="Посетить шоурум" class="btn">Записаться в шоу-рум</a>
  </div>
</div>