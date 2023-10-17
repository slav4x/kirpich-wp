<?php
  include 'categories/data.php';
  include 'categories/functions.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="language" content="Russian">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="Интернет-магазин 'Кирпич-Сервис': Каталог продукции. Строительные материалы от производителя высокого качества. Сертификаты. Продажа оптом. Доступные цены. Доставка">
  <?php wp_head(); ?>
  <?php wp_site_icon(); ?>
<!-- Marquiz script start -->
<script>
(function(w, d, s, o){
  var j = d.createElement(s); j.async = true; j.src = '//script.marquiz.ru/v2.js';j.onload = function() {
    if (document.readyState !== 'loading') Marquiz.init(o);
    else document.addEventListener("DOMContentLoaded", function() {
      Marquiz.init(o);
    });
  };
  d.head.insertBefore(j, d.head.firstElementChild);
})(window, document, 'script', {
    host: '//quiz.marquiz.ru',
    region: 'eu',
    id: '6215f233c5b47e003fc54d9a',
    autoOpen: false,
    autoOpenFreq: 'once',
    openOnExit: false,
    disableOnMobile: false
  }
);
</script>
<!-- Marquiz script end -->
  <!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	   ym(86459704, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true,
			webvisor:true
	   });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/86459704" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

</head>

<body>

  <header class="header">
    <div class="container">
      <a href="/" class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/svg/logo.svg" alt=""></a>
      <ul class="header-nav">
        <li><a href="/o-kompanii">О компании</a></li>
        <li><a href="/dostavka-i-oplata">Доставка и оплата</a></li>
        <li><a href="/kontakty">Контакты</a></li>
      </ul>
      <ul class="header-links">
        <li>
          <a href="javascript:;" data-fancybox data-src="#popup-smeta" data-form="Получить расчет">
            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/calc.svg" alt="">
            <p>Получить<br> расчет</p>
          </a>
        </li>
        <li>
          <a href="javascript:;" data-fancybox data-src="#popup" data-form="Заказать звонок">
            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/phone.svg" alt="">
            <p>Заказать<br> звонок</p>
          </a>
        </li>
        <li>
          <a href="javascript:;" data-fancybox data-src="#popup" data-form="Посетить шоурум">
            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/pin.svg" alt="">
            <p>Посетить<br> шоу-рум</p>
          </a>
        </li>
        <li>
          <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/whatsapp.svg" alt="">
            <p>Написать<br> в What’s App</p>
          </a>
        </li>
      </ul>
      <div class="header-contact">
        <a href="tel:+7 (495) 363-75-50">+7 (495) 363-75-50</a>
        <a href="mailto:tdkirpichservis@mail.ru">tdkirpichservis@mail.ru</a>
      </div>
      <div class="header-burger"><span></span><span></span><span></span></div>
    </div>
  </header>

  <section class="top">
    <div class="container">
      <div class="top-catalog">
        <a class="top-catalog__btn" href="javascript:;">Каталог <span>продукции</span></a>
        <ul class="top-catalog__nav">
        <?php if( have_rows('categories', 8) ): while( have_rows('categories', 8) ): the_row(); ?>
          <li><a href="<?php the_sub_field('page'); ?>"><?php the_sub_field('name'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
      </div>
      <form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s" placeholder="Введите запрос, например: Кирпич рядовой" required />
        <button></button>
      </form>
		<div class="top-search"></div>
      <a href="/cart" class="top-cart clear"><span><i>0</i></span><p>Корзина</p></a>
    </div>
  </section>