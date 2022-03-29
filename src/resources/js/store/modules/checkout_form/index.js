import cartMutations from './mutations';
import cartActions from './actions';
import cartGetters from './getters';

export default {
    namespaced: true,
    state() {
        return {
            step: 1,
            selected: 'female',
            prescriptionUploaded: false,
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
            formPartOne: false,
            isOpen: true,
            errors: [],
        };
    },
    mutations: cartMutations,
    actions: cartActions,
    getters: cartGetters,
};
