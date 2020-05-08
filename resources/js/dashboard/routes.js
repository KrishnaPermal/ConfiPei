import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from './views/Dashboard.vue';
import Home from "./views/Home.vue";
import Login from "./login/Login.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'home',
            component: Home,
        },

        {
            path: '/login',
            name: 'login',
            component: Login,
        },

        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
        },
    ]
})

export default router;

