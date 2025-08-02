<template>
  <v-row justify="center" class="my-4">
    <v-col cols="4" v-for="(stepItem, index) in steps" :key="index" class="text-center">
      <v-icon :color="step >= (index + 1) ? 'primary' : 'grey'">
        {{ stepItem.icon }}
      </v-icon>
      <div :class="['step-label', { active: step === (index + 1) }]">
        {{ stepItem.label }}
      </div>
    </v-col>
  </v-row>
</template>

<script>
export default {
  props: {
    step: Number,
    steps: Array
  }
}
</script>

<style scoped>
.step-label {
  margin-top: 8px;
  color: grey;
}

.step-label.active {
  font-weight: bold;
  color: #1976d2;
}
</style>