<template>
  <div
    class="absolute left-0 top-0 p-6 overflow-y-auto text-white w-full h-screen bg-gradient-to-t z-30"
    :class="gradient"
  >
    <div class="flex w-full">
      <button
        class="ml-auto"
        @click="$emit('close')"
      >
        <font-awesome-icon
          class="text-3xl"
          :icon="['far', 'circle-xmark']"
        />
      </button>
    </div>
    <div class="p-4 max-w-xl mx-auto">
      <slot />
    </div>
  </div>
</template>
<script>
export default {
    props: {
        modalStyle: {
            required: false,
            type: String,
            default: 'modal',
            validator(style) {
                return ['navigation', 'modal'].includes(style)
            }
        },
    },
    emits: ['close'],
    computed: {
        gradient() {
            if (this.modalStyle === 'navigation') {
                return 'from-denbyNavigationDark to-denbyNavigationLight'
            }

            return 'from-denbyRed to-denbyOrange';
        }
    }
}
</script>
