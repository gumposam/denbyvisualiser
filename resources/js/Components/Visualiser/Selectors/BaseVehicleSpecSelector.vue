<template>
  <div>
    <CheckboxGroup
      v-model="$root.visualiser.engine"
      title="Spec Options"
      :options="specOptions"
    />
    <p class="font-semibold text-gray-600 text-xs mb-6">
      Model Shown = Highline - Startline Trim will vary
    </p>
    <CheckboxGroup
      v-model="$root.visualiser.wheelbase"
      title="Wheelbase"
      :options="wheelbaseOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.horsepower"
      title="Horsepower"
      :options="horsepowerOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.motion"
      class="-mt-2"
      :options="motionOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.transmission"
      title="Transmission"
      :options="transmissionOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.rearDoor"
      title="Rear Door Options"
      :options="rearDoorOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.frontSeat"
      title="Front Seat Option"
      :options="frontSeatOptions"
    />
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import CheckboxGroup from "./CheckboxGroup";

export default {
    components: {CheckboxGroup},
    computed: {
        specOptions() {
            return options.filter(option => option.type === 'base' && option.area === 'engine')
        },
        wheelbaseOptions() {
            return options.filter(option => option.type === 'base' && option.area === 'wheelbase')
        },
        horsepowerOptions() {
            return options.filter(option => option.type === 'base' && option.area === 'horsepower')
        },
        motionOptions() {
            return options.filter(option => option.type === 'base' && option.area === 'motion')
        },
        transmissionOptions() {
            return options.filter(option => option.type === 'base' && option.area === 'transmission')
        },
        rearDoorOptions() {
            return options.filter(option => option.type === 'base' && option.area === 'rearDoor')
        },
        frontSeatOptions(){
            return options.filter(option => option.type === 'base' && option.area === 'frontSeat')
        }
    },
}
</script>
