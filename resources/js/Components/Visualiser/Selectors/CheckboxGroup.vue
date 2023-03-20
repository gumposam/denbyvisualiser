<template>
  <div class="mb-4">
    <h4
      v-if="title"
      class="font-bold text-[#344154] text-sm mb-2"
      v-text="title"
    />
    <CheckboxToggle
      v-for="option in options"
      :key="option.id"
      :option="option"
      :checked="option.id === selected"
      @checked="select"
      @unchecked="remove"
    />
  </div>
</template>
<script>
import CheckboxToggle from "../../CheckboxToggle";

export default {
    name: 'CheckboxGroup',
    components: {CheckboxToggle},
    props: {
        title: {
            required: false,
            type: String,
            default: null,
        },
        options: {
            required: true,
            type: Array,
        },
        modelValue: {
            required: false,
            type: Number,
            default: null,
        }
    },
    emits: ['update:modelValue'],
    data({modelValue}) {
        return {
            selected: modelValue,
        }
    },
    watch: {
        selected(selected) {
            this.$emit('update:modelValue', selected)
        }
    },
    methods: {
        select(option) {
            this.selected = option.id
        },
        remove() {
            this.selected = null
        }
    }
}
</script>
