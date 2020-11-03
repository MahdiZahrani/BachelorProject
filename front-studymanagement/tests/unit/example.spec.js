import { shallowMount,createLocalVue } from '@vue/test-utils';
import Vuetify from 'vuetify';
import HelloWorld from '@/components/HelloWorld.vue';

describe('HelloWorld.vue', () => {
  let localVue;
  let vuetify;
  let wrapper;

  beforeEach(() => {
    localVue = createLocalVue();
    vuetify = new Vuetify();

  });

  it('renders props.msg when passed', () => {
    const msg = 'new message';
    const wrapper = shallowMount(HelloWorld, {
        localVue,
        vuetify,
    });
  });
});
