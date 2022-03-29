<template>
    <div id="shoppingCart"
         class="transform translate-x-full min-h-full min-w-full
         md:min-w-3/4  lg:min-w-min origin-top-right
         absolute right-0 w-1/5 pb-6 shadow-lg py-1 bg-gray-100
         ring-1 ring-black ring-opacity-5 focus:outline-none"
         role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <p class="text-black ml-5 mb-1 mt-3 font-bold"><b>YOUR SHOPPING CART</b></p>

        <ShoppingCart/>

        <div id="shoppingCartBox"
             class="m-5 border border-gray-400 p-1.5">
            <div id="shoppingCartSubtotal"
                 class="flex p-1.5">
                <p class="text-black">
                    Shipping calculated at checkout Subtotal
                </p>
                <p id="subtotalPrice"
                   class="text-black ml-auto">
                    £{{ totalprice }}
                </p>
            </div>
            <div id="shoppingCartTotal"
                 class="flex border-t border-gray-400 -mx-1.5 p-3">
                <p class="text-black">
                    <b>Total</b>
                    (VAT included)
                </p>
                <b id="totalPrice"
                   class="text-black ml-auto">
                    £{{ totalprice }}
                </b>
            </div>
        </div>

        <hr class="border-gray-400 border-t pt-6">
        <a href="/checkout">
            <button type="button"
                    class="w-2/4 bg-gray-400 rounded-md text-white mx-auto p-2 font-bold
                    block hover:bg-black focus:outline-none transition-all">
                CHECKOUT
            </button>
        </a>

        <div class="paymentsOptions mx-auto pt-5 text-center">
            <i class="fas fa-lock"></i> We accept:
            <div class="payments flex pt-5  justify-center justify-between w-3/5 mx-auto">
                <img src="/img/visa.png"
                     alt="visa">
                <img src="/img/mastercard.png"
                     alt="mastercard">
                <img src="/img/maestro.png"
                     alt="maestro">
                <img src="/img/apple-pay.png"
                     alt="apple pay">
            </div>
        </div>
    </div>
</template>
<script>

import { mapActions, mapState } from 'vuex';

import ShoppingCart from './basket/ShoppingCart';

export default {
  name: 'BasketPopup',
  components: {
    ShoppingCart,
  },
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
  computed: {
    ...mapState('shoppingCart', [
      'carts',
      'totalprice',
      'cartadd',
      'vat',
      'badge',
      'productquantity',
    ]),

  },
  methods: {
    ...mapActions('shoppingCart', {
      viewCart: 'viewCart',
      addToCart: 'addToCart',
      removeFromCart: 'removeFromCart',
      storeToCart: 'storeToCart',
    }),
  },

};
</script>
