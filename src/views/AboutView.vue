<template>
  <div class="bg-gray-50">
    <!-- Hero Section -->
    <section
      class="hero-pattern text-white h-screen flex flex-col justify-center items-center relative"
    >
     
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


</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

body {
  font-family: 'Montserrat', sans-serif;
 
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
