// import Vue from 'vue'
// import BootstrapVue from 'bootstrap-vue'

// import 'bootstrap-vue/dist/bootstrap-vue.css'
// import 'bootstrap/dist/css/bootstrap.css'


window.$ = window.jQuery = require('jquery');
require('popper.js')
require('bootstrap');
require('./slugify')
require('./selectize')
require('./app-selectize')

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
// require('bootstrap');
