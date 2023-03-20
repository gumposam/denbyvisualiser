<template>
  <div class="flex flex-auto flex-col">
    <header class="bg-gradient-to-r from-denbyRed to-denbyOrange px-4 py-2">
      <p class="text-white tracking-wide text-center font-semibold text-sm">
        Customise Your Dream Campervan!
      </p>
    </header>

    <div class="relative bg-[#f8ffff]">
      <img
        :src="image"
        class="w-full"
      >
    </div>
  </div>
</template>
<script>

export default {
    props: {
        image: {
            required: true,
            type: String,
        }
    }
}

</script>