<template>
  <div class="about-view" style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Hero Section full width en haut -->
    <section
      class="hero-pattern w-full text-white flex flex-col justify-center items-center relative"
      style="height: 300px; border-radius: 0 0 12px 12px;"
    >
      <h1 style="font-weight: 700; font-size: 2.5rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">
        alpha-med-care
      </h1>
    </section>

 

      <!-- Contenu principal-->
      <main
        style="
          flex-grow: 1;
          overflow-y: auto;
          padding-left: 10px;
          border-radius: 8px;
        "
      >
       
        <router-view /> <!-- Ceci affichera les composants enfants -->
      </main>
    </div>

</template>

<script setup>

</script>

<style scoped>
.hero-pattern {
  height: 300px;
  background: linear-gradient(rgba(13, 74, 106, 0.85), rgba(13, 74, 106, 0.85)), 
              url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
  background-size: cover;
  background-position: center;
  position: relative;
  border-radius: 0 0 15px 15px;
}



</style>
