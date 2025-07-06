<template>
  <div class="bg-gray-50">
    <!-- Hero Section -->
    <section
      class="hero-pattern text-white h-screen flex flex-col justify-center items-center relative"
    >
      <div class="text-center px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Über alpha med care</h1>
        <p class="text-xl max-w-2xl mx-auto mb-8">
          Ihr Partner für medizinische Geräte und Service
        </p>
       
      </div>

      <!-- Scroll Down Indicator -->
      <div
        class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce cursor-pointer text-white text-3xl"
        @click="scrollToNextSection"
        title="Weiter scrollen"
      >
        <i class="fas fa-chevron-down"></i>
      </div>
    </section>

    <!-- Wrapper avec id pour cibler le scroll -->
    <div id="entreprise-section">
      <EntrepriseSection />
    </div>

    <TeamsView />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import TeamsView from './TeamsView.vue';
import EntrepriseSection from './EntrepriseSection.vue';

function scrollToNextSection() {
  const section = document.getElementById('entreprise-section');
  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

body {
  font-family: 'Montserrat', sans-serif;
  scroll-behavior: smooth;
}

.hero-pattern {
  background: linear-gradient(
      rgba(127, 197, 235, 0.8),
      rgba(13, 74, 106, 0.8)
    ),
    url(
      'https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80'
    );
  background-size: cover;
  background-position: center;
}
</style>
