import VueRouter from 'vue-router';
import MainApp from './mainApp';
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
               
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
})