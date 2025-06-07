<!-- Footer.vue -->
<template>
  <div>
    <!-- Version Desktop -->
    <footer class="desktop-footer" v-if="!isMobile">
      <div class="footer-wrapper">
        <div class="footer-container">
          <!-- Première rangée - Contenu principal -->
          <div class="footer-main">
            <!-- Colonne Entreprise -->
            <div class="footer-column">
              <h4 class="footer-title">Unternehmen</h4>
              <ul class="footer-links">
                <li><a href="/about" aria-label="Über uns">Über uns</a></li>
                <li><a href="/careers" aria-label="Karriere">Karriere</a></li>
                <li><a href="/news" aria-label="News">News</a></li>
              </ul>
              
              <h4 class="footer-title">Umwelt</h4>
              <ul class="footer-links">
                <li><a href="/umweltschutz" aria-label="Umweltschutz">Umweltschutz</a></li>
                <li><a href="/recycling" aria-label="Recycling">Recycling</a></li>
                <li><a href="/nachhaltigkeit" aria-label="Nachhaltigkeit">Nachhaltigkeit</a></li>
                <li><a href="/altbatterie-entsorgung" aria-label="Altbatterie-Entsorgung">Altbatterie-Entsorgung</a></li>
              </ul>
            </div>

            <!-- Colonne Services -->
            <div class="footer-column">
              <h4 class="footer-title">Dienstleistungen</h4>
              <ul class="footer-links">
                <li><a href="/inspections" aria-label="Prüfungen">Prüfungen</a></li>
                <li><a href="/calibration" aria-label="Kalibrierung">Kalibrierung</a></li>
                <li><a href="/maintenance" aria-label="Wartung">Wartung</a></li>
              </ul>
              
              <h4 class="footer-title">Social Media</h4>
              <div class="social-icons-group">
                <a href="#" class="social-icon" aria-label="Facebook"><v-icon>mdi-facebook</v-icon></a>
                <a href="#" class="social-icon" aria-label="Linkedin"><v-icon>mdi-linkedin</v-icon></a>
                <a href="#" class="social-icon" aria-label="Instagram"><v-icon>mdi-instagram</v-icon></a>
              </div>
            </div>

            <!-- Colonne Support -->
            <div class="footer-column">
              <h4 class="footer-title">Support</h4>
              <ul class="footer-links">
                <li><a href="/contact" aria-label="Kontakt">Kontakt</a></li>
                <li><a href="/faq" aria-label="FAQ">FAQ</a></li>
                <li><a href="/emergency" aria-label="Notdienst">Notdienst</a></li>
              </ul>
              
              <h4 class="footer-title">Zahlungsarten</h4>
              <div class="payment-methods-group">
                  <img src="/images/payment/visa.png" alt="Visa" title="Visa" loading="lazy">
                  <img src="/images/payment/mastercard.png" alt="Mastercard" title="Mastercard" loading="lazy">
                  <img src="/images/payment/paypal.png" alt="PayPal" title="PayPal" loading="lazy">
                  <img src="/images/payment/sepa.png" alt="SEPA-Lastschrift" title="SEPA-Lastschrift" loading="lazy">
                  <img src="/images/payment/sofort.png" alt="Sofortüberweisung" title="Sofortüberweisung" loading="lazy">
              </div>

              <h4 class="footer-title">Versand</h4>
              <div class="shipping-methods-group">
                <img src="/images/shipping/dhl.png" alt="DHL" title="DHL" loading="lazy">
                <img src="/images/shipping/dpd.png" alt="DPD" title="DPD" loading="lazy">
                <img src="/images/shipping/db_schenk.svg" alt="DB Schenker" title="DB Schenker" loading="lazy" style="max-width: 80px;">
              </div>
            </div>

            <!-- Colonne Informations -->
            <div class="footer-column">
              <h4 class="footer-title">Informationen</h4>
              <ul class="footer-links">
                <li><a href="/terms" aria-label="AGB">AGB</a></li>
                <li><a href="/privacy" aria-label="Datenschutz">Datenschutz</a></li>
                <li><a href="/imprint" aria-label="Impressum">Impressum</a></li>
                <li><a href="/returns" aria-label="Widerrufsrecht">Widerrufsrecht</a></li>
              </ul>

              <h4 class="footer-title">Konto</h4>
              <ul class="footer-links">
                <li><a href="/mein-konto" aria-label="Mein Konto">Mein Konto</a></li>
                <li><a href="/login" aria-label="Anmelden/Login">Anmelden/Login</a></li>
                <li><a href="/passwort-vergessen" aria-label="Passwort vergessen">Passwort vergessen</a></li>
                <li><a href="/haendler-login" aria-label="Händler-Login">Händler-Login</a></li>
                <li><a href="/ruecksendungen" aria-label="Rücksendungen">Rücksendungen</a></li>
              </ul>
            </div>

            <!-- Colonne Produits & Newsletter -->
            <div class="footer-column">
              <h4 class="footer-title">Produkte</h4>
              <ul class="footer-links">
                <li><a href="/products" aria-label="Alle Produkte">Alle Produkte</a></li>
                <li><a href="/new" aria-label="Neuheiten">Neuheiten</a></li>
                <li><a href="/specials" aria-label="Angebote">Angebote</a></li>
              </ul>
              
              <h4 class="footer-title">Zertifizierungen</h4>
              <div class="certification-group">
                <img src="/images/certifications/iso-13485.png" alt="ISO 13485" class="certification-img" loading="lazy">
                <img src="/images/certifications/tuv-certified.png" alt="TÜV Certified" class="certification-img" loading="lazy">
                <img src="/images/certifications/dguv-certified.png" alt="dguv Certified" class="certification-img" loading="lazy">
              </div>
              
              <h4 class="footer-title">Mobile App</h4>
              <div class="app-download-group">
                <a href="#" aria-label="Download auf dem App Store">
                  <img src="/images/apps/app-store.png" alt="App Store" class="app-download-img" title="Jetzt im App Store herunterladen" loading="lazy">
                </a>
                <a href="#" aria-label="Download bei Google Play">
                  <img src="/images/apps/google-play.png" alt="Google Play" class="app-download-img" title="Jetzt bei Google Play herunterladen" loading="lazy">
                </a>
              </div>
            </div>
          </div>

          <!-- Deuxième rangée - Copyright -->
          <div class="footer-bottom">
            <div class="copyright">
              © {{ new Date().getFullYear() }} {{ companyName }} | Alle Rechte vorbehalten
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Version Mobile -->
    <MobileFooter 
      v-else
      :company-name="companyName"
      :sections="mobileSections"
      :initially-open="['Informationen']"
    />
  </div>
</template>

<script>
import MobileFooter from '@/layouts/MobileFooter.vue'  // Chemodifiéifié

export default {
  components: {
    MobileFooter
  },
  // Dans Footer.vue
data() {
  return {
    companyName: 'Company Name',
    isMobile: false,
    mobileSections: [
      {
        title: 'Unternehmen',
        links: [
          { text: 'Über uns', url: '/about' },
          { text: 'Karriere', url: '/careers' },
          { text: 'News', url: '/news' }
        ]
      },
      {
        title: 'Umwelt',
        links: [
          { text: 'Umweltschutz', url: '/umweltschutz' },
          { text: 'Recycling', url: '/recycling' }
        ]
      },
      {
        title: 'Support',
        links: [
          { text: 'Kontakt', url: '/contact' },
          { text: 'FAQ', url: '/faq' }
        ]
      },
      {
        title: 'Informationen',
        links: [
          { text: 'AGB', url: '/terms' },
          { text: 'Datenschutz', url: '/privacy' }
        ]
      },
      {
        title: 'Social Media',
        social: true, // Active l'affichage des icônes sociales
        links: []
      },
      {
        title: 'Zahlungsarten',
        payment: true, // Active l'affichage des méthodes de paiement
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
  background-color: rgba(165, 165, 165, 0.377);
  width: 100%;
  color: #333;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 2.5rem 1rem 1.25rem;
}

/* Colonnes et contenu */
.footer-main {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
  margin-bottom: 2rem;
}

.footer-column {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

/* Titres */
.footer-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
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

/* Groupes d'icônes et images */
.social-icons-group {
  display: flex;
  gap: 1.5rem;
  perspective: 500px;
}

.social-icon {
  font-size: 1.8rem;
  color: #353638;
  transition: all 0.3s ease;
  text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.social-icon:hover {
  transform: translateY(-5px) rotateX(20deg);
  color: #3a7bd5;
}

.payment-methods-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  background: rgba(87, 86, 86, 0.1);
  padding: 0.8rem;
  border-radius: 12px;
}

.payment-methods-group img,
.shipping-methods-group img,
.certification-img {
  height: auto;
  max-height: 35px;
  max-width: 55px;
  transition: all 0.3s ease;
  filter: sepia(0.2) contrast(1.1);
}

/* Shipping methods */
.shipping-methods-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
}

.shipping-methods-group img {
  padding: 0.5rem;
  background: white;
  border-radius: 8px;
}

.shipping-methods-group img:hover {
  transform: scale(1.1);
  background: white;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.certification-group {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.certification-img {
  background: white;
  padding: 0.6rem;
  border-radius: 6px;
}

.certification-img:hover {
  transform: translateY(-8px) rotateX(10deg);
  box-shadow: 0 12px 20px rgba(0,0,0,0.15);
}

/* App Download Buttons */
.app-download-group {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
  margin-top: 0.5rem;
}

.app-download-img {
  height: 45px;
  width: auto;
  max-width: 150px;
  border-radius: 7px;
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.app-download-img:hover {
  transform: scale(1.03);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  filter: brightness(1.05);
}

/* Pied de page bas */
.footer-bottom {
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid rgba(51, 51, 51, 0.2);
  text-align: center;
}

.copyright {
  font-size: 0.8rem;
  color: #333;
}

/* Responsive */
@media (max-width: 992px) {
  .footer-main {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 768px) {
  .footer-main {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .app-download-group {
    flex-direction: row;
  }
}

@media (max-width: 480px) {
  .footer-main {
    grid-template-columns: 1fr;
  }
}
</style>