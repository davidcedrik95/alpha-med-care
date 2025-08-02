<template>
  <div class="form-step">
    <h3 class="text-h5 font-weight-bold primary--text mb-4">3. Abschluss</h3>
    <v-alert v-if="error" type="error" class="mb-4" dense>
      {{ error }}
    </v-alert>

    <v-textarea 
      v-model="additional" 
      label="Was können wir außerdem für Sie tun?" 
      variant="outlined" 
      rows="3" 
      prepend-inner-icon="mdi-comment"
      :error-messages="validation.form.additional.$errors.map(e => e.$message)"
      @input="updateAdditional"
    />

    <v-card variant="outlined" class="pa-4 mt-4">
      <h4 class="text-h6 font-weight-bold mb-2">Zusammenfassung der Geräte:</h4>
      
      <v-alert v-if="devicesList.length === 0" type="info" class="mb-4" dense>
        Keine Geräte hinzugefügt
      </v-alert>

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
              <v-img 
                v-for="(src, i) in device.imagePreviews" 
                :key="i" 
                :src="src" 
                max-width="120" 
                max-height="100" 
                class="mr-2 mb-2 rounded-lg" 
              />
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions>
          <v-btn color="error" variant="text" @click="$emit('remove-device', index)" prepend-icon="mdi-delete">
            Entfernen
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-card>

    <div class="d-flex align-center mt-4">
      <v-btn icon @click="$emit('add-device')" style="height: 40px; width: 40px;">
        <v-icon>mdi-plus</v-icon>
      </v-btn>
      <span class="ml-3 font-weight-medium">Weiteres Gerät hinzufügen</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    devicesList: {
      type: Array,
      required: true,
      default: () => []
    },
    validation: {
      type: Object,
      required: true
    },
    error: {
      type: String,
      default: ''
    },
    modelValue: {
      type: String,
      default: ''
    }
  },
  emits: ['update:modelValue', 'add-device', 'remove-device'],
  data() {
    return {
      additional: this.modelValue
    }
  },
  watch: {
    modelValue(newVal) {
      this.additional = newVal
    }
  },
  methods: {
    updateAdditional() {
      this.$emit('update:modelValue', this.additional)
    }
  }
}
</script>