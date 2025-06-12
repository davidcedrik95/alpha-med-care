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
    <!-- Services Section - Style comme schupp.shop -->
   <section id="services" class="services-section">
    <div class="container">
      <h2>Dienstleistungen/Service</h2>
      <div class="services-grid">
        <div class="service-card" v-for="service in services" :key="service.title">
          <img :src="service.image" :alt="service.title" class="service-image">
          <div class="service-content">
            <h3>{{ service.title }}</h3>
            <p>{{ service.description }}</p>
            <a href="#" class="service-link">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Featured Brands -->
    <section class="brands-section">
      <div class="container">
        <h2>Unsere Markenpartner</h2>
        <p>Wir arbeiten mit führenden Herstellern medizinischer Geräte zusammen</p>
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
        <h2>Was unsere Kunden sagen</h2>
        <div class="testimonials-slider">
          <div class="testimonial" v-for="testimonial in testimonials" :key="testimonial.name">
            <div class="testimonial-content">
              <p>"{{ testimonial.quote }}"</p>
              <div class="testimonial-author">
                <strong>{{ testimonial.name }}</strong>
                <span>{{ testimonial.position }}, {{ testimonial.company }}</span>
              </div>
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
       services: [
        {
          title: 'Prüfungen',
          image: '/images/services/medical-equipment-technician.png',
          description: 'Prüfungen und mehr für Ihre medizinischen Geräte'
        },
        {
          title: 'Kalibrieren',
          image: '/images/services/medical-equipment-technician.png',
          description: 'Präzise Kalibrierung von Ergometern, Thermometern und Blutdruckmessgeräten'
        },
        {
          title: 'Service & Wartung',
          image: '/images/services/medical-equipment-technician.png',
          description: 'Reparaturen, Ersatzteile und regelmäßige Wartung gemäß MPBetreibV'
        },
        {
          title: 'Installationsservice',
          image: '/images/services/medical-equipment-technician.png',
          description: 'Fachgerechte Installation, Einweisung und Entsorgung von Altgeräten'
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
          quote: "Die regelmäßigen Prüfungen durch Alpha-Med-Care geben uns die Sicherheit, dass unsere Geräte stets einsatzbereit und sicher sind.",
          name: "Dr. Michael Bauer",
          position: "Leitender Arzt",
          company: "Reha-Zentrum Heidelberg"
        },
        {
          quote: "Schneller Service, kompetente Beratung und zuverlässige Termine - genau das, was wir für unseren Praxisbetrieb benötigen.",
          name: "Sabine Müller",
          position: "Praxisleitung",
          company: "Physiotherapie Müller"
        },
        {
          quote: "Die Kalibrierung unserer Ergometer durch Alpha-Med-Care war präzise und professionell. Sehr zufrieden mit dem Service!",
          name: "Thomas Weber",
          position: "Sportwissenschaftler",
          company: "Medizinisches Trainingszentrum Berlin"
        }
      ]
    }
  }
}
</script>

<style scoped>
/* Global Styles */
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
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 30px;
}

.cta-buttons {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.btn {
  padding: 12px 24px;
  border-radius: 4px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-primary {
  background-color: #0056b3;
  color: white;
  border: 2px solid #0056b3;
}

.btn-primary:hover {
  background-color: #003d7a;
  border-color: #003d7a;
}

.btn-secondary {
  background-color: transparent;
  color: white;
  border: 2px solid white;
}

.btn-secondary:hover {
  background-color: rgba(255, 255, 255, 0.1);
}

/* Services Section - Style comme schupp.shop */
.services-section {
  padding: 80px 0;
  background-color: #fff;
}

.services-section h2 {
  text-align: center;
  margin-bottom: 50px;
  color: #333;
  font-size: 2rem;
  position: relative;
}

.services-section h2:after {
  content: '';
  display: block;
  width: 80px;
  height: 3px;
  background: #0056b3;
  margin: 15px auto 0;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 10px;
  max-width: 1200px;
  margin: 0 auto;
}

.service-card {
  background: #fff;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  border: 1px solid #f0f0f0;
  display: flex;
  flex-direction: column;
}

.service-image {
  width: 100%;
  height: 180px;
  object-fit: cover;
}

.service-content {
  padding: 20px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.service-content h3 {
  margin: 0 0 15px 10px;
  color: #333;
  font-size: 1.3rem;
  text-align: left;
  position: relative;
}

.service-content h3::before {
  content: '';
  position: absolute;
  left: -10px;
  top: 5px;
  bottom: 5px;
  width: 4px;
  background-color: #0056b3;
  border-radius: 2px;
}

.service-content p {
  color: #666;
  margin: 0 0 20px 10px;
  line-height: 1.6;
  flex-grow: 1;
  text-align: left;
}

.service-link {
  color: #0056b3;
  text-decoration: none;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  transition: all 0.3s ease;
  justify-content: flex-start;
  padding-left: 10px;
  margin-top: auto;
}

.service-link i {
  margin-left: 5px;
  transition: transform 0.3s ease;
}

.service-link:hover {
  color: #003d7a;
}

.service-link:hover i {
  transform: translateX(5px);
}

@media (max-width: 768px) {
  .services-grid {
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
  }
  
  .service-image {
    height: 150px;
  }
}

@media (max-width: 480px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
}

/* Brands Section */
.brands-section {
  padding: 80px 0;
  text-align: center;
}

.brands-section h2 {
  margin-bottom: 15px;
  color: #333;
}

.brands-section p {
  color: #666;
  margin-bottom: 40px;
}

.brands-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 30px;
  align-items: center;
}

.brand-logo {
  max-width: 100%;
  height: auto;
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
}

.shop-text p {
  margin-bottom: 25px;
  font-size: 1.1rem;
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
}

.feature-list i {
  margin-right: 10px;
  color: #4CAF50;
}

.shop-image {
  flex: 1;
}

.shop-image img {
  max-width: 100%;
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Testimonials */
.testimonials-section {
  padding: 80px 0;
  background-color: #f9f9f9;
}

.testimonials-section h2 {
  text-align: center;
  margin-bottom: 50px;
  color: #333;
}

.testimonials-slider {
  display: flex;
  gap: 30px;
  overflow-x: auto;
  padding: 20px 0;
}

.testimonial {
  min-width: 350px;
  background: white;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.testimonial-content p {
  font-style: italic;
  margin-bottom: 20px;
  color: #555;
}

.testimonial-author {
  display: flex;
  flex-direction: column;
}

.testimonial-author strong {
  color: #333;
}

.testimonial-author span {
  color: #666;
  font-size: 0.9rem;
}

/* Contact CTA */
.contact-cta {
  padding: 80px 0;
  text-align: center;
  background: linear-gradient(rgba(0, 86, 179, 0.9), rgba(0, 86, 179, 0.9)), url('/images/cta-bg.jpg');
  background-size: cover;
  background-position: center;
  color: white;
}

.contact-cta h2 {
  margin-bottom: 20px;
}

.contact-cta p {
  margin-bottom: 30px;
  font-size: 1.1rem;
}

/* Responsive Styles */
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
  
  .testimonial {
    min-width: 280px;
  }

  .services-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
  }
  
  .service-image {
    height: 180px;
  }
}

@media (max-width: 480px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
}
</style>