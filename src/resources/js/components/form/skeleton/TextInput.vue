<template>
    <!-- Select input logic -->
    <label class="flex"
           :for="name">
        {{ capitalizeFirstLetter }}
        <div class="text-red-600 pl-1">*</div>
    </label>
    <input  :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="capitalizeFirstLetter"
            class="form-control transition-all pl-2
            w-full h-10 border border-gray-400 hover:border-green-400
            focus:border-green-400 active:border-green-400"
            :name="name">

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

  },
  emits: ['update:modelValue'],
  computed: {
    capitalizeFirstLetter() {
      return this.label.charAt(0).toUpperCase() + this.label.slice(1);
    },
  },
};
</script>

<style scoped>

</style>
