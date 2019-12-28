/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import Vuex from 'Vuex';
Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //Vuex

 const store = new Vuex.Store({
   state:{
     item:{}
   },
   mutations:{
     setItem(state,obj){
       state.item = obj;
     }
   }
 });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('top', require('./components/Top.vue'));
Vue.component('card', require('./components/Card.vue').default);
Vue.component('box', require('./components/Box.vue').default);
Vue.component('page', require('./components/Page.vue').default);
Vue.component('table-list', require('./components/TableList.vue').default);
Vue.component('migalhas', require('./components/Migalhas.vue').default);
Vue.component('modal', require('./components/modal/Modal.vue').default);
Vue.component('modallink', require('./components/modal/ModalLink.vue').default);
Vue.component('formulario', require('./components/Formulario.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
});
