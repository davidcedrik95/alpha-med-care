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
        
        <Stepper :step="step" :steps="steps" />

        <v-window v-model="step">
          <!-- Étape 1 : Kundendaten -->
          <v-window-item :value="1">
            <CustomerForm 
              v-model="form" 
              :countries="countries" 
              :validation="v$" 
              :show-errors="showErrors[0]"
            />
          </v-window-item>

          <!-- Étape 2 : Gerätedaten -->
          <v-window-item :value="2">
            <DeviceForm 
              v-model="form" 
              :manufacturers="manufacturers" 
              :validation="v$" 
              :imageError="imageError"
              :show-errors="showErrors[1]"
              @update:imageError="imageError = $event"
            />
          </v-window-item>

          <!-- Étape 3 : Abschluss -->
          <v-window-item :value="3">
            <SummaryStep 
              :devicesList="devicesList"
              :validation="v$"
              :error="step3Error"
              @add-device="addNewDevice"
              @remove-device="removeDevice"
            />
          </v-window-item>
        </v-window>
      </v-card-text>

      <!-- Boutons navigation -->
      <NavigationButtons 
        :step="step"
        :loading="loading"
        @prev="prevStep"
        @cancel="cancelForm"
        @next="nextStep"
      />
    </v-card>
  </v-container>
</template>

<script>
import { useVuelidate } from '@vuelidate/core'
import { required, email, maxLength } from '@vuelidate/validators'
import CustomerForm from './CustomerForm.vue'
import DeviceForm from './DeviceForm.vue'
import SummaryStep from './SummaryStep.vue'
import Stepper from './Stepper.vue'
import NavigationButtons from './NavigationButtons.vue'

// Validation helpers
const phoneFormat = (value) => /^[\d\s+\-()]{5,20}$/.test(value)
const plzFormat = (value) => /^\d{4,6}$/.test(value)
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
  components: { CustomerForm, DeviceForm, SummaryStep, Stepper, NavigationButtons },
  setup() {
    return { v$: useVuelidate() }
  },
  data() {
    return {
      step: 1,
      loading: false,
      formError: '',
      step3Error: '',
      imageError: '',
      showErrors: [false, false, false],
      devicesList: [],
      form: {
        anrede: '',
        firstname: '',
        lastname: '',
        company: '',
        phone: '',
        email: '',
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
      steps: [
        { label: 'Kundendaten', icon: 'mdi-account' },
        { label: 'Gerätedaten', icon: 'mdi-devices' },
        { label: 'Abschluss', icon: 'mdi-check-circle' }
      ],
      manufacturers: ['Ergo-Fit', 'FREI medical', 'emotion fitness', 'h/p/Cosmos', 'Amer Sport', 'MOTOmed','Sonstiges'],
      countries: [
        'Belgien', 'Dänemark', 'Deutschland', 'Finnland', 'Frankreich', 
        'Großbritannien', 'Italien', 'Luxemburg', 'Niederlande', 'Norwegen', 
        'Österreich', 'Polen', 'Schottland', 'Schweden', 'Schweiz', 'Spanien', 'Tschechien',
      ].sort(),
    }
  },
  validations() {
    return {
      form: {
        anrede: { 
          required,
          maxLength: maxLength(50)
        },
        firstname: { 
          required,
          maxLength: maxLength(50)
        },
        lastname: { 
          required,
          maxLength: maxLength(50)
        },
        company: { 
          required,
          maxLength: maxLength(100)
        },
        phone: { 
          required,
          phoneFormat
        },
        email: { 
          required,
          email,
          maxLength: maxLength(100)
        },
        address: { 
          required,
          maxLength: maxLength(100)
        },
        hausnummer: { 
          required,
          maxLength: maxLength(10)
        },
        plz: { 
          required,
          plzFormat
        },
        ort: { 
          required,
          maxLength: maxLength(50)
        },
        land: { 
          required
        },
        manufacturer: { 
          required
        },
        customManufacturer: {
          required: this.form.manufacturer === 'Sonstiges' ? required : true,
          maxLength: maxLength(50)
        },
        model: { 
          required,
          maxLength: maxLength(50)
        },
        serial: { 
          required,
          maxLength: maxLength(50)
        },
        additional: {
          maxLength: maxLength(500)
        }
      }
    }
  },
  methods: {
    // Ajoute l'appareil actuel à la liste si valide
    addCurrentDeviceToList() {
      // Vérifie si l'appareil est valide avant de l'ajouter
      if (!this.form.manufacturer || !this.form.model || !this.form.serial) {
        return false;
      }
      
      const currentDevice = {
        manufacturer: this.form.manufacturer === 'Sonstiges' 
          ? this.form.customManufacturer 
          : this.form.manufacturer,
        model: this.form.model,
        serial: this.form.serial,
        imageFiles: [...this.form.imageFiles],
        imagePreviews: [...this.form.imagePreviews],
      }
      
      // Vérifie si l'appareil existe déjà dans la liste
      const deviceExists = this.devicesList.some(device => 
        device.manufacturer === currentDevice.manufacturer &&
        device.model === currentDevice.model &&
        device.serial === currentDevice.serial
      )
      
      if (!deviceExists) {
        this.devicesList.push(currentDevice)
        return true;
      }
      
      return false;
    },
    
    addNewDevice() {
      if (this.devicesList.length >= 5) {
        this.step3Error = 'Maximal 5 Geräte pro Anfrage'
        return
      }
      
      // Réinitialise le formulaire avant d'ajouter un nouvel appareil
      this.resetDeviceForm()
      
      // Retour à l'étape 2 pour ajouter un nouvel appareil
      this.step = 2
    },
    
    resetDeviceForm() {
      this.form.manufacturer = ''
      this.form.customManufacturer = ''
      this.form.model = ''
      this.form.serial = ''
      this.form.imageFiles = []
      this.form.imagePreviews = []
      this.imageError = ''
    },
    
    removeDevice(index) {
      this.devicesList.splice(index, 1)
    },
    
    async nextStep() {
      this.formError = ''
      this.step3Error = ''
      
      // Active l'affichage des erreurs pour l'étape actuelle
      this.showErrors[this.step - 1] = true
      
      // Sanitize inputs
      Object.keys(this.form).forEach(key => {
        if (typeof this.form[key] === 'string') {
          this.form[key] = sanitizeInput(this.form[key])
        }
      })
      
      // Validation spécifique à l'étape
      let isValid = false
      
      if (this.step === 1) {
        isValid = await this.validateStep(['anrede', 'firstname', 'lastname', 'company', 'phone',  
          'email', 'address', 'hausnummer', 'plz', 'ort', 'land'])
      } 
      else if (this.step === 2) {
        isValid = await this.validateStep(['manufacturer', 'customManufacturer', 'model', 'serial'])
        
        if (isValid && this.form.manufacturer === 'Sonstiges' && !this.form.customManufacturer) {
          this.formError = 'Bitte geben Sie den Hersteller an'
          isValid = false
        }
        
        // CORRECTION : Ajoute l'appareil seulement si valide
        if (isValid) {
          const added = this.addCurrentDeviceToList()
          if (added) {
            this.resetDeviceForm()
          }
        }
      }
      else if (this.step === 3) {
        if (this.devicesList.length === 0) {
          this.step3Error = 'Bitte fügen Sie mindestens ein Gerät hinzu'
          return
        }
        await this.submitForm()
        return
      }
      
      if (isValid) {
        // Désactive les erreurs avant de passer à l'étape suivante
        this.showErrors[this.step - 1] = false;
        this.step++
      }
    },
    
    async validateStep(fields) {
      await this.v$.$validate()
      return fields.every(field => !this.v$.form[field].$error)
    },
    
    prevStep() {
      // Désactive l'affichage des erreurs pour l'étape actuelle
      this.showErrors[this.step - 1] = false
      if (this.step > 1) this.step--
    },
    
    cancelForm() {
      if (confirm('Möchten Sie das Formular wirklich verlassen?')) this.resetForm()
    },
    
    resetForm() {
      this.step = 1
      this.devicesList = []
      this.resetDeviceForm()
      Object.assign(this.form, {
        anrede: '',
        firstname: '',
        lastname: '',
        company: '',
        phone: '',
        email: '',
        address: '',
        hausnummer: '',
        plz: '',
        ort: '',
        land: 'Deutschland',
        additional: '',
      })
      this.formError = ''
      this.step3Error = ''
      this.showErrors = [false, false, false]
      this.v$.$reset()
    },
    
    async submitForm() {
      this.loading = true
      
      try {
        const formData = new FormData()
        const { imageFiles, imagePreviews, ...formValues } = this.form
        
        // Ajoute les données client
        Object.entries(formValues).forEach(([key, value]) => {
          formData.append(key, value)
        })
        
        // Ajoute les appareils
        this.devicesList.forEach((device, index) => {
          formData.append(`devices[${index}][manufacturer]`, device.manufacturer)
          formData.append(`devices[${index}][model]`, device.model)
          formData.append(`devices[${index}][serial]`, device.serial)
          
          device.imageFiles.forEach((file, fileIndex) => {
            formData.append(`devices[${index}][images][${fileIndex}]`, file)
          })
        })
        
        // Simulation d'appel API
        await new Promise(resolve => setTimeout(resolve, 1500))
        
        // Gestion du succès
        alert('Serviceanforderung erfolgreich gesendet!')
        this.resetForm()
        
        // Met à jour la liste des fabricants si nouveau ajouté
        if (this.form.customManufacturer && 
            !this.manufacturers.includes(this.form.customManufacturer)) {
          this.manufacturers.splice(-1, 0, this.form.customManufacturer)
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
</style>