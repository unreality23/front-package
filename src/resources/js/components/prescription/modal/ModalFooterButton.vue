<template>
    <button class="border rounded bg-blue-300 transition-all
     hover:bg-blue-500 px-4 py-3 block text-white text-center font-bold mx-auto">
        {{ name }}
    </button>
</template>

<script>
export default {
  name: 'ModalFooterButton',
  props: {
    name: {
      String: '',
    },

  },
};
</script>

<style scoped>

</style>
