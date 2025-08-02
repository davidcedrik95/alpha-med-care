<template>
  <v-form class="form-step">
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
          :error-messages="showErrors ? validation.form.manufacturer.$errors.map(e => e.$message) : []"
          @update:modelValue="validation.form.manufacturer.$touch"
        />
        <v-text-field
          v-if="form.manufacturer === 'Sonstiges'"
          v-model="form.customManufacturer"
          label="Bitte geben Sie den Hersteller an"
          variant="outlined"
          prepend-inner-icon="mdi-pencil"
          :error-messages="showErrors ? validation.form.customManufacturer.$errors.map(e => e.$message) : []"
          @input="validation.form.customManufacturer.$touch"
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
          :error-messages="showErrors ? validation.form.model.$errors.map(e => e.$message) : []"
          @input="validation.form.model.$touch"
        />
      </v-col>
      <v-col cols="12" md="6">
        <v-text-field 
          v-model="form.serial" 
          label="Seriennummer" 
          required 
          variant="outlined" 
          prepend-inner-icon="mdi-barcode"
          :error-messages="showErrors ? validation.form.serial.$errors.map(e => e.$message) : []"
          @input="validation.form.serial.$touch"
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
    manufacturers: {
      type: Array,
      required: true
    },
    imageError: {
      type: String,
      default: ''
    },
    showErrors: {
      type: Boolean,
      default: false
    }
  },
  emits: ['update:modelValue', 'update:imageError'],
  computed: {
    form: {
      get() { return this.modelValue },
      set(value) { this.$emit('update:modelValue', value) }
    }
  },
  methods: {
    handleImageUpload(newFiles) {
      let error = ''
      if (!newFiles) return
      
      const filesArray = Array.from(newFiles)
      const maxSize = 2 * 1024 * 1024 // 2MB
      const validTypes = ['image/jpeg', 'image/png', 'image/gif']
      const maxFiles = 5
      
      // Check total files count
      if (this.form.imageFiles.length + filesArray.length > maxFiles) {
        error = `Maximal ${maxFiles} Bilder erlaubt`
        this.$emit('update:imageError', error)
        return
      }
      
      for (const file of filesArray) {
        // Check file type
        if (!validTypes.includes(file.type)) {
          error = 'Nur JPG, PNG oder GIF Dateien sind erlaubt'
          continue
        }
        
        // Check file size
        if (file.size > maxSize) {
          error = 'Die Bilddatei darf maximal 2 MB groß sein'
          continue
        }
        
        // Check duplicates
        const alreadyExists = this.form.imageFiles.some(
          f => f.name === file.name && f.size === file.size
        )
        
        if (!alreadyExists) {
          this.form.imageFiles.push(file)
          const reader = new FileReader()
          reader.onload = (e) => {
            this.form.imagePreviews.push(e.target.result)
            this.$emit('update:modelValue', this.form)
          }
          reader.readAsDataURL(file)
        }
      }
      this.$emit('update:imageError', error)
    },
    removeImage(index) {
      this.form.imageFiles.splice(index, 1)
      this.form.imagePreviews.splice(index, 1)
      this.$emit('update:modelValue', this.form)
    }
  }
}
</script>

<style scoped>
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
</style>