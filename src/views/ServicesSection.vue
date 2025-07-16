<template>
  <v-container class="service-container">
    <!-- En-tête de la section -->
    <div class="section-header text-center mb-8">
      <v-divider class="my-4" />
      <h1 class="text-h3 font-weight-bold primary--text mb-4">UNSER SERVICE ... FÜR SIE VOR ORT</h1>
      <p class="text-h6 text-medium-emphasis">
        alpha med care kümmert sich darum, dass Ihre Wartungsintervalle pünktlich eingehalten werden und Ihr Equipment stets nach Norm geprüft und gewartet ist.
      </p>
      <v-divider class="my-4" />
    </div>

    <!-- Contenu principal -->
    <v-fade-transition mode="out-in">
      <div v-if="!showForm && !showInstallationForm">
        <v-row class="service-grid">
          <v-col cols="12" md="6">
            <v-hover v-slot="{ isHovering, props }">
              <v-card
                v-bind="props"
                :elevation="isHovering ? 12 : 6"
                class="service-image rounded-xl overflow-hidden"
              >
                <v-img
                  src="/images/service-vor-ort.png"
                  alt="Service Vor Ort"
                  height="500"
                  cover
                />
              </v-card>
            </v-hover>
          </v-col>
          
          <v-col cols="12" md="6">
            <v-card class="service-card pa-6 rounded-xl" elevation="6">
              <h2 class="text-h4 font-weight-bold primary--text mb-6">Umfassender Service für Ihre medizinischen Geräte</h2>
              
              <v-list class="service-list mb-6">
                <v-list-item v-for="(service, index) in services" :key="index" class="px-0">
                  <template v-slot:prepend>
                    <v-icon color="primary" class="mr-4">mdi-check-circle</v-icon>
                  </template>
                  <v-list-item-title class="text-body-1">{{ service }}</v-list-item-title>
                </v-list-item>
              </v-list>
              
              <p class="text-body-1 mb-6">
                Wir garantieren Ihnen eine schnelle und zuverlässige Betreuung Ihrer medizinischen Geräte. Unser Expertenteam steht Ihnen mit Fachwissen und modernster Ausrüstung zur Verfügung, um Ausfallzeiten zu minimieren und die Sicherheit Ihrer Geräte zu gewährleisten.
              </p>
              
              <div class="form-options pa-6 rounded-lg">
                <h3 class="text-h5 font-weight-bold primary--text mb-2">Formulare einfach Online ausfüllen</h3>
                <div class="d-flex flex-column">
                  <a 
                    href="#" 
                    @click.prevent="showForm = true" 
                    class="text-primary font-weight-bold mb-1"
                  >
                    Serviceanforderung
                  </a>
                  <a 
                    href="#" 
                    @click.prevent="showInstallationForm = true" 
                    class="text-secondary font-weight-bold "
                  >
                    Installationsservice
                  </a>
                </div>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </div>

      <!-- Formulaire Serviceanforderung - Affichage direct -->
      <div v-else-if="showForm" class="form-section">
        <v-card class="form-container rounded-xl">
          <v-card-title class="form-header text-center py-6">
            <v-btn icon @click="cancelForm" class="back-button">
              <v-icon>mdi-arrow-left</v-icon>
            </v-btn>
            <h2 class="text-h3 font-weight-bold primary--text">Serviceanforderung</h2>
            <p class="text-body-1 mt-2">
              Füllen Sie das folgende Formular aus, um einen Service für Ihre medizinischen Geräte anzufordern.
              Wir werden uns umgehend mit Ihnen in Verbindung setzen.
            </p>
          </v-card-title>
          
          <v-stepper v-model="step" class="elevation-0">
            <v-stepper-header class="elevation-0">
              <v-stepper-item
                :value="1"
                :complete="step > 1"
                title="Kundendaten"
                editable
              ></v-stepper-item>
              <v-divider></v-divider>
              <v-stepper-item
                :value="2"
                :complete="step > 2"
                title="Gerätedaten"
                editable
              ></v-stepper-item>
              <v-divider></v-divider>
              <v-stepper-item
                :value="3"
                title="Abschluss"
                editable
              ></v-stepper-item>
            </v-stepper-header>
            
            <v-stepper-window>
              <v-stepper-window-item :value="1">
                <v-form ref="step1Form">
                  <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendatenerfassung</h3>
                  <v-row>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.date"
                        label="Heutiges Datum"
                        type="date"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.name"
                        label="Vorname/Name"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.company"
                        label="Firma/Kundennummer"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.street"
                        label="Straße/Hausnummer"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.zipCity"
                        label="Postleitzahl/Ort"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.phone"
                        label="Telefon"
                        type="tel"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12">
                      <v-text-field
                        v-model="form.email"
                        label="E-Mail-Adresse"
                        type="email"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-form>
              </v-stepper-window-item>
              
              <v-stepper-window-item :value="2">
                <v-form ref="step2Form">
                  <h3 class="text-h5 font-weight-bold primary--text mb-4">2. Gerätedaten</h3>
                  <v-row>
                    <v-col cols="12">
                      <h4 class="text-subtitle-1 font-weight-bold mb-3">Hersteller</h4>
                      <v-row>
                        <v-col v-for="item in manufacturers" :key="item" cols="6" sm="4" md="3">
                          <v-checkbox
                            :label="item"
                            :value="item"
                            v-model="form.manufacturer"
                            density="comfortable"
                            hide-details
                          ></v-checkbox>
                        </v-col>
                      </v-row>
                    </v-col>
                    
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.model"
                        label="Modell"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="form.serial"
                        label="Seriennummer"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
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
                      ></v-textarea>
                    </v-col>
                  </v-row>
                </v-form>
              </v-stepper-window-item>
              
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
                    ></v-textarea>
                  </v-col>
                </v-row>
              </v-stepper-window-item>
            </v-stepper-window>
          </v-stepper>
          
          <v-card-actions class="form-actions px-6 py-4">
            <v-btn
              color="grey"
              variant="outlined"
              :disabled="step === 1"
              @click="prevStep"
            >
              <v-icon start>mdi-arrow-left</v-icon>
              Zurück
            </v-btn>
            
            <v-spacer></v-spacer>
            
            <v-btn
              color="grey"
              variant="outlined"
              @click="cancelForm"
            >
              Abbrechen
            </v-btn>
            
            <v-btn
              color="primary"
              @click="nextStep"
            >
              {{ step === 3 ? 'Absenden' : 'Weiter' }}
              <v-icon end>mdi-arrow-right</v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </div>

      <!-- Formulaire Installationsanforderung - Affichage direct -->
      <div v-else-if="showInstallationForm" class="form-section">
        <v-card class="form-container rounded-xl">
          <v-card-title class="form-header text-center py-6">
            <v-btn icon @click="cancelInstallationForm" class="back-button">
              <v-icon>mdi-arrow-left</v-icon>
            </v-btn>
            <h2 class="text-h3 font-weight-bold primary--text">Installationsanforderung</h2>
            <p class="text-body-1 mt-2">
              Füllen Sie das folgende Formular aus, um einen Installationsservice für Ihre medizinischen Geräte anzufordern.
              Wir benötigen diese Informationen, um die Installation optimal vorzubereiten.
            </p>
          </v-card-title>
          
          <v-stepper v-model="installationStep" class="elevation-0">
            <v-stepper-header class="elevation-0">
              <v-stepper-item
                :value="1"
                :complete="installationStep > 1"
                title="Kundendaten"
                editable
              ></v-stepper-item>
              <v-divider></v-divider>
              <v-stepper-item
                :value="2"
                :complete="installationStep > 2"
                title="Gebäudedaten"
                editable
              ></v-stepper-item>
              <v-divider></v-divider>
              <v-stepper-item
                :value="3"
                title="Abschluss"
                editable
              ></v-stepper-item>
            </v-stepper-header>
            
            <v-stepper-window style="max-height: 60vh; overflow-y: auto;">
              <v-stepper-window-item :value="1">
                <v-form ref="installationStep1Form">
                  <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendaten</h3>
                  <v-row>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.contactPerson"
                        label="Ansprechpartner vor Ort"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.customerInfo"
                        label="Name / Firma / Kundennummer"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.address"
                        label="Straße / Hausnummer"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.zipCity"
                        label="Postleitzahl / Ort"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.phone"
                        label="Telefon / Handy für Rückfragen"
                        type="tel"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.email"
                        label="E-Mail"
                        type="email"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.date"
                        label="Datum"
                        type="date"
                        required
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-form>
              </v-stepper-window-item>
              
              <v-stepper-window-item :value="2">
                <v-form ref="installationStep2Form">
                  <h3 class="text-h5 font-weight-bold primary--text mb-4">2. Gebäudedaten</h3>
                  <v-row>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.floor"
                        label="Fußböden (Beschaffenheit, Material)"
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                        v-model="installationForm.doors"
                        label="Anzahl & Breite der Türen auf dem Weg"
                        variant="outlined"
                        density="comfortable"
                      ></v-text-field>
                    </v-col>
                    
                    <v-col cols="12">
                      <v-checkbox
                        v-model="installationForm.elevator"
                        label="Aufzug vorhanden"
                        density="comfortable"
                        hide-details
                      ></v-checkbox>
                    </v-col>
                    
                    <template v-if="installationForm.elevator">
                      <v-col cols="12" class="d-flex flex-wrap" style="max-height: 300px; overflow-y: auto;">
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="installationForm.elevatorAccess"
                            label="Zugang zu Aufzug Stockwerk?"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="installationForm.elevatorDoorSize"
                            label="Aufzugtüre Maße (Höhe x Breite)"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                          <v-text-field
                            v-model="installationForm.elevatorInsideSize"
                            label="Aufzugtiefe Maße innen (HxBxL)"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                      </v-col>
                    </template>
                    
                    <v-col cols="12">
                      <v-checkbox
                        v-model="installationForm.stairs"
                        label="Treppe vorhanden"
                        density="comfortable"
                        hide-details
                      ></v-checkbox>
                    </v-col>
                    
                    <template v-if="installationForm.stairs">
                      <!-- Section modifiée pour l'escalier -->
                      <v-col cols="12" class="d-flex flex-wrap">
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="installationForm.stairWidth"
                            label="Treppenbreite"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-checkbox
                            v-model="installationForm.cornerStair"
                            label="Übers Eck?"
                            density="comfortable"
                            hide-details
                            class="ml-8"
                          ></v-checkbox>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="installationForm.stairExit"
                            label="Ausstieg im Stockwerk"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="installationForm.stairSteps"
                            label="Stufenanzahl"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="installationForm.stairAfterSteps"
                            label="Weiterer Verlauf nach den Stufen"
                            variant="outlined"
                            density="comfortable"
                            class="ml-8"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-checkbox
                            v-model="installationForm.railingRemovable"
                            label="Geländer abnehmbar?"
                            density="comfortable"
                            hide-details
                            class="ml-8"
                          ></v-checkbox>
                        </v-col>
                      </v-col>
                    </template>
                  </v-row>
                </v-form>
              </v-stepper-window-item>
              
              <v-stepper-window-item :value="3">
                <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Abschluss</h3>
                <v-row>
                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="installationForm.place"
                      label="Ort"
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="installationForm.signatureDate"
                      label="Datum (Unterschrift)"
                      type="date"
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="installationForm.signatureName"
                      label="Unterschrift (Name)"
                      variant="outlined"
                      density="comfortable"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-stepper-window-item>
            </v-stepper-window>
          </v-stepper>
          
          <v-card-actions class="form-actions px-6 py-4">
            <v-btn
              color="grey"
              variant="outlined"
              :disabled="installationStep === 1"
              @click="prevInstallationStep"
            >
              <v-icon start>mdi-arrow-left</v-icon>
              Zurück
            </v-btn>
            
            <v-spacer></v-spacer>
            
            <v-btn
              color="grey"
              variant="outlined"
              @click="cancelInstallationForm"
            >
              Abbrechen
            </v-btn>
            
            <v-btn
              color="secondary"
              @click="nextInstallationStep"
            >
              {{ installationStep === 3 ? 'Absenden' : 'Weiter' }}
              <v-icon end>mdi-arrow-right</v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </div>
    </v-fade-transition>
  </v-container>
</template>

<script>
export default {
  name: 'ServiceVorOrt',
  data() {
    return {
      services: [
        "Instandsetzung / Reparatur",
        "Wartung / Messung / Kalibrieren / MTK-Abgleich",
        "Ersatzteile",
        "Installation / Umzug",
        "Gebrauchtgerätehandel"
      ],
      manufacturers: [
        "Ergo-Fit",
        "FREI medical",
        "emotion fitness",
        "Physiomed",
        "RECK-Technik (MOTOmed)",
        "ergoline",
        "proxomed",
        "Sonstiges"
      ],
      showForm: false,
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
      showInstallationForm: false,
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
      this.showForm = false;
      this.resetForm();
    },
    cancelForm() {
      this.showForm = false;
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
    },
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
      this.showInstallationForm = false;
      this.resetInstallationForm();
    },
    cancelInstallationForm() {
      this.showInstallationForm = false;
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
.service-container {
  max-width: 1400px;
  padding-top: 40px;
  padding-bottom: 80px;
}

.section-header h1 {
  position: relative;
  padding-bottom: 15px;
}

.section-header h1:after {
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

.service-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card:hover {
  transform: translateY(-5px);
}

.form-options {
  background: rgba(21, 101, 192, 0.05);
  border-left: 4px solid #1565c0;
}

.form-container {
  overflow: hidden;
}

.form-header {
  position: relative;
}

.form-header h2 {
  position: relative;
  padding-bottom: 15px;
}

.form-header h2:after {
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

.service-list .v-list-item {
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

/* Nouveaux styles pour l'affichage direct */
.form-section {
  margin-top: 30px;
  margin-bottom: 50px;
}

.back-button {
  position: absolute;
  left: 20px;
  top: 20px;
  z-index: 10;
}

@media (max-width: 600px) {
  .section-header h1 {
    font-size: 1.8rem;
  }
  
  .service-card h2 {
    font-size: 1.5rem;
  }
  
  .form-options h3 {
    font-size: 1.2rem;
  }
  
  .form-header .back-button {
    top: 10px;
    left: 10px;
  }
  
  .form-header h2 {
    padding-top: 40px;
    font-size: 1.8rem;
  }
}
</style>