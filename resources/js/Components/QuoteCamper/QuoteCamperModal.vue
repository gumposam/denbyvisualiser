<template>
  <Modal>
    <Initial
      v-if="stage === stages.default"
      @next="stage = stages.form"
    />
    <QuoteForm
      v-if="stage === stages.form"
      @requested="stage = stages.success"
    />
    <Thankyou
      v-if="stage === stages.success"
      @close="close"
    />
  </Modal>
</template>
<script>
import Modal from "../Modals/BaseModal";
import Initial from './DefaultPage'
import QuoteForm from './QuoteForm'
import Thankyou from './Thankyou'

const stages = {
    default: 'default',
    form: 'form',
    success: 'success',
}

export default {
    components: {Modal, Initial, QuoteForm, Thankyou},
    data() {
        return {stage: stages.default, stages}
    },
    methods: {
        close() {
            this.emitter.emit('close-quote')
        }
    }
}
</script>
