<template>
    <div>
        <h1 class="font-bold text-2xl mb-5">Personal Information</h1>

        <div id="personal-information"
             class="flex flex-col mt-10">
            <div class="flex flex-col md:flex-row">
                <div id="payment-details"
                     class="bg-white p-5 mr-5 w-full w-2/4">
                    <span class="font-bold">Payment details</span>
                    <button type="button"
                            @click="addbillingaddress()"
                            v-if="!billingaddress"
                            class="w-2/6 bg-blue-500 text-xs text-center py-3 float-right mt-7
                            px-2 text-white mr-auto hover:bg-blue-700 transition-all">
                        Please Add Billing Address
                    </button>
                    <billing-address
                        :class="{ 'pt-0 max-h-0 opacity-0 invisible':!billingaddress,
                                  'opacity-100 visible max-h-full pt-3':billingaddress }"
                        v-if="billingaddress"/>
                </div>
                <div id="change-password"
                     class="bg-white p-5 mt-5 md:mt-0 mr-5 w-full w-2/4">
                    <span class="font-bold">
                        Change Password
                    </span>
                    <button type="button"
                            @click="changepasswordbool()"
                            v-if="!changepassword"
                            class="w-2/6 bg-blue-500 text-xs text-center py-3 float-right mt-7
                            px-2 text-white mr-auto hover:bg-blue-700 transition-all">
                        Change Password
                    </button>
                    <change-password v-if="changepassword"/>
                </div>
            </div>

            <div class="flex mt-5 flex-col md:flex-row">
                <div id="delivery-address"
                     class="bg-white p-5 mr-5 w-full md:w-2/4">
                    <span class="font-bold">Delivery Address</span>
                    <p>Please add delivery address</p>
                    <button type="button"
                            @click="adddeliveryaddress()"
                            v-if="!deliveryaddress"
                            class="w-2/6 bg-blue-500 text-xs text-center py-3 float-right mt-7
                            px-2 text-white mr-auto hover:bg-blue-700 transition-all">
                        Add Delivery Address
                    </button>
                    <delivery-address v-if="deliveryaddress"/>
                </div>

                <div id="email-address"
                     class="bg-white p-5  mr-5 mt-5 md:mt-0 w-full md:w-2/4">
                    <span class="font-bold">E-mail</span>
                    <button type="button"
                            @click="changeemailaddress()"
                            v-if="!emailaddress"
                            class="w-2/6 bg-blue-500 text-xs text-center py-3 float-right mt-7
                            px-2 text-white mr-auto hover:bg-blue-700 transition-all">
                        Change Email Address
                    </button>
                    <change-email v-if="emailaddress"/>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import { mapActions, mapState } from 'vuex';

export default {
  name: 'PersonalInformation',
  computed: {
    ...mapState('accountPage', [
      'billingaddress',
      'changepassword',
      'deliveryaddress',
      'emailaddress',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      addbillingaddress: 'addbillingaddress',
      changepasswordbool: 'changepasswordbool',
      adddeliveryaddress: 'adddeliveryaddress',
      changeemailaddress: 'changeemailaddress',
    }),
  },
  mounted() {
    this.addbillingaddress();
    this.adddeliveryaddress();
  },
};
</script>

<style scoped>

</style>
