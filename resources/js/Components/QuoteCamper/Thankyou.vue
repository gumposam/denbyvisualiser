<template>
  <div>
    <h2 class="text-3xl font-bold pb-4 inline-block tracking-wide border-b-4 mb-4 border-b-white pr-6">
      Thank you!
    </h2>

    <p class="text-white font-bold tracking-wide text-xl mt-12 px-6">
      We have received your quote and will be in contact shortly!
    </p>

    <div class="text-center">
      <button
        type="button"
        class="px-6 font-bold py-2 mt-12 text-xl border border-4 border-white rounded-full"
        @click="$emit('close')"
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
