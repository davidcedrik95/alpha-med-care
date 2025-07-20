<template>
  <v-container fluid class="service-partner-section pa-0">
    <!-- Formes décoratives -->
    <div class="decorative-shape shape-1"></div>
    <div class="decorative-shape shape-2"></div>

    <!-- Titre de section -->
    <div class="section-title mt-4">
      <h2>UNSER SERVICE PARTNER PROGRAMM</h2>
    </div>

    <v-container class="py-12">
      <v-row align="start" justify="center" class="gap-4">
        <!-- Colonne image -->
        <v-col cols="12" md="5" class="d-flex flex-column">
          <div class="left-content">
            <v-hover v-slot="{ isHovering, props }">
              <v-img
                src="/images/service-partner.png"
                alt="Service Partner"
                class="main-image mb-2 service-partner-image"
                contain
                :height="imageMaxHeight + 'px'"
                style="max-width: 100%; object-fit: cover;"
                v-bind="props"
                :elevation="isHovering ? 12 : 6"
              >
                <div class="image-overlay" :class="{ 'active': isHovering }">
                  <div class="overlay-content">
                    <div class="text-h6 font-weight-bold">Autorisierte Service-Partner</div>
                    <div class="text-caption mt-2">Wir reparieren direkt vor Ort!</div>
                  </div>
                </div>
              </v-img>
            </v-hover>

            <!-- Badges partenaires -->
            <v-row class="mt-6" justify="center">
              <v-col cols="4" sm="3" class="text-center" v-for="(partner, index) in partners" :key="index">
                <div class="partner-badge">
                  <v-icon large color="#1976D0" class="mb-2">{{ partner.icon }}</v-icon>
                  <div class="text-caption font-weight-medium">{{ partner.name }}</div>
                </div>
              </v-col>
            </v-row>
          </div>
        </v-col>

        <!-- Colonne texte -->
        <v-col cols="12" md="7" class="d-flex flex-column justify-center">
          <!-- Carte principale -->
          <v-card ref="cardRef" class="modern-card pa-5 bg-white">
            <div class="section-header">
              <div class="section-tag">SERVICE PARTNER</div>
              <div class="accent-divider"></div>
            </div>

            <div class="text-body text-grey-darken-2">
              <div class="d-flex align-start mb-6">
                <v-icon color="#1976D0" size="32" class="mr-4 mt-1">mdi-wrench</v-icon>
                <div>
                  <p class="mb-4 feature-text">
                    Anders als bei der klassischen Medizintechnik, hat unser Unternehmen bei mehreren Herstellern von Medizinprodukten eine Service-Partner-Verbindung, wie z. B. <strong>ERGO-FIT</strong>, <strong>h/p/cosmos</strong>, <strong>FREI AG</strong>, <strong>ergoline</strong>, <strong>Amer Sports</strong>, <strong>Star Trac</strong> und viele weitere.
                  </p>
                </div>
              </div>

              <v-row class="mb-6">
                <v-col cols="12" md="6">
                  <div class="feature-card">
                    <v-icon color="#1976D0" size="26" class="mr-3">mdi-tools</v-icon>
                    <div>
                      <h3 class="feature-title">Vor Ort Reparatur</h3>
                      <p>Defekte Geräte werden direkt bei Ihnen repariert</p>
                    </div>
                  </div>
                </v-col>
                <v-col cols="12" md="6">
                  <div class="feature-card">
                    <v-icon color="#1976D0" size="26" class="mr-3">mdi-certificate</v-icon>
                    <div>
                      <h3 class="feature-title">Autorisierter Partner</h3>
                      <p>Offizielle Zertifizierung durch Hersteller</p>
                    </div>
                  </div>
                </v-col>
              </v-row>

              <div class="d-flex align-start mb-6">
                <v-icon color="#1976D0" size="32" class="mr-4 mt-1">mdi-currency-eur</v-icon>
                <div>
                  <p class="mb-4 feature-text">
                    Dieser entscheidende Vorteil spiegelt sich nicht nur finanziell positiv wider, sondern zeigt sich auch in unserer <strong>fachlichen Kompetenz</strong> gegenüber Ihren Geräten. Selbstverständlich gehören <strong>Pflege, Wartung und Reparatur</strong> bei Ihnen vor Ort zu unseren Stärken.
                  </p>
                </div>
              </div>

              <div class="feature-card">
                <v-icon color="#1976D0" size="26" class="mr-3">mdi-calendar-check</v-icon>
                <div>
                  <h3 class="feature-title">Prüfpflichten erfüllt</h3>
                  <p>Nur einmaliger Kostenaufwand für alle gesetzlichen Prüfpflichten</p>
                </div>
              </div>

              <div class="mt-6 pa-4 callout-card">
                <v-icon color="#1976D0" size="28" class="mr-3">mdi-check-circle</v-icon>
                <div class="font-weight-bold text-primary">
                  Wir reparieren und prüfen vor Ort! Vertrauen Sie uns Ihre Geräte an – wir kümmern uns darum!
                </div>
              </div>
            </div>
          </v-card>

          <!-- NOUVELLE CARTE CTA -->
          <v-card class="pa-6 mt-4 rounded-lg cta-card">
            <v-row align="center">
              <v-col cols="12" md="8">
                <div class="text-body-1 mt-2">
                  Kontaktieren Sie uns für eine unverbindliche Beratung und Angebotserstellung.
                </div>
              </v-col>
              <v-col cols="12" md="4" class="text-md-right">
                <v-btn 
                  color="#1976D2" 
                  class="mt-2" 
                  rounded="lg" 
                  size="large"
                  href="/kontakt"
                  style="font-size: 12px;"
                >
                  Kontakt aufnehmen
                  <v-icon end>mdi-arrow-right</v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "ServicePartner",
  data() {
    return {
      imageMaxHeight: null,
      partners: [
        { icon: "mdi-dumbbell", name: "ERGO-FIT" },
        { icon: "mdi-run", name: "h/p/cosmos" },
        { icon: "mdi-cogs", name: "FREI AG" },
        { icon: "mdi-yoga", name: "ergoline" },
        { icon: "mdi-weight-lifter", name: "Amer Sports" },
        { icon: "mdi-bike", name: "Star Trac" }
      ]
    };
  },
  mounted() {
    this.setImageHeight();
    window.addEventListener("resize", this.setImageHeight);
  },
  beforeUnmount() {
    window.removeEventListener("resize", this.setImageHeight);
  },
  methods: {
    setImageHeight() {
      const card = this.$refs.cardRef;
      if (card && card.$el) {
        const cardHeight = card.$el.offsetHeight;
        this.imageMaxHeight = cardHeight - 100;
      }
    },
  },
};
</script>


<style scoped>
.service-partner-section {
  background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
  position: relative;
  overflow: hidden;
}

/* Formes décoratives */
.decorative-shape {
  position: absolute;
  border-radius: 50%;
  opacity: 0.05;
  z-index: 0;
}

.shape-1 {
  width: 350px;
  height: 350px;
  background: linear-gradient(135deg, #1976D2, #42A5F5);
  top: -120px;
  right: -120px;
}

.shape-2 {
  width: 250px;
  height: 250px;
  background: linear-gradient(135deg, #2196F3, #64B5F6);
  bottom: -100px;
  left: -100px;
  opacity: 0.07;
}

/* Titre de section */
.section-title {
  margin-bottom: 50px;
  text-align: center;
  position: relative;
}

.section-title h2 {
  color: #0d47a1;
  font-size: 2rem;
  font-weight: 700;
  display: inline-block;
  padding: 0 80px;
  position: relative;
  background-color: transparent;
}

.section-title h2::after {
  content: "";
  position: absolute;
  bottom: -15px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 4px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 3px;
}

/* En-tête de carte */
.section-header {
  margin-bottom: 20px;
}

.section-tag {
  background: linear-gradient(90deg, #1976D2, #42A5F5);
  color: white;
  display: inline-block;
  padding: 6px 16px;
  border-radius: 16px;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.03em;
  margin-bottom: 12px;
}

.accent-divider {
  height: 4px;
  width: 70px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 3px;
  margin: 8px 0 16px 0;
}

/* Carte principale */
.modern-card {
  border-radius: 12px !important;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1) !important;
  border-top: 4px solid #1976D2 !important;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  background: linear-gradient(145deg, #ffffff, #f8fafc) !important;
}

.modern-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 44px rgba(0, 0, 0, 0.15) !important;
}

/* Image styling */
.main-image {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
  position: relative;
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
  border-radius: 12px;
  display: flex;
  align-items: flex-end;
  padding: 20px;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.image-overlay.active {
  opacity: 1;
}

.overlay-content {
  color: white;
  transform: translateY(20px);
  transition: transform 0.3s ease;
  opacity: 0;
}

.image-overlay.active .overlay-content {
  transform: translateY(0);
  opacity: 1;
}

/* Feature cards */
.feature-card {
  display: flex;
  align-items: flex-start;
  padding: 16px;
  border-radius: 14px;
  background: rgba(227, 242, 253, 0.3);
  transition: all 0.3s ease;
  border: 1px solid rgba(25, 118, 210, 0.1);
  height: 100%;
  margin-bottom: 16px;
}

.feature-card:hover {
  background: rgba(227, 242, 253, 0.5);
  transform: translateX(5px);
  box-shadow: 0 5px 15px rgba(25, 118, 210, 0.1);
}

.feature-title {
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  font-size: 1.1rem;
  color: #1565C0;
  margin-bottom: 6px;
}

.text-body {
  font-size: 1.05rem;
  line-height: 1.65;
  color: #37474F;
}

.feature-text {
  font-size: 1.05rem;
  line-height: 1.7;
}

/* Partenaires badges */
.partner-badge {
  background: white;
  padding: 12px 8px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.partner-badge:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(25, 118, 210, 0.15);
}

/* Callout card */
.callout-card {
  background: rgba(227, 242, 253, 0.4);
  border-radius: 12px;
  display: flex;
  align-items: center;
  border-left: 3px solid #1976D2;
}

/* CTA card */
.cta-card {
  background: linear-gradient(145deg, #ffffff, #f8fafc);
  box-shadow: 0 8px 25px rgba(25, 118, 210, 0.15) !important;
  border-top: 4px solid #1976D2;
  transition: all 0.3s ease;
}

.cta-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(25, 118, 210, 0.2) !important;
}

/* Responsive */
@media (max-width: 960px) {
  .section-title h2 {
    font-size: 1.8rem;
    padding: 0 40px;
  }
  
  .feature-card {
    padding: 14px;
  }
  
  .partner-badge {
    padding: 10px 6px;
  }
}

@media (max-width: 600px) {
  .section-title h2 {
    font-size: 1.5rem;
    padding: 0 20px;
  }
  
  .section-title h2::after {
    width: 70px;
  }
  
  .feature-card {
    margin-bottom: 12px;
  }
  
  .callout-card {
    flex-direction: column;
    text-align: center;
  }
}
</style>