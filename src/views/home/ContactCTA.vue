<template>
  <section class="contact-cta">
    <div class="container">
      <div class="cta-content">
        <div class="cta-text">
          <div class="tagline">Kontaktieren Sie uns</div>
          <h2>Bereit für eine <span class="highlight">professionelle Zusammenarbeit</span>?</h2>
          <p class="cta-description">Unser Expertenteam steht Ihnen für Beratung, Angebote und Support zur Verfügung. Nutzen Sie unseren schnellen Kontaktweg:</p>
          
          <div class="contact-methods">
            <div class="contact-method">
              <div class="contact-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="contact-info">
                <h4>Telefonischer Support</h4>
                <a href="tel:+499666188950" class="contact-link">+49 (0) 9666188950</a>
                <p>Mo-Fr: 8:00-18:00 Uhr</p> 
              </div>
            </div>
            
            <div class="contact-method">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-info">
                <h4>E-Mail Anfrage</h4>
                <a href="mailto:info@alpha-med-care.de" class="contact-link">info@alpha-med-care.de</a>
                <p>Antwort innerhalb von 24h</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="cta-form-container">
          <div class="form-card">
            <h3>Kontaktformular</h3>
            <form class="cta-form" @submit.prevent="submitForm">
              <div class="form-group">
                <input type="text" v-model="form.name" placeholder="Ihr Name" required>
              </div>
              <div class="form-group">
                <input type="email" v-model="form.email" placeholder="Ihre E-Mail" required>
              </div>
              <div class="form-group">
                <input type="tel" v-model="form.phone" placeholder="Telefon (optional)">
              </div>
              <div class="form-group">
                <textarea v-model="form.message" placeholder="Ihre Nachricht" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block" :disabled="isSubmitting">
                <span>{{ isSubmitting ? 'Wird gesendet...' : 'Nachricht senden' }}</span>
                <i class="fas ml-2" :class="isSubmitting ? 'fa-spinner fa-spin' : 'fa-paper-plane'"></i>
              </button>
            </form>
            
            <div class="form-footer">
              <div class="trust-badge">
                <i class="fas fa-lock"></i>
                <span>Ihre Daten sind sicher</span>
              </div>
              <div class="trust-badge">
                <i class="fas fa-shield-alt"></i>
                <span>DSGVO konform</span>
              </div>
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
  data() {
    return {
      form: {
        name: '',
        email: '',
        phone: '',
        message: ''
      },
      isSubmitting: false
    }
  },
  methods: {
    async submitForm() {
      this.isSubmitting = true;
      
      try {
        // Ici vous ajouteriez votre logique d'envoi de formulaire
        // Par exemple avec axios ou fetch
        // await axios.post('/api/contact', this.form);
        
        // Simulation d'envoi
        await new Promise(resolve => setTimeout(resolve, 1500));
        
        // Réinitialisation du formulaire après envoi
        this.form = {
          name: '',
          email: '',
          phone: '',
          message: ''
        };
        
        // Message de succès
        this.$toast.success('Ihre Nachricht wurde erfolgreich gesendet!');
      } catch (error) {
        console.error('Fehler beim Senden der Nachricht:', error);
        this.$toast.error('Es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut.');
      } finally {
        this.isSubmitting = false;
      }
    }
  }
}
</script>

<style scoped>
/* ==================== */
/* CONTACT CTA SECTION  */
/* ==================== */
.contact-cta {
    padding: 100px 0;
    background: linear-gradient(135deg,rgba(12, 72, 129, 0.95) 0%,
  rgba(25, 105, 170, 0.95) 50%,
  rgba(12, 72, 129, 0.95) 100%
) !important;



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
  background: url('/images/contact-bg-pattern.png') no-repeat;
  background-size: cover;
  opacity: 0.1;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.cta-content {
  display: flex;
  gap: 50px;
  align-items: center;
  position: relative;
  z-index: 2;
}

/* Text Section */
.cta-text {
  flex: 1;
}

.tagline {
  display: inline-block;
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
  padding: 6px 15px;
  border-radius: 30px;
  font-size: 0.9rem;
  font-weight: 600;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.contact-cta h2 {
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
}

.cta-description {
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 30px;
  opacity: 0.9;
  max-width: 90%;
}

/* Contact Methods */
.contact-methods {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
  margin-bottom: 40px;
}

.contact-method {
  display: flex;
  gap: 15px;
  align-items: flex-start;
}

.contact-icon {
  width: 50px;
  height: 50px;
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}

.contact-info h4 {
  margin: 0 0 5px 0;
  font-size: 1.1rem;
}

.contact-link {
  color: white;
  font-weight: 600;
  text-decoration: none;
  display: block;
  margin-bottom: 5px;
  transition: all 0.3s ease;
}

.contact-link:hover {
  color: #cce0ff;
  text-decoration: underline;
}

.contact-info p {
  margin: 0;
  font-size: 0.9rem;
  opacity: 0.8;
}

/* Form Section */
.cta-form-container {
  flex: 1;
  max-width: 500px;
}

.form-card {
  background: white;
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.form-card h3 {
  color: #333;
  margin: 0 0 25px 0;
  font-size: 1.5rem;
  text-align: center;
}

/* Form Elements */
.cta-form .form-group {
  margin-bottom: 20px;
}

.cta-form input,
.cta-form textarea {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.cta-form input:focus,
.cta-form textarea:focus {
  border-color: #0056b3;
  outline: none;
  box-shadow: 0 0 0 3px rgba(0, 86, 179, 0.2);
}

/* Buttons */
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
    background-color: rgba(12, 72, 129, 0.95) !important;
    color: white;
    box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);
    border: none;
}

.btn-primary:hover {
  background-color: #004494;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 86, 179, 0.4);
}

.btn-block {
  display: flex;
  width: 100%;
  justify-content: center;
}

/* Form Footer */
.form-footer {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 20px;
  flex-wrap: wrap;
}

.trust-badge {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.8rem;
  color: #666;
}

/* ==================== */
/* RESPONSIVE STYLES    */
/* ==================== */
@media (max-width: 1024px) {
  .contact-methods {
    grid-template-columns: 1fr;
  }
  
  .cta-content {
    flex-direction: column;
    gap: 40px;
  }
  
  .cta-text {
    text-align: center;
  }
  
  .cta-description {
    max-width: 100%;
  }
  
  .contact-method {
    justify-content: center;
  }
  
  .cta-form-container {
    width: 100%;
    max-width: 600px;
  }
}

@media (max-width: 768px) {
  .contact-cta {
    padding: 80px 0;
  }
  
  .contact-cta h2 {
    font-size: 1.8rem;
  }
  
  .form-card {
    padding: 25px;
  }
}

@media (max-width: 480px) {
  .contact-method {
    flex-direction: column;
    align-items: center;
  }
  
  .form-footer {
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }
}
</style>