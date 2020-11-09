import Vue from 'vue';
import Vuex from 'vuex';
import auth from "./auth";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    modalVisible: false,
    modalComponent: null,
  },
  mutations: {
    showModal(state,componentName){
      state.modalVisible = true;
      state.modalComponent = componentName;
    },
    hideModal(state) {
      state.modalVisible = false;
    }
  },
  actions: {
  },
  modules: {
    auth
  },
});
