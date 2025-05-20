import { createApp } from 'vue'
import App from './App.vue'
//import router from './router'
//import i18n from './i18n'
import { createPinia } from 'pinia';
import { createVuetify } from 'vuetify'

import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// j'ai retirer netlify.tom
const app = createApp(App)

const vuetify = createVuetify({
  components,
  directives,
  icons: {
    defaultSet: 'mdi', // mdi = Material Design Icons
  },
})

app.use(createPinia());
//app.use(router)
app.use(vuetify)
//app.use(i18n)

app.mount('#app')