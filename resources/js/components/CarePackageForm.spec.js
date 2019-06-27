import { mount } from '@vue/test-utils'
import CarePackageForm from './CarePackageForm.vue'

describe('CarePackageForm.vue', () => {
    it('increments counter', () => {
        const wrapper = mount(CarePackageForm);

        expect(wrapper.vm.counter).toBe(0);

        wrapper.find('[jest="increment-button"]').trigger('click')

        expect(wrapper.vm.counter).toBe(1);
    })
})