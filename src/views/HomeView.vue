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
        },
        {
          title: 'Schulungen',
          image: '/images/services/medical-equipment-technician.png',
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
  font-weight: 700;
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

/* Button styles */
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
  text-transform: uppercase;
  font-weight: 700;
  display: inline-block;
  padding: 0 20px;
  position: relative;
  background-color: #fff;
}

.section-title h2::before,
.section-title h2::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 50px;
  height: 2px;
  background-color: #0056b3;
}

.section-title h2::before {
  left: -60px;
}

.section-title h2::after {
  right: -60px;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.service-card {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  border: 1px solid #f0f0f0;
  display: flex;
  flex-direction: column;
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
}

.service-card:hover .service-image {
  transform: scale(1.05);
}

.service-content {
  padding: 25px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
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

/* Responsive Styles for Services */
@media (max-width: 1024px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .services-section {
    padding: 60px 0;
  }
  
  .section-title h2 {
    font-size: 1.8rem;
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
}

@media (max-width: 576px) {
  .services-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .service-image-container {
    height: 180px;
  }
  
  .section-title h2 {
    font-size: 1.5rem;
    padding: 0 10px;
  }
  
  .section-title h2::before,
  .section-title h2::after {
    display: none;
  }
}


/* Brands Section */
.brands-section {
  padding: 80px 0;
  text-align: center;
  background-color: #f9f9f9;
}

.brands-section h2 {
  margin-bottom: 15px;
  color: #333;
  font-size: 2rem;
}

.brands-section p {
  color: #666;
  margin-bottom: 40px;
  font-size: 1.1rem;
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
  max-width: 100%;
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

/* Testimonials */
.testimonials-section {
  padding: 80px 0;
  background-color: #fff;
  text-align: center;
}

.testimonials-section h2 {
  margin-bottom: 50px;
  color: #333;
  font-size: 2rem;
}

.testimonials-slider {
  display: flex;
  gap: 30px;
  overflow-x: auto;
  padding: 20px 0;
  scroll-snap-type: x mandatory;
}

.testimonial {
  min-width: 350px;
  background: white;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  scroll-snap-align: start;
}

.testimonial-content p {
  font-style: italic;
  margin-bottom: 20px;
  color: #555;
  line-height: 1.6;
  text-align: left;
}

.testimonial-author {
  display: flex;
  flex-direction: column;
  text-align: left;
}

.testimonial-author strong {
  color: #333;
  font-size: 1.1rem;
}

.testimonial-author span {
  color: #666;
  font-size: 0.9rem;
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
}

.contact-cta p {
  margin-bottom: 30px;
  font-size: 1.1rem;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

/* Responsive Styles */
@media (max-width: 1024px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .shop-content {
    gap: 30px;
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
  
  .testimonial {
    min-width: 280px;
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
}

@media (max-width: 480px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
  
  .section-title h2 {
    font-size: 1.5rem;
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
    width: 20px;
  }
  
  .section-title h2::before {
    left: -30px;
  }
  
  .section-title h2::after {
    right: -30px;
  }
}
</style>