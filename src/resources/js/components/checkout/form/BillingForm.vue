<template>
    <!-- Billing Form step -->
    <accordion label="BILLING ADDRESS">
        <form-group>
            <text-input label="forename"
                        name="forename"
                        type="text"
                        v-model="form.forename"/>
        </form-group>

        <form-group>
            <text-input label="surname"
                        name="surname"
                        type="text"
                        v-model="form.surname"/>
        </form-group>

        <form-group>
            <text-input label="email"
                        name="email"
                        type="email"
                        v-model="form.email"/>
        </form-group>

        <form-group>
            <text-input label="address"
                        name="address"
                        type="text"
                        v-model="form.address"/>
        </form-group>

        <form-group>
            <text-input label="city"
                        name="city"
                        type="text"
                        v-model="form.city"/>
        </form-group>

        <form-group>
            <text-input label="country"
                        name="country"
                        type="text"
                        v-model="form.country"/>
        </form-group>

        <form-group >
            <select-input :enabled-value="true"
                          :option-value="'County'"
                          :label="'Choose County'"
                          :name="'county'"
                          v-model="form.county"
                          :options="form.counties.inquiry"/>
        </form-group>

        <form-group>
            <text-input label="postcode"
                        name="postcode"
                        type="text"
                        v-model="form.postcode"/>
        </form-group>

        <form-group>
            <text-input label="Phone Number"
                        name="tel"
                        type="tel"
                        v-model="form.telephone"/>
        </form-group>
    </accordion>

</template>

<script>
import { mapState } from 'vuex';
import SelectInput from '../../form/skeleton/SelectInput';
import FormGroup from '../../form/skeleton/FormGroup';
import TextInput from '../../form/skeleton/TextInput';
import Accordion from '../../form/skeleton/Accordion';

export default {
  name: 'BillingForm',
  components: {
    SelectInput,
    FormGroup,
    TextInput,
    Accordion,
  },
  data() {
    return {
      isOpen: true,
    };
  },
  computed: {
    ...mapState('checkoutForm', [
      'selected',
      'form',
      'errors',

    ]),
    accordionClasses() {
      return {
        hidden: !this.isOpen,
        block: this.isOpen,
      };
    },
  },
  methods: {
    toggleAccordion() {
      this.isOpen = !this.isOpen;
    },
  },

};
</script>

<style scoped>

</style>
