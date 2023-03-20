<template>
  <div class="mb-4">
    <h4
      v-if="title"
      class="font-bold text-[#344154] text-sm mb-6"
      v-text="title"
    />
    <div class="grid gap-2 grid-cols-2 xl:grid-cols-3 xl:gap-2">
      <div
        v-for="option in options"
        :key="option.id"
        class="mb-4 cursor-pointer w-[106px] "
        @click="$emit('click', option)"
      >
        <div
          class="relative h-[106px] flex items-center justify-center text-center"
        >
          <img
            :src="option.getImageUrl(true)"
            :alt="option.name"
            class="border-3 rounded-[33px]"
            :class="{'border-[#68EA59]': selected === option.id, 'border-transparent': selected !== option.id}"
          >
          <span
            v-if="selected === option.id"
            class="text-[#68EA59] absolute z-[2]"
          >
            <font-awesome-icon
              icon="fa-regular fa-circle-check"
              class="text-xl"
            />
          </span>
        </div>

        <p
          class="text-center mt-2 text-[#344154] font-bold"
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
