<template>
  <v-container class="form-section">
    <v-card class="form-container rounded-xl">
      <!-- Nouveau header -->
      <v-card-title class="form-header text-center py-6">
        <v-btn icon @click="cancelForm" class="back-button">
          <v-icon>mdi-arrow-left</v-icon>
        </v-btn>
        <h2 class="text-h4 font-weight-bold primary--text">Serviceanforderung  Anfrage</h2>
        <p class="text-body-1 mt-2">
          Füllen Sie das folgende Formular aus, um eine Serviceanforderung anzufordern.<br>
          Wir werden uns umgehend mit Ihnen in Verbindung setzen.
        </p>
      </v-card-title>

      <v-stepper v-model="step" class="elevation-0">
        <v-stepper-header class="elevation-0">
          <v-stepper-item :value="1" :complete="step > 1" title="Kundendaten" editable />
          <v-divider />
          <v-stepper-item :value="2" :complete="step > 2" title="Gerätedaten" editable />
          <v-divider />
          <v-stepper-item :value="3" title="Abschluss" editable />
        </v-stepper-header>

        <v-stepper-window>
          <!-- Étape 1 -->
          <v-stepper-window-item :value="1">
            <v-form ref="step1Form">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendatenerfassung</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field v-model="form.date" label="Heutiges Datum" type="date" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="form.name" label="Vorname/Name" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="form.company" label="Firma/Kundennummer" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="form.street" label="Straße/Hausnummer" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="form.zipCity" label="Postleitzahl/Ort" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="form.phone" label="Telefon" type="tel" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12">
                  <v-text-field v-model="form.email" label="E-Mail-Adresse" type="email" required variant="outlined" density="comfortable" />
                </v-col>
              </v-row>
            </v-form>
          </v-stepper-window-item>

          <!-- Étape 2 -->
          <v-stepper-window-item :value="2">
            <v-form ref="step2Form">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">2. Gerätedaten</h3>
              <v-row>
                <v-col cols="12">
                  <h4 class="text-subtitle-1 font-weight-bold mb-3">Hersteller</h4>
                  <v-row>
                    <v-col v-for="item in manufacturers" :key="item" cols="6" sm="4" md="3">
                      <v-checkbox :label="item" :value="item" v-model="form.manufacturer" density="comfortable" hide-details />
                    </v-col>
                  </v-row>
                </v-col>

                <v-col cols="12" md="6">
                  <v-text-field v-model="form.model" label="Modell" required variant="outlined" density="comfortable" />
                </v-col>

                <v-col cols="12" md="6">
                  <v-text-field v-model="form.serial" label="Seriennummer" required variant="outlined" density="comfortable" />
                </v-col>

                <v-col cols="12">
                  <v-textarea
                    v-model="form.errorDesc"
                    label="Fehlerbeschreibung"
                    required
                    variant="outlined"
                    rows="4"
                    auto-grow
                    density="comfortable"
                    style="max-height: 200px; overflow-y: auto;"
                  />
                </v-col>
              </v-row>
            </v-form>
          </v-stepper-window-item>

          <!-- Étape 3 -->
          <v-stepper-window-item :value="3">
            <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Anmerkung</h3>
            <v-row>
              <v-col cols="12">
                <v-textarea
                  v-model="form.additional"
                  label="Was können wir außerdem für Sie tun?"
                  variant="outlined"
                  rows="4"
                  auto-grow
                  density="comfortable"
                />
              </v-col>
            </v-row>
          </v-stepper-window-item>
        </v-stepper-window>
      </v-stepper>

      <!-- Boutons -->
      <v-card-actions class="form-actions px-6 py-4">
        <v-btn color="grey" variant="outlined" :disabled="step === 1" @click="prevStep">
          <v-icon start>mdi-arrow-left</v-icon>
          Zurück
        </v-btn>
        <v-spacer />
        <v-btn color="grey" variant="outlined" @click="cancelForm">
          Abbrechen
        </v-btn>
        <v-btn color="primary" @click="nextStep">
          {{ step === 3 ? 'Absenden' : 'Weiter' }}
          <v-icon end>mdi-arrow-right</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: 'ServiceRequestForm',
  data() {
    return {
      step: 1,
      form: {
        date: "",
        name: "",
        company: "",
        street: "",
        zipCity: "",
        phone: "",
        email: "",
        manufacturer: [],
        model: "",
        serial: "",
        errorDesc: "",
        additional: ""
      },
      manufacturers: [
        "Ergo-Fit",
        "FREI medical",
        "emotion fitness",
        "Physiomed",
        "RECK-Technik (MOTOmed)",
        "ergoline",
        "proxomed",
        "Sonstiges"
      ]
    };
  },
  methods: {
    nextStep() {
      if (this.step < 3) {
        this.step++;
      } else {
        this.submitForm();
      }
    },
    prevStep() {
      if (this.step > 1) {
        this.step--;
      }
    },
    submitForm() {
      console.log("Serviceanforderung gesendet:", this.form);
      this.$notify({
        title: "Erfolg!",
        text: "Serviceanforderung erfolgreich gesendet!",
        type: "success"
      });
      this.resetForm();
    },
    cancelForm() {
      this.resetForm();
    },
    resetForm() {
      this.step = 1;
      this.form = {
        date: "",
        name: "",
        company: "",
        street: "",
        zipCity: "",
        phone: "",
        email: "",
        manufacturer: [],
        model: "",
        serial: "",
        errorDesc: "",
        additional: ""
      };
    }
  }
};
</script>

<style scoped>
.form-section {
  margin-top: 30px;
  margin-bottom: 50px;
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
</style>
