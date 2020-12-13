require('./bootstrap');
import VueInstantSearch from 'vue-instantsearch';
import moment from 'moment'

// import VueQuillEditor from 'vue-quill-editor'

window.Vue = require('vue');

Vue.use(VueInstantSearch);
// Vue.use(VueQuillEditor, /* { default global options } */)

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
