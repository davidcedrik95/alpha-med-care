<template>
  <v-container class="form-section">
    <v-card class="form-container">
      <v-card-title class="form-header text-center py-6">
        <v-btn icon @click="cancelInstallationForm" class="back-button">
          <v-icon>mdi-arrow-left</v-icon>
        </v-btn>
        <h2 class="text-h4 font-weight-bold primary--text">Installationsanforderung</h2>
        <p class="text-body-2 mt-2">
          Füllen Sie das folgende Formular aus, um einen Installationsservice für Ihre Medizinischen Geräte anzufordern.<br>
          Wir benötigen diese Informationen, um die Installation optimal vorzubereiten.
        </p>
      </v-card-title>

      <v-alert v-if="formError" type="error" class="mb-4 mx-4" dense>
        {{ formError }}
      </v-alert>

      <v-stepper v-model="installationStep" class="elevation-0">
        <v-stepper-header class="elevation-0">
          <v-stepper-item :value="1" :complete="installationStep > 1" title="Kundendaten" editable />
          <v-divider></v-divider>
          <v-stepper-item :value="2" :complete="installationStep > 2" title="Gebäudedaten" editable />
          <v-divider></v-divider>
          <v-stepper-item :value="3" title="Abschluss" editable />
        </v-stepper-header>

        <v-stepper-window>
          <!-- Étape 1 : Formulaire client -->
          <v-stepper-window-item :value="1">
            <v-form>
              <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendaten</h3>
              <v-row dense class="pa-2">
                <v-col cols="12" md="6">
                  <v-select
                    v-model="installationForm.anrede"
                    :items="['Frau', 'Herr']"
                    label="Anrede"
                    outlined
                    density="comfortable"
                    :error-messages="v$.installationForm.anrede.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.anrede.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.firstname" 
                    label="Vorname" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.firstname.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.firstname.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.lastname" 
                    label="Nachname" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.lastname.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.lastname.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.company" 
                    label="Firma / Kundennummer" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.company.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.company.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.phone" 
                    label="Telefon" 
                    type="tel" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.phone.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.phone.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.email" 
                    label="E-Mail Adresse" 
                    type="email"
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.email.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.email.$touch"
                  />
                </v-col>
                <v-col cols="12" md="8">
                  <v-text-field 
                    v-model="installationForm.address" 
                    label="Straße / Adresse" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.address.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.address.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field 
                    v-model="installationForm.hausnummer" 
                    label="Hausnummer" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.hausnummer.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.hausnummer.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field 
                    v-model="installationForm.plz" 
                    label="PLZ" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.plz.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.plz.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field 
                    v-model="installationForm.ort" 
                    label="Ort" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.ort.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.ort.$touch"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-select 
                    v-model="installationForm.land" 
                    :items="countries" 
                    label="Land" 
                    required 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.land.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.land.$touch"
                  />
                </v-col>
              </v-row>
            </v-form>
          </v-stepper-window-item>

          <!-- Étape 2 : Données du bâtiment -->
          <v-stepper-window-item :value="2">
            <v-form>
              <h3 class="text-h5 font-weight-bold primary--text mb-4">2. Gebäudedaten</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.floor" 
                    label="Fußböden (Beschaffenheit, Material)" 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.floor.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.floor.$touch"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field 
                    v-model="installationForm.doors" 
                    label="Anzahl & Breite der Türen auf dem Weg" 
                    variant="outlined" 
                    density="comfortable"
                    :error-messages="v$.installationForm.doors.$errors.map(e => e.$message)"
                    @blur="v$.installationForm.doors.$touch"
                  />
                </v-col>
                <v-col cols="12">
                  <v-checkbox 
                    v-model="installationForm.elevator" 
                    label="Aufzug vorhanden" 
                    density="comfortable" 
                    hide-details 
                  />
                </v-col>

                <template v-if="installationForm.elevator">
                  <v-col cols="12" class="d-flex flex-wrap">
                    <v-col cols="12" md="6">
                      <v-text-field 
                        v-model="installationForm.elevatorAccess" 
                        label="Zugang zu Aufzug Stockwerk?" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.elevatorAccess.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.elevatorAccess.$touch"
                      />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field 
                        v-model="installationForm.elevatorDoorSize" 
                        label="Aufzugtüre Maße (Höhe x Breite)" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.elevatorDoorSize.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.elevatorDoorSize.$touch"
                      />
                    </v-col>
                    <v-col cols="12">
                      <v-text-field 
                        v-model="installationForm.elevatorInsideSize" 
                        label="Aufzugtiefe Maße innen (HxBxL)" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.elevatorInsideSize.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.elevatorInsideSize.$touch"
                      />
                    </v-col>
                  </v-col>
                </template>

                <v-col cols="12">
                  <v-checkbox 
                    v-model="installationForm.stairs" 
                    label="Treppe vorhanden" 
                    density="comfortable" 
                    hide-details 
                  />
                </v-col>

                <template v-if="installationForm.stairs">
                  <v-col cols="12" class="d-flex flex-wrap">
                    <v-col cols="12" md="6">
                      <v-text-field 
                        v-model="installationForm.stairWidth" 
                        label="Treppenbreite" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.stairWidth.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.stairWidth.$touch"
                      />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-checkbox 
                        v-model="installationForm.cornerStair" 
                        label="Übers Eck?" 
                        density="comfortable" 
                        hide-details 
                        class="ml-8" 
                      />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field 
                        v-model="installationForm.stairExit" 
                        label="Ausstieg im Stockwerk" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.stairExit.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.stairExit.$touch"
                      />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field 
                        v-model="installationForm.stairSteps" 
                        label="Stufenanzahl" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.stairSteps.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.stairSteps.$touch"
                      />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field 
                        v-model="installationForm.stairAfterSteps" 
                        label="Weiterer Verlauf nach den Stufen" 
                        variant="outlined" 
                        density="comfortable" 
                        class="ml-8"
                        :error-messages="v$.installationForm.stairAfterSteps.$errors.map(e => e.$message)"
                        @blur="v$.installationForm.stairAfterSteps.$touch"
                      />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-checkbox 
                        v-model="installationForm.railingRemovable" 
                        label="Geländer abnehmbar?" 
                        density="comfortable" 
                        hide-details 
                        class="ml-8" 
                      />
                    </v-col>
                  </v-col>
                </template>
              </v-row>
            </v-form>
          </v-stepper-window-item>

          <!-- Étape 3 : Finalisation -->
          <v-stepper-window-item :value="3">
            <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Abschluss</h3>
            <v-row>
              <v-col cols="12" md="4">
                <v-text-field 
                  v-model="installationForm.place" 
                  label="Ort" 
                  variant="outlined" 
                  density="comfortable"
                />
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field 
                  v-model="installationForm.signatureDate" 
                  label="Datum (Unterschrift)" 
                  type="date" 
                  variant="outlined" 
                  density="comfortable"
                  :error-messages="v$.installationForm.signatureDate.$errors.map(e => e.$message)"
                  @blur="v$.installationForm.signatureDate.$touch"
                />
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field 
                  v-model="installationForm.signatureName" 
                  label="Unterschrift (Name)" 
                  variant="outlined" 
                  density="comfortable"
                  :error-messages="v$.installationForm.signatureName.$errors.map(e => e.$message)"
                  @blur="v$.installationForm.signatureName.$touch"
                />
              </v-col>
            </v-row>
          </v-stepper-window-item>
        </v-stepper-window>
      </v-stepper>

      <v-card-actions class="form-actions px-6 py-4">
        <v-btn color="grey" variant="outlined" :disabled="installationStep === 1" @click="prevInstallationStep">
          <v-icon start>mdi-arrow-left</v-icon>
          Zurück
        </v-btn>

        <v-spacer></v-spacer>

        <v-btn color="grey" variant="outlined" @click="cancelInstallationForm">
          Abbrechen
        </v-btn>

        <v-btn color="secondary" @click="nextInstallationStep" :loading="loading">
          {{ installationStep === 3 ? 'Absenden' : 'Weiter' }}
          <v-icon end>mdi-arrow-right</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
import { useVuelidate } from '@vuelidate/core'
import { required, email, maxLength } from '@vuelidate/validators'

// Fonction de validation pour le téléphone
const phoneFormat = (value) => /^[\d\s+\-()]{5,20}$/.test(value)

// Fonction de validation pour le code postal
const plzFormat = (value) => /^\d{4,6}$/.test(value)

export default {
  name: 'InstallationsanforderungForm',
  setup() {
    return { v$: useVuelidate() }
  },
  data() {
    return {
      installationStep: 1,
      loading: false,
      formError: '',
      countries: ['Deutschland', 'Österreich', 'Schweiz', 'Frankreich', 'Italien', 'Spanien', 'Andere'],
      installationForm: {
        // Données client
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

        // Données bâtiment
        date: '',
        floor: '',
        doors: '',
        elevator: false,
        elevatorAccess: '',
        elevatorDoorSize: '',
        elevatorInsideSize: '',
        stairs: false,
        stairWidth: '',
        cornerStair: false,
        stairExit: '',
        stairSteps: '',
        stairAfterSteps: '',
        railingRemovable: false,
        place: '',
        signatureDate: '',
        signatureName: ''
      }
    };
  },
  validations() {
    return {
      installationForm: {
        // Validation étape 1
        anrede: { required, maxLength: maxLength(50) },
        firstname: { required, maxLength: maxLength(50) },
        lastname: { required, maxLength: maxLength(50) },
        company: { required, maxLength: maxLength(100) },
        phone: { required, phoneFormat },
        email: { required, email, maxLength: maxLength(100) },
        address: { required, maxLength: maxLength(100) },
        hausnummer: { required, maxLength: maxLength(10) },
        plz: { required, plzFormat },
        ort: { required, maxLength: maxLength(50) },
        land: { required },
        
        // Validation étape 2
        elevatorAccess: { maxLength: maxLength(100) },
        elevatorDoorSize: { maxLength: maxLength(50) },
        elevatorInsideSize: { maxLength: maxLength(50) },
        stairWidth: { maxLength: maxLength(50) },
        stairExit: { maxLength: maxLength(50) },
        stairSteps: { maxLength: maxLength(50) },
        stairAfterSteps: { maxLength: maxLength(100) },
        
        // Validation étape 3
        signatureDate: { required },
        signatureName: { required, maxLength: maxLength(100) }
      }
    }
  },
  methods: {
    async nextInstallationStep() {
      this.formError = ''
      
      // Activer la validation pour l'étape actuelle
      this.v$.$touch()
      
      let isValid = true
      
      // Validation spécifique à l'étape
      if (this.installationStep === 1) {
        isValid = await this.validateStep([
          'anrede', 'firstname', 'lastname', 'company', 'phone',
          'email', 'address', 'hausnummer', 'plz', 'ort', 'land'
        ])
      } 
      else if (this.installationStep === 2) {
        // Validation conditionnelle si ascenseur ou escalier est sélectionné
        if (this.installationForm.elevator) {
          isValid = await this.validateStep([
            'elevatorAccess', 'elevatorDoorSize', 'elevatorInsideSize'
          ]) && isValid
        }
        
        if (this.installationForm.stairs) {
          isValid = await this.validateStep([
            'stairWidth', 'stairExit', 'stairSteps'
          ]) && isValid
        }
      }
      else if (this.installationStep === 3) {
        isValid = await this.validateStep([
          'signatureDate', 'signatureName'
        ])
        
        if (isValid) {
          return this.submitInstallationForm()
        }
      }
      
      if (isValid) {
        this.installationStep++
      } else {
        this.formError = 'Bitte überprüfen Sie Ihre Eingaben'
      }
    },
    
    async validateStep(fields) {
      await this.v$.$validate()
      return fields.every(field => !this.v$.installationForm[field].$error)
    },
    
    prevInstallationStep() {
      this.v$.$reset()
      if (this.installationStep > 1) this.installationStep--
    },
    
    async submitInstallationForm() {
      this.loading = true
      
      try {
        // Simuler l'envoi au serveur
        await new Promise(resolve => setTimeout(resolve, 1500))
        
        console.log("Installationsanforderung gesendet:", this.installationForm)
        this.$notify({
          title: "Erfolg!",
          text: "Installationsanforderung erfolgreich gesendet!",
          type: "success"
        })
        this.resetInstallationForm()
      } catch (error) {
        console.error("Fehler beim Senden:", error)
        this.formError = 'Fehler beim Senden: ' + error.message
      } finally {
        this.loading = false
      }
    },
    
    cancelInstallationForm() {
      if (confirm('Möchten Sie das Formular wirklich verlassen?')) {
        this.resetInstallationForm()
      }
    },
    
    resetInstallationForm() {
      this.installationStep = 1
      this.v$.$reset()
      
      // Réinitialiser tous les champs
      Object.keys(this.installationForm).forEach(key => {
        this.installationForm[key] = typeof this.installationForm[key] === 'boolean' 
          ? false 
          : ''
      })
      
      // Réinitialiser les valeurs par défaut
      this.installationForm.land = 'Deutschland'
      this.formError = ''
    }
  }
};
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

.form-section {
  max-width: 900px;
  margin: 2rem auto;
}

.back-button {
  position: absolute;
  left: 20px;
  top: 20px;
  z-index: 10;
}

.form-header {
  background: linear-gradient(120deg, #1458a5, #0c4d81);
  color: white;
  padding: 24px;
  position: relative;
}
.form-header h2 {
  position: relative;
  padding-bottom: 15px;
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
  background: #fafaf9;
  border-radius: 2px;
}

.form-actions {
  border-top: 1px solid rgba(0, 0, 0, 0.12);
}
</style>