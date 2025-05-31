<template>
  <footer class="social-footer">
    <div class="footer-content">
      <!-- Première rangée - Contenu principal -->
      <div class="footer-main">
        <!-- Colonne Entreprise -->
        <div class="footer-column">
          <h4 class="footer-title">Unternehmen</h4>
          <ul class="footer-links">
            <li><a href="/about">Über uns</a></li>
            <li><a href="/careers">Karriere</a></li>
            <li><a href="/news">News</a></li>
          </ul>
          
          <h4 class="footer-subtitle">Zertifizierungen</h4>
          <div class="certifications">
            <img src="/images/iso-13485.png" alt="ISO 13485" class="certification-img">
            <img src="/images/tuv-certified.png" alt="TÜV Certified" class="certification-img">
            <img src="/images/dguv-certified.png" alt="dguv Certified" class="certification-img">
          </div>
        </div>

        <!-- Colonne Services -->
        <div class="footer-column">
          <h4 class="footer-title">Dienstleistungen</h4>
          <ul class="footer-links">
            <li><a href="/inspections">Prüfungen</a></li>
            <li><a href="/calibration">Kalibrierung</a></li>
            <li><a href="/maintenance">Wartung</a></li>
          </ul>
          
          <h4 class="footer-subtitle">Social Media</h4>
          <div class="social-links">
            <a href="#" class="social-icon"><v-icon>mdi-facebook</v-icon></a>
            <a href="#" class="social-icon"><v-icon>mdi-linkedin</v-icon></a>
            <a href="#" class="social-icon"><v-icon>mdi-instagram</v-icon></a>
          </div>
        </div>

        <!-- Colonne Support -->
        <div class="footer-column">
          <h4 class="footer-title">Support</h4>
          <ul class="footer-links">
            <li><a href="/contact">Kontakt</a></li>
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/emergency">Notdienst</a></li>
          </ul>
          
          <h4 class="footer-subtitle">Zahlungsarten</h4>
           <div class="payment-methods">
                <div class="payment-icon">
                    <img src="/images/payment/visa.png" alt="Visa" title="Visa">
                </div>
                <div class="payment-icon">
                    <img src="/images/payment/paypal.png" alt="PayPal" title="PayPal">
                </div>
                <div class="payment-icon">
                    <img src="/images/payment/sepa.png" alt="SEPA Überweisung" title="SEPA Überweisung">
                </div>
                <div class="payment-icon">
                    <img src="/images/payment/sofort.png" alt="Sofortüberweisung" title="Sofortüberweisung">
                </div>
               
                </div>
        </div>

        <!-- Colonne Informations -->
        <div class="footer-column">
          <h4 class="footer-title">Informationen</h4>
          <ul class="footer-links">
            <li><a href="/terms">AGB</a></li>
            <li><a href="/privacy">Datenschutz</a></li>
            <li><a href="/imprint">Impressum</a></li>
            <li><a href="/returns">Widerrufsrecht</a></li>
          </ul>
        </div>

        <!-- Colonne Produits & Newsletter -->
        <div class="footer-column">
          <h4 class="footer-title">Produkte</h4>
          <ul class="footer-links">
            <li><a href="/products">Alle Produkte</a></li>
            <li><a href="/new">Neuheiten</a></li>
            <li><a href="/specials">Angebote</a></li>
          </ul>
          
          <h4 class="footer-subtitle">Fachnewsletter</h4>
          <div class="newsletter">
            <v-text-field 
              placeholder="Ihre E-Mail" 
              dense 
              outlined
              hide-details
            ></v-text-field>
            <v-btn color="primary" small class="mt-2">Anmelden</v-btn>
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
  // Le composant n'a pas besoin de données ou de méthodes spécifiques pour ce footer statique
}
</script>

<style scoped>
.social-footer {
  background-color: rgba(12, 72, 129, 0.95);
  color: white;
  padding: 40px 0 20px;
}

.footer-content {
  max-width: 100%;
  margin: 0;
  padding: 0;
}

.footer-main {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 30px;
  padding: 0 80px; /* Ajoute un peu d'espace sur les bords */
}

.footer-column {
  display: flex;
  flex-direction: column;
}

.footer-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 15px;
  color: white;
  border-bottom: 2px solid rgba(255,255,255,0.2);
  padding-bottom: 8px;
}

.footer-subtitle {
  font-size: 1rem;
  font-weight: 500;
  margin: 25px 0 15px;
  color: rgba(255,255,255,0.9);
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 10px;
}

.footer-links a {
  color: rgba(255,255,255,0.7);
  text-decoration: none;
  font-size: 0.9rem;
  transition: color 0.2s;
}

.footer-links a:hover {
  color: white;
  text-decoration: underline;
}

.certifications {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.certification-img {
  height: 50px;
  width: auto;
  max-width: 100px;
  background: white;
  padding: 5px;
  border-radius: 4px;
}

.social-links {
  display: flex;
  gap: 15px;
}

.social-icon {
  color: white;
  transition: transform 0.2s;
}

.social-icon:hover {
  transform: translateY(-2px);
}

.newsletter {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.footer-bottom {
  margin-top: 40px;
  padding-top: 20px;
  border-top: 1px solid rgba(255,255,255,0.1);
}

.copyright {
  font-size: 0.75rem;
  color: rgba(255,255,255,0.6);
  text-align: center;
}


/** Payement */
.payment-methods {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  align-items: center;
}

.payment-icon {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.payment-icon img {
  max-width: 100%;
  max-height: 100%;
  filter: brightness(0) invert(1);
  opacity: 0.8;
  transition: opacity 0.3s ease;
}

.payment-icon:hover img {
  opacity: 1;
}

@media (max-width: 768px) {
  .footer-main {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
}

@media (max-width: 480px) {
  .footer-main {
    grid-template-columns: 1fr;
  }
  
  .footer-column {
    margin-bottom: 20px;
  }
}
</style>