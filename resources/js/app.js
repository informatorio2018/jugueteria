

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('cliente-component', require('./components/Clientes.vue'));
const app = new Vue({
    el: '#app',
    data:{
        menu : 0,       
    }
});
