<template>
  <v-form class="form-step">
    <h3 class="text-h5 font-weight-bold primary--text mb-4">1. Kundendatenerfassung</h3>
    <v-row dense class="pa-2">
      <v-col cols="12" md="6">
        <v-select
          v-model="form.anrede"
          :items="['Frau', 'Herr']"
          label="Anrede"
          outlined
          dense
          :error-messages="showErrors ? validation.form.anrede.$errors.map(e => e.$message) : []"
          @update:modelValue="validation.form.anrede.$touch"
          required
        />
      </v-col>
      <v-col cols="12" md="6">
        <v-text-field 
          v-model="form.firstname" 
          label="Vorname" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-account"
          :error-messages="showErrors ? validation.form.firstname.$errors.map(e => e.$message) : []"
          @input="validation.form.firstname.$touch"
        />
      </v-col>
      <v-col cols="12" md="6">
        <v-text-field 
          v-model="form.lastname" 
          label="Nachname" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-account"
          :error-messages="showErrors ? validation.form.lastname.$errors.map(e => e.$message) : []"
          @input="validation.form.lastname.$touch"
        />
      </v-col>
      <v-col cols="12" md="6">
        <v-text-field 
          v-model="form.company" 
          label="Firma / Kundennummer" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-office-building"
          :error-messages="showErrors ? validation.form.company.$errors.map(e => e.$message) : []"
          @input="validation.form.company.$touch"
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
          :error-messages="showErrors ? validation.form.phone.$errors.map(e => e.$message) : []"
          @input="validation.form.phone.$touch"
        />
      </v-col>
      <v-col cols="12" md="6">
        <v-text-field 
          v-model="form.email" 
          label="E-Mail Adresse" 
          type="email"
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-email"
          :error-messages="showErrors ? validation.form.email.$errors.map(e => e.$message) : []"
          @input="validation.form.email.$touch"
        />
      </v-col>
      <v-col cols="12" md="8">
        <v-text-field 
          v-model="form.address" 
          label="Straße / Adresse" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-home"
          :error-messages="showErrors ? validation.form.address.$errors.map(e => e.$message) : []"
          @input="validation.form.address.$touch"
        />
      </v-col>
      <v-col cols="12" md="4">
        <v-text-field 
          v-model="form.hausnummer" 
          label="Hausnummer" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-pound"
          :error-messages="showErrors ? validation.form.hausnummer.$errors.map(e => e.$message) : []"
          @input="validation.form.hausnummer.$touch"
        />
      </v-col>
      <v-col cols="12" md="4">
        <v-text-field 
          v-model="form.plz" 
          label="PLZ" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-map-marker"
          :error-messages="showErrors ? validation.form.plz.$errors.map(e => e.$message) : []"
          @input="validation.form.plz.$touch"
        />
      </v-col>
      <v-col cols="12" md="4">
        <v-text-field 
          v-model="form.ort" 
          label="Ort" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-city"
          :error-messages="showErrors ? validation.form.ort.$errors.map(e => e.$message) : []"
          @input="validation.form.ort.$touch"
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
          :error-messages="showErrors ? validation.form.land.$errors.map(e => e.$message) : []"
          @update:modelValue="validation.form.land.$touch"
        />
      </v-col>
    </v-row>
  </v-form>
</template>

<script>
export default {
  props: {
    modelValue: {
      type: Object,
      required: true
    },
    validation: {
      type: Object,
      required: true
    },
    countries: {
      type: Array,
      required: true
    },
    showErrors: {
      type: Boolean,
      default: false
    }
  },
  emits: ['update:modelValue'],
  computed: {
    form: {
      get() { return this.modelValue },
      set(value) { this.$emit('update:modelValue', value) }
    }
  }
}
</script>