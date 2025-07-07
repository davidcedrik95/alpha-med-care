<template>
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
                <div class="stat-number">4+</div>
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
</template>

<script>
export default {
  name: 'HeroBanner',
  methods: {
    scrollToNextSection() {
      const nextSection = document.querySelector('.hero-banner').nextElementSibling;
      if (nextSection) {
        nextSection.scrollIntoView({ 
          behavior: 'smooth' 
        });
      }
    }
  }
}
</script>

<style scoped>
.hero-banner {
  padding: 80px 0 80px;
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
  margin-top: 40px;
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
  
  .scroll-indicator {
    margin-top: 60px;
    bottom: 20px;
  }
}
</style>