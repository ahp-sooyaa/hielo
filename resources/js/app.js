require('./bootstrap');

import { firestorePlugin } from 'vuefire'

window.Vue = require('vue');

Vue.use(firestorePlugin);

window.events = new Vue();

window.flash = function(message){
    window.events.$emit('flash', message);
};

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
});

// var editor = new FroalaEditor('#editor')
