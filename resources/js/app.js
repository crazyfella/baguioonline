

require('./bootstrap');



window.Vue = require('vue');

import VueRouter from 'vue-router'





import { Form, HasError, AlertError } from 'vform'



window.Form = Form;

Vue.component(HasError.name, HasError)

Vue.component(AlertError.name, AlertError)

import moment from 'moment';

Vue.use(VueRouter)



import VueProgressBar from 'vue-progressbar'



Vue.use(VueProgressBar, {

    color: 'rgb(143, 255, 199)',

    failedColor: 'green',

    height: '2px'

  })



import Swal from 'sweetalert2'

window.Swal = Swal;



const Toast = Swal.mixin({

    toast: true,

    position: 'top-end',

    showConfirmButton: false,

    timer: 3000,

    timerProgressBar: true,

    onOpen: (toast) => {

      toast.addEventListener('mouseenter', Swal.stopTimer)

      toast.addEventListener('mouseleave', Swal.resumeTimer)

    }

  })

  window.Toast = Swal;



import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );



Vue.component('modal', {

    template: '#modal-template'

  })



 window.Fire = new Vue();





import VueNumeric from 'vue-numeric'

Vue.use(VueNumeric)







import Toastr from 'vue-toastr'

Vue.use(Toastr)





Vue.filter('upText', function(text){

    return text.charAt(0).toUpperCase() + text.slice(1)

  });



Vue.filter('myDate', function(text){

    return moment(text).format('MMMM Do YYYY');

  });



Vue.component('pagination', require('laravel-vue-pagination'));





let routes = [
    { path: '/home', component: require('./components/Dashboard.vue').default },

    { path: '/my-account', component: require('./components/Dashboard.vue').default },

    { path: '/dashboard', component: require('./components/Dashboard.vue').default },

    { path: '/accountDetails', component: require('./components/AccountDetails.vue').default },

    { path: '/products', component: require('./components/Products.vue').default },

    { path: '/newProduct', name: 'newProduct', component: require('./components/ProductsNew.vue').default },

    { path: '/updateProduct', name: 'updateroducts', component: require('./components/ProductsUpdate.vue').default },

    { path: '/imageUpload',  name: 'imageUpload', component: require('./components/Images.vue').default },

    { path: '/inbox', component: require('./components/Inbox.vue').default },

    { path: '/readMessage',  name: 'readMessage', component: require('./components/Message.vue').default },



]



Vue.component('example-component', require('./components/ExampleComponent.vue').default);



Vue.component(

    'passport-clients',

    require('./components/passport/Clients.vue').default

);



Vue.component(

    'passport-authorized-clients',

    require('./components/passport/AuthorizedClients.vue').default

);



Vue.component(

    'passport-personal-access-tokens',

    require('./components/passport/PersonalAccessTokens.vue').default

);



const router = new VueRouter({

    routes,


    mode: 'history',


  })



const app = new Vue({

    el: '#app',

    router

});

