<template>
  <header class="bg-denbyHeader h-[114px]">
    <div class="flex items-center text-white mx-auto">
      <div class="pr-10">
        <p class="denby-text pl-1">
          Denby
        </p>
        <p class="van-visualiser-text underline decoration-white pb-5 underline-offset-8">
          Van Visualiser
        </p>
      </div>

      <nav class="flex items-center w-full justify-evenly">
        <a
          class="block font-bold denbyHeaderText px-5"
          href="/"
        >
          Design New Campervan
          <font-awesome-icon
            icon="fa-solid fa-circle-play"
            class="hidden xl:inline pl-2 text-2xl relative top-[5px]"
          />
        </a>
        <a
          class="block font-bold denbyHeaderText px-5"
          href="https://www.denbycampervans.com/"
          target="_blank"
          @click="$emit('close')"
        >
          <span>Campervans for Sale</span>
          <font-awesome-icon
            icon="fa-solid fa-circle-play"
            class="hidden xl:inline pl-2 text-2xl top-[3px] relative"
          />
        </a>
        <a
          class="block font-bold denbyHeaderText px-5"
          href="#"
          @click.prevent="$emit('share')"
        >
          Share My Campervan
          <font-awesome-icon
            icon="fa-solid fa-share-nodes"
            class="hidden xl:inline pl-2 text-2xl relative top-[5px]"
          />
        </a>
        <div class="pl-3">
          <ChatToUs onclick="this.chatToUs()" />
        </div>
      </nav>
    </div>
  </header>
</template>
<script>
import ChatToUs from "./../ChatToUs";
import { event } from 'vue-gtag'

export default {
  
    components: { ChatToUs },
    emits: ["share", "close"],
    setup() {
    const chatToUs = () => {
      event('chatToUs')
    }
    
    return {
      chatToUs
    }
  },
};
</script>
