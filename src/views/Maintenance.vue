<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <v-container class="py-12">
      <v-row align="start" justify="center" class="gap-4">
        <!-- Colonne image à gauche -->
        <v-col cols="12" md="5" class="d-flex flex-column">
          <div class="left-content">
            <v-img
              src="/images/logo.png"
              alt="Wartungsvertrag Alpha Med Care"
              height="70"
              contain
              class="mb-5"
            />
            <!-- Image principale avec hauteur dynamique -->
            <v-img
              src="/images/wartungsvertrag.jpg"
              alt="Wartungsvertrag"
              class="main-image mb-2"
              cover
              :height="imageMaxHeight + 'px'"
            />

            <!-- Statistiques -->
            <v-row class="stats-container" justify="center" no-gutters>
              <v-col
                cols="4"
                class="stat-item"
                v-for="(stat, index) in contractStats"
                :key="index"
                :style="{ animationDelay: (index * 0.3) + 's' }"
              >
                <div class="stat-circle">
                  <span class="stat-value">{{ stat.value }}</span>
                </div>
                <div class="stat-label">{{ stat.label }}</div>
              </v-col>
            </v-row>
          </div>
        </v-col>

        <!-- Colonne texte à droite -->
        <v-col cols="12" md="7" class="d-flex justify-center">
          <v-fade-transition mode="out-in">
            <div v-if="!showForm">
              <v-card ref="cardRef" class="modern-card pa-5 bg-white">
                <h2 class="section-title mb-5">WARTUNGSVERTRAG</h2>
                <div class="text-body text-grey-darken-2">
                  <div class="feature-item mb-6">
                    <div class="feature-icon small">
                      <v-icon color="#1565C0" size="20">mdi-check-decagram</v-icon>
                    </div>
                    <div>
                      Welche Form des Wartungsvertrages Sie auch wählen, entscheidend ist, dass Sie sich für eine fachgerechte Pflege Ihrer Geräte entscheiden. So wie Sie es von der alpha med care erwarten können.
                    </div>
                  </div>
                  <div class="feature-item mb-6">
                    <div class="feature-icon small">
                      <v-icon color="#1565C0" size="20">mdi-shield-check</v-icon>
                    </div>
                    <div>
                      Durch Wartung, Pflege sowie elektrotechnische Kontrollen wird ein stetiges und genaues Funktionieren Ihrer Produkte gewährleistet. Die Prüfung ist gesetzlich verankert.
                    </div>
                  </div>
                  <div class="feature-item mb-6">
                    <div class="feature-icon small">
                      <v-icon color="#1565C0" size="20">mdi-handshake</v-icon>
                    </div>
                    <div>
                      Der Wartungsvertrag mit alpha med care erfüllt gesetzliche Vorschriften und stellt Ihnen einen leistungsstarken Partner an die Seite.
                    </div>
                  </div>

                  <div class="highlight-text mt-6">
                    <p class="mb-2 font-weight-medium">
                      Wartungsvertrag einfach Online ausfüllen.
                    </p>
                    <a 
                      href="#" 
                      @click.prevent="showForm = true" 
                      class="text-primary font-weight-bold"
                    >
                      Wartungsvertrag jetzt anfordern
                    </a>
                  </div>
                </div>
              </v-card>
            </div>

            <!-- Formulaire de demande de contrat -->
            <v-card v-else class="form-container rounded-xl" ref="cardRef">
              <v-card-title class="form-header text-center py-6">
                <v-btn icon @click="showForm = false" class="back-button">
                  <v-icon>mdi-arrow-left</v-icon>
                </v-btn>
                <h2 class="text-h4 font-weight-bold primary--text">Wartungsvertrag Anfrage</h2>
                <p class="text-body-1 mt-2">
                  Füllen Sie das folgende Formular aus, um einen Wartungsvertrag anzufordern.<br>
                  Wir werden uns umgehend mit Ihnen in Verbindung setzen.
                </p>
              </v-card-title>
              
              <v-form class="px-6 pb-6 mt-2">
                <v-row>
                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="formData.company"
                      label="Firma"
                      required
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="formData.contactPerson"
                      label="Ansprechpartner"
                      required
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="8">
                    <v-text-field
                      v-model="formData.street"
                      label="Straße"
                      required
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="formData.zip"
                      label="PLZ"
                      required
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="formData.city"
                      label="Ort"
                      required
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="formData.phone"
                      label="Telefon/Fax"
                      required
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field
                      v-model="formData.email"
                      label="E-Mail"
                      type="email"
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  
                  <v-col cols="12">
                    <h3 class="text-h5 font-weight-bold primary--text mb-4">Bitte wählen Sie:</h3>
                    <v-checkbox
                      v-model="formData.options"
                      value="appointment"
                      label="Wir wünschen einen persönlichen Termin"
                      density="comfortable"
                      hide-details
                    ></v-checkbox>
                    <v-checkbox
                      v-model="formData.options"
                      value="consultation"
                      label="Wir wünschen telefonische persönliche Beratung"
                      density="comfortable"
                      hide-details
                    ></v-checkbox>
                    <v-checkbox
                      v-model="formData.options"
                      value="information"
                      label="Bitte senden Sie uns Informationsmaterial"
                      density="comfortable"
                      hide-details
                    ></v-checkbox>
                  </v-col>
                </v-row>
              </v-form>
              
              <v-card-actions class="form-actions px-6 py-4">
                <v-btn
                  color="grey"
                  variant="outlined"
                  @click="showForm = false"
                >
                  <v-icon start>mdi-arrow-left</v-icon>
                  Zurück
                </v-btn>
                
                <v-spacer></v-spacer>
                
                <v-btn
                  color="primary"
                  @click="submitForm"
                >
                  Anfrage senden
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-fade-transition>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "Maintenance",
  data() {
    return {
      contractStats: [
        { value: "100%", label: "Sicherheit" },
        { value: "gesetzlich", label: "Konform" },
      ],
      imageMaxHeight: null,
      showForm: false,
      formData: {
        company: "",
        contactPerson: "",
        street: "",
        zip: "",
        city: "",
        phone: "",
        email: "",
        options: []
      }
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
    submitForm() {
      console.log("Formulardaten:", this.formData);
      
      // Simuler l'envoi du formulaire
      this.$notify({
        title: "Anfrage gesendet!",
        text: "Vielen Dank für Ihre Anfrage. Wir werden uns in Kürze bei Ihnen melden.",
        type: "success"
      });
      
      // Réinitialiser le formulaire et revenir à la vue principale
      this.showForm = false;
      this.resetForm();
    },
    resetForm() {
      this.formData = {
        company: "",
        contactPerson: "",
        street: "",
        zip: "",
        city: "",
        phone: "",
        email: "",
        options: []
      };
    }
  }
};
</script>

<style scoped>
/* Styles existants conservés */
.left-content {
  width: 100%;
}

.main-image {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}
.main-image:hover {
  transform: scale(1.03);
}

.modern-card {
  border-radius: 12px !important;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1) !important;
  border-top: 5px solid #1976D2;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
}
.modern-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 44px rgba(0, 0, 0, 0.15) !important;
}

.section-title {
  font-family: "Montserrat", sans-serif;
  font-weight: 700;
  font-size: 1.6rem;
  letter-spacing: 0.7px;
  color: #1565C0;
  padding-bottom: 14px;
  position: relative;
  margin-bottom: 1.8rem;
}
.section-title::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 70px;
  height: 4px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 3px;
}

.text-body {
  font-size: 1.1rem;
  line-height: 1.65;
  color: #37474F;
}

.feature-item {
  display: flex;
  align-items: flex-start;
  font-size: 1rem;
}

.feature-icon.small {
  background: #E3F2FD;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 16px;
  flex-shrink: 0;
  color: #1565C0;
}

.highlight-text {
  background: linear-gradient(120deg, #E3F2FD, #BBDEFB);
  border-left: 5px solid #1976D2;
  padding: 20px;
  border-radius: 0 12px 12px 0;
  font-size: 0.9rem;
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.07);
  max-width: 480px;
  margin-left: 0;
  margin-right: auto;
  position: relative;
}

.highlight-text::before {
  content: '"';
  position: absolute;
  top: -14px;
  left: 16px;
  font-size: 48px;
  color: #1976D2;
  opacity: 0.15;
  font-family: serif;
}

.stats-container {
  margin-top: 20px;
}

.stat-item {
  text-align: center;
  padding: 6px;
  display: flex;
  flex-direction: column;
  align-items: center;
  opacity: 0;
  transform: translateY(20px);
  animation: fadeSlideUp 0.7s forwards;
}

.stat-circle {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background: rgba(25, 118, 210, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 8px;
  box-shadow: 0 0 8px rgba(25, 118, 210, 0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: default;
}
.stat-circle:hover {
  transform: scale(1.1);
  box-shadow: 0 0 16px rgba(25, 118, 210, 0.5);
}
.stat-value {
  font-size: 15px;
  font-weight: 700;
  color: #1976D2;
  user-select: none;
}
.stat-label {
  font-size: 13px;
  color: #546E7A;
  text-align: center;
  max-width: 80px;
  word-break: break-word;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  user-select: none;
}

@keyframes fadeSlideUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Nouveaux styles pour le formulaire */
.form-container {
  width: 100%;
  border-radius: 12px !important;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1) !important;
  border-top: 5px solid #1976D2;
  overflow: hidden;
}

.form-header {
  position: relative;
  background: linear-gradient(120deg, #E3F2FD, #BBDEFB);
}

.form-header h2 {
  position: relative;
  padding-bottom: 15px;
}

.form-header h2::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: #f57c00;
  border-radius: 2px;
}

.form-actions {
  border-top: 1px solid rgba(0, 0, 0, 0.12);
}

.back-button {
  position: absolute;
  left: 20px;
  top: 20px;
  z-index: 10;
}

@media (max-width: 600px) {
  .section-title {
    font-size: 1.4rem !important;
    text-align: center;
  }
  .text-body {
    font-size: 0.9rem;
  }
  .highlight-text {
    padding: 14px;
    font-size: 0.8rem;
  }
  .stat-circle {
    width: 60px;
    height: 60px;
  }
  .stat-value {
    font-size: 20px;
  }
  .stat-label {
    font-size: 11px;
  }
  .feature-icon.small {
    width: 28px;
    height: 28px;
  }
  .modern-card {
    padding: 24px !important;
  }
  
  .form-header h2 {
    font-size: 1.8rem;
    padding-top: 40px;
  }
  .back-button {
    top: 10px;
    left: 10px;
  }
}
</style>