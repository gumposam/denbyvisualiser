<template>
  <div>
    <ImageGroup
      title="Wood"
      :options="woodOptions"
      :selected="$root.visualiser.interior"
      @click="clicked"
    />

    <ImageGroup
      title="Gloss"
      :options="glossOptions"
      :selected="$root.visualiser.interior"
      @click="clicked"
    />
    <ImageGroup
      title="Solid"
      :options="solidOptions"
      :selected="$root.visualiser.interior"
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
    emits: ['updated'],
    computed: {
        woodOptions() {
            return options.filter(option => option.type === 'interior' && option.area === 'wood' && option.oven_grill ===  Boolean(this.$root.visualiser.oven_grill))
        },
        glossOptions() {
            return options.filter(option => option.type === 'interior' && option.area === 'gloss' && option.oven_grill ===  Boolean(this.$root.visualiser.oven_grill))
        },
        solidOptions() {
            return options.filter(option => option.type === 'interior' && option.area === 'solid' && option.oven_grill ===  Boolean(this.$root.visualiser.oven_grill))
        },
    },
    methods: {
        clicked(option) {
            this.$root.visualiser.interior = option.id
        },
    }
}
</script>
