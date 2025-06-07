<template>
  <footer class="mobile-footer">
    <div class="footer-sections">
      <!-- Sections accordéon -->
      <div class="footer-section" v-for="section in sections" :key="section.title">
        <button class="section-header" @click="toggleSection(section.title)">
          <h3>{{ section.title }}</h3>
          <span class="toggle-icon">{{ isOpen(section.title) ? '−' : '+' }}</span>
        </button>
        <div class="section-content" v-if="isOpen(section.title)">
  <ul v-if="section.links && section.links.length">
    <li v-for="(link, index) in section.links" :key="index">
      <a :href="link.url" :aria-label="link.text">{{ link.text }}</a>
    </li>
  </ul>
  
  <div v-if="section.social" class="social-icons">
    <a href="#" aria-label="Facebook"><v-icon>mdi-facebook</v-icon></a>
    <a href="#" aria-label="Linkedin"><v-icon>mdi-linkedin</v-icon></a>
    <a href="#" aria-label="Instagram"><v-icon>mdi-instagram</v-icon></a>
    <a href="#" aria-label="WhatsApp"><v-icon>mdi-whatsapp</v-icon></a>
  </div>
  
  <div v-if="section.payment" class="payment-methods">
    <img src="/images/payment/visa.png" alt="Visa" loading="lazy">
    <img src="/images/payment/mastercard.png" alt="Mastercard" loading="lazy">
    <img src="/images/payment/paypal.png" alt="PayPal" loading="lazy">
    <img src="/images/payment/sepa.png" alt="SEPA" loading="lazy">
    <img src="/images/payment/sofort.png" alt="Sofortüberweisung" title="Sofortüberweisung" loading="lazy">
  </div>
  
  <div v-if="section.shipping" class="shipping-methods">
    <img src="/images/shipping/dhl.png" alt="DHL" loading="lazy">
    <img src="/images/shipping/dpd.png" alt="DPD" loading="lazy">
    <img src="/images/shipping/db_schenk.svg" alt="DB Schenker" loading="lazy">
    <img src="/images/shipping/ups.png" alt="UPS" loading="lazy">
    <img src="/images/shipping/hermes.png" alt="Hermes" loading="lazy">
  </div>
</div>
      </div>
    </div>

    <div class="mobile-essentials">
      <div class="essentials-group">
        <div class="certifications">
            <img src="/images/certifications/iso-13485.png" alt="ISO 13485" loading="lazy">
            <img src="/images/certifications/tuv-certified.png" alt="TÜV Certified" loading="lazy">
            <img src="/images/certifications/dguv-certified.png" alt="DGUV Certified" loading="lazy">
            
        </div>
        
        <div class="app-download">
          <h4>Unsere App</h4>
          <div class="app-buttons">
            <a href="#" aria-label="App Store">
              <img src="/images/apps/app-store.png" alt="App Store" loading="lazy">
            </a>
            <a href="#" aria-label="Google Play">
              <img src="/images/apps/google-play.png" alt="Google Play" loading="lazy">
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="mobile-copyright">
      © {{ new Date().getFullYear() }} {{ companyName }} | Alle Rechte vorbehalten
    </div>
  </footer>
</template>

<script>
export default {
  props: {
    companyName: {
      type: String,
      default: 'Company Name'
    },
    sections: {
      type: Array,
      required: true,
      default: () => [
        {
          title: 'Unternehmen',
          links: [
            { text: 'Über uns', url: '/about' },
            { text: 'Karriere', url: '/careers' }
          ]
        },
        {
          title: 'Social Media',
          social: true,
          links: []
        },
        {
          title: 'Zahlungsarten', 
          payment: true,
          links: []
        }
      ]
    },
    initiallyOpen: {
      type: Array,
      default: () => ['Informationen']
    }
  },
  data() {
    return {
      openSections: this.initiallyOpen
    }
  },
  methods: {
    toggleSection(title) {
      if (this.isOpen(title)) {
        this.openSections = this.openSections.filter(t => t !== title)
      } else {
        this.openSections.push(title)
      }
    },
    isOpen(title) {
      return this.openSections.includes(title)
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

.mobile-copyright {
  text-align: center;
  padding: 16px 0 0;
  color: #666;
  font-size: 12px;
  border-top: 1px solid #e0e0e0;
  margin-top: 16px;
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