<template>
  <div>
    <h2 class="text-3xl font-bold pb-4 inline-block tracking-wide border-b-4 mb-4 border-b-white pr-6">
      Contact Details
    </h2>

    <form
      class="w-full max-w-lg"
      @submit.prevent="save"
    >
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-1/2 mb-6 md:mb-0 pr-4">
          <label class="text-white w-full text-xs font-bold block py-4 tracking-wide">First Name</label>
          <input
            v-model="first_name"
            type="text"
            class="w-full p-4 rounded-lg placeholder-placeholder text-xs text-gray-800"
            placeholder="Enter your first name"
          >
          <p
            v-if="errors?.first_name"
            class="text-white text-xs italic mt-2"
            v-text="errors.first_name"
          />
        </div>
        <div class="w-1/2 float-right pl-4">
          <label class="text-white w-full text-xs font-bold block py-4 tracking-wide">Last Name</label>
          <input
            v-model="last_name"
            type="text"
            class="w-full p-4 rounded-lg placeholder-placeholder text-xs text-gray-800"
            placeholder="Enter your last name"
          >
          <p
            v-if="errors?.last_name"
            class="text-white text-xs italic mt-2"
            v-text="errors.last_name"
          />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6 mt-4">
        <label class="text-white w-full text-xs font-bold block py-4 tracking-wide">Email Address</label>
        <input
          v-model="email"
          type="email"
          class="w-full p-4 rounded-lg placeholder-placeholder text-xs text-gray-800 min-w-[230px]"
          placeholder="Enter your email"
        >
        <p
          v-if="errors?.email"
          class="text-white text-xs italic mt-2"
          v-text="errors.email"
        />
      </div>
      <div class="flex flex-wrap -mx-3 mb-6 mt-4">
        <label class="text-white w-full text-xs font-bold block py-4 tracking-wide">Contact Number</label>
        <input
          v-model="contact_number"
          type="text"
          class="w-full p-4 rounded-lg placeholder-placeholder text-xs text-gray-800 min-w-[230px]"
          placeholder="optional"
        >
        <p
          v-if="errors?.contact_number"
          class="text-white text-xs italic mt-2"
          v-text="errors.contact_number"
        />
      </div>
      <div class="flex flex-wrap -mx-3 mb-6 mt-4">
        <label class="text-white w-full text-xs font-bold block py-4 tracking-wide">Additional Information</label>
        <textarea
          v-model="additional_information"
          rows="4"
          type="text"
          class="w-full p-4 rounded-lg placeholder-placeholder text-xs text-gray-800 min-w-[230px]"
          placeholder="Let us know if you have any other requests or requirements"
        />
        <p
          v-if="errors?.additional_information"
          class="text-white text-xs italic mt-2"
          v-text="errors.additional_information"
        />
      </div>

      <div class="mt-4">
        <label class="text-white w-full text-xs font-bold block py-4 tracking-wide">Would you like to join our
          newsletter?</label>

        <div class="flex items-center">
          <p class="text-white text-xs font-bold tracking-wide">
            Yes
          </p>
          <HeadlessSwitch
            v-model="newsletterDisabled"
            :class="newsletterDisabled ? 'bg-slate-300' : 'bg-green-400'"
            class="mx-4 relative inline-flex h-[38px] w-[74px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
          >
            <span class="sr-only">Use setting</span>
            <span
              aria-hidden="true"
              :class="newsletterDisabled ? 'translate-x-9' : 'translate-x-0'"
              class="pointer-events-none inline-block ml-[3px] mt-[3px] h-[28px] w-[28px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
            />
          </HeadlessSwitch>
          <p class="text-white text-xs font-bold tracking-wide">
            Nah
          </p>
        </div>


        <button
          type="submit"
          class="px-6 font-bold py-2 mt-12 text-xl border border-4 bg-denbyFormButton border-white rounded-full"
          @click="$emit('next')"
        >
          Get Quote
          <font-awesome-icon
            class="ml-2"
            :icon="['far', 'circle-chevron-right']"
          />
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import {Switch} from "@headlessui/vue";
import options from "../../fixtures/options";

export default {
    components: {
        HeadlessSwitch: Switch,
    },
    emits: ['next', 'requested'],
    data() {
        return {
            first_name: null,
            last_name: null,
            email: null,
            contact_number: null,
            additional_information: null,
            newsletterDisabled: true,
            errors: {},
            sent: false,
        }
    },
    computed: {
        newsletterEnabled() {
            return !this.newsletterDisabled
        },
        visualiser() {
            const visualiser = this.$root.visualiser

            return {
                engine: options.find(option => option.id === visualiser.engine),
                wheelbase: options.find(option => option.id === visualiser.wheelbase),
                horsepower: options.find(option => option.id === visualiser.horsepower),
                motion: options.find(option => option.id === visualiser.motion),
                transmission: options.find(option => option.id === visualiser.transmission),
                rearDoor: options.find(option => option.id === visualiser.rearDoor),
                paintwork: {
                    top: options.find(option => option.id === visualiser.paintwork.top),
                    bottom: options.find(option => option.id === visualiser.paintwork.bottom),
                },
                wheel: options.find(option => option.id === visualiser.wheel),
                interior: options.find(option => option.id === visualiser.interior),
                oven_grill: this.$root.visualiser.oven_grill || undefined,
                trim: options.find(option => option.id === visualiser.trim),
                worktop: options.find(option => option.id === visualiser.worktop),
                floor: options.find(option => option.id === visualiser.floor),
                upholstery: options.find(option => option.id === visualiser.upholstery),
                oven: options.find(option => option.id === visualiser.oven),
                gadgets: visualiser.gadgets.map(gadget => options.find(option => option.id === gadget)),
                exterior: {
                    sidebars: options.find(option => option.id === visualiser.exterior.sidebars),
                    rails: options.find(option => option.id === visualiser.exterior.rails),
                    bike: options.find(option => option.id === visualiser.exterior.bike),
                    towbar: options.find(option => option.id === visualiser.exterior.towbar),
                    lip: options.find(option => option.id === visualiser.exterior.lip),
                    blackGlossGrills: options.find(option => option.id === visualiser.exterior.blackGlossGrills),
                    blackBadges: options.find(option => option.id === visualiser.exterior.blackBadges),
                    spoiler: options.find(option => option.id === visualiser.exterior.spoiler),
                    roof: options.find(option => option.id === visualiser.exterior.roof),
                    solar: options.find(option => option.id === visualiser.exterior.solar),
                },
                roof: {
                    colour: options.find(option => option.id === visualiser.roof.colour),
                    tent: options.find(option => option.id === visualiser.roof.tent),
                }
            }
        },
    },
    methods: {
        save() {
            this.errors = {}

            const onError = (errors) => {
                this.errors = errors
            }

            const onSuccess = () => {
                this.$emit('requested')
            }

            this.$inertia.post('/quote', {
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
                contact_number: this.contact_number,
                additional_information: this.additional_information,
                newsletter: this.newsletterEnabled,
                visualiser: this.visualiser,
            }, {onError, onSuccess})
        }
    }
}
</script>
