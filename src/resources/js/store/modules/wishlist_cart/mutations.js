export default {
    viewCart(state) {
        state.carts = JSON.parse(localStorage.getItem('carts'));
        state.badge = state.carts.length;
        // this.totalprice = 200;
        state.totalprice = state.carts.reduce(
            (total, item) => total + state.productquantity * item.price,
            0
        );
    },
    addToCart(state, payload) {
        state.carts.push(payload);
    },
    removeFromCart(state, payload) {
        state.carts.splice(payload, 1);
    },
    storeToCart(state) {
        const parsed = JSON.stringify(state.carts);
        localStorage.setItem('carts', parsed);
    },
};
