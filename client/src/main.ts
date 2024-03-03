import './assets/main.css'
import { createApp } from 'vue'
import { Quasar } from 'quasar'
import quasarLang from 'quasar/lang/ja'
import App from './App.vue'
import router from './router'
import { createHead } from '@unhead/vue'
import '@quasar/extras/roboto-font/roboto-font.css'
import '@quasar/extras/material-icons/material-icons.css'
import 'quasar/src/css/index.sass'

const app = createApp(App)
app.use(Quasar, {
  plugins: {},
  lang: quasarLang
})
app.use(createHead())
app.use(router)
app.mount('#app')
