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

      <v-stepper v-model="installationStep" class="elevation-0">
        <v-stepper-header class="elevation-0">
          <v-stepper-item :value="1" :complete="installationStep > 1" title="Kundendaten" editable />
          <v-divider></v-divider>
          <v-stepper-item :value="2" :complete="installationStep > 2" title="Gebäudedaten" editable />
          <v-divider></v-divider>
          <v-stepper-item :value="3" title="Abschluss" editable />
        </v-stepper-header>

        <v-stepper-window style="max-height: 60vh; overflow-y: auto;">
          <!-- Etape 1 -->
          <v-stepper-window-item :value="1">
            <v-form ref="installationStep1Form">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendaten</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.contactPerson" label="Ansprechpartner vor Ort" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.customerInfo" label="Name / Firma / Kundennummer" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.address" label="Straße / Hausnummer" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.zipCity" label="Postleitzahl / Ort" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.phone" label="Telefon / Handy für Rückfragen" type="tel" required variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.email" label="E-Mail" type="email" required variant="outlined" density="comfortable" />
                </v-col>
              </v-row>
            </v-form>
          </v-stepper-window-item>

          <!-- Etape 2 -->
          <v-stepper-window-item :value="2">
            <v-form ref="installationStep2Form">
              <h3 class="text-h5 font-weight-bold primary--text mb-4">2. Gebäudedaten</h3>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.floor" label="Fußböden (Beschaffenheit, Material)" variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="installationForm.doors" label="Anzahl & Breite der Türen auf dem Weg" variant="outlined" density="comfortable" />
                </v-col>
                <v-col cols="12">
                  <v-checkbox v-model="installationForm.elevator" label="Aufzug vorhanden" density="comfortable" hide-details />
                </v-col>

                <template v-if="installationForm.elevator">
                  <v-col cols="12" class="d-flex flex-wrap" style="max-height: 300px; overflow-y: auto;">
                    <v-col cols="12" md="6">
                      <v-text-field v-model="installationForm.elevatorAccess" label="Zugang zu Aufzug Stockwerk?" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field v-model="installationForm.elevatorDoorSize" label="Aufzugtüre Maße (Höhe x Breite)" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                    <v-col cols="12">
                      <v-text-field v-model="installationForm.elevatorInsideSize" label="Aufzugtiefe Maße innen (HxBxL)" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                  </v-col>
                </template>

                <v-col cols="12">
                  <v-checkbox v-model="installationForm.stairs" label="Treppe vorhanden" density="comfortable" hide-details />
                </v-col>

                <template v-if="installationForm.stairs">
                  <v-col cols="12" class="d-flex flex-wrap">
                    <v-col cols="12" md="6">
                      <v-text-field v-model="installationForm.stairWidth" label="Treppenbreite" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-checkbox v-model="installationForm.cornerStair" label="Übers Eck?" density="comfortable" hide-details class="ml-8" />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field v-model="installationForm.stairExit" label="Ausstieg im Stockwerk" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field v-model="installationForm.stairSteps" label="Stufenanzahl" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field v-model="installationForm.stairAfterSteps" label="Weiterer Verlauf nach den Stufen" variant="outlined" density="comfortable" class="ml-8" />
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-checkbox v-model="installationForm.railingRemovable" label="Geländer abnehmbar?" density="comfortable" hide-details class="ml-8" />
                    </v-col>
                  </v-col>
                </template>
              </v-row>
            </v-form>
          </v-stepper-window-item>

          <!-- Etape 3 -->
          <v-stepper-window-item :value="3">
            <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Abschluss</h3>
            <v-row>
              <v-col cols="12" md="4">
                <v-text-field v-model="installationForm.place" label="Ort" variant="outlined" density="comfortable" />
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field v-model="installationForm.signatureDate" label="Datum (Unterschrift)" type="date" variant="outlined" density="comfortable" />
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field v-model="installationForm.signatureName" label="Unterschrift (Name)" variant="outlined" density="comfortable" />
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

        <v-btn color="secondary" @click="nextInstallationStep">
          {{ installationStep === 3 ? 'Absenden' : 'Weiter' }}
          <v-icon end>mdi-arrow-right</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: 'InstallationsanforderungForm',
  data() {
    return {
      installationStep: 1,
      installationForm: {
        contactPerson: '',
        customerInfo: '',
        address: '',
        zipCity: '',
        phone: '',
        email: '',
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
  methods: {
    nextInstallationStep() {
      if (this.installationStep < 3) {
        this.installationStep++;
      } else {
        this.submitInstallationForm();
      }
    },
    prevInstallationStep() {
      if (this.installationStep > 1) {
        this.installationStep--;
      }
    },
    submitInstallationForm() {
      console.log("Installationsanforderung gesendet:", this.installationForm);
      this.$notify({
        title: "Erfolg!",
        text: "Installationsanforderung erfolgreich gesendet!",
        type: "success"
      });
      this.resetInstallationForm();
    },
    cancelInstallationForm() {
      this.resetInstallationForm();
    },
    resetInstallationForm() {
      this.installationStep = 1;
      this.installationForm = {
        contactPerson: '',
        customerInfo: '',
        address: '',
        zipCity: '',
        phone: '',
        email: '',
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
      };
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

.back-button {
  position: absolute;
  left: 20px;
  top: 20px;
  z-index: 10;
}

.form-header {
  background: linear-gradient(120deg, #1458a5, #0c4d81);
  color: white;
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
  background: #f3f1ef;
  border-radius: 2px;
}

.form-actions {
  border-top: 1px solid rgba(0, 0, 0, 0.12);
}
</style>
