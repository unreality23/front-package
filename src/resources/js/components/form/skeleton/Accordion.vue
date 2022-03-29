<template>
    <!-- Accordion logic -->
    <transition name="fade"
                appear>
    <div class="bg-white pb-4 pt-6 mb-4 px-8  ease-in-out transition-all">
        <h2 class="text-left font-medium text-left tracking-wider transition-all
        flex justify-between w-full text-lg cursor-pointer"
            @click="toggleAccordion">
            <div class="option-title">
                {{  label }}
            </div>
            <i class="fas fa-angle-down text-2xl transition-all transform"
               :class="rotateClasses">

            </i>
        </h2>

            <form action=""
                  method="post"
                  class="ease-in-out transition-all w-full"
                  :class="transitionClasses">
                <slot></slot>
            </form>

    </div>
    </transition>
</template>

<script>

export default {
  name: 'CollapseForm',
  props: {
    label: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      isOpen: true,
    };
  },
  computed: {
    transitionClasses() {
      return this.isOpen ? 'opacity-100 visible max-h-full pt-3' : 'pt-0 max-h-0 opacity-0 invisible m-0';
    },
    rotateClasses() {
      return {
        '': !this.isOpen,
        'rotate-180': this.isOpen,
      };
    },
  },
  methods: {
    toggleAccordion() {
      this.isOpen = !this.isOpen;
    },
  },
};
</script>

<style scoped>

</style>
