<!-- MobileFooter.vue -->
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
          <ul v-if="section.links.length">
            <li v-for="(link, index) in section.links" :key="index">
              <a :href="link.url" :aria-label="link.text">{{ link.text }}</a>
            </li>
          </ul>
          
          <div v-if="section.social" class="social-icons">
            <a href="#" aria-label="Facebook"><v-icon>mdi-facebook</v-icon></a>
            <a href="#" aria-label="Linkedin"><v-icon>mdi-linkedin</v-icon></a>
            <a href="#" aria-label="Instagram"><v-icon>mdi-instagram</v-icon></a>
          </div>
          
          <div v-if="section.payment" class="payment-methods">
            <img src="/images/payment/visa.png" alt="Visa" loading="lazy">
            <img src="/images/payment/paypal.png" alt="PayPal" loading="lazy">
            <img src="/images/payment/SEPA.png" alt="SEPA" loading="lazy">
          </div>
        </div>
      </div>
    </div>

    <div class="mobile-essentials">
      <div class="essentials-group">
        <div class="certifications">
          <img src="/images/iso-13485.png" alt="ISO 13485" loading="lazy">
          <img src="/images/tuv-certified.png" alt="TÜV Certified" loading="lazy">
        </div>
        
        <div class="app-download">
          <h4>Unsere App</h4>
          <div class="app-buttons">
            <a href="#" aria-label="App Store">
              <img src="/images/app-store.png" alt="App Store" loading="lazy">
            </a>
            <a href="#" aria-label="Google Play">
              <img src="/images/google-play.png" alt="Google Play" loading="lazy">
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
      required: true
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
        this.openSections = this.openSections.filter(t => t !== title);
      } else {
        this.openSections.push(title);
      }
    },
    isOpen(title) {
      return this.openSections.includes(title);
    }
  }
}
</script>

<style scoped>
.mobile-footer {
  background-color: #f5f5f5;
  padding: 0 1rem 1rem;
}

.footer-sections {
  margin-bottom: 1.5rem;
}

.footer-section {
  border-bottom: 1px solid #e0e0e0;
}

.section-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 1rem 0;
  background: none;
  border: none;
  text-align: left;
  cursor: pointer;
}

.section-header h3 {
  margin: 0;
  font-size: 1rem;
  font-weight: 600;
  color: #333;
}

.toggle-icon {
  font-size: 1.2rem;
  font-weight: bold;
  color: #666;
}

.section-content {
  padding: 0 0 1rem;
}

.section-content ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.section-content li {
  padding: 0.5rem 0;
}

.section-content a {
  color: #555;
  text-decoration: none;
  font-size: 0.9rem;
  display: block;
  padding: 0.3rem 0;
  transition: color 0.2s;
}

.section-content a:hover {
  color: #3a7bd5;
}

.social-icons {
  display: flex;
  gap: 1.5rem;
  padding: 1rem 0 0;
}

.social-icons a {
  color: #555;
  font-size: 1.8rem;
}

.payment-methods {
  display: flex;
  gap: 0.8rem;
  flex-wrap: wrap;
  padding: 1rem 0 0;
}

.payment-methods img {
  height: 25px;
  max-width: 50px;
  object-fit: contain;
}

.mobile-essentials {
  background: rgba(0,0,0,0.03);
  border-radius: 12px;
  padding: 1.5rem;
  margin: 1rem 0;
}

.essentials-group {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.certifications {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  justify-content: center;
}

.certifications img {
  height: 40px;
  max-width: 80px;
  background: white;
  padding: 0.5rem;
  border-radius: 4px;
}

.app-download {
  text-align: center;
}

.app-download h4 {
  margin-bottom: 0.8rem;
  font-size: 1rem;
  color: #333;
}

.app-buttons {
  display: flex;
  justify-content: center;
  gap: 0.8rem;
}

.app-buttons img {
  height: 40px;
  max-width: 120px;
}

.mobile-copyright {
  text-align: center;
  padding: 1rem 0 0;
  color: #666;
  font-size: 0.8rem;
  border-top: 1px solid #e0e0e0;
}
</style>