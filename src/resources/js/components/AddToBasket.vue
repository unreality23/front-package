<template>
    <!-- Add to basket button -->
    <button
        @click="addToCart(product)"
        class="btn">
        ADD TO CART
    </button>
</template>
<script>

import { mapActions } from 'vuex';

export default {
  name: 'AddToBasket',
  props: {
    product: {
      type: Object,
      required: true,
    },
  },

  methods: {
    ...mapActions('shoppingCart', {
      addToCart: 'addToCart',

    }),
  },

};
</script>
