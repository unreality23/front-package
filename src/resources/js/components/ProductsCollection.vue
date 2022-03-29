<template>
    <!-- Product Collection -->
    <div v-for="product in products"
         :key="product.id"
         class="product_result flex flex-col md:w-6/12 lg:w-2/6 p-2 mb-10
         xsm:w-full text-center border border-transparent
         group hover:border-gray-300 hover:bg-gray-200 transition-all">
        <div class="product-image mx-auto bg-white p-9 border relative">
            <a :href="'/product/'+product.id">
                <img src="/img/product_image.jpg"
                     :alt="product.title">
            </a>
            <div class="add-to-wishlist absolute top-2 right-2">
                <a href="#" @click="addToWishlist(product.id)"><i class="fa fa-heart"></i></a>
            </div>
        </div>
        <div class="product-info mx-7">
            <div class="product-title pt-4">
                {{ product.title }}
            </div>
            <div class="product-description py-0 overflow-hidden max-h-0
            transition-all max-h-0 ease-out group-hover:max-h-69
            group-hover:ease-in group-hover:py-4">
                {{ product.description }}
            </div>
            <div class="product-price font-bold pb-4">
                £{{ product.price }}
            </div>
            <div class="product-button">
                <a href="#"
                   class="bg-blue-300 transition hover:bg-blue-400
                   text-white p-2 my-2 block w-2/4 mx-auto">
                    View Product
                </a>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';

export default {
  name: 'Basic',
  props: {
    products: {
      type: Array,
      required: true,
    },
  },
  methods: {
    addToWishlist(id) {
      axios.post('/wishlist/addtowishlist', {
        product_id: id,
      })
        .then((response) => alert(response.data.status))
        .catch((error) => error.response.data);
    },
  },
  mounted() {
    console.log(`user id: ${this.userId}`);
  },

};
</script>
