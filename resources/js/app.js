import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import VisualiserLayout from './Layouts/VisualiserLayout'
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import './icons'
import mitt from 'mitt';
import Vue from 'vue'
import Hotjar from 'vue-hotjar'
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import options from "./fixtures/options";
import store from "./store";
const emitter = mitt();
import VueGtag from "vue-gtag";

createInertiaApp({
    resolve: (name) => {
        const page = require(`./Pages/${name}`).default
        page.layout = page.layout || VisualiserLayout
        return page;
    },
    setup({el, App, props, plugin}) {
        const vueApp = createApp({
            data() {
                return {
                    visualiser: {
                        engine: options.find(option => option.area === 'engine' && option.description === 'Highline').id,
                        wheelbase: options.find(option => option.area === 'wheelbase' && option.name === 'SWB').id,
                        horsepower: options.find(option => option.area === 'horsepower' && option.name === '110 BHP').id,
                        motion: null,
                        transmission: options.find(option => option.area === 'transmission' && option.name === 'Manual').id,
                        rearDoor: options.find(option => option.area === 'rearDoor' && option.name === 'Barn Door').id,
                        frontSeat: options.find(option => option.area === 'frontSeat' && option.name === 'Single Passenger Seat').id,
                        paintwork: {
                            top: null,
                            bottom: options.find(option => option.type === 'paintwork' && option.area === 'solid' && option.image === 'candy_white').id,
                        },
                        wheel: options.find(option => option.type === 'wheels' && option.area === '20-inch' && option.name === 'Spectre').id,
                        interior: options.find(option => option.type === 'interior' && option.name === 'White' && option.area === 'gloss' && option.oven_grill === false).id,
                        oven_grill: 0,
                        trim: options.find(option => option.type === 'trim' && option.area === 'default' && option.name === 'Black' && option.oven_grill === false).id,
                        worktop: options.find(option => option.type === 'worktops' && option.name === 'Black Marble').id,
                        floor: options.find(option => option.type === 'floors' && option.name === 'Silver Oak').id,
                        upholstery: options.find(option => option.type === 'upholstery' && option.name === 'Startline Grid').id,
                        oven: options.find(option => option.type === 'gadgets' && option.name === 'Tambour Door').id,
                        gadgets: [],
                        exterior: {
                            sidebars: null,
                            rails: null,
                            bike: null,
                            towbar: null,
                            lip: null,
                            blackGlossGrills: null,
                            blackBadges: null,
                            spoiler: null,
                            roof: null,
                            solar: null,
                        },
                        roof: {
                            colour: options.find(option => option.type === 'roof' && option.area === 'colour' && option.name === 'Standard White Roof').id,
                            tent: options.find(option => option.type === 'roof' && option.area === 'tent' && option.name === 'Standard Tent').id,
                        }
                    }
                }
            },
            render: () => h(App, props)
        })
            .component('font-awesome-icon', FontAwesomeIcon)
            .use(plugin)
        vueApp.config.globalProperties.emitter = emitter;
        vueApp.use(store)
        vueApp.use(Hotjar, {
            id: '3322142',
        })
        .use(VueGtag, {
            config: { id: "G-E1L6ZD0KR0" },
        })
        vueApp.mount(el)
    },
})
