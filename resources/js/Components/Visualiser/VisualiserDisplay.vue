<template>
  <div
    id="visualiser-display"
    class="relative w-full items-center flex  min-h-[200px]"
    :class="{'xl:overflow-hidden bg-visualiser': !imageOnly}"
  >
    <div
      v-if="loading"
      class="absolute top-0 left-0 right-0 bottom-0 bg-sky-50 opacity-75 h-full w-full flex items-center justify-center"
    >
      <font-awesome-icon
        class="text-denbyOrange text-5xl"
        icon="fa-solid fa-spinner"
        spin
      />
    </div>
    <img
      class="w-11/12 pl-[14%]"
      :src="imageUrl"
      @load="load"
    >
  </div>
</template>
<script>
export default {
    props: {
        imageOnly: {
            required: false,
            type: Boolean,
            default: false,
        },
        share: {
            required: false,
            type: Boolean,
            default: false,
        },
        options: {
            required: true,
            type: Array,
        }
    },
    data() {
        return {
            loading: true,
        }
    },
    computed: {
        imageUrl() {
            const search = new URLSearchParams({})
            const options = {
                options: this.options.map(option => option.id)
            }

            options.options.forEach((option, index) => {
                search.set(`options[${index}]`, option)
            })

            return '/campervan?' + search.toString()

        }
    },
    watch: {
        imageUrl() {
            this.loading = true
        }
    },
    methods: {
        load() {
            this.loading = false
        }
    },
}
</script>
