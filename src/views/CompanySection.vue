<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <v-container class="py-10">
      <v-row align="start" justify="center" no-gutters>
        <!-- Colonne image à gauche -->
        <v-col cols="12" md="5" class="d-flex justify-center">
          <div class="left-content">
            <v-img
              src="/images/logo.png"
              alt="Logo Alpha Med Care"
              max-height="70"
              contain
              class="mb-4"
              style="max-width: 180px; border: 1px solid grey;"
            />
            <v-img
              src="/images/company.png"
              alt="Alpha Med Care"
              height="340"
              cover
              class="main-image"
            />
          </div>
        </v-col>

        <!-- Colonne texte à droite -->
        <v-col cols="12" md="5" class="d-flex justify-center">
          <v-card
            class="modern-card pa-3 pa-md-5 bg-white"
            style="width: 100%; max-width: 480px;"
          >
            <h2 class="section-title text-h5 font-weight-bold text-blue-darken-4 mb-4">
              DAS UNTERNEHMEN
            </h2>
            <div class="text-body text-grey-darken-2">
              <div class="feature-item mb-5">
                <div class="feature-icon small">
                  <v-icon color="blue-darken-2" size="18">mdi-account-group</v-icon>
                </div>
                <div>
                  Wir sind ein junges, aufstrebendes Unternehmen, das auf dem
                  neusten Stand der Technik arbeitet und Ihnen im Bereich der
                  Pflege, Reparatur, Wartung und Anschaffung Ihrer Geräte mit Rat
                  und Tat zur Seite steht.
                </div>
              </div>
              <div class="feature-item mb-5">
                <div class="feature-icon small">
                  <v-icon color="blue-darken-2" size="18">mdi-medical-bag</v-icon>
                </div>
                <div>
                  Unsere Medizinprodukteberater stehen Ihnen gerne zur Verfügung.
                  alpha med care kümmert sich um Ihre medizinischen Produkte,
                  sowie Sport- und Fitnessgeräte. Unsere Experten entwickeln im
                  Bedarfsfall ein auf Ihre Bedürfnisse maßgeschneidertes Konzept,
                  damit Ihre Geräte fit für die Zukunft sind.
                </div>
              </div>
              <div class="feature-item mb-5">
                <div class="feature-icon small">
                  <v-icon color="blue-darken-2" size="18">mdi-tools</v-icon>
                </div>
                <div>
                  Von der kleinen Wartung, über die sicherheitstechnische Kontrolle
                  (STK), bis hin zur Reparatur inklusive messtechnischer Kontrolle
                  (MTK), vor Ort in Ihrem Unternehmen: Mehr Vielfalt und Flexibilität
                  werden Sie nirgends finden.
                </div>
              </div>
              <div class="feature-item mb-5">
                <div class="feature-icon small">
                  <v-icon color="blue-darken-2" size="18">mdi-chart-line</v-icon>
                </div>
                <div>
                  Wir können nun auf mehr als vier Jahre Erfahrung im
                  medizintechnischen Bereich zurück greifen, und erzielen somit
                  den idealsten Nutzen für Ihr Unternehmen.
                </div>
              </div>
              <div class="highlight-text mb-4">
                <p class="mb-0 text-center font-weight-medium">
                  Vertrauen Sie sich uns an, ...wir kümmern uns!
                </p>
              </div>

              <v-row class="stats-container">
                <v-col cols="4" class="stat-item">
                  <div class="stat-value">4+</div>
                  <div class="stat-label">Jahre</div>
                </v-col>
                <v-col cols="4" class="stat-item">
                  <div class="stat-value">360°</div>
                  <div class="stat-label">Service</div>
                </v-col>
                <v-col cols="4" class="stat-item">
                  <div class="stat-value">100%</div>
                  <div class="stat-label">Zufriedenheit</div>
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
};
</script>

<style scoped>
.left-content {
  width: 100%;
  max-width: 480px;
}
.main-image {
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  width: 100%;
  border-radius: 8px;
}

.modern-card {
  border-radius: 5px !important;
  overflow: hidden;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1) !important;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-top: 4px solid #1976D2;
  position: relative;
}
.modern-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.12) !important;
}
.section-title {
  font-family: 'Montserrat', sans-serif;
  letter-spacing: 0.5px;
  padding-bottom: 12px;
  position: relative;
}
.section-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 60px;
  height: 3px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 2px;
}
.text-body {
  font-size: 1.05rem;
  line-height: 1.5;
}
.feature-item {
  display: flex;
  align-items: flex-start;
  font-size: 1rem; /* Avant : 0.85rem */
}
.feature-icon.small {
  background: #E3F2FD;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  flex-shrink: 0;
}
.highlight-text {
  background: linear-gradient(120deg, #E3F2FD, #BBDEFB);
  border-left: 4px solid #1976D2;
  padding: 16px;
  border-radius: 0 8px 8px 0;
  position: relative;
  font-size: 0.85rem;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}
.highlight-text::before {
  content: '"';
  position: absolute;
  top: -10px;
  left: 12px;
  font-size: 40px;
  color: #1976D2;
  opacity: 0.15;
  font-family: serif;
}
.stats-container {
  margin-top: 10px;
}
.stat-item {
  text-align: center;
  padding: 4px;
}
.stat-value {
  font-size: 26px; /* Avant : 22px */
  font-weight: 700;
  color: #1976D2;
}
.stat-label {
 font-size: 13px; /* Avant : 11px */
  color: #546E7A;
}

@media (max-width: 600px) {
  .section-title {
    font-size: 1.3rem !important;
    text-align: center;
  }

  .text-body {
    font-size: 0.82rem;
  }

  .highlight-text {
    padding: 12px;
  }

  .stat-value {
    font-size: 18px;
  }

  .stat-label {
    font-size: 10px;
  }

  .feature-icon.small {
    width: 26px;
    height: 26px;
  }
}
</style>
