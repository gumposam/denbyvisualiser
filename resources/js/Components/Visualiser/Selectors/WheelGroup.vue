<template>
  <div class="mb-4">
    <h4
      class="font-bold text-[#344154] text-sm mb-6"
      v-text="title"
    />
    <div class="grid gap-2 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-3 xl:gap-2">
      <div
        v-for="option in options"
        :key="option.id"
        class="flex flex-col items-center cursor-pointer"
        @click="$emit('click', option)"
      >
        <div
          class="bg-white rounded-3xl border border w-[106px] h-[106px] flex items-center justify-center"
          :class="{'border-[#68EA59] border-3': selected === option.id, 'border-[#C1D9DD]': selected !== option.id}"
        >
          <img
            :src="option.getImageUrl(true)"
            :alt="option.name"
            class="w-[71px] h-[74px]"
          >
        </div>

        <p
          class="text-center mt-2 text-[#344154] font-bold"
          v-text="option.name"
        />
        <p
          class="text-center text-[#344154]"
          v-text="option.brand"
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {
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
<style>
.border-3 {
    border-width: 3px;
}
</style>
