import { createStore } from 'vuex';

export default createStore({
  state: {
    slide: 0,
  },
  mutations: {
    updateActiveSlide(state, slide) {
      state.slide = slide;
    }
  }
});