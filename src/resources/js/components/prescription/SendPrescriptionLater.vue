<template>
    <!-- Send prescription later logic -->
    <div class="send-prescription-later text-xs w-2/4 flex flex-col">
        <div class="border rounded px-2 py-3 mb-1 h-full text-2xl w-9/12 mx-auto
        transition transform hover:bg-blue-300 hover:border-blue-300 cursor-pointer text-white"
             @click="toggleSendLaterPrescription()">
            <i class="fas fa-envelope"></i>
        </div>
        <button
            @click="toggleSendLaterPrescription()"
            class="text-white">
            SEND<br>PRESCRIPTION<br>LATER
        </button>
    </div>

    <transition name="modal" v-if="showSendLaterPrescriptionModal">
        <modal-mask>
                    <div class="modal-default-button float-right text-blue-300 hover:text-blue-800
                    transition-all focus:outline-none focus:border-0 cursor-pointer"
                         @click="toggleSendLaterPrescription()">
                        <i class="fas fa-times text-2xl -mr-2 mt-1"></i>
                    </div>
                    <div class="modal-header">
                        <slot name="header">
                            <div class="text-center pt-8 pb-5">
                                <modal-title>
                                    Select How You Will Send Your Prescription
                                </modal-title>

                                <p>
                                    If you prefer you can send your prescription
                                    to us by email, post or fax with your order
                                    number. Please give your prescription a name of
                                    your choosing to help identify it, and
                                    select which option you prefer to use below:
                                </p>

                                <label for="prescriptionName">
                                    <p class="font-bold text-grey-800 w-2/4 mx-auto text-left mt-5">
                                        Prescription name*
                                        (e.g. July Prescription)
                                    </p>
                                    <input class="border border-gray-300 w-2/4 h-10 p-5 mb-5 mx-auto"
                                           v-model="prescriptionName"
                                           type="text"
                                           placeholder="Prescription name*"
                                           id="prescriptionName"
                                           name="prescriptionName">
                                </label>
                            </div>

                        </slot>
                    </div>

                    <div class="modal-body flex">
                        <radio-input
                            v-for="option in options"
                            :key="option.value"
                            name="sendType"
                            :value="option.value"
                            :description="option.description"
                            :title="option.title"
                            :img="option.img"
                            :radio-type="3"
                            v-model:label-value="sendType"
                        >
                        </radio-input>
                    </div>

            <modal-footer>

                    <label for="acceptDeliveryTime"
                           class="mb-5 block">
                        <input type="checkbox"
                               id="acceptDeliveryTime">
                        I accept that I will not receive
                        my order until a valid prescription is received.
                    </label>

                <template v-slot:button>
                    <modal-footer-button name="I WILL SEND THE
                                PRESCRIPTION LATER"></modal-footer-button>
                </template>
            </modal-footer>
        </modal-mask>
    </transition>
</template>

<script>
import RadioInput from '../form/skeleton/RadioInput';
import ModalMask from './modal/ModalMask';
import ModalTitle from './modal/ModalTitle';
import ModalFooter from './modal/ModalFooter';
import ModalFooterButton from './modal/ModalFooterButton';

export default {
  name: 'SendPrescriptionLater',
  components: {
    RadioInput,
    ModalMask,
    ModalTitle,
    ModalFooter,
    ModalFooterButton,
  },
  data() {
    return {
      showSendLaterPrescriptionModal: false,
    };
  },
  computed: {
    options() {
      return [
        {
          img: '/img/test.jpg',
          value: 'send-by-email',
          name: 'sendEmail',
          title: 'SEND BY EMAIL',
          description: 'Email your prescription to:\n'
                        + 'contact@petdrugsonline.co.uk',
        },
        {
          img: '/img/test.jpg',
          value: 'send-by-post',
          name: 'sendPost',
          title: 'SEND BY POST',
          description: 'Post your prescription to:\n'
                        + 'Pet Drugs Online\n'
                        + 'Unit 7B, Burnett Business Park,\n'
                        + 'Gypsy Lane,\n'
                        + 'Keynsham,\n'
                        + 'BS31 2ED',
        },
        {
          img: '/img/test.jpg',
          value: 'send-by-fax',
          name: 'sendFax',
          title: 'SEND BY FAX',
          description: 'Fax your prescription to:\n'
                        + '+44 (0)1225 430234',
        },

      ];
    },
  },
  methods: {
    toggleSendLaterPrescription() {
      this.showSendLaterPrescriptionModal = !this.showSendLaterPrescriptionModal;
    },
  },
};
</script>

<style scoped>
.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

</style>
