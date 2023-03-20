<template>
  <div
    class="mx-auto relative lg:min-h-screen flex flex-col"
    :class="{'overflow-hidden max-h-screen': modal}"
  >
    <DesktopHeader
      class="hidden lg:flex"
      @share="share = true"
    />
    <MobileHeader
      class="lg:hidden"
      @opened="navigation = true"
    />
    <div class="flex flex-auto flex-col">
      <slot />
    </div>
    <DenbyFooter
      @share-opened="share = true"
      @faq-opened="faq = true"
    />
  </div>
  <MobileNavigation
    v-show="navigation"
    class="lg:hidden"
    :open="navigation"
    @close="navigation = false"
    @share="share = true"
    @quote="quote = true"
  />
  <FAQ
    v-show="faq"
    @close="faq = false"
  />
  <Share
    v-if="share"
    @close="share = false"
  />
  <Quote
    v-show="quote"
    @close="quote = false"
  />
</template>
<script>
import MobileNavigation from '../Components/Global/MobileNavigation'
import FAQ from './../Components/Global/FAQ'
import Quote from '../Components/QuoteCamper/QuoteCamperModal'
import Share from '../Components/Global/ShareModal'
import MobileHeader from './../Components/Global/MobileHeader'
import DesktopHeader from './../Components/Global/DesktopHeader'
import DenbyFooter from '../Components/Global/DenbyFooter'

export default {
    components: {MobileNavigation, FAQ, MobileHeader, DenbyFooter, Share, Quote, DesktopHeader},
    data() {
        return {
            navigation: false,
            faq: false,
            share: false,
            quote: false,
        }
    },
    computed: {
        modal() {
            return this.navigation || this.faq || this.share || this.quote
        }
    },
    created() {
        this.emitter.on('quote', () => this.quote = true)
        this.emitter.on('close-quote', () => this.quote = false)
    }
}
</script>
<style>

</style>
