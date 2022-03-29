<template>
    <!-- Add to wishlist button-->
    <button
        @click="addToWishlist(product)"
        class="btn">
        ADD TO CART
    </button>
</template>
<script>

import { mapActions } from 'vuex';

export default {
  name: 'AddToWishlist',
  props: {
    product: {
      type: Object,
      required: true,
    },
  },

  methods: {
    ...mapActions('wishlistCart', {
      addToCart: 'addToWishlist',

    }),
  },

};
</script>
