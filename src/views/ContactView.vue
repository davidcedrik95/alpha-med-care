<template>
  <div class="contact-page">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-overlay">
        <div class="hero-content">
          <h1>Kontakt</h1>
          <p>Wir sind für Sie da und kümmern uns um Ihre Anliegen</p>
        </div>
      </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-container">
      <div class="contact-card">
        <div class="contact-header">
          <div class="logo-container">
            <div class="logo-circle">
              <span class="logo-text">α</span>
            </div>
            <h2>alpha med care GmbH</h2>
          </div>
          <p class="tagline">... wir kümmern uns!</p>
        </div>

        <div class="contact-details">
          <div class="contact-item">
            <div class="icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info">
              <h3>Adresse</h3>
              <p>Ulrichstraße 11A</p>
              <p>92278 Illschwang</p>
            </div>
          </div>

          <div class="contact-item">
            <div class="icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="info">
              <h3>Bürozeiten</h3>
              <div class="office-hours">
                <div class="hours-row">
                  <span>Montag bis Donnerstag:</span>
                  <span>8:00 - 16:00 Uhr</span>
                </div>
                <div class="hours-row">
                  <span>Freitags:</span>
                  <span>8:00 - 14:00 Uhr</span>
                </div>
              </div>
            </div>
          </div>

          <div class="contact-item">
            <div class="icon">
              <i class="fas fa-phone"></i>
            </div>
            <div class="info">
              <h3>Telefon</h3>
              <p>+49-966-618-895-0</p>
            </div>
          </div>

          <div class="contact-item">
            <div class="icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="info">
              <h3>E-Mail</h3>
              <p>kontakt@alpha-med-care.de</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="contact-form">
        <h2>Senden Sie uns eine Nachricht</h2>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Ihr Name</label>
            <input type="text" id="name" v-model="form.name" required>
          </div>
          
          <div class="form-group">
            <label for="email">Ihre E-Mail</label>
            <input type="email" id="email" v-model="form.email" required>
          </div>
          
          <div class="form-group">
            <label for="subject">Betreff</label>
            <input type="text" id="subject" v-model="form.subject" required>
          </div>
          
          <div class="form-group">
            <label for="message">Ihre Nachricht</label>
            <textarea id="message" v-model="form.message" rows="5" required></textarea>
          </div>
          
          <button type="submit" class="submit-btn">Nachricht senden</button>
        </form>
      </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
      <div class="map-container">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40768.53304730642!2d11.66027892663874!3d49.45152488867286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a1e8e0b5d6d4c1%3A0x7d5a1a5a5a5a5a5a!2sUlrichstra%C3%9Fe%2011A%2C%2092278%20Illschwang!5e0!3m2!1sde!2sde!4v1650000000000!5m2!1sde!2sde" 
          width="100%" 
          height="450" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy"
          title="Karte mit unserer Adresse">
        </iframe>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Formulaire réactif
const form = ref({
  name: '',
  email: '',
  subject: '',
  message: ''
});

// Soumission du formulaire
const submitForm = () => {
  console.log('Formulaire soumis:', form.value);
  // Ici vous ajouteriez normalement l'appel à votre API
  alert('Vielen Dank für Ihre Nachricht! Wir werden uns in Kürze bei Ihnen melden.');
  
  // Réinitialisation du formulaire
  form.value = {
    name: '',
    email: '',
    subject: '',
    message: ''
  };
};
</script>

<style scoped>
/* Styles globaux pour le composant */
.contact-page {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #2d3748;
}

/* Hero Section */
.hero-section {
  height: 300px;
  background: linear-gradient(rgba(13, 74, 106, 0.85), rgba(13, 74, 106, 0.85)), 
              url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
  background-size: cover;
  background-position: center;
  position: relative;
  border-radius: 0 0 15px 15px;
}

.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0 0 15px 15px;
}

.hero-content {
  text-align: center;
  color: white;
  max-width: 800px;
  padding: 0 20px;
}

.hero-content h1 {
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 15px;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.hero-content p {
  font-size: 1.4rem;
  text-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

/* Contact Container */
.contact-container {
  display: flex;
  max-width: 1200px;
  margin: 50px auto;
  padding: 0 20px;
  gap: 40px;
  flex-wrap: wrap;
}

.contact-card, .contact-form {
  flex: 1;
  min-width: 300px;
}

/* Contact Card */
.contact-card {
  background: white;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  padding: 30px;
  position: relative;
  overflow: hidden;
}

.contact-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #0d4a6a, #093774);
}

.contact-header {
  text-align: center;
  margin-bottom: 30px;
}

.logo-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 15px;
}

.logo-circle {
  width: 80px;
  height: 80px;
  background: linear-gradient(135deg, #2482a7, #07436b);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 15px;
}

.logo-text {
  font-size: 2.5rem;
  color: white;
  font-weight: bold;
  font-family: 'Arial', sans-serif;
}

.contact-header h2 {
  font-size: 1.8rem;
  color: #0d4a6a;
  margin-bottom: 5px;
}

.tagline {
  color: #124797;
  font-style: italic;
  font-size: 1.1rem;
  margin-top: 5px;
}

.contact-details {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.contact-item {
  display: flex;
  gap: 15px;
}

.icon {
  width: 50px;
  height: 50px;
  background: #f0f9ff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.icon i {
  color: #0d4a6a;
  font-size: 1.2rem;
}

.info h3 {
  font-size: 1.2rem;
  margin-bottom: 5px;
  color: #0d4a6a;
}

.info p {
  margin: 3px 0;
  color: #4a5568;
}

.office-hours {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.hours-row {
  display: flex;
  justify-content: space-between;
  border-bottom: 1px dashed #e2e8f0;
  padding-bottom: 5px;
}

.hours-row:last-child {
  border-bottom: none;
}

/* Contact Form */
.contact-form {
  background: white;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  padding: 30px;
}

.contact-form h2 {
  color: #0d4a6a;
  margin-bottom: 25px;
  font-size: 1.8rem;
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  color: #4a5568;
}

input, textarea {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #cbd5e0;
  border-radius: 8px;
  font-size: 1rem;
  transition: border-color 0.3s;
}

input:focus, textarea:focus {
  outline: none;
  border-color: #0d4a6a;
  box-shadow: 0 0 0 3px rgba(13, 74, 106, 0.1);
}

.submit-btn {
  background: linear-gradient(135deg, #0d4a6a, #0e3774);
  color: white;
  border: none;
  padding: 14px 25px;
  font-size: 1.1rem;
  font-weight: 600;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s;
  width: 100%;
}

.submit-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(13, 74, 106, 0.25);
}

/* Map Section */
.map-section {
  margin: 50px 0;
}

.map-container {
  max-width: 1200px;
  margin: 0 auto;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
  .contact-container {
    flex-direction: column;
  }
  
  .hero-content h1 {
    font-size: 2.2rem;
  }
  
  .hero-content p {
    font-size: 1.1rem;
  }
}

@media (max-width: 480px) {
  .contact-card, .contact-form {
    padding: 20px;
  }
  
  .hero-content h1 {
    font-size: 1.8rem;
  }
  
  .contact-header h2 {
    font-size: 1.5rem;
  }
  
  .logo-circle {
    width: 70px;
    height: 70px;
  }
  
  .logo-text {
    font-size: 2rem;
  }
}
</style>