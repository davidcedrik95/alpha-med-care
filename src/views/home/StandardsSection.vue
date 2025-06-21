<template>
  <section class="standards-section">
    <div class="container">
      <div class="section-title">
        <h2>Normen & Zertifizierungen</h2>
        <p>Einhaltung deutscher und internationaler Vorschriften</p>
      </div>
      
      <div class="standards-container">
        <div class="standards-content">
          <p>Wir garantieren die strikte Einhaltung aller relevanten Normen für die Sicherheit Ihrer medizinischen Geräte:</p>
          
          <ul class="standards-list">
            <li v-for="standard in standards" :key="standard.name">
              <div class="standard-badge">
                <i class="fas fa-shield-alt"></i>
              </div>
              <div class="standard-info">
                <h4>{{ standard.name }}</h4>
                <p>{{ standard.description }}</p>
              </div>
            </li>
          </ul>
        </div>
        
        <div class="standards-visual">
          <img src="/images/certifications/iso.png" alt="Medizinische Zertifizierungen" class="standards-image">
          <div class="certification-badges">
            <img src="/images/certifications/dguv-certified.png" alt="ISO Zertifizierung" class="certification-badge">
            <img src="/images/certifications/iso-13485.png" alt="DIN Zertifizierung" class="certification-badge">
            <img src="/images/certifications/tuv-certified.png" alt="DIN Zertifizierung" class="certification-badge">
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'StandardsSection',
  data() {
    return {
      standards: [
        {
          name: 'MPBetreibV',
          description: 'Konformität mit der deutschen Medizinprodukte-Betreiberverordnung (gesetzlich vorgeschrieben)'
        },
        {
          name: 'DIN EN 60601',
          description: 'Elektrische Sicherheit medizinischer Geräte nach europäischen Normen'
        },
        {
          name: 'ISO 13485',
          description: 'Zertifiziertes Qualitätsmanagementsystem für Medizinprodukte'
        },
        {
          name: 'RoHS-Richtlinie',
          description: 'Einhaltung der Beschränkungen gefährlicher Stoffe in Elektrogeräten'
        }
      ]
    }
  }
}
</script>

<style scoped>
.standards-section {
  padding: 80px 0;
  background-color: white;
}

.standards-container {
  display: flex;
  gap: 50px;
  align-items: center;
  margin-top: 40px;
}

.standards-content {
  flex: 1;
}

.standards-content p {
  color: #555;
  line-height: 1.6;
  margin-bottom: 30px;
  font-size: 1.1rem;
}

.standards-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.standards-list li {
  display: flex;
  gap: 20px;
  margin-bottom: 25px;
  align-items: flex-start;
}

.standard-badge {
  width: 50px;
  height: 50px;
  background-color: #f0f6ff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #0056b3;
  font-size: 1.2rem;
  flex-shrink: 0;
}

.standard-info h4 {
  color: #333;
  margin: 0 0 5px 0;
  font-size: 1.2rem;
}

.standard-info p {
  color: #666;
  margin: 0;
  font-size: 0.95rem;
  line-height: 1.5;
}

.standards-visual {
  flex: 1;
  position: relative;
}

.standards-image {
  width: 100%;
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.certification-badges {
  position: absolute;
  bottom: -20px;
  right: -20px;
  display: flex;
  gap: 15px;
}

.certification-badge {
  width: 80px;
  height: 80px;
  object-fit: contain;
  background: white;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  border: 1px solid #eee;
}

@media (max-width: 1024px) {
  .standards-container {
    flex-direction: column;
  }
  
  .standards-visual {
    margin-top: 40px;
    width: 100%;
  }
  
  .certification-badges {
    right: 0;
  }
}

@media (max-width: 480px) {
  .standards-list li {
    flex-direction: column;
    gap: 10px;
  }
  
  .certification-badge {
    width: 60px;
    height: 60px;
  }
}
</style>