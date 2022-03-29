<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'ModalMask',
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

</style>
