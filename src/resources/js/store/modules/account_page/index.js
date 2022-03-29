import cartMutations from './mutations';
import cartActions from './actions';
import cartGetters from './getters';

export default {
    namespaced: true,
    state() {
        return {
            step: 1,
            subscribed: false,
            billingaddress: false,
            changepassword: false,
            deliveryaddress: false,
            emailaddress: false,
            success: false,
            customerdetails: [],
            addNewAnimal: false,
            form: {
                forename: '',
                surname: '',
                email: '',
                address: '',
                city: '',
                country: '',
                counties: {
                    inquiry: [
                        { value: 'WY', text: 'West Yorkshire' },
                        { value: 'BD', text: 'Bedfordshire' },
                        { value: 'BK', text: 'Berkshire' },
                        { value: 'CW', text: 'Cornwall' },
                        { value: 'CB', text: 'Cumbria' },
                        { value: 'KT', text: 'Kent' },
                        { value: 'MS', text: 'Middlesex' },
                        { value: 'WS', text: 'West Sussex' },
                        { value: 'WC', text: 'Worcestershire' },
                        { value: 'TW', text: 'Tyne and Wear' },
                        { value: 'OX', text: 'Oxfordshire' },
                    ],
                },
                postcode: '',
                telephone: '',
                payment: '',
                shipping: '',
            },
        };
    },
    mutations: cartMutations,
    actions: cartActions,
    getters: cartGetters,
};
