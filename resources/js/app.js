/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Componentes de Layout
Vue.component('header-component', require('./components/layout/Header.vue').default);
Vue.component('footer-component', require('./components/layout/Footer.vue').default);

// Componentes de Páginas
Vue.component('index-page', require('./components/pages/Index.vue').default);
Vue.component('create-page', require('./components/pages/Create.vue').default);
Vue.component('edit-page', require('./components/pages/Edit.vue').default);
Vue.component('vote-page', require('./components/pages/Vote.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
