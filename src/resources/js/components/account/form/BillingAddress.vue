<template>
    <!-- Form for updating billing address -->
    <form @submit.prevent="updatebillinaddress"
          :class="[
              customerdetails.message == null ?
              'opacity-100 visible max-h-full pt-3':'pt-0 max-h-0 opacity-0 invisible'
          ]"
          v-if="customerdetails.message == null" class="transition-all">

        <form-group>
            <text-input label="forename"
                        name="forename"
                        v-model="billingDetails.forename"/>
        </form-group>

        <form-group>
            <text-input label="surname"
                        name="surname"
                        v-model="billingDetails.surname"/>
        </form-group>

        <form-group>
            <text-input label="email"
                        name="email"
                        type="email"
                        v-model="billingDetails.email"/>
        </form-group>

        <form-group>
            <text-input label="address"
                        name="address"
                        v-model="billingDetails.address"/>
        </form-group>

        <form-group>
            <text-input label="city"
                        name="city"
                        v-model="billingDetails.city"/>
        </form-group>

        <form-group>
            <text-input label="country"
                        name="country"
                        v-model="billingDetails.country"/>
        </form-group>

        <form-group>
            <text-input label="postcode"
                        name="postcode"
                        v-model="billingDetails.postcode"/>
        </form-group>

        <form-group>
            <text-input label="mobile"
                        name="mobile"
                        type="tel"
                        v-model="billingDetails.telephone"/>
        </form-group>

        <div class="flex my-4">
            <button @click="addbillingaddress()"
                    class="mr-auto  bg-blue-500 hover:bg-blue-700 w-1/4 text-white px-2 py-2">Cancel
            </button>
            <button class="ml-auto  bg-red-500 hover:bg-red-700 w-1/4 text-white px-2 py-2">
                Save
            </button>
        </div>

    </form>

    <div id="success" v-if="customerdetails.message != null"
         :class="[
             customerdetails.message != null ?
             'opacity-100 visible max-h-full pt-3':'pt-0 max-h-0 opacity-0 invisible'
             ]"
         class="alert alert-success mt-3">
        <div class="my-3 p-2"><b>Forename:</b>
            {{ customerdetails.message[0].forename }}
        </div>
        <div class="my-3 p-2"><b>Surname:</b>
            {{ customerdetails.message[0].surname }}
        </div>
        <div class="my-3 p-2"><b>Email:</b>
            {{ customerdetails.message[0].email }}
        </div>
        <div class="my-3 p-2"><b>Address:</b>
            {{ customerdetails.message[0].address }}
        </div>
        <div class="my-3 p-2"><b>City:</b>
            {{ customerdetails.message[0].city }}
        </div>
        <div class="my-3 p-2"><b>Country:</b>
            {{ customerdetails.message[0].country }}
        </div>
        <div class="my-3 p-2"><b>Postcode:</b>
            {{ customerdetails.message[0].postcode }}
        </div>
        <div class="my-3 p-2"><b>Mobile Number:</b>
            {{ customerdetails.message[0].telephone }}
        </div>

        <button @click="deletebillingaddress"
                class="ml-auto  my-4 bg-red-500 hover:bg-red-700 w-1/4 text-white px-2 py-2">Delete
        </button>
    </div>

</template>

<script>
import { mapActions, mapState } from 'vuex';
import axios from 'axios';
import FormGroup from '../../form/skeleton/FormGroup';
import TextInput from '../../form/skeleton/TextInput';

export default {
  name: 'BillingAddress',
  components: {
    'text-input': TextInput,
    'form-group': FormGroup,
  },
  data() {
    return {
      billingDetails: {
        forename: '',
        surname: '',
        email: '',
        address: '',
        city: '',
        country: '',
        postcode: '',
        telephone: '',
      },
      success: false,
      customerdetails: [],
    };
  },
  props: {
    section: {
      type: Object,
      required: true,
    },
  },
  computed: {
    ...mapState('accountPage', [
      'billingaddress',
      'form',
      'success',
    ]),

  },
  methods: {
    ...mapActions('accountPage', {
      addbillingaddress: 'addbillingaddress',
    }),
    setInputType(fieldType) {
      // const inputArray = ['email', 'telephone'];
      // const inputTypes = ['email', 'tel'];

      console.log(`test: ${fieldType}`);
    },
    updatebillinaddress() {
      axios.post('/account/addaddress', {
        ...this.billingDetails,
      }).then(() => {
        this.addbillingaddress();
      }).catch((error) => {
        console.log(`error: ${error.response}`);
      });
    },
    getbillingaddress() {
      axios.get('/account/getaddress')
        .then((response) => {
          this.customerdetails = response.data;
          console.log(response.data);
          if (this.customerdetails != null) {
            this.billingaddress = true;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deletebillingaddress() {
      axios.post('/account/deletebillingaddress')
        .then((response) => {
          console.log(response);
          if (this.customerdetails != null) {
            this.addbillingaddress();
          }
        });
    },
    capitalizeFirstLetter(parameter) {
      return parameter.charAt(0).toUpperCase() + parameter.slice(1);
    },
    toString(parameter) {
      const toString = parameter.toString();

      return `form.${toString}`;
    },
    changeInputType(parameter) {
      const differentType = ['email', 'telephone'];

      Object.keys(this.billingDetails).filter(
        () => !differentType.includes(parameter).forEach(
          () => delete this.form[parameter],
        ),
      );
    },
  },

  mounted() {
    // this.getbillingaddress()
  },
};
</script>
<style scoped>

</style>
