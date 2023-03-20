<template>
  <div>
    <PaintworkGroup
      title="Solid Colours"
      :options="solidOptions"
      :selected="$root.visualiser.paintwork.bottom"
      @click="clicked"
    />
    <PaintworkGroup
      title="Metallic Colours"
      :options="metallicOptions"
      :selected="$root.visualiser.paintwork.bottom"
      @click="clicked"
    />
    <PaintworkGroup
      title="Two Tone (Top)"
      :options="twoToneTopOptions"
      :selected="$root.visualiser.paintwork.top"
      @click="clicked"
    />
    <PaintworkGroup
      title="Two Tone (Bottom)"
      :options="twoToneBottomOptions"
      :selected="$root.visualiser.paintwork.bottom"
      @click="clicked"
    />

    <p class="text-[#344154] text-sm my-3">
      Please note, colours may vary from illustration.
    </p>
  </div>
</template>
<script>
import options from "../../../fixtures/options";
import PaintworkGroup from "./PaintworkGroup";

export default {
    components: {PaintworkGroup},
    emits: ['updated'],
    computed: {
        solidOptions() {
            return options.filter(option => option.type === 'paintwork' && option.area === 'solid')
        },
        metallicOptions() {
            return options.filter(option => option.type === 'paintwork' && option.area === 'metallic')
        },
        twoToneTopOptions() {
            return options.filter(option => option.type === 'paintwork' && option.area === 'two-tone-top')
        },
        twoToneBottomOptions() {
            return options.filter(option => option.type === 'paintwork' && option.area === 'two-tone-bottom')
        },
    },
    watch: {
        selected() {
            const bottom = options.filter(option => option.id === this.selected)[0] || null

            this.$emit('updated', {
                top: null,
                bottom,
            })
        },
        twoTone: {
            handler() {
                const top = options.filter(option => option.id === this.twoTone.top)[0] || null
                const bottom = options.filter(option => option.id === this.twoTone.bottom)[0] || null

                this.$emit('updated', {top, bottom})
            },
            deep: true,
        }
    },
    methods: {
        clicked(option) {
            if (!option.isTwoTone()) {
                this.$root.visualiser.paintwork.top = null
            }

            if (option.isTwoToneTop()) {
                this.$root.visualiser.paintwork.top = option.id

                const bottom = options.find(found => found.id === this.$root.visualiser.paintwork.bottom)

                if (!bottom || !bottom.isTwoTone()) {
                    this.$root.visualiser.paintwork.bottom = this.twoToneBottomOptions[0].id
                }

                return
            }

            this.$root.visualiser.paintwork.bottom = option.id
        },
    }
}
</script>
