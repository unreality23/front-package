<template>
    <!-- Drag and drop modal logic -->
    <transition name="modal">
        <modal-mask>
                    <form @submit.prevent="submitPrescription()"
                          method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" :value="csrf">
                        <slot></slot>
                        <div class="text-center pt-8 pb-5">
                            <modal-title>Upload A New Prescription</modal-title>

                            <p>
                                Please give your prescription a name of your choosing
                                to help identify it,
                                and upload a copy of your vet's prescription.
                            </p>

                            <label for="prescriptionName">
                                <p class="font-bold text-grey-800 w-2/4 mx-auto text-left mt-5">
                                    Prescription name* (e.g. July Prescription)
                                </p>
                                <input class="border border-gray-300 w-2/4 h-10 p-5 mb-5 mx-auto"
                                       v-model="prescriptionName"
                                       type="text"
                                       placeholder="Prescription name*"
                                       id="prescriptionName"
                                       name="prescriptionName">
                            </label>
                        </div>

                        <div class="flex items-center justify-center w-full text-center">
                            <div class="p-12 bg-gray-100 border-gray-300 rounded py-32 my-10"
                                 @dragover="dragover"
                                 @dragleave="dragleave"
                                 @drop="drop">
                                <input type="file"
                                       ref="file"
                                       name="file"
                                       id="file"
                                       class="w-px h-px opacity-0 overflow-hidden absolute"
                                       @change="onChange">

                                <label for="file"
                                       class="block cursor-pointer">
                                    Drag and drop a Picture or Scan of your Prescription or
                                    Click Here to upload one
                                    <p class="text-grey-300">
                                        PNG, JPG or PDF files only (5MB maximum file size)
                                    </p>
                                </label>
                                <ul class="mt-4"
                                    v-if="prescriptionFile.name != null"
                                    v-cloak>
                                    <li class="text-sm p-1"
                                        >
                                        {{ prescriptionFile.name }}
                                        <button type="button"
                                                @click="remove()"
                                                title="Remove file">x
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <modal-footer>
                            <template v-slot:button>
                                <modal-footer-button name="SAVE UPLOADED PRESCRIPTION">

                                </modal-footer-button>
                            </template>
                        </modal-footer>
                    </form>
        </modal-mask>
    </transition>

</template>

<script>
import axios from 'axios';
import { mapActions, mapState } from 'vuex';
import ModalTitle from './modal/ModalTitle';
import ModalMask from './modal/ModalMask';
import ModalFooterButton from './modal/ModalFooterButton';
import ModalFooter from './modal/ModalFooter';

export default {
  name: 'DragAndDropPrescription',
  components: {
    ModalMask,
    ModalTitle,
    ModalFooterButton,
    ModalFooter,
  },
  computed: {
    ...mapState('checkoutForm', [
      'prescriptionUploadNeeded',
    ]),
  },
  data() {
    return {
      prescriptionFile: '',
      prescriptionName: '',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

    };
  },
  methods: {
    ...mapActions('checkoutForm', {
      prescriptionNeeded: 'prescriptionNeeded',
    }),
    onChange() {
      this.prescriptionFile = this.$refs.file.files[0];
    },
    remove() {
      this.prescriptionFile = '';
    },
    dragover(event) {
      event.preventDefault();
      if (!event.currentTarget.classList.contains('bg-green-300')) {
        event.currentTarget.classList.remove('bg-gray-100');
        event.currentTarget.classList.add('bg-green-300');
      }
    },
    dragleave(event) {
      event.currentTarget.classList.add('bg-gray-100');
      event.currentTarget.classList.remove('bg-green-300');
    },
    drop(event) {
      event.preventDefault();
      this.$refs.file.files = event.dataTransfer.files;
      this.onChange(); // Trigger the onChange event manually
      // Clean up
      event.currentTarget.classList.add('bg-gray-100');
      event.currentTarget.classList.remove('bg-green-300');
    },
    submitPrescription() {
      const formData = new FormData();

      const config = {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      };
      formData.append('file', this.prescriptionFile);

      axios.post('/prescription-upload',
        formData,
        config).then(() => {
        this.prescriptionNeeded();
      }).catch((error) => {
        console.log(`error: ${error.response}`);
      });
    },
  },
};
</script>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    max-width: 1000px;
    width: 100%;
    margin: 0px auto;
    padding: 1% 3%;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}

.modal-left h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
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
