<template>
  <div>
    <CheckboxGroup
      v-model="$root.visualiser.roof.colour"
      :options="colourOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.roof.tent"
      :options="tentOptions"
    />
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import CheckboxGroup from "./CheckboxGroup";

export default {
    components: {CheckboxGroup},
    computed: {
        colourOptions() {
            return options.filter(option => option.type === 'roof' && option.area === 'colour')
        },
        tentOptions() {
            return options.filter(option => option.type === 'roof' && option.area === 'tent')
        },
    },
}
</script>
