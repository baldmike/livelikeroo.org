import VueRouter from 'vue-router';
import MainApp from './mainApp';
import DonateComponent from './components/DonateComponent.vue'
import EventsComponent from './components/EventsComponent.vue'
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
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/donate',
                    components: {default: DonateComponent, header: Navbar},
                    title: 'Donate',
                },
                {
                    path: '/events',
                    components: {default: EventsComponent, header: Navbar},
                    title: 'Events'
                }
               
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
})