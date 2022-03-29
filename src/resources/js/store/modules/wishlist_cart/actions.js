export default {
    viewCart(context) {
        context.commit('viewCart');
    },
    addToCart(context, payload) {
        context.commit('addToCart', payload);
        context.commit('storeToCart');
        context.commit('viewCart');
    },
    removeFromCart(context, payload) {
        context.commit('removeFromCart', payload);
        context.commit('storeToCart');
        context.commit('viewCart');
    },
    storeToCart(context) {
        context.commit('storeToCart');
    },
};
