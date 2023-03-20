<template>
  <header class="static bg-gradient-to-r from-denbyDarkBlue to-denbyLightBlue px-4 py-4 settings-slider h-full">
    <button 
      class="float-left"
      @click="previous"
    >
      <font-awesome-icon
        class="arrow"
        icon="fa-regular fa-circle-chevron-left"
        size="2xl"
      />  
    </button>
    <div class="w-[calc(100%-6em)] mx-4 overflow-hidden mt-1">
      <!-- 1788px is the total width of the slider -->
      <!-- 134px width of paddings, margins and arrow buttons-->
      <!-- This works by moving the slider only if the selected item has crossed the middle of the screen and only if there are no blank spaces on either side -->
      <div
        :style="{position: 'relative', right: `calc(min(-50vw + 134px + max(50vw - 134px, ${slides[slide.value].relative_position}px), min(1788px - 100vw + 134px, ${slides[slide.value].relative_position}px)))`}"
      >
        <div :class="{'active': slide.value === 0}">
          <button @click="setActiveSlide(0)">
            <font-awesome-icon icon="fa-light fa-engine" />
            Base Vehicle Spec
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />
        </div>
        <div 
          :class="{'active': slide.value === 1}"
        >
          <button @click="setActiveSlide(1)">
            <font-awesome-icon icon="fa-light fa-paint-brush" />
            Paintwork 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />      
        </div>
        <div 
          :class="{'active': slide.value === 2}"
        >
          <button @click="setActiveSlide(2)">
            <font-awesome-icon icon="fa-light fa-tire" />
            Wheel Options 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />      
        </div>
        <div
          :class="{'active': slide.value === 3}"
        >
          <button @click="setActiveSlide(3)">
            <font-awesome-icon icon="fa-light fa-cabinet-filing" />
            Interior Units 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />     
        </div>
        <div
          :class="{'active': slide.value === 4}"
        >
          <button @click="setActiveSlide(4)">
            <font-awesome-icon icon="fa-light fa-spray-can-sparkles" />
            Cabinet Trim 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />      
        </div> 
        <div
          :class="{'active': slide.value === 5}"
        >
          <button @click="setActiveSlide(5)">
            <font-awesome-icon icon="fa-light fa-hat-chef" />
            Worktops 
          </button>

          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />      
        </div>
        <div
          :class="{'active': slide.value === 6}"
        >
          <button @click="setActiveSlide(6)">
            <font-awesome-icon icon="fa-light fa-shoe-prints" />
            Floor Style 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />    
        </div>
        <div
          :class="{'active': slide.value === 7}"
        >
          <button @click="setActiveSlide(7)">
            <font-awesome-icon icon="fa-light fa-seat-airline" />
            Upholstery Style 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />     
        </div>  
        <div
          :class="{'active': slide.value === 8}"
        >
          <button @click="setActiveSlide(8)">
            <font-awesome-icon icon="fa-light fa-tv-retro" />
            Gadgets & Gizmos 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />   
        </div> 
        <div
          :class="{'active': slide.value === 9}"
        >
          <button @click="setActiveSlide(9)">
            <font-awesome-icon icon="fa-light fa-camera-retro" />
            Exterior Styling 
          </button>
          <font-awesome-icon
            class="pl-2 pr-4"
            icon="fa-light fa-chevron-right"
          />      
        </div>   
        <div 
          :class="{'active': slide.value === 10}"
        > 
          <button @click="setActiveSlide(10)">
            <font-awesome-icon icon="fa-light fa-tv-retro" />
            Roof Options
          </button>
        </div>
      </div>
    </div>
    <button
      class="float-right"
      @click="next"
    >
      <font-awesome-icon
        class="arrow"
        icon="fa-regular fa-circle-chevron-right"
        size="2xl"
      />  
    </button>
  </header>
  <div class="flex visualiser-container flex-col flex-auto xl:flex-row flex-grow">
    <VisualiserDisplay
      :options="selectedOptions"
      @height="updateHeight"
    />
    <div
      class="xl:w-[550px] bg-white pl-4 pt-4"
    >
      <div
        class="justify-between w-full p-4 flex"
      >
        <div class="flex items-center text-center justify-center">
          <font-awesome-icon
            class="text-xl mr-2"
            :icon="slides[slide.value].icon"
          />
          <p
            class="text-lg"
            v-text="slides[slide.value].name"
          />
        </div>
      </div>

      <div
        class="p-4 xl:overflow-y-scroll options-container"
      >
        <BaseVehicleSpecSelector
          :class="{'hidden': slide.value !== 0}"
        />
        <PaintworkSelector
          :class="{'hidden': slide.value !== 1}"
          @updated="updatePaintwork"
        />
        <WheelSelector
          :class="{'hidden': slide.value !== 2}"
          @updated="updateWheels"
        />
        <InteriorSelector
          :class="{'hidden': slide.value !== 3}"
          @updated="updateInterior"
        />
        <CabinetTrimSelector
          :class="{'hidden': slide.value !== 4}"
          @updated="updateTrim"
        />
        <WorktopSelector
          :class="{'hidden': slide.value !== 5}"
          @updated="updateWorktop"
        />
        <FloorStyleSelector
          :class="{'hidden': slide.value !== 6}"
          @updated="updateFloorStyle"
        />
        <UpholsteryStyleSelector
          :class="{'hidden': slide.value !== 7}"
          @updated="updateUpholstery"
        />
        <GadgetSelector
          :class="{'hidden': slide.value !== 8}"
          @updated="updateGadgets"
        />
        <ExteriorStylingSelector
          :class="{'hidden': slide.value !== 9}"
          @updated="updateExteriorStyline"
        />
        <RoofOptionsSelector
          :class="{'hidden': slide.value !== 10}"
          @updated="updateRoofOptions"
        />
      </div>
    </div>
  </div>
</template>
<script>
import BaseVehicleSpecSelector from './Selectors/BaseVehicleSpecSelector'
import PaintworkSelector from './Selectors/PaintworkSelector'
import WheelSelector from './Selectors/WheelSelector'
import InteriorSelector from './Selectors/InteriorSelector'
import CabinetTrimSelector from './Selectors/CabinetTrimSelector'
import VisualiserDisplay from './VisualiserDisplay'
import WorktopSelector from "./Selectors/WorktopSelector";
import FloorStyleSelector from "./Selectors/FloorStyleSelector";
import UpholsteryStyleSelector from "./Selectors/UpholsteryStyleSelector";
import GadgetSelector from "./Selectors/GadgetSelector";
import ExteriorStylingSelector from "./Selectors/ExteriorStylingSelector";
import RoofOptionsSelector from "./Selectors/RoofOptionsSelector";

import {
    faCabinetFiling,
    faCameraRetro,
    faEngine,
    faHatChef,
    faPaintBrush,
    faSeatAirline,
    faShoePrints,
    faSprayCanSparkles,
    faTire,
    faTvRetro,
} from "@fortawesome/pro-regular-svg-icons";
import options from "../../fixtures/options";
import {convertVisualiserToOptions} from "../../fixtures/options";
import { useStore } from 'vuex';
import store from '../../store'
import { reactive, watchEffect } from 'vue';

export default {
    components: {
        RoofOptionsSelector,
        GadgetSelector,
        UpholsteryStyleSelector,
        FloorStyleSelector,
        WorktopSelector,
        PaintworkSelector,
        BaseVehicleSpecSelector,
        WheelSelector,
        InteriorSelector,
        CabinetTrimSelector,
        ExteriorStylingSelector,
        VisualiserDisplay,
    },
    setup() {
    const store = useStore();
    const slide = reactive({ value: store.state.slide });

    watchEffect(() => {
        slide.value = store.state.slide;
    });
    return {
      slide,
      updateActiveSlide(s) {
        console.log(slide);
        store.commit('updateActiveSlide', s);
        console.log(slide);
      },
    }
  },
    data() {
        return {
            height: null,
            options: {
                paintwork: {
                    top: null,
                    bottom: options.find(option => option.id === 22),
                },
                wheels: options.find(option => option.id === 46),
                interior: options.find(option => option.id === 63),
                trim: options.find(option => option.id === 73),
                worktop: options.find(option => option.id === 81),
                floor: options.find(option => option.id === 91),
                upholstery: options.find(option => option.id === 98),
                gadgets: [],
                exterior: [],
                roof: [
                    options.find(option => option.id === 139),
                    options.find(option => option.id === 164),
                ],
            },
            slides: [
                {name: 'Base Vehicle Spec', icon: faEngine, relative_position: 0},
                {name: 'Paintwork', icon: faPaintBrush, relative_position: 173},
                {name: 'Wheel Options', icon: faTire, relative_position: 328},
                {name: 'Interior Units', icon: faCabinetFiling, relative_position: 491},
                {name: 'Cabinet Trim', icon: faSprayCanSparkles, relative_position: 649},
                {name: 'Worktops', icon: faHatChef, relative_position: 799},
                {name: 'Floor Style', icon: faShoePrints, relative_position: 934},
                {name: 'Upholstery Style', icon: faSeatAirline, relative_position: 1099},
                {name: 'Gadgets & Gizmos', icon: faTvRetro, relative_position: 1283},
                {name: 'Exterior Styling', icon: faCameraRetro, relative_position: 1480},
                {name: 'Roof Options', icon: faTvRetro, relative_position: 1631},
            ]
        }
    },
    computed: {
        last() {
            return this.slide.value === (this.slides.length - 1)
        },
        first() {
            return this.slide.value === 0
        },
        selectedOptions() {
            return convertVisualiserToOptions(this.$root.visualiser)
        },
    },
    methods: {
        next() {
            if (this.last) {
              return
            }
            this.updateActiveSlide(this.slide.value + 1);
        },
        previous() {
            if (this.first) {
              return
            }

            this.updateActiveSlide(this.slide.value - 1);
        },
        setActiveSlide(index) {
            this.updateActiveSlide(index);
        },
        updatePaintwork(options) {
            this.options.paintwork = options
        },
        updateWheels(options) {
            this.options.wheels = options
        },
        updateInterior(options) {
            this.options.interior = options
        },
        updateTrim(options) {
            this.options.trim = options
        },
        updateWorktop(options) {
            this.options.worktop = options
        },
        updateFloorStyle(options) {
            this.options.floor = options
        },
        updateUpholstery(options) {
            this.options.upholstery = options
        },
        updateGadgets(options) {
            this.options.gadgets = options
        },
        updateExteriorStyline(options) {
            this.options.exterior = options
        },
        updateRoofOptions(options) {
            this.options.roof = options
        },
        updateHeight(height) {
            this.height = height
        },
        openQuote() {
            this.emitter.emit('quote')
        }
    }
}
</script>
