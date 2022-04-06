/* eslint-disable no-undef */
import { createApp, h } from 'vue'

import App from './App.vue'
import router from './router'
import store from './store'
import * as types from './store/mutations'

const app = createApp({
  render: () => h(App),
  created() {
    this.$store.commit(types.RESET_LOADING_PROGRESS)
    this.$store.dispatch('getAllCategories')
    this.$store.dispatch('getAllPages')
  }
})

app.use(store)
app.use(router)
app.mount('#app')
