<template>
    <!-- Radio Input logic -->
    <label class="flex flex-col mb-4"
           :for="value"
           v-if="radioType == 1">
        <div class="top-del flex text-sm">
            <div class="block font-semibold w-2/12">
                {{  price }}
            </div>
            <div class="text-gray-500">
                {{ descriptionShort }}:
            </div>
        </div>
        <div class="bottom-del flex text-sm pl-24 mt-1">
            <div class="flex flex-col w-full pr-8">
                <div class="text-gray-400">
                    {{ deliveryDay }}
                </div>
                <div class="hiddenDescription flex text-black text-xs mt-4"
                     v-if="value === selectedFormValue">
                    <i class="fas fa-info-circle pr-2 text-lg"></i> {{ description }}
                </div>

            </div>

            <input type="radio"
                   class="form-control transition-all mr-2 mt-1 self-center w-1/4 h-7"
                   :name="name"
                   :id="value"
                   :value="value"
                   @input="$emit('update:labelValue', $event.target.value)"
            >
        </div>

    </label>

    <label class="payment-label flex flex-col mb-4 cursor-pointer w-2/4"
           :for="value"
           v-if="radioType == 2">

        <div class="flex border border-gray-300 transition-all px-2 py-4 hover:border-gray-600">
            <img :src="img" :alt="title" class="w-10 pr-4 self-center">
            <div class="radio-title">{{ title }}</div>
            <div class="radio-short-description">{{ descriptionShort }}</div>
        </div>

        <div class="radio-description pink text-center text-sm px-2 py-4"
             v-if="description.length">
            {{ description }}
        </div>
        <input type="radio"
               class="form-control transition-all mr-2 mt-1 self-center hidden"
               :name="name"
               :id="value"
               :value="value"
               @input="$emit('update:labelValue', $event.target.value)">
    </label>

    <label class="text-center flex group flex-col mb-4 cursor-pointer w-1/3
    border rounded hover:bg-blue-300 transition-all transform mx-2 peer-checked:bg-blue-300"
           :for="value"
           v-if="radioType == 3">
        <input type="radio"
               class="form-control transition-all mt-4 self-center peer"
               :name="name"
               :id="value"
               :value="value"
               @input="$emit('update:labelValue', $event.target.value)">
        <img :src="img" :alt="title" class="w-24 p-2 self-center mt-3 mb-1">
        <div class="radio-title font-bold text-lg
        text-blue-300 group-hover:text-white peer-checked:text-white">
            {{ title }}
        </div>
        <div class="radio-send-to text-left px-4 py-2
        whitespace-pre-wrap text-gray-600 group-hover:text-white
        font-light text-sm peer-checked:text-white">
            {{ description }}
        </div>
    </label>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'RadioInput',
  props: {
    name: {
      type: String,
    },
    price: {
      type: String,
    },
    value: {
      type: String,
    },
    descriptionShort: {
      type: String,
      default: '',
    },
    description: {
      type: String,
      default: '',
    },
    deliveryDay: {
      type: String,
    },
    title: {
      type: String,
      default: '',
    },
    paymentRadio: {
      type: Boolean,
      default: false,
    },
    radioType: {
      type: Number,
      default: 1,
    },
    img: {
      type: String,
      default: 'img/404.png',
    },
    selectedFormValue: {
      type: String,
      default: '',
    },

  },

  emits: ['update:labelValue'],
  computed: {
    ...mapState('checkoutForm', [
      'selected',
      'step',
    ]),

  },
  methods: {
    ...mapActions('accountPage', {
      changeStep: 'changeStep',
    }),
    changeRadioStyle(value) {
      this.step = value;
    },
  },
};
</script>

<style scoped>

</style>
