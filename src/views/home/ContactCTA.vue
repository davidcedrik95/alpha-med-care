
<template>
  <section class="contact-cta">
    <div class="container">
      <div class="cta-content">
        <!-- Colonne gauche : Informations de contact -->
        <div class="contact-column">
          <div class="tagline">Kontaktieren Sie uns</div>
         
          <div class="contact-method">
            <div class="contact-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div class="contact-info">
              <h4>Telefonischer Support</h4>
              <a href="tel:+499666188950" class="contact-link">+49 (0) 9666 188 950</a>
              <p>Mo-Fr: 8:00-18:00 Uhr</p>
            </div>
          </div>
          
          <div class="contact-method">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-info">
              <h4>E-Mail Anfrage</h4>
              <a href="mailto:info@alpha-med-care.de" class="contact-link">kontakt@alpha-med-care.de</a>
              <p>Antwort innerhalb von 24h</p>
            </div>
          </div>
          
        
        </div>
        
        <!-- Colonne droite : Adresse et autres informations -->
        <div class="contact-column">
          <div class="tagline">Besuchen Sie uns</div>
          
          <div class="contact-method">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="contact-info">
              <h4>Unser Büro</h4>
              <p class="contact-link">Alpha Med Care GmbH<br>
              Maximilianstraße 35<br>
              80539 München</p>
            </div>
          </div>
        
          
          <div class="contact-method">
            <div class="contact-icon">
              <i class="fas fa-comments"></i>
            </div>
            <div class="contact-info">
              <h4>Live Chat</h4>
              <p class="contact-link">Verfügbar auf unserer Website</p>
              <p>Mo-Fr: 9:00-17:00 Uhr</p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ContactCTA',
  // Aucune logique complexe nécessaire pour ce composant statique
}
</script>

<style scoped>
/* ==================== */
/* CONTACT CTA SECTION  */
/* ==================== */
.contact-cta {
  padding: 100px 0;
  background: linear-gradient(
    135deg,
    rgba(12, 72, 129, 0.95) 0%,
    rgba(25, 105, 170, 0.95) 50%,
    rgba(12, 72, 129, 0.95) 100%
  );
  color: white;
  position: relative;
  overflow: hidden;
}

.contact-cta::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 40%;
  height: 100%;
  background: linear-gradient(45deg, rgba(255,255,255,0.05) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0.05) 75%, transparent 75%, transparent);
  background-size: 20px 20px;
  opacity: 0.5;
  z-index: 1;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  position: relative;
  z-index: 2;
}

.cta-content {
  display: flex;
  gap: 40px;
  position: relative;
  z-index: 2;
}

.contact-column {
  flex: 1;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  padding: 40px;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.15);
  transition: all 0.3s ease;
}

.contact-column:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.tagline {
  display: inline-block;
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
  padding: 8px 18px;
  border-radius: 30px;
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 25px;
  text-transform: uppercase;
  letter-spacing: 1.5px;
}

h2 {
  font-size: 2.2rem;
  margin-bottom: 20px;
  line-height: 1.3;
}

.highlight {
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
  background-color: rgba(255, 255, 255, 0.3);
  z-index: -1;
  border-radius: 4px;
}

.cta-description {
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 30px;
  opacity: 0.9;
}

.contact-method {
  display: flex;
  gap: 20px;
  align-items: flex-start;
  margin-bottom: 30px;
  padding-bottom: 30px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.contact-method:last-child {
  border-bottom: none;
  margin-bottom: 0;
  padding-bottom: 0;
}

.contact-icon {
  width: 60px;
  height: 60px;
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  flex-shrink: 0;
  transition: all 0.3s ease;
}

.contact-icon:hover {
  background-color: rgba(255, 255, 255, 0.2);
  transform: scale(1.05);
}

.contact-info h4 {
  margin: 0 0 8px 0;
  font-size: 1.25rem;
}

.contact-link {
  color: white;
  font-weight: 600;
  text-decoration: none;
  display: block;
  margin-bottom: 5px;
  transition: all 0.3s ease;
  font-size: 1.1rem;
}

.contact-link:hover {
  color: #cce0ff;
  text-decoration: underline;
}

.contact-info p {
  margin: 0;
  font-size: 0.95rem;
  opacity: 0.85;
}

.office-hours {
  margin-top: 40px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  padding: 20px;
}

.office-hours h4 {
  font-size: 1.2rem;
  margin-bottom: 15px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.hours-grid {
  display: grid;
  grid-template-columns: auto auto;
  gap: 12px;
}

.hour-item {
  display: flex;
  justify-content: space-between;
}

.hour-day {
  font-weight: 500;
}

.hour-time {
  opacity: 0.9;
}

.trust-badges {
  display: flex;
  gap: 20px;
  margin-top: 30px;
  justify-content: center;
}

.trust-badge {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.1);
  padding: 10px 15px;
  border-radius: 30px;
  font-size: 0.9rem;
}

.footer-note {
  margin-top: 40px;
  text-align: center;
  padding-top: 20px;
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  font-size: 0.9rem;
  opacity: 0.8;
}

/* ==================== */
/* RESPONSIVE STYLES    */
/* ==================== */
@media (max-width: 1024px) {
  .cta-content {
    gap: 30px;
  }
  
  .contact-column {
    padding: 30px;
  }
  
  h2 {
    font-size: 2rem;
  }
}

@media (max-width: 768px) {
  .cta-content {
    flex-direction: column;
  }
  
  .contact-cta {
    padding: 60px 0;
  }
  
  .tagline {
    font-size: 0.85rem;
  }
  
  .contact-icon {
    width: 50px;
    height: 50px;
  }
  
  .contact-link {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 0 15px;
  }
  
  .contact-column {
    padding: 25px;
  }
  
  h2 {
    font-size: 1.8rem;
  }
  
  .contact-method {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  
  .trust-badges {
    flex-direction: column;
    align-items: center;
  }
  
  .hours-grid {
    grid-template-columns: 1fr;
  }
}
</style>