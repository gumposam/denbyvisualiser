<template>
  <div>
    <WheelGroup
      title="18&quot; Wheels"
      :options="eighteenInchOptions"
      :selected="$root.visualiser.wheel"
      @click="clicked"
    />
    <WheelGroup
      title="20&quot; Wheels"
      :options="twentyInchOptions"
      :selected="$root.visualiser.wheel"
      @click="clicked"
    />
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import WheelGroup from "./WheelGroup";

export default {
    components: {WheelGroup},
    emits: ['updated'],
    computed: {
        eighteenInchOptions() {
            return options.filter(option => option.type === 'wheels' && option.area === '18-inch')
        },
        twentyInchOptions() {
            return options.filter(option => option.type === 'wheels' && option.area === '20-inch')
        },
    },
    methods: {
        clicked(option) {
            this.$root.visualiser.wheel = option.id
        },
    }
}
</script>
