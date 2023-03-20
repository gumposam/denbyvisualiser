<template>
  <div>
    <ImageGroup
      :options="options"
      :selected="$root.visualiser.floor"
      @click="clicked"
    />

    <p class="text-[#344154] text-sm my-3">
      Please note, colours may vary from illustration.
    </p>
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import ImageGroup from "./ImageGroup";

export default {
    components: {ImageGroup},
    computed: {
        options() {
            return options.filter(option => option.type === 'floors')
        },
    },
    methods: {
        clicked(option) {
            this.$root.visualiser.floor = option.id
        },
    }
}
</script>
