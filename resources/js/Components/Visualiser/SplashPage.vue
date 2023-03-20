<template>
  <div>
    <img src="/images/whitelogo.png" class="block mx-auto">

    <p class="text-white text-center font-bold tracking-wide text-2xl mt-6 px-6">
      Welcome To The Denby <br> Campervans Build and Quote Tool
    </p>

    <img src="/images/exploded-van.png" class="block mx-auto">

    <p class="text-white text-center font-bold tracking-wide text-lg mt-6 px-6">
      Design your Dream Campervan Online & Get a Quote in Minutes!
    </p>

    <div class="text-center">
      <button
        type="button"
        class="px-6 font-bold py-2 mt-6 text-xl border border-4 border-white rounded-full"
        @click="$emit('close')"
      >
        Design My Dream Campervan
        <font-awesome-icon
          class="ml-2"
          :icon="['far', 'circle-chevron-right']"
        />
      </button>
    </div>
  </div>
</template>
