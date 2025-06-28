<template>
  <div>
    <!-- Version Desktop -->
    <footer class="desktop-footer" v-if="!isMobile">
      <div class="footer-wrapper">
        <div class="footer-container">
          <!-- Première rangée - Colonnes avec liens -->
          <div class="footer-main">
            <!-- Colonne Entreprise -->
            <div class="footer-column">
              <h4 class="footer-title">{{ $t('footer.sections.company.title') }}</h4>
              <ul class="footer-links">
                <li><a href="/about" :aria-label="$t('footer.sections.company.about')">{{ $t('footer.sections.company.about') }}</a></li>
                <li><a href="/careers" :aria-label="$t('footer.sections.company.career')">{{ $t('footer.sections.company.career') }}</a></li>
                <li><a href="/news" :aria-label="$t('footer.sections.company.news')">{{ $t('footer.sections.company.news') }}</a></li>
                <li><a href="/locations" :aria-label="$t('company.details.locations[0]')">{{ $t('company.details.locations[0]') }}</a></li>
                <li><a href="/partners" :aria-label="$t('footer.sections.company.partners')">{{ $t('footer.sections.company.partners') }}</a></li>
              
              </ul>
            </div>

            <!-- Colonne Services -->
            <div class="footer-column">
              <h4 class="footer-title">{{ $t('footer.sections.services.title') }}</h4>
              <ul class="footer-links">
                <li><a href="/inspections" :aria-label="$t('menu.categories.inspections')">{{ $t('menu.categories.inspections') }}</a></li>
                <li><a href="/calibration" :aria-label="$t('menu.categories.calibration')">{{ $t('menu.categories.calibration') }}</a></li>
                <li><a href="/maintenance" :aria-label="$t('menu.categories.maintenance')">{{ $t('menu.categories.maintenance') }}</a></li>
                <li><a href="/training" :aria-label="$t('menu.items.training')">{{ $t('menu.items.training') }}</a></li>
                <li><a href="/consulting" :aria-label="$t('menu.categories.consulting')">{{ $t('menu.categories.consulting') }}</a></li>
                <li><a href="/leasing" :aria-label="$t('menu.items.leasing')">{{ $t('menu.items.leasing') }}</a></li>
              </ul>
            </div>

            <!-- Colonne Support -->
            <div class="footer-column">
              <h4 class="footer-title">{{ $t('footer.sections.support.title') }}</h4>
              <ul class="footer-links">
                <li><a href="/contact" :aria-label="$t('menu.contact')">{{ $t('menu.contact') }}</a></li>
                <li><a href="/faq" :aria-label="$t('menu.faq')">{{ $t('menu.faq') }}</a></li>
                <li><a href="/emergency" :aria-label="$t('footer.sections.support.emergency')">{{ $t('footer.sections.support.emergency') }}</a></li>
                <li><a href="/support-hotline" :aria-label="$t('header.phone')">{{ $t('header.phone') }}</a></li>
                <li><a href="/live-chat" :aria-label="$t('footer.sections.support.live_chat')">Live Chat</a></li>
                <li><a href="/service-center" :aria-label="$t('footer.sections.support.service_center')">{{ $t('footer.sections.support.service_center') }}</a></li>
              </ul>
            </div>

            <!-- Colonne Produits -->
            <div class="footer-column">
              <h4 class="footer-title">{{ $t('menu.products') }}</h4>
              <ul class="footer-links">
                <li><a href="/products" :aria-label="$t('menu.products')">{{ $t('menu.products') }}</a></li>
                <li><a href="/new" :aria-label="$t('menu.items.new')">{{ $t('menu.items.new') }}</a></li>
                <li><a href="/specials" :aria-label="$t('menu.items.specials')">{{ $t('menu.items.specials') }}</a></li>
                <li><a href="/top-seller" :aria-label="$t('menu.items.top_seller')">{{ $t('menu.items.top_seller') }}</a></li>
                <li><a href="/sale" :aria-label="$t('menu.items.sale')">{{ $t('menu.items.sale') }}</a></li>
                <li><a href="/gebrauchtgeraete" :aria-label="$t('menu.items.used_equipment')">{{ $t('menu.items.used_equipment') }}</a></li>
              </ul>
            </div>

            <!-- Colonne Informations -->
            <div class="footer-column">
              <h4 class="footer-title">{{ $t('footer.sections.resources.title') }}</h4>
              <ul class="footer-links">
                <li><a href="/terms" :aria-label="$t('menu.terms')">{{ $t('menu.terms') }}</a></li>
                <li><a href="/privacy" :aria-label="$t('menu.privacy')">{{ $t('menu.privacy') }}</a></li>
                <li><a href="/imprint" :aria-label="$t('menu.imprint')">{{ $t('menu.imprint') }}</a></li>
                <li><a href="/returns" :aria-label="$t('footer.sections.support.returns')">{{ $t('footer.sections.support.returns') }}</a></li>
                <li><a href="/cookies" :aria-label="$t('menu.cookies')">{{ $t('menu.cookies') }}</a></li>
                <li><a href="/compliance" :aria-label="$t('footer.sections.company.compliance')">Compliance</a></li>
                <li><a href="/quality" :aria-label="$t('footer.sections.company.quality')">{{ $t('footer.sections.company.quality') }}</a></li>
              </ul>
            </div>
          </div>

          <!-- Nouvelle section pour les titres horizontaux -->
          <div class="footer-horizontal-section">
            <div class="footer-horizontal-column">
              <h4 class="footer-title">{{ $t('footer.sections.environment.title') }}</h4>
              <ul class="footer-links">
                <li><a href="/umweltschutz" :aria-label="$t('footer.sections.environment.protection')">{{ $t('footer.sections.environment.protection') }}</a></li>
                <li><a href="/recycling" :aria-label="$t('footer.sections.environment.recycling')">{{ $t('footer.sections.environment.recycling') }}</a></li>
                <li><a href="/nachhaltigkeit" :aria-label="$t('footer.sections.environment.sustainability')">{{ $t('footer.sections.environment.sustainability') }}</a></li>
                <li><a href="/altbatterie-entsorgung" :aria-label="$t('footer.sections.environment.battery_disposal')">{{ $t('footer.sections.environment.battery_disposal') }}</a></li>
                <li><a href="/co2-neutral" :aria-label="$t('footer.sections.environment.co2_neutral')">{{ $t('footer.sections.environment.co2_neutral') }}</a></li>
              </ul>
            </div>

            <div class="footer-horizontal-column">
              <h4 class="footer-title">{{ $t('footer.opening_hours.title') }}</h4>
              <div class="opening-hours">
                <p>{{ $t('footer.opening_hours.weekdays') }}</p>
                <p>{{ $t('footer.opening_hours.saturday') }}</p>
                <p>{{ $t('footer.opening_hours.emergency') }}</p>
              </div>
            </div>

            <div class="footer-horizontal-column">
              <h4 class="footer-title">{{ $t('account.title') }}</h4>
              <ul class="footer-links">
                <li><a href="/mein-konto" :aria-label="$t('account.title')">{{ $t('account.title') }}</a></li>
                <li><a href="/login" :aria-label="$t('account.login')">{{ $t('account.login') }}</a></li>
                <li><a href="/passwort-vergessen" :aria-label="$t('account.items.forgot_password')">{{ $t('account.items.forgot_password') }}</a></li>
                <li><a href="/haendler-login" :aria-label="$t('account.items.dealer_login')">{{ $t('account.items.dealer_login') }}</a></li>
                <li><a href="/ruecksendungen" :aria-label="$t('footer.sections.support.returns')">{{ $t('footer.sections.support.returns') }}</a></li>
              </ul>
            </div>

            <div class="footer-horizontal-column">
              <h4 class="footer-title">{{ $t('footer.newsletter.title') }}</h4>
              <div class="newsletter-form">
                <input type="email" :placeholder="$t('footer.newsletter.placeholder')" :aria-label="$t('footer.newsletter.placeholder')">
                <button class="newsletter-button">{{ $t('footer.newsletter.subscribe') }}</button>
              </div>
              <p class="newsletter-note">{{ $t('footer.newsletter.privacy_note') }}</p>
            </div>
          </div>

          <!-- Deuxième rangée - Colonnes avec images -->
          <div class="footer-images-section">
            <div class="footer-images-column">
              <h4 class="footer-title">{{ $t('footer.social') }}</h4>
              <div class="social-3d">
  <a href="#" class="social-icon-3d facebook" aria-label="Facebook">
    <i class="mdi mdi-facebook"></i>
  </a>
  <a href="#" class="social-icon-3d twitter" aria-label="Twitter">
    <i class="mdi mdi-twitter"></i>
  </a>
  <a href="#" class="social-icon-3d instagram" aria-label="Instagram">
    <i class="mdi mdi-instagram"></i>
  </a>
  <a href="#" class="social-icon-3d linkedin" aria-label="LinkedIn">
    <i class="mdi mdi-linkedin"></i>
  </a>
  <a href="#" class="social-icon-3d whatsapp" aria-label="WhatsApp">
    <i class="mdi mdi-whatsapp"></i>
  </a>
</div>
            </div>

            <div class="footer-images-column">
              <h4 class="footer-title">{{ $t('footer.payment_methods.title') }}</h4>
              <div class="payment-methods-group">
                <img src="/images/payment/visa.png" alt="Visa" title="Visa" loading="lazy">
                <img src="/images/payment/mastercard.png" alt="Mastercard" title="Mastercard" loading="lazy">
                <img src="/images/payment/paypal.png" alt="PayPal" title="PayPal" loading="lazy">
                <img src="/images/payment/sepa.png" alt="SEPA-Lastschrift" title="SEPA-Lastschrift" loading="lazy">
                <img src="/images/payment/sofort.png" alt="Sofortüberweisung" title="Sofortüberweisung" loading="lazy">
                <img src="/images/payment/klarna.png" alt="Klarna" title="Klarna" loading="lazy">
              </div>
            </div>

            <div class="footer-images-column">
              <h4 class="footer-title">{{ $t('footer.shipping.title') }}</h4>
              <div class="shipping-methods-group">
                <img src="/images/shipping/dhl.png" alt="DHL" title="DHL" loading="lazy">
                <img src="/images/shipping/dpd.png" alt="DPD" title="DPD" loading="lazy">
                <img src="/images/shipping/hermes.png" alt="Hermes" title="Hermes" loading="lazy">
                <img src="/images/shipping/ups.png" alt="UPS" title="UPS" loading="lazy">
                <img src="/images/shipping/db_schenk.svg" alt="DB Schenker" title="DB Schenker" loading="lazy">
              </div>
            </div>

            <div class="footer-images-column">
              <h4 class="footer-title">{{ $t('footer.certifications.title') }}</h4>
              <div class="certification-group">
                <img src="/images/certifications/iso-13485.png" :alt="$t('footer.certifications.iso13485')" class="certification-img" loading="lazy">
                <img src="/images/certifications/tuv-certified.png" :alt="$t('footer.certifications.tuv')" class="certification-img" loading="lazy">
                <img src="/images/certifications/dguv-certified.png" :alt="$t('footer.certifications.dguv')" class="certification-img" loading="lazy">
                <img src="/images/certifications/trusted-shops.png" :alt="$t('footer.certifications.iso9001')" class="certification-img" loading="lazy">
              </div>
            </div>

            <div class="footer-images-column">
              <h4 class="footer-title">{{ $t('footer.mobile_app.title') }}</h4>
              <div class="app-download-group">
                <a href="#" :aria-label="$t('footer.mobile_app.app_store')">
                  <img src="/images/apps/app-store.png" alt="App Store" class="app-download-img" :title="$t('footer.mobile_app.app_store')" loading="lazy">
                </a>
                <a href="#" :aria-label="$t('footer.mobile_app.google_play')">
                  <img src="/images/apps/google-play.png" alt="Google Play" class="app-download-img" :title="$t('footer.mobile_app.google_play')" loading="lazy">
                </a>
              </div>
            </div>
          </div>

          <!-- Troisième rangée - Copyright -->
          <div class="footer-bottom">
            <div class="copyright">
              {{ $t('footer.copyright', { year: new Date().getFullYear(), company: $t('company.name') }) }}
            </div>
            <div class="footer-badges">
              <img src="/images/badges/safe-shopping.png" :alt="$t('footer.badges.safe_shopping')" loading="lazy">
              <img src="/images/badges/ssl-secured.png" :alt="$t('footer.badges.ssl')" loading="lazy">
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Version Mobile -->
    <MobileFooter 
      v-else
      :company-name="$t('company.name')"
      :sections="mobileSections"
      :initially-open="['Informationen']"
    />
  </div>
</template>

<script>
import MobileFooter from '@/layouts/MobileFooter.vue'

export default {
  components: {
    MobileFooter
  },
  data() {
    return {
      isMobile: false,
      mobileSections: [
        {
          title: this.$t('footer.sections.company.title'),
          links: [
            { text: this.$t('footer.sections.company.about'), url: '/about' },
            { text: this.$t('footer.sections.company.career'), url: '/careers' },
            { text: this.$t('footer.sections.company.news'), url: '/news' },
            { text: this.$t('company.details.locations[0]'), url: '/locations' },
            { text: this.$t('footer.sections.company.partners'), url: '/partners' }
          ]
        },
        {
          title: this.$t('footer.sections.environment.title'),
          links: [
            { text: this.$t('footer.sections.environment.protection'), url: '/umweltschutz' },
            { text: this.$t('footer.sections.environment.recycling'), url: '/recycling' },
            { text: this.$t('footer.sections.environment.co2_neutral'), url: '/co2-neutral' }
          ]
        },
        {
          title: this.$t('footer.sections.services.title'),
          links: [
            { text: this.$t('menu.categories.inspections'), url: '/inspections' },
            { text: this.$t('menu.categories.calibration'), url: '/calibration' },
            { text: this.$t('menu.categories.consulting'), url: '/consulting' },
            { text: this.$t('menu.items.training'), url: '/training' }
          ]
        },
        {
          title: this.$t('footer.sections.support.title'),
          links: [
            { text: this.$t('menu.contact'), url: '/contact' },
            { text: this.$t('menu.faq'), url: '/faq' },
            { text: this.$t('footer.sections.support.live_chat'), url: '/live-chat' },
            { text: this.$t('footer.sections.support.service_center'), url: '/service-center' }
          ]
        },
        {
          title: this.$t('footer.sections.resources.title'),
          links: [
            { text: this.$t('menu.terms'), url: '/terms' },
            { text: this.$t('menu.privacy'), url: '/privacy' },
            { text: this.$t('menu.imprint'), url: '/imprint' },
            { text: this.$t('menu.cookies'), url: '/cookies' }
          ]
        },
        {
          title: this.$t('menu.products'),
          links: [
            { text: this.$t('menu.products'), url: '/products' },
            { text: this.$t('menu.items.new'), url: '/new' },
            { text: this.$t('menu.items.top_seller'), url: '/top-seller' },
            { text: this.$t('menu.items.used_equipment'), url: '/gebrauchtgeraete' }
          ]
        },
        {
          title: this.$t('footer.social'),
          social: true,
          links: []
        },
        {
          title: this.$t('footer.payment_methods.title'),
          payment: true,
          links: []
        },
        {
          title: this.$t('footer.shipping.title'),
          shipping: true,
          links: []
        },
        {
          title: this.$t('footer.mobile_app.title'),
          app: true,
          links: []
        }
      ]
    }
  },
  created() {
    this.checkMobile()
    window.addEventListener('resize', this.checkMobile)
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.checkMobile)
  },
  methods: {
    checkMobile() {
      this.isMobile = window.innerWidth < 1024
    }
  }
}
</script>

<style scoped>
/* Structure principale */
.footer-wrapper {
  background-color: rgba(207, 212, 212, 0.377);
  width: 100%;
  color: #333;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 1.5rem 1rem 0.75rem; /* Réduit le padding */
}

/* Colonnes et contenu */
.footer-main {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.footer-images-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
  margin-bottom: 2rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(51, 51, 51, 0.2);
}

.footer-column, .footer-images-column {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

/* Assurez-vous que tous les titres ont la même apparence */
.footer-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 1rem;
  color: rgb(53, 51, 51);
  border-bottom: 2px solid var(--footer-border-color);
  padding-bottom: 0.5rem;
  position: relative;
}

.footer-title::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 40px;
  height: 2px;
  background-color: #3a7bd5;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.footer-links a {
  color: black;
  text-decoration: none;
  font-size: 0.9rem;
  transition: all 0.3s ease;
  display: inline-block;
  position: relative;
}

.footer-links a:hover {
  color: #3a7bd5;
  transform: translateX(5px);
}

.footer-links a::after {
  content: '';
  position: absolute;
  width: 0;
  height: 1px;
  bottom: -2px;
  left: 0;
  background-color: #3a7bd5;
  transition: width 0.3s ease;
}

.footer-links a:hover::after {
  width: 100%;
}

.footer-horizontal-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
  margin-bottom: 2rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(51, 51, 51, 0.2);
}

.footer-horizontal-column {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

/* Assurez-vous que les titres sont alignés */
.footer-horizontal-column .footer-title {
  margin-bottom: 1rem;
}

/* Ajustez les styles pour les éléments spécifiques */
.footer-horizontal-column .opening-hours {
  font-size: 0.9rem;
  line-height: 1.6;
}

.footer-horizontal-column .opening-hours p {
  margin: 0.3rem 0;
}

.footer-horizontal-column .newsletter-form {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

/* Styles pour les icônes de réseaux sociaux */
.social-3d {
  display: flex;
  gap: 1rem;
  perspective: 1000px;
}

.social-icon-3d {
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  color: white;
  border-radius: 12px;
  transform-style: preserve-3d;
  transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  position: relative;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Effet 3D de base */
.social-icon-3d::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background: inherit;
  border-radius: inherit;
  transform: translateZ(-10px);
  filter: brightness(0.8);
  transition: all 0.4s;
}

/* Couleurs spécifiques */
.facebook { background: #3b5998; }
.twitter { background: #1da1f2; }
.instagram { background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); }
.linkedin { background: #0077b5; }
.whatsapp { background: #11c22e; }

/* Animation 3D au survol */
.social-icon-3d:hover {
  transform: rotateY(20deg) rotateX(10deg) translateY(-5px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.3);
}

.social-icon-3d:hover::before {
  transform: translateZ(-15px);
}

/* Effet de profondeur supplémentaire */
.social-icon-3d::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: inherit;
  background: rgba(255,255,255,0.1);
  transform: translateZ(5px);
}

/* Version mobile */
@media (max-width: 768px) {
  .social-3d {
    gap: 0.8rem;
  }
  
  .social-icon-3d {
    width: 40px;
    height: 40px;
    font-size: 1.4rem;
  }
}

@keyframes float-3d {
  0%, 100% { transform: translateY(0) rotateY(0); }
  50% { transform: translateY(-10px) rotateY(10deg); }
}

.social-3d:hover .social-icon-3d {
  animation: float-3d 3s ease-in-out infinite;
}

.social-3d:hover .social-icon-3d:nth-child(2) {
  animation-delay: 0.2s;
}
.social-3d:hover .social-icon-3d:nth-child(3) {
  animation-delay: 0.4s;
}
.social-3d:hover .social-icon-3d:nth-child(4) {
  animation-delay: 0.6s;
}
.social-3d:hover .social-icon-3d:nth-child(5) {
  animation-delay: 0.8s;
}

.payment-methods-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.3rem;
  background: rgba(87, 86, 86, 0.1);
  padding: 0.4rem;
  border-radius: 12px;
}

.payment-methods-group img {
  height: auto;
  max-height: 20px !important; /* Taille réduite */
  max-width: 35px !important;
  object-fit: contain;
  transition: all 0.3s ease;
  filter: sepia(0.2) contrast(1.1);
}

/* Shipping methods - Version améliorée */
.shipping-methods-group {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.8rem;
  align-items: center;
}

.shipping-methods-group img {
  width: 100%;
  max-width: 100%;
  height: auto;
  max-height: 30px !important;
  padding: 0.3rem;
  background: white;
  border-radius: 8px;
  object-fit: contain;
  transition: all 0.3s ease;
}

.shipping-methods-group img:hover {
  transform: scale(1.05);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Ajustements spécifiques pour les logos de transport */
.shipping-methods-group img[alt="DHL"],
.shipping-methods-group img[alt="DPD"],
.shipping-methods-group img[alt="DB Schenker"],
.shipping-methods-group img[alt="UPS"],
.shipping-methods-group img[alt="Hermes"] {
  max-height: 50px;
}

.certification-group {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.certification-img {
  background: white;
  
  border-radius: 6px;
  max-height: 40px !important;
  padding: 0.3rem;
  width: auto;
}

.certification-img:hover {
  transform: translateY(-8px) rotateX(10deg);
  box-shadow: 0 12px 20px rgba(0,0,0,0.15);
}

/* App Download Buttons */
.app-download-group {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin-top: 0.5rem;
}

.app-download-img {
  width: auto;
  height: 30px !important;
  max-width: 100px !important;
  border-radius: 7px;
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.app-download-img:hover {
  transform: scale(1.03);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  filter: brightness(1.05);
}

/* Newsletter Form */
.newsletter-form {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.newsletter-form input {
  padding: 0.6rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 0.9rem;
  transition: border-color 0.3s;
}

.newsletter-form input:focus {
  border-color: #3a7bd5;
  outline: none;
  box-shadow: 0 0 0 2px rgba(58, 123, 213, 0.2);
}

.newsletter-button {
  background-color: #3a7bd5;
  color: white;
  border: none;
  padding: 0.6rem;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-weight: 500;
}

.newsletter-button:hover {
  background-color: #2c5fb3;
}

/* Opening Hours */
.opening-hours {
  font-size: 0.9rem;
  line-height: 1.6;
}

.opening-hours p {
  margin: 0.3rem 0;
}

/* Footer Bottom */
.footer-bottom {
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid rgba(51, 51, 51, 0.2);
  text-align: center;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.copyright {
  font-size: 0.8rem;
  color: #333;
}

.footer-badges {
  display: flex;
  justify-content: center;
  gap: 1rem;
  flex-wrap: wrap;
}

.footer-badges img {
  height: 50px;
  width: auto;
  max-width: 120px;
  transition: transform 0.3s ease;
}

.footer-badges img:hover {
  transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 992px) {
  .footer-main, .footer-images-section {
    grid-template-columns: repeat(3, 1fr);
  }
  
  .shipping-methods-group {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .footer-main, .footer-images-section {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .app-download-group {
    flex-direction: row;
  }
  
  .payment-methods-group {
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .footer-main, .footer-images-section {
    grid-template-columns: 1fr;
  }
  
  .social-icons-row {
    justify-content: center;
  }
  
  .footer-badges {
    flex-direction: column;
    align-items: center;
  }
  
  .shipping-methods-group {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Ajustements pour les écrans mobiles */
@media (max-width: 768px) {
  .payment-methods-group img {
    max-height: 18px !important;
    max-width: 30px !important;
  }
  
  .shipping-methods-group img {
    max-height: 25px !important;
  }
  
  .certification-img {
    max-height: 35px !important;
  }
  
  .app-download-img {
    height: 25px !important;
    max-width: 90px !important;
  }
}
</style>