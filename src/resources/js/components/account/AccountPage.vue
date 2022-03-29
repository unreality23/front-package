<template>
    <!-- Account page skeleton -->
    <div class="max-w-screen-xl mx-auto py-5 flex flex-col lg:flex-row">
        <div class=" w-full lg:w-3/12">
            <account-menu/>
        </div>
        <div class="w-full mt-5 lg:w-9/12 pl-5">
            <transition name="fade"
                        mode="out-in">
                <component :is="current"/>
            </transition>

        </div>
    </div>

</template>

<script>
import { mapActions, mapState } from 'vuex';
import axios from 'axios';

export default {
  name: 'AccountPage',
  computed: {
    current() {
      const map = {
        1: 'order-history',
        2: 'personal-information',
        3: 'account-overview',
        4: 'my-pets',
      };
      return map[this.step];
    },
    ...mapState('accountPage', [
      'step',
      'addNewAnimal',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      addbillingaddress: 'addbillingaddress',

    }),
    updatebillinaddress() {
      axios.post('/account/addaddress', {
        section: this.name,
      }).then((response) => {
        console.log(`success: ${response}`);
      }).catch((error) => {
        console.log(`error: ${error}`);
      });
    },
  },
};
</script>

<style scoped>

</style>
