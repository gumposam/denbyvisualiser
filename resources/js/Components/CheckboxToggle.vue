<template>
  <div
    class="flex mb-2 items-center cursor-pointer"
    @click="clicked"
  >
    <div
      :class="checked ? 'bg-green-400' : 'bg-slate-300'"
      class="relative inline-flex h-[38px] w-[74px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
    >
      <span
        aria-hidden="true"
        :class="checked ? 'translate-x-9' : 'translate-x-0'"
        class="pointer-events-none inline-block h-[34px] w-[34px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
      />
    </div>

    <div
      v-if="option.type === 'base'"
      class="ml-2.5"
    >
      <h3
        v-if="option.name"
        class="font-bold text-denbyHeader text-xl"
        v-text="option.name"
      />
      <p
        v-if="option.description"
        class="text-denbySubtitle text-sm"
        v-text="option.description"
      />
    </div>

    <div
      v-if="['gadgets', 'exterior', 'roof'].includes(option.type)"
      class="ml-2.5"
    >
      <p
        v-if="option.name"
        class="text-denbySubtitle"
        v-text="option.name"
      />
    </div>
  </div>
</template>
<script>
export default {
    props: {
        checked: {
            required: false,
            type: Boolean,
            default: false,
        },
        option: {
            required: true,
            type: Object,
        }
    },
    emits: [
        'checked',
        'unchecked',
    ],
    methods: {
        clicked() {
            if (this.checked) {
                this.$emit('unchecked', this.option)
                return
            }

            this.$emit('checked', this.option)
        }
    },
}
</script>
