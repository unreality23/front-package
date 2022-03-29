export default {
    changeStep(state, payload) {
        state.step = payload;
    },

    subscribe(state) {
        state.subscribed = !state.subscribed;
    },

    addbillingaddress(state) {
        state.billingaddress = !state.billingaddress;
    },

    changepasswordbool(state) {
        state.changepassword = !state.changepassword;
    },

    adddeliveryaddress(state) {
        state.deliveryaddress = !state.deliveryaddress;
    },

    changeemailaddress(state) {
        state.emailaddress = !state.emailaddress;
    },
    addnewpettolist(state) {
        state.addNewAnimal = !state.addNewAnimal;
    },
    // updatebillinaddress(state) {
    //     axios.post('/account/addaddress', {
    //         id: '1',
    //         forename: state.form.forename,
    //         surname: state.form.surname,
    //         email: state.form.email,
    //         address: state.form.address,
    //         city: state.form.city,
    //         country: state.form.country,
    //         postcode: state.form.postcode,
    //         telephone: state.form.telephone
    //     }).then((response) => {
    //
    //         console.log('succesfully bought');
    //     }).catch(function (error) {
    //         console.log('error: ' + error.response);
    //     });
    // },
    // getbillingaddress(state) {
    //     axios.get('/account/getaddress')
    //         .then((response) => {
    //             state.customerdetails = response.data;
    //             console.log(response.data);
    //
    //         })
    //         .catch((error) => {
    //             console.log(error);
    //         })
    // },
    // deletebillingaddress(state) {
    //     axios.post('/account/deletebillingaddress')
    //         .then(response => {
    //             console.log(response);
    //         })
    // },
    //
    // getdeliveryaddress(state) {
    //     axios.get('/account/getdeliveryaddress')
    //         .then((response) => {
    //             state.deliveryaddressdetails = response.data;
    //             console.log(response.data);
    //
    //         })
    //         .catch((error) => {
    //             console.log(error);
    //         })
    // },
    // deletedeliveryaddress(state) {
    //     axios.post('/account/deletedeliveryaddress')
    //         .then(response => {
    //             console.log(response);
    //         })
    // },

    // animal form functions

    // ifoneanimal(state, payload) {
    //     const animals = state.petform.speciestype.type;
    //     var multiple = animals;
    //     if(payload === 'KENNEL' || payload === 'CATTERY' || payload=== 'STABLEYARD' ) {
    //         state.multipleanimals = true;
    //     } else {
    //         state.multipleanimals = false;
    //     }
    // },
};
