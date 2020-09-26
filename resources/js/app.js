import MainApp from "./components/MainApp";

require('./bootstrap');

window.Vue = require('vue');


Vue.component('main-app', MainApp);

const app = new Vue({
    el: '#app',
})
