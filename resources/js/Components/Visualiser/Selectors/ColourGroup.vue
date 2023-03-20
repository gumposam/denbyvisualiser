<template>
  <div class="mb-4">
    <h4
      v-if="title"
      class="font-bold text-[#344154] text-sm mb-6"
      v-text="title"
    />
    <div class="grid grid-cols-2 gap-4">
      <div
        v-for="option in options"
        :key="option.id"
        class="border bg-white flex items-center cursor-pointer rounded-full p-2 min-w-[184px]"
        :class="{'border-[#68EA59]': option.id === selected, 'border-[#C5C5C5]': option.id !== selected}"
        @click="$emit('click', option)"
      >
        <img
          :src="option.getImageUrl(true)"
          :alt="option.name"
          class="w-[49px] h-[49px] mr-4"
        >

        <p
          class="text-center text-[#344154]"
          v-text="option.name"
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props: {
        title: {
            required: false,
            type: String,
            default: null,
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
<style>
.border-3 {
    border-width: 3px;
}
</style>
