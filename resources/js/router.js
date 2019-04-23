import VueRouter from 'vue-router';
import MainApp from './mainApp';
import DonateComponent from './components/DonateComponent.vue'
import EventsComponent from './components/EventsComponent.vue'
import CarePackageComponent from './components/CarePackageComponent.vue'
import AssistanceComponent from './components/AssistanceComponent.vue'
import Website from './views/Website.vue';
import Navbar from './components/Navbar.vue'
import Footer from './components/FooterComponent.vue'
import FaqComponent from './components/FaqComponent.vue'
import PrivacyComponent from './components/PrivacyComponent.vue'
import ContactComponent from './components/ContactComponent.vue'
import DashboardComponent from './components/DashboardComponent.vue'
import BookerComponent from './components/BookerComponent.vue'
import CappyComponent from './components/CappyComponent.vue'

export const router = new VueRouter({ 
    mode: 'history',
    
    routes: [ 
        {
            path: '/', 
            component: MainApp,
            children: [
                {
                    path: '',
                    components: {default: Website, header: Navbar, footer: Footer},
                    title: 'Website',
                    props: {header: {colorOnScroll: 700}}
                },
                {
                    path: '/donate',
                    components: {default: DonateComponent, header: Navbar, footer: Footer},
                    title: 'Donate',
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/events',
                    components: {default: EventsComponent, header: Navbar, footer: Footer},
                    title: 'Events',
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/care_package',
                    components: {default: CarePackageComponent, header: Navbar, footer: Footer},
                    title: 'CarePackage',
                    // props: {header: {colorOnScroll: 300}}
                },
                {
                    path: '/assistance',
                    components: {default: AssistanceComponent, header: Navbar, footer: Footer},
                    title: 'Assistance',
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/faq',
                    components: {default: FaqComponent, header: Navbar, footer: Footer},
                    title: 'Faq',
                },
                {
                    path: '/privacy',
                    components: {default: PrivacyComponent, header: Navbar, footer: Footer},
                    title: 'Privacy',   
                },
                {
                    path: '/contact',
                    components: {default: ContactComponent, header: Navbar, footer: Footer},
                    title: 'Contact',   
                    props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/booker',
                    components: {default: BookerComponent, header: Navbar, footer: Footer},
                    title: 'BookerFund',
                    // props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/cappy',
                    components: {default: CappyComponent, header: Navbar, footer: Footer},
                    title: 'CappyFund',
                    // props: {header: {colorOnScroll: 800}}
                },
                {
                    path: '/dashboard',
                    components: {default: DashboardComponent, header: Navbar, footer: Footer},
                    title: 'Dashboard',   
                    props: {header: {colorOnScroll: 800}},
                    beforeEnter: (to, from, next) => {
                        if (!window.auth.check()) {
                            next({
                                path: '/'
                            });
                            return;
                        }
                        next();
                    },
                }
               
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
})