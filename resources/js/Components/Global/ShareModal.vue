<template>
  <Modal @close="$emit('close')">
    <div
      class="w-full h-sm border border-4 mt-4 border-white border-dashed"
    >
      <img :src="imageUrl">
    </div>
    <div
      v-if="imageUrl"
      class="mt-4"
    >
      <h1 class="text-center text-2xl font-semibold tracking-wide">
        Download Your Dream Campervan
      </h1>
      <a
        :href="imageUrl"
        download="DreamDenbyCampervan"
        class="px-4 py-2 mt-8 mx-auto block w-1/2 text-center font-bold text-lg border border-4 bg-denbyFormButton border-white rounded-full"
      >
        Download Campervan
      </a>
    </div>
  </Modal>
</template>
<script>
import Modal from '../Modals/BaseModal'
import { event } from 'vue-gtag'

export default {
    components: {Modal},
    emits: ['close'],
    setup() {
      const share = () => {
        event('share')
      }
      return {
        share
      }
    },
    data() {
        return {
            imageUrl: null,
        }
    },
    mounted() {
        this.share();
        window.axios.post('/share', {
            visualiser: this.$root.visualiser,
        }).then(response => {
            this.imageUrl = response.data.image
        })
    }
}
</script>
