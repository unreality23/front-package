<template>
    <!-- Upload prescription logic -->
    <div class="new-prescription text-xs w-2/4 flex flex-col">
        <div class="border rounded px-2 py-3 mb-1 h-full text-2xl w-9/12 mx-auto
        transition transform hover:bg-blue-300 hover:border-blue-300 cursor-pointer text-white"
             @click="toggleUploadDescription()">
            <i class="fa fa-upload" aria-hidden="true"></i></div>
        <button @click="toggleUploadDescription()" class="text-white">
            UPLOAD<br>NEW<br>PRESCRIPTION
        </button>
    </div>
    <transition name="modal" v-if="showUploadDescriptionModal">
        <modal-mask>
                    <div class="modal-default-button float-right text-blue-300 hover:text-blue-800
                    transition-all focus:outline-none focus:border-0 cursor-pointer"
                         @click="toggleUploadDescription()">
                        <i class="fas fa-times text-2xl -mr-5 mt-3"></i>
                    </div>
                    <div class="modal-header">
                        <slot name="header"></slot>
                    </div>
                    <div class="flex">
                        <div class="modal-left w-full">
                            <slot name="prescriptionExample">
                                <div class="prescriptionExample flex">

                                </div>
                            </slot>
                        </div>

                        <div class="modal-right pl-10">
                            <slot name="prescriptionDetails">
                            </slot>
                        </div>
                    </div>

                    <modal-footer>
                            <template v-slot:button>
                                <modal-footer-button
                                    name="PROCEED & UPLOAD A PRESCRIPTION"
                                    @click="toggleDragAndDropUpload()">
                                </modal-footer-button>
                            </template>
                    </modal-footer>

        </modal-mask>
    </transition>
    <transition name="modal" v-if="showDragAndDropModal">
        <drag-and-drop-prescription>
            <div
                class="modal-default-button float-right text-blue-300
                hover:text-blue-800 transition-all focus:outline-none
                focus:border-0 cursor-pointer"
                @click="toggleDragAndDrop()">
                <i class="fas fa-times text-2xl -mr-5 mt-3"></i>
            </div>
        </drag-and-drop-prescription>
    </transition>
</template>

<script>
import DragAndDropPrescription from './DragAndDropPrescription';
import ModalMask from './modal/ModalMask';
import ModalFooterButton from './modal/ModalFooterButton';
import ModalFooter from './modal/ModalFooter';

export default {
  name: 'UploadPrescriptionModal',
  components: {
    DragAndDropPrescription,
    ModalMask,
    ModalFooter,
    ModalFooterButton,
  },
  data() {
    return {
      showUploadDescriptionModal: false,
      showDragAndDropModal: false,
    };
  },
  methods: {
    toggleUploadDescription() {
      this.showUploadDescriptionModal = !this.showUploadDescriptionModal;
    },
    toggleDragAndDropUpload() {
      this.toggleUploadDescription();
      this.showDragAndDropModal = !this.showDragAndDropModal;
    },
    toggleDragAndDrop() {
      this.showDragAndDropModal = !this.showDragAndDropModal;
    },
  },
};
</script>

<style scoped>

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
