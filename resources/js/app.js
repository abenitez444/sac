/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Swal = require('sweetalert2')

/*import moment from 'moment';
Vue.use(moment);*/


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
Vue.component('badge', require('./components/kanban/badge.vue').default);
Vue.component('task', require('./components/kanban/task.vue').default);
Vue.component('board', require('./components/kanban/board.vue').default);
Vue.component('createList', require('./components/kanban/createList.vue').default);
Vue.component('createTask', require('./components/kanban/createTask.vue').default);
Vue.component('editList', require('./components/kanban/editList.vue').default);
Vue.component('editTask', require('./components/kanban/editTask.vue').default);

Vue.component('employee', require('./components/employee/employee.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

