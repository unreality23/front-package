<template>
    <!-- Shopping Cart -->
    <div class="itemsInCart z-50">

        <div class="product flex flex-wrap items-start pb-5 bg-white p-5 border-b relative"
             v-for="(cart) in carts"
             :key="cart.id">

            <img src="/img/test.jpg"
                 :alt="cart.title"
                 class="w-20 pr-2">

            <div class="productInfo flex-1">

                <div class="font-bold text-red-700 my-2 text-xs"
                     v-if="cart.prescription && !prescriptionUploaded">
                    Vet prescription required
                </div>
                <div class="font-bold text-red-700 my-2 text-xs"
                     v-else-if="cart.prescription && prescriptionUploaded">
                    Vet prescription uploaded
                </div>

                <div class="productTitle font-bold">
                    {{ cart.title }}
                </div>

                <div class="productDescription"
                     v-if="requiredDescription == true">
                    {{ cart.description }}
                </div>

                <div class="productSize">
                    One size
                </div>

            </div>
            <!-- If prescription needed add animal to product in cart -->
            <div id="my-pets" v-if="allanimals.message && assignPrescription && cart.prescription"
                 class="flex mt-2 absolute inset-x-72 w-3/4 inset-t-10 top-0">
                <div v-if="!enableAnimalSelect">
                    <button
                        class="add-animal-to-list rounded border
                        bg-blue-300 text-white px-3 py-1 hover:bg-blue-600 "
                        @click="enableAnimalSelection()" >
                        Add Your Pet
                    </button>

                    <div v-if="valueAccepted" class="p-2 ">
                        {{ petSelected }}
                    </div>
                </div>

                <div v-else-if="enableAnimalSelect">

                        <select-input
                            :enabled-value="true"
                            :option-value="'My Pet'"
                            label="Select Your Pet"
                            :name="'pet'"
                            v-model="petSelected"
                            @on-change="selectBy"
                        >
                            <option v-for="text in allanimals.message"
                                    :key="text.id"
                                    :class="text.text"
                                    v-bind="$attrs"
                                    :value="text.value">
                                {{ text.name }}
                            </option>
                        </select-input>

                    <form-group>
                        <button @click="confirmSelection()"
                                :disabled="!isSelected"
                                class="btn"
                                :class="{ 'text-black': isSelected, 'text-gray-300': !isSelected}">
                            <i class="fa fa-check"></i>
                        </button>
                        <button @click="enableAnimalSelection()"
                                class="btn">
                            <i class="fa fa-close"></i> &times;
                        </button>
                    </form-group>

                </div>

            </div>
            <!-- If prescription not needed show this -->
            <div class="productCenter flex self-center ml-auto"
                 v-if="!cart.prescription || !assignPrescription">

                <div class="productPrice">
                    £{{ cart.price }}
                </div>

                <button @click="removeFromCart()"
                        class="btn">
                    <i class="fa fa-close"></i> &times;
                </button>

            </div>

            <!-- If prescription needed add prescription to product in cart  -->
            <div v-if="cart.prescription && assignPrescription && valueAccepted"
                 class="flex flex-col text-center absolute right-0
                 rounded bg-red-300 px-5 py-5 top-0 -mt-8 mx-auto">

                <div class="mb-4 font-bold text-white">ASSIGN PRESCRIPTIONs</div>

                <div class="flex w-full mx-auto">

                    <upload-prescription-modal>

                        <template v-slot:header>
                            <div class="text-center pt-8 pb-5">
                                <modal-title>Upload A New Prescription</modal-title>

                                <modal-description></modal-description>
                                <p>
                                    Before you upload a Prescription make
                                    sure that it contains the following
                                    information
                                </p>
                            </div>
                        </template>

                        <template v-slot:prescriptionExample>
                            <div class="border rounded shadow px-8 pt-5 pb-10 text-left">
                                <div class="py-5 prescription-address text-sm">
                                    Prescriber Name,<br>
                                    Practice Name,<br>
                                    Address,<br>
                                    Town,<br>
                                    Postcode<br>
                                    <br>
                                    Tel 01234 567890
                                </div>
                                <hr/>
                                <ul class="list-none m-0 py-5">
                                    <li class="py-2"
                                        v-for="prescriptionRequirements in prescriptionExampleList"
                                        :key="prescriptionRequirements"
                                        :class="prescriptionRequirements.class">
                                        {{ prescriptionRequirements.step }}
                                    </li>
                                </ul>
                                <hr/>
                                <div class="flex w-full py-5">
                                    <div class="px-2 w-1/3 prescription-signature">Signature</div>
                                    <div class="px-2 w-1/3">
                                        <img src="/img/prescription-example-stamp.png" class="pr-2">
                                    </div>
                                    <div class="px-2 w-1/3 prescription-date">Date 10/10/2021</div>
                                </div>
                            </div>
                        </template>

                        <template v-slot:prescriptionDetails>
                            <div class="flex flex-col text-left">
                                <p>For a prescription to be valid the following must be present.</p>
                                <ul class="list-none my-5 text-xs text-left">
                                    <li class="my-2"
                                        v-for="prescriptionExplained
                                        in prescriptionExampleExplained"
                                        :key="prescriptionExplained"
                                    >
                                        {{ prescriptionExplained.step }}
                                    </li>
                                </ul>
                                <p class="w-3/4 text-red-600">
                                    In order to avoid a delay with sending your order,
                                    please make sure that all the required prescription
                                    detail is legible.
                                </p>
                            </div>
                        </template>

                    </upload-prescription-modal>

                    <send-prescription-later></send-prescription-later>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import axios from 'axios';
import UploadPrescriptionModal from '../prescription/UploadPrescriptionModal';
import SendPrescriptionLater from '../prescription/SendPrescriptionLater';
import ModalTitle from '../prescription/modal/ModalTitle';
import FormGroup from '../form/skeleton/FormGroup';
import SelectInput from '../form/skeleton/SelectInput';

export default {
  name: 'ShoppingCart',
  components: {
    UploadPrescriptionModal,
    SendPrescriptionLater,
    ModalTitle,
    FormGroup,
    SelectInput,
  },
  props: {
    product: {
      type: Object,
      required: true,
    },
    requiredDescription: {
      type: Boolean,
      default: true,
    },
    assignPrescription: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      showUploadDescriptionModal: false,
      enableAnimalSelect: false,
      allanimals: [],
      petSelected: null,
      isSelected: false,
      valueAccepted: false,
    };
  },
  computed: {
    ...mapState('shoppingCart', [
      'carts',
      'totalprice',
      'cartadd',
      'vat',
      'badge',
      'productquantity',
    ]),
    ...mapState('checkoutForm', [
      'prescriptionUploaded',
    ]),
    prescriptionExampleExplained() {
      return [
        {
          step: 'Name, address, telephone number and qualification of the prescriber.',
        },
        {
          step: 'Species and identification of the animal.',
        },
        {
          step: 'Name and address of the owner.',
        },
        {
          step: 'Name of the medicine, quantity, dose and administration instructions.',
        },
        {
          step: 'If the prescription is repeatable, the number of times it can be repeated.',
        },
        {
          step: 'Signature and stamp of the prescriber.',
        },
        {
          step: 'Valid date for the prescription.',
        },

      ];
    },
    prescriptionExampleList() {
      return [
        {
          step: 'Prescription for the "Species" "Name of the Pet"',
          class: 'prescription-species',
        },
        {
          step: 'Owned by Mr/ Ms "Name of the Owner"',
          class: 'prescription-owner',
        },
        {
          step: 'Supply "Name of the Medicine" "Quantity, dose and administration instructions"',
          class: 'prescription-medicine',
        },
        {
          step: 'Number of times this Prescription should repeat',
          class: 'prescription-amount',
        },
      ];
    },

  },
  methods: {
    ...mapActions('shoppingCart', {
      viewCart: 'viewCart',
      addToCart: 'addToCart',
      removeFromCart: 'removeFromCart',
      storeToCart: 'storeToCart',
    }),
    getallpets() {
      axios.get('/account/getanimal')
        .then((response) => {
          this.allanimals = response.data;
          console.log(response.data);
        })
        .catch((error) => error.response.data);
    },
    enableAnimalSelection() {
      this.enableAnimalSelect = !this.enableAnimalSelect;
    },
    selectBy() {
      if (this.petSelected != null) {
        this.isSelected = true;
      }
    },
    confirmSelection() {
      if (this.isSelected === true) {
        this.valueAccepted = true;
        this.enableAnimalSelection();
      }
    },

  },
  mounted() {
    this.getallpets();
  },

};
</script>

<style scoped>

ul.list-none.my-5 {
    counter-reset: list;
}

ul.list-none.my-5 li:before {
    counter-increment: list;
    content: counter(list);
    font-size: 0.9rem;
    background: #009eda;
    width: 30px;
    height: 30px;
    color: #fff;
    display: inline-block;
    text-align: center;
    line-height: 30px;
    border-radius: 50px;
    margin-right: 6px;
    font-weight: bold;
    position: absolute;
    transform: translateY(-50%);
    left: 0%;
    top: 50%;
}

ul.list-none.my-5 li {
    position: relative;
    padding-left: 40px;
    justify-content: space-between;
    align-items: center;
    display: flex;
    height: 32px;
}

.prescription-address,
.prescription-species,
.prescription-owner,
.prescription-medicine,
.prescription-amount,
.prescription-signature,
.prescription-date {
    position: relative;
}

.prescription-address:before {
    content: '1';
    width: 32px;
    height: 32px;
    position: absolute;
    left: -12%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
}

.prescription-species:before {
    content: '2';
    width: 32px;
    height: 32px;
    position: absolute;
    left: -12%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
}

.prescription-owner:before {
    content: '3';
    width: 32px;
    height: 32px;
    position: absolute;
    left: -12%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
}

.prescription-medicine:before {
    content: '4';
    width: 32px;
    height: 32px;
    position: absolute;
    left: -12%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
}

.prescription-amount:before {
    content: '5';
    width: 32px;
    height: 32px;
    position: absolute;
    left: -12%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
}

.prescription-signature:before {
    content: '6';
    width: 32px;
    height: 32px;
    position: absolute;
    left: -35%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
}

.prescription-date:before {
    content: '7';
    width: 32px;
    height: 32px;
    position: absolute;
    right: -37%;
    background: #fff;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    color: #1d9eda;
    border: 1px solid #1d9eda;
    line-height: 30px;
    border-radius: 50px;
    top: -4px;
}
</style>
