<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <v-container class="py-12">
      <v-card class="form-container" ref="cardRef">
        <!-- En-tête -->
        <v-card-title class="form-header text-center py-6 px-6">
          <v-btn icon @click="goBack" class="back-button">
            <v-icon>mdi-arrow-left</v-icon>
          </v-btn>
          <h2 class="text-h4 font-weight-bold primary--text">Wartungsvertrag Anfrage</h2>
          <p class="text-body-1 mt-2">
            Füllen Sie das folgende Formular aus, um einen Wartungsvertrag anzufordern.<br>
            Wir werden uns umgehend mit Ihnen in Verbindung setzen.
          </p>
        </v-card-title>

        <!-- Formulaire -->
        <v-form class="pb-6 mt-2">
          <v-container fluid class="px-6">
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
              <v-col cols="12" md="4">
                <v-text-field
                  v-model="formData.city"
                  label="Ort"
                  required
                  variant="outlined"
                  density="comfortable"
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field
                  v-model="formData.phone"
                  label="Telefon/Fax"
                  required
                  variant="outlined"
                  density="comfortable"
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <v-text-field
                  v-model="formData.email"
                  label="E-Mail"
                  type="email"
                  variant="outlined"
                  density="comfortable"
                ></v-text-field>
              </v-col>

              <!-- Options -->
              <v-col cols="12">
                <h3 class="text-h5 font-weight-bold primary--text mb-4">Bitte wählen Sie:</h3>
                <v-checkbox
                  class="mb-2"
                  v-model="formData.options"
                  value="appointment"
                  label="Wir wünschen einen persönlichen Termin"
                  density="comfortable"
                  hide-details
                ></v-checkbox>
                <v-checkbox
                  class="mb-2"
                  v-model="formData.options"
                  value="consultation"
                  label="Wir wünschen telefonische persönliche Beratung"
                  density="comfortable"
                  hide-details
                ></v-checkbox>
                <v-checkbox
                  class="mb-2"
                  v-model="formData.options"
                  value="information"
                  label="Bitte senden Sie uns Informationsmaterial"
                  density="comfortable"
                  hide-details
                ></v-checkbox>
              </v-col>
            </v-row>
          </v-container>
        </v-form>

        <!-- Boutons -->
        <v-card-actions class="form-actions d-flex justify-space-between px-6 py-4">
          <v-btn color="grey" variant="outlined" @click="goBack">
            <v-icon start>mdi-arrow-left</v-icon>
            Zurück
          </v-btn>

          <v-btn color="primary" @click="submitForm">
            Anfrage senden
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "MaintenanceForm",
  data() {
    return {
      formData: {
        company: "",
        contactPerson: "",
        street: "",
        zip: "",
        city: "",
        phone: "",
        email: "",
        options: [],
      },
    };
  },
  methods: {
    goBack() {
      this.$emit("cancel");
    },
    submitForm() {
      console.log("Formulardaten:", this.formData);

      this.$notify?.({
        title: "Anfrage gesendet!",
        text: "Vielen Dank für Ihre Anfrage. Wir werden uns in Kürze bei Ihnen melden.",
        type: "success",
      });

      this.resetForm();
      this.$emit("submitted", this.formData);
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
        options: [],
      };
    },
  },
};
</script>

<style scoped>
.form-container {
  width: 100%;
  margin-top: 40px;
  margin-bottom: 40px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1) !important;
  border-top: 5px solid #1976D2;
  overflow: hidden;
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

/* Responsive padding ajustée pour mobile */
@media (max-width: 600px) {
  .form-container {
    padding: 0 12px;
  }
}
</style>
