import { createStore } from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import rootMutations from './mutations';
import rootActions from './actions';
import rootGetters from './getters';
import cartModule from './modules/shopping_cart/index';
import checkoutFormModule from './modules/checkout_form/index';
import accountPageModule from './modules/account_page/index';

const dataState = createPersistedState({
    paths: ['shoppingCart'],
});

const store = createStore({
    modules: {
        shoppingCart: cartModule,
        checkoutForm: checkoutFormModule,
        accountPage: accountPageModule,
    },
    plugins: [dataState],
    state() {
        return {
            products: Array,
        };
    },
    mutations: rootMutations,
    actions: rootActions,
    getters: rootGetters,
});

export default store;
