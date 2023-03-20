<template>
  <div>
    <ColourGroup
      :options="options"
      :selected="$root.visualiser.trim"
      @click="clicked"
    />

    <p class="text-[#344154] text-sm my-3">
      Please note, colours may vary from illustration.
    </p>
  </div>
</template>
<script>
import options from "../../../fixtures/options";

import ColourGroup from "./ColourGroup";

export default {
    components: {ColourGroup},
    computed: {
        options() {
            return options.filter(option => option.type === 'trim' && option.oven_grill === Boolean(this.$root.visualiser.oven_grill))
        },
    },
    methods: {
        clicked(option) {
            this.$root.visualiser.trim = option.id
        },
    }
}
</script>
