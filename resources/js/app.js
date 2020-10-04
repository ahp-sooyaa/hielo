require('./bootstrap');
import VueInstantSearch from 'vue-instantsearch';
import { firestorePlugin } from 'vuefire'
import moment from 'moment'
import VueRouter from 'vue-router'

window.Vue = require('vue');

Vue.use(firestorePlugin);
Vue.use(VueInstantSearch);
Vue.use(VueRouter)

window.events = new Vue();

window.flash = function(message){
    window.events.$emit('flash', message);
};
    
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/search', component: require('./components/PostsSearch.vue').default },
        { path: '/search/tags', component: require('./components/TagsSearch.vue').default },
        { path: '/search/people', component: require('./components/PeopleSearch.vue').default }
    ]
})

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
    data: {
        moment: moment
    },
    router
});

// var editor = new FroalaEditor('#editor')
