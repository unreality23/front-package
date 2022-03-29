<template>
    <!-- Select Input logic -->
    <label class="flex"
           :for="name">
        {{ capitalizeFirstLetter }}
        <div class="text-red-600 pl-1">*</div>
    </label>

    <select :name="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            @change="$emit('onChange', $event.target.value)"
            class="form-control transition-all duration-500 pl-2 w-full h-10 border border-gray-400
            hover:border-green-400 focus:border-green-400 active:border-green-400 bg-white">
        <option disabled
                :selected="!modelValue"
                value="">
            {{ placeholder }}</option>
        <slot>
            <option v-for="text in options"
                    :key="text.id"
                    :class="text.text"
                    :value="text.value">
                {{ text.text }}
            </option>
        </slot>

    </select>

</template>

<script>
export default {
  name: 'TextInput',
  props: {
    name: {
      type: String,
    },
    label: {
      type: String,
    },
    type: {
      type: String,
      default: 'text',
    },
    modelValue: {
      type: String,
    },
    options: {
      type: Array,
    },
    placeholder: {
      type: String,
      default: 'Select options',
    },
    test: {
      type: Event,
    },

  },
  emits: ['update:modelValue', 'onChange'],
  computed: {
    capitalizeFirstLetter() {
      return this.label.charAt(0).toUpperCase() + this.label.slice(1);
    },
  },
};
</script>

<style scoped>

</style>
