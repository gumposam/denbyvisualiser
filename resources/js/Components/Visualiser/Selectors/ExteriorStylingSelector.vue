<template>
  <div>
    <CheckboxGroup
      v-model="$root.visualiser.exterior.sidebars"
      :options="sidebarsOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.rails"
      :options="railsOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.bike"
      :options="bikeOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.towbar"
      :options="towbarOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.lip"
      :options="lipOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.blackGlossGrills"
      :options="blackGlossGrillsOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.blackBadges"
      :options="blackBadgesOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.spoiler"
      :options="spoilerOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.roof"
      :options="roofOptions"
    />
    <CheckboxGroup
      v-model="$root.visualiser.exterior.solar"
      :options="solarOptions"
    />
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import CheckboxGroup from "./CheckboxGroup";

export default {
    components: {CheckboxGroup},
    computed: {
        sidebarsOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'sidebars')
        },
        railsOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'rails')
        },
        bikeOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'bike')
        },
        towbarOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'towbar')
        },
        lipOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'lip')
        },
        blackGlossGrillsOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'blackGlossGrills')
        },
        blackBadgesOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'blackBadges')
        },
        spoilerOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'spoiler')
        },
        roofOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'roof')
        },
        solarOptions() {
            return options.filter(option => option.type === 'exterior' && option.area === 'solar')
        },
    },
    watch: {
        selected: {
            handler(selectableOptions) {
                const selected = Object.keys(selectableOptions)
                    .map(key => {
                        const selectableOption = selectableOptions[key]

                        if (!selectableOption) {
                            return null
                        }



                        return options.filter(option => option.id === selectableOption)[0] || null
                    })
                    .filter(option => option?.image)

                console.log(selected)

                this.$emit('updated', selected)
            },
            deep: true,
        }
    }
}
</script>
