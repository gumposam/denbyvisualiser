<template>
  <Modal @close="$emit('close')">
    <h2 class="text-3xl font-bold pb-4 tracking-wide border-b-4 mb-4 border-b-white pr-6">
      Questions and <br> Queries&#8230;
    </h2>

    <div
      v-for="question in questions"
      :key="question.id"
      class="mt-6 pb-6 border-b-4 border-b-white border-dashed"
    >
      <div
        class="flex cursor-pointer items-center"
        @click="toggle(question)"
      >
        <h3
          class="text-xl tracking-wide mr-4 font-bold"
          v-text="question.question"
        />
        <font-awesome-icon
          v-if="question.open"
          class="text-3xl"
          icon="fa-regular fa-circle-xmark"
        />
        <font-awesome-icon
          v-else
          class="text-3xl"
          icon="fa-regular fa-circle-chevron-down"
        />
      </div>

      <div
        v-show="question.open"
        class="mt-4"
      >
        <div
          class="text-sm font-bold tracking-wide"
          v-html="question.answer"
        />
      </div>
    </div>
  </Modal>
</template>
<script>
import questions from './../../database/faq'
import Modal from '../Modals/BaseModal'

export default {
    components: {Modal},
    emits: ['close'],
    data() {
        return {
            questions: questions.map((question, index) => {
                question.open = index === 0
                return question
            })
        }
    },
    methods: {
        toggle(question) {
            question.open = !question.open
        }
    }
}
</script>
