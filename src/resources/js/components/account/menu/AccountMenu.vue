<template>
    <!-- Account menu -->
    <ul class="flex flex-col px-5 " id="account-menu">
        <li class="cursor-pointer mb-2 hover:text-blue-600 transition-all"
            :class="[step == 1 ? 'font-bold':'']"
            @click="changeStep(1)">
            Order History
        </li>
        <li class="cursor-pointer mb-2 hover:text-blue-600 transition-all"
            :class="[step == 2 ? 'font-bold':'']"
            @click="changeStep(2)" >
            Personal Information
        </li>
        <li class="cursor-pointer mb-2 hover:text-blue-600 transition-all"
            :class="[step == 3 ? 'font-bold':'']"
            @click="changeStep(3)">
            Account overview
        </li>
        <li class="cursor-pointer mb-2 hover:text-blue-600 transition-all"
            :class="[step == 4 ? 'font-bold':'']"
            @click="changeStep(4)">
            My Pets
        </li>
    </ul>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'AccountMenu',
  computed: {
    ...mapState('accountPage', [
      'step',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      changeStep: 'changeStep',
    }),
  },

};
</script>

<style scoped>

</style>
