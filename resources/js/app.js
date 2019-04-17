import Vue from 'vue'
import VueRouter from 'vue-router'
import { router } from './router'
import Auth from './auth.js';
import store from './store'

Vue.config.productionTip = false;

import VueCookie from 'vue-cookie'
import NowUIKit from './plugins/now-ui-kit';


require('./bootstrap')

Vue.use(VueRouter)
Vue.use(VueCookie)
Vue.use(NowUIKit);
Vue.use(require('vue-moment'))

window.Vue = require('vue')
window.auth = new Auth();

Vue.component('fg-input', require('./components/Inputs/formGroupInput.vue'))
Vue.component('main-app', require('./mainApp.vue'))
Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('partner-component', require('./components/PartnerComponent.vue'))

// Vue.component('parallax', require('./components/Parallax.vue'))

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

window.addEventListener('load', function () { 
    const app = new Vue({ 
        el: "#app", 
        template: '<router-view></router-view>',
        router,
        store,
    })
})



