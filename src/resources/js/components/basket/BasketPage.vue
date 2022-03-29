<template>
    <!-- Basket page -->
    <div
        class="basket flex py-5 border-b items-start"
        v-for="(cart) in carts"
        :key="cart.id">

        <img
            src="/img/test.jpg"
            alt="{{ cart.title }}"
            class="w-20 pr-2">
        <div class="productInfo">
            <div class="productTitle font-bold">
                {{ cart.title }}
            </div>
            <div class="productDescription">
                {{ cart.description }}
            </div>
            <div class="productSize">
                One size
            </div>
        </div>
        <div v-if="cart.prescription" class="flex bg-gray-300">
            <upload-prescription-modal></upload-prescription-modal>
            <send-prescription-later></send-prescription-later>
        </div>
        <div class=" flex ml-auto items-center w-1/4">
            <div class="productPrice font-bold">£{{ cart.price }}</div>
            <input
                type="text"
                id="amount"
                class="text-center border border-gray-300 w-10 mx-10"
                name="amount"
                :value="productquantity">

            <button
                @click="removeFromCart()"
                class="btn text-xl hover:text-red-500 transition-all">
                <i class="fa fa-close font-bold text-2xl"></i> &times;
            </button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import UploadPrescriptionModal from '../prescription/UploadPrescriptionModal';
import SendPrescriptionLater from '../prescription/SendPrescriptionLater';

export default {
  name: 'BasketPage',
  components: {
    UploadPrescriptionModal,
    SendPrescriptionLater,
  },
  data() {
    return {
      showUploadDescriptionModal: false,
      showSendLaterPrescriptionModal: false,
    };
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
    toggleUploadDescription() {
      this.showUploadDescriptionModal = !this.showUploadDescriptionModal;
    },
    toggleSendLaterPrescription() {
      this.showSendLaterPrescriptionModal = !this.showSendLaterPrescriptionModal;
    },
  },
};
</script>

<style scoped>

</style>
