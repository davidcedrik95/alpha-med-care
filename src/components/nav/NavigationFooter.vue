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
            <img src="/images/payment/visa.png" alt="Visa" title="Visa | MasterCard" loading="lazy">
            <img src="/images/payment/paypal.png" alt="PayPal" title="PayPal" loading="lazy">
            <img src="/images/payment/SEPA.png" alt="SEPA-Lastschrift" title="SEPA-Lastschrift" loading="lazy">
            <img src="/images/payment/sofortueberweisung.png" alt="Sofortüberweisung" title="Sofortüberweisung" loading="lazy">
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
          <h4 class="footer-title">{{ $t('footer.products') }}</h4>
          <ul class="footer-links">
            <li><a href="/products" aria-label="Alle Produkte">Alle Produkte</a></li>
            <li><a href="/new" aria-label="Neuheiten">Neuheiten</a></li>
            <li><a href="/specials" aria-label="Angebote">Angebote</a></li>
          </ul>
          
          <h4 class="footer-title">Zertifizierungen</h4>
          <div class="certification-group">
            <img src="/images/iso-13485.png" alt="ISO 13485" class="certification-img" loading="lazy">
            <img src="/images/tuv-certified.png" alt="TÜV Certified" class="certification-img" loading="lazy">
            <img src="/images/dguv-certified.png" alt="dguv Certified" class="certification-img" loading="lazy">
          </div>
          
          <h4 class="footer-title">Mobile App</h4>
          <div class="app-download-group">
            <a href="#" aria-label="Download auf dem App Store">
              <img src="/images/app-store.png" alt="App Store" class="app-download-img"  title="Jetzt im Google Play Store herunterladen" loading="lazy">
            </a>
            <a href="#" aria-label="Download bei Google Play">
              <img src="/images/google-play.png" alt="Google Play" class="app-download-img" title="Jetzt im Google Play herunterladen" loading="lazy">
            </a>
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
  color: white;
  padding: 2.5rem 0 1.25rem;
  background-color: rgba(165, 165, 165, 0.377);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-content {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

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

/* Certification logos */
.certification-group {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  perspective: 500px;
}

.certification-img {
  height: 50px;
  width: auto;
  max-width: 85px;
  background: white;
  padding: 0.6rem;
  border-radius: 6px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  transform-style: preserve-3d;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.certification-img:hover {
  transform: translateY(-8px) rotateX(10deg);
  box-shadow: 0 12px 20px rgba(0,0,0,0.15);
}

/* Social icons */
.social-icons-group {
  display: flex;
  gap: 1.5rem;
  perspective: 500px;
}

.social-icon {
  font-size: 1.8rem;
  color: #3a7bd5;
  transition: all 0.3s ease;
  text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.social-icon:hover {
  transform: translateY(-5px) rotateX(20deg);
  color: #00d2ff;
}

/* Payment methods */
.payment-methods-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  background: rgba(87, 86, 86, 0.1);
  padding: 0.8rem;
  border-radius: 12px;
  border: 1px dashed rgba(255,255,255,0.3);
}

.payment-methods-group img {
  height: 25px;
  width: auto;
  max-width: 55px;
  opacity: 0.9;
  transition: all 0.3s ease;
  filter: sepia(0.2) contrast(1.1);
}

.payment-methods-group img:hover {
  opacity: 1;
  filter: sepia(0) contrast(1.2);
  transform: scale(1.05) rotate(-2deg);
}

/* Shipping methods */
.shipping-methods-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
}

.shipping-methods-group img {
  height: 35px;
  width: auto;
  max-width: 75px;
  padding: 0.5rem;
  background: rgba(255, 255, 255, 0.9);
  border-radius: 8px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.shipping-methods-group img:hover {
  transform: scale(1.1);
  background: white;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Newsletter */
.newsletter-group {
  max-width: 280px;
}

.newsletter-group .v-text-field {
  background: white;
  color: #333;
  border-radius: 6px;
}

.newsletter-group .v-text-field fieldset {
  border-color: rgba(51, 49, 49, 0.3);
  transition: border-color 0.3s ease;
}

.newsletter-group .v-text-field:hover fieldset {
  border-color: #3a7bd5;
}

.newsletter-group .v-btn {
  background: linear-gradient(to right, #3a7bd5, #00d2ff);
  border: none;
  color: white;
  transition: all 0.3s ease;
  font-weight: 500;
  letter-spacing: 0.5px;
}

.newsletter-group .v-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

/* Footer bottom */
.footer-bottom {
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid var(--footer-border-color);
  text-align: center;
}

.copyright {
  font-size: 0.8rem;
  color: rgba(43, 42, 42, 0.8);
  letter-spacing: 0.5px;
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
    gap: 1.5rem;
  }
  
  .footer-column {
    margin-bottom: 1rem;
  }

  .app-download-group {
    flex-direction: row;
    justify-content: flex-start;
  }

  .app-download-img {
    height: 40px;
    max-width: 120px;
  }
}

@media (max-width: 480px) {
  .footer-main {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .footer-title {
    font-size: 1rem;
  }
  
  .certification-group,
  .payment-methods-group,
  .shipping-methods-group {
    justify-content: center;
  }

  .app-download-group {
    justify-content: center;
  }
}

/* Animation */
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

.social-icon:hover {
  animation: float 1.5s ease-in-out infinite;
}
</style>