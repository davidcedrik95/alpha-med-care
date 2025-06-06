<template>
  <footer class="social-footer">
    <div class="footer-content">
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
          
          <h4 class="footer-subtitle">Zertifizierungen</h4>
          <div class="icon-group">
            <img src="/images/iso-13485.png" alt="ISO 13485" class="certification-img" loading="lazy">
            <img src="/images/tuv-certified.png" alt="TÜV Certified" class="certification-img" loading="lazy">
            <img src="/images/dguv-certified.png" alt="dguv Certified" class="certification-img" loading="lazy">
          </div>
        </div>

        <!-- Colonne Services -->
        <div class="footer-column">
          <h4 class="footer-title">Dienstleistungen</h4>
          <ul class="footer-links">
            <li><a href="/inspections" aria-label="Prüfungen">Prüfungen</a></li>
            <li><a href="/calibration" aria-label="Kalibrierung">Kalibrierung</a></li>
            <li><a href="/maintenance" aria-label="Wartung">Wartung</a></li>
          </ul>
          
          <h4 class="footer-subtitle">Social Media</h4>
          <div class="icon-group social-icons">
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
          <div class="icon-group payment-methods">
            <img src="/images/payment/visa.png" alt="Visa" title="Visa" loading="lazy">
            <img src="/images/payment/paypal.png" alt="PayPal" title="PayPal" loading="lazy">
            <img src="/images/payment/sepa.png" alt="SEPA Überweisung" title="SEPA Überweisung" loading="lazy">
            <img src="/images/payment/sofort.png" alt="Sofortüberweisung" title="Sofortüberweisung" loading="lazy">
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

          <h4 class="footer-title">Versand</h4>
          <div class="icon-group shipping-methods">
            <img src="/images/shipping/dhl.png" alt="DHL" title="DHL" loading="lazy">
            <img src="/images/shipping/dpd.png" alt="DPD" title="DPD" loading="lazy">
            <img src="/images/shipping/db_schenk.svg" alt="DB Schenker" title="DB Schenker" loading="lazy">
          </div>
        </div>

        <!-- Colonne Produits & Newsletter -->
        <div class="footer-column">
          <h4 class="footer-title">{{ $t('footer.products') }}</h4>
          <ul class="footer-links">
            <li><a href="/products" aria-label="Alle Produkte">Alle Produkte</a></li>
            <li><a href="/new" aria-label="Neuheiten">Neuheiten</a></li>
            <li><a href="/specials" aria-label="Angebote">Angebote</a></li>
          </ul>
          
          <h4 class="footer-subtitle">{{ $t('footer.newsletter.title') }}</h4>
          <div class="newsletter">
            <v-text-field 
              placeholder="Ihre E-Mail" 
              dense 
              outlined
              hide-details
              aria-label="E-Mail für Newsletter"
            ></v-text-field>
            <v-btn color="primary" small class="mt-2" aria-label="Newsletter anmelden">Anmelden</v-btn>
          </div>
        </div>
      </div>

      <!-- Deuxième rangée - Copyright -->
      <div class="footer-bottom">
        <div class="copyright">
          © {{ new Date().getFullYear() }} {{ $t('company.name') }} | Alle Rechte vorbehalten
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'AppFooter'
}
</script>

<style scoped>
:root {
  --footer-bg-color: rgba(12, 72, 129, 0.95);
  --footer-text-color: white;
  --footer-link-color: rgba(255, 255, 255, 0.7);
  --footer-link-hover: white;
  --footer-border-color: rgba(255, 255, 255, 0.2);
  --footer-icon-opacity: 0.8;
}

.social-footer {
  background-color: var(--footer-bg-color);
  color: var(--footer-text-color);
  padding: 2.5rem 0 1.25rem;
  background-color: rgba(209, 207, 207, 0.7);
}

.footer-content {
  max-width: 100%;
  margin: 0 auto;
  padding: 0 1rem;
}

.footer-main {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
  padding: 0 1rem;
  margin-bottom: 2rem;
}

.footer-column {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.footer-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
  color: var(--footer-text-color);
  border-bottom: 2px solid var(--footer-border-color);
  padding-bottom: 0.5rem;
}

.footer-subtitle {
  font-size: 1rem;
  font-weight: 500;
  color: rgba(255, 255, 255, 0.9);
  margin: 1.5rem 0 0.5rem;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.footer-links a {
  color: var(--footer-link-color);
  text-decoration: none;
  font-size: 0.9rem;
  transition: color 0.2s ease;
}

.footer-links a:hover {
  color: var(--footer-link-hover);
  text-decoration: underline;
}

/* Styles communs pour les groupes d'icônes */
.icon-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  align-items: center;
}

.certification-img {
  height: 50px;
  width: auto;
  max-width: 100px;
  background: white;
  padding: 0.25rem;
  border-radius: 0.25rem;
  transition: transform 0.2s ease;
}

.certification-img:hover {
  transform: scale(1.05);
}

.social-icons {
  gap: 1rem;
}

.social-icon {
  color: var(--footer-text-color);
  transition: all 0.2s ease;
}

.social-icon:hover {
  color: var(--footer-link-hover);
  transform: translateY(-0.125rem);
}

/* Styles pour les méthodes de paiement et livraison */
.payment-methods img,
.shipping-methods img {
  height: 1.5rem;
  width: auto;
  opacity: var(--footer-icon-opacity);
  transition: opacity 0.3s ease;
  /*filter: brightness(0) invert(1);*/
}

.shipping-methods img {
  filter: none;
  height: 2rem;
}

.payment-methods img:hover,
.shipping-methods img:hover {
  opacity: 1;
}

/* Newsletter */
.newsletter {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  max-width: 100%;
}

/* Footer bottom */
.footer-bottom {
  margin-top: 2rem;
  padding-top: 1rem;
  border-top: 1px solid var(--footer-border-color);
  text-align: center;
}

.copyright {
  font-size: 0.75rem;
  color: rgba(255, 255, 255, 0.6);
}

/* Responsive */
@media (max-width: 768px) {
  .footer-main {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
  }
}

@media (max-width: 480px) {
  .footer-main {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .footer-column {
    margin-bottom: 1rem;
  }
  
  .footer-subtitle {
    margin-top: 1rem;
  }
}
</style>