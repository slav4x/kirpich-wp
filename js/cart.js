/* eslint-disable operator-linebreak */
/* eslint-disable no-inner-declarations */

let cart = JSON.parse(localStorage.getItem('cart') || '[]');

function initializeShopElement(shopElement) {
  const minusBtn = shopElement.querySelector('.item-count__minus');
  const plusBtn = shopElement.querySelector('.item-count__plus');
  const inputValue = shopElement.querySelector('.item-count__value');
  const addToCartBtn = shopElement.querySelector('.item-btn');
  const stepValue = parseInt(inputValue.getAttribute('data-step'));
  const itemId = shopElement.getAttribute('data-id');

  minusBtn.addEventListener('click', function () {
    adjustQuantity(inputValue, stepValue, -1);
    updateCartIfInCart(shopElement, inputValue);
  });

  plusBtn.addEventListener('click', function () {
    adjustQuantity(inputValue, stepValue, 1);
    updateCartIfInCart(shopElement, inputValue);
  });

  inputValue.addEventListener('input', function () {
    if (isNaN(inputValue.value) || parseInt(inputValue.value) <= 0) {
      inputValue.value = stepValue;
    }
    updateCartIfInCart(shopElement, inputValue);
  });

  if (addToCartBtn) {
    addToCartBtn.addEventListener('click', function () {
      toggleItemInCart(shopElement, inputValue);
    });
  }

  if (cart.find((cartItem) => cartItem.id === itemId)) {
    if (addToCartBtn) {
      addToCartBtn.textContent = 'Удалить';
      addToCartBtn.classList.add('item-btn-delete');
    }
    inputValue.value = cart.find((cartItem) => cartItem.id === itemId).quantity;
  }
}

const shopElements = document.querySelectorAll('.js-shop');
shopElements.forEach(initializeShopElement);

function adjustQuantity(inputValue, stepValue, direction) {
  const currentVal = parseInt(inputValue.value);
  if (direction === -1 && currentVal > stepValue) {
    inputValue.value = currentVal - stepValue;
  } else if (direction === 1) {
    inputValue.value = currentVal + stepValue;
  }

  updateCartTotal();
}

function updateCartIfInCart(shopElement, inputValue) {
  const itemId = shopElement.getAttribute('data-id');
  const cartItem = cart.find((cartItem) => cartItem.id === itemId);
  if (cartItem) {
    const totalElement = shopElement.querySelector('.cart-item__total');
    if (totalElement) {
      const formattedTotalElement = (cartItem.price * parseInt(inputValue.value)).toLocaleString('ru-RU');
      totalElement.textContent = `${formattedTotalElement} ₽`;
    }
    updateCartItemQuantity(itemId, parseInt(inputValue.value));
  }

  updateCartTotal();
}

function toggleItemInCart(shopElement, inputValue) {
  const itemId = shopElement.getAttribute('data-id');
  const addToCartBtn = shopElement.querySelector('.item-btn');
  if (!addToCartBtn.classList.contains('item-btn-delete')) {
    addItemToCart({
      id: itemId,
      title: shopElement.querySelector('.item-title')
        ? shopElement.querySelector('.item-title').textContent
        : shopElement.querySelector('.page-title').textContent,
      image: shopElement.querySelector('img').src,
      link: shopElement.querySelector('.item-title') ? shopElement.querySelector('.item-title').href : window.location.href,
      price: parseFloat(shopElement.querySelector('.item-price b').textContent),
      step: parseInt(inputValue.getAttribute('data-step')),
      quantity: parseInt(inputValue.value),
    });
    addToCartBtn.textContent = 'Удалить';
    addToCartBtn.classList.add('item-btn-delete');
  } else {
    removeItemFromCart(itemId);
    inputValue.value = inputValue.getAttribute('data-step');
    addToCartBtn.textContent = 'В корзину';
    addToCartBtn.classList.remove('item-btn-delete');
  }

  updateCartIcon();
  updateCartTotal();
}

function updateCartItemQuantity(id, newQuantity) {
  const cartItem = cart.find((item) => item.id === id);
  if (cartItem) {
    cartItem.quantity = newQuantity;
    saveCartToLocal();
  }

  updateCartIcon();
  updateFormFields();
}

function saveCartToLocal() {
  localStorage.setItem('cart', JSON.stringify(cart));
}

function addItemToCart(item) {
  const existingItem = cart.find((cartItem) => cartItem.id === item.id);

  if (existingItem) {
    existingItem.quantity += item.quantity;
  } else {
    cart.push(item);
  }
  saveCartToLocal();
  updateFormFields();
}

function removeItemFromCart(id) {
  cart = cart.filter((cartItem) => cartItem.id !== id);
  saveCartToLocal();
  updateCartIcon();
  updateCartTotal();
  updateFormFields();
}

const cartIcon = document.querySelector('.top-cart');
const cartCount = cartIcon.querySelector('span i');

function updateCartIcon() {
  const totalUniqueItems = cart.length;

  cartCount.textContent = totalUniqueItems;

  if (totalUniqueItems > 0) {
    cartIcon.classList.remove('clear');
  } else {
    cartIcon.classList.add('clear');
  }
}

updateCartIcon();

function renderCartItem(item) {
  const cartContainer = document.querySelector('.cart-container');

  if (cartContainer) {
    const formattedPrice = (item.price * item.quantity).toLocaleString('ru-RU');
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.setAttribute('data-id', item.id);

    cartItem.innerHTML = `
      <img src="${item.image}" loading="lazy" class="cart-item__img">
      <a href="${item.link}" class="cart-item__title">${item.title}</a>
      <div class="cart-item__price">${item.price} ₽</div>
      <div class="item-count">
        <div class="item-count__minus"></div>
        <input type="number" class="item-count__value" data-step="${item.step}" value="${item.quantity}" />
        <div class="item-count__plus"></div>
      </div>
      <div class="cart-item__total">${formattedPrice} ₽</div>
      <div class="cart-item__delete"></div>
    `;

    cartContainer.appendChild(cartItem);
    initializeShopElement(cartItem);
    cartItem.querySelector('.cart-item__delete').addEventListener('click', function () {
      removeItemFromCart(item.id);
      cartItem.remove();
      updateCartIcon();
    });
  }
}

function renderCartItems() {
  cart.forEach((item) => renderCartItem(item));
}

renderCartItems();

function updateCartTotal() {
  const cartTotalElement = document.querySelector('.cart-total');
  if (cartTotalElement) {
    const itemsCountElement = cartTotalElement.querySelector('span:nth-child(2)');
    const totalPriceElement = cartTotalElement.querySelector('span:nth-child(3)');
    const totalItems = cart.length;

    let itemsText = 'товаров';
    if (totalItems % 10 === 1 && totalItems % 100 !== 11) {
      itemsText = 'товар';
    } else if (totalItems % 10 >= 2 && totalItems % 10 <= 4 && (totalItems % 100 < 10 || totalItems % 100 >= 20)) {
      itemsText = 'товара';
    }

    const totalPrice = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);
    const formattedTotalPrice = totalPrice.toLocaleString('ru-RU');

    itemsCountElement.textContent = `${totalItems} ${itemsText}`;
    totalPriceElement.textContent = `${formattedTotalPrice} ₽`;
  }

  updateFormFields();
}

updateCartTotal();

function updateFormFields() {
  const popupCart = document.querySelector('#popup-cart');

  if (popupCart) {
    const formNameInput = document.querySelector('#popup-cart input[name="form_name"]');
    const cartDataInput = document.querySelector('#popup-cart input[name="cart_data"]');

    const totalPrice = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);

    const formattedTotalPrice = totalPrice.toLocaleString('ru-RU');
    formNameInput.value = `Заказ на сумму ${formattedTotalPrice} ₽`;

    cartDataInput.value = JSON.stringify(cart);
  }
}