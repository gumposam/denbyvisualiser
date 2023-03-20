<template>
  <div class="mb-4">
    <h4
      class="font-bold text-[#344154] text-sm mb-2"
      v-text="title"
    />
    <div class="grid grid-cols-1 gap-4">
      <div
        v-for="option in options"
        :key="option.id"
        class="cursor-pointer flex items-center"
        @click="$emit('click', option)"
      >
        <CheckboxToggle
          :option="option"
          class="mb-0 mr-2"
          :checked="option.id === selected"
        />

        <img
          :src="option.getImageUrl(true)"
          :alt="option.name"
          class="w-full max-w-[180px] h-auto mr-2"
        >
        <span
          class="text-[#344154] text-sm"
          v-text="option.name"
        />
      </div>
    </div>
  </div>
</template>
<script>
import CheckboxToggle from "../../CheckboxToggle";

export default {
    components: {CheckboxToggle},
    props: {
        title: {
            required: true,
            type: String,
        },
        options: {
            required: true,
            type: Array,
        },
        selected: {
            required: false,
            type: Number,
            default: null,
        }
    },
    emits: ['click'],
}
</script>
