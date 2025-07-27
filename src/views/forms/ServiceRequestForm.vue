<template>
  <v-container class="form-section">
    <v-card class="form-container">
      <!-- En-tête -->
      <v-card-title class="form-header text-center py-6">
        <div class="header-content">
          <v-btn icon @click="cancelForm" class="back-button">
            <v-icon>mdi-arrow-left</v-icon>
          </v-btn>
          <div class="header-text">
            <h2 class="text-h4 font-weight-bold primary--text">Serviceanforderung Anfrage</h2>
            <p class="text-body-2 mt-2">
              Füllen Sie das folgende Formular aus, um eine Serviceanforderung anzufordern.
              <br />Wir werden uns umgehend mit Ihnen in Verbindung setzen.
            </p>
          </div>
          <v-icon class="service-icon" color="primary">mdi-wrench</v-icon>
        </div>
      </v-card-title>

      <!-- Étapes -->
      <v-card-text>
        <v-alert v-if="formError" type="error" class="mb-4" dense>
          {{ formError }}
        </v-alert>
        
        <v-row justify="center" class="my-4">
          <v-col cols="4" v-for="n in 3" :key="n" class="text-center">
            <v-icon :color="step >= n ? 'primary' : 'grey'">
              {{ stepIcons[n - 1] }}
            </v-icon>
            <div :class="['step-label', { active: step === n }]">
              {{ stepLabels[n - 1] }}
            </div>
          </v-col>
        </v-row>

        <v-window v-model="step">
          <!-- Étape 1 : Kundendaten -->
          <v-window-item :value="1">
            <v-form ref="step1Form" class="form-step">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendatenerfassung</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="form.firstname" 
                    label="Vorname" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-account"
                    :error-messages="v$.form.firstname.$errors.map(e => e.$message)"
                    @input="v$.form.firstname.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="form.lastname" 
                    label="Nachname" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-account"
                    :error-messages="v$.form.lastname.$errors.map(e => e.$message)"
                    @input="v$.form.lastname.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="form.company" 
                    label="Firma/Kundennummer" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-office-building"
                    :error-messages="v$.form.company.$errors.map(e => e.$message)"
                    @input="v$.form.company.$touch"
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
                    :error-messages="v$.form.phone.$errors.map(e => e.$message)"
                    @input="v$.form.phone.$touch"
                  />
                </v-col>
                <v-col cols="12" md="8">
                  <v-text-field 
                    v-model="form.address" 
                    label="Adresse" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-home"
                    :error-messages="v$.form.address.$errors.map(e => e.$message)"
                    @input="v$.form.address.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field 
                    v-model="form.hausnummer" 
                    label="Hausnummer" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-pound"
                    :error-messages="v$.form.hausnummer.$errors.map(e => e.$message)"
                    @input="v$.form.hausnummer.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field 
                    v-model="form.plz" 
                    label="PLZ" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-map-marker"
                    :error-messages="v$.form.plz.$errors.map(e => e.$message)"
                    @input="v$.form.plz.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field 
                    v-model="form.ort" 
                    label="Ort" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-city"
                    :error-messages="v$.form.ort.$errors.map(e => e.$message)"
                    @input="v$.form.ort.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-select 
                    v-model="form.land" 
                    :items="countries" 
                    label="Land" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-earth" 
                    return-object
                    :error-messages="v$.form.land.$errors.map(e => e.$message)"
                    @update:modelValue="v$.form.land.$touch"
                  />
                </v-col>
              </v-row>
            </v-form>
          </v-window-item>

          <!-- Étape 2 : Gerätedaten -->
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
                    :error-messages="v$.form.manufacturer.$errors.map(e => e.$message)"
                    @update:modelValue="v$.form.manufacturer.$touch"
                  />
                  <v-text-field
                    v-if="form.manufacturer === 'Sonstiges'"
                    v-model="form.customManufacturer"
                    label="Bitte geben Sie den Hersteller an"
                    variant="outlined"
                    prepend-inner-icon="mdi-pencil"
                    :error-messages="v$.form.customManufacturer.$errors.map(e => e.$message)"
                    @input="v$.form.customManufacturer.$touch"
                  />
                </v-col>

                <v-col cols="12" md="6">
                  <v-file-input
                    label="Bilder des Geräts hochladen"
                    accept="image/jpeg,image/png,image/gif"
                    multiple
                    variant="outlined"
                    prepend-inner-icon="mdi-camera"
                    :error-messages="imageError"
                    @update:modelValue="handleImageUpload"
                  />

                  <v-row v-if="form.imagePreviews.length" class="mt-2" align="center">
                    <v-col v-for="(src, i) in form.imagePreviews" :key="i" cols="12" md="6" lg="4">
                      <div class="image-row">
                        <v-img :src="src" max-width="150" max-height="100" class="rounded-lg" />
                        <v-icon class="remove-image-btn" @click="removeImage(i)" title="Bild entfernen">
                          mdi-close-circle
                        </v-icon>
                      </div>
                    </v-col>
                  </v-row>
                  <div v-if="imageError" class="text-caption text-error">{{ imageError }}</div>
                </v-col>

                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="form.model" 
                    label="Modell" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-tag"
                    :error-messages="v$.form.model.$errors.map(e => e.$message)"
                    @input="v$.form.model.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="form.serial" 
                    label="Seriennummer" 
                    required 
                    variant="outlined" 
                    prepend-inner-icon="mdi-barcode"
                    :error-messages="v$.form.serial.$errors.map(e => e.$message)"
                    @input="v$.form.serial.$touch"
                  />
                </v-col>
              </v-row>
            </v-form>
          </v-window-item>

          <!-- Étape 3 : Abschluss -->
          <v-window-item :value="3">
            <div class="form-step">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Abschluss</h3>
              <v-alert v-if="step3Error" type="error" class="mb-4" dense>
                {{ step3Error }}
              </v-alert>

              <v-textarea 
                v-model="form.additional" 
                label="Was können wir außerdem für Sie tun?" 
                variant="outlined" 
                rows="3" 
                prepend-inner-icon="mdi-comment"
                :error-messages="v$.form.additional.$errors.map(e => e.$message)"
                @input="v$.form.additional.$touch"
              />

              <v-card variant="outlined" class="pa-4 mt-4">
                <h4 class="text-h6 font-weight-bold mb-2">Zusammenfassung der Geräte:</h4>

                <v-card v-for="(device, index) in devicesList" :key="index" class="mb-4" variant="tonal">
                  <v-card-text>
                    <v-row>
                      <v-col cols="12" md="6">
                        <div><strong>Gerät {{ index + 1 }}</strong></div>
                        <div><strong>Hersteller:</strong> {{ device.manufacturer }}</div>
                        <div><strong>Modell:</strong> {{ device.model }}</div>
                        <div><strong>Seriennummer:</strong> {{ device.serial }}</div>
                        <div v-if="device.imageFiles.length" class="mt-2">
                          <strong>Dateien:</strong>
                          <ul>
                            <li v-for="(file, i) in device.imageFiles" :key="i">{{ file.name }}</li>
                          </ul>
                        </div>
                      </v-col>
                      <v-col cols="12" md="6" class="d-flex flex-wrap align-start">
                        <v-img v-for="(src, i) in device.imagePreviews" :key="i" :src="src" max-width="120" max-height="100" class="mr-2 mb-2 rounded-lg" />
                      </v-col>
                    </v-row>
                  </v-card-text>
                  <v-card-actions>
                    <v-btn color="error" variant="text" @click="removeDevice(index)" prepend-icon="mdi-delete">
                      Entfernen
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-card>

              <div class="d-flex align-center mt-4">
                <v-btn icon @click="addNewDevice" style="height: 40px; width: 40px;">
                  <v-icon>mdi-plus</v-icon>
                </v-btn>
                <span class="ml-3 font-weight-medium">Weiteres Gerät hinzufügen</span>
              </div>
            </div>
          </v-window-item>
        </v-window>
      </v-card-text>

      <!-- Boutons navigation -->
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
import { useVuelidate } from '@vuelidate/core'
import { required, helpers, maxLength, minLength } from '@vuelidate/validators'

// Fonction de validation de téléphone
const phoneFormat = (value) => /^[\d\s+\-()]{5,20}$/.test(value)

// Fonction de validation de PLZ
const plzFormat = (value) => /^\d{4,6}$/.test(value)

// Fonction de sanitisation XSS
const sanitizeInput = (value) => {
  if (typeof value !== 'string') return value
  return value
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;')
}

export default {
  name: 'ServiceRequestForm',
  setup() {
    return { v$: useVuelidate() }
  },
  data() {
    return {
      step: 1,
      loading: false,
      formError: '',
      step3Error: '',
      devicesList: [],
      imageError: '',
      form: {
        firstname: '',
        lastname: '',
        company: '',
        phone: '',
        address: '',
        hausnummer: '',
        plz: '',
        ort: '',
        land: 'Deutschland',
        manufacturer: '',
        customManufacturer: '',
        model: '',
        serial: '',
        additional: '',
        imageFiles: [],
        imagePreviews: [],
      },
      stepLabels: ['Kundendaten', 'Gerätedaten', 'Abschluss'],
      stepIcons: ['mdi-account', 'mdi-devices', 'mdi-check-circle'],
      manufacturers: ['Ergo-Fit', 'FREI medical', 'emotion fitness', 'Sonstiges'],
      countries: [
        'Belgien', 'Dänemark', 'Deutschland', 'Finnland', 'Frankreich', 'Großbritannien',
        'Italien', 'Luxemburg', 'Niederlande', 'Norwegen', 'Österreich', 'Polen',
        'Schottland', 'Schweden', 'Schweiz', 'Spanien', 'Tschechien',
      ].sort(),
    }
  },
  validations() {
    return {
      form: {
        firstname: { 
          required: helpers.withMessage('Vorname ist erforderlich', required),
          maxLength: maxLength(50)
        },
        lastname: { 
          required: helpers.withMessage('Nachname ist erforderlich', required),
          maxLength: maxLength(50)
        },
        company: { 
          required: helpers.withMessage('Firma/Kundennummer ist erforderlich', required),
          maxLength: maxLength(100)
        },
        phone: { 
          required: helpers.withMessage('Telefon ist erforderlich', required),
          phoneFormat: helpers.withMessage('Ungültiges Telefonformat', phoneFormat)
        },
        address: { 
          required: helpers.withMessage('Adresse ist erforderlich', required),
          maxLength: maxLength(100)
        },
        hausnummer: { 
          required: helpers.withMessage('Hausnummer ist erforderlich', required),
          maxLength: maxLength(10)
        },
        plz: { 
          required: helpers.withMessage('PLZ ist erforderlich', required),
          plzFormat: helpers.withMessage('PLZ muss 4-6 Ziffern sein', plzFormat)
        },
        ort: { 
          required: helpers.withMessage('Ort ist erforderlich', required),
          maxLength: maxLength(50)
        },
        land: { 
          required: helpers.withMessage('Land ist erforderlich', required)
        },
        manufacturer: { 
          required: helpers.withMessage('Hersteller ist erforderlich', required)
        },
        customManufacturer: {
          requiredIfOther: helpers.withMessage('Bitte Hersteller angeben', () => {
            return this.form.manufacturer === 'Sonstiges' ? required : true
          }),
          maxLength: maxLength(50)
        },
        model: { 
          required: helpers.withMessage('Modell ist erforderlich', required),
          maxLength: maxLength(50)
        },
        serial: { 
          required: helpers.withMessage('Seriennummer ist erforderlich', required),
          maxLength: maxLength(50)
        },
        additional: {
          maxLength: maxLength(500)
        }
      }
    }
  },
  methods: {
    handleImageUpload(newFiles) {
      this.imageError = ''
      if (!newFiles) return
      
      const filesArray = Array.from(newFiles)
      const maxSize = 2 * 1024 * 1024 // 2MB
      const validTypes = ['image/jpeg', 'image/png', 'image/gif']
      const maxFiles = 5
      
      // Vérifier le nombre total de fichiers
      if (this.form.imageFiles.length + filesArray.length > maxFiles) {
        this.imageError = `Maximal ${maxFiles} Bilder erlaubt`
        return
      }
      
      for (const file of filesArray) {
        // Vérifier le type de fichier
        if (!validTypes.includes(file.type)) {
          this.imageError = 'Nur JPG, PNG oder GIF Dateien sind erlaubt'
          continue
        }
        
        // Vérifier la taille du fichier
        if (file.size > maxSize) {
          this.imageError = 'Die Bilddatei darf maximal 2 MB groß sein'
          continue
        }
        
        // Vérifier les doublons
        const alreadyExists = this.form.imageFiles.some(
          f => f.name === file.name && f.size === file.size
        )
        
        if (!alreadyExists) {
          this.form.imageFiles.push(file)
          const reader = new FileReader()
          reader.onload = (e) => {
            this.form.imagePreviews.push(e.target.result)
          }
          reader.readAsDataURL(file)
        }
      }
    },
    removeImage(index) {
      this.form.imageFiles.splice(index, 1)
      this.form.imagePreviews.splice(index, 1)
    },
    saveDevice() {
      this.devicesList.push({
        manufacturer: this.form.manufacturer === 'Sonstiges' 
          ? this.form.customManufacturer 
          : this.form.manufacturer,
        model: this.form.model,
        serial: this.form.serial,
        imageFiles: [...this.form.imageFiles],
        imagePreviews: [...this.form.imagePreviews],
      })
      this.addNewDevice()
    },
    addNewDevice() {
      // Limiter à 5 appareils maximum
      if (this.devicesList.length >= 5) {
        this.step3Error = 'Maximal 5 Geräte pro Anfrage'
        return
      }
      
      this.form.manufacturer = ''
      this.form.customManufacturer = ''
      this.form.model = ''
      this.form.serial = ''
      this.form.imageFiles = []
      this.form.imagePreviews = []
      this.imageError = ''
      this.step3Error = ''
      this.step = 2
      
      // Réinitialiser la validation
      this.v$.form.manufacturer.$reset()
      this.v$.form.customManufacturer.$reset()
      this.v$.form.model.$reset()
      this.v$.form.serial.$reset()
    },
    removeDevice(index) {
      this.devicesList.splice(index, 1)
    },
    async nextStep() {
      this.formError = ''
      this.step3Error = ''
      
      // Sanitisation des entrées
      Object.keys(this.form).forEach(key => {
        if (typeof this.form[key] === 'string') {
          this.form[key] = sanitizeInput(this.form[key])
        }
      })
      
      if (this.step === 1) {
        const isValid = await this.validateStep(this.v$.form, [
          'firstname', 'lastname', 'company', 'phone', 
          'address', 'hausnummer', 'plz', 'ort', 'land'
        ])
        if (isValid) this.step++
      } 
      else if (this.step === 2) {
        const isValid = await this.validateStep(this.v$.form, [
          'manufacturer', 'customManufacturer', 'model', 'serial'
        ])
        
        if (isValid) {
          if (this.form.manufacturer === 'Sonstiges' && !this.form.customManufacturer) {
            this.formError = 'Bitte geben Sie den Hersteller an'
            return
          }
          
          if (this.devicesList.length >= 5) {
            this.formError = 'Maximal 5 Geräte pro Anfrage'
            return
          }
          
          this.saveDevice()
          this.step++
        }
      } 
      else if (this.step === 3) {
        if (this.devicesList.length === 0) {
          this.step3Error = 'Bitte fügen Sie mindestens ein Gerät hinzu'
          return
        }
        this.submitForm()
      }
    },
    async validateStep(validations, fields) {
      // Valider uniquement les champs spécifiés
      const results = await Promise.all(
        fields.map(field => validations[field].$validate())
      )
      
      return results.every(result => result)
    },
    prevStep() {
      if (this.step > 1) this.step--
    },
    cancelForm() {
      if (confirm('Möchten Sie das Formular wirklich verlassen?')) this.resetForm()
    },
    resetForm() {
      this.step = 1
      this.devicesList = []
      this.form = {
        firstname: '',
        lastname: '',
        company: '',
        phone: '',
        address: '',
        hausnummer: '',
        plz: '',
        ort: '',
        land: 'Deutschland',
        manufacturer: '',
        customManufacturer: '',
        model: '',
        serial: '',
        additional: '',
        imageFiles: [],
        imagePreviews: [],
      }
      this.imageError = ''
      this.formError = ''
      this.step3Error = ''
      this.v$.$reset()
    },
    async submitForm() {
      this.loading = true
      
      try {
        // Créer FormData pour l'envoi
        const formData = new FormData()
        
        // Ajouter les données client
        Object.entries(this.form).forEach(([key, value]) => {
          if (key !== 'imageFiles' && key !== 'imagePreviews') {
            formData.append(key, value)
          }
        })
        
        // Ajouter les appareils
        this.devicesList.forEach((device, index) => {
          formData.append(`devices[${index}][manufacturer]`, device.manufacturer)
          formData.append(`devices[${index}][model]`, device.model)
          formData.append(`devices[${index}][serial]`, device.serial)
          
          device.imageFiles.forEach((file, fileIndex) => {
            formData.append(`devices[${index}][images][${fileIndex}]`, file)
          })
        })
        
        // Ajouter le token CSRF (exemple pour Laravel)
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content
        if (csrfToken) {
          formData.append('_token', csrfToken)
        }
        
        // Envoyer les données au serveur
        const response = await fetch('/api/service-request', {
          method: 'POST',
          body: formData,
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        
        if (!response.ok) {
          throw new Error('Serverfehler: ' + response.status)
        }
        
        const result = await response.json()
        
        if (result.success) {
          alert('Serviceanforderung erfolgreich gesendet!')
          this.resetForm()
          
          // Mettre à jour la liste des fabricants si nouveau ajouté
          if (this.form.manufacturer === 'Sonstiges' && 
              this.form.customManufacturer &&
              !this.manufacturers.includes(this.form.customManufacturer)) {
            this.manufacturers.splice(this.manufacturers.length - 1, 0, this.form.customManufacturer)
          }
        } else {
          this.formError = result.message || 'Fehler beim Senden der Anfrage'
        }
      } catch (error) {
        console.error('Submission error:', error)
        this.formError = 'Netzwerkfehler: Bitte versuchen Sie es später erneut'
      } finally {
        this.loading = false
      }
    },
  },
}
</script>

<style scoped>
.form-container {
  width: 100%;
  max-width: 900px;
  margin: 40px auto;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1) !important;
  border-top: 5px solid #1976D2;
  overflow: hidden;
}

.form-header {
  background: linear-gradient(120deg, #1458a5, #0c4d81);
  color: white;
}

.form-header h2::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: #f3f1ef;
  border-radius: 2px;
}

.form-header h2 {
  position: relative;
  padding-bottom: 15px;
}

.header-content {
  display: flex;
  align-items: center;
  gap: 16px;
  width: 100%;
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
  padding: 16px;
}

.image-row {
  display: flex;
  align-items: center;
  gap: 8px;
  position: relative;
}

.remove-image-btn {
  position: absolute;
  top: -8px;
  right: -8px;
  background: white;
  border-radius: 50%;
  cursor: pointer;
  z-index: 10;
}

.form-step {
  padding: 0 16px;
}
</style>