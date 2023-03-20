<template>
  <div>
    <CheckboxGroup
      v-model="$root.visualiser.oven"
      :options="ovenOrDoorOptions"
      @update:modelValue="ovenOrDoorChange"
    />
    <CheckboxToggle
      v-for="option in otherOptions"
      :key="option.id"
      :option="option"
      :checked="$root.visualiser.gadgets.includes(option.id)"
      @checked="select"
      @unchecked="remove"
    />
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import CheckboxGroup from "./CheckboxGroup";
import CheckboxToggle from "../../CheckboxToggle";

export default {
    components: {CheckboxGroup, CheckboxToggle},
    emits: ['updated'],
    data() {
        return {
            oven: null,
            others: [],
        }
    },
    computed: {
        ovenOrDoorOptions() {
            return options.filter(option => option.type === 'gadgets' && option.area === 'oven_or_door');
        },
        otherOptions() {
            return options.filter(option => option.type === 'gadgets' && option.area === 'default');
        },
    },
    methods: {
        select(option) {
            this.$root.visualiser.gadgets.push(option.id)
        },
        remove(removed) {
            const index = this.$root.visualiser.gadgets.findIndex(option => {
                return option === removed.id
            })

            if (index === -1) {
                return;
            }

            this.$root.visualiser.gadgets.splice(index, 1)
        },
        ovenOrDoorChange(option_id) {
          var oven_grill = false;
          if(option_id){
             oven_grill = options.filter(option => option.id === option_id)[0].oven_grill;
          } 
           
            if(this.$root.visualiser.oven_grill && !oven_grill){
              this.$root.visualiser.trim = this.$root.visualiser.trim + 1;
              this.$root.visualiser.interior = this.$root.visualiser.interior + 1;
            }
            if(!this.$root.visualiser.oven_grill && oven_grill){
              this.$root.visualiser.trim = this.$root.visualiser.trim - 1;
              this.$root.visualiser.interior = this.$root.visualiser.interior - 1;
            }
            this.$root.visualiser.oven_grill = oven_grill
        },
    },
}
</script>
