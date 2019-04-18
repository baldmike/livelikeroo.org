import VueRouter from 'vue-router';
import MainApp from './mainApp';
import DonateComponent from './components/DonateComponent.vue'
import EventsComponent from './components/EventsComponent.vue'
import CarePackageComponent from './components/CarePackageComponent.vue'
import AssistanceComponent from './components/AssistanceComponent.vue'
import Website from './views/Website.vue';
import Navbar from './components/Navbar.vue'

export const router = new VueRouter({ 
    mode: 'history',
    
    routes: [ 
        {
            path: '/', 
            component: MainApp,
            children: [
                {
                    path: '',
                    components: {default: Website, header: Navbar},
                    title: 'Website',
                    props: {header: {colorOnScroll: 700}}
                },
                {
                    path: '/donate',
                    components: {default: DonateComponent, header: Navbar},
                    title: 'Donate',
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/events',
                    components: {default: EventsComponent, header: Navbar},
                    title: 'Events',
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/care_package',
                    components: {default: CarePackageComponent, header: Navbar},
                    title: 'CarePackage',
                    // props: {header: {colorOnScroll: 300}}
                },
                {
                    path: '/assistance',
                    components: {default: AssistanceComponent, header: Navbar},
                    title: 'Assistance',
                    props: {header: {colorOnScroll: 800}}
                }
               
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
})