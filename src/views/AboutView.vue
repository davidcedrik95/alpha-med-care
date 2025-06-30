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
  }
  
  .hero-content {
    max-width: 800px;
    padding: 0 20px;
    z-index: 2;
  }
  
  .hero-content h1 {
    font-size: 3.5rem;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }
  
  .hero-content p {
    font-size: 1.5rem;
    margin-bottom: 30px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  }
  
  .hero-button {
    padding: 12px 30px;
    font-size: 1.1rem;
    background-color: #42b983;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .hero-button:hover {
    background-color: #369f6e;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  }
  
  @media (max-width: 768px) {
    .hero-section {
      height: 400px;
    }
    
    .hero-content h1 {
      font-size: 2.5rem;
    }
    
    .hero-content p {
      font-size: 1.2rem;
    }
  }
  </style>