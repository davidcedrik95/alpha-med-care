<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <!-- Contenu principal -->
    <v-container class="py-10">
      <v-row align="center" justify="center">
        <!-- Colonne image à gauche (logo + image principale) -->
        <v-col cols="12" md="6">
          <!-- Logo -->
          <v-img
            src="/images/logo.png"
            alt="Logo Alpha Med Care"
            max-height="80"
            contain
            class="mb-6"
            style="max-width: 200px; border: solid 1px grey;"
          />
          <!-- Image principale -->
          <v-img
            src="/images/company.png"
            alt="Alpha Med Care"
            height="400"
            cover
            style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); width: 100%;"
          />
        </v-col>

        <!-- Colonne texte à droite - Design amélioré -->
        <v-col cols="12" md="6">
          <v-card class="modern-card pa-6 bg-white">
            <h2 class="section-title text-h4 font-weight-bold text-blue-darken-4 mb-6">
              DAS UNTERNEHMEN
            </h2>
            <div class="text-body-1 text-grey-darken-2">
              <div class="feature-item mb-6">
                <div class="feature-icon">
                  <v-icon color="blue-darken-2">mdi-account-group</v-icon>
                </div>
                <div>
                  Wir sind ein junges, aufstrebendes Unternehmen, das auf dem
                  neusten Stand der Technik arbeitet und Ihnen im Bereich der
                  Pflege, Reparatur, Wartung und Anschaffung Ihrer Geräte mit Rat
                  und Tat zur Seite steht.
                </div>
              </div>
              <div class="feature-item mb-6">
                <div class="feature-icon">
                  <v-icon color="blue-darken-2">mdi-medical-bag</v-icon>
                </div>
                <div>
                  Unsere Medizinprodukteberater stehen Ihnen gerne zur Verfügung.
                  alpha med care kümmert sich um Ihre medizinischen Produkte,
                  sowie Sport- und Fitnessgeräte. Unsere Experten entwickeln im
                  Bedarfsfall ein auf Ihre Bedürfnisse maßgeschneidertes Konzept,
                  damit Ihre Geräte fit für die Zukunft sind.
                </div>
              </div>
              <div class="feature-item mb-6">
                <div class="feature-icon">
                  <v-icon color="blue-darken-2">mdi-tools</v-icon>
                </div>
                <div>
                  Von der kleinen Wartung, über die sicherheitstechnische Kontrolle
                  (STK), bis hin zur Reparatur inklusive messtechnischer Kontrolle
                  (MTK), vor Ort in Ihrem Unternehmen: Mehr Vielfalt und Flexibilität
                  werden Sie nirgends finden.
                </div>
              </div>
              <div class="feature-item mb-8">
                <div class="feature-icon">
                  <v-icon color="blue-darken-2">mdi-chart-line</v-icon>
                </div>
                <div>
                  Wir können nun auf mehr als vier Jahre Erfahrung im
                  medizintechnischen Bereich zurück greifen, und erzielen somit
                  den idealsten Nutzen für Ihr Unternehmen.
                </div>
              </div>
              <div class="highlight-text mb-6">
                <p class="mb-0 text-body-1 font-weight-medium text-center">
                  Vertrauen Sie sich uns an, ...wir kümmern uns!
                </p>
              </div>
              
              <v-row class="stats-container">
                <v-col cols="4" class="stat-item">
                  <div class="stat-value">4+</div>
                  <div class="stat-label">Jahre Erfahrung</div>
                </v-col>
                <v-col cols="4" class="stat-item">
                  <div class="stat-value">360°</div>
                  <div class="stat-label">Service</div>
                </v-col>
                <v-col cols="4" class="stat-item">
                  <div class="stat-value">100%</div>
                  <div class="stat-label">Kundenzufriedenheit</div>
                </v-col>
              </v-row>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>
<script>
export default {
  name: 'CompanySection',
  data: () => ({
    // Vous pouvez ajouter ici des données si nécessaire
  })
}
</script>
<style scoped>
.modern-card {
  border-radius: 16px !important;
  overflow: hidden;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1) !important;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-top: 4px solid #1976D2;
}
.modern-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15) !important;
}
.section-title {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 0.5px;
  position: relative;
  padding-bottom: 15px;
}
.section-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 70px;
  height: 4px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 2px;
}
.feature-item {
  display: flex;
  align-items: flex-start;
  position: relative;
}
.feature-icon {
  background: #E3F2FD;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 16px;
  flex-shrink: 0;
}
.highlight-text {
  background: linear-gradient(120deg, #E3F2FD, #BBDEFB);
  border-left: 4px solid #1976D2;
  padding: 24px;
  border-radius: 0 8px 8px 0;
  position: relative;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}
.highlight-text::before {
  content: '"';
  position: absolute;
  top: -15px;
  left: 15px;
  font-size: 60px;
  color: #1976D2;
  opacity: 0.15;
  font-family: serif;
  line-height: 1;
}
.stats-container {
  margin-top: 10px;
}
.stat-item {
  text-align: center;
  padding: 10px;
}
.stat-value {
  font-size: 28px;
  font-weight: 700;
  color: #1976D2;
  margin-bottom: 5px;
  line-height: 1.2;
}
.stat-label {
  font-size: 14px;
  color: #546E7A;
  font-weight: 500;
}
/* Effet de vague décoratif */
.v-card::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 100px;
  height: 100px;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23e3f2fd' fill-opacity='0.3' d='M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,261.3C672,256,768,224,864,197.3C960,171,1056,149,1152,165.3C1248,181,1344,235,1392,261.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  opacity: 0.6;
  z-index: 0;
}
@media (max-width: 960px) {
  .section-title {
    font-size: 1.8rem !important;
  }
  
  .feature-item {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .feature-icon {
    margin-bottom: 12px;
  }
  
  .stat-value {
    font-size: 24px;
  }
  
  .v-card::before {
    width: 70px;
    height: 70px;
  }
}
</style>