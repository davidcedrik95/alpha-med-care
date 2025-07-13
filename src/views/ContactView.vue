<template>
  <div class="about-view" style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Hero Section full width en haut -->
    <section
      class="hero-pattern w-full text-white flex flex-col justify-center items-center relative"
      style="height: 300px; border-radius: 0 0 12px 12px;"
    >
      <h1 style="font-weight: 700; font-size: 2.5rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">
        alpha med care
      </h1>
    </section>

    <!-- Conteneur principal sous le hero -->
    <div
      style="
        display: flex;
        flex-grow: 1;
        min-height: 0;
        overflow: hidden;
        margin-top: 24px;
        padding: 0 20px 20px 20px;
      "
    >
     
     
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';


c
</script>

<style scoped>
.hero-pattern {
  background: linear-gradient(
      rgba(127, 197, 235, 0.8),
      rgba(13, 74, 106, 0.8)
    ),
  url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
  background-size: cover;
  background-position: center;
}



</style>
