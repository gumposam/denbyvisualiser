<template>
  
  <Modal
    v-if="splash"
    @close="splash = false"
  >
    <SplashPage 
      @close="splash = false"
    />
  </Modal>
  <div
    v-else
    class="flex flex-auto flex-col"
  >
    <header class="bg-gradient-to-r from-denbyRed to-denbyOrange px-4 py-2">
      <p class="text-white tracking-wide text-center font-semibold text-sm">
        Customise Your Dream Campervan!
      </p>
    </header>
    <BaseVisualiser />
  </div>
</template>
<script>
import BaseVisualiser from '../Components/Visualiser/BaseVisualiser'
import Modal from '../Components/Modals/BaseModal'
import SplashPage from '../Components/Visualiser/SplashPage'

export default {
    components: {
        Modal,
        SplashPage,
        BaseVisualiser,
    },
    data() {
        return {
            splash: true,
            selected: {
                engine: null,
            }
        }
    },
    computed: {
        engines: () => [

        ],
    }
}
</script>
