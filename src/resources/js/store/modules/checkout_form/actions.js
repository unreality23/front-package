export default {
    checkBillingForm(context) {
        context.commit('checkBillingForm');
    },

    checkShippingForm(context) {
        context.commit('checkShippingForm');
    },

    checkPaymentForm(context) {
        context.commit('checkPaymentForm');
    },

    changeStepStage(context) {
        context.commit('changeStepStage');
    },

    getShipping(context, payload) {
        context.commit('getShipping', payload);
    },

    changeStep(context, payload) {
        context.commit('changeStep', payload);
    },

    prescriptionNeeded(context) {
        context.commit('prescriptionNeeded');
    },
};
