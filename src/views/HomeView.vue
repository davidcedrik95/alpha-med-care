<template>
  <div class="home-view">
    <!-- Hero Banner -->
    <section class="hero-banner">
      <div class="container">
        <div class="hero-content">
          <h1>Alpha-Med-Care - Ihr Partner für medizinische Geräte & Dienstleistungen</h1>
          <p>Prüfungen, Kalibrierungen, Service und mehr für medizinische Trainings- und Therapiegeräte</p>
          <div class="cta-buttons">
            <a href="#services" class="btn btn-primary">Unsere Dienstleistungen</a>
            <a href="#shop" class="btn btn-secondary">Zum Online-Shop</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
      <div class="container">
        <div class="section-title">
          <h2>Dienstleistungen/Service</h2>
        </div>
        <div class="services-grid">
          <div class="service-card" v-for="service in services" :key="service.title">
            <div class="service-image-container">
              <img :src="service.image" :alt="service.title" class="service-image">
            </div>
            <div class="service-content">
              <h3>{{ service.title }}</h3>
              <p>{{ service.description }}</p>
            </div>
            <div class="service-footer">
              <a href="#" class="service-link">
                <span>Mehr erfahren</span>
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Brands -->
    <section class="brands-section">
      <div class="container">
        <div class="section-title">
           <h2>Unsere Markenpartner</h2>
        </div>
        <div class="brands-grid">
          <a v-for="brand in featuredBrands" :key="brand.name" :href="brand.url" target="_blank" rel="noopener">
            <img :src="brand.logo" :alt="brand.name" class="brand-logo">
          </a>
        </div>
      </div>
    </section>

    <!-- Shop Preview -->
    <section id="shop" class="shop-preview">
      <div class="container">
        <div class="shop-content">
          <div class="shop-text">
            <h2>Entdecken Sie unseren Online-Shop</h2>
            <p>Qualitätsprodukte von Top-Herstellern für medizinische Einrichtungen, Reha-Zentren und Therapeuten</p>
            <ul class="feature-list">
              <li><i class="fas fa-check"></i> Professionelle Beratung</li>
              <li><i class="fas fa-check"></i> Schnelle Lieferung</li>
              <li><i class="fas fa-check"></i> Kompetenter Service</li>
            </ul>
            <a href="#" class="btn btn-primary">Jetzt einkaufen</a>
          </div>
          <div class="shop-image">
            <img src="/images/logo.png" alt="Online-Shop Vorschau">
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
      <div class="container">
        <div class="section-title">
          <h2>Was unsere Kunden sagen</h2>
        </div>
        <div class="testimonials-wrapper">
          <button class="carousel-button prev" @click="prevTestimonial" :disabled="currentTestimonialIndex === 0">
            <i class="mdi mdi-chevron-left"></i>
          </button>
          
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
          
          <button class="carousel-button next" @click="nextTestimonial" :disabled="currentTestimonialIndex >= maxTestimonials">
            <i class="mdi mdi-chevron-right"></i>
          </button>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
      <div class="container">
        <div class="section-title">
          <h2>Häufig gestellte Fragen</h2>
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

    <!-- Contact CTA -->
    <section class="contact-cta">
      <div class="container">
        <div class="cta-content">
          <h2>Bereit für unsere Dienstleistungen?</h2>
          <p>Kontaktieren Sie uns für ein unverbindliches Angebot oder weitere Informationen</p>
          <a href="#" class="btn btn-primary">Kontakt aufnehmen</a>
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
          title: 'Installationsservice',
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
        transform: `translateX(-${this.currentTestimonialIndex * (100 / this.visibleTestimonials)}%)`
      };
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
    }
  },
  mounted() {
    window.addEventListener('resize', this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
  }
}
</script>

<style scoped>
/* Base Styles */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Hero Banner */
.hero-banner {
  background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/hero-banner.jpg');
  background-size: cover;
  background-position: center;
  color: white;
  padding: 120px 0;
  text-align: center;
}

.hero-content h1 {
  font-size: 2.5rem;
  margin-bottom: 20px;
  font-weight: 700;
  text-transform: none;
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 30px;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

.cta-buttons {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 40px;
}

.btn {
  padding: 12px 30px;
  border-radius: 30px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s ease;
  display: inline-block;
  text-align: center;
  border: none;
  cursor: pointer;
  font-size: 1rem;
}

.btn-primary {
  background-color: #0056b3;
  color: white;
}

.btn-primary:hover {
  background-color: #003d7a;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-secondary {
  background-color: white;
  color: #0056b3;
  border: 2px solid #0056b3;
}

.btn-secondary:hover {
  background-color: #f8f9fa;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Services Section */
.services-section {
  padding: 80px 0;
  background-color: #fff;
}

.section-title {
  margin-bottom: 50px;
  text-align: center;
  position: relative;
}
.section-title h2 {
  color: #333;
  font-size: 2rem;
  text-transform: none;
  font-weight: 700;
  display: inline-block;
  padding: 0 80px; /* Augmenté l'espacement */
  position: relative;
  background-color: #fff;
}

.section-title h2::before,
.section-title h2::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 150px; /* Longueur très importante des traits */
  height: 2px;
  background-color: #0056b3;
}

.section-title h2::before {
  left: -150px; /* Positionnement précis */
}

.section-title h2::after {
  right: -150px; /* Positionnement précis */
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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

.service-footer {
  padding: 15px 25px;
  background-color: #f8f9fa;
  border-top: 1px solid #e9ecef;
  border: #bbb7b7 solid 1px;
}

.service-content h3 {
  margin: 0 0 15px 0;
  color: #333;
  font-size: 1.3rem;
  text-align: left;
  font-weight: 600;
  position: relative;
  padding-left: 15px;
  text-transform: none;
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

.service-link i {
  transition: transform 0.3s ease;
  font-size: 0.9rem;
}

.service-link:hover {
  color: #003d7a;
}

.service-link:hover i {
  transform: translateX(5px);
}

/* Brands Section */
.brands-section {
  padding: 80px 0;
  text-align: center;
  background-color: #f9f9f9;
}

.brands-section h2 {
  margin-bottom: 40px; /* Augmenté la marge pour compenser la suppression du texte */
  color: #333;
  font-size: 2rem;
  text-transform: none;
}

.brands-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
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

/* Shop Preview */
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
  text-transform: none;
}

.shop-text p {
  margin-bottom: 25px;
  font-size: 1.1rem;
  line-height: 1.6;
}

.feature-list {
  list-style: none;
  padding: 0;
  margin-bottom: 30px;
}

.feature-list li {
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  font-size: 1.1rem;
}

.feature-list i {
  margin-right: 10px;
  color: #4CAF50;
}

.shop-image {
  flex: 1;
  text-align: center;
}

.shop-image img {
  max-width: 100%;
  max-height: 400px;
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Testimonials Section */
.testimonials-section {
  padding: 80px 0;
  background-color: #fff;
  overflow: hidden;
}

.testimonials-wrapper {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

.testimonials-container {
  overflow: hidden;
  padding: 0 60px;
}

.testimonials-track {
  display: flex;
  transition: transform 0.5s ease;
  will-change: transform;
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

.full-quote {
  white-space: normal;
  margin-bottom: 15px;
  text-align: center;
  color: #555;
  font-style: italic;
  line-height: 1.6;
  flex-grow: 1;
}

.carousel-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
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
  transform: translateY(-50%) scale(1.1);
}

.carousel-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  transform: translateY(-50%);
}

.carousel-button.prev {
  left: 0;
}

.carousel-button.next {
  right: 0;
}

.carousel-button i {
  font-size: 24px;
}

.rating-stars {
  margin-bottom: 15px;
  font-size: 1.2rem;
  display: flex;
  justify-content: center;
  gap: 3px;
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

/* FAQ Section */
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
  text-transform: none;
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

/* Contact CTA */
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
  text-transform: none;
}

.contact-cta p {
  margin-bottom: 30px;
  font-size: 1.1rem;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

/* Transition animations */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}

/* Responsive Styles */
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

  .testimonial-content {
    min-height: 280px;
  }
}

@media (max-width: 768px) {
  .hero-content h1 {
    font-size: 2rem;
  }
  
  .cta-buttons {
    flex-direction: column;
    gap: 15px;
  }
  
  .shop-content {
    flex-direction: column;
  }
  
  .shop-image {
    margin-top: 30px;
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

  .testimonial-content {
    min-height: auto;
  }
  
  .carousel-button {
    width: 30px;
    height: 30px;
  }
  
  .carousel-button i {
    font-size: 18px;
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
  
  .hero-content h1 {
    font-size: 1.8rem;
  }
  
  .hero-content p {
    font-size: 1rem;
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
  
  .faq-question {
    padding: 15px;
  }
  
  .faq-question h3 {
    font-size: 1rem;
  }
}
</style>