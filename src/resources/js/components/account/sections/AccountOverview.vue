<template>
    <div>
        <h1 class="font-bold text-2xl mb-5">Account Overview</h1>

        <h2 class="font-bold text-xl mb-3">Welcome!</h2>

        <p>
            Welcome to your account! Here you’ll see the status of your orders,
            your order history and your personal information.
        </p>

        <div id="account-overview"
             class="flex mt-10">
            <div id="account-email"
                 class="bg-gray-200 p-5 mr-5 flex-1 flex-grow">
                <span class="font-bold ">E-mail</span>
                <p class="mt-3">v.lipskas@vetuk.co.uk</p>
            </div>
            <div id="account-newsletter"
                 class="bg-gray-200 p-5 mr-5 flex-1 flex-grow" >
                <span class="font-bold">Newsletter</span>
                <p class="mt-3">{{ subscribed ? 'Subscribed' : 'Unsubscribed' }}</p>
                <button type="button"
                        @click="subscribe()"
                        class="bg-red-500 text-xs text-center py-3
                        float-right mt-7 px-2 text-white">
                    {{ subscribed ? 'Unsubscribe' : 'Subscribe' }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';

export default {
  name: 'AccountOverview',
  computed: {
    ...mapState('accountPage', [
      'subscribed',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      subscribe: 'subscribe',
    }),
  },
};
</script>

<style scoped>

</style>
