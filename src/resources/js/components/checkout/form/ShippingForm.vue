<template>
    <!-- Delivery form step accordion-->
    <accordion label="DELIVERY OPTIONS">
        <form-group>
            <radio-input
                v-for="option in options"
                :key="option.value"
                name="shipping"
                :price="option.price"
                :value="option.value"
                :selectedFormValue="form.shipping"
                :description-short="option.descriptionShort"
                :description="option.description"
                :delivery-day="option.day"
                :radio-type="1"
                v-model:label-value="setDelivery"
            >
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
  name: 'ShippingForm',
  data() {
    return {
      picked: '',
    };
  },
  components: {
    FormGroup,
    RadioInput,
    Accordion,
  },
  computed: {
    ...mapState('checkoutForm', [
      'form',
      'errors',
    ]),
    options() {
      return [
        {
          price: 'FREE',
          value: 'asos-no-hurry',
          descriptionShort: 'ASOS No Hurry - Get 20% off your next order',
          description: 'Your unique code will be emailed to you after checkout. Valid for 4 weeks, UK only. Ts&Cs apply. Delivery is excluded on Public Holidays.',
          day: 'Delivered by Tuesday, 31 August, 2021',
        },
        {
          price: '£4.00',
          value: 'standard-delivery',
          descriptionShort: 'Standard Delivery',
          description: 'BFPO delivery is available on Standard Delivery. Delivery is excluded on Public Holidays.',
          day: 'Delivered on or before Thursday, 19 August, 2021',
        },
        {
          price: '£5.95',
          value: 'next-day-delivery',
          descriptionShort: 'Next Day Delivery (NI)',
          description: 'Delivery is next day (Monday-Saturday) if you order before the website cut-off, not including Sunday or Public Holidays.',
          day: 'Delivered on or before Thursday, 19 August, 2021',
        },
        {
          price: '£5.95',
          value: 'nominated-delivery',
          descriptionShort: 'Nominated Day',
          description: 'Select your delivery date. The day before your delivery is due, you will receive a despatch confirmation email from VETUK.',
          day: 'Choose a day that suits you',
        },

      ];
    },
    setDelivery: {
      get() {
        return this.$store.state['form.shipping'];
      },
      set(value) {
        this.$store.commit('checkoutForm/setDelivery', value);
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
