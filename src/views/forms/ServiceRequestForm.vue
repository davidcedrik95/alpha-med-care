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
                <h4 class="text-h6 font-weight-bold mb-2">Zusammenfassung der Geräte:</h4>

                <v-card
                  v-for="(device, index) in devicesList"
                  :key="index"
                  class="mb-4"
                  variant="tonal"
                >
                  <v-card-text>
                    <div><strong>Gerät {{ index + 1 }}</strong></div>
                    <div><strong>Hersteller:</strong> {{ device.manufacturer }}</div>
                    <div><strong>Modell:</strong> {{ device.model }}</div>
                    <div><strong>Seriennummer:</strong> {{ device.serial }}</div>
                  </v-card-text>
                  <v-card-actions>
                    <v-btn
                      color="error"
                      variant="text"
                      @click="removeDevice(index)"
                      prepend-icon="mdi-delete"
                    >
                      Entfernen
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-card>

               <v-checkbox
                v-model="addAnotherDevice"
                label="Ich möchte ein weiteres Gerät hinzufügen"
                color="primary"
                class="mt-4"
              />

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
      addAnotherDevice: false,
      devicesList: [],
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
    saveDevice() {
      this.devicesList.push({
        manufacturer: this.form.manufacturer === 'Sonstiges' ? this.form.customManufacturer : this.form.manufacturer,
        model: this.form.model,
        serial: this.form.serial,
        imageFile: this.form.imageFile,
        imagePreview: this.form.imagePreview
      });

      // Reset device fields
      this.form.manufacturer = '';
      this.form.customManufacturer = '';
      this.form.model = '';
      this.form.serial = '';
      this.form.imageFile = null;
      this.form.imagePreview = null;
      this.imageError = '';
    },
    removeDevice(index) {
      this.devicesList.splice(index, 1);
    },
    nextStep() {
      if (this.step === 2) {
        this.$refs.step2Form.validate().then((valid) => {
          if (valid) {
            this.saveDevice();
            this.step++;
          }
        });
      } else if (this.step === 3 && this.addAnotherDevice) {
        this.addAnotherDevice = false;
        this.step = 2;
      } else if (this.step < 3) {
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
      this.addAnotherDevice = false;
      this.devicesList = [];
      this.form = {
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
      };
      this.imageError = '';
    },
    submitForm() {
      this.loading = true;

      if (
        this.form.manufacturer === 'Sonstiges' &&
        this.form.customManufacturer &&
        !this.manufacturers.includes(this.form.customManufacturer)
      ) {
        this.manufacturers.push(this.form.customManufacturer);
      }

      setTimeout(() => {
        console.log('Formularinhalt:', {
          ...this.form,
          geraeteliste: this.devicesList
        });
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
