import { shallowMount,createLocalVue } from '@vue/test-utils';
import Vuetify from 'vuetify';
import login from '@/views/Account/LoginAccount';

describe("test login page" , () => {
    let localVue;
    let vuetify;
    let wrapper;

    beforeEach(() => {
        localVue = createLocalVue();
        vuetify = new Vuetify();

    });

    it('test mount component', () => {
        const wrapper = shallowMount(login, {
            localVue,
            vuetify,
        });
    });

    it('test valid input', () => {
        const wrapper = shallowMount(login, {
            localVue,
            vuetify,
        });


    });
});