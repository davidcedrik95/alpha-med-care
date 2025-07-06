<template>
  <div class="bg-gray-50">
 <section class="hero-pattern text-white h-screen flex items-center justify-center">
  <div class="container mx-auto px-4 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">Über alpha med care</h1>
    <p class="text-xl max-w-2xl mx-auto">
      Ihr Partner für medizinische Geräte und Service
    </p>
  </div>
</section>

    <EntrepriseSection/>
    <TeamsView/>
  </div>

</template>

<script setup>
  import TeamsView from './TeamsView.vue';
  import EntrepriseSection from './EntrepriseSection.vue';
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

body {
  font-family: 'Montserrat', sans-serif;
  scroll-behavior: smooth;
}

.hero-pattern {
  background: linear-gradient(rgba(127, 197, 235, 0.8), rgba(13, 74, 106, 0.8)),
  url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
  background-size: cover;
  background-position: center;

}


</style>
