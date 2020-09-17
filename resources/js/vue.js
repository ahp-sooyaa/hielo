import Chart from './components/Chart'
import UserNotification from './components/UserNotification'
import Vue from 'vue'

Vue.config.productionTip = false

window.Event = new Vue()

new Vue({
  el: '#app',

  components: {
      Chart,
      UserNotification
  }
})