require('./bootstrap');
import VueInstantSearch from 'vue-instantsearch';
import { firestorePlugin } from 'vuefire'
import moment from 'moment'

window.Vue = require('vue');

Vue.use(firestorePlugin);
Vue.use(VueInstantSearch);

window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
};

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
    data: {
        moment: moment
    },
});

// var editor = new FroalaEditor('#editor')
