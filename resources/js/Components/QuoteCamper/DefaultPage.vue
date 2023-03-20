<template>
  <div>
    <img src="/images/nearlythere.png">

    <p class="text-white font-bold tracking-wide text-xl mt-12 px-6">
      We just need a few details so that we can put an accurate quote together for you...
    </p>

    <div class="text-center">
      <button
        type="button"
        class="px-6 font-bold py-2 mt-12 text-xl border border-4 border-white rounded-full"
        @click="$emit('next')"
      >
        OK!
        <font-awesome-icon
          class="ml-2"
          :icon="['far', 'circle-chevron-right']"
        />
      </button>
    </div>
  </div>
</template>
