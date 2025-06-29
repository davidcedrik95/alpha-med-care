<template>
  <footer class="mobile-footer">
    <div class="footer-sections">
      <div class="footer-section" v-for="section in sections" :key="section.key">
        <button class="section-header" @click="toggleSection(section.key)">
          <h3>{{ section.title }}</h3>
          <span class="toggle-icon">{{ isOpen(section.key) ? '−' : '+' }}</span>
        </button>
        <div class="section-content" v-if="isOpen(section.key)">
          <ul v-if="section.links && section.links.length">
            <li v-for="(link, index) in section.links" :key="index">
              <a :href="link.url" :aria-label="link.text">{{ link.text }}</a>
            </li>
          </ul>
          
          <div v-if="section.social" class="social-icons">
            <a href="#" aria-label="Facebook"><i class="mdi mdi-facebook"></i></a>
            <a href="#" aria-label="Twitter"><i class="mdi mdi-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="mdi mdi-instagram"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="mdi mdi-linkedin"></i></a>
            <a href="#" aria-label="YouTube"><i class="mdi mdi-youtube"></i></a>
          </div>
          
          <div v-if="section.payment" class="payment-methods">
            <img src="/images/payment/visa.png" alt="Visa" loading="lazy">
            <img src="/images/payment/mastercard.png" alt="Mastercard" loading="lazy">
            <img src="/images/payment/paypal.png" alt="PayPal" loading="lazy">
            <img src="/images/payment/sepa.png" alt="SEPA-Lastschrift" loading="lazy">
            <img src="/images/payment/sofort.png" alt="Sofortüberweisung" loading="lazy">
            <img src="/images/payment/klarna.png" alt="Klarna" loading="lazy">
          </div>
          
          <div v-if="section.shipping" class="shipping-methods">
            <img src="/images/shipping/dhl.png" alt="DHL" loading="lazy">
            <img src="/images/shipping/dpd.png" alt="DPD" loading="lazy">
            <img src="/images/shipping/hermes.png" alt="Hermes" loading="lazy">
            <img src="/images/shipping/ups.png" alt="UPS" loading="lazy">
            <img src="/images/shipping/db_schenk.svg" alt="DB Schenker" loading="lazy">
          </div>

          <div v-if="section.opening" class="opening-hours">
            <p>{{ $t('footer.opening_hours.weekdays') }}</p>
            <p>{{ $t('footer.opening_hours.saturday') }}</p>
            <p>{{ $t('footer.opening_hours.emergency') }}</p>
          </div>

          <div v-if="section.newsletter" class="newsletter-form">
            <input type="email" :placeholder="$t('footer.newsletter.placeholder')" :aria-label="$t('footer.newsletter.placeholder')">
            <button class="newsletter-button">{{ $t('footer.newsletter.subscribe') }}</button>
            <p class="newsletter-note">{{ $t('footer.newsletter.privacy_note') }}</p>
          </div>
          
          <!-- Nouveau bloc pour les certifications -->
          <div v-if="section.certifications" class="certifications">
            <img src="/images/certifications/iso-13485.png" :alt="$t('footer.certifications.iso13485')" loading="lazy">
            <img src="/images/certifications/tuv-certified.png" :alt="$t('footer.certifications.tuv')" loading="lazy">
            <img src="/images/certifications/dguv-certified.png" :alt="$t('footer.certifications.dguv')" loading="lazy">
            <img src="/images/certifications/trusted-shops.png" :alt="$t('footer.certifications.iso9001')" loading="lazy">
          </div>
        </div>
      </div>
    </div>

    <div class="mobile-essentials">
      <div class="essentials-group">
        <!-- Suppression des certifications de ce bloc -->
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
      <img src="/images/badges/safe-shopping.png" :alt="$t('footer.badges.safe_shopping')" loading="lazy">
      <img src="/images/badges/ssl-secured.png" :alt="$t('footer.badges.ssl')" loading="lazy">
    </div>

    <div class="mobile-copyright">
      {{ $t('footer.copyright', { year: new Date().getFullYear(), company: companyName }) }}
    </div>
  </footer>
</template>

<script>
import { ref, computed } from 'vue'
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
    const { t } = useI18n()
    const openSections = ref(props.initiallyOpen)

    const sections = computed(() => [
      {
        key: 'company',
        title: t('footer.sections.company.title'),
        links: [
          { text: t('footer.sections.company.about'), url: '/about' },
          { text: t('footer.sections.company.career'), url: '/careers' },
          { text: t('footer.sections.company.news'), url: '/news' },
          { text: t('company.details.locations[0]'), url: '/locations' },
          { text: t('footer.sections.company.partners'), url: '/partners' }
        ]
      },
      {
        key: 'environment',
        title: t('footer.sections.environment.title'),
        links: [
          { text: t('footer.sections.environment.protection'), url: '/umweltschutz' },
          { text: t('footer.sections.environment.recycling'), url: '/recycling' },
          { text: t('footer.sections.environment.sustainability'), url: '/nachhaltigkeit' },
          { text: t('footer.sections.environment.battery_disposal'), url: '/altbatterie-entsorgung' },
          { text: t('footer.sections.environment.co2_neutral'), url: '/co2-neutral' }
        ]
      },
      {
        key: 'services',
        title: t('footer.sections.services.title'),
        links: [
          { text: t('menu.categories.inspections'), url: '/inspections' },
          { text: t('menu.categories.calibration'), url: '/calibration' },
          { text: t('menu.categories.maintenance'), url: '/maintenance' },
          { text: t('menu.items.training'), url: '/training' },
          { text: t('menu.categories.consulting'), url: '/consulting' },
          { text: t('menu.items.leasing'), url: '/leasing' }
        ]
      },
      {
        key: 'support',
        title: t('footer.sections.support.title'),
        links: [
          { text: t('menu.contact'), url: '/contact' },
          { text: t('menu.faq'), url: '/faq' },
          { text: t('footer.sections.support.emergency'), url: '/emergency' },
          { text: t('header.phone'), url: '/support-hotline' },
          { text: t('footer.sections.support.live_chat'), url: '/live-chat' },
          { text: t('footer.sections.support.service_center'), url: '/service-center' }
        ]
      },
      {
        key: 'products',
        title: t('menu.products'),
        links: [
          { text: t('menu.products'), url: '/products' },
          { text: t('menu.items.new'), url: '/new' },
          { text: t('menu.items.specials'), url: '/specials' },
          { text: t('menu.items.top_seller'), url: '/top-seller' },
          { text: t('menu.items.sale'), url: '/sale' },
          { text: t('menu.items.used_equipment'), url: '/gebrauchtgeraete' }
        ]
      },
      {
        key: 'resources',
        title: t('footer.sections.resources.title'),
        links: [
          { text: t('menu.terms'), url: '/terms' },
          { text: t('menu.privacy'), url: '/privacy' },
          { text: t('menu.imprint'), url: '/imprint' },
          { text: t('footer.sections.support.returns'), url: '/returns' },
          { text: t('menu.cookies'), url: '/cookies' },
          { text: t('footer.sections.company.compliance'), url: '/compliance' },
          { text: t('footer.sections.company.quality'), url: '/quality' }
        ]
      },
      {
        key: 'account',
        title: t('account.title'),
        links: [
          { text: t('account.title'), url: '/mein-konto' },
          { text: t('account.login'), url: '/login' },
          { text: t('account.items.forgot_password'), url: '/passwort-vergessen' },
          { text: t('account.items.dealer_login'), url: '/haendler-login' },
          { text: t('footer.sections.support.returns'), url: '/ruecksendungen' }
        ]
      },
      {
        key: 'opening',
        title: t('footer.opening_hours.title'),
        opening: true
      },
      {
        key: 'newsletter',
        title: t('footer.newsletter.title'),
        newsletter: true
      },
      {
        key: 'social',
        title: t('footer.social'),
        social: true
      },
      {
        key: 'payment',
        title: t('footer.payment_methods.title'),
        payment: true
      },
      {
        key: 'shipping',
        title: t('footer.shipping.title'),
        shipping: true
      },
      {
        key: 'certifications',
        title: t('footer.certifications.title'),
        certifications: true  // Nouveau flag pour activer le bloc des certifications
      }
    ])

    const toggleSection = (key) => {
      const index = openSections.value.indexOf(key)
      if (index > -1) {
        openSections.value.splice(index, 1)
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
  gap: 15px;
  padding: 16px 0 0;
  flex-wrap: wrap;
}

.social-icons a {
  color: #555;
  font-size: 24px;
  transition: color 0.2s, transform 0.2s;
  display: inline-block;
}

.social-icons a:hover {
  color: #3a7bd5;
  transform: scale(1.1);
}

.payment-methods {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  padding: 16px 0 0;
  align-items: center;
}

.payment-methods img {
  height: 20px;
  width: auto;
  max-width: 40px;
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
  gap: 10px;
  flex-wrap: wrap;
  padding: 16px 0 0;
  align-items: center;
}

.shipping-methods img {
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

/* Nouveau style pour les certifications dans la section accordéon */
.section-content .certifications {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  padding: 16px 0 0;
  justify-content: center;
}

.section-content .certifications img {
  height: 35px;
  width: auto;
  max-width: 70px;
  background: white;
  padding: 6px;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.2s;
}

.section-content .certifications img:hover {
  transform: scale(1.05);
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
  gap: 10px;
}

.app-buttons img {
  height: 35px;
  width: auto;
  max-width: 110px;
  border-radius: 6px;
  transition: transform 0.2s;
}

.app-buttons img:hover {
  transform: scale(1.05);
}

.opening-hours {
  font-size: 14px;
  line-height: 1.6;
  padding: 16px 0 0;
}

.opening-hours p {
  margin: 0.3rem 0;
  color: #555;
}

.newsletter-form {
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding: 16px 0 0;
}

.newsletter-form input {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 14px;
}

.newsletter-button {
  background-color: #3a7bd5;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 4px;
  cursor: pointer;
  font-weight: 500;
}

.newsletter-note {
  font-size: 12px;
  color: #666;
  margin-top: 5px;
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