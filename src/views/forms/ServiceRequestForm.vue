<template>
  <v-container class="form-section">
    <v-card class="form-container rounded-xl">
      <!-- En-tête -->
      <v-card-title class="form-header text-center py-6">
        <div class="header-content">
          <v-btn icon @click="cancelForm" class="back-button">
            <v-icon>mdi-arrow-left</v-icon>
          </v-btn>
          <div class="header-text">
            <h2 class="text-h4 font-weight-bold primary--text">Serviceanforderung Anfrage</h2>
            <p class="text-body-1 mt-2">
              Füllen Sie das folgende Formular aus, um eine Serviceanforderung anzufordern.
              <br />Wir werden uns umgehend mit Ihnen in Verbindung setzen.
            </p>
          </div>
          <v-icon class="service-icon" color="primary">mdi-wrench</v-icon>
        </div>
      </v-card-title>

      <!-- Étapes -->
      <v-card-text>
        <v-row justify="center" class="my-4">
          <v-col cols="4" v-for="n in 3" :key="n" class="text-center">
            <v-icon :color="step >= n ? 'primary' : 'grey'">
              {{ stepIcons[n - 1] }}
            </v-icon>
            <div :class="['step-label', { active: step === n }]">{{ stepLabels[n - 1] }}</div>
          </v-col>
        </v-row>

        <v-window v-model="step">
          <!-- Étape 1 -->
          <v-window-item :value="1">
            <v-form ref="step1Form" class="form-step">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendatenerfassung</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="form.date"
                    label="Heutiges Datum"
                    type="date"
                    required
                    variant="outlined"
                    prepend-inner-icon="mdi-calendar"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="form.name"
                    label="Vorname/Name"
                    required
                    variant="outlined"
                    prepend-inner-icon="mdi-account"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="form.company"
                    label="Firma/Kundennummer"
                    required
                    variant="outlined"
                    prepend-inner-icon="mdi-office-building"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="form.phone"
                    label="Telefon"
                    type="tel"
                    required
                    variant="outlined"
                    prepend-inner-icon="mdi-phone"
                  />
                </v-col>
              </v-row>
            </v-form>
          </v-window-item>

          <!-- Étape 2 -->
          <v-window-item :value="2">
            <v-form ref="step2Form" class="form-step">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">2. Gerätedaten</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-combobox
                    v-model="form.manufacturer"
                    :items="manufacturers"
                    label="Hersteller"
                    clearable
                    variant="outlined"
                    prepend-inner-icon="mdi-factory"
                  />

                 <v-text-field
                    v-if="form.manufacturer === 'Sonstiges'"
                    v-model="form.customManufacturer"
                    label="Bitte geben Sie den Hersteller an"
                    variant="outlined"
                    prepend-inner-icon="mdi-pencil"
                  />

                </v-col>

                <v-col cols="12" md="6">
                  <v-file-input
                    v-model="form.imageFile"
                    label="Bild des Geräts hochladen"
                    accept="image/*"
                    variant="outlined"
                    prepend-inner-icon="mdi-camera"
                    @change="validateImage"
                    :error-messages="imageError"
                  />
                  <v-img
                    v-if="form.imagePreview"
                    :src="form.imagePreview"
                    alt="Vorschau"
                    max-width="200"
                    class="mt-2 rounded-lg"
                  />
                </v-col>

                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="form.model"
                    label="Modell"
                    required
                    variant="outlined"
                    prepend-inner-icon="mdi-tag"
                  />
                </v-col>

                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="form.serial"
                    label="Seriennummer"
                    required
                    variant="outlined"
                    prepend-inner-icon="mdi-barcode"
                  />
                </v-col>
              </v-row>
            </v-form>
          </v-window-item>

          <!-- Étape 3 -->
          <v-window-item :value="3">
            <div class="form-step">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Abschluss</h3>
              <v-textarea
                v-model="form.additional"
                label="Was können wir außerdem für Sie tun?"
                variant="outlined"
                rows="3"
                prepend-inner-icon="mdi-comment"
              />

              <v-card variant="outlined" class="pa-4 mt-4">
                <h4 class="text-h6 font-weight-bold mb-2">Zusammenfassung:</h4>
                <div><strong>Name:</strong> {{ form.name }}</div>
                <div><strong>Firma:</strong> {{ form.company }}</div>
                <div><strong>Hersteller:</strong>
                  {{
                    form.manufacturer === 'Sonstiges'
                      ? form.customManufacturer || 'Nicht angegeben'
                      : form.manufacturer
                  }}
                </div>

                <div><strong>Modell:</strong> {{ form.model }}</div>
              </v-card>
            </div>
          </v-window-item>
        </v-window>
      </v-card-text>

      <!-- Boutons -->
      <v-card-actions class="form-actions">
        <v-btn :disabled="step === 1" @click="prevStep" variant="outlined">
          <v-icon start>mdi-arrow-left</v-icon> Zurück
        </v-btn>

        <v-spacer />

        <v-btn color="grey" variant="outlined" @click="cancelForm">Abbrechen</v-btn>

        <v-btn color="primary" @click="nextStep" :loading="loading">
          {{ step === 3 ? 'Absenden' : 'Weiter' }}
          <v-icon end>{{ step === 3 ? 'mdi-send' : 'mdi-arrow-right' }}</v-icon>
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
      loading: false,
      form: {
        date: this.getCurrentDate(),
        name: '',
        company: '',
        phone: '',
        manufacturer: '',
        customManufacturer: '',
        model: '',
        serial: '',
        additional: '',
        imageFile: null,
        imagePreview: null
      },
      imageError: '',
      stepLabels: ['Kundendaten', 'Gerätedaten', 'Abschluss'],
      stepIcons: ['mdi-account', 'mdi-devices', 'mdi-check-circle'],
      manufacturers: ['Ergo-Fit', 'FREI medical', 'emotion fitness', 'Sonstiges']
    };
  },
  methods: {
    getCurrentDate() {
      const today = new Date();
      return today.toISOString().substr(0, 10);
    },
    validateImage(file) {
      this.imageError = '';
      this.form.imagePreview = null;
      const image = Array.isArray(file) ? file[0] : file;
      const maxSize = 2 * 1024 * 1024;

      if (!image?.type?.startsWith('image/')) {
        this.imageError = 'Nur Bilddateien sind erlaubt.';
        return;
      }
      if (image.size > maxSize) {
        this.imageError = 'Die Bilddatei darf maximal 2 MB groß sein.';
        return;
      }

      const reader = new FileReader();
      reader.onload = (e) => {
        this.form.imagePreview = e.target.result;
      };
      reader.readAsDataURL(image);
    },
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
    cancelForm() {
      if (confirm('Möchten Sie das Formular wirklich verlassen?')) {
        this.resetForm();
      }
    },
    resetForm() {
      this.step = 1;
      this.form = {
        date: this.getCurrentDate(),
        name: '',
        company: '',
        phone: '',
        manufacturer: [],
        customManufacturer: '',
        model: '',
        serial: '',
        additional: '',
        imageFile: null,
        imagePreview: null
      };
      this.imageError = '';
    },
    submitForm() {
      this.loading = true;

      // Optionnel : Ajouter le fabricant personnalisé à la liste
      if (
        this.form.manufacturer.includes('Sonstiges') &&
        this.form.customManufacturer &&
        !this.manufacturers.includes(this.form.customManufacturer)
      ) {
        this.manufacturers.push(this.form.customManufacturer);
      }

      setTimeout(() => {
        console.log('Formularinhalt:', this.form);
        alert('Serviceanforderung erfolgreich gesendet!');
        this.resetForm();
        this.loading = false;
      }, 1500);
    }
  }
};
</script>

<style scoped>
.form-section {
  max-width: 900px;
  margin: 2rem auto;
}
.form-container {
  overflow: hidden;
}
.form-header {
  background: linear-gradient(120deg, #e3f2fd, #bbdefb);
}
.header-content {
  display: flex;
  align-items: center;
  gap: 16px;
}
.header-text {
  flex-grow: 1;
}
.service-icon {
  font-size: 2.5rem;
  opacity: 0.2;
}
.step-label {
  margin-top: 8px;
  color: grey;
}
.step-label.active {
  font-weight: bold;
  color: #1976d2;
}
.form-actions {
  background: #f5f5f5;
  border-top: 1px solid #ddd;
}
</style>
