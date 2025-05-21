import { createI18n } from 'vue-i18n'
import en from './locales/en.json'
import de from './locales/de.json'
import fr from './locales/fr.json'

const messages = {
  en,
  de,
  fr
}

const savedLocale = localStorage.getItem('userLocale') || 'de'

const i18n = createI18n({
  legacy: false,
  locale: savedLocale,
  fallbackLocale: 'en',
  messages,
  silentTranslationWarn: true // Optionnel: supprime les avertissements pour les traductions manquantes
})

export default i18n