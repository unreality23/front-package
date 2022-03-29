export default {
    changeStep(context, payload) {
        context.commit('changeStep', payload);
    },
    subscribe(context) {
        context.commit('subscribe');
    },
    addbillingaddress(context) {
        context.commit('addbillingaddress');
    },

    changepasswordbool(context) {
        context.commit('changepasswordbool');
    },

    adddeliveryaddress(context) {
        context.commit('adddeliveryaddress');
    },

    changeemailaddress(context) {
        context.commit('changeemailaddress');
    },
    addnewpettolist(context) {
        context.commit('addnewpettolist');
    },
    // updatebillinaddress(context) {
    //     context.commit('updatebillinaddress');
    //     context.commit('getbillingaddress');
    // },
    //
    // getbillingaddress(context) {
    //     context.commit('getbillingaddress');
    // },
    //
    // deletebillingaddress(context) {
    //     context.commit('deletebillingaddress');
    //     context.commit('getbillingaddress');
    // },
    // updatedeliveryaddress(context) {
    //     context.commit('updatedeliveryaddress');
    //     context.commit('getdeliveryaddress');
    // },
    // getdeliveryaddress(context) {
    //     context.commit('getdeliveryaddress');
    // },
    // deletedeliveryaddress(context) {
    //     context.commit('deletedeliveryaddress');
    //     context.commit('getdeliveryaddress');
    // },
    // ifoneanimal(context, payload) {
    //     context.commit('ifoneanimal', payload);
    // }
};
