  <footer class="footer">
    <div class="container">
      <div class="footer-info">
        <p>ООО «ТД «КИРПИЧ СЕРВИС»<br> 123242, город Москва, ул. Орджоникидзе д. 11, стр. 44</p> <br> ИНН 7703794328 ОГНР 1137746692467</p>
        <p>Данный интернет-сайт и материалы, размещенные на нем, носят исключительно информационный характер и ни при каких условиях не являются публичной офертой, определяемой положениями статьи 437 Гражданского кодекса РФ.</p>
      </div>
      <div class="footer-info"><p>2004-<?php echo date('Y'); ?> © Кирпич сервис</p></div>
    </div>
  </footer>

  <nav class="navbar<?php if (is_page(array(52, 50, 60, 58, 56))) : ?> navbar-filter<?php endif; ?>">
    <a href="javascript:;" class="navbar-item js-open-filter">
      <img src="<?php echo get_template_directory_uri(); ?>/img/svg/filter.svg" alt="">
      <p>Фильтр товаров</p>
    </a>
    <a href="javascript:;" data-fancybox data-src="#popup-smeta" data-form="Заказать расчет" class="navbar-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/svg/calc.svg" alt="">
      <p>Заказать<br> расчет</p>
    </a>
    <a href="javascript:;" data-fancybox data-src="#popup" data-form="Заказать звонок" class="navbar-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/svg/phone.svg" alt="">
      <p>Заказать<br> звонок</p>
    </a>
    <a href="/showroom" class="navbar-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/svg/pin.svg" alt="">
      <p>Посетить<br> шоу-рум</p>
    </a>
  </nav>

  <div class="popup" id="popup-smeta">
    <h3>Получите коммерческое предложение на поставку продукции от ТД Кирпич Сервис</h3>
    <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
      <input type="text" name="name" class="input" placeholder="Ваше имя" />
      <input type="tel" name="phone" class="input masked" placeholder="Введите номер телефона" required />
      <input type="email" name="email" class="input" placeholder="Введите e-mail" required />
      <input type="text" name="company" class="input" placeholder="Название компании" />
      <input type="text" name="inn" class="input" placeholder="ИНН" />
      <input type="text" name="comment" class="input" placeholder="Комментарий" />
      <input type="hidden" name="form_name" value="" />
      <input type="hidden" name="action" value="save_form_data">
      <button class="btn">Заказать расчет сметы</button>
      <small>Нажимая на кнопку, вы соглашаетесь с Пользовательским соглашением</small>
    </form>
  </div>

	<div class="popup" id="popup">
	  <h3>Оставьте данные, наш специалист перезвонит вам</h3>
	  <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
		<input type="text" name="name" class="input" placeholder="Ваше имя" />
		<input type="tel" name="phone" class="input masked" placeholder="Введите номер телефона" required />
		<input type="hidden" name="form_name" value="" />
		<input type="hidden" name="action" value="save_form_data">
		<button class="btn">Оставить заявку</button>
		<small>Нажимая на кнопку, вы соглашаетесь с Пользовательским соглашением</small>
	  </form>
	</div>

  <?php wp_footer(); ?>

  <script>//(function(t, p) {window.Marquiz ? Marquiz.add([t, p]) : document.addEventListener('marquizLoaded', function() {Marquiz.add([t, p])})})('Pop', {id: '6215f233c5b47e003fc54d9a', title: 'Узнайте цену в зависимости от объема', text: 'Получите оптовый прайс-лист с выгодой до 30%', delay: 20, textColor: '#ffffff', bgColor: '#e70000', svgColor: '#ffffff', closeColor: '#ffffff', bonusCount: 1, bonusText: 'Вам доступен бонус', type: 'side', position: 'position_bottom-left', rounded: true, shadow: 'rgba(231, 0, 0, 0)', blicked: true})</script>

</body>
</html>