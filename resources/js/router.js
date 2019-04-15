import VueRouter from 'vue-router';
import MainApp from './mainApp';
import ExampleComponent from './components/ExampleComponent.vue';

export const router = new VueRouter({ 
    mode: 'history',
    
    routes: [ 
        {
            path: '/', 
            component: MainApp,
            children: [
                {
                    path: '',
                    components: {default: ExampleComponent},
                    title: 'Example',
                    // props: {header: {colorOnScroll: 800}}
                },
               
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
})