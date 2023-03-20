<template>
  <footer class="flex w-full">
    <div class="text-white bg-denbyShare flex flex-auto items-center p-4 px-2 justify-between xl:justify-end min-w-share">
      <button
        class="px-3 flex items-center"
        @click="$emit('faqOpened')"
      >
        <font-awesome-icon
          class="text-3xl"
          :icon="['far', 'circle-question']"
        />
        <span class="hidden ml-3 lg:inline text-[#F2FDFF] font-semibold text-lg">Need help?</span>
      </button>
      <button
        class="px-3 flex items-center"
        @click="$emit('shareOpened')"
      >
        <span class="hidden mr-3 lg:inline text-[#F2FDFF] font-semibold text-lg">Share My Campervan</span>
        <font-awesome-icon
          class="text-3xl"
          icon="fa-solid fa-share-nodes"
        />
      </button>
    </div>
    <button
      class="xl:w-[250px] text-white w-full p-4 flex justify-center items-center"
      :class="selectedIndex === 0 ? 'bg-gray-300' : 'bg-gradient-to-r from-denbyRed to-denbyOrange'"
      @click="previous"
    >
      <font-awesome-icon
        class="text-3xl mr-4"
        :icon="['far', 'circle-chevron-left']"
      />
      <span class="uppercase relative font-bold text-sm sm:text-base">Previous Step</span>
    </button>
    <button
      class="xl:w-[250px] bg-gradient-to-r  from-denbyOrange to-denbyRed text-white w-full p-4 flex justify-center items-center"
      @click="next"
    >
      <span class="uppercase relative font-bold text-sm sm:text-base">{{ selectedIndex === 10 ? 'Get a Quote' : 'Next Step' }}</span>
      <font-awesome-icon
        class="text-3xl ml-4"
        :icon="['far', 'circle-chevron-right']"
      />
    </button>
  </footer>
</template>
<script>
import { useStore } from 'vuex';
import store from '../../store'
import { event } from 'vue-gtag'

export default  {
  emits: ['shareOpened', 'faqOpened'],
  setup() {
    const store = useStore();
    const quote = () => {
      event('quote', { method: 'Google' })
    }
    return {
      quote,
      slide: store.state.slide,
      updateActiveSlide(slide) {
        store.commit('updateActiveSlide', slide);
      },
    }
  },
  computed: {
        selectedIndex() {
            return store.state.slide;
        },
    },
    methods: {
        next() {
          if(this.selectedIndex === 10){
            this.quote();
            this.emitter.emit('quote');
            return;
          }
          this.updateActiveSlide(this.selectedIndex + 1);
        },
        previous() {
          if(this.selectedIndex === 0){
            return;
          }
          this.updateActiveSlide(this.selectedIndex - 1);
        }
    }
}
</script>
