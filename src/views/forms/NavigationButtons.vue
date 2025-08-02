<template>
  <v-card-actions class="form-actions">
    <v-btn :disabled="step === 1" @click="$emit('prev')" variant="outlined">
      <v-icon start>mdi-arrow-left</v-icon> Zurück
    </v-btn>
    <v-spacer />
    <v-btn color="grey" variant="outlined" @click="$emit('cancel')">Abbrechen</v-btn>
    <v-btn color="primary" @click="$emit('next')" :loading="loading">
      {{ step === 3 ? 'Absenden' : 'Weiter' }}
      <v-icon end>{{ step === 3 ? 'mdi-send' : 'mdi-arrow-right' }}</v-icon>
    </v-btn>
  </v-card-actions>
</template>

<script>
export default {
  props: {
    step: Number,
    loading: Boolean
  },
  emits: ['prev', 'cancel', 'next']
}
</script>

<style scoped>
.form-actions {
  background: #f5f5f5;
  border-top: 1px solid #ddd;
  padding: 16px;
}
</style>