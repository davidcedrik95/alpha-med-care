<template>
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
</template>

<script>
export default {
  name: 'ServicesSection',
  data() {
    return {
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
      ]
    }
  },
  methods: {
    toggleServiceCard(event) {
      if (event.target.tagName === 'A' || event.target.parentElement.tagName === 'A') {
        return;
      }
      
      const card = event.currentTarget;
      card.classList.toggle('expanded');
    }
  }
}
</script>

<style scoped>
.services-section {
  padding: 80px 0;
  background-color: #fff;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box;
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

@media (max-width: 1024px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
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
}

@media (max-width: 480px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
  
  .section-title h2 {
    font-size: 1.5rem;
    padding: 0 40px;
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
</style>