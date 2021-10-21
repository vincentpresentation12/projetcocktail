require('./bootstrap');

//window.Vue = require('vue').default;
import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);
import detailsCocktail from "./components/detailsCocktail.vue";
import cocktails from "./components/cocktails.vue";
import search from'./components/searchBar.vue';

const routes = [
    {
        path: '/',
        component: cocktails,search
    },
    {
        path: '/detailsCocktail/:idcock',
        component: detailsCocktail
    }
];
export default new Router ({
    mode: 'history',
    routes
})