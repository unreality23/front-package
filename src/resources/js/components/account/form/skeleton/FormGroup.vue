<template>
    <transition name="fade"
                appear>
        <div class="form-group  pt-3 transition-all duration-500 ease-in-out">
            <slot>
            </slot>
        </div>
    </transition>
</template>

<script>
export default {
    name: "FormGroup",
}
</script>

<style scoped>

</style>
