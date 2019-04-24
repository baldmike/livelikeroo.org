import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VueRouter from 'vue-router'
import { router } from './router'
import Auth from './auth.js';
import store from './store'

import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false;

import VueCookie from 'vue-cookie'
import NowUIKit from './plugins/now-ui-kit';


require('./bootstrap')

Vue.use(BootstrapVue)
Vue.use(VueRouter)
Vue.use(VueCookie)
Vue.use(NowUIKit);
Vue.use(require('vue-moment'))

window.Vue = require('vue')
window.auth = new Auth();

Vue.component('main-app', require('./mainApp.vue'))

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



