<template>

     <div class="construction-banner">
      ⚠️   <h3>{{ $t('construction.title') }}</h3>
    </div>

  <div class="home-view">
    <div v-if="showOverlay" class="construction-overlay" @click="showOverlay = false">
      <div class="overlay-content">
        <div class="construction-icon">🚧</div>
        <h3>{{ $t('construction.title') }}</h3>
        <p>{{ $t('construction.message') }}</p>
        <p><small>{{ $t('construction.click') }}</small></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showOverlay: true
    }
  }
}
</script>

<style scoped>
.construction-banner {
  padding: 15px;
  margin-bottom: 20px;
  background-color: #fff3cd;
  color: #856404;
  border: 1px solid #ffeeba;
  border-radius: 4px;
  text-align: center;
  font-weight: bold;
}

.construction-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  animation: fadeIn 0.5s;
  cursor: pointer;
}

.overlay-content {
  background: white;
  padding: 30px;
  border-radius: 10px;
  text-align: center;
  max-width: 400px;
  animation: slideUp 0.5s;
}

.construction-icon {
  font-size: 50px;
  margin-bottom: 20px;
  animation: pulse 2s infinite;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideUp {
  from { transform: translateY(20px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}
</style>