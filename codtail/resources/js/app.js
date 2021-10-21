require('./bootstrap');

window.Vue = require('vue').default;
import router from './router';

Vue.component('search-bar', require('./components/searchBar.vue').default);
Vue.component('cocktails', require('./components/cocktails.vue').default);
Vue.component('note_data', require('./components/detailsCocktail.vue').default);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import Form from './Form'
window.Form = Form
import Vue from 'vue';

Vue.component('users-component', require('./components/Users/UsersComponent.vue').default);
Vue.component('recipe-component', require('./components/RecipeComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
