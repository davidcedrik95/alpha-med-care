<template>
  <section class="domains-section">
    <div class="container">
      <div class="section-title">
        <h2>Unsere Einsatzgebiete</h2>
        <p>Medizinische Spezialisierungen und unterstützte Geräte</p>
      </div>
      
      <div class="domains-grid">
        <!-- Existing domain cards... -->
        
        <div class="domain-card">
          <div class="domain-icon">
            <i class="fas fa-tools"></i>
          </div>
          <h3>Technische Ausrüstung</h3>
          <ul class="equipment-list">
            <li>
              <i class="fas fa-check-circle"></i>
              <span>Prüf- und Messgeräte</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>Kalibrierungsequipment</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>Wartungswerkzeuge</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>Diagnosesysteme</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>Sicherheitsausrüstung</span>
            </li>
          </ul>
          <a href="#equipment" class="domain-link">
            <span>Mehr erfahren</span>
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>
        
        <div class="domain-card">
          <div class="domain-icon">
            <i class="fas fa-handshake"></i>
          </div>
          <h3>Produktintegration (Hersteller)</h3>
          <ul class="equipment-list">
            <li>
              <i class="fas fa-check-circle"></i>
              <span>ERGO-FIT</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>proxomed</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>PHYSIOMED</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>FREI AG – Shop</span>
            </li>
            <li>
              <i class="fas fa-check-circle"></i>
              <span>FREI AG – Hauptseite</span>
            </li>
          </ul>
          <a href="#integration" class="domain-link">
            <span>Mehr erfahren</span>
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'DomainsSection'
}
</script>

<style scoped>
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

@media (max-width: 768px) {
  .domains-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 480px) {
  .domains-grid {
    grid-template-columns: 1fr;
  }
}
</style>