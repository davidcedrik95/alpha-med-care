// plugins/vuetify.js
import { createVuetify } from 'vuetify'
import { aliases, fa } from 'vuetify/iconsets/fa'
import '@fortawesome/fontawesome-free/css/all.css'

export default createVuetify({
  icons: {
    defaultSet: 'fa',
    aliases,
    sets: {
      fa,
    },
  },
})
