<template>
  <div class="hero-section" :style="{ backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${backgroundImage})` }">
    <div class="hero-content">
      <h1>{{ title }}</h1>
      <p>{{ subtitle }}</p>
      <button v-if="buttonText" class="hero-button">{{ buttonText }}</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeroSection',
  props: {
    title: {
      type: String,
      required: true
    },
    subtitle: {
      type: String,
      default: ''
    },
    backgroundImage: {
      type: String,
      required: true
    },
    buttonText: {
      type: String,
      default: ''
    }
  }
}
</script>

<style scoped>
.hero-section {
  height: 500px;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  position: relative;
  transition: all 0.5s ease;
}

.hero-content {
  max-width: 800px;
  padding: 0 20px;
  z-index: 2;
  animation: fadeInUp 1s ease-out;
}

.hero-content h1 {
  font-size: 3.5rem;
  margin-bottom: 20px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  font-weight: 700;
  letter-spacing: 0.5px;
}

.hero-content p {
  font-size: 1.5rem;
  margin-bottom: 30px;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  line-height: 1.6;
}

.hero-button {
  padding: 14px 36px;
  font-size: 1.1rem;
  background-color: #42b983;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.3s ease;
  font-weight: 600;
  letter-spacing: 0.5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.hero-button:hover {
  background-color: #369f6e;
  transform: translateY(-3px);
  box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
}

.hero-button:active {
  transform: translateY(1px);
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 992px) {
  .hero-section {
    height: 450px;
  }
  
  .hero-content h1 {
    font-size: 3rem;
  }
  
  .hero-content p {
    font-size: 1.3rem;
  }
}

@media (max-width: 768px) {
  .hero-section {
    height: 400px;
  }
  
  .hero-content h1 {
    font-size: 2.3rem;
  }
  
  .hero-content p {
    font-size: 1.1rem;
  }
  
  .hero-button {
    padding: 12px 28px;
    font-size: 1rem;
  }
}

@media (max-width: 576px) {
  .hero-section {
    height: 350px;
  }
  
  .hero-content h1 {
    font-size: 2rem;
  }
  
  .hero-content p {
    font-size: 1rem;
    margin-bottom: 20px;
  }
  
  .hero-button {
    padding: 10px 24px;
    font-size: 0.95rem;
  }
}
</style>