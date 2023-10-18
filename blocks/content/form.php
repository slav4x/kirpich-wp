<h2 class="content-title">Получите прайс и коммерческое предложение</h2>
<h3 class="content-subtitle">Вы можете загрузить свою анкету с данными о заказе или дождаться звонка менеджера</h3>
<form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
  <input type="text" name="name" class="input" placeholder="Ваше имя" />
  <input type="tel" name="phone" class="input masked" placeholder="Введите номер телефона" required />
  <input type="hidden" name="form_name" value="Получить прайс и КП" />
  <input type="hidden" name="action" value="save_form_data">
  <button class="btn">Получить прайс и КП</button>
  <small>Нажимая на кнопку, вы соглашаетесь с Пользовательским соглашением</small>
</form>