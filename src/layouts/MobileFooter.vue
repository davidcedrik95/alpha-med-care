<template>
  <footer v-if="showFooter" class="mobile-footer" :key="footerKey">
    <div class="footer-sections">
      <div class="footer-section" v-for="section in sections" :key="section.key">
        <button class="section-header" @click="toggleSection(section.key)">
          <h3>{{ $t(section.title) }}</h3>
          <span class="toggle-icon">{{ isOpen(section.key) ? '−' : '+' }}</span>
        </button>
        <div class="section-content" v-if="isOpen(section.key)">
          <ul v-if="section.links && section.links.length">
            <li v-for="(link, index) in section.links" :key="index">
              <a :href="link.url" :aria-label="$t(link.text)">{{ $t(link.text) }}</a>
            </li>
          </ul>
          
          <div v-if="section.social" class="social-icons">
            <a href="#" :aria-label="$t('social.facebook')"><v-icon>mdi-facebook</v-icon></a>
            <a href="#" :aria-label="$t('social.linkedin')"><v-icon>mdi-linkedin</v-icon></a>
            <a href="#" :aria-label="$t('social.instagram')"><v-icon>mdi-instagram</v-icon></a>
            <a href="#" :aria-label="$t('social.whatsapp')"><v-icon>mdi-whatsapp</v-icon></a>
          </div>
          
          <div v-if="section.payment" class="payment-methods">
            <img src="/images/payment/visa.png" :alt="$t('footer.payment_methods.visa')" loading="lazy">
            <img src="/images/payment/mastercard.png" :alt="$t('footer.payment_methods.mastercard')" loading="lazy">
            <img src="/images/payment/paypal.png" :alt="$t('footer.payment_methods.paypal')" loading="lazy">
            <img src="/images/payment/sepa.png" :alt="$t('footer.payment_methods.sepa')" loading="lazy">
            <img src="/images/payment/sofort.png" :alt="$t('footer.payment_methods.sofort')" loading="lazy">
          </div>
          
          <div v-if="section.shipping" class="shipping-methods">
            <img src="/images/shipping/dhl.png" :alt="$t('footer.shipping.dhl')" loading="lazy">
            <img src="/images/shipping/dpd.png" :alt="$t('footer.shipping.dpd')" loading="lazy">
            <img src="/images/shipping/db_schenk.svg" :alt="$t('footer.shipping.db_schenker')" loading="lazy">
            <img src="/images/shipping/ups.png" :alt="$t('footer.shipping.ups')" loading="lazy">
            <img src="/images/shipping/hermes.png" :alt="$t('footer.shipping.hermes')" loading="lazy">
          </div>
        </div>
      </div>
    </div>

    <div class="mobile-essentials">
      <div class="essentials-group">
        <div class="certifications">
            <img src="/images/certifications/iso-13485.png" :alt="$t('footer.certifications.iso13485')" loading="lazy">
            <img src="/images/certifications/tuv-certified.png" :alt="$t('footer.certifications.tuv')" loading="lazy">
            <img src="/images/certifications/dguv-certified.png" :alt="$t('footer.certifications.dguv')" loading="lazy">
            <img src="/images/certifications/iso-9001.png" :alt="$t('footer.certifications.iso9001')" loading="lazy">
        </div>
        
        <div class="app-download">
          <h4>{{ $t('footer.mobile_app.title') }}</h4>
          <div class="app-buttons">
            <a href="#" :aria-label="$t('footer.mobile_app.app_store')">
              <img src="/images/apps/app-store.png" :alt="$t('footer.mobile_app.app_store')" loading="lazy">
            </a>
            <a href="#" :aria-label="$t('footer.mobile_app.google_play')">
              <img src="/images/apps/google-play.png" :alt="$t('footer.mobile_app.google_play')" loading="lazy">
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="mobile-badges">
      <img src="/images/badges/trusted-shops.png" :alt="$t('footer.badges.trusted_shops')" loading="lazy">
      <img src="/images/badges/safe-shopping.png" :alt="$t('footer.badges.safe_shopping')" loading="lazy">
      <img src="/images/badges/ssl-secured.png" :alt="$t('footer.badges.ssl')" loading="lazy">
    </div>

    <div class="mobile-copyright">
      {{ $t('footer.copyright', { year: new Date().getFullYear(), company: companyName }) }}
    </div>
  </footer>
</template>

<script>
import { ref, watch } from 'vue'
import { useI18n } from 'vue-i18n'

export default {
  props: {
    companyName: {
      type: String,
      default: 'alpha med care GmbH'
    },
    initiallyOpen: {
      type: Array,
      default: () => ['information']
    }
  },
  setup(props) {
    const { locale } = useI18n()
    const openSections = ref(props.initiallyOpen)
    const footerKey = ref(0)
    const showFooter = ref(true)

    watch(locale, () => {
      // Force le re-rendu du composant
      showFooter.value = false
      footerKey.value++
      setTimeout(() => showFooter.value = true, 50)
    })

    const sections = ref([
      {
        key: 'company',
        title: 'footer.sections.company.title',
        links: [
          { text: 'footer.sections.company.about', url: '/about' },
          { text: 'footer.sections.company.career', url: '/careers' },
          { text: 'footer.sections.company.team', url: '/team' },
          { text: 'footer.sections.company.quality', url: '/quality' },
          { text: 'footer.certifications.title', url: '/certifications' }
        ]
      },
      {
        key: 'services',
        title: 'footer.sections.services.title',
        links: [
          { text: 'footer.sections.services.inspections', url: '/services/inspections' },
          { text: 'footer.sections.services.calibration', url: '/services/calibration' },
          { text: 'footer.sections.services.maintenance', url: '/services/maintenance' }
        ]
      },
      {
        key: 'support',
        title: 'footer.sections.support.title',
        links: [
          { text: 'footer.sections.support.contact', url: '/contact' },
          { text: 'footer.sections.support.faq', url: '/faq' },
          { text: 'footer.sections.support.shipping', url: '/shipping' }
        ]
      },
      {
        key: 'social',
        title: 'footer.sections.social.title',
        social: true
      },
      {
        key: 'payment',
        title: 'footer.payment_methods.title',
        payment: true
      },
      {
        key: 'shipping',
        title: 'footer.shipping.title',
        shipping: true
      }
    ])

    const toggleSection = (key) => {
      if (isOpen(key)) {
        openSections.value = openSections.value.filter(t => t !== key)
      } else {
        openSections.value.push(key)
      }
    }

    const isOpen = (key) => {
      return openSections.value.includes(key)
    }

    return {
      sections,
      openSections,
      footerKey,
      showFooter,
      toggleSection,
      isOpen
    }
  }
}
</script>

<style scoped>
.mobile-footer {
  background-color: #f5f5f5;
  padding: 0 16px 20px;
  font-family: 'Arial', sans-serif;
}

.footer-sections {
  margin-bottom: 24px;
}

.footer-section {
  border-bottom: 1px solid #e0e0e0;
}

.section-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 16px 0;
  background: none;
  border: none;
  text-align: left;
  cursor: pointer;
  transition: background-color 0.2s;
}

.section-header:hover {
  background-color: rgba(0,0,0,0.03);
}

.section-header h3 {
  margin: 0;
  font-size: 16px;
  font-weight: 600;
  color: #333;
}

.toggle-icon {
  font-size: 20px;
  font-weight: bold;
  color: #666;
  margin-left: 10px;
}

.section-content {
  padding: 0 0 16px;
  animation: fadeIn 0.3s ease;
}

.mobile-badges {
  display: flex;
  justify-content: center;
  gap: 15px;
  padding: 20px 0;
  flex-wrap: wrap;
  border-top: 1px solid #e0e0e0;
  margin-top: 10px;
}

.mobile-badges img {
  height: 60px;
  width: auto;
  max-width: 100px;
  object-fit: contain;
}

.mobile-copyright {
  text-align: center;
  padding: 16px 0 0;
  color: #666;
  font-size: 12px;
  border-top: 1px solid #e0e0e0;
  margin-top: 0;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

.section-content ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.section-content li {
  padding: 8px 0;
}

.section-content a {
  color: #555;
  text-decoration: none;
  font-size: 14px;
  display: block;
  padding: 6px 0;
  transition: color 0.2s, transform 0.2s;
}

.section-content a:hover {
  color: #3a7bd5;
  transform: translateX(5px);
}

.social-icons {
  display: flex;
  gap: 20px;
  padding: 16px 0 0;
}

.social-icons a {
  color: #555;
  font-size: 28px;
  transition: color 0.2s, transform 0.2s;
}

.social-icons a:hover {
  color: #3a7bd5;
  transform: scale(1.1);
}

.payment-methods {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  padding: 16px 0 0;
  align-items: center;
}

.payment-methods img {
  height: 25px;
  width: auto;
  max-width: 50px;
  object-fit: contain;
  background: white;
  padding: 4px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  transition: transform 0.2s;
}

.payment-methods img:hover {
  transform: scale(1.1);
}

.shipping-methods {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  padding: 16px 0 0;
  align-items: center;
}

.shipping-methods img {
  height: 30px;
  width: auto;
  max-width: 60px;
  object-fit: contain;
  background: white;
  padding: 4px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  transition: transform 0.2s;
}

.shipping-methods img:hover {
  transform: scale(1.1);
}

.mobile-essentials {
  background: rgba(0,0,0,0.03);
  border-radius: 12px;
  padding: 20px;
  margin: 16px 0;
}

.essentials-group {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.certifications {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.certifications img {
  height: 40px;
  width: auto;
  max-width: 80px;
  background: white;
  padding: 8px;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.app-download {
  text-align: center;
}

.app-download h4 {
  margin-bottom: 12px;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}

.app-buttons {
  display: flex;
  justify-content: center;
  gap: 12px;
}

.app-buttons img {
  height: 40px;
  width: auto;
  max-width: 120px;
  border-radius: 6px;
  transition: transform 0.2s;
}

.app-buttons img:hover {
  transform: scale(1.05);
}

/* Animations */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s, transform 0.3s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}
</style>