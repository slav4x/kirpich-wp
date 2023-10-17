<?php
  /*
  * Template Name: Корзина
  */
?>
<?php get_header(); ?>

<section class="page cart">
  <div class="container">
    <div class="page-grid">
      <div class="page-content">
        <ul class="breadcrumbs">
          <li><a href="/">Главная</a></li>
          <li><a href="/cart">Корзина</a></li>
        </ul>
        <h2 class="page-title">Корзина</h2>
      </div>
    </div>
    <div class="page-grid">
      <div class="page-content">
        <div class="cart-top">
          <p>Товар</p>
          <p>Цена</p>
          <p>Кол-во</p>
          <p>Сумма</p>
        </div>
        <div class="cart-container"></div>
      </div>
      <div class="page-sidebar">
        <div class="cart-total">
          <p>Итого</p>
          <span>0 товаров</span><span>0 ₽</span>
          <a href="javascript:;" data-fancybox data-src="#popup-cart">Оформить заказ</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="popup" id="popup-cart">
  <h3>Мы перезвоним вам для подтверждения заказа и формирование счета для оплаты</h3>
  <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
    <input type="text" name="name" class="input" placeholder="Ваше имя" />
    <input type="tel" name="phone" class="input masked" placeholder="Введите номер телефона" required />
    <input type="hidden" name="form_name" value="" />
    <input type="hidden" name="cart_data" value="" />
    <input type="hidden" name="action" value="save_form_data">
    <button class="btn">Оформить заказ</button>
    <small>Нажимая на кнопку, вы соглашаетесь с Пользовательским соглашением</small>
  </form>
</div>

<?php get_footer(); ?>