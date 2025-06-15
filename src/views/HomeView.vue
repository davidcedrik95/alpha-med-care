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
              <li><i class="fas fa-check"></i> Professionelle Beratung</li>
              <li><i class="fas fa-check"></i> Schnelle Lieferung</li>
              <li><i class="fas fa-check"></i> Kompetenter Service</li>
            </ul>
            <a href="#" class="btn btn-primary btn-shop">Zum Shop</a>
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
        </div>
      </div>
    </section>

    <!-- Testimonials Mobile Optimisé -->
    <section class="testimonials-section">
      <div class="container">
        <div class="section-title">
          <h2>Kundenstimmen</h2>
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
/* Base Mobile-First Styles */
.container {
  width: 100%;
  padding: 0 15px;
  box-sizing: border-box;
}

/* Hero Banner Mobile Optimisé */
.hero-banner {
  padding: 40px 0 30px;
  background: linear-gradient(135deg, #f8f9fa 0%, #e9f0f5 100%);
  position: relative;
  overflow: hidden;
}

.hero-content {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.hero-text {
  order: 2;
  text-align: center;
}

.tagline {
  display: inline-block;
  background-color: #0056b3;
  color: white;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 600;
  margin-bottom: 15px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.hero-text h1 {
  font-size: 1.8rem;
  font-weight: 700;
  line-height: 1.3;
  margin-bottom: 15px;
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
  bottom: 3px;
  left: 0;
  width: 100%;
  height: 6px;
  background-color: rgba(0, 86, 179, 0.2);
  z-index: -1;
}

.hero-description {
  font-size: 1rem;
  line-height: 1.5;
  color: #555;
  margin-bottom: 25px;
  max-width: 100%;
}

.cta-buttons {
  display: flex;
  flex-direction: column;
  gap: 12px;
  margin-bottom: 30px;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 12px 20px;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  font-size: 0.95rem;
  width: 100%;
  box-sizing: border-box;
}

.btn i {
  margin-left: 8px;
  transition: transform 0.3s ease;
}

.btn-primary {
  background-color: #0056b3;
  color: white;
  box-shadow: 0 4px 10px rgba(0, 86, 179, 0.3);
}

.btn-primary:hover {
  background-color: #004494;
  transform: translateY(-2px);
}

.btn-secondary {
  background-color: white;
  color: #0056b3;
  border: 2px solid #0056b3;
}

.btn-secondary:hover {
  background-color: #f0f6ff;
}

.btn-secondary i {
  margin-right: 8px;
  margin-left: 0;
}

.trust-badges {
  display: flex;
  justify-content: center;
  gap: 15px;
  flex-wrap: wrap;
}

.badge {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.8rem;
  color: #555;
  white-space: nowrap;
}

.badge i {
  color: #0056b3;
  font-size: 1rem;
}

/* Hero Visual Mobile */
.hero-visual {
  order: 1;
  position: relative;
  margin-bottom: 20px;
}

.image-container {
  position: relative;
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
}

.main-image {
  width: 100%;
  height: auto;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.floating-logo {
  position: absolute;
  top: -15px;
  right: -10px;
  width: 80px;
  height: auto;
  background: white;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.stats-card {
  position: absolute;
  bottom: -20px;
  left: 10px;
  background: white;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  display: flex;
  gap: 20px;
}

.stat-item {
  text-align: center;
}

.stat-number {
  font-size: 1.3rem;
  font-weight: 700;
  color: #0056b3;
  line-height: 1;
}

.stat-label {
  font-size: 0.7rem;
  color: #666;
  margin-top: 3px;
}

/* Scroll Indicator */
.scroll-indicator {
  display: flex;
  justify-content: center;
  margin-top: 20px;
  cursor: pointer;
}

.scroll-indicator i {
  font-size: 1.8rem;
  color: #0056b3;
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-8px);
  }
  60% {
    transform: translateY(-4px);
  }
}

/* Services Section Mobile Optimisé */
.services-section {
  padding: 50px 0;
  background-color: #fff;
}

.section-title {
  margin-bottom: 30px;
  text-align: center;
}

.section-title h2 {
  color: #333;
  font-size: 1.5rem;
  font-weight: 700;
  position: relative;
  display: inline-block;
  padding: 0 20px;
}

.section-title h2::before,
.section-title h2::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 30px;
  height: 2px;
  background-color: #0056b3;
}

.section-title h2::before {
  left: -30px;
}

.section-title h2::after {
  right: -30px;
}

.services-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
}

.service-card {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border: 1px solid #eee;
}

.service-card.expanded {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.service-image-container {
  height: 160px;
  overflow: hidden;
  position: relative;
}

.service-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.service-card:hover .service-image {
  transform: scale(1.03);
}

.service-content {
  padding: 15px;
}

.service-content h3 {
  margin: 0 0 10px 0;
  color: #333;
  font-size: 1.1rem;
  font-weight: 600;
  position: relative;
  padding-left: 12px;
}

.service-content h3::before {
  content: '';
  position: absolute;
  left: 0;
  top: 5px;
  bottom: 5px;
  width: 3px;
  background-color: #0056b3;
  border-radius: 2px;
}

.service-content p {
  color: #666;
  margin: 0;
  line-height: 1.5;
  font-size: 0.9rem;
}

.service-footer {
  padding: 12px 15px;
  background-color: #f8f9fa;
  border-top: 1px solid #eee;
}

.service-link {
  display: inline-flex;
  align-items: center;
  color: #0056b3;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  font-size: 0.9rem;
}

.service-link span {
  margin-right: 6px;
}

.service-link i {
  transition: transform 0.3s ease;
  font-size: 0.8rem;
}

.service-link:hover {
  color: #003d7a;
}

.service-link:hover i {
  transform: translateX(3px);
}

/* Brands Section Mobile Optimisé */
.brands-section {
  padding: 50px 0;
  background-color: #f9f9f9;
}

.brands-section h2 {
  margin-bottom: 30px;
  color: #333;
  font-size: 1.5rem;
}

.brands-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  align-items: center;
  padding: 0 10px;
}

.brand-logo {
  max-width: 80%;
  height: auto;
  max-height: 50px;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
  margin: 0 auto;
  display: block;
}

.brand-logo:hover {
  filter: grayscale(0);
  opacity: 1;
}

/* Shop Preview Mobile Optimisé */
.shop-preview {
  padding: 50px 0;
  background-color: #0056b3;
  color: white;
}

.shop-content {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.shop-text {
  text-align: center;
}

.shop-text h2 {
  margin-bottom: 15px;
  font-size: 1.5rem;
}

.shop-text p {
  margin-bottom: 20px;
  font-size: 1rem;
  line-height: 1.5;
}

.feature-list {
  list-style: none;
  padding: 0;
  margin-bottom: 25px;
  text-align: left;
  max-width: 300px;
  margin-left: auto;
  margin-right: auto;
}

.feature-list li {
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  font-size: 0.95rem;
}

.feature-list i {
  margin-right: 10px;
  color: #4CAF50;
  font-size: 0.9rem;
}

.btn-shop {
  display: inline-block;
  background-color: white;
  color: #0056b3;
  border: none;
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  font-size: 0.95rem;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.btn-shop:hover {
  background-color: #f0f6ff;
  transform: translateY(-2px);
}

/* Shop Carousel Mobile */
.shop-image-carousel {
  order: -1;
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  max-width: 100%;
  margin: 0 auto;
}

.carousel-container {
  position: relative;
  width: 100%;
  height: 220px;
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
}

.carousel-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(255, 255, 255, 0.8);
  color: #0056b3;
  border: none;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 10;
  transition: all 0.3s ease;
}

.carousel-button:hover {
  background-color: white;
}

.carousel-button.prev {
  left: 10px;
}

.carousel-button.next {
  right: 10px;
}

.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  gap: 8px;
  z-index: 10;
}

.carousel-indicators button {
  width: 8px;
  height: 8px;
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

/* Testimonials Mobile Optimisé */
.testimonials-section {
  padding: 50px 0;
  background-color: #fff;
  overflow: hidden;
}

.testimonials-wrapper {
  position: relative;
  max-width: 100%;
  margin: 0 auto;
}

.testimonials-container {
  overflow: hidden;
  padding: 0 15px;
}

.testimonials-track {
  display: flex;
  transition: transform 0.5s ease;
  will-change: transform;
}

.testimonial {
  flex: 0 0 100%;
  padding: 0 10px;
  box-sizing: border-box;
}

.testimonial-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
  height: 100%;
  min-height: 200px;
  display: flex;
  flex-direction: column;
}

.testimonial-author {
  display: flex;
  flex-direction: column;
  text-align: center;
  margin-top: 10px;
  font-style: italic;
  color: #666;
  font-size: 0.85rem;
}

.full-quote {
  white-space: normal;
  margin-bottom: 15px;
  text-align: center;
  color: #555;
  font-style: italic;
  line-height: 1.5;
  flex-grow: 1;
  font-size: 0.95rem;
}

.testimonial-controls {
  display: flex;
  justify-content: center;
  gap: 20px;
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

.carousel-button:hover {
  background: #003d7a;
}

.carousel-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.carousel-button i {
  font-size: 20px;
}

.rating-stars {
  margin-bottom: 10px;
  font-size: 1rem;
  display: flex;
  justify-content: center;
  gap: 2px;
}

/* FAQ Section Mobile Optimisé */
.faq-section {
  padding: 50px 0;
  background-color: #f8f9fa;
}

.faq-container {
  max-width: 100%;
  margin: 0 auto;
}

.faq-item {
  margin-bottom: 12px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  background-color: white;
  transition: all 0.3s ease;
}

.faq-item.active {
  box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
}

.faq-question {
  padding: 15px;
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
  font-size: 1rem;
  color: #0056b3;
  font-weight: 600;
  flex: 1;
}

.faq-question i {
  color: #0056b3;
  transition: transform 0.3s ease;
  margin-left: 10px;
  font-size: 0.9rem;
}

.faq-answer {
  padding: 0 15px;
  max-height: 0;
  overflow: hidden;
  transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
  padding: 0 15px 15px 15px;
  max-height: 500px;
}

.faq-item.active .faq-question i {
  transform: rotate(180deg);
}

.faq-answer p {
  padding: 0 0 15px 0;
  margin: 0;
  color: #555;
  line-height: 1.5;
  font-size: 0.9rem;
}

/* Contact CTA Mobile Optimisé */
.contact-cta {
  padding: 60px 0;
  text-align: center;
  background: linear-gradient(rgba(0, 86, 179, 0.9), rgba(0, 86, 179, 0.9)), url('/images/cta-bg.jpg');
  background-size: cover;
  background-position: center;
  color: white;
}

.contact-cta h2 {
  margin-bottom: 15px;
  font-size: 1.5rem;
}

.contact-cta p {
  margin-bottom: 25px;
  font-size: 1rem;
  max-width: 100%;
  padding: 0 20px;
}

/* Tablet Styles */
@media (min-width: 768px) {
  .container {
    padding: 0 20px;
  }
  
  .hero-banner {
    padding: 60px 0 40px;
  }
  
  .hero-text h1 {
    font-size: 2.2rem;
  }
  
  .hero-description {
    font-size: 1.1rem;
  }
  
  .cta-buttons {
    flex-direction: row;
    justify-content: center;
  }
  
  .btn {
    width: auto;
    padding: 12px 25px;
  }
  
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .brands-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  
  .shop-content {
    flex-direction: row;
    align-items: center;
  }
  
  .shop-text {
    text-align: left;
    flex: 1;
  }
  
  .shop-image-carousel {
    order: 0;
    flex: 1;
  }
  
  .feature-list {
    margin-left: 0;
    margin-right: 0;
  }
  
  .testimonial {
    flex: 0 0 50%;
  }
  
  .carousel-container {
    height: 280px;
  }
}

/* Desktop Styles */
@media (min-width: 1024px) {
  .hero-content {
    flex-direction: row;
    align-items: center;
  }
  
  .hero-text {
    order: 0;
    text-align: left;
    flex: 1;
  }
  
  .hero-visual {
    order: 1;
    flex: 1;
  }
  
  .hero-text h1 {
    font-size: 2.5rem;
  }
  
  .hero-description {
    max-width: 90%;
    margin-left: 0;
  }
  
  .cta-buttons {
    justify-content: flex-start;
  }
  
  .services-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  
  .brands-grid {
    grid-template-columns: repeat(6, 1fr);
  }
  
  .testimonial {
    flex: 0 0 calc(100% / 3);
  }
  
  .carousel-container {
    height: 320px;
  }
}
</style>