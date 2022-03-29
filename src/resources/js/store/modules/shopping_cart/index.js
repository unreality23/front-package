import cartMutations from './mutations';
import cartActions from './actions';
import cartGetters from './getters';

export default {
    namespaced: true,
    state() {
        return {
            carts: [],
            cartadd: {
                id: '',
                title: '',
                price: '',
                amount: '',
            },
            vat: '21',
            badge: '0',
            productquantity: '1',
            totalprice: '0',
        };
    },
    mutations: cartMutations,
    actions: cartActions,
    getters: cartGetters,
};
