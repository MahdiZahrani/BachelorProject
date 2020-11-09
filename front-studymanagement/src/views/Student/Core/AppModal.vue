<template>
  <div class="c-appModal" @keydown.esc="hideModal">
    <div class="c-appModal__overlay" v-if="visible"></div>
    <div class="c-appModal__content" v-if="visible" @click.self="hideModal">
      <div class="c-appModal__innerContent">
        <component :is="component"></component>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
import { mapState, mapMutations } from 'vuex';

export default {
  data() {
    return {
      component: null,
    };
  },
  computed: {
    ...mapState({
      visible: 'modalVisible',
      modalComponent: 'modalComponent',
    }),
  },
  methods: {
    ...mapMutations(['hideModal']),
  },
  watch: {
    modalComponent(componentName) {
      if (!componentName) return;

      Vue.component(componentName, () => import(`../../Modals/${componentName}`));

      this.component = componentName;
    },
  },

}
</script>

<style scoped>

</style>