import cartMutations from './mutations';
import cartActions from './actions';
import cartGetters from './getters';

export default {
    namespaced: true,
    state() {
        return {};
    },
    mutations: cartMutations,
    actions: cartActions,
    getters: cartGetters,
};
