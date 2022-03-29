import axios from 'axios';

export default {
    checkBillingForm(state) {
        if (
            state.form.forename &&
            state.form.surname &&
            state.form.email &&
            state.form.address &&
            state.form.city &&
            state.form.country &&
            state.form.counties &&
            state.form.postcode &&
            state.form.telephone
        ) {
            state.step = 2;
        }
        state.errors = [];

        if (!state.form.forename) state.errors.push('Forename required.');
        if (!state.form.surname) state.errors.push('Surname required.');
        if (!state.form.email) state.errors.push('Email required.');
        if (!state.form.address) state.errors.push('Address required.');
        if (!state.form.city) state.errors.push('City required.');
        if (!state.form.country) state.errors.push('Country required.');
        if (!state.form.counties) state.errors.push('County required.');
        if (!state.form.postcode) state.errors.push('Postcode required.');
        if (!state.form.telephone)
            state.errors.push('Mobile phone is required.');
    },

    checkShippingForm(state) {
        if (state.form.shipping) {
            state.step = 3;
        }
        state.errors = [];

        if (!state.form.shipping) state.errors.push('Choose shipping option');
    },

    checkPaymentForm(state) {
        if (state.form.payment) {
            axios
                .post('/account/addaddress', {
                    id: '1',
                    forename: state.form.forename,
                    surname: state.form.surname,
                    email: state.form.email,
                    address: state.form.address,
                    city: state.form.city,
                    country: state.form.country,
                    postcode: state.form.postcode,
                    telephone: state.form.telephone,
                })
                .then((response) => {
                    state.success = true;
                    document
                        .getElementById('#success')
                        .html(response.data.message);
                })
                .catch((error) => {
                    // eslint-disable-next-line no-console
                    console.log(`error: ${error.response}`);
                });
        }
        state.errors = [];

        if (!state.form.payment) state.errors.push('Choose payment option');
    },

    changeStepStage(state) {
        state.step -= 1;
        if (state.step <= 1) {
            state.step = 1;
        }
    },

    accordionClasses(state) {
        return {
            hidden: !state.isOpen,
            block: state.isOpen,
        };
    },

    setDelivery(state, payload) {
        state.form.shipping = payload;
    },

    setPayment(state, payload) {
        state.form.payment = payload;
    },

    changeStep(state, payload) {
        state.step = payload;
    },

    prescriptionNeeded(state) {
        state.prescriptionUploaded = !state.prescriptionUploaded;
    },
};
