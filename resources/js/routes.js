import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Homepage from './pages/Homepage';
import BlogComponent from './pages/BlogComponent';
import WhoWeAreComponent from './pages/WhoWeAreComponent';
import ContactsComponent from './pages/ContactsComponent';
import NotFoundComponent from './pages/NotFoundComponent';


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Homepage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComponent
        },
        {
            path: '/who-we-are',
            name: 'who-we-are',
            component: WhoWeAreComponent
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsComponent
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFoundComponent
        }
    ]
})

export default router;