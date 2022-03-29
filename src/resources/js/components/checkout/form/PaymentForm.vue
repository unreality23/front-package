<template>
    <!-- Payment Form step accordion -->
        <accordion label="PAYMENT OPTIONS"
       >
            <form-group>
                <radio-input v-for="option in options"
                             :key="option.value"
                             name="payment"
                             :img="option.img"
                             :title="option.title"
                             :value="option.value"
                             :description-short="option.descriptionShort"
                             :description="option.description"
                             :payment-radio="true"
                             v-model:label-value="setPayment"
                             radio-type="2">
                </radio-input>
            </form-group>

        </accordion>

</template>
<script>
import { mapActions, mapState } from 'vuex';

import FormGroup from '../../form/skeleton/FormGroup';
import RadioInput from '../../form/skeleton/RadioInput';
import Accordion from '../../form/skeleton/Accordion';

export default {
  name: 'PaymentForm',
  components: {
    FormGroup,
    RadioInput,
    Accordion,
  },
  computed: {
    ...mapState('checkoutForm', [
      'form',
      'errors',
      'step',
    ]),
    options() {
      return [
        {
          img: 'img/apple-pay.png',
          title: 'Apple Pay',
          value: 'apple-pay',
          descriptionShort: '',
          description: '',
        },
        {
          img: 'img/apple-pay.png',
          title: 'Apple Pay',
          value: 'apple-pay',
          descriptionShort: 'Pay in 3',
          description: 'Pay In 3 is only available for orders above £30.00 and below £2,000.00',
        },
        {
          img: 'img/maestro.png',
          title: 'Maestro',
          value: 'maestro',
          descriptionShort: '',
          description: '',
        },
        {
          img: 'img/mastercard.png',
          title: 'Mastercard',
          value: 'mastercard',
          descriptionShort: '',
          description: '',
        },
        {
          img: 'img/visa.png',
          title: 'Visa',
          value: 'visa',
          descriptionShort: '',
          description: '',
        },

      ];
    },
    setPayment: {
      get() {
        return this.$store.state['form.payment'];
      },
      set(value) {
        this.$store.commit('checkoutForm/setPayment', value);
      },
    },
  },
  methods: {
    ...mapActions('checkoutForm', {
      changeStep: 'changeStep',
    }),
  },
};
</script>

<style scoped>

</style>
