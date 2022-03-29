<template>
    <div class="modal-footer flex flex-col w-full p-5 mt-5">
            <slot></slot>
            <slot name="button">
            </slot>
    </div>
</template>

<script>

export default {
  name: 'ModalFooter',
};
</script>

<style scoped>

</style>
