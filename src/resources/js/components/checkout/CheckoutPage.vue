<template>
    <!-- If success shows checkout form with details eneded to fill in-->
    <ShoppingCart :required-description="false"
                  :assign-prescription="true"
                  v-if="checkIfPrescriptionNeeded()"/>

    <div v-else>
        <div class="flex mx-auto w-full flex-wrap items-start">

            <div class="customerDetails w-8/12 px-10">
                <div v-if="errors.length"
                     class="bg-white p-5 max-w-screen-lg mx-auto mb-7">
                    <ul>
                        <li v-for="error in errors"
                            :key="error"
                            class="text-red-400 font-bold">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <billing-form></billing-form>
                <payment-form></payment-form>
                <shipping-form></shipping-form>

            </div>
            <div class="customerProducts flex flex-col w-4/12 bg-white p-6 mx-auto mb-5 pb-0">
                <ShoppingCart :required-description="false" />
                <hr/>
                <div class="flex flex-col mt-2">

                    <div class="subtotal flex justify-between">
                        <div>Subtotal</div>
                        <div>£{{ totalprice }}</div>
                    </div>

                    <div class="total_to_pay flex font-semibold mt-2 tracking-wide justify-between">
                        <div>TOTAL TO PAY</div>
                        <div>£{{ totalprice }}</div>
                    </div>
                </div>

                <div id="free-delivery-announcement"
                     class="flex bg-blue-200 -mx-6 mt-6 px-6 py-4 text-sm font-bold tracking-wider">
                    <i class="fas fa-info-circle pr-2 text-xl"></i>
                    FREE STANDARD DELIVERY TO UK WHEN YOU SPEND OVER £35.00
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { mapState, mapActions } from 'vuex';
import PaymentForm from '../../../../../../../public/js/components/checkout/form/PaymentForm';
import ShoppingCart from '../basket/ShoppingCart';

export default {
  name: 'CheckoutPage',
  components: { PaymentForm, ShoppingCart },
  computed: {
    current() {
      const map = {
        1: 'billing-form',
        2: 'shipping-form',
        3: 'payment-form',
      };
      return map[this.step];
    },
    ...mapState('checkoutForm', [
      'step',
      'selected',
      'form',
      'errors',
      'prescriptionUploaded',
    ]),
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
    ...mapActions('checkoutForm', {
      checkBillingForm: 'checkBillingForm',
      checkShippingForm: 'checkShippingForm',
      checkPaymentForm: 'checkPaymentForm',
      changeStepStage: 'changeStepStage',
      prescriptionNeeded: 'prescriptionNeeded',
    }),
    checkIfPrescriptionNeeded() {
      const ifPrescriptionNeeded = this.carts.filter((cart) => cart.prescription === 1);

      if (ifPrescriptionNeeded.length && !this.prescriptionUploaded) {
        return true;
      }
    },

  },
};
</script>

<style scoped>

</style>
