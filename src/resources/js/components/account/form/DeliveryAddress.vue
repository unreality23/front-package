<template>
    <!-- Update delivery address -->
    <form
        @submit.prevent="updatedeliveryaddress"
        v-if="deliveryaddressdetails.message == null"
        class="transition-all">

        <form-group>
            <text-input label="forename"
                        name="forename"
                        type-text="text"
                        v-model="deliveryDetails.forename"/>
        </form-group>

        <form-group>
            <text-input label="surname"
                        name="surname"
                        type-text="text"
                        v-model="deliveryDetails.surname"/>
        </form-group>

        <form-group>
            <text-input label="email"
                        name="email"
                        type-text="email"
                        v-model="deliveryDetails.email"/>
        </form-group>

        <form-group>
            <text-input :label="'address'"
                        :name="'address'"
                        :type-text="'text'"
                        v-model="deliveryDetails.address"/>
        </form-group>

        <form-group>
            <text-input :label="'city'"
                        :name="'city'"
                        :type-text="'text'"
                        v-model="deliveryDetails.city"/>
        </form-group>

        <form-group>
            <text-input :label="'country'"
                        :name="'country'"
                        :type-text="'text'"
                        v-model="deliveryDetails.country"/>
        </form-group>

        <form-group>
            <text-input :label="'postcode'"
                        :name="'postcode'"
                        :type-text="'text'"
                        v-model="deliveryDetails.postcode"/>
        </form-group>

        <form-group>
            <text-input :label="'mobile'"
                        :name="'mobile'"
                        :type-text="'tel'"
                        v-model="deliveryDetails.telephone"/>
        </form-group>

        <div class="flex my-4">
            <button @click="adddeliveryaddress()"
                    class="mr-auto  bg-blue-500 hover:bg-blue-700 w-1/4 text-white px-2 py-2">
                Cancel
            </button>
            <button class="ml-auto  bg-red-500 hover:bg-red-700 w-1/4 text-white px-2 py-2">
                Save
            </button>
        </div>

    </form>

    <div
        id="success"
        v-if="deliveryaddressdetails.message != null"
        class="alert alert-success mt-3">
        <div class="my-3 p-2">
            <b>Forename:</b>
            {{ deliveryaddressdetails.message[0].forename }}
        </div>
        <div class="my-3 p-2">
            <b>Surname:</b>
            {{ deliveryaddressdetails.message[0].surname }}
        </div>
        <div class="my-3 p-2">
            <b>Email:</b>
            {{ deliveryaddressdetails.message[0].email }}
        </div>
        <div class="my-3 p-2">
            <b>Address:</b>
            {{ deliveryaddressdetails.message[0].address }}
        </div>
        <div class="my-3 p-2">
            <b>City:</b>
            {{ deliveryaddressdetails.message[0].city }}
        </div>
        <div class="my-3 p-2">
            <b>Country:</b>
            {{ deliveryaddressdetails.message[0].country }}
        </div>
        <div class="my-3 p-2">
            <b>Postcode:</b>
            {{ deliveryaddressdetails.message[0].postcode }}
        </div>
        <div class="my-3 p-2">
            <b>Mobile Number:</b>
            {{ deliveryaddressdetails.message[0].telephone }}
        </div>

        <button @click="deletedeliveryaddress"
                class="ml-auto  bg-red-500 my-4 hover:bg-red-700 w-1/4 text-white px-2 py-2">
            Delete
        </button>
    </div>

</template>

<script>
import { mapActions } from 'vuex';
import axios from 'axios';
import FormGroup from '../../form/skeleton/FormGroup';
import TextInput from '../../form/skeleton/TextInput';

export default {
  name: 'DeliveryAddress',
  components: {
    'text-input': TextInput,
    'form-group': FormGroup,
  },
  data() {
    return {
      deliveryDetails: {
        forename: '',
        surname: '',
        email: '',
        address: '',
        city: '',
        country: '',
        counties: {
          inquiry: [
            { value: 'WY', text: 'West Yorkshire' },
            { value: 'BD', text: 'Bedfordshire' },
            { value: 'BK', text: 'Berkshire' },
            { value: 'CW', text: 'Cornwall' },
            { value: 'CB', text: 'Cumbria' },
            { value: 'KT', text: 'Kent' },
            { value: 'MS', text: 'Middlesex' },
            { value: 'WS', text: 'West Sussex' },
            { value: 'WC', text: 'Worcestershire' },
            { value: 'TW', text: 'Tyne and Wear' },
            { value: 'OX', text: 'Oxfordshire' },
          ],
        },
        postcode: '',
        telephone: '',
        payment: '',
        shipping: '',

      },
      deliveryaddress: false,
      deliveryaddressdetails: [],
    };
  },
  computed: {},
  methods: {
    ...mapActions('accountPage', {
      adddeliveryaddress: 'adddeliveryaddress',
    }),
    updatedeliveryaddress() {
      axios.post('/account/adddeliveryaddress', {
        id: '1',
        forename: this.deliveryDetails.forename,
        surname: this.deliveryDetails.surname,
        email: this.deliveryDetails.email,
        address: this.deliveryDetails.address,
        city: this.deliveryDetails.city,
        country: this.deliveryDetails.country,
        postcode: this.deliveryDetails.postcode,
        telephone: this.deliveryDetails.telephone,
      }).then(() => {
        this.adddeliveryaddress();
        this.success = true;
      }).catch((error) => {
        console.log(`error: ${error.response}`);
      });
    },
    getdeliveryaddress() {
      axios.get('/account/getdeliveryaddress')
        .then((response) => {
          this.deliveryaddressdetails = response.data;
          console.log(response.data);
          if (this.deliveryaddressdetails != null) {
            this.deliveryaddress = true;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deletedeliveryaddress() {
      axios.post('/account/deletedeliveryaddress')
        .then(() => {
          if (this.deliveryaddressdetails != null) {
            this.adddeliveryaddress();
          }
        });
    },
  },
  mounted() {
    // this.getdeliveryaddress()
  },
};

</script>

<style scoped>

</style>
