<template>
  <Modal
    modal-style="navigation"
    @close="close"
  >
    <img
      src="/images/navigation-logo.svg"
      class="mt-7"
    >

    <div class="w-full mt-4">
      <img
        src="/images/vanvisualiser@2x.png"
        alt="Van Visualiser!"
      >
    </div>

    <nav class="mt-8">
      <a
        class="block tracking-wide font-bold mb-7 text-xl"
        href="/"
      >
        Start New Campervan
      </a>
      <a
        v-if="imageUrl"
        :href="imageUrl"
        download="DreamDenbyCampervan"
        class="block tracking-wide font-bold mb-7 text-xl"
      >
        Download Campervan
      </a>
      <a
        class="block tracking-wide font-bold mb-7 text-xl"
        href="#"
        @click.prevent="$emit('quote')"
      >
        Quote My Campervan
      </a>
      <a
        class="block tracking-wide font-bold flex justify-between text-xl"
        href="https://www.denbycampervans.com/"
        target="_blank"
        @click="$emit('close')"
      >
        <span>Campervans for Sale</span>
        <font-awesome-icon
          class="text-3xl"
          :icon="['far', 'circle-chevron-right']"
        />
      </a>
    </nav>

    <div class="mt-8">
      <ChatToUs />
    </div>
  </Modal>
</template>
<script>
import ChatToUs from './../ChatToUs'
import Modal from '../Modals/BaseModal'

export default {
    name: 'MobileNavigation',
    components: {ChatToUs, Modal},
    props: {
        open: {
            required: false,
            default: false,
            type: Boolean,
        }
    },
    emits: ['close', 'quote'],
    data() {
        return {
            imageUrl: null,
        }
    },
    watch: {
        open() {
            window.axios.post('/share', {
                visualiser: this.$root.visualiser,
            }).then(response => {
                this.imageUrl = response.data.image
            })
        }
    },
    methods: {
        close() {
            this.imageUrl = null
            this.$emit('close')
        }
    }
}
</script>
