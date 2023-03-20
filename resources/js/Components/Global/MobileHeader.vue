<template>
  <header class="flex content-between items-center bg-denbyHeader pl-4">
    <button
      class="text-white cursor-pointer text-2xl mr-6 lg:hidden"
      @click="$emit('opened')"
    >
      <font-awesome-icon icon="bars" />
    </button>
    <ChatToUs />
    <img
      src="/images/Denby-Hubspot-Logo.png"
      class="ml-auto w-full max-w-[185px] h-auto"
      alt="Denby Campervans"
    >
  </header>
</template>
<script>
import ChatToUs from './../ChatToUs'
export default {
    components: {ChatToUs},
    emits: ['opened'],
}
</script>
