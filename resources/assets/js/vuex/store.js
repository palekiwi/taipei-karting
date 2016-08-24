import Vue from 'vue'
import Vuex from 'vuex'
import races from './races/store'
import notifications from './notifications/store'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: true,
  modules: {
    races,
    notifications
  }
})