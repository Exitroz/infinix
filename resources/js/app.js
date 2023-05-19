require('./bootstrap');
window.moment = require('moment');

//window.Vue = require('vue').default;

import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

const options = {
    confirmButtonColor: '#ffa800'
};

Vue.use(VueSweetalert2, options)

//Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr("content");

Vue.filter('capitalize', function(value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

Vue.filter('formatPrice', function(value) {
    let val = (value / 1).toFixed(2).replace(',', '.')
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
})

Vue.filter('formatCoinPrice', function(value) {
    let val = (value / 1).toFixed(8).replace(',', '.')
    return val.toString()
})

Vue.filter('formatDate', function(value) {
    return moment(value).format('MMMM Do, YYYY')
});

Vue.filter('ucwords', function(value) {
    if (!value) return ''
    value = value.toString()
    value = value.split(" ");
    for (var i = 0; i < value.length; i++) {
        value[i] = value[i].charAt(0).toUpperCase() + value[i].slice(1)
    }
    value = value.join(" ")
    return value
})

Vue.filter('uppercase', function(value) {
    if (!value) return ''
    value = value.toString()
    return value.toUpperCase()
})

Vue.filter('str_pad', function(v) {
    if (!v) return ''

    v = v.toString().padStart(8, "0")

    return v
})

Vue.component('dashboard', require('./components/Dashboard.vue').default)
Vue.component('portfolio', require('./components/Portfolio.vue').default)
Vue.component('pricing', require('./components/Pricing.vue').default)

const app = new Vue({
    el: '#app'
});