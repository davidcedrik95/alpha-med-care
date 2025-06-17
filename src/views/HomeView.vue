<template>
  <div class="home-view">
    <!-- Hero Banner Mobile Optimisé -->
    <section class="hero-banner">
      <div class="container">
        <div class="hero-content">
          <div class="hero-text">
            <div class="tagline">Präzision & Expertise</div>
            <h1>Medizintechnik auf <span class="highlight">Höchstniveau</span></h1>
            <p class="hero-description">Alpha-Med-Care bietet umfassende Lösungen für Prüfung, Kalibrierung und Wartung medizinischer Geräte.</p>
            
            <div class="cta-buttons">
              <a href="#services" class="btn btn-primary">
                <span>Unsere Services</span>
                <i class="fas fa-arrow-right"></i>
              </a>
              <a href="tel:+49123456789" class="btn btn-secondary">
                <i class="fas fa-phone-alt"></i>
                <span>Anrufen</span>
              </a>
            </div>
            
            <div class="trust-badges">
              <div class="badge">
                <i class="fas fa-check-circle"></i>
                <span>Zertifiziert</span>
              </div>
              <div class="badge">
                <i class="fas fa-shield-alt"></i>
                <span>MPBetreibV</span>
              </div>
            </div>
          </div>
          
          <div class="hero-visual">
            <div class="image-container">
              <img src="/images/shop/products2.png" alt="Medizinische Geräte" class="main-image">
              <img src="/images/logo.png" alt="Alpha-Med-Care Logo" class="floating-logo">
              
              <div class="stats-card">
                <div class="stat-item">
                  <div class="stat-number">15+</div>
                  <div class="stat-label">Jahre</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">500+</div>
                  <div class="stat-label">Kunden</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="scroll-indicator" @click="scrollToNextSection">
        <i class="mdi mdi-chevron-double-down"></i>
      </div>
    </section>

    <!-- Services Section Mobile Optimisé -->
    <section id="services" class="services-section">
      <div class="container">
        <div class="section-title">
          <h2>Dienstleistungen</h2>
        </div>
        <div class="services-grid">
          <div class="service-card" v-for="service in services" :key="service.title" @click="toggleServiceCard($event)">
            <div class="service-image-container">
              <img :src="service.image" :alt="service.title" class="service-image">
            </div>
            <div class="service-content">
              <h3>{{ service.title }}</h3>
              <p>{{ service.description }}</p>
            </div>
            <div class="service-footer">
              <a href="#" class="service-link">
                <span>Details</span>
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Brands Mobile Optimisé -->
    <section class="brands-section">
      <div class="container">
        <div class="section-title">
          <h2>Markenpartner</h2>
        </div>
        <div class="brands-grid">
          <a v-for="brand in featuredBrands" :key="brand.name" :href="brand.url" target="_blank" rel="noopener">
            <img :src="brand.logo" :alt="brand.name" class="brand-logo">
          </a>
        </div>
      </div>
    </section>

    <!-- Shop Preview Mobile Optimisé -->
<section id="shop" class="shop-preview">
  <div class="container">
    <div class="shop-content">
      <div class="shop-text">
        <h2>Online-Shop</h2>
        <p>Qualitätsprodukte für medizinische Einrichtungen</p>
        <ul class="feature-list">
  <li>
    <span class="feature-icon"><i class="fas fa-check"></i></span>
    <span class="feature-text">Professionelle Beratung</span>
  </li>
  <li>
    <span class="feature-icon"><i class="fas fa-check"></i></span>
    <span class="feature-text">Schnelle Lieferung</span>
  </li>
  <li>
    <span class="feature-icon"><i class="fas fa-check"></i></span>
    <span class="feature-text">Kompetenter Service</span>
  </li>
</ul>
      </div>
      
      <div class="shop-image-carousel">
        <div class="carousel-container">
          <div class="carousel-track" :style="carouselTrackStyle">
            <div class="carousel-slide" v-for="(image, index) in shopImages" :key="index">
              <img :src="image.src" :alt="image.alt" class="carousel-image">
            </div>
          </div>
          <button class="carousel-button prev" @click="prevShopImage">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="carousel-button next" @click="nextShopImage">
            <i class="fas fa-chevron-right"></i>
          </button>
          <div class="carousel-indicators">
            <button 
              v-for="(image, index) in shopImages" 
              :key="index" 
              @click="goToShopImage(index)"
              :class="{ active: currentShopImageIndex === index }"
            ></button>
          </div>
        </div>
      </div>
      
      <a href="#" class="btn btn-primary btn-shop mobile-shop-btn">Zum Shop</a>
    </div>
  </div>
</section>
   
  <!-- Testimonials Section -->
<section class="testimonials-section">
  <div class="container">
    <div class="section-title">
      <h2>Was unsere Kunden sagen</h2>
    </div>
    <div class="testimonials-wrapper">
      <div class="testimonials-container">
        <div class="testimonials-track" ref="track" :style="trackStyle">
          <div class="testimonial" 
               v-for="(testimonial, index) in testimonials" 
               :key="index">
            <div class="testimonial-content">
              <div class="rating-stars">
                <i v-for="star in 5" :key="star" 
                   class="mdi" 
                   :class="getStarClass(star, testimonial.rating)"
                   :style="{ color: star <= testimonial.rating || (star - 0.5 <= testimonial.rating) ? '#FFD700' : '#ddd' }"></i>
              </div>
              <p class="full-quote">"{{ testimonial.quote }}"</p>
              <div class="testimonial-author">
                <span>{{ testimonial.city }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="testimonial-controls">
        <button class="carousel-button prev" @click="prevTestimonial" :disabled="currentTestimonialIndex === 0">
          <i class="mdi mdi-chevron-left"></i>
        </button>
        <button class="carousel-button next" @click="nextTestimonial" :disabled="currentTestimonialIndex >= maxTestimonials">
          <i class="mdi mdi-chevron-right"></i>
        </button>
      </div>
    </div>
  </div>
</section>

    <!-- FAQ Section Mobile Optimisé -->
    <section class="faq-section">
      <div class="container">
        <div class="section-title">
          <h2>Häufige Fragen</h2>
        </div>
        <div class="faq-container">
          <div class="faq-item" 
               v-for="(faq, index) in faqs" 
               :key="index"
               :class="{ active: activeFaqIndex === index }"
               @click="toggleFaq(index)">
            <div class="faq-question">
              <h3>{{ faq.question }}</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              <p>{{ faq.answer }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

     <!-- Bereich "Einsatzgebiete" -->
  <section class="domains-section">
    <div class="container">
      <div class="section-title">
        <h2>Unsere Einsatzgebiete</h2>
        <p>Medizinische Spezialisierungen und unterstützte Geräte</p>
      </div>
      
      <div class="domains-grid">
        <div class="domain-card" v-for="domain in medicalDomains" :key="domain.title">
          <div class="domain-icon">
            <i :class="domain.icon"></i>
          </div>
          <h3>{{ domain.title }}</h3>
          <ul class="equipment-list">
            <li v-for="(equipment, index) in domain.equipments" :key="index">
              <i class="fas fa-check-circle"></i>
              <span>{{ equipment }}</span>
            </li>
          </ul>
          <a :href="domain.link" class="domain-link">
            <span>Mehr erfahren</span>
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Bereich "Normen & Zertifizierungen" -->
  <section class="standards-section">
    <div class="container">
      <div class="section-title">
        <h2>Normen & Zertifizierungen</h2>
        <p>Einhaltung deutscher und internationaler Vorschriften</p>
      </div>
      
      <div class="standards-container">
        <div class="standards-content">
          <p>Wir garantieren die strikte Einhaltung aller relevanten Normen für die Sicherheit Ihrer medizinischen Geräte:</p>
          
          <ul class="standards-list">
            <li v-for="standard in standards" :key="standard.name">
              <div class="standard-badge">
                <i class="fas fa-shield-alt"></i>
              </div>
              <div class="standard-info">
                <h4>{{ standard.name }}</h4>
                <p>{{ standard.description }}</p>
              </div>
            </li>
          </ul>
        </div>
        
        <div class="standards-visual">
          <img src="/images/certifications/iso.png" alt="Medizinische Zertifizierungen" class="standards-image">
          <div class="certification-badges">
            <img src="/images/certifications/dguv-certified.png" alt="ISO Zertifizierung" class="certification-badge">
            <img src="/images/certifications/iso-13485.png" alt="DIN Zertifizierung" class="certification-badge">
             <img src="/images/certifications/tuv-certified.png" alt="DIN Zertifizierung" class="certification-badge">
          </div>
        </div>
      </div>
    </div>
  </section>


    <!-- Contact CTA Mobile Optimisé -->
    <section class="contact-cta">
      <div class="container">
        <div class="cta-content">
          <h2>Interessiert?</h2>
          <p>Kontaktieren Sie uns für ein unverbindliches Angebot</p>
          <a href="#" class="btn btn-primary">Kontakt</a>
        </div>
      </div>
    </section>

    
  </div>

  
</template>

<script>
export default {
  name: 'HomeView',
  data() {
    return {
      activeFaqIndex: null,
      currentTestimonialIndex: 0,
      testimonialWidth: 350,
      currentShopImageIndex: 0,
      carouselInterval: null,
 medicalDomains: [
        {
          title: 'Kardiologie & Pneumologie',
          icon: 'fas fa-heartbeat',
          equipments: [
            'Ergometer',
            'EKG-Geräte',
            'Spirometer',
            'Herzmonitore',
            'Belastungstestgeräte'
          ],
          link: '#kardiologie'
        },
        {
          title: 'Rehabilitation & Physiotherapie',
          icon: 'fas fa-recycle',
          equipments: [
            'Rehabilitationsgeräte',
            'Ergometrische Fahrräder',
            'Stabilisationsplattformen',
            'Traktionssysteme',
            'Mobilitätshilfen'
          ],
          link: '#physiotherapie'
        },
        {
          title: 'Medizinische Diagnostik',
          icon: 'fas fa-stethoscope',
          equipments: [
            'Blutdruckmessgeräte',
            'Thermometer',
            'Pulsoximeter',
            'Blutanalysatoren',
            'Ultraschallgeräte'
          ],
          link: '#diagnostik'
        },
        {
          title: 'Krankenhausausrüstung',
          icon: 'fas fa-hospital',
          equipments: [
            'Desinfektionssysteme',
            'Patientenmonitore',
            'Infusionspumpen',
            'Beatmunsgeräte',
            'Sterile Ausrüstung'
          ],
          link: '#krankenhaus'
        }
      ],
      standards: [
        {
          name: 'MPBetreibV',
          description: 'Konformität mit der deutschen Medizinprodukte-Betreiberverordnung (gesetzlich vorgeschrieben)'
        },
        {
          name: 'DIN EN 60601',
          description: 'Elektrische Sicherheit medizinischer Geräte nach europäischen Normen'
        },
        {
          name: 'ISO 13485',
          description: 'Zertifiziertes Qualitätsmanagementsystem für Medizinprodukte'
        },
        {
          name: 'RoHS-Richtlinie',
          description: 'Einhaltung der Beschränkungen gefährlicher Stoffe in Elektrogeräten'
        }
      ]
    ,
      services: [
        {
          title: 'Prüfungen',
          image: '/images/services/manufacturing.jpg',
          description: 'Prüfungen und mehr für Ihre medizinischen Geräte'
        },
        {
          title: 'Kalibrieren',
          image: '/images/services/kalibrierung.jpg',
          description: 'Präzise Kalibrierung von Ergometern, Thermometern und Blutdruckmessgeräten'
        },
        {
          title: 'Service & Wartung',
          image: '/images/services/medical-equipment-technician.png',
          description: 'Reparaturen, Ersatzteile und regelmäßige Wartung gemäß MPBetreibV'
        },
        {
          title: 'Installation',
          image: '/images/services/installation.png',
          description: 'Fachgerechte Installation, Einweisung und Entsorgung von Altgeräten'
        },
        {
          title: 'Schulungen',
          image: '/images/services/schulung.png',
          description: 'Fachschulungen für Ihr Personal im Umgang mit medizinischen Geräten'
        },
        {
          title: 'Notdienst',
          image: '/images/services/notdienst.png',
          description: '24/7 Notdienst für kritische medizinische Geräte und Systeme'
        }
      ],
      featuredBrands: [
        { name: 'ERGO-FIT', logo: '/images/partners/ergo-fit-logo.png', url: 'https://www.ergo-fit.de/de/' },
        { name: 'amer-sports', logo: '/images/partners/amer-sports-logo.png', url: 'https://www.amersports.com/' },
        { name: 'ergoline', logo: '/images/partners/ergoline-logo.png', url: 'https://www.ergoline.com/de/' },
        { name: 'FREI AG', logo: '/images/partners/frei-ag-logo.png', url: 'https://www.frei-ag.de/' },
        { name: 'hp-cosmos', logo: '/images/partners/hp-cosmos-logo.png', url: 'https://www.hpcosmos.com/' },
        { name: 'star-trac', logo: '/images/partners/star-trac-logo.png', url: 'https://www.motomed.com/' }
      ],
      shopImages: [
        {
          src: '/images/shop/products1.png',
          alt: 'Produktauswahl 1'
        },
        {
          src: '/images/shop/products2.png',
          alt: 'Produktauswahl 2'
        },
        {
          src: '/images/shop/products3.png',
          alt: 'Produktauswahl 3'
        },
        {
          src: '/images/shop/products4.png',
          alt: 'Produktauswahl 4'
        },
        {
          src: '/images/shop/products5.png',
          alt: 'Produktauswahl 5'
        },
        {
          src: '/images/shop/products6.png',
          alt: 'Produktauswahl 6'
        },
      ],
      testimonials: [
        {
          quote: "Ausgezeichneter Service - unsere Geräte dank Alpha-Med-Care immer einsatzbereit. Hocheffiziente Techniker.",
          city: "Heidelberg",
          rating: 5
        },
        {
          quote: "Schnell, kompetent und zuverlässig. Der perfekte Partner für unsere Praxis.",
          city: "München",
          rating: 4.5
        },
        {
          quote: "Präzise Kalibrierung unserer Ergometer. Einwandfreie Ergebnisse und Dokumentation.",
          city: "Berlin",
          rating: 5
        },
        {
          quote: "Vorbeugende Wartung auf höchstem Niveau. Probleme werden frühzeitig erkannt.",
          city: "Hamburg",
          rating: 4.5
        },
        {
          quote: "Praktische Schulungen für unser Team. Klare Unterlagen und kompetente Trainer.",
          city: "Stuttgart",
          rating: 5
        },
        {
          quote: "Notdienst reagierte innerhalb von 2 Stunden bei kritischem Defekt. Unbezahlbar!",
          city: "Köln",
          rating: 5
        }
      ],
      faqs: [
        { 
          question: 'Wie oft müssen medizinische Geräte geprüft werden?', 
          answer: 'Die Prüffrequenz hängt vom Gerätetyp und den gesetzlichen Vorgaben ab. In der Regel sind jährliche Prüfungen erforderlich, bei hochriskanten Geräten können kürzere Intervalle notwendig sein. Wir beraten Sie gerne zu den für Ihre Geräte geltenden Vorschriften.' 
        },
        { 
          question: 'Welche Geräte können Sie kalibrieren?', 
          answer: 'Wir kalibrieren eine Vielzahl medizinischer Geräte, einschließlich Ergometer, Blutdruckmessgeräte, Thermometer und andere diagnostische Geräte gemäß den Herstellerangaben und medizinischen Standards. Unser Team ist für die Kalibrierung aller gängigen medizinischen Trainings- und Therapiegeräte zertifiziert.' 
        },
        { 
          question: 'Bieten Sie Notdienst für defekte Geräte an?', 
          answer: 'Ja, wir bieten einen 24/7 Notdienst für kritische medizinische Geräte an, um Ausfallzeiten zu minimieren und die Patientensicherheit zu gewährleisten. Unser Notdienst ist innerhalb von maximal 4 Stunden vor Ort, in dringenden Fällen auch schneller.' 
        },
        { 
          question: 'Können Sie uns bei der Schulung unseres Personals unterstützen?', 
          answer: 'Absolut. Wir bieten maßgeschneiderte Schulungen für medizinisches Personal im Umgang mit verschiedenen Geräten an, einschließlich Sicherheitsunterweisungen und Bedienungstrainings. Die Schulungen können bei Ihnen vor Ort oder in unseren Schulungsräumen stattfinden.' 
        }
      ]
    }
  },
  computed: {
    maxTestimonials() {
      return Math.max(0, this.testimonials.length - this.visibleTestimonials);
    },
    visibleTestimonials() {
      return window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
    },
    trackStyle() {
      return {
        transform: `translateX(-${this.currentTestimonialIndex * (100 / this.visibleTestimonials)}%)`,
        transition: 'transform 0.5s ease'
      };
    },
    carouselTrackStyle() {
      return {
        transform: `translateX(-${this.currentShopImageIndex * 100}%)`
      }
    }
  },
  methods: {

   goToTestimonial(index) {
      this.currentTestimonialIndex = index;
    },

    toggleFaq(index) {
      this.activeFaqIndex = this.activeFaqIndex === index ? null : index;
    },
    nextTestimonial() {
      if (this.currentTestimonialIndex < this.maxTestimonials) {
        this.currentTestimonialIndex++;
      }
    },
    prevTestimonial() {
      if (this.currentTestimonialIndex > 0) {
        this.currentTestimonialIndex--;
      }
    },
    getStarClass(star, rating) {
      if (star <= rating) return 'mdi-star';
      if (star - 0.5 <= rating) return 'mdi-star-half-full';
      return 'mdi-star-outline';
    },
    handleResize() {
      if (this.currentTestimonialIndex > this.maxTestimonials) {
        this.currentTestimonialIndex = Math.max(0, this.maxTestimonials);
      }
    },
    nextShopImage() {
      this.currentShopImageIndex = (this.currentShopImageIndex + 1) % this.shopImages.length;
      this.resetCarouselInterval();
    },
    prevShopImage() {
      this.currentShopImageIndex = (this.currentShopImageIndex - 1 + this.shopImages.length) % this.shopImages.length;
      this.resetCarouselInterval();
    },
    goToShopImage(index) {
      this.currentShopImageIndex = index;
      this.resetCarouselInterval();
    },
    startCarousel() {
      this.carouselInterval = setInterval(() => {
        this.nextShopImage();
      }, 5000);
    },
    resetCarouselInterval() {
      clearInterval(this.carouselInterval);
      this.startCarousel();
    },
    scrollToNextSection() {
      const nextSection = document.querySelector('.hero-banner').nextElementSibling;
      if (nextSection) {
        nextSection.scrollIntoView({ 
          behavior: 'smooth' 
        });
      }
    },
    toggleServiceCard(event) {
      // Empêche la navigation si on clique sur le lien
      if (event.target.tagName === 'A' || event.target.parentElement.tagName === 'A') {
        return;
      }
      
      const card = event.currentTarget;
      card.classList.toggle('expanded');
    }
  },
  mounted() {
    window.addEventListener('resize', this.handleResize);
    this.startCarousel();
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
    clearInterval(this.carouselInterval);
  }
}
</script>
<style scoped>
/* ==================== */
/* BASE STYLES          */
/* ==================== */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box;
}

.btn {
  display: inline-flex;
  align-items: center;
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn i {
  transition: transform 0.3s ease;
}

.btn-primary {
  background-color: #0056b3;
  color: white;
  box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);
}

.btn-primary:hover {
  background-color: #004494;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 86, 179, 0.4);
}

.btn-secondary {
  background-color: white;
  color: #0056b3;
  border: 2px solid #0056b3;
}

.btn-secondary:hover {
  background-color: #f0f6ff;
  transform: translateY(-2px);
}

.section-title {
  margin-bottom: 50px;
  text-align: center;
  position: relative;
}

.section-title h2 {
  color: #333;
  font-size: 2rem;
  font-weight: 700;
  display: inline-block;
  padding: 0 80px;
  position: relative;
  background-color: #fff;
}

.section-title h2::before,
.section-title h2::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 150px;
  height: 2px;
  background-color: #0056b3;
}

.section-title h2::before {
  left: -150px;
}

.section-title h2::after {
  right: -150px;
}

/* ==================== */
/* HERO BANNER          */
/* ==================== */
.hero-banner {
 padding: 80px 0 80px; /* Augmentez le padding-bottom pour plus d'espace */
  background: linear-gradient(135deg, #f8f9fa 0%, #e9f0f5 100%);
  position: relative;
  overflow: hidden;
}

.hero-content {
  display: flex;
  align-items: center;
  gap: 50px;
}

.hero-text {
  flex: 1;
  position: relative;
  z-index: 2;
}

.tagline {
  display: inline-block;
  background-color: #0056b3;
  color: white;
  padding: 6px 15px;
  border-radius: 30px;
  font-size: 0.9rem;
  font-weight: 600;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.hero-text h1 {
  font-size: 3rem;
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 20px;
  color: #333;
}

.highlight {
  color: #0056b3;
  position: relative;
  display: inline-block;
}

.highlight::after {
  content: '';
  position: absolute;
  bottom: 5px;
  left: 0;
  width: 100%;
  height: 8px;
  background-color: rgba(0, 86, 179, 0.2);
  z-index: -1;
}

.hero-description {
  font-size: 1.2rem;
  line-height: 1.6;
  color: #555;
  margin-bottom: 30px;
  max-width: 90%;
}

.cta-buttons {
  display: flex;
  gap: 15px;
  margin-bottom: 40px;
}

.trust-badges {
  display: flex;
  gap: 20px;
}

.badge {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.9rem;
  color: #555;
}

.badge i {
  color: #0056b3;
  font-size: 1.1rem;
}

.hero-visual {
  flex: 1;
  position: relative;
}

.image-container {
  position: relative;
  width: 100%;
  max-width: 600px;
  margin-left: auto;
}

.main-image {
  width: 100%;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transform: perspective(1000px) rotateY(-10deg);
  transition: transform 0.5s ease;
}

.hero-visual:hover .main-image {
  transform: perspective(1000px) rotateY(-5deg);
}

.floating-logo {
  position: absolute;
  top: -20px;
  right: -20px;
  width: 120px;
  height: auto;
  background: white;
  padding: 15px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  animation: float 6s ease-in-out infinite;
}

.stats-card {
  position: absolute;
  bottom: -30px;
  left: -30px;
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
  display: flex;
  gap: 30px;
}

.stat-item {
  text-align: center;
}

.stat-number {
  font-size: 1.8rem;
  font-weight: 700;
  color: #0056b3;
  line-height: 1;
}

.stat-label {
  font-size: 0.8rem;
  color: #666;
  margin-top: 5px;
}

.scroll-indicator {
  position: absolute;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
  z-index: 10;
   margin-top: 40px; /* Ajoutez cette ligne pour le décalage vers le bas */
}

.scroll-indicator i {
  font-size: 2rem;
  color: #0056b3;
  animation: bounce 2s infinite;
  transition: all 0.3s ease;
}

.scroll-indicator:hover i {
  color: #003d7a;
  transform: scale(1.1);
}

@keyframes float {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { 
    transform: translateX(-50%) translateY(0); 
  }
  40% { 
    transform: translateX(-50%) translateY(-10px); 
  }
  60% { 
    transform: translateX(-50%) translateY(-5px); 
  }
}

/* Pour les écrans mobiles */
@media (max-width: 768px) {
  .scroll-indicator {
    margin-top: 60px; /* Plus d'espace sur mobile si nécessaire */
    bottom: 20px; /* Ajustez selon vos besoins */
  }
}

/* ==================== */
/* SERVICES SECTION     */
/* ==================== */
.services-section {
  padding: 80px 0;
  background-color: #fff;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.service-card {
  background: #fff;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  border: 1px solid #f0f0f0;
  display: flex;
  flex-direction: column;
  border-radius: 8px;
}

.service-image-container {
  height: 200px;
  overflow: hidden;
  position: relative;
  background-color: #f5f5f5;
}

.service-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.service-card:hover .service-image {
  transform: scale(1.05);
}

.service-content {
  padding: 25px;
  flex-grow: 1;
}

.service-content h3 {
  margin: 0 0 15px 0;
  color: #333;
  font-size: 1.3rem;
  text-align: left;
  font-weight: 600;
  position: relative;
  padding-left: 15px;
}

.service-content h3::before {
  content: '';
  position: absolute;
  left: 0;
  top: 5px;
  bottom: 5px;
  width: 4px;
  background-color: #0056b3;
  border-radius: 2px;
}

.service-content p {
  color: #666;
  margin: 0;
  line-height: 1.6;
  text-align: left;
}

.service-footer {
  padding: 15px 25px;
  background-color: #f8f9fa;
  border-top: 1px solid #e9ecef;
  border: #bbb7b7 solid 1px;
}

.service-link {
  display: inline-flex;
  align-items: center;
  color: #0056b3;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  font-size: 0.95rem;
}

.service-link span {
  margin-right: 8px;
}

.service-link:hover {
  color: #003d7a;
}

.service-link:hover i {
  transform: translateX(5px);
}

/* ==================== */
/* BRANDS SECTION       */
/* ==================== */
.brands-section {
  padding: 80px 0;
  text-align: center;
  background-color: #f9f9f9;
}

.brands-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 30px;
  align-items: center;
  max-width: 1000px;
  margin: 0 auto;
}

.brand-logo {
  max-width: 60%;
  height: auto;
  max-height: 80px;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.brand-logo:hover {
  filter: grayscale(0);
  opacity: 1;
}

/* ==================== */
/* SHOP PREVIEW         */
/* ==================== */
.shop-preview {
  padding: 80px 0;
  background-color: #0056b3;
  color: white;
}

.shop-content {
  display: flex;
  align-items: center;
  gap: 50px;
}

.shop-text {
  flex: 1;
}

.shop-text h2 {
  margin-bottom: 20px;
  font-size: 2rem;
}

.shop-text p {
  margin-bottom: 25px;
  font-size: 1.1rem;
  line-height: 1.6;
}

.btn-shop {
  border: solid 1px #ffff;
}
.feature-list {
  list-style: none;
  padding: 0;
  margin: 0 0 30px 0;
  text-align: left;
}

.feature-list li {
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 1.1rem;
}

.feature-icon {
  color: #4CAF50;
  min-width: 20px;
  display: inline-flex;
  justify-content: center;
}

.feature-text {
  flex: 1;
}

/* Styles spécifiques pour mobile */
@media (max-width: 768px) {
  .feature-list {
    text-align: center;
    margin: 0 auto 25px;
    max-width: 300px;
  }
  
  .feature-list li {
    justify-content: center;
    text-align: left;
    gap: 12px;
  }
  
  .feature-icon {
    font-size: 1rem;
  }
  
  .feature-text {
    text-align: left;
  }
}

@media (max-width: 480px) {
  .feature-list li {
    font-size: 1rem;
    gap: 10px;
  }
}

.shop-image-carousel {
  flex: 1;
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: 0 auto;
}

.carousel-container {
  position: relative;
  width: 100%;
  height: 350px;
  overflow: hidden;
}

.carousel-track {
  display: flex;
  height: 100%;
  transition: transform 0.5s ease;
}

.carousel-slide {
  flex: 0 0 100%;
  height: 100%;
  box-sizing: border-box;
}

.carousel-image {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
  border-radius: 4px;
}

.carousel-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(255, 255, 255, 0.7);
  color: #0056b3;
  border: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 10;
  transition: all 0.3s ease;
}

.carousel-button:hover {
  background-color: rgba(255, 255, 255, 0.9);
}

.carousel-button.prev {
  left: 15px;
}

.carousel-button.next {
  right: 15px;
}

.carousel-indicators {
  position: absolute;
  bottom: 20px;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  gap: 10px;
  z-index: 10;
}

.carousel-indicators button {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  background-color: rgba(255, 255, 255, 0.5);
  cursor: pointer;
  transition: all 0.3s ease;
  padding: 0;
}

.carousel-indicators button.active {
  background-color: white;
  transform: scale(1.2);
}

/* Shop Preview Mobile Styles */
@media (max-width: 768px) {
  .shop-preview {
    padding: 60px 0;
  }
  
  .shop-content {
    flex-direction: column;
    gap: 30px;
  }
  
  .shop-text {
    order: 1;
    text-align: center;
  }
  
  .shop-image-carousel {
    order: 2;
    width: 100%;
    max-width: 100%;
  }
  
  .mobile-shop-btn {
    order: 3;
    display: block;
    margin: 0 auto;
    width: fit-content;
  }
  
  
  .carousel-container {
    height: 250px;
  }
}

@media (max-width: 480px) {
  .shop-text h2 {
    font-size: 1.8rem;
  }
  
  .shop-text p {
    font-size: 1rem;
  }
  
  .feature-list li {
    font-size: 1rem;
    justify-content: center;
  }
  
  .carousel-container {
    height: 200px;
  }
}

/* ==================== */
/* TESTIMONIALS         */
/* ==================== */


.testimonials-section {
  padding: 80px 0;
  background-color: #fff;
}

.testimonials-wrapper {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

.testimonials-container {
  overflow: hidden;
  padding: 0 15px;
  margin-bottom: 20px;
}

.testimonials-track {
  display: flex;
  transition: transform 0.5s ease;
}

.testimonial {
  flex: 0 0 calc(100% / 3);
  padding: 0 15px;
  box-sizing: border-box;
}

.testimonial-content {
  background: white;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  height: 100%;
  min-height: 250px;
  display: flex;
  flex-direction: column;
}

.rating-stars {
  margin-bottom: 15px;
  font-size: 1.2rem;
  display: flex;
  justify-content: center;
  gap: 3px;
}

.full-quote {
  margin-bottom: 15px;
  text-align: center;
  color: #555;
  font-style: italic;
  line-height: 1.6;
  flex-grow: 1;
}

.testimonial-author {
  display: flex;
  flex-direction: column;
  text-align: center;
  margin-top: 15px;
  font-style: italic;
  color: #666;
  font-size: 0.9rem;
}

.testimonial-controls {
  display: flex;
  justify-content: center;
  gap: 40px;
  margin-top: 20px;
}

.carousel-button {
  position: relative;
  top: auto;
  transform: none;
  background: #0056b3;
  color: white;
  border: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.carousel-button:hover:not(:disabled) {
  background: #003d7a;
  transform: scale(1.1);
}

.carousel-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

/* Responsive Styles */
@media (max-width: 1024px) {
  .testimonial {
    flex: 0 0 50%;
  }
}

@media (max-width: 768px) {
  .testimonial {
    flex: 0 0 100%;
  }
  
  .testimonial-controls {
    gap: 40px;
  }
  
  .carousel-button {
    width: 36px;
    height: 36px;
  }
}

/* ==================== */
/* FAQ SECTION          */
/* ==================== */
.faq-section {
  padding: 80px 0;
  background-color: #f8f9fa;
}

.faq-container {
  max-width: 800px;
  margin: 0 auto;
}

.faq-item {
  margin-bottom: 15px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background-color: white;
  transition: all 0.3s ease;
}

.faq-item.active {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.faq-question {
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.faq-question:hover {
  background-color: #f1f5ff;
}

.faq-question h3 {
  margin: 0;
  font-size: 1.1rem;
  color: #0056b3;
  font-weight: 600;
  flex: 1;
}

.faq-question i {
  color: #0056b3;
  transition: transform 0.3s ease;
  margin-left: 15px;
}

.faq-answer {
  padding: 0 20px;
  max-height: 0;
  overflow: hidden;
  transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
  padding: 0 20px 20px 20px;
  max-height: 500px;
}

.faq-item.active .faq-question i {
  transform: rotate(180deg);
}

.faq-answer p {
  padding: 0 0 20px 0;
  margin: 0;
  color: #555;
  line-height: 1.6;
}

/* ==================== */
/* CONTACT CTA          */
/* ==================== */
.contact-cta {
  padding: 100px 0;
  text-align: center;
  background: linear-gradient(rgba(0, 86, 179, 0.9), rgba(0, 86, 179, 0.9)), url('/images/cta-bg.jpg');
  background-size: cover;
  background-position: center;
  color: white;
}

.contact-cta h2 {
  margin-bottom: 20px;
  font-size: 2rem;
}

.contact-cta p {
  margin-bottom: 30px;
  font-size: 1.1rem;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

/* ==================== */
/* RESPONSIVE STYLES    */
/* ==================== */
@media (max-width: 1024px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .shop-content {
    gap: 30px;
  }

  .testimonial {
    flex: 0 0 50%;
  }

  .carousel-container {
    height: 300px;
  }
}

@media (max-width: 768px) {
  .hero-content {
    flex-direction: column;
  }
  
  .hero-text h1 {
    font-size: 2rem;
  }
  
  .cta-buttons {
    flex-direction: column;
    gap: 15px;
  }
  
  .section-title h2::before,
  .section-title h2::after {
    width: 60px;
  }
  
  .section-title h2::before {
    left: -70px;
  }
  
  .section-title h2::after {
    right: -70px;
  }

  .testimonial {
    flex: 0 0 100%;
  }
  
  .carousel-button {
    width: 30px;
    height: 30px;
  }
  
  .carousel-button i {
    font-size: 18px;
  }

  .carousel-indicators button {
    width: 8px;
    height: 8px;
  }
}

@media (max-width: 480px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
  
  .section-title h2 {
    font-size: 1.5rem;
    padding: 0 40px;
  }
  
  .brands-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  
  .section-title h2::before,
  .section-title h2::after {
    width: 30px;
  }
  
  .section-title h2::before {
    left: -40px;
  }
  
  .section-title h2::after {
    right: -40px;
  }
  
  .carousel-container {
    height: 250px;
  }
}

.domains-section {
  padding: 80px 0;
  background-color: #f9f9f9;
}

.domains-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  margin-top: 40px;
}

.domain-card {
  background: white;
  border-radius: 12px;
  padding: 30px 25px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  overflow: hidden;
}

.domain-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 86, 179, 0.1);
}

.domain-icon {
  width: 70px;
  height: 70px;
  background: linear-gradient(135deg, #0056b3 0%, #003d7a 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  color: white;
  font-size: 1.8rem;
}

.domain-card h3 {
  color: #333;
  font-size: 1.4rem;
  margin-bottom: 15px;
  font-weight: 600;
}

.equipment-list {
  list-style: none;
  padding: 0;
  margin: 0 0 20px 0;
}

.equipment-list li {
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  color: #555;
}

.equipment-list i {
  color: #0056b3;
  margin-right: 10px;
  font-size: 0.9rem;
}

.domain-link {
  display: inline-flex;
  align-items: center;
  color: #0056b3;
  font-weight: 600;
  text-decoration: none;
  margin-top: 15px;
  transition: color 0.3s ease;
}

.domain-link i {
  margin-left: 8px;
  transition: transform 0.3s ease;
}

.domain-link:hover {
  color: #003d7a;
}

.domain-link:hover i {
  transform: translateX(5px);
}

/* Normes & Conformité Styles */
.standards-section {
  padding: 80px 0;
  background-color: white;
}

.standards-container {
  display: flex;
  gap: 50px;
  align-items: center;
  margin-top: 40px;
}

.standards-content {
  flex: 1;
}

.standards-content p {
  color: #555;
  line-height: 1.6;
  margin-bottom: 30px;
  font-size: 1.1rem;
}

.standards-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.standards-list li {
  display: flex;
  gap: 20px;
  margin-bottom: 25px;
  align-items: flex-start;
}

.standard-badge {
  width: 50px;
  height: 50px;
  background-color: #f0f6ff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #0056b3;
  font-size: 1.2rem;
  flex-shrink: 0;
}

.standard-info h4 {
  color: #333;
  margin: 0 0 5px 0;
  font-size: 1.2rem;
}

.standard-info p {
  color: #666;
  margin: 0;
  font-size: 0.95rem;
  line-height: 1.5;
}

.standards-visual {
  flex: 1;
  position: relative;
}

.standards-image {
  width: 100%;
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.certification-badges {
  position: absolute;
  bottom: -20px;
  right: -20px;
  display: flex;
  gap: 15px;
}

.certification-badge {
  width: 80px;
  height: 80px;
  object-fit: contain;
  background: white;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  border: 1px solid #eee;
}

/* Responsive Styles */
@media (max-width: 1024px) {
  .standards-container {
    flex-direction: column;
  }
  
  .standards-visual {
    margin-top: 40px;
    width: 100%;
  }
  
  .certification-badges {
    right: 0;
  }
}

@media (max-width: 768px) {
  .domains-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 480px) {
  .domains-grid {
    grid-template-columns: 1fr;
  }
  
  .standards-list li {
    flex-direction: column;
    gap: 10px;
  }
  
  .certification-badge {
    width: 60px;
    height: 60px;
  }
}
</style>